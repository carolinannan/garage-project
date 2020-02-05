

<?php 
include('header.php');

$statusOptions = "";
$queryStatusOptions = "SELECT * FROM status ORDER BY id ASC";
$result = mysqli_query($conn, $queryStatusOptions);
while ($row = mysqli_fetch_array($result)) {
  $statusOptions .= "<option value='".$row['id']."'>".$row['status']."</option>";
}

$itemOptions = "";
$queryItemOptions = "SELECT * FROM vehicle_parts ORDER BY id ASC";
$result = mysqli_query($conn, $queryItemOptions);
while ($row = mysqli_fetch_array($result)) {
  $itemOptions .= "<option value='".$row['id']."'>".$row['name']." - Price: $".$row['price']."</option>";
}

?>

<script>

function searchBookings(){
  var startDate = $('#startDate').val();
  var endDate = $('#endDate').val();
  var tblBookings  = $('#tblBookings');
  $('#formBooking').hide();
  if(startDate == "" || endDate == ""){
      alert('Please fill the dates fields!');
  }else{
    tblBookings.empty();
    var request;
    request = $.ajax({
      url: "get_bookings.php",
      type: "post",
      data: {"startDate": startDate, "endDate": endDate}
    })
    .done(function(data){
        tblBookings.append(data);
    });
  }
} 

function editBookings(bookingId, statusId, mechanicId, partsId, dateOut){
    var form = $('#formBooking');
    var itemField = $('#item');
    var mechanicField = $('#mechanic');
    var statusField = $('#status');
    var dateOutField = $('#date_out');
    $('#bookingId').val(bookingId);
    mechanicField.empty();
    statusField.val(statusId);
    if (dateOut == 0){
        dateOutField.val('');
    }else{
        dateOutField.val(dateOut);
    }
    request = $.ajax({
      url: "get_mechanic.php",
      type: "post",
      data: {"bookingId": bookingId, "mechanicId": mechanicId}
    })
    .done(function(data){
        mechanicField.append(data);
    });
    request = $.ajax({
      url: "get_parts.php",
      type: "post",
      data: {"bookingId": bookingId}
    })
    .done(function(data2){
        var res = data2.trim();
        if (res == ""){
            res = 1;
        }
        itemField.val(res);
    });
    form.show();
}

function createInvoice(){
    var form = $('#formBooking');
    var itemId = $('#item').val();
    var mechanicId = $('#mechanic').val();
    var statusId = $('#status').val();
    var dateOut = $('#date_out').val();
    var bookingId = $('#bookingId').val();
    form.hide();
    request = $.ajax({
      url: "create_invoice.php",
      type: "post",
      data: {"bookingId": bookingId, "mechanicId": mechanicId, "itemId": itemId, "statusId": statusId, "dateOut": dateOut}
    })
    .done(function(data){
        searchBookings();
    });
}

function updateBooking(){
    var form = $('#formBooking');
    var itemId = $('#item').val();
    var mechanicId = $('#mechanic').val();
    var statusId = $('#status').val();
    var dateOut = $('#date_out').val();
    var bookingId = $('#bookingId').val();
    form.hide();
    request = $.ajax({
      url: "update_booking.php",
      type: "post",
      data: {"bookingId": bookingId, "mechanicId": mechanicId, "itemId": itemId, "statusId": statusId, "dateOut": dateOut}
    })
    .done(function(data){
        searchBookings();
    });
}

</script>

<div class="bookingBody">
    <div class="container ">
        <div class="row">
            <div class="col align-self-center table-responsive tableBg">
                <h1>Manage Bookings</h1>
                <div class="row">
                    <div class="col">
                        <div class="form-label-group">
                            <label>Start Date:</label>
                            <input id="startDate" name="startDate" required type="date" class="form-control" required placeholder="Start Date">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <label>End Date:</label>
                            <input id="endDate" name="endDate" required type="date" class="form-control" required placeholder="End Date">
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <label> </label>
                            <button class="btn btn-lg btn-primary btn-block" onClick="searchBookings()">Search Bookings</button>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>  
                        <th scope="col">Reference ID</th>
                        <th scope="col">USER NAME</th>
                        <th scope="col">DATE IN</th>
                        <th scope="col">DATE OUT</th>
                        <th scope="col">SERVICE</th>
                        <th scope="col">STATUS</th>
                        <th scope="col">MECHANIC</th>
                        <th scope="col">BRAND</th>
                        <th scope="col">MODEL</th>
                        <th scope="col">PLATE</th>
                        <th scope="col">EDIT</th>
                    </tr>
                    </thead>
                    <tbody id="tblBookings" name="tblBookings">
                    </tbody>
                </table>
                <hr>
                <div class="row" id="formBooking" name="formBooking" style="display:none">
                    <div class="col align-self-center tableBg">
                        <h2>Edit Booking</h2>
                        <div class="form-label-group">
                            <label>Status:</label>
                            <select class="form-control" name="status" id="status" >
                                <?php echo $statusOptions; ?>
                            </select>
                        </div>
                        <div class="form-label-group">
                            <label>Mechanic:</label>
                            <select class="form-control" name="mechanic" id="mechanic" >
                            </select>
                        </div>
                        <div class="form-label-group">
                            <label>Item Add to the Repair:</label>
                            <select class="form-control" name="item" id="item" >
                                <?php echo $itemOptions; ?>
                            </select>
                        </div>
                        <div class="form-label-group">
                            <label>Date Out:</label>
                            <input id="date_out" name="date_out" required type="date" class="form-control" required placeholder="Date Out">
                        </div>
                        <input id="bookingId" name="bookingId" type="hidden" class="form-control" value="">
                        <div class="row">
                            <div class="col">
                                <div class="form-label-group">
                                    <button class="btn btn-lg btn-primary btn-block" onClick="updateBooking()">Save Changes</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-label-group">
                                    <button class="btn btn-lg btn-primary btn-block" onClick="createInvoice()">Create/Update Invoice</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
include('footer.php');
?>
</div>
