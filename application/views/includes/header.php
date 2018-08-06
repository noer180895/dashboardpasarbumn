<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>PASAR BUMN</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
    <link href="<?php echo base_url(); ?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 4.3.0 -->
    <link href="<?php echo base_url(); ?>assets/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons 2.0.0 -->
    <link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
      folder instead of downloading all of them to reduce the load. -->
    <link href="<?php echo base_url(); ?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <!-- Datatable -->
    <link href="<?php echo base_url('assets/datatables/css/dataTables.bootstrap.css')?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')?>" rel="stylesheet">
    <link href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.bootstrap.min.css" rel="stylesheet">

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-2.1.4.min.js"></script>
    <script type="text/javascript">
      var baseURL = "<?php echo base_url(); ?>";
    </script>

    <!-- Datatable -->
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js')?>"></script>
    <script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.js')?>"></script>
    <script src="<?php echo base_url('assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>


    <script src="<?php echo base_url('assets/export/dataTables.buttons.min.js')?>"></script>
    <script src="<?php echo base_url('assets/export/buttons.flash.min.js')?>"></script>
    <script src="<?php echo base_url('assets/export/buttons.colVis.js')?>"></script>
    <script src="<?php echo base_url('assets/export/jszip.min.js')?>"></script>
    <script src="<?php echo base_url('assets/export/pdfmake.min.js')?>"></script>
    <script src="<?php echo base_url('assets/export/vfs_fonts.js')?>"></script>
    <script src="<?php echo base_url('assets/export/buttons.html5.min.js')?>"></script>
    <script src="<?php echo base_url('assets/export/buttons.print.min.js')?>"></script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue sidebar-mini">
    <div class="wrapper">
    <header class="main-header">
      <!-- Logo -->
      <a href="<?php echo base_url(); ?>" class="logo">
        <span class="logo-lg"><b>PASAR</b> BUMN</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu" id="actionmenu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="open">
              <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="user-image" alt="User Image"/>
              <span class="hidden-xs"><?php echo $username; ?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="<?php echo base_url(); ?>assets/dist/img/avatar.png" class="img-circle" alt="User Image" />
                  <p>
                    <?php echo $username; ?>
                    <small><?php echo $role_text; ?></small>
                  </p>
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="<?php echo base_url(); ?>loadChangePass" class="btn btn-default btn-flat"><i class="fa fa-key"></i> Change Password</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?php echo base_url(); ?>logout" class="btn btn-default btn-flat"><i class="fa fa-sign-out"></i> Sign out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li class="header">Navigasi Utama</li>
          <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_admin/">
            <i class="fa fa-file"></i>
            <span>Manage Admin User</span>
            </a>
          </li>




          <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_role/">
            <i class="fa fa-file"></i>
            <span>Manage Role Permision</span>
            </a>
          </li>


          <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_banner/">
            <i class="fa fa-file"></i>
            <span>Manage Banner</span>
            </a>
          </li>



          <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_footer/">
            <i class="fa fa-file"></i>
            <span>Manage Footer</span>
            </a>
          </li>



          <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_contact/">
            <i class="fa fa-file"></i>
            <span>Manage Contact</span>
            </a>
          </li>

          
           <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_logo/">
            <i class="fa fa-file"></i>
            <span>Manage Logo</span>
            </a>
          </li>
           

          <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_help/">
            <i class="fa fa-file"></i>
            <span>Manage Help</span>
            </a>
          </li>

          <li class="treeview">
            <a href="<?php echo base_url(); ?>manage_product/">
            <i class="fa fa-file"></i>
            <span>Manage Product</span>
            </a>
          </li>






           <li class="treeview">
            <a href="<?php echo base_url(); ?>logout/">
            <span class="glyphicon glyphicon-log-out">&nbsp;Logout</span>
            </a>
          </li>

        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>


<script type="text/javascript">

  $(document).ready(function() {
    $('#open').click(function() {
      var className = $('#actionmenu').attr('class');
      // alert(className);

      if(className = 'dropdown user user-menu'){
        $('#actionmenu').removeClass('dropdown user user-menu');
        $('#actionmenu').addClass('dropdown user user-menu open');
      }else{
        $('#actionmenu').removeClass('dropdown user user-menu open');
        $('#actionmenu').addClass('dropdown user user-menu');
      }
      
    });
  });


</script>