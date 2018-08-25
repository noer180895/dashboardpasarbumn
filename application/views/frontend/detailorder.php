   <br /><br />  
           <section class="hotel-inner">
            <div class="container">
                <div class="row">
                    <?php if($data_detail != null){ ?>
                    <div class="hotel-item">
                        <!-- hotel Image-->
                        <div class="row" style="margin: 1px">
                          <div class="col-sm-12" style="padding-left: 0px;padding-right: 2px; border-bottom: 1px solid #f3f2f2;">
                            <h4 style="padding-left: 10px;padding-top: 10px;    border-bottom: 1px solid #f3f2f2;   padding-bottom: 15px;">Booking Details</h4>
                            <div class="col-md-4">
                                <p style="padding-left: 9px">Booked by</p>
                                <p style="padding-left: 9px; color: black;"><?php echo $data_detail[0]->contact_name; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p style="padding-left: 9px">Booking Date</p>
                                <p style="padding-left: 9px; color: black;"><?php echo $data_detail[0]->checkin; ?></p>
                            </div>
                            <div class="col-md-4">
                                <p style="padding-left: 9px">End Booking Date</p>
                                <p style="padding-left: 9px; color: black;"><?php echo $data_detail[0]->checkout; ?></p>
                            </div>
                          </div>                              
                        </div>

                        <div class="row" style="margin: 1px">
                          <div class="col-sm-12" style="padding-left: 0px;padding-right: 2px; border-bottom: 1px solid #f3f2f2;">
                            <h4 style="padding-left: 10px;  padding-bottom: 15px;">Payment</h4>
                            <div class="col-md-6">
                                <p style="padding-left: 9px">Payment Methods</p>
                                <p style="padding-left: 9px; color: black;">Credit Card</p>
                                <p style="padding-left: 9px; color: black;">INSURANCE</p>
                            </div>
                            <div class="col-md-6">
                                <p style="padding-left: 9px">Payment Status</p>
                                <button class="buttonactivebook button3" style="background-color: #30a76d!important;padding: 8px; font-size: 11px;width: 104px;"><?php echo $data_detail[0]->status; ?></button>
                            </div>
                          </div>                              
                        </div>
                        <div class="row" style="margin: 1px">
                          <div class="col-sm-12" style="padding-left: 0px;padding-right: 2px; border-bottom: 1px solid #f3f2f2;">
                            <div class="col-md-6">
                                <p style="padding-left: 9px">Insurances</p>
                                <p style="padding-left: 9px; color: black;">TTIIDAA1002161</p>
                            </div>
                          </div>                              
                        </div>
                            <br>
                          <div class="row" style="padding-left: 20px;">
                            <div class="col-md-6" >
                                <button class="btn btn-primary" style="margin-left:5px; margin-right:5px">Receipt</button>
                                 <button class="btn btn-primary" style="margin-left:5px; margin-right:5px">Download Voucher</button>
                            </div>
                            <div class="col-md-6" >
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <button class="btn btn-default" style="margin-left:5px; margin-right:5px; background-color: #e7e8e8;    border-top-color: #f1f3f3;border-left-color: #f1f3f3;border-right-color: #f1f3f3;    border-bottom-color: #f1f3f3;">Refund</button>
                                <button class="btn btn-primary" style="margin-left:5px; margin-right:5px">Reschedule</button>
                            </div>
                              
                          </div>
                        <br /><br />
                    </div>
                     <div class="hotel-item">
                        <!-- hotel Image-->
                        <div class="row" style="margin: 1px">
                          <div class="col-sm-12" style="padding-left: 0px;padding-right: 2px;">
                            <h4 style="padding-left: 10px;    border-bottom: 1px solid #f3f2f2;   padding-bottom: 15px;">Hotel Details</h4>
                            <div class="col-md-12">
                                <div class="row" style="    margin-bottom: 10px;">
                                    <div class="col-md-2">
                                    <img src="<?php echo base_url() . '/assets/uploads/product/' .$data_detail[0]->image; ?>" class="img-resposive" alt="" style="width:50px;height: 50px;">
                                </div>
                                <div class="col-md-10">
                                    <h5><strong><p><?php echo $data_detail[0]->name; ?> <p></strong><h5>
                                </div>
                                </div>                                        
                                <p>Check-in <p>
                                <p><?php echo $data_detail[0]->checkin; ?><p>
                                <p>Check-out <p>
                                <p><?php echo $data_detail[0]->checkout; ?><p>
                                <p>Room Type <p>
                                <p><?php echo $data_detail[0]->name; ?> <p>
                                <p>Booking ID <p>
                                <p><?php echo $data_detail[0]->no_order; ?><p>   
                                <p>Special Request <p>  
                                <p> - <p>                                      
                            </div>
                          </div>                              
                        </div>
                            <br>
                
                    <?php }else{ ?>
                        <h1><center>Data Detail Not Found</center></h1>
                    <?php } ?>

                </div>
            </div>
        </section>