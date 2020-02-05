<?php 
include('header.php');

$reviews = "";
$query = "SELECT * FROM review ORDER BY id DESC";
$result = mysqli_query($conn, $query);




?>

<div class="userBody">
  <div class="container ">
    <div class="row">
      <div class="col align-self-center">
      <h1>Customer Reviews</h1>
        <?php
            while ($row = mysqli_fetch_array($result)) {
        ?>
            <div class="row reviews">
                <div class="col align-self-center  tableBg">
                    <strong class="d-inline-block mb-2 text-primary"><?php echo $row['stars'] ?> Stars! (from 5)</strong>
                    <h3 class="mb-0"><?php echo $row['title'] ?></h3>
                    <p><?php echo $row['review'] ?></p>
                </div>
            </div>
        <?php } ?>
      </div>
    </div>
  </div>
</div>


<?php
include('footer.php');
?>
