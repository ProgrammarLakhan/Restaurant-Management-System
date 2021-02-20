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
  <title>श्री वृन्दावन रेस्टोरेंट</title>

  <!-- Google Font: Source Sans Pro -->
  
  <link href="https://technobuddies.in/assets/img/favicon.png" rel="icon">

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
  <style>
    .dot {
  height: 15px;
  width: 15px;
  background-color: #bbb;
  border-radius: 50%;
  display: inline-block;
}
body {font-family: Arial;}

/* Style the tab */
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
  padding: 18px 20px;
  transition: 0.3s;
  font-size: 17px;
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
  color: rgb(15, 15, 15);
  text-align: center;
  padding: 30px;
  text-decoration: none;
  border-top: 5px solid #28a745;
  border-bottom: 5px solid #28a745;
  border-radius: 5px;
  box-shadow: 0 0 1px rgba(134, 134, 134, 0.125),0 1px 3px rgba(0,0,0,.2);
}

div.scrollmenu a:hover {
  background-color: #ddd;
  
}
.tablinks{
  color: #f1f1f1;
  font-weight: bold;
  background-color: #fff;
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

  @media only screen and (max-width: 600px){
    .main-sidebar{
      width: 250px !important;
    }
  }

  @media only screen and (max-width: 998px){
    .main-sidebar{
      width: 250px !important;
    }
  }

  .whiteonhover{
    transition: 1s;
  }

  .whiteonhover:hover{
    background-color: #fff !important;
  }

  #myUL li{
    border-bottom:1px solid #4f5962 ;
    padding: 5px;
  }
 </style>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark navbar-dark" style="background-color: #001f3f;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

    
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          <i class="fas fa-user-circle  "></i>
          <?php echo $_SESSION['username']; ?>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php" role="button">
          
          <i class="fas fa-sign-out-alt"></i>
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

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4" >
    <!-- Brand Logo -->
    <a href="https:technobuddies.in/" target="_blank" class="brand-link" style="background-color: #001f3f;">
      <img src="dist/img/tblogo.png" alt="TB" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"><small>Techno-Buddies IT Solutions</small></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar" style="background-image: url(dist/img/blur-restaurant-3.png); position: absolute; top: 56px; bottom: 0;">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      
        <div class="info">
          <img src="images/main-logo.png" style="width:100%;">
        </div>
      </div>
      <!-- Sidebar Menu -->
      <nav class="mt-2" id="leftpanel">
        <ul class="nav nav-pills nav-sidebar flex-column yemek" id="myUL" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="dashboard.php" class="nav-link">
              <i class="fas fa-tachometer-alt"></i>
              <p>Dashborad</p>
            </a>
          </li>          
          <li class="nav-item">
            <a href="Rate-list.php" class="nav-link">
              <i class="fas fa-list-alt"></i>
              <p>Rate List</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="invoice-Report.php" class="nav-link">
              <i class="fas fa-file-invoice"></i>
                <p>Invoice Report</p>
            </a>
          </li>
          <li class="nav-item">
            <a href="add-users.php" class="nav-link">
              <i class="fas fa-user-circle"></i>
                <p>My Users</p>
            </a>
          </li> 
          <li class="nav-item">
            <a href="Support.php" class="nav-link">
              <i class="fas fa-file-invoice"></i>
                <p>Help & Support</p>
            </a>
          </li>    
          <li class="nav-item">
            <a href="logout.php" class="nav-link">
              <i class="fas fa-sign-out-alt"></i>
                <p>Logout</p>
            </a>
          </li>      
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
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
                <div class="card"  style="background-image:url(images/LF18-June-All-Stars.jpg)">
                  
                  <div class="scrollmenu table-tab p-1">
                    <a href="table.php?tbl=Take Away" class="tablinks active whiteonhover" onclick="openCity(event, 'table1')" style=" color: black; border: 3px solid black;background-color:rgba(255, 255, 255, 0.7);">Parcel (Take Away)</a>
                  </div>
              </div>  
        <!-- Small boxes (Stat box) -->
        <div class="card" style="border-top: 3px solid #001f3f;border-left: 3px solid #001f3f;border-right: 3px solid #001f3f; background-image: url(images/LF18-June-All-Stars.jpg); background-size: cover; ">
          <div class="card-header" style="background-color: rgba(255, 255, 255, 0.7)">
            <div class="card-title">
              <h5 style="margin-bottom: 0;">Select Table (Ground Floor)</h5>
            </div>
          </div>
          <div class="scrollmenu table-tab p-1">
              <?php  
                include("config/config.php");
                $total = array();
                $color = array();
                for ($i=1; $i <= 8; $i++) { 
                  $tableB = "Table-A".$i;
                  $sql = "SELECT SUM(total_price) as total FROM tbl_info WHERE tbl_name='{$tableB}'";
                  $res = mysqli_query($conn,$sql);
                  if ($res) {
                    $total[$i-1] = mysqli_fetch_assoc($res)['total'];
                    if ($total[$i-1] == NULL) {
                      $total[$i-1] = 0;
                      $color[$i-1] = "#fff";
                    }else {
                      $color[$i-1] = "#ff4b4b";
                    }
                  }else {
                    $total[$i-1] = 0;
                    $color[$i-1] = "#fff";
                  }
                }
                
              ?>
            <a href="table.php?tbl=Table-A1" class="tablinks" style="background-color:<?php echo $color[0]; ?>" onclick="openCity(event, 'table1')" >Table-A1<hr>Total : ₹<?php echo $total[0]; ?></a>
            <a href="table.php?tbl=Table-A2" class="tablinks" style="background-color:<?php echo $color[1]; ?>" onclick="openCity(event, 'table2')" >Table-A2<hr>Total : ₹<?php echo $total[1]; ?></a>
            <a href="table.php?tbl=Table-A3" class="tablinks" style="background-color:<?php echo $color[2]; ?>" onclick="openCity(event, 'table3')" >Table-A3<hr>Total : ₹<?php echo $total[2]; ?></a>
            <a href="table.php?tbl=Table-A4" class="tablinks" style="background-color:<?php echo $color[3]; ?>" onclick="openCity(event, 'table4')" >Table-A4<hr>Total : ₹<?php echo $total[3]; ?></a>
            <a href="table.php?tbl=Table-A5" class="tablinks" style="background-color:<?php echo $color[4]; ?>" onclick="openCity(event, 'table5')" >Table-A5<hr>Total : ₹<?php echo $total[4]; ?></a>
            <a href="table.php?tbl=Table-A6" class="tablinks" style="background-color:<?php echo $color[5]; ?>" onclick="openCity(event, 'table6')" >Table-A6<hr>Total : ₹<?php echo $total[5]; ?></a>
            <a href="table.php?tbl=Table-A7" class="tablinks" style="background-color:<?php echo $color[6]; ?>" onclick="openCity(event, 'table7')" >Table-A7<hr>Total : ₹<?php echo $total[6]; ?></a>
            <a href="table.php?tbl=Table-A8" class="tablinks" style="background-color:<?php echo $color[7]; ?>" onclick="openCity(event, 'table8')" >Table-A8<hr>Total : ₹<?php echo $total[7]; ?></a>
          </div>

          <div class="card-header"  style="background-color: rgba(255, 255, 255, 0.7)">
            <div class="card-title">
              <h5 style="margin-bottom: 0;">Select Table (Basement)</h5>
            </div>
          </div>
          <div class="scrollmenu table-tab p-1">
            <?php  
              include("config/config.php");
              $totalB = array();
              $colorB = array();
              for ($i=1; $i <= 8; $i++) { 
                $tableB = "Table-B".$i;
                $sqlB = "SELECT SUM(total_price) as total FROM tbl_info WHERE tbl_name='{$tableB}'";
                $resB = mysqli_query($conn,$sqlB);
                if ($resB) {
                  $totalB[$i-1] = mysqli_fetch_assoc($resB)['total'];
                  if ($totalB[$i-1] == NULL) {
                    $totalB[$i-1] = 0;
                    $colorB[$i-1] = "#fff";
                  }else {
                    $colorB[$i-1] = "#ff4b4b";
                  }
                }else {
                  $totalB[$i-1] = 0;
                  $colorB[$i-1] = "#fff";
                }
              }
              
            ?>
            <a href="table.php?tbl=Table-B1" class="tablinks" style="background-color:<?php echo $colorB[0]; ?>" onclick="openCity(event, 'table9')">Table-B1<hr>Total : ₹<?php echo $totalB[0]; ?></a>
            <a href="table.php?tbl=Table-B2" class="tablinks" style="background-color:<?php echo $colorB[1]; ?>" onclick="openCity(event, 'table10')">Table-B2<hr>Total : ₹<?php echo $totalB[1]; ?></a>
            <a href="table.php?tbl=Table-B3" class="tablinks" style="background-color:<?php echo $colorB[2]; ?>" onclick="openCity(event, 'table11')">Table-B3<hr>Total : ₹<?php echo $totalB[2]; ?></a>
            <a href="table.php?tbl=Table-B4" class="tablinks" style="background-color:<?php echo $colorB[3]; ?>" onclick="openCity(event, 'table12')">Table-B4<hr>Total : ₹<?php echo $totalB[3]; ?></a>
            <a href="table.php?tbl=Table-B4" class="tablinks" style="background-color:<?php echo $colorB[4]; ?>" onclick="openCity(event, 'table13')">Table-B5<hr>Total : ₹<?php echo $totalB[4]; ?></a>
            <a href="table.php?tbl=Table-B6" class="tablinks" style="background-color:<?php echo $colorB[5]; ?>" onclick="openCity(event, 'table14')">Table-B6<hr>Total : ₹<?php echo $totalB[5]; ?></a>
            <a href="table.php?tbl=Table-B7" class="tablinks" style="background-color:<?php echo $colorB[6]; ?>" onclick="openCity(event, 'table15')">Table-B7<hr>Total : ₹<?php echo $totalB[6]; ?></a>
            <a href="table.php?tbl=Table-B8" class="tablinks" style="background-color:<?php echo $colorB[7]; ?>" onclick="openCity(event, 'table16')">Table-B8<hr>Total : ₹0<?php echo $totalB[7]; ?></a>
          </div>

      </div>
      
      
    <!-- Small boxes (Stat box) -->
    <div class="card" style="border-top: 3px solid #001f3f;border-left: 3px solid #001f3f;border-right: 3px solid #001f3f; background-image: url(images/LF18-June-All-Stars.jpg); background-size: cover; ">
      <div class="card-header" style="background-color: rgba(255, 255, 255, 0.7)">
        <div class="card-title">
          <h5 style="margin-bottom: 0;">Select Rooms (1st Floor)</h5>
        </div>
      </div>
        <?php
          $room_total = array();
          $room_color = array();
          for ($i=1; $i <= 7; $i++) { 
            $room = "Room-10".$i;
            $sql2 = "SELECT SUM(total_price) as total FROM room_info WHERE room_name='{$room}'";
            $res2 = mysqli_query($conn,$sql2);
            if ($res2) {
              $room_total[$i-1] = mysqli_fetch_assoc($res2)['total'];
              if ($room_total[$i-1] == NULL) {
                $room_total[$i-1] = 0;
                $room_color[$i-1] = "#fff";
              }else {
                $room_color[$i-1] = "#ff4b4b";
              }
            }else {
              $room_total[$i-1] = 0;
              $room_color[$i-1] = "#fff";
            }
          }
        ?>
      <div class="scrollmenu table-tab p-1">
        <a href="table.php?tbl=Room-101" style="background-color:<?php echo $room_color[0]; ?>" class="tablinks" onclick="openCity(event, 'table1')" >Room-101<hr>Total : ₹<?php echo $room_total[0]; ?></a>
        <a href="table.php?tbl=Room-102" style="background-color:<?php echo $room_color[1]; ?>" class="tablinks" onclick="openCity(event, 'table2')">Room-102<hr>Total : ₹<?php echo $room_total[1]; ?></a>
        <a href="table.php?tbl=Room-103" style="background-color:<?php echo $room_color[2]; ?>" class="tablinks" onclick="openCity(event, 'table3')">Room-103<hr>Total : ₹<?php echo $room_total[2]; ?></a>
        <a href="table.php?tbl=Room-104" style="background-color:<?php echo $room_color[3]; ?>" class="tablinks" onclick="openCity(event, 'table4')">Room-104<hr>Total : ₹<?php echo $room_total[3]; ?></a>
        <a href="table.php?tbl=Room-105" style="background-color:<?php echo $room_color[4]; ?>" class="tablinks" onclick="openCity(event, 'table5')">Room-105<hr>Total : ₹<?php echo $room_total[4]; ?></a>
        <a href="table.php?tbl=Room-106" style="background-color:<?php echo $room_color[5]; ?>" class="tablinks" onclick="openCity(event, 'table6')">Room-106<hr>Total : ₹<?php echo $room_total[5]; ?></a>
        <a href="table.php?tbl=Room-107" style="background-color:<?php echo $room_color[6]; ?>" class="tablinks" onclick="openCity(event, 'table7')">Room-107<hr>Total : ₹<?php echo $room_total[6]; ?></a>  
      </div>
      <div class="card-header" style="background-color: rgba(255, 255, 255, 0.7)">
        <div class="card-title">
          <h5 style="margin-bottom: 0;">Select Rooms (2nd Floor)</h5>
        </div>
      </div>
        <?php
          $room_totalR2 = array();
          $room_colorR2 = array();
          for ($i=8; $i <= 14; $i++) { 
            $roomR2 = "Room-".(200+$i);
            $sqlR2 = "SELECT SUM(total_price) as total FROM room_info WHERE room_name='{$roomR2}'";
            $resR2 = mysqli_query($conn,$sqlR2);
            if ($resR2) {
              $room_totalR2[$i-8] = mysqli_fetch_assoc($resR2)['total'];
              if ($room_totalR2[$i-8] == NULL) {
                $room_totalR2[$i-8] = 0;
                $room_colorR2[$i-8] = "#fff";
              }else {
                $room_colorR2[$i-8] = "#ff4b4b";
              }
            }else {
              $room_totalR2[$i-8] = 0;
              $room_colorR2[$i-8] = "#fff";
            }
          }
        ?>
      <div class="scrollmenu table-tab p-1">
        <a href="table.php?tbl=Room-208" style="background-color:<?php echo $room_colorR2[0]; ?>" class="tablinks" onclick="openCity(event, 'table8')">Room-208<hr>Total : ₹<?php echo $room_totalR2[0]; ?></a>
        <a href="table.php?tbl=Room-209" style="background-color:<?php echo $room_colorR2[1]; ?>" class="tablinks" onclick="openCity(event, 'table9')">Room-209<hr>Total : ₹<?php echo $room_totalR2[1]; ?></a>
        <a href="table.php?tbl=Room-210" style="background-color:<?php echo $room_colorR2[2]; ?>" class="tablinks" onclick="openCity(event, 'table10')">Room-210<hr>Total : ₹<?php echo $room_totalR2[2]; ?></a>
        <a href="table.php?tbl=Room-211" style="background-color:<?php echo $room_colorR2[3]; ?>" class="tablinks" onclick="openCity(event, 'table11')">Room-211<hr>Total : ₹<?php echo $room_totalR2[3]; ?></a>
        <a href="table.php?tbl=Room-212" style="background-color:<?php echo $room_colorR2[4]; ?>" class="tablinks" onclick="openCity(event, 'table12')">Room-212<hr>Total : ₹<?php echo $room_totalR2[4]; ?></a>
        <a href="table.php?tbl=Room-213" style="background-color:<?php echo $room_colorR2[5]; ?>" class="tablinks" onclick="openCity(event, 'table13')">Room-213<hr>Total : ₹<?php echo $room_totalR2[4]; ?></a>
        <a href="table.php?tbl=Room-214" style="background-color:<?php echo $room_colorR2[6]; ?>" class="tablinks" onclick="openCity(event, 'table14')">Room-214<hr>Total : ₹<?php echo $room_totalR2[6]; ?></a>
      </div>
      <div class="card-header" style="background-color: rgba(255, 255, 255, 0.7)">
        <div class="card-title">
          <h5 style="margin-bottom: 0;">Select Rooms (3rd Floor)</h5>
        </div>
      </div>
        <?php
          $room_totalR3 = array();
          $room_colorR3 = array();
          for ($i=15; $i <= 20; $i++) { 
            $roomR3 = "Room-".(300+$i);
            $sqlR3 = "SELECT SUM(total_price) as total FROM room_info WHERE room_name='{$roomR3}'";
            $resR3 = mysqli_query($conn,$sqlR3);
            if ($resR3) {
              $room_totalR3[$i-15] = mysqli_fetch_assoc($resR3)['total'];
              if ($room_totalR3[$i-15] == NULL) {
                $room_totalR3[$i-15] = 0;
                $room_colorR3[$i-15] = "#fff";
              }else {
                $room_colorR3[$i-15] = "#ff4b4b";
              }
            }else {
              $room_totalR3[$i-15] = 0;
              $room_colorR3[$i-15] = "#fff";
            }
          }
        ?>
      <div class="scrollmenu table-tab p-1">
        <a href="table.php?tbl=Room-315" style="background-color:<?php echo $room_colorR3[0]; ?>" class="tablinks" onclick="openCity(event, 'table15')">Room-315<hr>Total : ₹<?php echo $room_totalR3[0]; ?></a>
        <a href="table.php?tbl=Room-316" style="background-color:<?php echo $room_colorR3[1]; ?>" class="tablinks" onclick="openCity(event, 'table16')">Room-316<hr>Total : ₹<?php echo $room_totalR3[1]; ?></a>
        <a href="table.php?tbl=Room-317" style="background-color:<?php echo $room_colorR3[2]; ?>" class="tablinks" onclick="openCity(event, 'table17')">Room-317<hr>Total : ₹<?php echo $room_totalR3[2]; ?></a>
        <a href="table.php?tbl=Room-318" style="background-color:<?php echo $room_colorR3[3]; ?>" class="tablinks" onclick="openCity(event, 'table18')">Room-318<hr>Total : ₹<?php echo $room_totalR3[3]; ?></a>
        <a href="table.php?tbl=Room-319" style="background-color:<?php echo $room_colorR3[4]; ?>" class="tablinks" onclick="openCity(event, 'table19')">Room-319<hr>Total : ₹<?php echo $room_totalR3[4]; ?></a>
        <a href="table.php?tbl=Room-320" style="background-color:<?php echo $room_colorR3[5]; ?>" class="tablinks" onclick="openCity(event, 'table20')">Room-320<hr>Total : ₹<?php echo $room_totalR3[4]; ?></a>
        <a href="table.php?tbl=Room-321" style="background-color:<?php echo $room_colorR3[6]; ?>" class="tablinks" onclick="openCity(event, 'table21')">Room-321<hr>Total : ₹<?php echo $room_totalR3[5]; ?></a>
      </div>
      <div class="card-header" style="background-color: rgba(255, 255, 255, 0.7)">
        <div class="card-title">
          <h5 style="margin-bottom: 0;">Select Rooms (4th Floor)</h5>
        </div>
      </div>
      <?php
          $room_totalR4 = array();
          $room_colorR4 = array();
          for ($i=22; $i <= 27; $i++) { 
            $roomR4 = "Room-".(400+$i);
            $sqlR4 = "SELECT SUM(total_price) as total FROM room_info WHERE room_name='{$roomR4}'";
            $resR4 = mysqli_query($conn,$sqlR4);
            if ($resR4) {
              $room_totalR4[$i-22] = mysqli_fetch_assoc($resR4)['total'];
              if ($room_totalR4[$i-22] == NULL) {
                $room_totalR4[$i-22] = 0;
                $room_colorR4[$i-22] = "#fff";
              }else {
                $room_colorR4[$i-22] = "#ff4b4b";
              }
            }else {
              $room_totalR4[$i-22] = 0;
              $room_colorR4[$i-22] = "#fff";
            }
          }
        ?>
      <div class="scrollmenu table-tab p-1">
        <a href="table.php?tbl=Room-422" style="background-color:<?php echo $room_colorR4[0]; ?>"  class="tablinks" onclick="openCity(event, 'table22')">Room-422<hr>Total : ₹<?php echo $room_totalR4[0]; ?></a>
        <a href="table.php?tbl=Room-423" style="background-color:<?php echo $room_colorR4[1]; ?>"  class="tablinks" onclick="openCity(event, 'table23')">Room-423<hr>Total : ₹<?php echo $room_totalR4[1]; ?></a>
        <a href="table.php?tbl=Room-424" style="background-color:<?php echo $room_colorR4[2]; ?>"  class="tablinks" onclick="openCity(event, 'table24')">Room-424<hr>Total : ₹<?php echo $room_totalR4[2]; ?></a>
        <a href="table.php?tbl=Room-425" style="background-color:<?php echo $room_colorR4[3]; ?>"  class="tablinks" onclick="openCity(event, 'table25')">Room-425<hr>Total : ₹<?php echo $room_totalR4[3]; ?></a>
        <a href="table.php?tbl=Room-426" style="background-color:<?php echo $room_colorR4[4]; ?>"  class="tablinks" onclick="openCity(event, 'table26')">Room-426<hr>Total : ₹<?php echo $room_totalR4[4]; ?></a>
        <a href="table.php?tbl=Room-427" style="background-color:<?php echo $room_colorR4[5]; ?>"  class="tablinks" onclick="openCity(event, 'table27')">Room-427<hr>Total : ₹<?php echo $room_totalR4[5]; ?></a>
      </div>
    </div>   

 </div><!-- /.container-fluid -->
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

<script>
  $(".nav-tabs a.nav-link").click(function(){
    var x = $(this).attr("href");
    x = x.replace("#", "");
    $(".tab-content .tab-pane").each(function(){
      var y = $(this).attr("id");
      if (x == y) $(this).addClass("active show");
      else $(this).removeClass("active show");
    });
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
  }
  </script>

</body>
</html>
