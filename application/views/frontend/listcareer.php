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
            <center><h1>Send Your CV, Let's Join To Us.</h1></center><hr /><br />
            <?php foreach ($datacareer as $value) { ?>
                <div class="col-md-12 col-sm-12">

                    <h3>Position</h3>
                    <p><?php echo $value->position; ?>
                    </p>
                    <h3>Spesification</h3>
                    <p><?php echo $value->spesification; ?>
                    </p>
                    <div class="separator"></div>
                   
                </div>
            <?php } ?>
        </div>
    </div>
</section>

</div>



       <!-- magnific popup -->
    <script src="assets/js/jquery.magnific-popup.min.js" type="text/javascript"></script>