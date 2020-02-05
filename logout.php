<<<<<<< HEAD
<?php

include "conn.php";
session_destroy(); 
header("Location: index.php");
mysqli_close($conn);
?>
=======
<?php 
include('header.php');
session_destroy();
header("Location: index.php");

?>
>>>>>>> da76337c1ca8cca2d39a5d9033db2a2246f9d995
