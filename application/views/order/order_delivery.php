<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-list"></i>  List Data order_delivery
      </h1>
    </section>
    <br />
    <section class="content">
        <div class="row">

            <div class="box-header" >
                <button class="btn btn-success" onclick="add_order_delivery()"><i class="glyphicon glyphicon-plus"></i> Add order_delivery</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br /><br />
                <table id="table" class="table table-striped table-border_deliveryed" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No order</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Total</th>
                            <!-- <th style="width:125px;">Action</th> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>

                   
                </table>
            </div>

            <!-- Bootstrap modal -->
                <div class="modal fade" id="modal_form" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title">order delivery Form</h3>
                            </div>
                            <div class="modal-body form">
                                <form action="#" id="form" class="form-horizontal">
                                    <input type="hidden" value="" name="id"/> 



                                    <div class="form-group">
                                            <label class="control-label col-md-3">Customer</label>
                                            <div class="col-md-9">
                                                <select name="item_id" class="form-control">
                                                    <option value="">--Select Item--</option>
                                                    <?php  foreach($dataCustomer as $item){ ?>       
                                                        <option value="<?php echo $item->id; ?>"><?php echo $item->nama; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>


                                     <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Due Date Delivery</label>
                                            <div class="col-md-9">
                                                 <input name="due_date_delivery" placeholder="due date delivery" class="form-control" type="date">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                         <div class="form-group">
                                            <label class="control-label col-md-3">Method Payment</label>
                                            <div class="col-md-9">
                                                 <select name="item_id" class="form-control">
                                                    <option value="">--Select Method Payment--</option>       
                                                    <option value="cash">Cash</option>
                                                    <option value="giro">Giro</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                       

                                      <div class="form-body">
                                        
                                         <div class="form-group">
                                            <label class="control-label col-md-3">Produk</label>
                                            <div class="col-md-9">
                                                 <select name="item_id" class="form-control">
                                                    <option value="">--Select Product--</option>       
                                                    <option value="cash">Cash</option>
                                                    <option value="giro">Giro</option>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-md-3">Qty</label>
                                            <div class="col-md-9">
                                                 <input name="qty" placeholder="qty" class="form-control" type="text">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    </div>
                                       

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Ammount</label>
                                            <div class="col-md-9">
                                                <textarea name="comments" class="form-control"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                       
                                    </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Comments</label>
                                            <div class="col-md-9">
                                                <textarea name="comments" class="form-control"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>
                                    
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            <!-- End Bootstrap modal -->
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
        "order_delivery": [], //Initial no order_delivery.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('order_delivery/ajax_list_delivery_order_delivery')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "order_deliveryable": false, //set not order_deliveryable
        },
        ],


    });


    //datepicker
    $('.datepicker').datepicker({
        autoclose: true,
        format: "yyyy-mm-dd",
        todayHighlight: true,
        orientation: "top auto",
        todayBtn: true,
        todayHighlight: true,  
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("textarea").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });
    $("select").change(function(){
        $(this).parent().parent().removeClass('has-error');
        $(this).next().empty();
    });

});



function add_order_delivery()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add order_delivery'); // Set Title to Bootstrap modal title
}

function edit_order_delivery(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('order_delivery/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="item_id"]').val(data.item_id);
            $('[name="item_id"]').val(data.item_id);
            $('[name="comment"]').val(data.comment);
            $('[name="qty"]').val(data.qty);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit order_delivery'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}

function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;

    if(save_method == 'add') {
        url = "<?php echo site_url('order_delivery/ajax_add')?>";
    } else {
        url = "<?php echo site_url('order_delivery/ajax_update')?>";
    }

    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {

            if(data.status) //if success close modal and reload ajax table
            {
                $('#modal_form').modal('hide');
                reload_table();
            }
            else
            {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                    $('[name="'+data.inputerror[i]+'"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                    $('[name="'+data.inputerror[i]+'"]').next().text(data.error_string[i]); //select span help-block class set text error string
                }
            }
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 


        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error adding / update data');
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 

        }
    });
}

function delete_order_delivery(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('order_delivery/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
                //if success reload ajax table
                $('#modal_form').modal('hide');
                reload_table();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error deleting data');
            }
        });

    }
}

</script>