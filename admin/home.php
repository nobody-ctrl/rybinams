<?php
    session_start();
    if(!isset($_SESSION['user'])){
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Админка</title>
    <link rel="stylesheet" href="css/style-home.css">
</head>
<body>
    <div class="some-form">
        <a href="publish-file.php" class="form__link">
            <button class="form__send">Загрузить файл</button>
        </a>
        <a href="publish-news.php" class="form__link">
            <button class="form__send">Опубликовать новость</button>
        </a>
        <a href="logout.php" class="form__link">
            <button class="form__send">Выйти</button>
        </a>
    </div>
</body>
</html>