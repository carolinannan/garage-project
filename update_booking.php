<?php

include "conn.php";
$bookingId = $_POST['bookingId'];
$mechanicId = $_POST['mechanicId'];
$itemId = $_POST['itemId'];
$statusId = $_POST["statusId"];
$dateOut = $_POST["dateOut"];
if ($dateOut == "" ){
  $dateOut = " ";
}else{
  $dateOut = ", date_out ='".$dateOut."' ";
}

$query = "UPDATE booking SET id_status='".$statusId."', id_mechanic='".$mechanicId."'".$dateOut." WHERE  id=".$bookingId;
if($conn->query($query)){
  echo 'ok';
}else{
  echo $query;
}
mysqli_close($conn);
?>