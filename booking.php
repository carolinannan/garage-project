

<?php 
include('header.php');
<<<<<<< HEAD
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
=======
include('bookingOptions.php');
?>

<script>
//quando carrega a página usa essa funcao para gerar as opções em dropdown 
window.onload = function() {
  getDateOptions();
}

function getDateOptions(){
  var request;
  request = $.ajax({
    url:"bookingValidation.php",
    type: "get",
    data: ""
  }).done(function (data){
    console.log(data);
    var dateSelect = document.getElementById("date-in");
    var dateList = data.split("@");

    for(i=0; i < dateList.length; i++){
      var dateInfo = dateList[i];
      var dateOption = new Option(dateInfo, dateInfo);
      dateSelect.options.add(dateOption);
    }
  }).fail(function (){
                alert ("erro");
            });
}

</script>
<p>Date: <select name="date-in" id="date-in" >

</select></p>

<p>Service: <select name="service" id="service" >
  <?php echo $service_options; ?>
</select></p>

<p>Vehicle: <select name="vehicle" id="vehicle">
<?php echo $vehicle_selection; ?>
</select></p>
<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION['id'] ?>" />
</form>


<?php

            
            $query ="SELECT
            book.date_in,
            book.date_out,
            user.user_name,
            user.id,
            serv.service_name,
            sts.status,
            vehicle.make,
            vehicle.model,
            user_vehicle.plate
        FROM
            booking as book, 
            user as user, 
            service as serv, 
            status as sts, 
            car_make as vehicle, 
            user_vehicle as user_vehicle
        WHERE 
            book.user_id = user.id 
            and book.service_id = serv.id 
            and book.status_id = sts.id 
            and book.vehicles_id = user_vehicle.id
            and user_vehicle.car_make_id  = vehicle.id";
            $result = mysqli_query($conn, $query);
        ?>
        
        <table class="table table-bordered">
  <thead>
    <tr>
     
     
      <th scope="col">DATE IN</th>
      <th scope="col">DATE OUT</th>
      <th scope="col">NAME</th>
      <th scope="col">ID</th>
      <th scope="col">SERVICE</th>
      <th scope="col">STATUS</th>
      <th scope="col">MAKE</th>
      <th scope="col">MODEL</th>
      <th scope="col">PLATE</th>
>>>>>>> da76337c1ca8cca2d39a5d9033db2a2246f9d995

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
