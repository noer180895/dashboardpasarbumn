    <br /><br />
<section class="hotel-inner">
    <div class="container">
        <div class="row">

        	 <?php $this->load->view('includes/_sitemenuuser'); ?>	

        	  <div class="col-sm-8 col-md-9">
                        <h1>List Bookings</h1> <hr />
                          <?php if($transaction_list != null){ 
                            foreach ($transaction_list as $value) { ?>                
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
                                      <a href="<?php echo base_url(); ?>transaction/detailorder/<?php echo $value->no_order; ?>" class="buttonactivebook button3">Detail</a>
                                  </div>
                                  <div class="col-sm-2" style="width: 78px;">
                                      <h5 style="font-size: 11px;color: #4eb1e7;"><strong>Details<a style="color:#ff4700; "> * </a></strong><h5>
                                  </div>
                                  <div class="col-md-2">
                                      <h5><i class="fa fa-ellipsis-h" style="color:#4eb1e7" aria-hidden="true"></i></h5>
                                  </div>
                                </div>
                            </div>
                          <?php }}else{ ?>
                            <div class="hotel-item">
                              <h4>List Data Transaction Empty</h4>
                            </div>
                          <?php } ?>
                        </div>
                         &nbsp;
                         &nbsp;
                         &nbsp;


                    </div>


                     </div>
            </div>
        </section>