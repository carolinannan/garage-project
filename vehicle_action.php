<?php
include ('conn.php'); //add more information
$model = $_POST["model"];
$make = $_POST["make"];
$plate = $_POST["plate"];
$type = $_POST['car_type'];
// $user_id = $_SESSION['id']; 
$user_id= 1;

// eu não preciso ' pq é int no meu database
$query = "INSERT INTO car_make (model, make, car_type_id) VALUES ('$model', '$make', $type)";

if (mysqli_query($conn, $query))
{ //1 só queremos a ultima informação, decrescent
    $query = "SELECT id FROM car_make ORDER BY id DESC LIMIT 1";
    if ($result = mysqli_query($conn, $query))
    {
        $row = mysqli_fetch_assoc($result);
        $rowcount = mysqli_num_rows($result);
        if ($rowcount === 1)
        {
            $car_make_id = $row['id'];

            $query = "INSERT INTO user_vehicle (car_make_id, user_id, plate) VALUES ($car_make_id, $user_id, '$plate')";
            if (mysqli_query($conn, $query))
            {
                header("Location: index.php");
            }
            else
            {
                echo $query;
                echo "register of vehicle fail";
            }

        }
        else
        {
            echo $query;
            echo "Select the last ID failed";

        }
    }

}
else
{
    echo $query;
    echo "the register of the car_make is fail";

}
//QUERY TO INSERT THIS DATA

?>