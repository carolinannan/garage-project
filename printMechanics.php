<?php 
    include "conn.php";

    $firstDayofWeek = date("Y-m-d", strtotime('monday this week'));   

    $lastDayofWeek =  date("Y-m-d", strtotime('sunday this week'));
    $table = "";

    $query = "SELECT
                booking.id,
                booking.date_in,
                user_vehicles.plate,
                mechanic.name
            FROM booking
            INNER JOIN mechanic ON booking.id_mechanic = mechanic.id
            INNER JOIN user_vehicles ON booking.id_vehicle = user_vehicles.id
            WHERE date_in BETWEEN '".$firstDayofWeek."' AND '".$lastDayofWeek."'
            ORDER BY date_in ASC";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $table .= "<tr>
                        <td scope='col'>".$row['id']."</td>
                        <td scope='col'>".$row['date_in']."</td>
                        <td scope='col'>".$row['plate']."</td>
                        <td scope='col'>".$row['name']."</td>
                    </tr>" ;

    }
?>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="assets/css/custom.css">   
<script>
    window.onload = function() {
        window.print();
    }
</script>        
<div class="mechanics">
    <div class="container">
    <h1>Mechanics TimeSheet</h1>
        <div class="row">
            <div class="col">
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">BOOKING REF ID</th>
                            <th scope="col">DATE IN</th>
                            <th scope="col">PLATE</th>
                            <th scope="col">MECHANIC</th>
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