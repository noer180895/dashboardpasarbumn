<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Role Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Role Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>manage_role/save" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <?php if($role != null){ ?>
                                            <input type="text" class="form-control required" id="role" name="role" maxlength="128" value="<?php echo $role->role; ?>">
                                            <input type="hidden" name="roleId" id="roleId" value="<?php echo $role->roleId; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="role" name="role" maxlength="128">
                                        <?php } ?>
                                    </div>
                                    
                                </div>

                                <div class="col-md-6"> 
                                  <label for="access_role">Access Role</label>                               
                                    <div class="form-group">
                                      
                                        <?php if($role != null){ ?>
                                            <input type="checkbox" name="access_role" id="access_role" value="allaccess" <?php echo ($role->access_role =='allaccess' ? 'checked' : '');?>>All Access Fitur <br />
                                            <input type="checkbox" name="access_role" id="access_role" value="crudconten" <?php echo ($role->access_role=='crudconten' ? 'checked' : '');?>>Add,Edit,Delete,Read content website
                                            
                                        <?php }else{ ?> 
                                             <input type="checkbox" value="allaccess" name="access_role">All Access Fitur <br />
                                              <input type="checkbox" value="crudconten" name="access_role">Add,Edit,Delete,Read content website
                                        
                                        <?php }?>
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
<?php if($role != null){ ?>
<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<?php }else{ ?>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<?php } ?>