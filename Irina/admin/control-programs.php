<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Обработка загруженного файла
        $file = $_FILES['file'];
        $fileName = $file['name'];
        $fileTmpName = $file['tmp_name'];
        $fileSize = $file['size'];
        $fileError = $file['error'];

        // Если файл был успешно загружен
        if ($fileError === 0) {
            $fileDestination = '../materials/programs/' . $fileName;
            move_uploaded_file($fileTmpName, $fileDestination);
            
            // Подключение к базе данных
            include "../connectDB.php";


            // Проверка соединения
            if ($connect->connect_error) {
                die("Ошибка подключения к базе данных: " . $connect->connect_error);
            }

            // Получение данных из полей формы
            $title = $connect->real_escape_string($_POST['title']);
            $description = $connect->real_escape_string($_POST['description']);

            // SQL запрос для вставки данных в базу данных
            $sql = "INSERT INTO metodichki (met_title, met_description, met_file) VALUES ('$title', '$description', '$fileDestination')";

            if ($connect->query($sql) === TRUE) {
                echo "Методичка успешно добавлена в базу данных!";
            } else {
                echo "Ошибка при добавлении методички: " . $connect->error;
            }

            $connect->close();
        } else {
            echo "Ошибка при загрузке файла";
        }
    }
?>