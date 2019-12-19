<?php

include "conn.php";
$user= $_POST["user"];
$password= md5($_POST["password"]);
$query = "SELECT * FROM user WHERE user_name='$user' and password='$password' ";
if ($result = mysqli_query($conn, $query) ){
$row = mysqli_fetch_assoc($result);
$rowcount=mysqli_num_rows($result);
if ($rowcount === 1) { 
    $_SESSION['user'] = $row['user_name'];
    $_SESSION['id'] = $row['user_name'];
    echo $_SESSION['user'];
    header("Location: index.php");
} else { 
    session_destroy(); 
    header("Location: index.php");
}
}
echo $password; 
mysqli_close($conn);
?>