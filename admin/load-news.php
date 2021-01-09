<?php

session_start();
date_default_timezone_set('UTC');
// Change this to your connection info.
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'p77750_dbuser';
$DATABASE_PASS = '6?nwD216hf$AWn~%';
$DATABASE_NAME = 'p77750_db';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if ( !isset($_POST["descr"])) {
    exit('Please fill text field!');
}else{
    $text = $_POST["descr"];
    if (!file_exists($_FILES['pic']['tmp_name']) || !is_uploaded_file($_FILES['pic']['tmp_name'])){
        $pic = "None";
    }else{
        $pic = $_FILES["pic"];
        //Now we will generate the path
        $num_oneee = rand(1, 100);
        $num_twoee = rand(1, 100);
        $pathee = "/" . $num_oneee . "/" . $num_twoee . "/" . $pic["name"];
        $rootee = "/news";
        $all_pathee = "../" . "files" . $rootee;
        $basenames = $pic["tmp_name"];
        //create directories
        if (!file_exists($all_pathee . "/" . $num_oneee . "/")) {
            mkdir($all_pathee . "/" . $num_oneee . "/", 0777, true);
        }
        if (!file_exists($all_pathee . "/" . $num_oneee . "/" . $num_twoee . "/")) {
            mkdir($all_pathee . "/" . $num_oneee . "/" . $num_twoee . "/", 0777, true);
        }
        if (file_exists($all_pathee . $pathee)) {
            exit("File already exist! Try another name!");
        }else{
            move_uploaded_file($basenames, $all_pathee . $pathee);
        }
        $pic = $pathee;
    }
    if (!file_exists($_FILES['file']['tmp_name'][0]) || !is_uploaded_file($_FILES['file']['tmp_name'][0])){
        $array_of_paths = "None";
    }else{
        $files = $_FILES["file"];
        $array_of_paths = array();
        foreach (array_combine($files["name"], $files["tmp_name"]) as $item => $basename){
            //Now we will generate the path
            $num_one = rand(1, 100);
            $num_two = rand(1, 100);
            $path = "/" . $num_one . "/" . $num_two . "/" . $item;
            array_push($array_of_paths, $path);
            //now save the file to filesystem
            $root = "/news";
            $all_path = "../" . "files" . $root;
            //create directories
            if (!file_exists($all_path . "/" . $num_one . "/")) {
                mkdir($all_path . "/" . $num_one . "/", 0777, true);
            }
            if (!file_exists($all_path . "/" . $num_one . "/" . $num_two . "/")) {
                mkdir($all_path . "/" . $num_one . "/" . $num_two . "/", 0777, true);
            }
            if (file_exists($all_path . $path)) {
                exit("File already exist! Try another name!");
            }else{
                move_uploaded_file($basename, $all_path . $path);
            }
        }
    }
}
$date = date('Y-m-d H:i:s');
$res = mysqli_query($con, "SET NAMES 'utf8'");
$result = mysqli_query($con, "INSERT INTO news (text, date, picture, path) VALUES ('" . $text . "', '" . $date . "', '" . $pic . "', '" . json_encode($array_of_paths, JSON_UNESCAPED_UNICODE) . "')");
header("Location: home.html");
mysqli_close($con);
?>