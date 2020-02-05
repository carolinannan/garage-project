<?php

include "conn.php";
$brand = $_POST['brand'];
$model = $_POST['model'];


$query = "INSERT INTO model (id_brand, model) VALUES (".$brand.", '".$model."')";
if($conn->query($query)){
  echo 'ok';
}else{
  echo $query;
}



mysqli_close($conn);
?>