<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-list"></i>  Manage role
      </h1>
    </section>
    <br />
    <section class="content">
        <div class="row">
            
            <?php if($this->session->flashdata('success')){ ?>
                <div class="alert alert-success">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Success!</strong> <?php echo $this->session->flashdata('success'); ?>
                </div>

            <?php } else if($this->session->flashdata('error')){  ?>

                <div class="alert alert-danger">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Error!</strong> <?php echo $this->session->flashdata('error'); ?>
                </div>
            <?php } ?>
        </div>
        <div class="row">
            <div class="box-header" >
                <a href="<?php echo base_url() ?>manage_role/addrole"><button class="btn btn-success"><i class="glyphicon glyphicon-plus"></i> Add role</button></a>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br /><br />
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Access All Fitur</th>
                            <th>Access Delete</th>
                            <th>Access Edit</th>
                            <th>Access Read</th>
                            <th>Access Create</th>
                            <th>CreatedAt</th>
                            <th>UpdatedAt</th>
                            <th style="width:125px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                   
                </table>
            </div>
        </div>
    </section>
</div>









<script type="text/javascript">

var save_method; //for save method string
var table;
$(document).ready(function() {

    //datatables
    table = $('#table').DataTable({ 

        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('manage_role/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],

         "pagingType": "full_numbers",


    });

});


function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}


</script>