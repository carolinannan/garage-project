<?php 
include('header.php');
?>

<form class="form-signin" action="registeraction.php" method="POST">
  <input type="text" id="user" name="user" class="form-control" placeholder="&#9993;" required="" autofocus="">
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="text" id="mobile" name="mobile" class="form-control" placeholder="&#128222;" required="" autofocus="">
  <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
  <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
  

</form>

<?php
include('footer.php');
?>
