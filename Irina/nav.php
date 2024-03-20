<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/nav.css'>

    <script src='/js/main.js'></script>
</head>
<body>
    <nav>
        <div class="Logo-content">
            <img src="/image/avatars.jpg" alt="" class="logo-img">
            <h1 class="logo-text">Ирина</h1>
        </div>

        <ul class="nav-list">
        <?php
            include "session.php";

            if ($_SESSION) {
                if (isset($_GET['type']) && $_GET['type'] === "teacher") {
                    echo '<li><a href="admin/admin.php">Управление</a></li>';
                } else {
                    echo '<li><a href="user_profile/profile.php">Личный кабинет</a></li>';
                }
            } else {
                echo '<li><a href="reg.php">Регистрация</a></li>';
                echo '<li><a href="signIn.php">Вход</a></li>';
            }
        ?>

            <li><a href="#materials">Материалы</a></li>
        </ul>

        <form action="search.php" id="Searching" method="post">
            <input type="search" name="search" id="search" placeholder="Поиск" required>
            <input type="submit" value="Поиск" id="sub-searching">
        </form>

        <ul class="nav-list">

            <?php 
                include "session.php";

                if ($_SESSION) {
                    echo '<li><a href="exit.php">Выйти</a></li>';
                } else {
                    // Вывод других ссылок или обработка отсутствия активной сессии
                }
            ?>
        </ul>

        
    </nav>


</body>
</html>

