<?php 
  include ('dashboard-header.php'); 
  include ('dashboard-details.php');
?>
<script>
  function editStatus(id){
    var form = document.getElementById("editStatusForm");
    form.style.display="block";
    var txtField = document.getElementById("bookingIdRef");
    txtField.innerHTML = id;
    var request;
    request = $.ajax({
      url: "booking-status.php",
      type: "post",
      data: "id="+id
    })
    .done(function(data){
      $('#bookingStatus').val(data.trim());
    })
  }

  function sendStatus(){
    var form = document.getElementById("editStatusForm");
    form.style.display="none";
  }
</script>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
 
  <h1 class="h1">Dashboard</h1>
  
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th>#</th>
          <th>Customer</th>
          <th>Vehicle Plate</th>
          <th>Status</th>
          <th>Service</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          echo $dashboardTable;
        ?>
      </tbody>
    </table>
  </div>

  <div id="editStatusForm" name="editStatusForm" style="display:none;">
    <p>Booking ID Reference: <span id="bookingIdRef" name="bookingIdRef"></span></p>
    <p>Status: <select id="bookingStatus" name="bookingStatus">
      <?php echo $statusOption ?>
    </select></p>
    <p><button onClick="sendStatus()">Change Status</button></p>
  </div>
</main>
<?php include ('dashboard-footer.php') ?>