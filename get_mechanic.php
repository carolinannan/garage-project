<?php

include "conn.php";
$bookingId = $_POST["bookingId"];
$mechanicId = $_POST["mechanicId"];

$dateIn = "";
$serviceTime = 0;
$queryGetDateIn = "SELECT date_in FROM booking WHERE id =".$bookingId;
$result = mysqli_query($conn, $queryGetDateIn);
while ($row = mysqli_fetch_array($result)) {
  $dateIn = $row['date_in'];
}

$queryServiceTime = "SELECT time FROM booking INNER JOIN service ON booking.id_service = service.id WHERE booking.id =".$bookingId;
$result = mysqli_query($conn, $queryServiceTime);
while ($row = mysqli_fetch_array($result)) {
  $serviceTime = $row['time'];
}



$mechanicOptions = "";
$queryMechanic = "SELECT * FROM mechanic ORDER BY id ASC";
$result = mysqli_query($conn, $queryMechanic);
$test = 0 ;
while ($row = mysqli_fetch_array($result)) {
  if ($row['id'] == 1){
    $mechanicOptions .= "<option value='".$row['id']."'>".$row['name']."</option>";  
  }else{
    if ($mechanicId == $row['id']){
      $mechanicOptions .= "<option selected value='".$row['id']."'>".$row['name']."</option>";
    }else{
      $mechPos = $row['id'];
      $queryServiceTime = "SELECT 
                              sum(service.time) AS timespent 
                            FROM 
                              booking 
                            INNER JOIN 
                              service ON booking.id_service = service.id 
                            WHERE 
                              booking.date_in = '".$dateIn."' AND id_mechanic = ".$mechPos." GROUP BY id_mechanic ";
      $result2 = mysqli_query($conn, $queryServiceTime);
      if ($row2 = mysqli_fetch_array($result2)) {
        $totalTime = $row2['timespent'] + $serviceTime;
        if($totalTime >= $MAX_TIME){
          $mechanicOptions .= "<option disabled value='".$row['id']."'>".$row['name']." - EXCEED work period</option>";
        }
      }else{
        $mechanicOptions .="<option value='".$row['id']."'>".$row['name']."</option>"; 
      }
    }
  }
}
echo $mechanicOptions;
mysqli_close($conn);
?>