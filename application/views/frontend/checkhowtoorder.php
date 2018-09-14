  <div class="row">
        <div class="col-md-12">

            <img src="<?php echo $url_banner; ?>" class="img-resposive" alt="">
        </div>
    </div>
  <section class="cona">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <ul class="nav nav-tabs" style="margin-left:300px;">
          <li class="active" ><a data-toggle="tab" href="#hotel">Hotel</a></li>
            <li><a data-toggle="tab" href="#flight">Flight</a></li>
          <li><a data-toggle="tab" href="#train">Train</a></li>  
          <li><a data-toggle="tab" href="#retail">Retail</a></li>    
        
        </ul>

        <div class="tab-content">
          <div id="hotel" class="tab-pane fade in active">
            <h3>Hotel Step Order</h3><hr />
           <?php foreach ($steporderhotel as $data) { ?>
              <img src="<?php echo base_url() . '/assets/uploads/steporder/' .$data-> image; ?>" alt="" class="img-responsive">
            <?php } ?>
          </div>

            <div id="flight" class="tab-pane fade">
            <h3>Flight Step Order</h3><hr />
            <?php foreach ($steporderflight as $data) { ?>
              <img src="<?php echo base_url() . '/assets/uploads/steporder/' .$data-> image; ?>" alt="" class="img-responsive">
            <?php } ?>
          </div>

          <div id="train" class="tab-pane fade">
            <h3>Train Step Order</h3><hr />
            <?php foreach ($stepordertrain as $data) { ?>
              <img src="<?php echo base_url() . '/assets/uploads/steporder/' .$data-> image; ?>" alt="" class="img-responsive">
            <?php } ?>
          </div>



            <div id="retail" class="tab-pane fade">
            <h3>Retail Step Order</h3><hr />
            <?php foreach ($steporderretail as $data) { ?>
              <img src="<?php echo base_url() . '/assets/uploads/steporder/' .$data-> image; ?>" alt="" class="img-responsive">
            <?php } ?>
          </div>
        
        </div>
      </div>
    </div>
  </div>
</section>
</div>