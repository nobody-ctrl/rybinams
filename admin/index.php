<?php
    session_start();
    if(isset($_SESSION['user'])){
        header("Location: home.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Панель администратора</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="form-main">
        <form action="send.php" class="form" method="post">
            <input type="password" name="password" placeholder="Enter the password" class="form__input" required>
            <input type="submit" class="form__send" value="Войти">
        </form>
    </div>
    <!-- /.main-form -->
</body>
</html>