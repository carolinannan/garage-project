<?php 
include('header.php');
?>

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
<?php
include('footer.php');
?>
