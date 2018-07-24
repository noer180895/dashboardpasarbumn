<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-list"></i>  List Data Good Receipt
      </h1>
    </section>
    <br />
    <section class="content">
        <div class="row">

            <div class="box-header" >
                <button class="btn btn-success" onclick="add_good_receipt()"><i class="glyphicon glyphicon-plus"></i> Add Good Receipt</button>
                <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
                <br /><br />
                <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No Po</th>
                            <th>No Gr</th>
                            <th>Good Details</th>
                            <th>Qty</th>
                            <th>Qty Delivery</th>
                            <th style="width:125px;">Action</th>
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
                                <h3 class="modal-title">Good Receipt Form</h3>
                            </div>
                            <div class="modal-body form">
                                <form action="#" id="form" class="form-horizontal">
                                    <input type="hidden" value="" name="id"/> 
                                    <div class="form-group">
                                            <label class="control-label col-md-3">No Po</label>
                                            <div class="col-md-9">
                                                <select name="no_po" class="form-control" onchange="getValue(this)">
                                                    <option value="">--Select Po--</option>
                                                    <?php  foreach($dataPo as $po){ ?>       
                                                        <option value="<?php echo $po->no_po; ?>"><?php echo $po->no_po; ?></option>
                                                    <?php } ?>
                                                </select>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Good Details</label>
                                            <div class="col-md-9">
                                                <textarea name="good_details" class="form-control" id="good_details"></textarea>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                     <div class="form-group">
                                            <label class="control-label col-md-3">Qty Request</label>
                                            <div class="col-md-9">
                                                <input name="qty" placeholder="qty" class="form-control" type="text" id="qty">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>



                                     <div class="form-group">
                                            <label class="control-label col-md-3">Qty Delivery Info</label>
                                            <div class="col-md-9">
                                                <input name="delivery" placeholder="delivery" class="form-control" type="text" id="delivery" readonly>
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                     <div class="form-group">
                                            <label class="control-label col-md-3">Qty Delivery</label>
                                            <div class="col-md-9">
                                                <input name="qty_delivery" placeholder="qty delivery" class="form-control" type="text" id="qty_delivery">
                                                <input name="item_id"  class="form-control" type="hidden">
                                                <span class="help-block"></span>
                                            </div>
                                        </div>

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="control-label col-md-3">Comments</label>
                                            <div class="col-md-9">
                                                <textarea name="comment" class="form-control" id="comment"></textarea>
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
        "order": [], //Initial no order.

        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('good_receipt/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
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



function add_good_receipt()
{   
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Good Receipt'); // Set Title to Bootstrap modal title
}


function detail_gr(id)
{
    // alert(id);
    // save_method = 'add';
    // $('#form')[0].reset(); // reset form on modals
    // $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_detail').modal('show'); // show bootstrap modal
    $('.modal-title-detail').text('Detail Good Receipt'); // Set Title to Bootstrap modal title
}


function edit_good_receipt(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('good_receipt/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="id"]').val(data.id);
            $('[name="no_po"]').val(data.no_po);
            $('[name="good_details"]').val(data.good_details);
            $('[name="qty"]').val(data.qty);
            $('[name="qty_delivery"]').val(data.qty_delivery);
            $('[name="comment"]').val(data.comment);
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit good_receipt'); // Set title to Bootstrap modal title

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
        url = "<?php echo site_url('good_receipt/ajax_add')?>";
    } else {
        url = "<?php echo site_url('good_receipt/ajax_update')?>";
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
                location.reload();

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

function delete_good_receipt(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('good_receipt/ajax_delete')?>/"+id,
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


function getValue(nopo){
    var no_po = nopo.value;
    $.ajax({
        url : "<?php echo site_url('good_receipt/get_po_detail/')?>/" + no_po,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {

            $('[name="good_details"]').val(data.nama);
            $('[name="qty"]').val(data.qty);
            $('[name="item_id"]').val(data.item_id);
            $('[name="delivery"]').val(data.qty_delivery);

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

</script>