<div class="content-wrapper">
    <section class="content-header">
      <h1>
        <i class="fa fa-list"></i>  List Data stock
      </h1>
    </section>
    <br />
    <section class="content">
        <div class="row">
            <div class="box-header" >
                <div id="ex">
                    <div class="col-sm-6"></div>
                    <div class="col-sm-6"></div>
                </div>
                <br /><br />
                <table id="table" class="table table-striped table-bordered" width="100%">
                    <thead>
                        <tr>
                            <th>Item Name</th>
                            <th>Jenis Item</th>
                            <th>Qty</th>
                            <th>Wareshouse</th>
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
            "url": "<?php echo site_url('stock/ajax_list')?>",
            "type": "POST"
        },

        //Set column definition initialisation properties.
        "columnDefs": [
            { 
                "targets": [ -1 ], //last column
                "orderable": false, //set not orderable
            }
        ],
        "dom": "Bfrtip",
        "buttons": [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]

    });

    // new $.fn.dataTable.Buttons( table, {
    //     buttons: [
    //         'copy', 'excel', 'pdf', 'colvis' 
    //     ]
    // } );


    table.buttons().container()
    .appendTo( $('#ex .col-sm-6:eq(0)', table.table().container() ) );

   //  console.log(table.buttons);
   // table.buttons().container()
   //      .appendTo( '#table_wrapper' );


    // table.buttons( 0, null ).containers().appendTo( '#ex' );


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




function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}



</script>