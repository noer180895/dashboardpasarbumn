<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Steporder Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Steporder Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form sid="addUser" action="<?php echo base_url() ?>manage_steporder/save" method="post" enctype="multipart/form-data">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Name</label>
                                        <?php if($steporder != null){ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" value="<?php echo $steporder->name; ?>" >
                                            <input type="hidden" name="id" id="id" value="<?php echo $steporder->id; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="name" name="name" maxlength="128" >
                                        <?php } ?>
                                     
                                    </div>
                                    
                                </div>

                                        <div class="col-md-6"> 
                                                               
                                    <div class="form-group">
                                        <label for="type">Type</label>  
                                        <?php if($steporder != null){ ?>
                                            <select class="form-control" id="type" name="type">
                                                <?php
                                                    foreach ($type as $key => $value)
                                                    {
                                                        ?>
                                                        <option  value="<?php echo $key;?>"
                                                      <?php if($key == $steporder->type){echo "selected";} ?>>
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
                                        <label for="role">Image</label>
                                          <?php if($steporder != null){ ?>
                                            <br />
                                            <img src="<?php echo $url_image; ?>" style="width: 150px; height: 150px; padding-bottom: 15px;">
                                            <br />
                                            <input type="file" class="form-control required" id="image" name="image">
                                        <?php }else{ ?>
                                             <input type="file" class="form-control required" id="image" name="image">
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