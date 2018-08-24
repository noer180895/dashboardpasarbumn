<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Pasar Produk BUMN</title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/images/favicon.png" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="<?php echo base_url(); ?>assets/images/apple-touch-icon-114x114-precomposed.png">
    <!-- Base Css -->
    <link href="<?php echo base_url(); ?>assets/css/base.css" rel="stylesheet" type="text/css" />

      <script type="text/javascript">
      var baseURL = "<?php echo base_url(); ?>";
    </script>
</head>

<body>
    <div class="se-pre-con"></div>
<div id="page-content">
  <!-- navber -->
    <nav id="mainNav" class="navbar navbar-fixed-top">
        <div class="container">
            <!--Brand and toggle get grouped for better mobile display-->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span><i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="<?php echo base_url(); ?>assets/images/logo-new.png" class="img-resposive" alt="" style="width:200px;height: 34px;">
                    <!-- <img src="<?php echo $url_logo; ?>" class="img-resposive" alt="" style="width:200px;height: 34px;"> -->


            </a>
            </div>
            <!--Collect the nav links, forms, and other content for toggling-->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <li><a href="#"></a></li>
                    <?php if($this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'home' ){ ?>
                        <li class="active"><a href="<?php echo base_url(); ?>home/index/">Home</a></li>
                    <?php }else{ ?>
                        <li><a href="<?php echo base_url(); ?>home/index/">Home</a></li>
                    <?php } ?>
                    <?php if($this->uri->segment(2) == 'help'){ ?>
                        <li class="active"><a href="<?php echo base_url(); ?>home/help/">Bantuan</a></li>
                    <?php }else{ ?>
                        <li><a href="<?php echo base_url(); ?>home/help/">Bantuan</a></li>
                    <?php } ?>
                     <?php if($this->uri->segment(2) == 'promo' || $this->uri->segment(2) == 'detailpromo' ){ ?>
                        <li class="active"><a href="<?php echo base_url(); ?>home/promo/">Promo</a></li>
                    <?php }else{ ?>
                        <li><a href="<?php echo base_url(); ?>home/promo/">Promo</a></li>
                    <?php } ?>
                    <li><a href="<?php echo base_url(); ?>transaction/check_order/">Cek Pesanan</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right hidden-sm">
                    


              

                    <?php  if($isLogin != 0){ ?>
                        <li>    
                            <a class="nav-btn" href="<?php echo base_url();?>user/dashboard/">
                                <div class="thm-btn"><i class="fa fa-user-circle" aria-hidden="true"></i> &nbsp; <?php echo $username; ?> </div>
                             </a>
                        </li>
                        <li>

                              <select style="width: 41px;  margin: 24px; background-color: #ffffff;  border-radius: 4px; height:26px!important;" >
                                <option value="0"><i class="fa fa-user-circle" aria-hidden="true"></i>ID</option>
                              </select>
                        </li>

            
                    <?php }else{ ?>

                    <li>


                        <a class="nav-btn" href="<?php echo base_url(); ?>user/user_login/">
                            <div class="thm-btn"> <i class="flaticon-people"></i>Masuk </div>
                        </a>
                    </li>
                     <li>
                        <a class="nav-btn" href="<?php echo base_url(); ?>user/user_register/">
                            <div class="thm-btn"> <i class="flaticon-people"></i> Daftar</div>
                        </a>
                    </li>
                    <?php } ?>    


                   
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.nav end -->
    <br />
    <br />
