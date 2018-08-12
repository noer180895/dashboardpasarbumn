<section class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-8">
                <form>
               

                    <h2>Please Review Your Booking</h2>
                    <h2 id="data"></h2>
                    <div class="sidber-box cats-widget" style="padding: 15px;">
                        <div class="col-md-4">
                            <img src="<?php echo base_url() . '/assets/uploads/product/' .$data_detail[0]->image; ?>" class="img-responsive" alt="">
                        </div>
                        <div class="col-md-8">
                            <b><?php echo $data_detail[0]->name; ?></b>
                            <br />
                            <br />
                            <div class="col-md-4"><b>Check-in</b>
                                <br />Tue, 17 Jul 2018</div>
                            <div class="col-md-4"><b>Check-out</b>
                                <br />Tue, 17 Jul 2018</div>
                            <div class="col-md-4"><b>Duration of Stay</b>
                                <br />1 Night</div>
                            <div class="col-md-12">
                                <b>Guest Name</b>
                                <br /> Nurhayati
                                <hr />
                                <br />
                            </div>
                            <div class="col-md-12">
                                <h4>ROOM DETAILS</h4>
                                <p align="justify" style="padding: 2px;">
                                    Duration of Stay 1 Night
                                    <br /> Check-in Tue, 17 Jul 2018
                                    <br /> Check-out Wed, 18 Jul 2018
                                    <br /> Room Type Business Twin Bed - Room Only
                                    <br /> No. of rooms 1 Room
                                    <br /> Guest per Room 2 Guest s
                                </p>
                            </div>
                        </div>
                    </div>
                    <h2>Cancellation Policy</h2>
                    <div class="sidber-box cats-widget" style="padding: 15px;">
                        <p>This reservation is non-refundable</p>
                    </div>
                    <h2>Price Details</h2>
                    <div class="sidber-box cats-widget">
                        <!--  <pre>
    <b>Cakra Kembang Hotel</b>
    Business  Twin Bed - Room Only 2 Rp. 300.000, 00
    Twin and Other feat including    Rp. 54.019, 00
    Total                            Rp. 354.019, 00
 </pre> -->
                        <br />
                        <div class="col-md-12">
                            <h4><b>Cakra Kembang Hotel</b></h4>
                            <br />
                        </div>
                        <div class="col-md-8">
                            <p align="left"><b>Business  Twin Bed - Room Only 2 <br />
                            Twin and Other feat including</b>
                                <br />
                                <b>Total</b>
                        </div>
                        <div class="col-md-4">
                            <p align="right" style="padding-left:100px;">Rp. 300.000, 00
                                <br /> Rp. 54.019, 00
                                <br /> Rp. 354.019, 00
                            </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>By Clicking this button, you edge that you have read and agreed to the <a href='#'>Term & Condition</a> and <a href='#'>Privacy Policy</a> of Pasar bumn
                        </p>
                    </div>
                    <div class="col-md-6">
                        <a class="btn btn-success" id="saveData" href="<?php echo base_url(); ?>transaction/payment/"  onclick="saveData()">Continue To Payment</a>
                    </div>
            </div>
            <div class="col-md-3 col-sm-4">
                <h2>&nbsp;</h2>
                <div class="sidber-box cats-widget" style="padding: 15px;">
                    <p>By Clicking this button, you edge that you have read and agreed to the <a href='#'>Term & Condition</a> and <a href='#'>Privacy Policy</a> of Pasar bumn
                    </p>
                    <br />
                    <a class="btn btn-success" href="<?php echo base_url(); ?>transaction/payment/" onclick="saveData()">Continue To Payment</a>
                </div>
            </div>


              <div class="col-md-4">
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
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button></div>'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


   <script type="text/javascript">
    function saveData(){
        alert('success save data');
      }
    </script>    
