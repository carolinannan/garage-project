

<?php 
include('header.php');
?>

<?php

            
            $query ="SELECT
            book.date_in,
            book.date_out,
            user.user_name,
            user.id,
            serv.service_name,
            sts.status,
            vehicle.make,
            vehicle.model,
            user_vehicle.plate
        FROM
            booking as book, 
            user as user, 
            service as serv, 
            status as sts, 
            car_make as vehicle, 
            user_vehicle as user_vehicle
        WHERE 
            book.user_id = user.id 
            and book.service_id = serv.id 
            and book.status_id = sts.id 
            and book.vehicles_id = user_vehicle.id
            and user_vehicle.car_make_id  = vehicle.id";
            $result = mysqli_query($conn, $query)
        ?>
        
        <table class="table table-bordered">
  <thead>
    <tr>
     
     
      <th scope="col">DATE IN</th>
      <th scope="col">DATE OUT</th>
      <th scope="col">NAME</th>
      <th scope="col">ID</th>
      <th scope="col">SERVICE</th>
      <th scope="col">STATUS</th>
      <th scope="col">MAKE</th>
      <th scope="col">MODEL</th>
      <th scope="col">PLATE</th>

    </tr>
  </thead>
  <tbody>
  <?php
                while ($row = mysqli_fetch_array($result)) { //running one by one. Just a line with all the collunm
                   echo "<tr>";
                   echo "<td>".$row['date_in']."</td>";
                   echo "<td>".$row['date_out']."</td>";
                   echo "<td>".$row['user_name']."</td>";
                   echo "<td>".$row['id']."</td>";
                   echo "<td>".$row['service_name']."</td>";
                   echo "<td>".$row['status']."</td>";
                   echo "<td>".$row['make']."</td>";
                   echo "<td>".$row['model']."</td>";
                   echo "<td>".$row['plate']."</td>";

                   echo "</tr>";
               }

          ?>
  </tbody>
</table>

<?php
include('footer.php');
?>
