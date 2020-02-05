<?php

include "conn.php";
$bookingId = $_POST["bookingId"];
$itemOptions = "";
$queryitem = "SELECT invoice.id_part FROM invoice INNER JOIN vehicle_parts ON invoice.id_part = vehicle_parts.id WHERE invoice.id_booking =".$bookingId;
$result = mysqli_query($conn, $queryitem);
while ($row = mysqli_fetch_array($result)) {
  echo $row['id_part'] ;
}
mysqli_close($conn);
?>