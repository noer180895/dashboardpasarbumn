       <br /><br />

        <section class="blog-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-8">
                        <form action="<?php echo base_url(); ?>transaction/order_review/" method="post" enctype="multipart/form-data">
                            <h2>Your Hotel Booking</h2>
                            <div class="sidber-box cats-widget" style="padding: 15px;">
                                <p><a href="#">Login</a> to your account and enjoy exclusive deals, faster booking. Points and other member-only benefits.</p>
                            </div>
                            <h2>Your Information</h2>
                            <div class="sidber-box cats-widget" style="padding: 15px;">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Contact's Name *</label>
                                        <input type="text" class="form-control" id="contact_name" name="contact_name" placeholder="Enter Your Contact Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Phone *</label>
                                        <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email *</label>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="checkbox" name="isguest" value="guest" id="isguest">&nbsp; I am the guest
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Guest Fullname *</label>
                                        <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Fullname">
                                        <input type="hidden" name="productId" id="productId" value="<?php echo $data_detail[0]->productId; ?>">
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
                                <input type="submit" class="btn btn-primary" value="Continue To Review" />
                            </div>
                    </form>
                    </div>
                    <div class="col-md-3 col-sm-4">
                        <h2>&nbsp;</h2>
                        <div class="sidber-box cats-widget">
                            <div class="cats-title">
                                Booking Details  
                            </div>
                            <br />
                            <div class="col-md-4">
                                <img src="<?php echo base_url() . '/assets/uploads/product/' .$data_detail[0]->image; ?>" class="img-responsive" alt=""></div>
                            <div class="col-md-8">
                                <b><?php echo $data_detail[0]->name; ?></b>
                            </div>
                            <br />
                            <br />
                            <div class="col-md-12">
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
                </div>
            </div>
        </section>
    </div>