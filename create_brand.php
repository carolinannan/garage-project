<?php

include "conn.php";
$brand = $_POST['brand'];

$query = "INSERT INTO brand (brand) VALUES ('".$brand."')";
if($conn->query($query)){
  echo 'ok';
}else{
  echo $query;
}



mysqli_close($conn);
?>