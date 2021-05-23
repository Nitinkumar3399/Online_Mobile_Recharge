<?php
/*
This file contains database configuration assuming you are running mysql using user "root" and password ""
*/
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'u118805821_RootMR');
define('DB_PASSWORD', 'Geek@86533399');
define('DB_NAME', 'u118805821_OnlineMR');

// Try connecting to the Database
$con = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//Check the connection
if($con == false){
    die("Connection failed: " . mysqli_connect_error());
}

?>