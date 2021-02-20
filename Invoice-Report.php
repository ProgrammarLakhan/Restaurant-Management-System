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
                                    <h1 style="color:white;">Invoice Reports</h1>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right">
                                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                                        <li class="breadcrumb-item active" style="color:white;">Invoice Report</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <!-- /.container-fluid -->
                    </section>


                    <div class="card">
                        <div class="card-header" style="background-color: #001f3f;">

                        </div>
                        <div class="card-body">

                            <div class="form-group d-flex">
                                <div class="row" style="width: 100%;">
                                <div class="col-lg-3">
                                        <div class="row">
                                            <label for="" class="col-sm-4">From Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="FromDate" name="FromDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <label for="" class="col-sm-4">To Date</label>
                                            <div class="col-sm-8">
                                                <input type="date" class="form-control" id="ToDate" name="ToDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="row">
                                            <div class="col-sm-8">
                                                <a type="button" class="btn btn-success" onclick="SearchByDate();">Search</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button class="btn btn-info" style="font-size: 20px; float: right;" onclick="PrintInvoice();">Print</button>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div id="invoice-print">
                                <table id="invoice-table" class="table table-striped table-bordered" style="width:100% ;overflow:scroll;">
                                    <thead>
                                        <tr>
                                            <th>S.No.</th>
                                            <th>Invoice No.</th>
                                            <th>Table/Room/Parcel</th>
                                            <th>Order Date</th>
                                            <th>No. of Items</th>
                                            <th>Subtotal</th>
                                            <th>Charge</th>
                                            <th>Total</th>
                                            <th>Payment Mode</th>
                                            <th>Taken by</th>
                                            <th>Print</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        include('config/config.php');
                                        $sql = "SELECT * FROM `orders`ORDER BY invoice_no DESC";
                                        $res= mysqli_query($conn,$sql);
                                        if($res){
                                            $count = 1;
                                            while($row = mysqli_fetch_assoc($res)){
                                                echo "<tr>
                                                        <td>".$count."</td>
                                                        <td>".$row['invoice_no']."</td>
                                                        <td>".$row['table_or_room']."</td>
                                                        <td>".date("d/m/Y",strtotime($row['time']))."</td>
                                                        <td>".$row['quantity']."</td>
                                                        <td>".$row['total_price']."</td>
                                                        <td>".$row['charge']."</td>
                                                        <td>".$row['net_amount']."</td>
                                                        <td>".$row['payment_mode']."</td>
                                                        <td>".$row['taken_by']."</td>
                                                        <td><a href='print-invoice.php?id=".$row["id"]."' target='_blank' class='btn btn-default'><i class='fas fa-print'></i></a></td>
                                                    </tr>";
                                                $count = $count + 1;
                                            }
                                        }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Total</th>
                                            <th></th>
                                            <th></th>
                                            <th></th>
                                            <th id="total-qty"></th>
                                            <th id="subtotal"></th>
                                            <th id="charge"></th>
                                            <th id="total"></th>
                                            <th></th>
                                        </tr>
                                    </tfoot>
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
            $('#invoice-table').DataTable();
            Total();
        });

        function Total() {
            var total_qty = 0;
            var subtotal = 0;
            var charge = 0;
            var total = 0;
            $('#invoice-table tbody tr').each(function(row, tr) {
                total_qty = total_qty + parseInt($(tr).find('td:eq(4)').text());
                subtotal = subtotal + parseInt($(tr).find('td:eq(5)').text());
                charge = charge + parseInt($(tr).find('td:eq(6)').text());
                total = total + parseInt($(tr).find('td:eq(7)').text());
            });
            $("#total-qty").text(total_qty);
            $("#subtotal").text(subtotal);
            $("#charge").text(charge);
            $("#total").text(total);
        }
    </script>
    <script>
        //Function for searching by date
        function SearchByDate(){
            var FromDate = $("#FromDate").val();
            var ToDate = $("#ToDate").val();
            $.ajax({
                type: "POST",
                url: "controller/search-invoice-report.php",
                data: {
                    FromDate: FromDate,
                    ToDate: ToDate
                },
                success: function(rows) {
                    $("#invoice-table tbody").empty();
                    $("#invoice-table tbody").append(rows);
                    Total();
                }
            });
        }
    </script>
    <script>
        function PrintInvoice() {
            var content = document.getElementById("invoice-print").innerHTML;
            var table_tr = '';
            var count = 1;
            $('#invoice-table tbody tr').each(function(row, tr) {
                table_tr += "<tr align='center'>"+
                                "<td>"+count+"</td>" +
                                "<td>" + $(tr).find('td:eq(1)').text() + "</td>" +
                                "<td>" + $(tr).find('td:eq(2)').text() + "</td>" +
                                "<td>" + $(tr).find('td:eq(3)').text() + "</td>" +
                                "<td>" + $(tr).find('td:eq(4)').text() + "</td>"+
                                "<td>" + $(tr).find('td:eq(5)').text() + "</td>" +
                                "<td>" + $(tr).find('td:eq(6)').text() + "</td>" +
                                "<td>" + $(tr).find('td:eq(7)').text() + "</td>" +
                                "<td>" + $(tr).find('td:eq(8)').text() + "</td>"+
                                "<td>" + $(tr).find('td:eq(9)').text() + "</td>"+
                            "</tr>";
                count++;
            });
            $('#invoice-table tfoot tr').each(function(row, tr) {
                table_tr += "<tr align='center'>"+
                                "<th>Total</th>" +
                                "<th>" + $(tr).find('th:eq(1)').text() + "</th>" +
                                "<th>" + $(tr).find('th:eq(2)').text() + "</th>" +
                                "<th>" + $(tr).find('th:eq(3)').text() + "</th>" +
                                "<th>" + $(tr).find('th:eq(4)').text() + "</th>"+
                                "<th>" + $(tr).find('th:eq(5)').text() + "</th>" +
                                "<th>" + $(tr).find('th:eq(6)').text() + "</th>" +
                                "<th>" + $(tr).find('th:eq(7)').text() + "</th>" +
                                "<th>" + $(tr).find('th:eq(8)').text() + "</th>"+
                                "<th>" + $(tr).find('th:eq(9)').text() + "</th>"+
                            "</tr>";
                count++;
            });
            var a = window.open('', '', 'height=600, width=600');
            a.document.write('<html><body>');
            a.document.write('<table border="1" cellspacing="0" cellpadding="0" width="200" align="center">'+
                                '<thead>'+
                                    '<tr align="center">'+
                                        '<th>S.No.</th>'+
                                        '<th>Invoice No.</th>'+
                                        '<th>Table/Room/Parcel</th>'+
                                        '<th>Order Date</th>'+
                                        '<th>No. of Items</th>'+
                                        '<th>Subtotal</th>'+
                                        '<th>Charge</th>'+
                                        '<th>Total</th>'+
                                        '<th>Payment Mode</th>'+
                                        '<th>Taken by</th>'+
                                    '</tr>'+
                                '</thead>'+
                                '<tbody>');
            a.document.write(table_tr);
            a.document.write('</tbody>'+
                            '</table>');
            a.document.write('</body></html>');
            a.document.close();
            a.print();
        }
    </script>
</body>

</html>