<?php
    class Registration {
        public function displayRegistrationForm() {
    ?>
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <title>Регистрация</title>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' type='text/css' media='screen' href='css/reg.css'>
                <link rel='stylesheet' type='text/css' media='screen' href='css/teacher.css'>
                <link rel='stylesheet' type='text/css' media='screen' href='css/back.css'>
                <link rel='stylesheet' type='text/css' media='screen' href='fonts/font.css'>
                <script src="js/blur.js" defer></script>

            </head>
            <body>
            
            <a href="/"><img src="image/home.svg" alt="back" title="Главная" id="back"></a>

            <div id="registration">
                <h1>Регистрация</h1>
                <form action="userADD.php" method="post">
                    <div id="form-content">
                        <label for="surname">Фамилия :</label>
                        <input type="text" name="surname" id="surname">
                    </div>

                    <div id="form-content">
                        <label for="name">Имя : </label>
                        <input type="text" name="name" id="name">
                    </div>

                    <div id="form-content">
                        <label for="tel">Номер телефона : </label>
                        <input type="tel" name="tel" id="tel">
                    </div>

                    <div id="form-content">
                        <label for="password">Пароль : </label>
                        <input type="password" name="password" id="password">
                    </div>

                    <div id="form-content">
                        <label for="email">Ваша Почта : </label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div id="form-content">
                        <label for="user_type">Тип пользователя:</label>
                        <select name="user_type" id="user_type">
                            <option value="users">Пользователь</option>
                            <option value="teacher">Учитель</option>
                        </select>
                    </div>

                    <div id="teacher-fields" style="display: none;">
                        <div id="form-content">
                            <label for="birth_date">Дата рождения : </label>
                            <input type="date" name="birth_date" id="birth_date">
                        </div>
                        <div id="form-content">
                            <label for="experience">Опыт работы : </label>
                            <input type="number" min="5" name="experience" id="experience">
                        </div>
                    </div>
                    
                    <div id="submit">
                        <input type="submit" class="submit" value="Регистрация">
                    </div>
                </form>
            </div>

            
            <script>
                document.getElementById('user_type').addEventListener('change', function() {
                    if (this.value === 'teacher') {
                        document.getElementById('teacher-fields').style.display = 'block';
                    } else {
                        document.getElementById('teacher-fields').style.display = 'none';
                    }
                });
            </script>
            
            </body>
            </html>
            <?php
        }

        public function processForm() {
            // Здесь будет обработка данных формы, сохранение в базу данных и т.д.
            header("Location: userADD.php");
        }
    }

    $registration = new Registration();
    $registration->displayRegistrationForm();
?>