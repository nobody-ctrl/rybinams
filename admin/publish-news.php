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
    <div class="form-another" style="margin-left: -200px; margin-top: -175px;">
        <form action="load-news.php" class="form" method="post" enctype="multipart/form-data">
            <textarea name="descr" placeholder="Enter the content" class="form__content" required></textarea>
            <div class="">
                <span class="form__text">Выбрать картинку: </span>
                <input name="pic" type="file" class="form__file-one">
            </div>
            <div class="">
                <span class="form__text">Выбрать файл: </span>
                <input name="file[]" type="file" class="form__file-two" multiple="multiple">
            </div>
            <input type="submit" class="form__send" value="Опубликовать">
        </form>
    </div>
    <!-- /.main-form -->
</body>
</html>