<?php
    class SignIn {
        public function displaySignForm() {
    ?>
            <!DOCTYPE html>
            <html>
            <head>
                <meta charset='utf-8'>
                <meta http-equiv='X-UA-Compatible' content='IE=edge'>
                <title>Вход</title>
                <meta name='viewport' content='width=device-width, initial-scale=1'>
                <link rel='stylesheet' type='text/css' media='screen' href='css/sign.css'>
                <link rel='stylesheet' type='text/css' media='screen' href='css/teacher.css'>
                <link rel='stylesheet' type='text/css' media='screen' href='css/back.css'>
                <script src="js/blur.js" defer></script>
            </head>
            <body>
            

            <a href="/"><img src="image/home.svg" alt="back" title="Главная" id="back"></a>


            <div id="sign">
                <h1>Вход</h1>
                <form action="login.php" method="post">
                    <div id="form-content">
                        <label for="email">Почта : </label>
                        <input type="email" name="email" id="email">
                    </div>

                    <div id="form-content">
                        <label for="password">Пароль : </label>
                        <input type="password" name="password" id="password">
                    </div>

                    <div id="form-content">
                        <label for="user_type">Тип пользователя: </label>
                        <input type="radio" name="user_type" value="users" checked>Пользователь
                        <input type="radio" name="user_type" value="teacher">Учитель
                    </div>
                    
                    <div id="submit">
                        <input type="submit" class="submit" value="Вход">
                    </div>
                </form>
            </div>

            
            </body>
            </html>
            <?php
        }

    public function processFormSignIn() {
        header("Location: login.php");
    }
}
    $signIn = new SignIn();
    $signIn ->displaySignForm();
?>