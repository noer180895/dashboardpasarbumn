<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Promo Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Promo Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form sid="addUser" action="<?php echo base_url() ?>manage_promo/save" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6"> 

                                    <div class="form-group">
                                        <label for="role">Answer</label>
                                        <?php if($promo != null){ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" value="<?php echo $promo->name; ?>" >
                                            <input type="hidden" name="idPromo" id="idPromo" value="<?php echo $promo->idPromo; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" >
                                        <?php } ?>
                                     
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Description</label>
                                        <?php if($promo != null){ ?>
                                            <input type="text" class="form-control required" id="description" name="description" maxlength="128" value="<?php echo $promo->description; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="description" name="description" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Image</label>
                                        <?php if($promo != null){ ?>
                                            <input type="text" class="form-control required" id="image" name="image" maxlength="128" value="<?php echo $promo->image; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="image" name="image" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Kode Promo</label>
                                        <?php if($promo != null){ ?>
                                            <input type="text" class="form-control required" id="kode_promo" name="kode_promo" maxlength="128" value="<?php echo $promo->kode_promo; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="kode_promo" name="kode_promo" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Start Date</label>
                                        <?php if($promo != null){ ?>
                                            <input type="date" class="form-control required" id="start_promo" name="start_promo" maxlength="128" value="<?php echo $promo->start_promo; ?>">
                                        <?php }else{ ?>
                                               <input type="date" class="form-control required" id="start_promo" name="start_promo" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">End Promo</label>
                                        <?php if($promo != null){ ?>
                                            <input type="text" class="form-control required" id="end_promo" name="end_promo" maxlength="128" value="<?php echo $promo->end_promo; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="end_promo" name="end_promo" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Potongan Promo</label>
                                        <?php if($promo != null){ ?>
                                            <input type="text" class="form-control required" id="potongan_promo" name="potongan_promo" maxlength="128" value="<?php echo $promo->potongan_promo; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="potongan_promo" name="potongan_promo" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">CreatedAt</label>
                                        <?php if($promo != null){ ?>
                                            <input type="date" class="form-control required" id="createdAt" name="createdAt" maxlength="128" value="<?php echo $promo->createdAt; ?>">
                                        <?php }else{ ?>
                                               <input type="date" class="form-control required" id="createdAt" name="createdAt" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">updatedAt</label>
                                        <?php if($promo != null){ ?>
                                            <input type="date" class="form-control required" id="updatedAt" name="updatedAt" maxlength="128" value="<?php echo $promo->updatedAt; ?>">
                                        <?php }else{ ?>
                                               <input type="date" class="form-control required" id="description" name="updatedAt" maxlength="128">
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
    </section>
    
</div>
<!-- <?php if($role != null){ ?>
<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<?php }else{ ?>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<?php } ?> -->