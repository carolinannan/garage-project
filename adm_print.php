

<?php 
include('header.php');

?>

<div class="bookingBody">
    <div class="container tableBg ">
        <div class="row">
            <div class="col align-self-center table-responsive ">
                <h1>Print Service</h1>
                <form id="invoiceForm" name="invoiceForm" target="_blank" action="printInvoice.php" class="form-user" method="POST">
                    <div class="form-label-group">
                        <label>Booking ID:</label>
                        <input id="bookingId" name="bookingId" required type="number" class="form-control" required placeholder="BookingId">
                    </div>
                    <div class="form-label-group">
                        <button class="btn btn-lg btn-primary btn-block">Print Invoice</button>
                    </div>
                </form>
                <hr>
                    OR
                <hr>
                <div class="form-label-group">
                    <a href="printMechanics.php"><button class="btn btn-lg btn-danger btn-block">Print Mechanics TimeTable of this WEEK</button></a>
                </div>
            </div>
        </div>
    </div>
</div>

