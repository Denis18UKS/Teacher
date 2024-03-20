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
        
        $sql = ""; // Инициализируем переменную $sql

        // Проверка на пустые поля
        if (empty($surname) || empty($name) || empty($phone) || empty($password) || empty($email) || empty($user_type)) {
            echo "<script>alert('Заполните все поля!'); location.href = 'reg.php';</script>";
        } else {
            if ($user_type == "users") {
                // Добавление в таблицу users
                $sql = "INSERT INTO users(surname, name, phone, password, email) VALUES('$surname', '$name', '$phone', '$password', '$email')";
            } else if ($user_type == "teacher") {
                // Преобразование даты в правильный формат
                $formatted_date = date('Y-m-d', strtotime($birth_date));
                
                // Добавление в таблицу teachers
                $sql = "INSERT INTO teachers(surname_teacher, name_teacher, phone, password, email, date_HB, experience) VALUES('$surname', '$name', '$phone', '$password', '$email', '$formatted_date', '$experience')";
            }

            if (!empty($sql)) { // Проверяем, что $sql не пустое
                $query = mysqli_query($connect, $sql);

                if ($query) {
                    echo "<script>alert('Вы успешно прошли регистрацию'); location.href = 'signIn.php';</script>";
                } else {
                    echo "<script>alert('Ошибка при добавлении пользователя'); location.href = '/';</script>";
                }
            } else {
                echo "<script>alert('Ошибка формирования SQL-запроса'); location.href = '/';</script>";
            }
        }
    }
?>