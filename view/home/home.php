<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../../system/Autoload.php');
?>

<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Book Shop</title>

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="../../Assets/AdminLte3/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../Assets/AdminLte3/dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <style>
        @media only screen and (max-width: 800px) {

            #displayDateTime {
                display: none;
            }

            #canvas {
                display: none;
            }
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">

                </li>

            </ul>

            <!-- SEARCH FORM Deleted-->


            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="../../Assets/AdminLte3/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline"><?php echo $_SESSION['active_user']['user_name'] ?></span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="../../Assets/AdminLte3/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">

                            <p>
                                <?php echo $_SESSION['active_user']['user_name'] ?>
                                <small>Member since Nov. 2012</small>
                            </p>
                        </li>
                        <!-- Menu Body -->

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="#" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="#" class="brand-link">
                <img src="../../assets/img/logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Book Shop POS</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">

                                <i class="nav-icon fas fa-clipboard-list"></i>

                                <p>
                                    Reports
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-clipboard nav-icon"></i>

                                        <p>Stock Count</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-clipboard nav-icon"></i>
                                        <p>Daily Summary</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-th"></i>
                                <p>
                                    Stock
                                </p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview ">
                            <a href="#" class="nav-link">
                                <i class="nav-icon fas fa-user-alt"></i>
                                <p>
                                    User Management
                                    <i class="right fas fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>User</p>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        <i class="far fa-user nav-icon"></i>
                                        <p>Privilages</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <!-- Left Content -->
                        <div class="col-sm-9">
                            <!-- Main content -->
                            <div class="content">
                                <div class="container-fluid">
                                    <div class="row">

                                    </div>
                                    <!-- /.row -->
                                </div><!-- /.container-fluid -->
                            </div>
                            <!-- /.content -->

                        </div><!-- /.col   Left Content -->
                        <!-- clock -->
                        <div class="col-sm-3 text-right">
                            <canvas id="canvas" width="160" height="160"> </canvas>
                            <strong><span class="nav-link text-info" id="displayDateTime" style="font-size: 180%;">2020-11-18 </span></strong>
                        </div><!-- /.col clock-->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->


        </div>
        <!-- /.content-wrapper -->



        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="float-right d-none d-sm-inline">
                <strong> <a href="https://www.youtube.com/c/NadunNilanga">NadunNilanga</a></strong>
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; 2014-2019 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="../../Assets/AdminLte3/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../../Assets/AdminLte3/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../../Assets/AdminLte3/dist/js/adminlte.min.js"></script>

    <script>
        showDate();

        function showDate() {
            var today = new Date();
            var year = today.getFullYear();
            var month = today.getMonth();
            var date = today.getDate();
            document.getElementById('displayDateTime').innerHTML = year + "-" + month + "-" + date;

        }



        var canvas = document.getElementById("canvas");
        var ctx = canvas.getContext("2d");
        var radius = canvas.height / 2;
        ctx.translate(radius, radius);
        radius = radius * 0.90
        setInterval(drawClock, 1000);

        function drawClock() {
            ctx.clearRect(-radius, -radius, canvas.width, canvas.height);
            drawFace(ctx, radius);
            drawNumbers(ctx, radius);
            drawTime(ctx, radius);

        }

        function drawFace(ctx, radius) {
            var grad;
            ctx.beginPath();
            /*  ctx.arc(0, 0, radius, 0, 2*Math.PI);
              ctx.fillStyle = 'white';
              ctx.fill();*/
            grad = ctx.createRadialGradient(0, 0, radius * 0.95, 0, 0, radius * 1.05);
            grad.addColorStop(0, '#333');
            grad.addColorStop(0.5, 'white');
            grad.addColorStop(1, '#333');
            ctx.strokeStyle = grad;
            ctx.lineWidth = radius * 0.1;
            ctx.stroke();
            ctx.beginPath();
            ctx.arc(0, 0, radius * 0.1, 0, 2 * Math.PI);
            ctx.fillStyle = '#333';
            ctx.fill();
        }

        function drawNumbers(ctx, radius) {
            var ang;
            var num;
            ctx.font = radius * 0.15 + "px arial";
            ctx.textBaseline = "middle";
            ctx.textAlign = "center";
            for (num = 1; num < 13; num++) {
                ang = num * Math.PI / 6;
                ctx.rotate(ang);
                ctx.translate(0, -radius * 0.85);
                ctx.rotate(-ang);
                ctx.fillText(num.toString(), 0, 0);
                ctx.rotate(ang);
                ctx.translate(0, radius * 0.85);
                ctx.rotate(-ang);
            }
        }

        function drawTime(ctx, radius) {
            var now = new Date();
            var hour = now.getHours();
            var minute = now.getMinutes();
            var second = now.getSeconds();
            //hour
            hour = hour % 12;
            hour = (hour * Math.PI / 6) +
                (minute * Math.PI / (6 * 60)) +
                (second * Math.PI / (360 * 60));
            drawHand(ctx, hour, radius * 0.5, radius * 0.07);
            //minute
            minute = (minute * Math.PI / 30) + (second * Math.PI / (30 * 60));
            drawHand(ctx, minute, radius * 0.8, radius * 0.07);
            // second
            second = (second * Math.PI / 30);
            drawHand(ctx, second, radius * 0.9, radius * 0.02);
        }

        function drawHand(ctx, pos, length, width) {
            ctx.beginPath();
            ctx.lineWidth = width;
            ctx.lineCap = "round";
            ctx.moveTo(0, 0);
            ctx.rotate(pos);
            ctx.lineTo(0, -length);
            ctx.stroke();
            ctx.rotate(-pos);
        }
    </script>
</body>

</html>