<br />
<br />
<section class="contact-inner">
    <div class="container">
          <div class="row">
                 <div class="col-md-12">
                            <?php
                                $this->load->helper('form');
                                $error = $this->session->flashdata('error');
                                if($error)
                                {
                            ?>
                            <div class="alert alert-danger alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('error'); ?>                    
                            </div>
                            <?php } ?>
                            <?php  
                                $success = $this->session->flashdata('success');
                                if($success)
                                {
                            ?>
                            <div class="alert alert-success alert-dismissable">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                <?php echo $this->session->flashdata('success'); ?>, Please <a class="nav-btn" href="<?php echo base_url(); ?>user/user_login/">Login</a>
                            </div>
                            <?php } ?>
                            
                            <div class="row">
                                <div class="col-md-12">
                                    <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                                </div>
                            </div>
                        </div>
        </div>
        
        <div class="row">
            <div class="col-sm-8">
                <div class="contact-form">
                    <form role="form" id="addLogin" action="<?php echo base_url() ?>user/login" method="post" role="form">
                        <h2>User Login</h2><hr />
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email">
                                </div>
                            
                                <div class="form-group">
                                    <label>Paswword</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Enter Your Password">
                                </div>
                                <input type="checkbox" name="remember" value="remember">&nbsp; Remember me
                            </div>
                        </div>
                        <div class="form-group">
                            
                        </div>
                        <input type="submit" name="login" value="Login" class="thm-btn">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
</div>