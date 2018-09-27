<br /><br />   <br /><br />  <br /><br />
           <section class="hotel-inner">
            <div class="container">
                <div class="row">

                     <?php $this->load->view('includes/_sitemenuuser'); ?>  
            <div class="col-sm-8 col-md-9">
            <form action="<?php echo base_url(); ?>user/updateprofile/" method="post" enctype="multipart/form-data">
            <div class="hotel-item">
                <!-- hotel Image-->
                <div class="row">
                    <div class="col-sm-9">
                        <div class="profileitem">
                            <i class="fa fa-user-o" aria-hidden="true" class="ico"> &nbsp; <strong><?php echo $profile[0]->username; ?></strong></i>
                             <p>Your Username Indentity Login.</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="profileitem">
                            <a href="#"  id="show-profile-fullname" class="buttonactivebook button3">UPDATE PROFILE</a>
                        </div>
                    </div>
                    <div id="fullnameprofile" style="display: none;">
                        
                            <div class="col-sm-12">
                                <div class="profileitem">
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Enter your Full Name">
                                    </div>
                                </div>
                            </div>
                            <div class="profileitem">
                                <div class="col-sm-10">
                                    <p>As appers on indentity card (without functional mark)</p>
                                </div>
                                <div class="col-sm-2">
                                    <button type="reset" value="Cancel" class="btn btn-warning btn-xs">Cancel</button>
                                    <button  id="show-profile-fullname" class="btn btn-info btn-xs">Save</button>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="hotel-item">
                <!-- hotel Image-->
                <div class="row">
                    <div class="col-sm-9">
                        <div class="profileitem">
                            <?php if($profile[0]->phone != null || $profile[0]->phone == ''){ ?>
                            <i class="fa fa-phone" aria-hidden="true" class="ico"> &nbsp; <strong><?php echo $profile[0]->phone; ?></strong></i>
                        <?php }else{ ?>
                            <i class="fa fa-phone" aria-hidden="true" class="ico"> &nbsp; <strong>Your Phone</strong></i>
                        <?php } ?>
                            <p>Mobile Number To receive account-related notification.</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="profileitem">
                            <a href="#"  id="show-profile-phone" class="buttonactivebook button3">Phone</a>
                        </div>
                    </div>
                    <div id="phonenumberprofile" style="display: none;">
                        
                            <div class="col-sm-12">
                                <div class="profileitem">
                                    <div class="form-group">
                                        <label>Phonenumber</label>
                                        <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Enter your Phone number">
                                    </div>
                                </div>
                            </div>
                            <div class="profileitem">
                                <div class="col-sm-10">
                                    <p>&nbsp;</p>
                                </div>
                                <div class="col-sm-2">
                                     <button type="reset" value="Cancel" class="btn btn-warning btn-xs">Cancel</button>
                                    <button  id="profile-phone" class="btn btn-info btn-xs">Save</button>
                                </div>
                            </div>
               
                    </div>
                </div>
            </div>
            <div class="hotel-item">
                <!-- hotel Image-->
                <div class="row">
                    <div class="col-sm-9">
                        <div class="profileitem">
                            <?php if($profile[0]->email != null || $profile[0]->email == ''){ ?>
                                <i class="fa fa-user-o" aria-hidden="true" class="ico"> &nbsp; <strong><?php echo $profile[0]->email; ?></strong></i>
                            <?php }else{ ?>
                                  <i class="fa fa-user-o" aria-hidden="true" class="ico"> &nbsp; <strong>Your Email Address</strong></i>
                            <?php } ?>
                            <p>Email Address To receive account-related notification.</p>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="profileitem">
                            <a href="#"  id="show-profile-email" class="buttonactivebook button3">Email</a>
                        </div>
                    </div>
                    <div id="emailprofile" style="display: none;">
            
                            <div class="col-sm-12">
                                <div class="profileitem">
                                    <div class="form-group">
                                        <label>Email Address</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter your Email Address">
                                    </div>
                                </div>
                            </div>
                            <div class="profileitem">
                                <div class="col-sm-10">
                                    <p>&nbsp;</p>
                                </div>
                                <div class="col-sm-2">
                                     <button type="reset" value="Cancel" class="btn btn-warning btn-xs">Cancel</button>
                                    <button id="profile-email" class="btn btn-info btn-xs">Save</button>
                                </div>
                            </div>
                  
                    </div>
                </div>
            </div>
            </form>
            </div>
</div>
</div>
</section>