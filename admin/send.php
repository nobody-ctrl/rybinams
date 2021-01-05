<?php
session_start();
// Change this to your connection info.
$DATABASE_HOST = 'p77750_db';
$DATABASE_USER = 'p77750_dbuser';
$DATABASE_PASS = '6?nwD216hf$AWn~%';
$DATABASE_NAME = 'password';
// Try and connect using the info above.
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if ( mysqli_connect_errno() ) {
	// If there is an error with the connection, stop the script and display the error.
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

if ($stmt = $con->prepare('SELECT password FROM password')) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['password']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
    $stmt->store_result();
    
    $stmt->bind_result($password);
	$stmt->fetch();


    if (password_verify($_POST['password'], $password)) {
        // Verification success! User has logged-in!
        // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
        session_regenerate_id();
        $_SESSION['loggedin'] = TRUE;
        echo 'Welcome!';
    } else {
        // Incorrect password
        echo 'Incorrect username and/or password!';
    }


	$stmt->close();
}

?>