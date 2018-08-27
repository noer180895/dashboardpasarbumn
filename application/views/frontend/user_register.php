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
                    <form role="form" id="addUserRegister" action="<?php echo base_url() ?>user/save_register" method="post" role="form">
                        <h2>Register User</h2><hr />
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>First Name</label>
                                    <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your First Name">
                                </div>


                                <div class="form-group">
                                    <label>Last Name</label>
                                    <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your Last Name">
                                </div>


                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" id="username" name="username" required="true" placeholder="Enter your Username">
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required="true"  placeholder="Enter your Email">
                                </div>
                            
                                <div class="form-group">
                                    <label>Paswword</label>
                                    <input type="password" class="form-control" id="password" required="true"  name="password" placeholder="Enter Your Password">
                                </div>

                                <div class="form-group">
                                    <label>Confirm Paswword</label>
                                    <input type="password" class="form-control required equalTo" required="true"  id="cpassword" name="cpassword" maxlength="10" placeholder="Enter Your Password">
                                </div>
                            </div>
                        </div>
                       
                        <input type="submit" name="register" value="Register" class="thm-btn">
                    </form>



                </div>
            </div>
        </div>
    </div>
</section>
</div>