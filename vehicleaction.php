<?php
include ('conn.php'); //add more information
$plate = $_POST["plate"];
$model = $_POST["model"];
$brand = $_POST["brand"];
$plate = $_POST["plate"];
$type = $_POST['type'];
$user_id = $_SESSION['id']; 

// eu não preciso ' pq é int no meu database
$query = "INSERT INTO user_vehicles (id_user, id_model, id_brand, type, plate) VALUES ($user_id, $model, $brand, '$type', '$plate')";
if($conn->query($query)){
    header("Location: my_account.php");
}else{
    echo "something went wrong!";
}
?>