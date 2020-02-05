<?php

include "conn.php";
<<<<<<< HEAD
$user_id = $_POST["user_id"];
$dateIn = $_POST["date_in"];
$service = $_POST["service"];
$vehicle = $_POST["user_vehicles"];
$query= "INSERT INTO booking (id_user, id_service, id_vehicle, date_in) 
VALUES ('$user_id', '$service', '$vehicle', '$dateIn')"; //Got from data base, took Id IS AuTO INCREMENT
if(mysqli_query($conn, $query)) {
    header("Location: my_account.php"); //it was thank u before
=======
$user_id= $_POST["user_id"];
$dateIn = $_POST["date-in"];
$service = $_POST["service"];
$vehicle = $_POST["vehicle"];
$query= "INSERT INTO booking (user_id, service_id, vehicle_id, date_in) 
VALUES ('$user_id', '$service', '$vehicle', '$dateIn')"; //Got from data base, took Id IS AuTO INCREMENT
if(mysqli_query($conn, $query)) {
    header("Location: thankyou.php");
>>>>>>> da76337c1ca8cca2d39a5d9033db2a2246f9d995
}else{
    header("Location: error.php");
}
?>