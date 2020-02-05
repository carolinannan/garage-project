<?php

include "conn.php";
$email= $_POST["email"];
$password= md5($_POST["password"]);
$query = "SELECT * FROM users WHERE email='$email' and password='$password' ";
if ($result = mysqli_query($conn, $query) ){
$row = mysqli_fetch_assoc($result);
$rowcount=mysqli_num_rows($result);
if ($rowcount === 1) { 
    $_SESSION['user'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    header("Location: my_account.php");
} else { 
    session_destroy(); 
    header("Location: index.php");
}
}
mysqli_close($conn);
?>