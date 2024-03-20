<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Карпова Ирина Алексеевна</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css">
    <link rel='stylesheet' type='text/css' media='screen' href='css/main.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/teacher.css'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/nav.css'>

    <script src='main.js'></script>
</head>
<body>


<? include "nav.php"; ?>

<header>
    <div id="container-header-text">
        <div id="cont-h1">
            <div id="cont-h1-hr">
                <h1>Портфолио</h1>
                <hr>
            </div>
            <div id="cont-h3">
                <h3>Тут вы найдёте различные методические материалы и программы</h3>
                <h3>Также вы можете посмотреть мои грамоты и достижения</h3>
                <a href="https://vk.com/id107319327" style="color: white; "><h1>Нажмите сюда</h1></a>
            </div>
        </div>
    </div>
</header>


<main>
    <section id="info-block">
        <img src="https://sun9-55.userapi.com/impg/55F1caGw0QvmakupOnqy7jFFsZ9YYXSB5zqohA/owmtyOBkXYQ.jpg?size=761x1024&quality=95&sign=9693412d393dcd2bc458f701c3f4515d&type=album" alt="">
    
        <div id="info-text">
            <h1>Информация</h1>       
            <?php
                include "connectDB.php";

                $name_teacher = "Ирина";
                // Получаем текущую дату
                $current_date = date('Y-m-d');
                // Год, с которого будет вестись отсчет стажа (1999 год)
                $start_year = 1999;

                // Выбираем данные учителя
                $teachers_info = "SELECT * FROM `teachers` WHERE name_teacher = '$name_teacher'";
                $info_result = mysqli_query($connect, $teachers_info);

                if(mysqli_num_rows($info_result) > 0) {
                    while($row = mysqli_fetch_assoc($info_result)) {
                        echo "<p>Имя: " . $row['name_teacher'] . "</p>";
                        echo "<p>Фамилия: " . $row['surname_teacher'] . "</p>";
                        echo "<p>Дата рождения: " . $row['date_HB'] . "</p>";
                        
                        // Рассчитываем стаж на основе разницы между текущим годом и стартовым годом
                        $experience = date('Y') - $start_year;
                        
                        // Обновляем стаж в базе данных
                        $update_experience_query = "UPDATE teachers SET experience = $experience WHERE name_teacher = '$name_teacher'";
                        $update_result = mysqli_query($connect, $update_experience_query);
                        
                        if($update_result) {
                            echo "<p>Стаж: " . $experience . "</p>";
                        } else {
                            echo "Ошибка при обновлении стажа учителя.";
                        }
                    }
                } else {
                    echo "Нет результатов для учителя с именем 'Ирина'";
                }
                ?>
        </div>
    </section>

<section id="materials">

    <section id="metodichki">
        <h1 class="metodichki">Методички</h1>
        <?php
            include "connectDB.php";
            
            // Запрос к базе данных для получения информации о методичке
            $sql = "SELECT * FROM metodichki";
            $result = $connect->query($sql);
            
            if ($result->num_rows > 0) {
                // Вывод информации о методичке
                while($row = $result->fetch_assoc()) {
                    echo "<div id = 'card'>";
                    echo "<h3>Название методички: </h3>";
                    echo "<h4>" . $row['met_title'] . "</h4>";
                    echo "<h3>Описание методички: </h3> ";
                    echo "<h4>" . $row['met_description'] . "</h4>";
                    if ($_SESSION) {
                        if (isset($_GET['type']) && $_GET['type'] === "teacher") {
                            echo "<a href='" . $row["met_file"] . "' download><button class = 'btn btn-primary'>Скачать методичку</button></a>";
                        } else {
                            echo "<a href='" . $row["met_file"] . "' download><button class = 'btn btn-primary'>Скачать методичку</button></a>";
                        }
                    } else {
                        echo "<i><h3>Для скачивания или поиска файлов войдите в аккаунт</h3></i>";
                    }
                    echo "</div>";

                }
            } else {
                echo "Нет данных о методичке";
            }
            
            $connect->close();
            ?>
    </section>


    <!-- программы -->



    <section id="programs">
        <h1 class="programs">Программы</h1>

    <?php
            include "connectDB.php";
            
            // Запрос к базе данных для получения информации о методичке
            $sql = "SELECT * FROM Programms";
            $result = $connect->query($sql);
            
            if ($result->num_rows > 0) {
                // Вывод информации о методичке
                while($row = $result->fetch_assoc()) {
                    echo "<div id = 'card'>";
                    echo "<h3>Название программы: </h3>"; 
                    echo "<h4>" . $row["program_title"] . "</h4>";
                    echo "<h3>Описание программы: </h3>";
                    echo "<h4>" . $row["program_description"] . "</h4>";

                        include "session.php";

                        if ($_SESSION) {
                            if (isset($_GET['type']) && $_GET['type'] === "teacher") {
                                echo "<a href='" . $row["program_file"] . "' download><button class='btn btn-primary'>Скачать программу</button></a>";
                            } else {
                                echo "<a href='" . $row["program_file"] . "' download><button class='btn btn-primary'>Скачать программу</button></a>";
                            }
                        } else {
                        echo "<i><h3>Для скачивания или поиска файлов войдите в аккаунт</h3></i>";
                        }
                    echo "</div>";
                }
            } else {
                echo "Нет данных о программах";
            }
            
            $connect->close();
            ?>
    </section>
</section>

</main>

<footer>
    <p class="mail-Irina">Почта : <a href="https://my.mail.ru/mail/ik13574/photo">Ik13574@mail.ru</a></p>
    <div id="footer-content">
        <p>&copy; 2022 @dkarpov2003. Все права защищены.</p>
    </div>            
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>




</body>
</html>

