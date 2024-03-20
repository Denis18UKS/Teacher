<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Управление</title>
    <link rel="stylesheet" href="../css/admin.css">
    <script src="/js/admin_panel.js" defer></script>
    <script src="/js/save-choose.js" defer></script>
</head>
<body>
    <div class="sidebar">
        <a href="admin.php" id="add-met-link">Управление методичками</a>
        <a href="control-programs.php" id="add-programs-link">Управление программами</a>
        <a href="../" id="logout-link">На главную</a>
    </div>

    <div class="content" id="content-tariffs">
        <!-- Контент для управления программами -->
        <h2>Управление программами</h2>
        <div class="form-container">
            <h2>Добавить программу</h2>
            <form id="tariff-form" action="insert_programs.php" method="post" enctype="multipart/form-data">
                <label for="file">Файл:</label>
                <input type="file" id="file" name="file" required><br>

                <label for="title">Название:</label>
                <input type="text" id="title" name="title" required minlength="5" maxlength="35"><br>

                <label for="description">Описание:</label>
                <textarea id="description" name="description" rows="4" required minlength="5" maxlength="500"></textarea><br>

                <button type="submit">Добавить программу</button>
            </form>
        </div>

        <?php
            include("../connectDB.php");

            $program_control = "SELECT * FROM `Programms`";
            $program_result = mysqli_query($connect, $program_control);

        
            if (mysqli_num_rows($program_result) > 0) {
                while ($program = mysqli_fetch_assoc($program_result)) {
            ?>
                    <div id="materialsInfo">
                        <p>Название: <? echo $program['program_title'] ?> </p>
                        <p>Описание: <? echo $program['program_description'] ?> </p>
                        <div id="control-materials">
                        <a href="remove-program.php?programs_id=<?= $program['id'] ?>" class="remove">Удалить</a>
                        </div>
                    <!-- // Другие поля тарифа, которые нужно вывести -->
                    </div>
                <?php
                }
            } else {
                echo "Программы отсутствуют.";
            }
        ?>
    </div>

</body>
</html>