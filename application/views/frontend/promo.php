<br />
<br />
<br />
<br />
<section class="blog-wrapper">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <?php foreach ($data_promo as $value) {  ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="blog-content">
                            <div class="blog-img image-hover">
                                <a href="#">
                                    <img src="<?php echo base_url() . '/assets/uploads/promo/' . $value->image; ?>" class="img-responsive" alt="" style="width:300px;height: 150px;">                                </a>
                            </div>
                            <h4><a href="#"><?php echo $value->name; ?></a></h4>
                            <p>
                                <b>Start Promo</b> : <?php echo $value->start_promo; ?><br />
                                <b>End  Promo</b>  : <?php echo $value->start_promo; ?>
                            </p>
                            <a class="thm-btn" href="<?php echo base_url() . 'home/detailpromo/'. $value->idPromo; ?>">See More..</a>
                        </div>
                    </div>
                <?php } ?>
                   
                </div>
                
            </div>
        </div>
    </div>
</section>