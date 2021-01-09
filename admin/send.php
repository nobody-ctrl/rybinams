<?php

session_start();
// Change this to your connection info.
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'p77750_dbuser';
$DATABASE_PASS = '6?nwD216hf$AWn~%';
$DATABASE_NAME = 'p77750_db';

$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
if ( !isset($_POST['password']) ) {
    exit('Please fill password field!');
}else{
    $password = $_POST['password'];
}
// $password = password_hash($password, PASSWORD_BCRYPT);
// $result = mysqli_query($con, "INSERT INTO password (pass) VALUES ('" . $password . "')");
$passtable = mysqli_query($con, "SELECT pass FROM password");
$passtable = mysqli_fetch_array($passtable)[0];
if(password_verify($password, $passtable)){
    // echo ("You are now logged in!");
    $_SESSION['user'] = "admin";
    header("Location: home.php");
}else{
    exit ("Your password is not correct!");
}

mysqli_close($con);

?>