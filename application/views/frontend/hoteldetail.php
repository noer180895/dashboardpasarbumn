<br /><br />
<style type="text/css">
.frame {
  height: 424px;
  width: 740px;
  overflow: hidden;
}
.zoomin img {
  height: 424px;
  width: 740px;
  transition: transform 1s;
  -webkit-transition: all 2s ease;
     -moz-transition: all 2s ease;
      -ms-transition: all 2s ease;
          transition: all 2s ease;
}
.zoomin img:hover {
  width: 900px;
  height: 500px;
  transform: scale(2); 
  }
</style>  
<section class="hotels-details-inner">
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-sm-8">
                <div id="sync1" class="owl-carousel">

                    <div class="item zoomin frame"><img src="<?php echo base_url() . '/assets/uploads/product/' .$data_detail[0]->image; ?>" class="img-responsive" alt=""></div>
                </div>
                <div id="sync2" class="owl-carousel">
                    <div class="item"><img src="<?php echo base_url() . '/assets/uploads/product/' .$data_detail[0]->image; ?>" class="img-responsive" alt="" style="width:140px; height:84px;"></div>
                </div>
                <h3>Description</h3>
                <p><?php echo $data_detail[0]->description ; ?>
                </p>
                <div class="row">
                    <div class="col-md-4 col-sm-4">
                        <ul class="list-ok">
                            <li>Coffee machine</li>
                            <li>Wifi</li>
                            <li> Microwave</li>
                            <li>Oven</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <ul class="list-ok">
                            <li>Fridge</li>
                            <li>Hairdryer</li>
                            <li>Towels</li>
                            <li>Toiletries</li>
                        </ul>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <ul class="list-ok">
                            <li>DVD player</li>
                            <li>Air-conditioning</li>
                            <li>Tv</li>
                            <li>Freezer</li>
                        </ul>
                    </div>
                </div>
                <div class="separator"></div>
                <div class="row">
                    <div class="col-sm-6">
                        <div id="googleMap" style="width:100%;height:200px;"></div>
                    </div>
                    <div class="col-sm-6">
                        <!-- <div class="review-text"> -->
                        <h4>Nearby Attractions</h4>
                        <ul class="list-ok">
                            <li>Jakarta Selatan</li>
                            <li>Jakarta Barat</li>
                            <li>Jakarta Timur</li>
                            <li>Jakarta Barat</li>
                        </ul>
                        <!-- </div> -->
                    </div>
                </div>
                <div class="separator"></div>
            </div>
            <div class="col-md-3 col-md-offset-1 col-sm-4">
                <!-- popular post -->
                <div class="sidber-box popular-post-widget">
                    <div class="cats-title"><?php echo $data_detail[0]->name; ?> </div>
                    <div class="popular-post-inner">
                        <p align="justify">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown
                            <br />
                            <br />
                            <span><b>STARTING FROM </b></span>
                            <br /> Rp. <?php echo number_format($data_detail[0]->price, 1, ",", ".") ?>
                            <br />
                            <BR />
                            <a href="booking-hotel.html" class="btn btn-info">BOOK NOW</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

</div>


    <script>
        function myMap() {
        var mapProp= {
            center:new google.maps.LatLng(-34.397,150.644),
            zoom:5,
        };
        var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAqA5AJKX2LN56yzt35g5LRZj7c3Be0i54&callback=myMap"></script>   

       <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>