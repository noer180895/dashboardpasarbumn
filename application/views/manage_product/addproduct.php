<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Product Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Product Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->


                       <div class="col-md-12">
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

                    
                    <form sid="addUser" action="<?php echo base_url() ?>manage_product/save" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">

                                 <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Type</label>
                                        <?php if($product != null){ ?>
                                            <select class="form-control" id="type" name="type">
                                                <?php
                                                    foreach ($type as $key => $value)
                                                    {
                                                        ?>
                                                        <option  value="<?php echo $key;?>"
                                                      <?php if($key == $product->type){echo "selected";} ?>>
                                                      <?php echo $value;?></option>
                                                        <?php
                                                    }
                                                
                                                ?>


                                            </select>
                                        <?php }else{ ?>
                                             <select class="form-control" id="type" name="type">
                                                <?php
                                                    foreach ($type as $key => $value)
                                                    {
                                                        ?>
                                                        <option  value="<?php echo $key;?>">
                                                      <?php echo $value;?></option>
                                                        <?php
                                                    }
                                                
                                                ?>


                                            </select>

                                        <?php } ?>
                                    </div>
                                </div>  



                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Name</label>
                                        <?php if($product != null){ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" value="<?php echo $product->name; ?>" >
                                            <input type="hidden" name="productId" id="productId" value="<?php echo $product->productId; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" >
                                        <?php } ?>
                                     
                                    </div>
                                    
                                </div>




                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Location Name</label>
                                        <?php if($product != null){ ?>
                                            <input type="text" class="form-control required" id="location_name" name="location_name" maxlength="128" value="<?php echo $product->location_name; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="location_name" name="location_name" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                  <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Price</label>
                                        <?php if($product != null){ ?>
                                            <input type="text" class="form-control required" id="price" name="price" maxlength="128" value="<?php echo $product->price; ?>" >
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="price" name="price" maxlength="128" >
                                        <?php } ?>
                                     
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Latitude</label>
                                        <?php if($product != null){ ?>
                                            <input type="text" class="form-control required" id="lat" name="lat" maxlength="128" value="<?php echo $product->lat; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="lat" name="lat" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>



                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Longitude</label>
                                        <?php if($product != null){ ?>
                                            <input type="text" class="form-control required" id="long" name="long" maxlength="128" value="<?php echo $product->long; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="long" name="long" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>



                              
                                  <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Description</label>
                                        <?php if($product != null){ ?>
                                            <textarea class="form-control" name="description" id="description"><?php echo $product-> description; ?></textarea>
                                        <?php }else{ ?>

                                            <textarea class="form-control" name="description" id="description"></textarea>
                                        <?php } ?>
                                     
                                    </div>
                                    
                                </div>





                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Discount</label>
                                        <?php if($product != null){ ?>
                                            <input type="text" class="form-control required" id="disc" name="disc" maxlength="128" value="<?php echo $product->disc; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="disc" name="disc" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Fasilitas</label><br />
                                        <?php foreach ($fasilitas as $value) { ?>
                                            <input type="checkbox" name="fasilitas_id[]"  value="<?php echo $value; ?>"> &nbsp; <?php echo $value; ?><br />
                                        <?php } ?>
                                    </div>
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Image</label>
                                          <?php if($product != null){ ?>
                                            <br />
                                            <img src="<?php echo $url_image; ?>" style="width: 150px; height: 150px; padding-bottom: 15px;">
                                            <br />
                                            <input type="file" class="form-control required" id="userfile" name="userfile[]" multiple>
                                        <?php }else{ ?>
                                             <input type="file" class="form-control required" id="userfile" name="userfile[]" multiple>
                                        <?php } ?>
                                    </div>
                                    
                                </div>



                               




                               
                        </div>
    
                        <div class="box-footer">
                            <input type="submit" class="btn btn-primary" value="Submit" />
                            <input type="reset" class="btn btn-default" value="Reset" />
                        </div>
                    </form>
                </div>
            </div>
         
        </div>    
    </section>
    
</div>
<!-- <?php if($role != null){ ?>
<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<?php }else{ ?>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<?php } ?> -->