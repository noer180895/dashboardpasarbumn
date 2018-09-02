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
                        <h2>Please Share The Details</h2><hr />
                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label>Booking Id</label>
                                    <input type="text" class="form-control" id="bookingid" name="bookingid" placeholder="Enter your Booking Id">
                                </div>


                                <div class="form-group">
                                    <label>Select Product</label>
                                    <select class="form-control" name="product_id" id="product_id">
                                     <option value="">-- Select Your Product --</option>
                                      <option value="hotel">Hotel</option>
                                      <option value="train">train</option>
                                      <option value="flight">Flight</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required="true" placeholder="Enter your Name">
                                </div>

                                <div class="form-group">
                                    <label>Email Adrress</label>
                                    <input type="email" class="form-control" id="email" name="email" required="true"  placeholder="Enter your Email">
                                </div>
                            
                                <div class="form-group">
                                    <label>Tell Your Concern</label>
                                    <textarea name="description" id="description" class="form-control"></textarea>
                                </div>

                            </div>
                        </div>
                       
                        <input type="submit" name="submit" value="Submit" class="thm-btn">
                    </form>



                </div>
            </div>
        </div>
    </div>
</section>
</div>