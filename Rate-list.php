<?php
    session_start();
    if(isset($_SESSION["id"])){
        if ($_SESSION['permission'] != 'admin') {
            header("Location:logout.php");
        }
    }else {
        header("Location:logout.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Restaurant</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <style>

        table {
            counter-reset: Serial;
            border-collapse: separate;
        }

        tr td:first-child:before {
            counter-increment: Serial;
            /* Increment the Serial counter */
            content: counter(Serial);
            /* Display the counter */
        }

        @media only screen and (max-width: 600px) {
            h1,
            h2,
            h3 {
                font-size: 1rem !important;
            }
            .col-4,
            .col-8,
            .card-body {
                padding: 2px;
            }
            .container,
            section.content {
                padding: 0 !important;
            }
        }
        
        .num-block {
            float: left;
            width: 100%;
        }
        /* skin 1 */
        
        .skin-1 .num-in {
            float: left;
            width: 94px;
        }
        
        .skin-1 .num-in span {
            display: block;
            float: left;
            width: 30px;
            height: 32px;
            line-height: 32px;
            text-align: center;
            position: relative;
            cursor: pointer;
        }
        
        .skin-1 .num-in span.dis:before {
            background-color: #ccc !important;
        }
        
        .skin-1 .num-in input {
            float: left;
            width: 32px;
            height: 32px;
            border: 1px solid #6E6F7A;
            border-radius: 5px;
            color: #000;
            text-align: center;
            padding: 0;
        }
        
        .skin-1 .num-in span.minus:before {
            content: '';
            position: absolute;
            width: 15px;
            height: 2px;
            background-color: #00A94F;
            top: 50%;
            left: 0;
        }
        
        .skin-1 .num-in span.plus:before,
        .skin-1 .num-in span.plus:after {
            content: '';
            position: absolute;
            right: 0px;
            width: 15px;
            height: 2px;
            background-color: #00A94F;
            top: 50%;
        }
        
        .skin-1 .num-in span.plus:after {
            -webkit-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
            transform: rotate(90deg);
        }
        /* / skin 1 */
        
        .nav-link {
            width: 100%;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-dark" style="background-color: #001f3f;margin-left: 0;">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <div class="info">
                   <img src="images/logo2.png" width="500">
                </div>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link btn btn-primary" style="background-color: #023f7c; margin-right: 5px;" href="dashboard.php">Dashboard</a>
                </li>
                &nbsp;
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link btn btn-primary" style="background-color: #023f7c; margin-right: 5px;" href="Invoice-Report.php">Invoice Report</a>
                </li>
                &nbsp;
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link btn btn-primary" style="background-color: #023f7c; margin-right: 5px;" href="Rate-list.php">Rate List</a>
                </li>
                &nbsp;
                <li class="nav-item">
                    <a class="nav-link" href="Logout.php">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->



        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" style="margin: 0; background-image: url(dist/img/cover-1.jpg);background-color: transparent; background-size: cover;">

            &nbsp;

            <!-- Main content -->
            <section class="content">
                <div class="container">
                    <!-- /.row -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <!-- Content Header (Page header) -->
                            <section class="content-header">
                                <div class="container-fluid">
                                    <div class="row mb-2">
                                        <div class="col-sm-10">
                                            <h1 style="color: black;">Rate List</h1>    
                                        </div>
                                        <div class="col-sm-2">
                                            <button class="btn btn-primary w-100" data-toggle="modal" data-target="#modal-default"><i class="fas fa-plus"></i> &nbsp;Add New Item</button>

                                            <div class="modal fade" id="modal-default">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Add New Item</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="add-item" action="controller/add-item.php" method="POST">
                                                                <div class="form-group">
                                                                    <label for="category">Select Category</label>
                                                                    <select name="category" id="category" class="form-control">
                                                                        <option value="Hot & Cold Drinks">Hot & Cold Drinks</option>
                                                                        <option value="Salad">Salad</option>
                                                                        <option value="Papad">Papad</option>
                                                                        <option value="Soup">Soup</option>
                                                                        <option value="Sweets">Sweets</option>
                                                                        <option value="Veg-Snacks">Veg-Snacks</option>
                                                                        <option value="Sandwich">Sandwich</option>
                                                                        <option value="Chinese">Chinese</option>
                                                                        <option value="Paratha">Paratha</option>
                                                                        <option value="Chapati/Paratha/Nan">Chapati/Paratha/Nan</option>
                                                                        <option value="Vegetables">Vegetables</option>
                                                                        <option value="Paneer">Paneer</option>
                                                                        <option value="Dal">Dal</option>
                                                                        <option value="Rice/Pulav">Rice/Pulav</option>
                                                                        <option value="Raita">Raita</option>
                                                                        <option value="Extra">Extra</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Item">Item Name</label>
                                                                    <input type="text" name="item" class="form-control" id="Item" placeholder="Item Name">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Item">Item Name (Hindi)</label>
                                                                    <input type="text" name="item_hindi" class="form-control" id="Item" placeholder="Item Name in Hindi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Item">Price (₹)</label>
                                                                    <input type="text" name="price" class="form-control" id="Item" placeholder="Price">
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" id="save-item" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                        
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->

                                            <div class="modal fade" id="modal-update">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title">Update Item</h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="update-item" action="controller/update-item.php" method="POST">
                                                                <div class="form-group">
                                                                    <label for="category">Select Category</label>
                                                                    <select name="modal-category" id="modal-category" class="form-control">
                                                                        <option value="Hot & Cold Drinks">Hot & Cold Drinks</option>
                                                                        <option value="Salad">Salad</option>
                                                                        <option value="Papad">Papad</option>
                                                                        <option value="Soup">Soup</option>
                                                                        <option value="Sweets">Sweets</option>
                                                                        <option value="Veg-Snacks">Veg-Snacks</option>
                                                                        <option value="Sandwich">Sandwich</option>
                                                                        <option value="Chinese">Chinese</option>
                                                                        <option value="Paratha">Paratha</option>
                                                                        <option value="Chapati/Paratha/Nan">Chapati/Paratha/Nan</option>
                                                                        <option value="Vegetables">Vegetables</option>
                                                                        <option value="Paneer">Paneer</option>
                                                                        <option value="Dal">Dal</option>
                                                                        <option value="Rice/Pulav">Rice/Pulav</option>
                                                                        <option value="Raita">Raita</option>
                                                                        <option value="Extra">Extra</option>

                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Item">Item Name</label>
                                                                    <input type="text" name="modal-item" class="form-control" id="modal-item" placeholder="Item Name">
                                                                </div>
                                                                <input type="hidden" id="modal-id" name="modal-id">
                                                                <div class="form-group">
                                                                    <label for="Item">Item Name (Hindi)</label>
                                                                    <input type="text" name="modal-item-hindi" class="form-control" id="modal-item-hindi" placeholder="Item Name in Hindi">
                                                                </div>
                                                                <div class="form-group">
                                                                    <label for="Item">Price (₹)</label>
                                                                    <input type="text" name="modal-price" class="form-control" id="modal-price" placeholder="Price">
                                                                </div>
                                                                <div class="modal-footer justify-content-between">
                                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>
                                            <!-- /.modal -->
                                        </div>
                                    </div>
                                </div>
                                <!-- /.container-fluid -->
                            </section>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-4 col-sm-3">
                                    <div class="nav flex-column nav-tabs h-100" id="vert-tabs-tab" role="tablist" aria-orientation="vertical">
                                        <a class="nav-link active" id="vert-tabs-Drinks-tab" data-toggle="pill" href="#vert-tabs-Drinks" role="tab" aria-controls="vert-tabs-home" aria-selected="true">Hot & Cold Drinks</a>
                                        <a class="nav-link" id="vert-tabs-Salad-tab" data-toggle="pill" href="#vert-tabs-Salad" role="tab" aria-controls="vert-tabs-Salad" aria-selected="false">Salad</a>
                                        <a class="nav-link" id="vert-tabs-Papad-tab" data-toggle="pill" href="#vert-tabs-Papad" role="tab" aria-controls="vert-tabs-messages" aria-selected="false">Papad</a>
                                        <a class="nav-link" id="vert-tabs-Soup-tab" data-toggle="pill" href="#vert-tabs-Soup" role="tab" aria-controls="vert-tabs-settings" aria-selected="false">Soup</a>
                                        <a class="nav-link" id="vert-tabs-Sweets-tab" data-toggle="pill" href="#vert-tabs-Sweets" role="tab" aria-controls="vert-tabs-Sweets" aria-selected="false">Sweets</a>
                                        <a class="nav-link" id="vert-tabs-Veg-Snacks-tab" data-toggle="pill" href="#vert-tabs-Veg-Snacks" role="tab" aria-controls="vert-tabs-Veg-Snacks" aria-selected="false">Veg-Snacks</a>
                                        <a class="nav-link" id="vert-tabs-Sandwich-tab" data-toggle="pill" href="#vert-tabs-Sandwich" role="tab" aria-controls="vert-tabs-Sandwich" aria-selected="false">Sandwich</a>
                                        <a class="nav-link" id="vert-tabs-Chinese-tab" data-toggle="pill" href="#vert-tabs-Chinese" role="tab" aria-controls="vert-tabs-Chinese" aria-selected="false">Chinese</a>
                                        <a class="nav-link" id="vert-tabs-Paratha-tab" data-toggle="pill" href="#vert-tabs-Paratha" role="tab" aria-controls="vert-tabs-Paratha" aria-selected="false">Paratha</a>
                                        <a class="nav-link" id="vert-tabs-Chapati-tab" data-toggle="pill" href="#vert-tabs-Chapati" role="tab" aria-controls="vert-tabs-Chapati" aria-selected="false">Chapati/Paratha/Nan</a>
                                        <a class="nav-link" id="vert-tabs-Vegetables-tab" data-toggle="pill" href="#vert-tabs-Vegetables" role="tab" aria-controls="vert-tabs-Vegetables" aria-selected="false">Vegetables</a>
                                        <a class="nav-link" id="vert-tabs-Paneer-tab" data-toggle="pill" href="#vert-tabs-Paneer" role="tab" aria-controls="vert-tabs-Paneer" aria-selected="false">Test of Paneer</a>
                                        <a class="nav-link" id="vert-tabs-Dal-tab" data-toggle="pill" href="#vert-tabs-Dal" role="tab" aria-controls="vert-tabs-Dal" aria-selected="false">Dal</a>
                                        <a class="nav-link" id="vert-tabs-Rice-tab" data-toggle="pill" href="#vert-tabs-Rice" role="tab" aria-controls="vert-tabs-Rice" aria-selected="false">Rice/Pulav</a>
                                        <a class="nav-link" id="vert-tabs-Raita-tab" data-toggle="pill" href="#vert-tabs-Raita" role="tab" aria-controls="vert-tabs-Raita" aria-selected="false">Raita</a>
                                        <a class="nav-link" id="vert-tabs-Extra-tab" data-toggle="pill" href="#vert-tabs-Extra" role="tab" aria-controls="vert-tabs-Extra" aria-selected="false">Extra</a>
                                        <a class="nav-link" id="vert-tabs-thali-tab" data-toggle="pill" href="#vert-tabs-thali" role="tab" aria-controls="vert-tabs-thali" aria-selected="false">Thali</a>
                                        <a class="nav-link" id="vert-tabs-combo-tab" data-toggle="pill" href="#vert-tabs-combo" role="tab" aria-controls="vert-tabs-combo" aria-selected="false">Combo</a>
                                    </div>
                                </div>
                                <div class="col-8 col-sm-9">
                                    <div class="tab-content" id="vert-tabs-tabContent">
                                        <div class="tab-pane text-left fade show active" id="vert-tabs-Drinks" role="tabpanel" aria-labelledby="vert-tabs-home-tab">
                                            <h3>Hot & Cold Drinks (शीतल एवं गर्म पेय)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%;">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        include('config/config.php');
                                                        $sql = "SELECT * FROM `items` WHERE category='Hot & Cold Drinks'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Hot & Cold Drinks' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Salad" role="tabpanel" aria-labelledby="vert-tabs-Salad-tab">
                                            <h3>Salad (सलाद)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Salad'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Salad' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Papad" role="tabpanel" aria-labelledby="vert-tabs-Papad-tab">
                                            <h3>Papad (पापड़)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Papad'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Papad' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Soup" role="tabpanel" aria-labelledby="vert-tabs-Soup-tab">
                                            <h3>Soup (सूप)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Soup'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Soup' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Sweets" role="tabpanel" aria-labelledby="vert-tabs-Sweets-tab">
                                            <h3>Sweets(स्वीट्स)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Sweets'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Sweets' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Veg-Snacks" role="tabpanel" aria-labelledby="vert-tabs-Veg-Snacks-tab">
                                            <h3>Veg-Snacks(वेज स्नेक्स)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Veg-Snacks'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Veg-Snacks' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Sandwich" role="tabpanel" aria-labelledby="vert-tabs-Sandwich-tab">
                                            <h3>Sandwich(सेण्डविच)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Sandwich'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Sandwich' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Chinese" role="tabpanel" aria-labelledby="vert-tabs-Chinese-tab">
                                            <h3>Chinese(चायनीज)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Chinese'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Chinese' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Paratha" role="tabpanel" aria-labelledby="vert-tabs-Paratha-tab">
                                            <h3>Paratha(पराठा)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Paratha'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Paratha' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Chapati" role="tabpanel" aria-labelledby="vert-tabs-Chapati-tab">
                                            <h3>Chapati/Paratha/Nan</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Chapati/Paratha/Nan'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Chapati/Paratha/Nan' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Vegetables" role="tabpanel" aria-labelledby="vert-tabs-Vegetables-tab">
                                            <h3>Vegetables(सब्जीयाँ)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Vegetables'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Vegetables' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Paneer" role="tabpanel" aria-labelledby="vert-tabs-Paneer-tab">
                                            <h3>Paneer(पनीर का स्वाद)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Paneer'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Paneer' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Dal" role="tabpanel" aria-labelledby="vert-tabs-Dal-tab">
                                            <h3>Dal(दाल)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Dal'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Dal' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Raita" role="tabpanel" aria-labelledby="vert-tabs-Raita-tab">
                                            <h3>Raita</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Raita'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Raita' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-Extra" role="tabpanel" aria-labelledby="vert-tabs-Extra-tab">
                                            <h3>Extra(एक्स्ट्रा)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Extra'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Extra' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-thali" role="tabpanel" aria-labelledby="vert-tabs-thali-tab">
                                            <h3>Thali(थाली)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Thali'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Thali' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="vert-tabs-combo" role="tabpanel" aria-labelledby="vert-tabs-combo-tab">
                                            <h3>Combo(कॉम्बो)</h3>
                                            <hr>
                                            <div style="overflow-x: auto;">
                                                <table id="example" class="table table-striped table-bordered" style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>S.No.</th>
                                                            <th>Name in Hindi</th>
                                                            <th>Name</th>
                                                            <th>Price</th>
                                                            <th>Edit</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php
                                                        $sql = "SELECT * FROM `items` WHERE category='Combo'";
                                                        $res = mysqli_query($conn,$sql);
                                                        if($res){
                                                            while ($row = mysqli_fetch_assoc($res)) {
                                                                echo "<tr>
                                                                        <td></td>
                                                                        <td>".$row['name_hindi']."</td>
                                                                        <td>".$row['name']."</td>
                                                                        <td>".$row['price']."</td>
                                                                        <td><button data-cate='Combo' data-id='".$row['id']."' class='btn btn-dark update-item'><i class='fas fa-edit' data-toggle='modal' data-target='#modal-update'></i></button></td>
                                                                        <td><button class='btn btn-danger' onclick='DeleteItem(".$row['id'].")'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></button></td>
                                                                    </tr>";
                                                            }
                                                        }
                                                    ?>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
        </div>

        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Footer -->
    <footer class="sticky-footer bg-white">
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; <a href="https://technobuddies.in">Techno-Buddies IT Solutions</a> | All Rights Reserved</span>
                <br>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <script src="dist/js/main.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function (e) {
            $("#add-item").on('submit',(function(e) {
                e.preventDefault();
                $.ajax({
                    url: "controller/add-item.php",
                    type: "POST",
                    data:  new FormData(this),
                    contentType: false,
                    cache: false,
                    processData:false,
                    success: function(res){
                        $("#add-item")[0].reset();
                        alert(res);
                        window.location.href='Rate-list.php';
                    }
                    
                });
            }));
        });
    </script>
    <script>
        $(document).ready(function(){
            $('.update-item').on('click',function(){
                var id = $(this).attr('data-id');
                var name_hindi = $(this).closest("tr").find('td:eq(1)').text();
                var name = $(this).closest("tr").find('td:eq(2)').text();
                var price = $(this).closest("tr").find('td:eq(3)').text();
                var category = $(this).attr('data-cate');
                $('#modal-price').val(price);
                $('#modal-item').val(name);
                $('#modal-item-hindi').val(name_hindi); 
                $('#modal-category').val(category); 
                $('#modal-id').val(id);

                $('#modal-update').modal({show:true});

                $.ajax({
                    url: "controller/update-item.php",
                    type: "POST",
                    data: form,
                    success: function(res){
                        alert(res);
                        window.location.href='Rate-list.php';   
                    }
                });
            }); 
        });
    </script>
    <script>
        function DeleteItem(id) {
            $.ajax({
                url: "controller/delete-item.php",
                type: "POST",
                data: {"id":id},
                success: function(res){
                    alert(res);
                    window.location.href='Rate-list.php';   
                }
                
            });
        }
    </script>
</body>

</html>