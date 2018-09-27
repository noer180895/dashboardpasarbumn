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
                
                <center><h1>Segera Selesaikan Pembayaran Anda</h1></center>
                   <div class="separator"></div>
                <br />


                <span>Pastikan transaksi Permata Bank Virtual Account Anda telah terverifikasi sebelum melakukan transaksi kembali dengan metode yang sama.</span><br />

                <span>Jumlah Yang Harus Dibayar</span><br /><br />
                <b>Rp. <?php echo number_format($payment['amount'], 1, ",", ".") ?></b>




                <h3>Transfer pembayaran ke number Virtual Account Permata Bank</h3>
             
                <p>
                 
                  <img src=" <?php echo base_url() . 'assets\images\permata.png'; ?>" class="img-responsive" alt="" style="width:200px;height: 50px;"><br />                  <b><?php echo $payment['payment_code']; ?></b>
                </p>
               
                
            </div>

            <?php if($isLogin == "1"){ ?>
            <div class="col-md-10"></div>
            <div class="col-md-2">  <div class="btn-group btn-group-lg"><a href="<?php echo base_url(); ?>user/dashboard/"><button class="btn btn-success">Finish</button></a></div></div>
          <?php } ?>
            
        </div>
    </div>
</section>

</div>
