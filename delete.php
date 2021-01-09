<?php
    session_start();
    if(!isset($_SESSION['user']) || !isset($_GET['id']) || !isset($_GET['type'])){
        header("Location: index.php");
    }else{
        $id = $_GET['id'];
        $type = $_GET['type'];
        // Change this to your connection info.
        $DATABASE_HOST = '127.0.0.1';
        $DATABASE_USER = 'p77750_dbuser';
        $DATABASE_PASS = '6?nwD216hf$AWn~%';
        $DATABASE_NAME = 'p77750_db';

        $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        if ( mysqli_connect_errno() ) {
        	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }
        if($type == "material"){
            $result = mysqli_query($con, "DELETE FROM files WHERE id = '$id'");
        }else{
            $result = mysqli_query($con, "DELETE FROM news WHERE id = '$id'");
        }

        mysqli_close($con);
        header("Location: index.php");
    }
?>