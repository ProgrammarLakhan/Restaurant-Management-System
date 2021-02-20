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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">

    <style>
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

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-dark navbar-dark" style="background-color: #001f3f; margin-left: 0 !important;">
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
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link btn btn-primary" style="background-color: #023f7c; margin-right: 5px;" href="Invoice-Report.php">Invoice Reports</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link btn btn-primary" style="background-color: #023f7c; margin-right: 5px;" href="add-users.php">My Users</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a class="nav-link btn btn-primary" style="background-color: #023f7c; margin-right: 5px;" href="Rate-list.php">Rate List</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">
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
        <div class="content-wrapper" style="margin: 0;background-image: url(dist/img/banner.jpg);background-color: transparent; background-size: cover;">

            &nbsp;

            <!-- Main content -->
            <section class="content">
                <div class="container">

                    <!-- Content Header (Page header) -->
                    <section class="content-header">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <h1 style="color:white;">My Users</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" style="color:white;">My Users</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>

                    <div class="card">
                        <div class="card-header" style="background-color: #001f3f;"></div>
                        <div class="card-body">
                            <form class="add-user" method="POST">
                            
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">User Name</label>
                                            <input type="text" id="username" name="username" class="form-control" placeholder="User name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">User ID</label>
                                            <input type="text" id="user_id" name="user_id" class="form-control" placeholder="User ID" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="">Confirm Password</label>
                                            <input type="password" id="cpassword" name="cpassword" class="form-control" placeholder="Confirm Password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row save-div">
                                    <div class="col-md-10">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>                         
                            </form>
                            <div class="col-md-2 update-btn" style="display:none;">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary update-btn">Update</button>
                                </div>
                            </div>
                            <hr>
                            <div id="users">
                                <table id="users-table" class="table table-striped table-bordered" style="width:100% ;overflow:scroll;">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>User Name</th>
                                            <th>User ID</th>
                                            <th>Password</th>
                                            <th>Invoice by User</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include('config/config.php');
                                        $sql = "SELECT * FROM `auth`";
                                        $res = mysqli_query($conn,$sql);
                                        if($res){
                                            $num = 1;
                                            while ($row = mysqli_fetch_assoc($res)) {
                                                echo '<tr><td>'.$num.'</td>
                                                <td>'.$row['username'].'</td>
                                                <td>'.$row['user_id'].'</td>
                                                <td>'.$row['password'].'</td>
                                                <td><a href="user-invoice.php?id='.$row["id"].'">Click to view</a></td>
                                                <td>
                                                    <button class="btn btn-default EditUser" data-id="'.$row["id"].'"><i class="fas fa-edit"></i></button>
                                                    <button class="btn btn-default" onclick="DeleteUser('.$row["id"].')"><i class="fas fa-trash"></i></button>
                                                </td>
                                                </tr>';
                                                $num +=1;
                                            }
                                        }
                                    ?> 
                                    </tbody>
                                </table>
                            </div>
                        </div>
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
        $(document).ready(function() {
            $('#users-table').DataTable();
        });
    </script>
   
    <script>
        $(document).ready(function () {
            $(".add-user").on('submit',(function(e) {
                var cpassword = $("#cpassword").val();
                var password = $("#password").val();
                if(password != cpassword){
                    alert("Password not matched");
                    location.reload();
                }else{
                    e.preventDefault();
                    $.ajax({
                        url: "controller/add-user.php",
                        type: "POST",
                        data:  new FormData(this),
                        contentType: false,
                        cache: false,
                        processData:false,
                        success: function(res){
                            $(".add-user")[0].reset();
                            alert(res);
                            location.reload();
                        }
                    });
                }
            }));

            $(".EditUser").on('click',function(){
                var auth_id = $(this).attr('data-id');
                var username = $(this).closest("tr").find("td:eq(1)").text();
                var password = $(this).closest("tr").find("td:eq(3)").text();
                var user_id = $(this).closest("tr").find("td:eq(2)").text();
                
                $("#username").val(username);
                $("#user_id").val(user_id);
                $("#password").val(password); 
                $("#cpassword").val(password); 

                $(".save-div").remove();
                $(".update-btn").attr("data-id",auth_id);
                $(".update-btn").show();
            }); 

            $(".update-btn").on('click',(function(e) {
                var auth_id = $(this).attr("data-id");
                var username = $("#username").val();
                var user_id = $("#user_id").val();
                var password = $("#password").val();
                var cpassword = $("#cpassword").val();
                // alert(auth_id + "," + username + "," + user_id + "," + password);
                if(password != cpassword){
                    alert("Password not matched");
                    location.reload();
                }else{
                    $.ajax({
                        url: "controller/update-user.php",
                        type: "POST",
                        data: {
                            "username": username,
                            "user_id": user_id,
                            "password": password,
                            "id": auth_id
                        },
                        success: function(res){
                            alert(res);
                            $(".add-user")[0].reset();
                            location.reload();
                        }
                    });
                }
            }));
        });
    </script>
    <script>
        function DeleteUser(id) {
            $.ajax({
                url: "controller/delete-user.php",
                type: "POST",
                data: { "id" : id },
                success: function(res){
                    alert(res);
                    window.location.href='add-users.php';   
                }
                
            });
        }
    </script>
</body>

</html>