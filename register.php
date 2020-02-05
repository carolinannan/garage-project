<?php 
include('header.php');
?>
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

<?php
include('footer.php');
?>
