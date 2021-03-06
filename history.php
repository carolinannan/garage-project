

<?php 
include('header.php');
$query = "SELECT
booking.id,
booking.date_in,
booking.date_out,
service.name,
status.status,
brand.brand,
model.model,
user_vehicles.plate
FROM
booking
INNER JOIN service ON booking.id_service = service.id
INNER JOIN status ON booking.id_status = status.id
INNER JOIN user_vehicles ON booking.id_vehicle = user_vehicles.id
INNER JOIN brand ON user_vehicles.id_brand = brand.id
INNER JOIN model ON user_vehicles.id_model = model.id
WHERE
booking.id_user =". $_SESSION['id'];
$table = "";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) { //running one by one. Just a line with all the collunm
  $table = $table ."<tr>
                      <td>".$row['id']."</td>
                      <td>".$row['date_in']."</td>
                      <td>".$row['date_out']."</td>
                      <td>".$row['name']."</td>
                      <td>".$row['status']."</td>
                      <td>".$row['brand']."</td>
                      <td>".$row['model']."</td>
                      <td>".$row['plate']."</td>
                    </tr>";
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
                        <th scope="col">Reference ID</th>
                        <th scope="col">DATE IN</th>
                        <th scope="col">DATE OUT</th>
                        <th scope="col">SERVICE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">BRAND</th>
                        <th scope="col">MODEL</th>
                        <th scope="col">PLATE</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php echo $table ?>
                    </tbody>
                </table>
                <div class="form-label-group">
                    <a href="booking.php"><button class="btn btn-lg btn-primary btn-block">Book a New Service</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
