<?php
include "connectDB.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = trim($_POST["surname"]);
    $name = trim($_POST["name"]);
    $phone = trim($_POST["tel"]);
    $password = trim($_POST["password"]);
    $email = trim($_POST["email"]);
    $birth_date = trim($_POST["birth_date"]);
    $experience = trim($_POST["experience"]);
    $user_type = trim($_POST["user_type"]);

    // Проверка на пустые поля
    if (empty($surname) || empty($name) || empty($phone) || empty($password) || empty($email) || empty($user_type)) {
        echo "<script>alert('Пожалуйста, заполните все поля.'); location.href = 'reg.php';</script>";
    } else {
        // Проверка наличия пользователя в базе данных
        if ($user_type == "users") {
            $check_sql = "SELECT * FROM users WHERE email = '$email'";
        } else if ($user_type == "teacher") {
            $check_sql = "SELECT * FROM teachers WHERE email = '$email'";
        }

        $check_query = mysqli_query($connect, $check_sql);

        if (mysqli_num_rows($check_query) > 0) {
            echo "<scrip>alert('Пользователь с таким email уже существует'); location.href = 'reg.php';</script>";
        } else {
            // Добавление пользователя в базу данных
            if ($user_type == "users") {
                $sql = "INSERT INTO users (surname_user, name_user, password, email) VALUES ('$surname', '$name', '$password', '$email')";
            } else if ($user_type == "teacher") {
                $sql = "INSERT INTO teachers (surname_teacher, name_teacher, phone, password, email, date_HB, experience) VALUES ('$surname', '$name', '$phone', '$password', '$email', '$birth_date', '$experience')";
            }

            if (mysqli_query($connect, $sql)) {
                echo "<script>alert('Пользователь успешно зарегистрирован.'); location.href = 'signIn.php';</script>";
            } else {
                echo "Ошибка: " . $sql . "<br>" . mysqli_error($connect);
            }
        }
    }
}
?>