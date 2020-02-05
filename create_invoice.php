<?php

include "conn.php";
$bookingId = $_POST['bookingId'];
$mechanicId = $_POST['mechanicId'];
$itemId = $_POST['itemId'];
$statusId = $_POST["statusId"];
$dateOut = $_POST["dateOut"];

$total = 0;
$invoiceId = 0;
$queryServicePrice = "SELECT price FROM booking INNER JOIN service ON service.id = booking.id_service WHERE booking.id = ".$bookingId;
$result = mysqli_query($conn, $queryServicePrice);
while ($row = mysqli_fetch_array($result)) {
    $total = $total + $row[0];
}

$queryPartPrice = "SELECT price FROM vehicle_parts WHERE id= ".$itemId;
$result = mysqli_query($conn, $queryPartPrice);
while ($row = mysqli_fetch_array($result)) {
  $total = $total + $row[0];
}

$queryCheckInvoice = "SELECT id FROM invoice WHERE id_booking=".$bookingId;
$result = mysqli_query($conn, $queryCheckInvoice);
while ($row = mysqli_fetch_array($result)) {
  $invoiceId = $row[0];
}

$queryInvoice = "";
if($invoiceId == 0){
  $queryInvoice = "INSERT INTO invoice (id_part, id_booking, price) VALUES (".$itemId.", ".$bookingId.", '".$total."')";
}else{
  $queryInvoice = "UPDATE invoice SET id_part=".$itemId.", id_booking=".$bookingId.", price='".$total."' WHERE  id=".$invoiceId."";
}
if($conn->query($queryInvoice)){
  echo 'ok';
}else{
  echo $queryInvoice;
}



mysqli_close($conn);
?>