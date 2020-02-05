<?php

include "conn.php";
$name= $_POST["name"];
$contact= $_POST["contact"];
$email= $_POST["email"];
$password= md5($_POST["password"]);
$query= "INSERT INTO users (name, contact, email, password) VALUES ('$name', '$contact', '$email', '$password')"; //Got from data base, took Id IS AuTO INCREMENT
if($conn->query($query)){
    $_SESSION['user'] = $email; //save the information into the data#
    $_SESSION['id'] = $conn->insert_id; //get the last inserted id
    header("Location: my_account.php");
}else{
    session_destroy(); 
    header("Location: index.php");
}
?>