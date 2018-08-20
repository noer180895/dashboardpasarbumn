    <br /><br />
<section class="hotel-inner">
    <div class="container">
        <div class="row">

        	 <?php $this->load->view('includes/_sitemenuuser'); ?>	

        	  <div class="col-sm-8 col-md-9">
                        <div class="tools-ber" style="width: 688px;height: 183px;">
                            <div class="row">
                             <img src="<?php echo base_url(); ?>assets/images/header.jpg" class="img-resposive" alt="" style="width: 688px;height: 183px;">
                            </div>
                        </div>                        
                        <div style="margin-top: 50px;margin-bottom: 20px">
                            <h5 style="padding-bottom: 7px;"><i class="fa fa-building-o fa-stack-2x pull-left" aria-hidden="true" style="text-align: left; color: #076fce;padding-left: 23px!important"></i></h5>
                                <br><a class="active" href="#home" style="color: black;border-bottom: 3px solid #076fce;">Hotels</a>                            
                        </div>
                        <label>Active Bookings</label>  

                            <?php foreach ($transaction_list as $value) { ?>                
                            <div class="hotel-item" style="width: 629px;height: 176px;">
                                <div class="row" style="margin: 1px">
                                  <div class="col-sm-6" style="padding-left: 0px;padding-right: 2px;">
                                    <h4 style="padding-left: 10px;border-left-style: solid;border-left-color: #26599c;">Cakra Kembang Hotel</h4>
                                    <p style="padding-left: 9px"><?php echo $value->name; ?></p>
                                  </div>
                                  <div class="col-sm-6">
                                    <br>
                                    <br>
                                    <p>Booking ID <strong><?php echo $value->no_order; ?></strong></p>
                                  </div>                              
                                </div>
                                <div class="row" style="margin: 1px">
                                  <div class="col-md-2" style="padding-left: 10px;padding-right: 2px;background-color: #f9f9f9;">
                                    <p style="font-size: 11px;margin-bottom: 0px;">CHECK IN</p>
                                    <strong style="font-size: 10px"><?php echo $value->checkin; ?></strong>
                                  </div>
                                  <div class="col-md-10" style="background-color: #f9f9f9;">
                                    <p style="font-size: 11px; margin-bottom: 0px;">CHECK OUT</p>
                                    <strong style="font-size: 10px"><?php echo $value->checkout; ?></strong>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-8">
                                      <button class="buttonactivebook button3">WAITING FOR PAYMENT PROOF</button>
                                  </div>
                                  <div class="col-sm-2" style="width: 78px;">
                                      <h5 style="font-size: 11px;color: #4eb1e7;"><strong>Details<a style="color:#ff4700; "> * </a></strong><h5>
                                  </div>
                                  <div class="col-md-2">
                                      <h5><i class="fa fa-ellipsis-h" style="color:#4eb1e7" aria-hidden="true"></i></h5>
                                  </div>
                                </div>
                            </div>
                          <?php } ?>
                            <label> Booking History</label>

                            <?php foreach ($transaction_list_success as $value) { ?>
                              <div class="hotel-item" style="width: 629px;height: 176px; background-color:#eaeaea;">
                                  <!-- hotel Image-->
                                  <div class="row" style="margin: 1px">
                                    <div class="col-sm-6" style="padding-left: 0px;padding-right: 2px;background-color: #eaeaea;">
                                      <h4 style="padding-left: 10px;border-left-style: solid;border-left-color: #77c29e; color: #adaaa8">Dewi Depok Apartment</h4>
                                      <p style="padding-left: 9px"><?php echo $value->name; ?></p>
                                    </div>
                                    <div class="col-sm-6" style="background-color: #eaeaea;">
                                      <br>
                                      <br>
                                      <p>Booking ID <strong><?php echo $value->no_order; ?></strong></p>
                                    </div>                              
                                  </div>
                                  <div class="row" style="margin: 1px">
                                        <div class="col-md-2" style="padding-left: 10px;padding-right: 2px;background-color: #f3f3f3;">
                                            <p style="font-size: 11px;margin-bottom: 0px;color: #adaaa8">CHECK IN</p>
                                          <strong style="font-size: 10px; color: #adaaa8" ><?php echo $value->checkin; ?></strong>
                                        </div>
                                        <div class="col-md-10" style="background-color: #f3f3f3;">
                                            <p style="font-size: 11px; margin-bottom: 0px; color: #adaaa8">CHECK OUT</p>
                                          <strong style="font-size: 10px; color: #adaaa8;"><?php echo $value->checkout; ?></strong>
                                          </div>
                                    </div>
                                      <br>
                                    <div class="row">
                                      <div class="col-sm-8">
                                          <button class="buttonbooking button3">SUCCESS PAYMENT</button>
                                      </div>
                                      <div class="col-sm-2" style="width: 78px;">
                                          <h5 style="font-size: 11px;color: #4eb1e7;"><strong>Details<a style="color:#ff4700; "> * </a></strong><h5>
                                      </div>
                                      <div class="col-md-2">
                                          <h5><i class="fa fa-ellipsis-h" style="color:#4eb1e7" aria-hidden="true"></i></h5>
                                      </div>                                      
                                    </div>
                                    <div class="seemore" style="width: 629px;height: 20px;">
                                      <h6 style="text-align: center;background-color: #e8e8e8;padding-top: 5px; padding-bottom: 5px; color:#0d7de4;"><a href="#">See More ></a></h6>
                                   </div>
                              </div>
                            <?php  } ?>
                        </div>
                         &nbsp;
                         &nbsp;
                         &nbsp;


                    </div>


                     </div>
            </div>
        </section>