<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Footer Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Footer Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form sid="addUser" action="<?php echo base_url() ?>manage_footer/save" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Name</label>
                                        <?php if($footer != null){ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" value="<?php echo $footer->name; ?>" >
                                            <input type="hidden" name="footerId" id="footerId" value="<?php echo $footer->footerId; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" >
                                        <?php } ?>
                                     
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Url</label>
                                        <?php if($footer != null){ ?>
                                            <input type="text" class="form-control required" id="url" name="url" maxlength="128" value="<?php echo $footer->url; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="url" name="url" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Position</label>
                                        <?php if($footer != null){ ?>
                                            <input type="text" class="form-control required" id="position" name="position" maxlength="128" value="<?php echo $footer->position; ?>">
                                        <?php }else{ ?>
                                               <input type="text" class="form-control required" id="position" name="position" maxlength="128">
                                        <?php } ?>
                                       
                                    </div>
                                    
                                </div>


                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Image</label>
                                          <?php if($footer != null){ ?>
                                            <br />
                                            <img src="<?php echo $url_image; ?>" style="width: 150px; height: 150px; padding-bottom: 15px;">
                                            <br />
                                            <input type="file" class="form-control required" id="image" name="image">
                                        <?php }else{ ?>
                                             <input type="file" class="form-control required" id="image" name="image">
                                        <?php } ?>
                                    </div>
                                    
                                </div>

                                <div class="col-md-6"> 
                                                               
                                    <div class="form-group">
                                        <label for="type">Type</label>  
                                        <?php if($footer != null){ ?>
                                            <select class="form-control" id="type" name="type">
                                                <?php
                                                    foreach ($type as $key => $value)
                                                    {
                                                        ?>
                                                        <option  value="<?php echo $key;?>"
                                                      <?php if($key == $footer->type){echo "selected";} ?>>
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