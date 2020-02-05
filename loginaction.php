<?php

include "conn.php";
$email= $_POST["email"];
$password= md5($_POST["password"]);
$query = "SELECT * FROM users WHERE email='$email' and password='$password' ";
if ($result = mysqli_query($conn, $query) ){
$row = mysqli_fetch_assoc($result);
$rowcount=mysqli_num_rows($result);
if ($rowcount === 1) { 
<<<<<<< HEAD
    $_SESSION['user'] = $row['email'];
    $_SESSION['id'] = $row['id'];
    header("Location: my_account.php");
=======
    $_SESSION['user'] = $row['user_name'];
    $_SESSION['id'] = $row['id'];
    echo $_SESSION['user'];
    header("Location: index.php");
>>>>>>> da76337c1ca8cca2d39a5d9033db2a2246f9d995
} else { 
    session_destroy(); 
    header("Location: index.php");
}
}
mysqli_close($conn);
?>