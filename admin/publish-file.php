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
    <div class="form-another">
        <form action="load.php" class="form" method="post" enctype="multipart/form-data">
            <input type="text" name="name" placeholder="Enter the name" class="form__input" required>
            <div class="something">
                <input type="radio" name="choice" value="0" required>Уроки по истории<br>
                <input type="radio" name="choice" value="1" required>Уроки по обществознанию<br>
                <input type="radio" name="choice" value="2" required>Экзамены по истории <br>
                <input type="radio" name="choice" value="3" required>Экзамены по обществознанию<br>
                <input type="radio" name="choice" value="4" required>Олимпиады по истории<br>
                <input type="radio" name="choice" value="5" required>Олимпиады по обществознанию<br>

            </div>
            <input name="file[]" type="file" class="form__file" multiple="multiple" required>
            <input type="submit" class="form__send" value="Загрузить">
        </form>
    </div>
    <!-- /.main-form -->
</body>
</html>