<?php
    include "connectDB.php";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"];
        $password = $_POST["password"];
        $user_type = $_POST["user_type"]; // Добавляем получение типа пользователя

        // Проверка на пустые поля
        if (empty($email) || empty($password)) {
            echo "<script>alert('Заполните все поля!'); location.href = 'signIn.php';</script>";
        } else {
            // Проверка типа пользователя
            if ($user_type == "users") {
                $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
            } elseif ($user_type == "teacher") {
                $sql = "SELECT * FROM teachers WHERE email = '$email' AND password = '$password'";
            }

            $result = mysqli_query($connect, $sql);

            if (mysqli_num_rows($result) > 0) {
                // Найден пользователь или учитель - запускаем сессию и перенаправляем
                session_start();
                $_SESSION['email'] = $email;
                $_SESSION['user_type'] = $user_type; // Сохраняем тип пользователя в сессии
                header("Location: /"); // Перенаправление на главную страницу или личный кабинет
                exit();
            } else {
                echo "<p class='error'></p>";
                echo "<script>alert('Неверный email или пароль!'); location.href = 'signIn.php';</script>";
            }
        }
    }
?>

<link rel='stylesheet' type='text/css' media='screen' href='css/nav.css'>
