<?php 

  include('conn.php');

  $bookingId = $_POST['id'];

  $query = "SELECT status_id FROM booking WHERE id = ".$bookingId;
  $result = mysqli_query($conn, $query);
  while($row = mysqli_fetch_array($result)){
    echo $row['status_id'];
  }

?>