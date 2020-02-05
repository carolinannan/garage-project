<?php
$service_options = "";
$query_services = "SELECT * FROM service";
$result_services = mysqli_query($conn, $query_services);
while($row = mysqli_fetch_array($result_services)){
    $service_options .= "<option value='".$row['id']."'>".$row['service_name']
                        ." - €".$row['service_price']."</options>";
}

$vehicle_selection = "";
$query_vehicle = "SELECT id, plate FROM user_vehicle WHERE user_id =".$_SESSION['id'];
$result_vehicles = mysqli_query($conn, $query_vehicle);
while($row = mysqli_fetch_array($result_vehicles)) {
    $vehicle_selection .= "<option valule='".$row['id']."'>".$row['plate']."</options>";
}
?>