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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Techno-Buddies-Grocery-Store-Management-System</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="dist/css/sb-admin-2.min.css" rel="stylesheet">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5" style="background-color: rgba(255, 255, 255, 0.7);">
                    <div class="card-body p-0">
                      
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <p>&nbsp;</p>
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h5 class="mb-0 ">Support & Help  </h5><span><a href="dashboard.php" class="btn btn-primary">Back to Dashboard     </a></span>
                    </div>
                    <hr>
                                <style>
                                    .img-circle {
                                        width: 120px;
                                        border: 1px solid black !important;
                                        border-radius: 50%;
                                    }
                                </style>
                        <!-- Profile Image -->
                            <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle" src="dist/img/tblogo.png" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">Techno-Buddies</h3>

                                <p class="text-muted text-center">IT Solutions</p>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Contact No.</b> <a style="float:right">0734-4950692 , 6261628848 , 6264941309</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Email</b> <a style="float:right">techno.buddies2020@gmail.com</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Web</b> <a href="https://technobuddies.in/" target="_blank" style="float:right">www.technobuddies.in</a>
                                    </li>
                                </ul>
                                <style>
                                    .social-links {
                                        text-decoration: none !important;
                                    }
                                </style>
                                <h1>
                                    <a class="social-links" href="https://www.facebook.com/tecno.buddies" target="_blank"><i class="fa fa-facebook"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    <a class="social-links" href="https://www.instagram.com/techno.buddies/" target="_blank"><i class="fa fa-instagram"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    <a class="social-links" href="https://www.linkedin.com/in/techno-buddies-69b10b1b2" target="_blank"><i class="fa fa-linkedin"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    <a class="social-links" href="https://twitter.com/technobuddies" target="_blank"><i class="fa fa-twitter"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    <a class="social-links" href="https://www.youtube.com/channel/UCdWCzSgm49F-KvWUA4Dj7dA" target="_blank"><i class="fa fa-youtube "></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                    <a class="social-links" href="#" onclick="window.alert('Our Whatsapp No. is - +91 6261628848')"><i class="fa fa-whatsapp "></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
                                </h1>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->    
                        
            </div>
            <!-- End of Main Content -->
             <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <a href="https://technobuddies.in">Techno-Buddies IT Solutions</a> | All Rights Reserved</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>