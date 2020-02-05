

<?php 
include('header.php');
$query = "SELECT * FROM users";
$table = "";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result)) { //running one by one. Just a line with all the collunm
  $table = $table ."<tr>
                      <td>".$row['id']."</td>
                      <td>".$row['name']."</td>
                      <td>".$row['contact']."</td>
                      <td>".$row['email']."</td>
                    </tr>";
}
?>

<div class="bookingBody">
    <div class="container ">
        <div class="row">
            <div class="col align-self-center table-responsive tableBg">
            <h1>Users</h1>
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>  
                        <th scope="col">ID</th>
                        <th scope="col">NAME</th>
                        <th scope="col">CONTACT</th>
                        <th scope="col">EMAIL</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php echo $table ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

