<br /><br />
<style type="text/css">
.frame {
  height: 424px;
  width: 740px;
  overflow: hidden;
}
.zoomin img {
  height: 424px;
  width: 800px;
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
            <div class="col-md-12 col-sm-12">
                <div id="sync1" class="owl-carousel">

                    <div class="item zoomin frame"><img src="<?php echo base_url() . '/assets/uploads/promo/' .$data_promo[0]->image; ?>" class="img-responsive" alt=""></div>
                </div>
                
                <h3>Deskripsi</h3>
                <div class="separator"></div>
                <p><?php 


                echo '<button class="btn btn-primary"><h5> Gunakan Kode Promo ' . $data_promo[0]->kode_promo . '</h5></button><br /><br />' . 'Dapat Kan Potongan Sebesar Rp. ' . number_format($data_promo[0]->potongan_promo, 1, ",", ".") . '<br />' . 'Berlaku dari <b>' . $data_promo[0]->start_promo . '</b> -  <b>' . $data_promo[0]->end_promo . '</b><br /><br /><p>' . $data_promo[0]->description . '</p>';  ?>
                </p>
               
                
            </div>
            
        </div>
    </div>
</section>

</div>

<script src="assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>