<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include "koneksi/koneksi.php";
include "include/kode_spt.php";
include "include/kode_sppd.php";
include "include/no_group.php";

if(@$_SESSION['admin'] || $_SESSION['user'] || $_SESSION['pegawai'] ){
 ?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>e-Perjadin Wil II</title>
 
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="icon" type="image/PNG" sizes="16x16" href="images/pupr2.PNG">
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

    <link rel="stylesheet" href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    
  <link rel="stylesheet" href="chosen.css">
   <link rel="stylesheet" href="chosen.min.css">


  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of th;;em to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <script src="bower_components/jquery/dist/jquery.min.js"></script>

  <link rel="stylesheet" type="text/css" href="multi.min.css">
        <script src="multi.min.js"></script>

  <link rel="stylesheet" type="text/css" href="sw/dist/sweetalert.css">
  <script type="text/javascript" src="sw/dist/sweetalert.min.js"></script>
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

  <script type="text/javascript" src="tinymce/tiny_mce.js"></script>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  


</head>
<body class="hold-transition skin-purple sidebar-mini" onload="noBack();"onpageshow="if (event.persisted) noBack();" onunload="">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b></b><img src="images/pupr.png" width="60px" width="70px"></span>
      <!-- logo for regular state and mobile devices -->
        <span class="logo-lg" style="margin-left: -28px;"><img src="images/pupr.png" width="48px"> e-Perjadin Wil II</span>
    </a>
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" style="background-image: url('loader/b1.png');">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
       
      </a>
    
      <div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
        <li>
					<a>
						Hallo, Tim Hebat
					</a>
          
				</li>
        
        
          <!-- Messages: style can be found in dropdown.less-->
          
            
             
          <!-- Notifications: style can be found in dropdown.less -->
         
          <!-- Tasks: style can be found in dropdown.less -->
         
          <!-- User Account: style can be found in dropdown.less -->

           <?php
                  if($_SESSION['admin']){
                       $user_l=$_SESSION['admin'];

                  }elseif ($_SESSION['user']) {
                       $user_l=$_SESSION['user'];
                  }

                  elseif ($_SESSION['pegawai']) {
                       $user_l=$_SESSION['pegawai'];
                  }

                  $sql_u = $koneksi->query("select* from tb_user2 where id='$user_l'");
                  $data_u = $sql_u->fetch_assoc();
            ?>


          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/<?php echo $data_u['foto']; ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $data_u['nama']; ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
              <img src="images/<?php echo $data_u['foto']; ?>" class="img-circle" alt="User Image">

                <p>
                  Anda login sebagai : <?php echo $data_u['level']; ?>

                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">

                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="?page=ubah_p&id=<?php echo $data_u['id']; ?>" class="btn btn-info btn-flat">Ubah Password</a>
                </div>
                <div class="pull-right">
                  <a href="logout.php" class="btn btn-danger btn-flat">Logout</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
          <a href="index.php?page=ubah_p&id=1889" data-toggle="fullscreen"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <?php include "include/menu.php" ?>

    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">


    </section>

    <!-- Main content -->
    <section class="content">

      <?php

            include "include/isi.php";

       ?>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php $tgl2 = date('Y'); ?>
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0.1
    </div>
    <strong> <img src=dist/img/bravo.png width="28px"> Copyright by : <a target="_blank" href="https://trakteer.id/djae/link"><b>Wajidan</b></a> &copy; 2024 - <?php echo $tgl2; ?></a>.</strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
 
<!-- ./wrapper -->
 <div class="control-sidebar-bg"></div>

<!-- jQuery 3 -->

<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<script src="chosen.jquery.js" type="text/javascript"></script>
<script src="chosen.jquery.min.js" type="text/javascript"></script>
<script src="docsupport/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="docsupport/init.js" type="text/javascript" charset="utf-8"></script>


<script src="bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>



<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>

  <script type="text/javascript">
   $("#kerja").chosen(
      {no_results_text: "Tidak ditemukan....!"}
   );
   
  </script>

   <script type="text/javascript">
   $("#kerja1").chosen(
     {no_results_text: "Tidak ditemukan....!"}
   );
   
  </script>

  <script type="text/javascript">
   $("#kerja2").chosen(
     {no_results_text: "Tidak ditemukan....!"}
   );
   
  </script>

  <script type="text/javascript">
   $("#kerja3").chosen(
     {no_results_text: "Tidak ditemukan....!"}
   );
   
  </script>

  <script type="text/javascript">
   $("#kerja4").chosen(
     {no_results_text: "Tidak ditemukan....!"}
   );
   
  </script>

  <script type="text/javascript">
   $("#kerja5").chosen(
     {no_results_text: "Tidak ditemukan....!"}
   );
   
  </script>
  
   <script type="text/javascript">
   $("#kerja6").chosen(
     {no_results_text: "Tidak ditemukan....!"}
   );
   
  </script>

<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>


 <script>
    var select = document.getElementById('fruit_select');
    multi(select, {
        
    });
</script>


</body>
</html>


<?php
    }else{
        header("location:login.php");
    }
?>
