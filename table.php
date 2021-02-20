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
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
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
    <style>
    .dot {
        height: 15px;
        width: 15px;
        background-color: #bbb;
        border-radius: 50%;
        display: inline-block;
    }

    body {
        font-family: Arial;
    }

    /* Style the tab */

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

    .table-tab {
        overflow: hidden;
        border: 1px solid #ccc;
        background-color: #f1f1f1;
    }

    /* Style the buttons inside the tab */

    .table-tab button {
        background-color: inherit;
        float: left;
        border: none;
        outline: none;
        cursor: pointer;
        padding: 14px 16px;
        transition: 0.3s;
        font-size: 24px;
    }

    /* Change background color of buttons on hover */

    .table-tab button:hover {
        background-color: #ddd;
    }

    /* Create an active/current tablink class */

    .table-tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */

    .menu-table {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    /* Create an active/current tablink class */

    .table-tab button.active {
        background-color: #ccc;
    }

    /* Style the tab content */

    .menu-table {
        display: none;
        padding: 6px 12px;
        border: 1px solid #ccc;
        border-top: none;
    }

    div.scrollmenu {
        background-color: transparent;
        overflow: auto;
        white-space: nowrap;
    }

    div.scrollmenu a {
        display: inline-block;
        color: white;
        text-align: center;
        padding: 14px;
        text-decoration: none;
        background-color: #28a745;
        border-radius: 5px;
        box-shadow: 0 0 1px rgba(134, 134, 134, 0.125), 0 1px 3px rgba(0, 0, 0, .2);
    }

    div.scrollmenu a:hover {
        background-color: #ddd;
    }

    .tablinks {
        color: #f1f1f1;
        font-weight: bold;
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

    /* css for row counting */

    .css-serial {
        counter-reset: serial-number;
        /* Set the serial number counter to 0 */
    }

    .css-serial td:first-child:before {
        counter-increment: serial-number;
        /* Increment the serial number counter */
        content: counter(serial-number);
        /* Display the counter */
    }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-dark"
            style="background-color: #001f3f; margin-left: 350px !important;">
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
                        <i class="fa fa-sign-out-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="fullScreen" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="https:technobuddies.in/" target="_blank" class="brand-link" style="background-color: #001f3f;">
                <img src="dist/img/tblogo.png" alt="TB" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Techno-Buddies <small>IT Solutions</small></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar" style="background-image: url(dist/img/blur-restaurant-3.png)">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <img src="images/main-logo.png" style="width:100%;">
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" id="search-item" onkeyup="filterFunction(this.value)" type="text" placeholder="Search"
                            style="background-color: rgba(255, 255, 255, 0.1);">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar" style="background-color: rgba(255, 255, 255, 0.1);">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2" id="leftpanel">
                    <ul class="nav nav-pills nav-sidebar flex-column yemek" id="myUL" data-widget="treeview" role="menu"
                        data-accordion="false">

                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Hot & Cold Drinks
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                include('config/config.php');
                                $sqlm = "SELECT * FROM `items` WHERE category='Hot & Cold Drinks'";
                                $resm = mysqli_query($conn,$sqlm);
                                if($resm){
                                    while ($rowm = mysqli_fetch_assoc($resm)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm["name"].'</p>
                                                    <span style="float: right;">'.$rowm["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Salad
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm2 = "SELECT * FROM `items` WHERE category='Salad'";
                                $resm2 = mysqli_query($conn,$sqlm2);
                                if($resm2){
                                    while ($rowm2 = mysqli_fetch_assoc($resm2)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm2["name"].'</p>
                                                    <span style="float: right;">'.$rowm2["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Papad
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm3 = "SELECT * FROM `items` WHERE category='Papad'";
                                $resm3 = mysqli_query($conn,$sqlm3);
                                if($resm3){
                                    while ($rowm3 = mysqli_fetch_assoc($resm3)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm3["name"].'</p>
                                                    <span style="float: right;">'.$rowm3["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Soup
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm4 = "SELECT * FROM `items` WHERE category='Soup'";
                                $resm4 = mysqli_query($conn,$sqlm4);
                                if($resm4){
                                    while ($rowm4 = mysqli_fetch_assoc($resm4)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm4["name"].'</p>
                                                    <span style="float: right;">'.$rowm4["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Sweets
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm5 = "SELECT * FROM `items` WHERE category='Sweets'";
                                $resm5 = mysqli_query($conn,$sqlm5);
                                if($resm5){
                                    while ($rowm5 = mysqli_fetch_assoc($resm5)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm5["name"].'</p>
                                                    <span style="float: right;">'.$rowm5["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Veg-Snacks
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm6 = "SELECT * FROM `items` WHERE category='Veg-Snacks'";
                                $resm6 = mysqli_query($conn,$sqlm6);
                                if($resm6){
                                    while ($rowm6 = mysqli_fetch_assoc($resm6)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm6["name"].'</p>
                                                    <span style="float: right;">'.$rowm6["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Sandwich
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm7 = "SELECT * FROM `items` WHERE category='Sandwich'";
                                $resm7 = mysqli_query($conn,$sqlm7);
                                if($resm7){
                                    while ($rowm7 = mysqli_fetch_assoc($resm7)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm7["name"].'</p>
                                                    <span style="float: right;">'.$rowm7["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Chinese
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm8 = "SELECT * FROM `items` WHERE category='Chinese'";
                                $resm8 = mysqli_query($conn,$sqlm8);
                                if($resm8){
                                    while ($rowm8 = mysqli_fetch_assoc($resm8)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm8["name"].'</p>
                                                    <span style="float: right;">'.$rowm8["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Paratha
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm9 = "SELECT * FROM `items` WHERE category='Paratha'";
                                $resm9 = mysqli_query($conn,$sqlm9);
                                if($resm9){
                                    while ($rowm9 = mysqli_fetch_assoc($resm9)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm9["name"].'</p>
                                                    <span style="float: right;">'.$rowm9["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Chapati/Paratha/Nan
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm10 = "SELECT * FROM `items` WHERE category='Chapati/Parath/Nan'";
                                $resm10 = mysqli_query($conn,$sqlm10);
                                if($resm10){
                                    while ($rowm10 = mysqli_fetch_assoc($resm10)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm10["name"].'</p>
                                                    <span style="float: right;">'.$rowm10["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Vegetables
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm11 = "SELECT * FROM `items` WHERE category='Vegetables'";
                                $resm11 = mysqli_query($conn,$sqlm11);
                                if($resm11){
                                    while ($rowm11 = mysqli_fetch_assoc($resm11)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm11["name"].'</p>
                                                    <span style="float: right;">'.$rowm11["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Paneer
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm12 = "SELECT * FROM `items` WHERE category='Paneer'";
                                $resm12 = mysqli_query($conn,$sqlm12);
                                if($resm12){
                                    while ($rowm12 = mysqli_fetch_assoc($resm12)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm12["name"].'</p>
                                                    <span style="float: right;">'.$rowm12["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Dal
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm13 = "SELECT * FROM `items` WHERE category='Dal'";
                                $resm13 = mysqli_query($conn,$sqlm13);
                                if($resm13){
                                    while ($rowm13 = mysqli_fetch_assoc($resm13)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm13["name"].'</p>
                                                    <span style="float: right;">'.$rowm13["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Rice/Pulav
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm14 = "SELECT * FROM `items` WHERE category='Rice/Pulav'";
                                $resm14 = mysqli_query($conn,$sqlm14);
                                if($resm14){
                                    while ($rowm14 = mysqli_fetch_assoc($resm14)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm14["name"].'</p>
                                                    <span style="float: right;">'.$rowm14["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Raita
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm15 = "SELECT * FROM `items` WHERE category='Raita'";
                                $resm15 = mysqli_query($conn,$sqlm15);
                                if($resm15){
                                    while ($rowm15 = mysqli_fetch_assoc($resm15)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm15["name"].'</p>
                                                    <span style="float: right;">'.$rowm15["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Thali
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm16 = "SELECT * FROM `items` WHERE category='Thali'";
                                $resm16 = mysqli_query($conn,$sqlm16);
                                if($resm16){
                                    while ($rowm16 = mysqli_fetch_assoc($resm16)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm16["name"].'</p>
                                                    <span style="float: right;">'.$rowm16["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon"><span class="dot"></span></i>
                                <p>
                                    Combo
                                    <i class="fas fa-angle-left right"></i>
                                    <span class="badge badge-info right"></span>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                            <?php
                                $sqlm17 = "SELECT * FROM `items` WHERE category='Combo'";
                                $resm17 = mysqli_query($conn,$sqlm17);
                                if($resm17){
                                    while ($rowm17 = mysqli_fetch_assoc($resm17)) {
                                        echo '<li class="nav-item">
                                                <a href="#" class="nav-link item-name">
                                                    <i class="far fa-circle nav-icon"></i>
                                                    <p>'.$rowm17["name"].'</p>
                                                    <span style="float: right;">'.$rowm17["price"].'</span>
                                                </a>
                                            </li>';
                                    }
                                }
                            ?>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
                <br>
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            &nbsp;

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->


                    <div style="background:none;">
                        <div id="table1" class="menu-table p-0" role="tabpanel" aria-labelledby="table1-tab"
                            style="display: block; border: none;">
                            <style>
                            #resultTable {
                                position: absolute;
                                bottom: 0;
                                right: 10px;
                                left: 360px;
                                height: auto;
                                top: 60px;
                            }
                            </style>
                            <div>
                                <div class="card" id="resultTable">
                                    <div class="p-3" style="border: 3px solid #444;">
                                        <div>
                                            <h1 style="font-size: 40px;"><?php echo $_GET['tbl']; ?><span
                                                    class="float-right amount">Total-₹<span
                                                        class="total-price"></span></span>
                                            </h1>
                                            <hr>
                                            <div>
                                            <?php if($_GET['tbl'] != 'Take Away'){
                                                    echo '<button class="btn btn-success Save" data-toggle="modal" data-target="#"
                                                        style="font-size: 20px;">Save &
                                                        Continue</button>';
                                            } ?>
                                                
                                                <button class="btn btn-info invoice-data" data-toggle="modal"
                                                    data-target="#modal-default"
                                                    style="font-size: 20px; float: right;">Close Order
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-body p-0" style="overflow-y: scroll;">

                                        <table id="table-data" class="table table-striped projects">
                                            <thead>
                                                <tr>
                                                    <th>
                                                        S. No.
                                                    </th>
                                                    <th>
                                                        Item Description
                                                    </th>
                                                    <th style="text-align: center;">
                                                        Quantity
                                                    </th>
                                                    <th style="text-align: right;">
                                                        Unit Price
                                                    </th>
                                                    <th style="text-align: right;">
                                                        Total
                                                    </th>
                                                    <th>
                                                        Remove
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (strpos($_GET['tbl'], "Table") !== false) {
                                                    $sql = "SELECT * FROM tbl_info WHERE tbl_name='{$_GET['tbl']}'";
                                                } else {
                                                    $sql = "SELECT * FROM room_info WHERE room_name='{$_GET['tbl']}'";
                                                }
                                                $res = mysqli_query($conn,$sql);
                                                if ($res) {
                                                    while ($row = mysqli_fetch_assoc($res)) {
                                            ?>
                                                <tr class="calc">
                                                    <td style="text-align:center;"></td>
                                                    <td class="food"><a><?php echo $row['item']; ?></a></td>
                                                    <td style="text-align:center;" class="quant">
                                                        <a>
                                                            <div class="num-block skin-1">
                                                                <div class="num-in" style="margin: auto;"><span
                                                                        class="minus dis"></span>
                                                                    <input type="text"
                                                                        style="text-align:center !important;"
                                                                        class="in-num"
                                                                        value="<?php echo $row['qty']; ?>" readonly>
                                                                    <span class="plus"></span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    <td class="unit" style="text-align: center;">
                                                        <input type="number" class="form-control unit-price"
                                                            style="width: 100px; float: right; text-align: right;"
                                                            value="<?php echo $row['unit_price']; ?>">
                                                    </td>
                                                    <td style="text-align: right;" class="total">
                                                        <?php echo $row['total_price']; ?></td>
                                                    <td style="text-align:center;"><a href="#">
                                                            <i class="fas fa-trash-alt delete-btn"
                                                                style="font-size: 25px;"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
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

                <!-- /.card -->
                <div class="modal fade" id="modal-default">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Invoice Preview</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <div class="row">
                                    <div class="col-12">

                                        <!-- Main content -->
                                        <div class="invoice p-3 mb-3" id="print-invoice">
                                            <!-- title row -->

                                            <?php
                                                $sql2 = "SELECT invoice_no FROM `orders` ORDER BY id DESC LIMIT 1";
                                                $res2 = mysqli_query($conn,$sql2);
                                                $invoice = mysqli_fetch_assoc($res2)['invoice_no'] + 1;
                                            ?>
                                            <div class="row invoice-info" id="invoice-div-2">
                                                <div class="col-lg-12 invoice-col">
                                                    <address>
                                                        <img src="images/bill-head-bw.png" style="width:100%">
                                                        <hr>
                                                        <span>GST IN: 23ABNPJ8034D2ZU</span><br>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-3">
                                                                Bill No.
                                                            </div>
                                                            <div class="col-3">
                                                                : <?php echo $invoice; ?><br>
                                                            </div>
                                                            <div class="col-3">
                                                                Bill Date
                                                            </div>
                                                            <div class="col-3">
                                                                : <?php 
                                                                        date_default_timezone_set("Asia/Calcutta");   //India time (GMT+5:30)
                                                                        echo date('d-m-Y');
                                                                        //echo date("d-m-Y"); 
                                                                  ?><br>
                                                            </div>
                                                            <div class="col-3">
                                                                Table/Room
                                                            </div>
                                                            <div class="col-3">
                                                                : <?php echo $_GET['tbl']; ?>
                                                            </div>
                                                            <div class="col-3">
                                                                Time
                                                            </div>
                                                            <div class="col-3">
                                                                : <?php echo date("H:i a"); ?>
                                                            </div>
                                                        </div>
                                                    </address>
                                                </div>
                                                <!-- /.col -->

                                            </div>
                                            <!-- /.row -->

                                            <!-- Table row -->
                                            <div class="row" id="invoice-div-3">
                                                <div class="col-12 table-responsive">
                                                    <table class="table table-striped" id="invoice-table">
                                                        <thead>
                                                            <tr>
                                                                <th>S.No.</th>
                                                                <th>Particulars</th>
                                                                <th>Qty.</th>
                                                                <th>Rate</th>
                                                                <th>Amount</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>

                                                        </tbody>
                                                    </table>
                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                            <div class="row" id="invoice-div-4">
                                                <!-- accepted payments column -->
                                                <div class="col-4">
                                                    <img src="dist/img/thankyou.png" width="100%" alt="">
                                                </div>
                                                <div class="col-8">

                                                    <div class="table-responsive">
                                                        <table class="table">
                                                            <tr>
                                                                <th style="width:50%">Total (₹):</th>
                                                                <td style="text-align:right;"
                                                                    class="total-price invoice-price"></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Delivery Charge (₹):</th>
                                                                <td class="other_charge"><input
                                                                        style="text-align:right;" type="text" min="0"
                                                                        class="charge w-100" size="6" name="charge"
                                                                        value="0" /></td>
                                                            </tr>
                                                            <tr>
                                                                <th>Net Amount (₹):</th>
                                                                <td class="total-price net-amount"></td>
                                                            </tr>
                                                        </table>
                                                    </div>

                                                </div>
                                                <!-- /.col -->
                                            </div>
                                            <!-- /.row -->
                                            <hr>
                                            <label>Payment Mode :</label>
                                            <input type="radio" id="Cash" name="payment_mode" value="Cash" checked>
                                            <label for="Cash">Cash</label>&nbsp;&nbsp;
                                            <input type="radio" id="UPI" name="payment_mode" value="UPI">
                                            <label for="UPI">UPI</label>&nbsp;&nbsp;
                                            <input type="radio" id="Card" name="payment_mode" value="Card">
                                            <label for="Card">Card</label>
                                            <hr>

                                            Order Taken By : <?php echo $_SESSION['username']; ?><br>
                                            Have a nice day

                                            <!-- <a href="invoice-print.html" class="btn btn-primary"><i class="fas fa-print"></i>Print</a> -->

                                        </div>
                                        <!-- /.invoice -->
                                        <button class="btn btn-primary" onclick="PrintInvoice();"><i
                                                class="fas fa-print"></i>Print</button>
                                    </div>
                                    <!-- /.col -->
                                </div>
                                <!-- /.row -->
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->
                <!-- <div class="test"></div> -->
        </div>
        <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>

    <!--    
    <footer class="sticky-footer bg-white">
      <div class="container my-auto">
          <div class="copyright text-center my-auto">
              <span>Copyright &copy; <a href="https://technobuddies.in">Techno-Buddies IT Solutions</a> | All Rights Reserved</span>
              <br>
            </div>
      </div>
    </footer> -->
    <!-- End of Footer -->
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
    </div>

    <!-- jQuery -->
    <!-- <script src="plugins/jquery/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-json/2.6.0/jquery.json.min.js"
        integrity="sha512-QE2PMnVCunVgNeqNsmX6XX8mhHW+OnEhUhAWxlZT0o6GFBJfGRCfJ/Ut3HGnVKAxt8cArm7sEqhq2QdSF0R7VQ=="
        crossorigin="anonymous"></script>
    <script>
        //function for generate receipt
        function PrintInvoice() {
            var InvoiceData = new Array();
            var total_items = TotalItems();
            $('#invoice-table tr').each(function(row, tr) {
                InvoiceData[row] = {
                    "item": $(tr).find('td:eq(1)').text(),
                    "qty": $(tr).find('td:eq(2)').text(),
                    "unit_price": $(tr).find('td:eq(3)').text().trim(),
                    "total_price": $(tr).find('td:eq(4)').text().trim()
                }
                 
            });
            
            InvoiceData.shift(); 
            
            var tbl_name = "<?php echo $_GET['tbl']; ?>";
            var curr_date = "<?php date_default_timezone_set('Asia/Calcutta'); echo date('d-m-Y');?>";
            var curr_time = "<?php date_default_timezone_set('Asia/Calcutta'); echo date('h:i a');?>";
            var taken_by = "<?php echo $_SESSION['username']; ?>";
            var taken_by_id = "<?php echo $_SESSION['id']; ?>";
            var payment_mode = $("input[name='payment_mode']:checked").val();
            var invoice_no = "<?php echo $invoice; ?>";
            var charge = $(".charge").val();
            var total_price = $(".invoice-price").text();
            var net_amount = $(".net-amount").text();
            InvoiceData = $.toJSON(InvoiceData);

            var count = 1;
            var tbody_tr = "";
            $('#invoice-table tbody tr').each(function(row, tr) {
                tbody_tr = tbody_tr + "<tr>" +
                    "<td align=center>" + count + "</td>" +
                    "<td align=center>" + $(tr).find('td:eq(1)').text() + "</td>" +
                    "<td align=center>" + $(tr).find('td:eq(3)').text() + "</td>" +
                    "<td align=center>" + $(tr).find('td:eq(2)').text() + "</td>" +
                    "<td align=center>" + $(tr).find('td:eq(4)').text() + "</td></tr>";
                count = count + 1;
            });

            var divContent = "<!DOCTYPE html>"+
                                "<html lang='en'>"+
                                    "<head>"+
                                        "<meta charset='UTF-8'>"+
                                        "<meta name='viewport' content='width=device-width, initial-scale=1.0'>"+
                                        "<meta http-equiv='X-UA-Compatible' content='ie=edge'>"+
                                        "<title>Receipt example</title>"+
                                        "</head>"+
                                        "<body style='height:290px;width:400px'>"+
                                            "<div class='ticket'>"+
                                            "<img src='images/bill-head-bw.png' alt='Logo' style='height:120px;width:400px'>"+
                                                "<p>GST IN : 23ABNPJ8034D2ZU</p>"+
                                                "<table style='width:100%'>"+
                                                    "<tbody>"+
                                                        "<tr>"+
                                                            "<th sytle='width:25%'>Invoice No.</th>"+
                                                            "<td style='width:25%'>"+invoice_no +"</td>"+
                                                            "<th sytle='width:25%'>Date</th>"+
                                                            "<td style='width:25%'>"+ curr_date +"</td>"+
                                                        "</tr>"+
                                                        "<tr>"+
                                                            "<th sytle='width:25%'>Table/Room</th>"+
                                                            "<td style='width:25%'>"+tbl_name +"</td>"+
                                                            "<th sytle='width:25%'>Time</th>"+
                                                            "<td style='width:25%'>"+ curr_time +"</td>"+
                                                        "</tr>"+
                                                    "</tbody>"+
                                                    "<tbody>"+
                                                        "<tr>"+
                                                            "<th class='sno'>S.No.</th>"+
                                                            "<th class='particulars'>Particulars</th>"+
                                                            "<th class='price'>Rate</th>"+
                                                            "<th class='qty'>Qty.</th>"+
                                                            "<th class='amount'>Amount</th>"+
                                                        "</tr>"+
                                                    "</tbody>"+
                                                    "<tbody>"+ tbody_tr +
                                                    "</tbody>"+
                                                "</table>"+
                                                "<div style='width: 290px; display: flex;  border-bottom: 1px dashed black'>"+
                                                "<div style='width: 164px;'>"+
                                                    "<img src='dist/img/thankyou.png' style='width:50%;padding: 10px;' alt=''>"+
                                                        "</div>"+
                                                    "<div style='width: 126px;'>"+
                                                    "<table style='width: 100%;'>"+
                                                        "<tfoot>"+
                                                            "<tr>"+
                                                                "<td class='totalfoot'>Total</td>"+
                                                                    "<td class='totamount'>"+ total_price +"</td>"+
                                                                    "</tr>"+
                                                                "<tr>"+
                                                                "<td class='totalfoot'>Charge</td>"+
                                                                    "<td class='totamount'>"+ charge +"</td>"+
                                                                    "</tr>"+
                                                                "<tr>"+
                                                                "<td class='totalfoot'>Net Amount</td>"+
                                                                    "<td class='totamount' style='border-top: 1px dashed black'>"+ net_amount +"</td>"+
                                                                    "</tr>"+
                                                                "</tfoot>"+
                                                            "</table>"+
                                                        "</div>"+
                                                    "</div>"+
                                                "<p>Payment Mode : "+payment_mode+"</p>"+    
                                                "<p>Order Taken By : "+taken_by+"</p>"+
                                                "<p>Have a nice Day<br>Techno Buddies IT Solutions +91 6261628848</p>"+
                                                "</div>"+
                                        "</body>"+
                                    "</html>";
            
            $.ajax({
                type: "POST",
                url: "controller/add-order.php",
                data: {
                    InvoiceData: divContent,
                    tbl_name: tbl_name,
                    invoice_no: invoice_no,
                    payment_mode: payment_mode,
                    quantity: total_items,
                    charge: charge,
                    total_price: total_price,
                    net_amount: net_amount,
                    taken_by_id: taken_by_id,
                    taken_by: taken_by
                },
                success: function(msg) {
                    if (msg != "") {
                        alert(msg);
                    }
                    window.location.href = "dashboard.php";
                }
            });

            var a = window.open('', '', 'height=500, width=500');
            a.document.write(divContent);
            a.document.close();
            a.print();
        }

        $(".nav-tabs a.nav-link").click(function() {
            var x = $(this).attr("href");
            x = x.replace("#", "");
            $(".tab-content .tab-pane").each(function() {
                var y = $(this).attr("id");
                if (x == y) $(this).addClass("active show");
                else $(this).removeClass("active show");
            });
            Total();
        });
    </script>
    <script>
    function openCity(evt, cityName) {
        var i, menutable, tablinks;
        menutable = document.getElementsByClassName("menu-table");
        for (i = 0; i < menutable.length; i++) {
            menutable[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";

        Total();
    }
    </script>

    <script>
    $(document).ready(function() {
        $(".item-name").click(function() {
            var food = $(this).children('p').text();
            var price = $(this).children('span').text();
            var checkfood = false;
            $('#table-data tr').each(function(row, tr) {
                if (food == $(tr).find('td:eq(1)').text()) {
                    checkfood = true;

                    var $input = $(tr).find('input.in-num');
                    var count = parseFloat($input.val()) + 1
                    $input.val(count);
                    if (count > 1) {
                        $(tr).find(('.minus')).removeClass('dis');
                    }
                    $input.change();
                    var unit = $(tr).find(".unit-price").val();
                    var total = parseFloat(count * unit).toFixed(2);
                    $(tr).children(".total").text(total);
                }
            });

            if (!checkfood) {
                $("#table-data tbody").append(
                    "<tr class='calc'>" +
                    "<td align='center'></td>" +
                    "<td class='food'><a>" + food + "</a></td>" +
                    "<td style='text-align:center;' class='quant'>" +
                    "<a>" +
                    "<div class='num-block skin-1'>" +
                    "<div class='num-in' style='margin: auto;'>" +
                    "<span class='minus dis'></span>" +
                    "<input type='text' style='text-align:center !important;' class='in-num' value='1' readonly=''>" +
                    "<span class='plus'></span>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</td>" +
                    "<td class='unit' style='text-align: center;'>" +
                    "<input type='number' class='form-control unit-price' style='width: 100px; float: right; text-align: right;' value='" +
                    price + "' />" +
                    "</td>" +
                    "<td style='text-align: right;' class='total'>" + price + "</td>" +
                    "<td align='center'><a href='#'><i class='fas fa-trash-alt delete-btn' style='font-size: 25px;'></i></a></td>" +
                    "</tr>"
                );
            }
            Total();
        });
    });

    function Total() {
        var total_price = 0;
        if ($("#table-data tbody tr").length > 0) {
            // alert("Have Rows");
            $('#table-data tbody tr').each(function(row, tr) {
                // alert($(this).find('td:eq(4)').text());
                total_price = total_price + parseInt($(this).find('td:eq(4)').text());
            });
            $(".total-price").text(total_price);
        } else {
            // alert("No Rows");
            $(".total-price").text(total_price);
        }
    }

    function TotalItems() {
        var total_items = 0;
        if ($("#invoice-table tbody tr").length > 0) {
            // alert("Have Rows");
            $('#invoice-table tbody tr').each(function(row, tr) {
                total_items = Number(total_items) + Number($(this).find('td:eq(2)').text().trim());
            });
        }
        return total_items;
    }

    //click event for delete menu item from selected table 
    $(document).on("click", ".delete-btn", function() {
        var food_name = $(this).closest("tr").children(".food").text();
        $(this).closest("tr").remove();
        Total();
    });

    $(document).on("click", ".Save", function() {
        var TableData = new Array();
        $('#table-data tr').each(function(row, tr) {
            TableData[row] = {
                "item": $(tr).find('td:eq(1)').text(),
                "qty": $(tr).find('td:eq(2) input').val(),
                "unit_price": $(tr).find('.unit-price').val(),
                "total_price": $(tr).find('td:eq(4)').text().trim()
            }
        });
        TableData.shift(); // first row is the table header - so remove

        var tbl_name = "<?php echo $_GET['tbl']; ?>";
        TableData = $.toJSON(TableData);
        $.ajax({
            type: "POST",
            url: "controller/add-items-to-table.php",
            data: {
                TableData: TableData,
                tbl_name: tbl_name
            },
            success: function(msg) {
                // return value stored in msg variable
                if (msg != "") {
                    alert(msg);
                }
                window.location.href = "dashboard.php";
            }
        });
        Total();
    })

    $(document).on("click", ".invoice-data", function() {
        $("#invoice-table tbody").empty();
        var invoice_tr = "";
        $('#table-data tbody tr').each(function(row, tr) {
            invoice_tr = invoice_tr + "<tr>" +
                "<td></td>" +
                "<td>" + $(tr).find('td:eq(1)').text() + "</td>" +
                "<td>" + $(tr).find('td:eq(2) input').val() + "</td>" +
                "<td>" + $(tr).find('.unit-price').val() + "</td>" +
                "<td>" + $(tr).find('td:eq(4)').text() + "</td></tr>";
        });
        $("#invoice-table tbody").append(invoice_tr);
    })
    </script>
    <script>
    $(document).ready(function() {
        $(".charge").change(function() {
            var charge = parseInt($(this).val());
            var total_amount = parseInt($(".invoice-price").text()) + charge;
            $(".net-amount").text(total_amount);
        });

        $(document).on('click', '.num-in span', function() {
            var $input = $(this).parents('.num-block').find('input.in-num');
            if ($(this).hasClass('minus')) {
                var count = parseFloat($input.val()) - 1;
                count = count < 1 ? 1 : count;
                if (count < 2) {
                    $(this).addClass('dis');
                } else {
                    $(this).removeClass('dis');
                }
                $input.val(count);
            } else {
                var count = parseFloat($input.val()) + 1
                $input.val(count);
                if (count > 1) {
                    $(this).parents('.num-block').find(('.minus')).removeClass('dis');
                }
            }
            $input.change();
            var unit = $(this).parents(".calc").find(".unit-price").val();
            var total = parseFloat(count * unit).toFixed(2);
            $(this).parents(".calc").children(".total").text(total);

            Total();
            return false;
        });
        Total();
    });
    </script>
    <script>
        $(document).on("change", ".unit-price", function() {
           var unit_price = $(this).val();
           var qty = $(this).closest("tr").find('.in-num').val();
           var total = unit_price*qty; 
           $(this).closest("tr").find('td:eq(4)').text(total);
            
            Total();
        });
    </script>
</body>

</html>