     <div class="col-sm-4 col-md-3">                
                        <!-- filter menu -->
                        <div class="sidber-box" style="background-color: #f8f8f8;">
                            <div class="cats-title" style="border-top: 8px solid #f8f8f8 !important;padding-top: 5px;    padding-bottom: 5px;">
                                Log In / Register
                            </div>
                            <div class="loginorregislist" style="padding-top: 2px;padding-bottom: 2px;margin-top: 1px;    margin-bottom: 1px;">
                                 <?php if($this->uri->segment(2) == 'editprofile'){ ?>
                                     <div style="background-color: #076fce;">
                                        <label>   
                                            <a href="<?php echo base_url(); ?>user/editprofile/" style="color: #fff;"><span class="fa fa-user-o active" style="padding-left:20px; padding-right:20px; color: #fff;"></span> Edit Profile</a>

                                        </label>
                                    </div>
                                <?php }else{ ?>
                                    <div>
                                    <label>
                                        <a href="<?php echo base_url(); ?>user/editprofile/"><span class="fa fa-user-o" style="padding-left:20px; padding-right:20px; color: #076fce;"></span> Edit Profile</a>
                                    </label>
                                    </div>
                                <?php } ?>

                                <?php if($this->uri->segment(2) == 'purchaselist'){ ?>
                                    <div style="background-color: #076fce;">
                                        <label>
                                            
                                                <a href="purchaselist-bookingdetail.html"  style="color: #fff;"><span class="fa fa-list-alt active" style="padding-left:20px; padding-right:20px; color: #fff;"></span> Purchase List</a>
                                            
                                        </label>
                                    </div>

                                <?php }else{ ?>
                                    <div>
                                        <label>
                                             <a href="purchaselist-bookingdetail.html" ><span class="fa fa-list-alt" style="padding-left:20px; padding-right:20px; color: #076fce;"></span> Purchase List</a>
                                        </label>
                                    </div>

                                        <?php } ?>
                                <?php if($this->uri->segment(2) == 'dashboard'){ ?>
                                <div style="background-color: #076fce;">
                                    <label>
                                    
                                          <a href="<?php echo base_url(); ?>user/dashboard/" style="color: #fff;" ><span class="fa fa-book active" style="padding-left:20px; padding-right:20px; color: #fff;"></span> My Booking</a>
                                        
                                    </label>
                                </div>
                            <?php }else{ ?>
                                <div>
                                    <label>
                                    
                                          <a href="<?php echo base_url(); ?>user/dashboard/" style="color: #076fce;" ><span class="fa fa-book" style="padding-left:20px; padding-right:20px;"></span> My Booking</a>
                                        
                                    </label>
                                </div>
                            <?php } ?>
                                <div>
                                    <label>
                                        <a href="<?php echo base_url(); ?>user/logout/"><span class="fa fa-power-off" style="padding-left:20px; padding-right:20px; color: #076fce;"></i></span> Logout</a>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>