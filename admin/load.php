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
if ( !isset($_POST["name"]) || !isset($_POST["choice"]) || !file_exists($_FILES['file']['tmp_name'][0]) || !is_uploaded_file($_FILES['file']['tmp_name'][0]) ) {
    exit('Please fill all fields!');
}else{
    $name = $_POST["name"];
    $choice = $_POST["choice"];
    $date = date('Y-m-d H:i:s');
    $files = $_FILES["file"];
    $array_of_paths = array();
    foreach (array_combine($files["name"], $files["tmp_name"]) as $item => $basename){
        //Now we will generate the path
        $num_one = rand(1, 100);
        $num_two = rand(1, 100);
        $path = "/" . $num_one . "/" . $num_two . "/" . $item;
        array_push($array_of_paths, $path);
        //now save the file to filesystem
        if($choice == 0){
            $root = "/lessons-history";
        }else if($choice == 1){
            $root = "/lessons-social";
        }else if($choice == 2){
            $root = "/exams-history";
        }else if($choice == 3){
            $root = "/exams-social";
        }else if($choice == 4){
            $root = "/olymp-history";
        }else{
            $root = "/olymp-social";
        }
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
$res = mysqli_query($con, "SET NAMES 'utf8'");
$result = mysqli_query($con, "INSERT INTO files (name, type, date, path) VALUES ('" . $name . "', '" . $choice . "', '" . $date . "', '" . json_encode($array_of_paths, JSON_UNESCAPED_UNICODE) . "')");
header("Location: home.html");
mysqli_close($con);
?>