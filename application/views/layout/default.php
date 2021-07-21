<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset="UTF-8">
    <title><?=$title_for_layout?> | Invoice System</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link rel="shortcut icon" type="image/jpg" href="assets/icon/erex.jpg"/>
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_url('assets/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?=base_url('assets/plugins/fontawesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?=base_url('assets/plugins/ionicons/css/ionicons.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?=base_url('assets/plugins/datatables/dataTables.bootstrap.css');?>" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_url('assets/dist/css/AdminLTE.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_url('assets/dist/css/skins/_all-skins.min.css');?>" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?=base_url('assets/custom/mycss.css');?>" rel="stylesheet" type="text/css" />

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery 2.1.3 -->
    <script src="<?=base_url('assets/plugins/jQuery/jQuery-2.1.3.min.js');?>"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_url('assets/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=base_url('assets/plugins/slimScroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>    
    <!-- FastClick -->
    <script src='<?=base_url('assets/plugins/fastclick/fastclick.min.js');?>'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_url('assets/dist/js/app.min.js');?>" type="text/javascript"></script>
       
    <script src="<?=base_url('assets/js/jquery-ui.js')?>"></script>

    <script src="<?=base_url('assets/js/custom.js')?>"></script>

    <link rel="stylesheet" type="text/css" href="<?=base_url('assets/css/jquery-ui.css')?>"> 
    
  </head>
  <body class="skin-green layout-top-nav">
    <div class="wrapper">
      
      <header class="main-header">               
        <nav class="navbar navbar-static-top">
          <div class="container-fluid">
          <div class="navbar-header">
            <a href="<?php echo site_url();?>" class="navbar-brand">Codeigniter | <b>Simple Invoice System</b></a>
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
              <i class="fa fa-bars"></i>
            </button>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo site_url();?>"><span class="fa fa-home"></span> Home</a></li>
                <li><a href="<?php echo site_url();?>logout"><span class="fa fa-sign-out"></span> Logout</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
      </header>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->

          <!-- Dynamic Content Here modified by Erex -->
          <?=$content_for_layout?>  
          <!-- End Dynamic Content -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          
        </div>
        <strong>Copyright &copy;2021 <a href="http://facebook.com/ErexCabalquinto" target="_blank">Erex S. Cabalquinto</a>.</strong> All rights reserved.
      </footer>
    </div><!-- ./wrapper -->
  </body>
</html>
