

<?php 
include('header.php');

?>
<script>
    window.onload = function() {
        refreshTable();
    };

    function refreshTable(){
        var tbl = $('#tblVehicles');
        var formModel = $('#formModel');
        var formBrand = $('#formBrand');
        formModel.hide();
        formBrand.hide();
        request = $.ajax({
        url: "get_vehicles.php",
        type: "post",
        data: {}
        })
        .done(function(data){
            tbl.append(data);
        });
    }

    function createBrand(){
        var formModel = $('#formModel');
        var formBrand = $('#formBrand');
        formModel.hide();
        formBrand.show();
    }

    function saveBrand(){
        var brand = $('#brandName').val();
        if (brand == ""){
            alert('Please insert a Brand Name');
        }else{
            request = $.ajax({
            url: "create_brand.php",
            type: "post",
            data: {"brand": brand}
            })
            .done(function(data){
                console.log(data);
                refreshTable();
            });
        }
    }

    function getBrands(){
        $('#brand').empty();
        request = $.ajax({
        url: "get_brand.php",
        type: "post",
        data: {}
        })
        .done(function(data){
            $('#brand').append(data);
        });
    }

    function createModel(){
        getBrands();
        var formModel = $('#formModel');
        var formBrand = $('#formBrand');
        formModel.show();
        formBrand.hide();
    }

    function saveModel(){
        var brand = $('#brand').val();
        var model = $('#model').val();
        if (brand == "" || model == ""){
            alert('Please select fill the fields');
        }else{
            request = $.ajax({
            url: "create_model.php",
            type: "post",
            data: {"brand": brand, "model": model}
            })
            .done(function(data){
                console.log(data);
                refreshTable();
            });
        }
    }
</script>
<div class="bookingBody">
    <div class="container tableBg ">
        <div class="row">
            <div class="col align-self-center table-responsive ">
                <h1>Vehicle Brand and Model List</h1>
                <div class="row">
                    <div class="col">
                        <div class="form-label-group">
                            <button class="btn btn-lg btn-primary btn-block" onClick="createBrand()">Register a New Brand</button>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-label-group">
                            <button class="btn btn-lg btn-primary btn-block" onClick="createModel()">Register a New Model</button>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row" id="formModel" name="formModel" style="display:none">
                    <div class="col align-self-center ">
                        <h2>Create a Model</h2>
                        <div class="form-label-group">
                            <label>Brand:</label>
                            <select class="form-control" name="brand" id="brand" required>
                            </select>
                        </div>
                        <div class="form-label-group">
                            <label>Model Name:</label>
                            <input id="model" name="model" required type="text" class="form-control" required placeholder="Model Name">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-label-group">
                                    <button class="btn btn-lg btn-primary btn-block" onClick="saveModel()">Create</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-label-group">
                                    <button class="btn btn-lg btn-primary btn-block" onClick="refreshTable()">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="formBrand" name="formBrand" style="display:none">
                    <div class="col align-self-center ">
                        <h2>Create a Brand</h2>
                        <div class="form-label-group">
                            <label>Model Name:</label>
                            <input id="brandName" name="brandName" required type="text" class="form-control" required placeholder="Brand Name">
                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="form-label-group">
                                    <button class="btn btn-lg btn-primary btn-block" onClick="saveBrand()">Create</button>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-label-group">
                                    <button class="btn btn-lg btn-primary btn-block" onClick="refreshTable()">Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <table class="table table-striped table-sm">
                    <thead>
                        <tr>
                            <th scope="col">BRAND</th>
                            <th scope="col">MODEL</th>
                        </tr>
                    </thead>
                    <tbody id="tblVehicles" name="tblVehicles">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php
include('footer.php');
?>

</div>

