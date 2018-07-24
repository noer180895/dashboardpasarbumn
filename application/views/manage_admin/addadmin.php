<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-users"></i> Admin Management
      </h1>
    </section>
    
    <section class="content">
    
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title">Enter Admin Details</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form role="form" id="addUser" action="<?php echo base_url() ?>manage_admin/save" method="post" role="form">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="firstname">First Name</label>

                                        <?php if($admin != null){ ?>
                                            <input type="text" class="form-control required" id="firstname" name="firstname" maxlength="128" value="<?php echo $admin->firstname; ?>">
                                            <input type="hidden" name="userId" id="userId" value="<?php echo $admin->userId; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="firstname" name="firstname" maxlength="128">
                                        <?php } ?>
                                    </div>
                                    
                                </div>

                                <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="lastname">Last Name</label>
                                        <?php if($admin != null){ ?>
                                            <input type="text" class="form-control required" id="lastname" name="lastname" maxlength="128" value="<?php echo $admin->lastname; ?>">
                                        <?php }else{ ?> 
                                            <input type="text" class="form-control required" id="lastname" name="lastname" maxlength="128">
                                        <?php }?>
                                    </div>
                                    
                                </div>


                                 <div class="col-md-6">                                
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <?php if($admin != null){ ?>
                                            <input type="text" class="form-control required" id="username" name="username" maxlength="128" value="<?php echo $admin->username; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required" id="username" name="username" maxlength="128">
                                        <?php } ?>
                                    </div>
                                    
                                </div>



                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email address</label>
                                        <?php if($admin != null){ ?>
                                            <input type="text" class="form-control required email" id="email"  name="email" maxlength="128" value="<?php echo $admin->email; ?>">
                                        <?php }else{ ?>
                                            <input type="text" class="form-control required email" id="email"  name="email" maxlength="128">
                                        <?php } ?>
                                    </div>
                                </div>
                                

                            </div>

                            <?php if($admin == null){ ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control required" id="password"  name="password" maxlength="10">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="cpassword">Confirm Password</label>
                                            <input type="password" class="form-control required equalTo" id="cpassword" name="cpassword" maxlength="10">
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Role</label>
                                        <?php if($admin != null){ ?>
                                            <select class="form-control" id="roleId" name="roleId">
                                                <option value="0">Select Role</option>
                                                <?php
                                                if(!empty($roles))
                                                {
                                                    foreach ($roles as $rl)
                                                    {
                                                        ?>
                                                        <!-- <option value="<?php echo $rl->roleId ?>"><?php echo $rl->role ?></option> -->
                                                        <option  value="<?php echo $rl->roleId;?>"
                                                      <?php if($rl->roleId == $admin->roleId){echo "selected";} ?>>
                                                      <?php echo $rl->role;?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>

                                        <?php }else{ ?>
                                             <select class="form-control" id="roleId" name="roleId">
                                                <option value="0">Select Role</option>
                                                <?php
                                                if(!empty($roles))
                                                {
                                                    foreach ($roles as $rl)
                                                    {
                                                        ?>
                                                        <option  value="<?php echo $rl->roleId;?>">
                                                      <?php echo $rl->role;?></option>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                        <?php } ?>
                                    </div>
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="role">Status</label>
                                        <?php if($admin != null){ ?>
                                            <select class="form-control" id="isActive" name="isActive">
                                                <?php
                                                    foreach ($status as $key => $value)
                                                    {
                                                        ?>
                                                        <option  value="<?php echo $key;?>"
                                                      <?php if($key == $admin->isActive){echo "selected";} ?>>
                                                      <?php echo $value;?></option>
                                                        <?php
                                                    }
                                                
                                                ?>


                                            </select>
                                        <?php }else{ ?>
                                             <select class="form-control" id="isActive" name="isActive">
                                                <?php
                                                    foreach ($status as $key => $value)
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
                        </div><!-- /.box-body -->
    
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
<?php if($admin != null){ ?>
<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
<?php }else{ ?>
<script src="<?php echo base_url(); ?>assets/js/addUser.js" type="text/javascript"></script>
<?php } ?>