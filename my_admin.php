

<?php 
include('header.php');
?>


<div class="myAccountBody">
  <div class="container">
  <h1>DASHBOARD</h1>
    <div class="row"  style="padding-top: 40px;">
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative myAccount-Options">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Bookings</strong>
            <h3 class="mb-0">Check the Bookings for a period</h3>
            <p class="card-text mb-auto">Check a booking, change status of booking, set a mechanic, generate invoice.</p>
            <a class="btn btn-secondary" href="adm_booking.php" role="button">Check Bookings »</a></p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="assets/img/check.png" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect></svg>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative myAccount-Options">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Vehicles</strong>
            <h3 class="mb-0">Add new Brands/Models</h3>
            <p class="card-text mb-auto">Here is the option to add a new Brand or Model to Vehicles.</p>
            <a class="btn btn-secondary" href="adm_vehicles.php" role="button">Brand/Model Register »</a></p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="assets/img/brand.png" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect></svg>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative myAccount-Options">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Print Service</strong>
            <h3 class="mb-0">Print</h3>
            <p class="card-text mb-auto">Print mechanic timesheet for this week or invoice for the user.</p>
            <a class="btn btn-secondary" href="adm_print.php" role="button">Go to Print Service »</a></p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="assets/img/print.png" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect></svg>
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <div class="row no-gutters border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative myAccount-Options">
          <div class="col p-4 d-flex flex-column position-static">
            <strong class="d-inline-block mb-2 text-primary">Users</strong>
            <h3 class="mb-0">Users</h3>
            <p class="card-text mb-auto">Check a list of users.</p>
            <a class="btn btn-secondary" href="adm_users.php" role="button">Go to Users »</a></p>
          </div>
          <div class="col-auto d-none d-lg-block">
            <img src="assets/img/users.png" width="200" height="250" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect></svg>
          </div>
        </div>
      </div>
    </div>
  
  <?php
include('footer.php');
?>
  </div>
</div>

