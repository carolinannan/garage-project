<?php

include('conn.php');

//echo $_SESSION['user']; 
if (isset($_SESSION['user'])){ // check it i the variable exist or not
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">   
    
</head>
<body>

        <header>
                <div class="collapse bg-dark" id="navbarHeader">
                  <div class="container">
                    <div class="row">
                      <div class="col-sm-8 col-md-7 py-4">
                        <h4 class="text-white">About Us</h4>
                        <p class="text-muted">Welcome to Ger’s Garage & Equipment.
                           We are a one stop shop for all you car servicing, crash repairs and motoring needs.
                            Located in Dublin Ireland. We have a time efficient service, our promise is to work within a strict timeframe that satisfies our clients, thanks to high standard equipment and materials and a highly trained workforce
                             which helps us keep the promise of the company.</p>
                      </div>
                      <div class="col-sm-4 offset-md-1 py-4">
                        <h4 class="text-white">Menu</h4>
                        <ul class="list-unstyled">
                          <li><a href="index.php" class="text-white">Home</a></li>
<<<<<<< HEAD
                          <li><a href="review.php" class="text-white">Customer Reviews</a></li>
                          <?php
                            if (isset($_SESSION['user'])){ 
                          ?>
                          <li><a href="my_account.php" class="text-white">My Account</a></li>
                          <li><a href="booking.php" class="text-white">Booking</a></li>
                          <li><a href="history.php" class="text-white">History</a></li>
                          <li><a href="write_review.php" class="text-white">Review</a></li>
                          <li><a href="vehicles.php" class="text-white">My Vehicles</a></li>
                          <li><a href="logout.php" class="text-white">Logout</a></li>
                          <?php
                            if ($_SESSION['id'] == 1){  ?>
                              <li><a href="my_admin.php" class="text-white">Admin AREA</a></li>
                                <?php
                            }
                          ?>
                          <?php 
                            } else {
                          ?>
                          <li><a href="login.php" class="text-white">Login</a></li>
                          <li><a href="register.php" class="text-white">Register</a></li>
                          <?php 
                            }
                          ?>
=======
                          <?php
                            if (!isset($_SESSION['user'])){
                          ?>
                          <li><a href="login.php" class="text-white">Login</a></li>
                          <li><a href="register.php" class="text-white">Register</a></li>
                          <?php 
                            } else {
                          ?>

                          <li><a href="booking.php" class="text-white">Booking</a></li>
                          <li><a href="history.php" class="text-white">History</a></li>
                          <li><a href="customer-reviews.php" class="text-white">Customer Reviews</a></li>
                          <li><a href="vehicle_register.php" class="text-white">Vehicle register</a></li>
                          <li><a href="services.php" class="text-white">Services</a></li>

                            <?php } ?>
                          <li><a href="review.php" class="text-white">Review</a></li>
                          <li><a href="logout.php" class="text-white">Logout</a></li>
                          <li><a href="dashboard-index.php" class="text-white">Admin</a></li> 
>>>>>>> da76337c1ca8cca2d39a5d9033db2a2246f9d995
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="navbar navbar-dark bg-dark shadow-sm">
                  <div class="container d-flex justify-content-between">
                    <a href="#" class="navbar-brand d-flex align-items-center">
                      <script src="https://kit.fontawesome.com/aa7bfa4120.js" crossorigin="anonymous"></script>
                      <i class="fas fa-car"></i>
                        <strong>   Ger’s Garage & Equipment</strong>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                  </div>
                </div>

                                
              </header>
    