<?php 
    include "conn.php";

    $bookingId = $_POST['bookingId'];
    $name = "";
    $brand = "";
    $model = "";
    $plate = "";
    $dateIn = "";
    $service = "";
    $servicePrice = "";
    $parts = "";
    $partsPrice = "";
    $total = "";
    $invoiceId = "";
    $queryInvoice = "SELECT
                        users.name,
                        brand.brand,
                        model.model,
                        user_vehicles.plate,
                        booking.date_in,
                        service.name AS servName,
                        service.price AS servPrice,	
                        vehicle_parts.name AS partsUsed,
                        vehicle_parts.price AS partsPrice,
                        invoice.price AS total,
                        invoice.id as invoiceId
                    FROM invoice
                    INNER JOIN booking ON booking.id = invoice.id_booking
                    INNER JOIN service ON service.id = booking.id_service
                    INNER JOIN vehicle_parts ON vehicle_parts.id = invoice.id_part
                    INNER JOIN users ON users.id = booking.id_user
                    INNER JOIN user_vehicles ON users.id = user_vehicles.id_user AND booking.id_vehicle = user_vehicles.id
                    INNER JOIN model ON model.id = user_vehicles.id_model
                    INNER JOIN brand ON brand.id = user_vehicles.id_brand
                    WHERE booking.id = ".$bookingId;
    $result = mysqli_query($conn, $queryInvoice);
    while ($row = mysqli_fetch_array($result)) {
        $name = $row['name'];
        $brand = $row['brand'];
        $model = $row['model'];
        $plate = $row['plate'];
        $dateIn = $row['date_in'];
        $service = $row['servName'];
        $servicePrice = $row['servPrice'];
        $parts = $row['partsUsed'];
        $partsPrice = $row['partsPrice'];
        $total = $row['total'];
        $invoiceId = $row['invoiceId'];
    }

    if ($invoiceId != ""){

    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/custom.css">   
    <script>
        window.onload = function() {
            window.print();
        }
    </script>        
        <div class="invoice">
            <div class="container">
            <h1>Invoice</h1>
                <div class="row">
                    <div class="col">
                        <div class="form-label-group">
                            <b>Invoice Ref ID:</b> <?php echo $invoiceId ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <b>Customer Name:</b> <?php echo $name ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-label-group">
                            <b>Car Brand:</b> <?php echo $brand ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <b>Car Model:</b> <?php echo $model ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-label-group">
                            <b>Car License Plate:</b> <?php echo $plate ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <b>Date In:</b> <?php echo $dateIn ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-label-group">
                            <b>Service:</b> <?php echo $service ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <b>Service Price:</b> <?php echo $servicePrice ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="form-label-group">
                            <b>Car Parts used for the job:</b> <?php echo $parts ?>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <b>Car Parts price:</b> <?php echo $partsPrice ?>
                        </div>
                    </div>
                </div>
                <h2>Total: <?php echo $total ?></h2>
            </div>
        </div>
    <?php
    }else{
        echo 'No invoice founded with that booking reference Id, close this tab to return to the previous page and try again, og generate invoice in the bookings.';
    }
?>