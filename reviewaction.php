<?php

include "conn.php";
$title = $_POST["title"];
$stars = $_POST["stars"];
$review = $_POST["review"];
$id_user = $_SESSION['id']; 
$query= "INSERT INTO review (id_user, stars, title, review) VALUES ($id_user, $stars, '$title', '$review')";
if($conn->query($query)){
    header("Location: my_account.php");
}else{
    echo "Something went wrong!";
}
?>