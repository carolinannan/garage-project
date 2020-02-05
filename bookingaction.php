<?php

include "conn.php";
$user_id = $_POST["user_id"];
$dateIn = $_POST["date_in"];
$service = $_POST["service"];
$vehicle = $_POST["user_vehicles"];
$query= "INSERT INTO booking (id_user, id_service, id_vehicle, date_in) 
VALUES ('$user_id', '$service', '$vehicle', '$dateIn')"; //Got from data base, took Id IS AuTO INCREMENT
if(mysqli_query($conn, $query)) {
    header("Location: my_account.php"); //it was thank u before
}else{
    header("Location: error.php");
}
?>