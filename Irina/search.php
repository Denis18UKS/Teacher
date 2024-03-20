<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Результаты поиска файлов</title>
    <link rel="stylesheet" type="text/css" media="screen" href="css/search.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/back.css'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">

</head>
<body>
<a href="/"><img src="image/home.svg" alt="back" title="Главная" id="back"></a>


    <h1>Результаты поиска файлов</h1>

    <div class="search-results">
        <?php
        include "connectDB.php";

        if(isset($_POST['search'])) {
            $search_query = $_POST['search']; // Получаем значение запроса поиска
        
            // Выполняем поиск файлов в двух таблицах базы данных
            $sql = "SELECT * FROM metodichki WHERE met_title LIKE '%$search_query%' OR met_description LIKE '%$search_query%'
                    UNION
                    SELECT * FROM Programms WHERE program_title LIKE '%$search_query%' OR program_description LIKE '%$search_query%'";
        
            $result = $connect->query($sql);
        
            if ($result->num_rows > 0) {
                // Выводим найденные файлы
                while($row = $result->fetch_assoc()) {
                    echo "<div class='file'>";
                    echo "<h3>Найден файл: ".$row['met_title']."</h3>"; // Используйте соответствующие поля из таблиц
                    echo "<a href='" . $row["met_file"] . "' download><button class = 'btn btn-primary'>Скачать</button></a>";
                    echo "</div>";
                }
            } else {
                echo "По вашему запросу ничего не найдено.";
            }
        }

        $connect->close();
        ?>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>