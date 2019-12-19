<?php 
include('header.php');

$query = "SELECT * FROM car_type"; 
$result = mysqli_query($conn, $query);
?>

<form class="form-signin" action="vehicle_action.php" method="POST">
<label for="model" class="sr-only">model</label>
  <input type="text" id="model" name="model" class="form-control" placeholder="model" required="" autofocus="">
  <label for="plate" class="sr-only">plate</label>
  <input type="text" id="plate" name="plate" class="form-control" placeholder="plate" required="" autofocus="">
  <label for="make" class="sr-only">make</label>
  <input type="text" id="make" name="make" class="form-control" placeholder="make" required="" autofocus="">
  
  <label for="car_type" class="sr-only">make</label>
  <select id="car_type" name="car_type">
  <?php 
  while ($row = mysqli_fetch_array($result)) {
  ?>
  <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name']; ?></option>
  <?php } ?>
</select>

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
  

</form>


<?php
include('footer.php');
?>
