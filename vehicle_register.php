<?php 
include('header.php');

$brandOptions = "";
$queryBrand = "SELECT * FROM brand";
$result = mysqli_query($conn, $queryBrand);
while ($row = mysqli_fetch_array($result)) {
  $brandOptions .= "<option value='".$row['id']."'>".$row['brand']."</option>";
}
?>

<script>

function getModels(){
  var brand = $('#brand').val();
  var model = $('#model');
  var firstOp = '<option value="">Select a Model</option>';
  model.empty();
  if (brand == 0){
    model.append(firstOp);
  }else{
    var request;
    request = $.ajax({
      url: "get_models.php",
      type: "post",
      data: {"brand": brand}
    })
    .done(function(data){
      model.append(data);
    });
  }
} 

</script>

<div class="vehicleBody">
  <div class="container ">
    <div class="row">
        <div class="col align-self-center tableBg">
          <h1>Vehicle Register</h1>
          <form id="vehicleForm" name="vehicleForm"  class="form-user" method="POST" action="vehicleaction.php">
            <div class="form-label-group">
              <input id="plate" name="plate" type="text"  required class="form-control" placeholder="License Plate">
            </div>
            <div class="form-label-group">
              <select class="form-control"  name="brand" id="brand" required onChange="getModels()" >
                <option value="">Select a Brand</option>
                <?php echo $brandOptions; ?>
              </select>
            </div>
            <div class="form-label-group">
              <select class="form-control"  name="model" id="model" required >
                <option value="">Select a Model</option>
              </select>
            </div>
            <div class="form-label-group">
              <select class="form-control" required name="type" id="type" >
                <option value="">Select a Type</option>
                <option value="Car">Car</option>
                <option value="Van">Van</option>
                <option value="Truck">Truck</option>
              </select>
            </div>
            <div class="form-label-group">
              <button class="btn btn-lg btn-primary btn-block" type="submit">Register Vehicle</button>
            </div>
          </form>
        </div>
    </div>
  </div>
</div>


<?php
include('footer.php');
?>
