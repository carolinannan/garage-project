<?php

include "conn.php";
$startDate = $_POST["startDate"];
$endDate = $_POST["endDate"];
$table = "";
$query = "SELECT
            booking.id,
            users.name AS userName,
            booking.date_in,
            booking.date_out,
            service.name,
            status.status,
            status.id AS statusId,
            mechanic.name AS mechanicName,
            mechanic.id AS mechanicId,
            brand.brand,
            model.model,
            user_vehicles.plate
          FROM
            booking
          INNER JOIN users ON booking.id_user = users.id
          INNER JOIN service ON booking.id_service = service.id
          INNER JOIN status ON booking.id_status = status.id
          INNER JOIN user_vehicles ON booking.id_vehicle = user_vehicles.id
          INNER JOIN brand ON user_vehicles.id_brand = brand.id
          INNER JOIN model ON user_vehicles.id_model = model.id
          INNER JOIN mechanic ON booking.id_mechanic = mechanic.id
          WHERE date_in BETWEEN '".$startDate."' AND '".$endDate."'";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) {
  $dateIn = date("d/m/Y", strtotime($row['date_in']));
  $dateOut = $row['date_out'];
  if($dateOut == ""){
    $dateOutJs ='"0"';
    $dateOut = "-";
  }else{
    $dateOutJs ='"'.$dateOut.'"'; 
    $dateOut = date("d/m/Y", strtotime($dateOut));
    
  }
  $table .= "<tr>  
              <td scope='col'>".$row['id']."</td>
              <td scope='col'>".$row['userName']."</td>
              <td scope='col'>".$dateIn."</td>
              <td scope='col'>".$dateOut."</td>
              <td scope='col'>".$row['name']."</td>
              <td scope='col'>".$row['status']."</td>
              <td scope='col'>".$row['mechanicName']."</td>
              <td scope='col'>".$row['brand']."</td>
              <td scope='col'>".$row['model']."</td>
              <td scope='col'>".$row['plate']."</td>
              <td scope='col'><button class='btn btn-primary btn-block' onClick='editBookings(".$row['id'].", ".$row['statusId'].", ".$row['mechanicId'].",".$dateOutJs.")'>Edit Booking</button</td>
            </tr>
  ";
}
echo $table;
mysqli_close($conn);
?>