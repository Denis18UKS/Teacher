<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Личный кабинет админа</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="/js/admin_panel.js" defer></script>
    <script src="/js/save-choose.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <a href="#" id="met-link">Управление методичками</a>
        <a href="#" id="programs-link">Управление программами</a>
        <a href="../exit.php" id="logout-link">Выйти</a>
    </div>


    <div class="content" id="content-tariffs">
        <!-- Контент для управления тарифами -->
        <h2>Управление методичками</h2>
        <div class="form-container">
            <h2>Добавить методичку</h2>
            <form id="tariff-form" action="insert_met.php" method="post" enctype="multipart/form-data">
                <label for="file">Файл:</label>
                <input type="file" id="file" name="file" required><br>

                <label for="title">Название:</label>
                <input type="text" id="title" name="title" required minlength="5" maxlength="35"><br>

                <label for="description">Описание:</label>
                <textarea id="description" name="description" rows="4" required minlength="5" maxlength="500"></textarea><br>

                <button type="submit">Добавить методичку</button>
            </form>
        </div>

        <?php
            include("../connectDB.php");

            $met_control = "SELECT * FROM `metodichki`";
            $met_result = mysqli_query($connect, $met_control);

        
            if (mysqli_num_rows($met_result) > 0) {
                while ($met = mysqli_fetch_assoc($met_result)) {
            ?>
                    <div id="materialsInfo">
                        <p>Название: <? echo $met['met_title'] ?> </p>
                        <p>Описание: <? echo $met['met_descrip'] ?> </p>
                        <div id="control-materials">
                            <a href="remove-met.php" class="remove">Удалить</a>
                        </div>
                    <!-- // Другие поля тарифа, которые нужно вывести -->
                    </div>
                <?php
                }
            } else {
                echo "Методички отсутствуют.";
            }
        ?>
    </div>

    <div class="content" id="content-users" style="display: none;">
        <!-- Контент для управления пользователями -->
        <h2>Управление программами</h2>
        <?php
            include("../connectDB.php");
            $user_control = "SELECT * FROM `programms`";
            $user_result = mysqli_query($connect, $user_control);

            if (mysqli_num_rows($user_result) > 0) {
                while ($user = mysqli_fetch_assoc($user_result)) {
                    echo "<p>Фамилия: " . $user['surname'] . "</p>";
                    echo "<p>Имя: " . $user['name'] . "</p>";
                    echo "<p>Email: " . $user['phone'] . "</p>";
                    echo "<p>Пароль: " . $user['password'] . "</p>";
                    echo "<p>Адрес: " . $user['email'] . "</p>";
                    echo "<p>Дата Регистрации: " . $user['reg-time'] . "</p>";
                    // echo "<a href = 'remove-user.php'></a>";
                    // Другие поля пользователя, которые нужно вывести
                    echo "<hr>";

                }
            } else {
                echo "Программы отсутствуют";
            }
        ?>
    </div>

</body>
</html>