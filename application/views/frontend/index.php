
    <br />
    <br />
    <div class="row">
        <div class="col-md-12">

            <img src="<?php echo $url_banner; ?>" class="img-resposive" alt="">
        </div>
    </div>
    <div class="space"></div>
    <section class="popular-inner">
        <div class="container">
            <div class="col-sm-12">
                <div class="panel">
                    <h1>Find Your Need </h1>
                    <hr />
                    <div class="panel-heading">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab2default" data-toggle="tab"> <i class="flaticon-cabin"></i>Hotel</a></li>
                            <li><a href="#tab1default" data-toggle="tab"><i class="flaticon-paper-plane"></i>Plane</a></li>
                            <li><a href="#tab1default" data-toggle="tab"><i class="flaticon-paper-plane"></i>Train</a></li>
                        </ul>
                    </div>
                    <div class="panel-body-tabs">
                        <div class="tab-content">
                            <div class="tab-pane fade " id="tab1default">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-9 col-md-10">
                                        <div class="row panel-margin">
                                            <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                                <label>Arrival</label>
                                                <div class="icon-addon">
                                                    <input type="text" placeholder="Date" class="form-control" id="datepicker1" />
                                                    <label class="glyphicon fa fa-calendar" title="email"></label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                                <label>Going</label>
                                                <div class="icon-addon">
                                                    <input type="text" placeholder="Date" class="form-control" id="datepicker2" />
                                                    <label class="glyphicon fa fa-calendar" title="email"></label>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                                <label>Room</label>
                                                <!-- filters select -->
                                                <div class="select-filters">
                                                    <select name="room" id="room">
                                                        <option value="" selected="">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                                <label>Person</label>
                                                <!-- filters select -->
                                                <div class="select-filters">
                                                    <select name="person" id="person">
                                                        <option value="" selected="">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 hidden-sm panel-padding">
                                                <label>Child</label>
                                                <!-- filters select -->
                                                <div class="select-filters">
                                                    <select name="child" id="child">
                                                        <option value="" selected="">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6 col-sm-4 col-md-2 panel-padding">
                                                <label>Day</label>
                                                <!-- filters select -->
                                                <div class="select-filters">
                                                    <select name="day" id="day">
                                                        <option value="" selected="">1 days</option>
                                                        <option value="2">2 days</option>
                                                        <option value="3">3 days</option>
                                                        <option value="4">4 days</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-3 col-md-2">
                                        <button type="button" class="thm-btn">Search book</button>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade in active" id="tab2default">
                                <div class="row">
                                    <center>
                                        <h4>Cari Hotelmu Sekarang Juga dan Dapatkan <b>Kemudahannya!</b></h4></center>
                                    <br />
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="row panel-margin">
                                            <div class="col-xs-12">
                                                <form action="<?php echo base_url(); ?>product/hotel" method="post" enctype="multipart/form-data">
                                                    <table class="table table-bordered" border="1">
                                                        <thead>
                                                            <tr>
                                                                <th bgcolor="#D2691E">
                                                                    <span style="color: #fff;"> Nama, Kota Tujuan, atau Hotel </span>
                                                                </th>
                                                                <th bgcolor="#D2691E">
                                                                    <span style="color: #fff;">  Lama Menginap </span>
                                                                </th>
                                                                <th bgcolor="#D2691E">
                                                                    <span style="color: #fff;">  Tamu dan Kamar </span>
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <label>&nbsp;</label>
                                                                    <select class="form-control" id="destination" name="destination">
                                                                        <option value="" selected>-- Pilih Kota Tujuan --</option>
                                                                        <option value="jakarta barat">Jakarta Barat</option>
                                                                        <option value="jakarta selatan">Jakarta Selatan</option>
                                                                        <option value="jakarta timur">Jakarta Timur</option>
                                                                        <option value="jakarta utara">Jakarta Utara</option>
                                                                    </select>
                                                                    <div class="validation"></div>
                                                                </td>
                                                                <td>
                                                                    <label>Check - In</label>
                                                                    <input type="date" name="checkIn" class="form-control" id="checkIn" />
                                                                    <br />
                                                                    <label>Check - Out</label>
                                                                    <input type="date" name="checkOut" class="form-control" id="checkOut" />
                                                                    <div class="validation"></div>
                                                                    <br>
                                                                    <br />
                                                                    <span><b>Checkout</b></span>
                                                                    <br />
                                                                    <span><b>Thu,14 Jun2018</b></span>
                                                                </td>
                                                                <td>
                                                                    <label>&nbsp;</label>
                                                                    <select class="form-control" id="duration" name="duration">
                                                                        <option value="1">1 Guest, 1 Room</option>
                                                                        <option value="2">2 Guest, 1 Room</option>
                                                                        <option value="3">3 Guest, 1 Room</option>
                                                                    </select>
                                                                    <br />
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-4">
                                                                            <i class="fa fa-users" aria-hidden="true"> Guest</i>
                                                                        </div>
                                                                        <div class="col-md-8 input-group" style="width: 72px;">
                                                                            <span class="input-group-btn">
                                                                                      <button style="color:red;background-color: #ffffff;border: 2px solid #ccc8c8;width: 23.988636px;    height: 29.988636px;    padding-right: 20px;    padding-left: 5px;    padding-top: 5px;    padding-bottom: 5px;    text-align: center;" type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                                        <span class="glyphicon glyphicon-minus"></span>
                                                                            </button>
                                                                            </span>
                                                                            <input style=" border: 2px solid #ccc8c8;   background-color: #ffffff;width: 34px; height: 29.988636px;   padding-right: 5px;  padding-left: 5px; padding-top: 5px; padding-bottom: 5px; text-align: center;" type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
                                                                            <span class="input-group-btn">
                                                                                      <button style="border-top-width: 2px!important;    height: 31px;  background-color:#ffffff;   color: green;   border: 2px solid #ccc8c8;    border-top-width: 0px;width: 23.988636px;    height: 29.988636px;    padding-right: 20px;    padding-left: 5px;    padding-top: 5px;    padding-bottom: 5px;    text-align: center;" type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                                                          <span class="glyphicon glyphicon-plus"></span>
                                                                            </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="col-md-4">
                                                                            <i class="fa fa-home" aria-hidden="true"> Room</i>
                                                                        </div>
                                                                        <div class="col-md-8 input-group" style="width: 72px;">
                                                                            <span class="input-group-btn">
                                                                                      <button style="color:red;background-color: #ffffff;border: 2px solid #ccc8c8;width: 23.988636px;    height: 29.988636px;    padding-right: 20px;    padding-left: 5px;    padding-top: 5px;    padding-bottom: 5px;    text-align: center;" type="button" class="btn btn-danger btn-number"  data-type="minus" data-field="quant[2]">
                                                                                        <span class="glyphicon glyphicon-minus"></span>
                                                                            </button>
                                                                            </span>
                                                                            <input style=" border: 2px solid #ccc8c8;   background-color: #ffffff;width: 34px; height: 29.988636px;   padding-right: 5px;  padding-left: 5px; padding-top: 5px; padding-bottom: 5px; text-align: center;" type="text" name="quant[2]" class="form-control input-number" value="1" min="1" max="100">
                                                                            <span class="input-group-btn">
                                                                                      <button style="border-top-width: 2px!important;    height: 31px;  background-color:#ffffff;   color: green;   border: 2px solid #ccc8c8;    border-top-width: 0px;width: 23.988636px;    height: 29.988636px;    padding-right: 20px;    padding-left: 5px;    padding-top: 5px;    padding-bottom: 5px;    text-align: center;" type="button" class="btn btn-success btn-number" data-type="plus" data-field="quant[2]">
                                                                                          <span class="glyphicon glyphicon-plus"></span>
                                                                            </button>
                                                                            </span>
                                                                        </div>
                                                                    </div>
                                                                    <div class="validation"></div>
                                                                    <br />
                                                                    <br />
                                                                    <br />
                                                                    <br />
                                                                    <br />
                                                                    <a href="hotels-list.html">

                                                                        <input type="submit" class="btn btn-primary" value="Cari Hotel" />
                                                                    </a>
                                                                </form>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- </div> -->
    <!-- popular tour -->
    <section class="popular-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="<?php echo $url_promoaplikasi; ?>" alt="" style="padding-left:15px;" />
                </div>
                <div class="col-md-6">
                    <center>
                        <h4><b>Unduh Aplikasi Pasar Produk BUMN</b></h4></center>
                    <div class="col-md-6">
                        <h5 style="color: #000; margin-bottom:0px">Seperti Gambar Dibawah</h5>
                        <br />
                        <img src="<?php echo $url_barcode; ?>" alt="" style="width: 209px; height: 198px;" /> &nbsp;
                    </div>
                    <div class="col-md-6">
                        
                        <span style="padding-right: 50px; padding-top:30px;"><a href="#"><img src="<?php echo $url_playstore; ?>" alt="" style="width: 242px; height: 74px;" /></a></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- destination -->
    <section class="destination">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="title">
                        <h2>Popular Deals</h2>
                        <p>This is Amazing Travel Agency !</p>
                    </div>
                </div>
            </div>
            <div class="row thm-margin">


                <?php foreach ($url_dealpopular as $key => $value) { ?>
                <div class="col-md-4 col-sm-4 thm-padding">
                    <div class="destination-grid">
                        <a href="#"><img src="<?php echo base_url() . '/assets/uploads/banner/' .$value -> image; ?>" class="img-responsive" alt=""></a>
                        <div class="mask">
                            <h2>Sydney</h2>
                            <p>It is a long established fact that a reader will be distracted by the readable content</p>
                            <a href="#" class="thm-btn">Read More</a>
                        </div>
                        <div class="dest-name">
                            <h5>Sydney Opera House</h5>
                            <h4>Sydney</h4>
                        </div>
                        <div class="dest-icon">
                            <i class="flaticon-earth-globe" data-toggle="tooltip" data-placement="top" title="15 Tours"></i>
                            <i class="flaticon-ship" data-toggle="tooltip" data-placement="top" title="9 Criuses"></i>
                            <i class="flaticon-transport" data-toggle="tooltip" data-placement="top" title="31 Flights"></i>
                            <i class="flaticon-front" data-toggle="tooltip" data-placement="top" title="83 Hotels"></i>
                        </div>
                    </div>
                </div>
<?php } ?>
            </div>
        </div>
    </section>
    <!-- hotel -->
    <section class="hotel-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4">
                    <h1>Hotel Partners</h1>
                    <p align="justify">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.
                    </p>
                </div>
                <div class="col-sm-12 col-md-8">
                    <?php foreach ($url_partner as $key => $value) { ?>
                    <a href="#"><img src="<?php echo base_url() . '/assets/uploads/banner/' .$value-> image; ?>" style="width: 100px;height: 91px;" /></a>
                <?php } ?>
                </div>
            </div>
        </div>
    </section>
    <section class="hotel-inner">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12">
                    <h4>What Your <strong>Interest?</strong></h4>
                    <div class="tabbable-panel">
                        <div class="tabbable-line">
                            <ul class="nav nav-tabs ">
                                <li class="active">
                                    <a href="#tab_default_1" data-toggle="tab">
                            Top Hotel Destination </a>
                                </li>
                                <li>
                            Top Flight Routes</a>
                                </li>
                                <li>
                                    <a href="#tab_default_3" data-toggle="tab">
                            Tab Flight Routes</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="tab_default_1">
                                    <p>
                                        <ul style="list-style-type: none;">
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                            <li><a href="#">Singapore Hotel</a></li>
                                        </ul>
                                        </a>
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab_default_2">
                                    <ul style="list-style-type: none;">
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                    </ul>
                                    </a>
                                    </p>
                                </div>
                                <div class="tab-pane" id="tab_default_3">
                                    <ul style="list-style-type: none;">
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                        <li><a href="#">Singapore Hotel</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


    <script type="text/javascript">
        function savedata(){
            localStorage.setItem('checkin',  document.getElementById("checkIn").value);
            localStorage.setItem('checkout',  document.getElementById("checkOut").value);
        }

    </script>