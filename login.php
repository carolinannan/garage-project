<?php 
include('header.php');
?>


<div class="container" style="padding: 20%; height: 50%;">
  <div class="row">
    <div class="col align-self-center">
      <form class="form-signin" action="loginaction.php" method="POST">
        <input type="text" id="user" name="user" class="form-control" placeholder="user" required="" autofocus="">
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="password" name="password" class="form-control" placeholder="Password" required="">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
      </form>
    </div>
  </div>
</div>
<?php
include('footer.php');
?>
