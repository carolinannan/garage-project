<?php 
include('header.php');
?>
<<<<<<< HEAD
<div class="userBody">
  <div class="container ">
    <div class="row">
      <div class="col align-self-center">
        <form class="form-user" action="registeraction.php" method="POST">
          <div class="form-label-group">
            <input id="name" name="name" required type="text" class="form-control" placeholder="Name">
          </div>
          <div class="form-label-group">
            <input id="contact" name="contact" required type="number" class="form-control" placeholder="Contact Number">
          </div>
          <div class="form-label-group">
            <input id="email" name="email" required type="email" class="form-control" placeholder="E-mail">
          </div>
          <div class="form-label-group">
            <input id="password" name="password" required type="password" class="form-control" placeholder="Password">
          </div>
          <div class="form-label-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

=======

<div class="container" style="padding: 20%; height: 50%;">
  <div class="row">
    <div class="col align-self-center">
<form class="form-signin" action="registeraction.php" method="POST">
  <input type="text" id="user" name="user" class="form-control" placeholder="&#9993; User" required="" autofocus="">
  <input type="text" id="mobile" name="mobile" class="form-control" placeholder="&#128222; Phone Number" required="" autofocus="">
  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
  

</form>
</div>
</div>
</div>
>>>>>>> da76337c1ca8cca2d39a5d9033db2a2246f9d995
<?php
include('footer.php');
?>
