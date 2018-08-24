<br /><br /><br />
<!-- hotel -->
<section class="hotel-inner">
    <div class="container">
        <div class="row">
          
            <div class="col-sm-12 col-md-9">

                <?php if(count($data_detail) == 0 ){ ?>
                    
                    <h1>Data Order Not Found</h1><hr />
                       
                <?php }else{?>
                <div class="hotel-list-content">

                        <div class="hotel-item" style="width: 629px;height: 176px;">
                                <div class="row" style="margin: 1px">
                                  <div class="col-sm-6" style="padding-left: 0px;padding-right: 2px;">
                                    <h4 style="padding-left: 10px;border-left-style: solid;border-left-color: #26599c;">Cakra Kembang Hotel</h4>
                                    <p style="padding-left: 9px"><?php echo $data_detail[0]->name; ?></p>
                                  </div>
                                  <div class="col-sm-6">
                                    <br>
                                    <br>
                                    <p>Booking ID <strong><?php echo $data_detail[0]->no_order; ?></strong></p>
                                  </div>                              
                                </div>
                                <div class="row" style="margin: 1px">
                                  <div class="col-md-2" style="padding-left: 10px;padding-right: 2px;background-color: #f9f9f9;">
                                    <p style="font-size: 11px;margin-bottom: 0px;">CHECK IN</p>
                                    <strong style="font-size: 10px"><?php echo $data_detail[0]->checkin; ?></strong>
                                  </div>
                                  <div class="col-md-10" style="background-color: #f9f9f9;">
                                    <p style="font-size: 11px; margin-bottom: 0px;">CHECK OUT</p>
                                    <strong style="font-size: 10px"><?php echo $data_detail[0]->checkout; ?></strong>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-sm-8">
                                      <button class="buttonactivebook button3">WAITING FOR PAYMENT PROOF</button>
                                  </div>
                                
                                </div>
                            </div>
                  
                </div>

            <?php } ?>
                <!-- pagination -->
                
            </div>
        </div>
    </div>
</section>
</div>