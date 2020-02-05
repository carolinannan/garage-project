<?php
if (session_status() == PHP_SESSION_ACTIVE) { 
    echo '';
  }else{
        session_start();
  }
//session_start();

$servername = "127.0.0.1";
$username = "root";
$password = "";
$databasename = "garage";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $databasename);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


//time settings for mechanic
$MAX_TIME = 4;

?> 