<?php 
include('header.php');
?>
<div class="userBody">
  <div class="container ">
    <div class="row">
      <div class="col align-self-center tableBg">
      <h1>Write a Review</h1>
        <form class="form-user" action="reviewaction.php" method="POST">
          <div class="form-label-group">
            <input id="title" name="title" required type="text" class="form-control" required placeholder="Title">
          </div>
          <div class="form-label-group">
            <select class="form-control" id="stars" name="stars">
              <option value="5">5 Stars</option>
              <option value="4">4 Stars</option>
              <option value="3">3 Stars</option>
              <option value="2">2 Stars</option>
              <option value="1">1 Stars</option>
            </select>
          </div>
          <div class="form-label-group">
            <textarea class="form-control" id="review" name="review" required rows="3"></textarea>
          </div>
          <div class="form-label-group">
            <button class="btn btn-lg btn-primary btn-block" type="submit">Submit Review</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
include('footer.php');
?>
