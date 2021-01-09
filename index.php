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
                <div class="hero__greetings">
                    <div class="hero__greetings-first">
                        <span class="hero__greetings-text">Приветствие</span>
                    </div>
                    <!-- /.hero__greetings-first -->
                    <div class="hero__greetings-second">
                        <img src="img/avatar.png" alt="Icon: avatar" class="hero__greetings-avatar">
                        <span class="hero__greetings-span">Приветствую Вас на сайте учителя истории и обществознания Гимназии №5 города Рязани Рыбиной Марии Сергеевны. Надеюсь, что предложенные материалы будут Вам полезны.</span>
                    </div>
                    <!-- /.hero__greetings-second -->
                </div>
                <!-- /.hero__greetings -->
                <?php
                    session_start();
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
                    $res = mysqli_query($con, "SET NAMES 'utf8'");
                    $result = mysqli_query($con, "SELECT * FROM news ORDER BY date DESC");

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        while($row = mysqli_fetch_assoc($result)) { 
                ?>
                <div class="hero__post">
                    <div class="hero__post-meta">
                        <span class="hero__post-date"><?php echo $row["date"]; ?></span>
                        <span class="hero__post-category">Категория: <span class="hero__post-cat">
                            Новости
                        </span></span>
                    </div>
                    <div class="hero__post-content news">
                        <div class="news-left">
                            <?php
                            $pic = $row["picture"];
                            if ($pic != "None"){
                            ?>
                                <img src="https://rybinams.ru/files/news<?php echo $pic; ?>" class="news-image">
                            <?php
                            }
                            ?>
                        </div>
                        <div class="news-right">
                            <?php
                                echo $row["text"];
                                echo "<br><br>";
                                $all_links = json_decode($row['path']);
                                foreach ($all_links as $one_link){
                                    $this_link = "https://rybinams.ru/files/news" . $one_link;
                                ?>
                                <a href="<?php echo $this_link; ?>" class="link-to-file">
                                <?php echo basename($one_link); ?>
                                </a>
                                <br><br>
                                <?php
                                }
                            ?>
                        </div>
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
        $(".background__image").parallax({imageSrc: 'img/back-one.jpg', speed: 0.0009, positionY: 'bottom'});
    </script>
    <script src="js/main.js"></script>
</body>
</html>