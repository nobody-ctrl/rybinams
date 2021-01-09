<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Любители Истории</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@200;300;400;500;700&display=swap" rel="stylesheet"> 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=East+Sea+Dokdo&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/style-for-small-back.css">
    <link rel="icon" href="https://anastasia-petrova.com/rybinams/favicon.ico" type="image/x-icon">
</head>
<body>
    <header class="header">
        <div class="container header__container">
            <div class="header__mobile-menu">
                <div class="header__line"></div>
                <div class="header__line"></div>
                <div class="header__line"></div>
            </div>
            <!-- /.header__mobile-menu -->
            <div class="header__search-block">
                <form action="results.php" method="get">
                    <input type="search" class="header__search" name="text" placeholder="Search">
                    <button type="submit"><img src="img/search-icon.svg" alt="Icon: Search Icon" class="header__search-icon"></button>
                </form>
            </div>
            <!-- /.header__search-block -->
            <a href="index.php" class="header__name-block">
                <img src="img/icon.svg" alt="Icon: logo" class="header__icon">
                <span class="header__name">Любители Истории</span>
            </a>
        </div>
        <!-- /.container -->
    </header>
    <!-- /.header -->
    <section class="mobile-menu-hidden">
        <a href="materials.php?type=lesson&subject=history" class="mobile-link">Уроки по истории</a>
        <a href="materials.php?type=lesson&subject=social" class="mobile-link">Уроки по обществознанию</a>
        <a href="materials.php?type=exams&subject=history" class="mobile-link">ЕГЭ, ОГЭ по истории</a>
        <a href="materials.php?type=exams&subject=social" class="mobile-link">ЕГЭ, ОГЭ по обществознанию</a>
        <a href="materials.php?type=olymp&subject=history" class="mobile-link">Олимпиады по истории</a>
        <a href="materials.php?type=olymp&subject=social" class="mobile-link">Олимпиады по обществознанию</a>
        <a href="news.php" class="mobile-link">Новости</a>
        <a href="about.html" class="mobile-link">Страничка обо мне</a>
    </section>
    <!-- /.header__mobile-menu-hidden -->
    <section class="background">
        <div class="background__image parallax-window" data-parallax="scroll" data-image-src="img/back-one.jpg"></div>
    </section>
    <!-- /.background-image -->
    <section class="hero">
        <div class="container hero__container">
            <div class="hero-left">
                <a href="" class="hero__menu-text-one">Уроки</a>
                <a href="materials.php?type=lesson&subject=history" class="hero__menu-text-two">История</a>
                <a href="materials.php?type=lesson&subject=social" class="hero__menu-text-two">Обществознание</a>
                <a href="" class="hero__menu-text-one">ЕГЭ/ОГЭ</a>
                <a href="materials.php?type=exams&subject=history" class="hero__menu-text-two">История</a>
                <a href="materials.php?type=exams&subject=social" class="hero__menu-text-two">Обществознание</a>
                <a href="" class="hero__menu-text-one">Олимпиады</a>
                <a href="materials.php?type=olymp&subject=history" class="hero__menu-text-two">История</a>
                <a href="materials.php?type=olymp&subject=social" class="hero__menu-text-two">Обществознание</a>
                <a href="" class="hero__menu-text-one">Другое</a>
                <a href="news.php" class="hero__menu-text-two">Новости</a>
                <a href="about.html" class="hero__menu-text-two">Страничка обо мне</a>
            </div>
            <!-- /.hero-left -->
            <div class="hero-right">            

                <?php
                    // Change this to your connection info.
                    setlocale(LC_CTYPE, 'ru_RU.utf8');
                    $DATABASE_HOST = '127.0.0.1';
                    $DATABASE_USER = 'p77750_dbuser';
                    $DATABASE_PASS = '6?nwD216hf$AWn~%';
                    $DATABASE_NAME = 'p77750_db';
                    
                    $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
                    if ( mysqli_connect_errno() ) {
                        exit('Failed to connect to MySQL: ' . mysqli_connect_error());
                    }
                    $type = $_GET["type"];
                    $subject = $_GET["subject"];
                    if($type == "lesson" && $subject == "history"){
                        $select = 0;
                    }else if($type == "lesson" && $subject == "social"){
                        $select = 1;
                    }else if($type == "exams" && $subject == "history"){
                        $select = 2;
                    }else if($type == "exams" && $subject == "social"){
                        $select = 3;
                    }else if($type == "olymp" && $subject == "history"){
                        $select = 4;
                    }else {
                        $select = 5;
                    }
                    $res = mysqli_query($con, "SET NAMES 'utf8'");
                    $result = mysqli_query($con, "SELECT * FROM files WHERE type = '$select' ORDER BY date DESC");

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) { 
                ?>
                <div class="hero__post">
                    <div class="hero__post-meta">
                        <span class="hero__post-date"><?php echo $row["date"]; ?></span>
                        <span class="hero__post-category">Категория: <span class="hero__post-cat">
                            <?php   
                                if($select == 0){
                                    echo "История, уроки";
                                    $link = "https://rybinams.ru/files/lessons-history/";
                                }else if($select == 1){
                                    echo "Обществознание, уроки";
                                    $link = "https://rybinams.ru/files/lessons-social/";
                                }else if($select == 2){
                                    echo "История, экзамены";
                                    $link = "https://rybinams.ru/files/exams-history/";
                                }else if($select == 3){
                                    echo "Обществознание, экзамены";
                                    $link = "https://rybinams.ru/files/exams-social/";
                                }else if($select == 4){
                                    echo "История, олимпиады";
                                    $link = "https://rybinams.ru/files/olymp-history/";
                                }else{
                                    echo "Обществознание, олимпиады";
                                    $link = "https://rybinams.ru/files/olymp-social/";
                                }
                            ?>
                        </span></span>
                    </div>
                    <div class="hero__post-content">
                        Ссылка на файл/ы:
                        <?php
                            $all_links = json_decode($row['path']);
                            if(count($all_links) == 1){
                                $this_link = $link . $all_links[0];
                                ?>
                                <a href="<?php echo $this_link; ?>" class="link-to-file">
                                <?php echo $row["name"]; ?>
                                </a>
                                <br><br>
                                <?php
                            }else{
                                foreach ($all_links as $one_link){
                                    $this_link = $link . $one_link;
                                ?>
                                <a href="<?php echo $this_link; ?>" class="link-to-file">
                                <?php echo $row["name"] . ", " . basename($one_link); ?>
                                </a>
                                <br><br>
                                <?php
                                }
                            }
                            if(isset($_SESSION['user'])){
                                ?>
                                <a href="delete.php?id=<?php echo $row['id'];?>&type=material">Удалить файл/ы</a>
                                <?php
                            }
                        ?>
                    </div>
                    <!-- /.hero__post-content -->
                </div>
                <!-- /.hero__post -->
                <?php
                        }
                    } else {
                        echo "0 results";
                    }
                    mysqli_close($con);
                ?>

                <footer class="hero__footer footer">
                    <span class="footer__text">
                        @ Все материалы можно свободно использовать или копировать
                    </span> <!-- /.footer__text -->
                </footer>
                <!-- /.hero__footer -->
            </div>
            <!-- /.hero-right -->
        </div>
        <!-- /.container -->
    </section>
    <!-- /.hero -->

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/parallax.js"></script>
    <script>
        $(".background__image").parallax({imageSrc: 'img/back-one.jpg', speed: 0.0009, positionY: 'top'});
    </script>
    <script src="js/main.js"></script>
</body>
</html>