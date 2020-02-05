

<?php 
include('header.php');
$query = "SELECT
brand.brand,
model.model,
user_vehicles.plate,
user_vehicles.type
FROM
   user_vehicles
INNER JOIN brand ON user_vehicles.id_brand = brand.id
INNER JOIN model ON user_vehicles.id_model = model.id
WHERE 
   user_vehicles.id_user = ". $_SESSION['id'];
$table = "";

$result = mysqli_query($conn, $query);
if($result){
while ($row = mysqli_fetch_array($result)) { //running one by one. Just a line with all the collunm
  $table = $table ."<tr>
                      <td>".$row['brand']."</td>
                      <td>".$row['model']."</td>
                      <td>".$row['plate']."</td>
                      <td>".$row['type']."</td>
                    </tr>";
}
}
?>

<div class="bookingBody">
    <div class="container ">
        <div class="row">
            <div class="col align-self-center table-responsive tableBg">
            <h1>History</h1>
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>  
                        <th scope="col">BRAND</th>
                        <th scope="col">MODEL</th>
                        <th scope="col">PLATE</th>
                        <th scope="col">TYPE</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php echo $table ?>
                    </tbody>
                </table>
                <div class="form-label-group">
                    <a href="vehicle_register.php"><button class="btn btn-lg btn-primary btn-block">Register a New Vehicle</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
