

<?php 
include('header.php');
$daysArray = array(
  date( 'Y-m-d', strtotime( 'monday this week' ) ),
  date( 'Y-m-d', strtotime( 'tuesday this week' ) ),
  date( 'Y-m-d', strtotime( 'wednesday this week' ) ),
  date( 'Y-m-d', strtotime( 'thursday this week' ) ),
  date( 'Y-m-d', strtotime( 'friday this week' ) ),
  date( 'Y-m-d', strtotime( 'saturday this week' ) ),
); 
$bookingDateOtpions = "";
$disabledDateCount = 0;
foreach ($daysArray as $day) {
  $dayOfWeek = date('l', strtotime($day));
  $dayForUser = date("d/m/Y", strtotime($day));
  if ($day <=date("Y-m-d")){
    $disabledDateCount++;
    $bookingDateOtpions .= "<option disabled value='".$day."'>".$dayOfWeek."(".$dayForUser.") - Too Late </option>";
  }else{
    $bookingDateOtpions .= "<option value='".$day."'>This ".$dayOfWeek."(".$dayForUser.")</option>";
  }
}

$serviceOptions = "";
$queryService = "SELECT * FROM service";
$result = mysqli_query($conn, $queryService);
while ($row = mysqli_fetch_array($result)) {
  $serviceOptions .= "<option value='".$row['id']."'>".$row['name']." - Price: $".$row['price']."</option>";
}

$vehiclesOption = "";
$queryVehicles = "SELECT
                    user_vehicles.id,
                    brand.brand,
                    model.model,
                    user_vehicles.plate
                  FROM
                    user_vehicles
                  INNER JOIN brand ON user_vehicles.id_brand = brand.id
                  INNER JOIN model ON user_vehicles.id_model = model.id
                  WHERE user_vehicles.id_user =".$_SESSION['id'];

if ($result = mysqli_query($conn, $queryVehicles)){
  $num_rows = mysqli_num_rows($result);
  if ($num_rows == 0){
    $vehiclesOption .= "<input type='hidden 'name='user_vehicles'  class='form-control' value='0'>";
  header('Location: vehicle_register.php'); 
  }
  $vehiclesOption = "<select id='user_vehicles' name='user_vehicles'  class='form-control'>
                      <option value='0'>Select a Vehicle</option>";
  while ($row = mysqli_fetch_array($result)) {
    $vehiclesOption .= "<option value='".$row['id']."'>".$row['plate']." - ".$row['brand']." - ".$row['model']."</option>";
  }
  $vehiclesOption .= "</select>";
}
?>
<script>

function validateForm(){
  var date_in = document.getElementById("date_in").value;
  var service = document.getElementById("service").value;
  var user_vehicles = document.getElementById("user_vehicles").value;
  var formValidate = false;
  if (date_in == 0){
    alert('Select a Booking Date');
    formValidate =  false;
  }else {
    formValidate = true;
  }
  if (service == 0){
    alert('Select a Service');
    formValidate = false;
  }else {
    formValidate = true;
  }
  if (date_in == 0){
    alert('Select/Register a Vehicle');
    formValidate = false;
  }else {
    formValidate = true;
  }
  if (formValidate){
    document.getElementById('bookingForm').action = "bookingaction.php";
    document.getElementById("bookingForm").submit();
  }
}

</script>

<div class="bookingBody">
  <div class="container ">
    <div class="row">
      <div class="col align-self-center tableBg">
        <h1>Booking</h1>
        <form id="bookingForm" name="bookingForm" class="form-user" method="POST">
          <div class="form-label-group">
            <select class="form-control" name="date_in" id="date_in" >
              <option value="0">Select da Date for Booking</option>
              <?php echo $bookingDateOtpions; ?>
            </select>
            <p><i>If there is no Booking Date available, wait for next week. If you want book for Today, Call Us</i></p>
          </div>
          <div class="form-label-group">
            <select class="form-control" name="service" id="service" >
              <option value="0">Select a Service</option>
              <?php echo $serviceOptions; ?>
            </select>
          </div>
          <input type="hidden" value="<?php echo $_SESSION['id'] ?>" id="user_id" name="user_id">
          <div class="form-label-group">
            <?php echo $vehiclesOption ?>
          </div>
          <div class="form-label-group">
            <button class="btn btn-lg btn-primary btn-block" onClick="validateForm()">Book Now</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php
include('footer.php');
?>
