<?php

include "conn.php";
session_destroy(); 
header("Location: index.php");
mysqli_close($conn);
?>