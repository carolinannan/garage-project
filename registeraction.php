<?php

include "conn.php";
$user= $_POST["user"];
$password= md5($_POST["password"]);
$query= "INSERT INTO user (user_name, password) VALUES ('$user', '$password')"; //Got from data base, took Id IS AuTO INCREMENT
if(mysqli_query($conn, $query)) {
    $_SESSION['user'] = $user; //save the information into the data
    header("Location: index.php");
}else{
    session_destroy(); 
    header("Location: index.php");
}
?>