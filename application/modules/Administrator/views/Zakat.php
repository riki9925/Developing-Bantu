
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">account_balance_wallet</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('daftar_zakat')?></h4>
                                    <div class="toolbar">

                                                                            

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_zakat" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_zakat">
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>

                    </div>
                </div>


                

            

<script type="text/javascript">
    var table_zakat;
    $(document).ready(function() {
        set_responsive_zakat();
        load_table_zakat();
    });

    function set_responsive_zakat(){

        if (layar == 'big') {
            rows = "<th style='width:8%'>No.</th><th><?php echo $this->lang->line('dermawan')?></th><th><?php echo $this->lang->line('nominal_zakat')?></th><th><?php echo $this->lang->line('waktu')?></th>";
            $(rows).appendTo("#thead_zakat");
        }
        else{
            rows = "<th style='width:8%'>No.</th><th><?php echo $this->lang->line('dermawan')?></th><th><?php echo $this->lang->line('nominal_zakat')?></th><th><?php echo $this->lang->line('waktu')?></th>";
            $(rows).appendTo("#thead_zakat");
        }
    }


    function load_table_zakat(){
        table_zakat = $('#table_zakat').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_zakat')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                    },
                },
                //Set column definition initialisation properties.
                "columnDefs": [
                    { 
                        "targets": [ -1 ], //last column
                        "orderable": false, //set not orderable
                    },
                ],
        });
        
    }

   

    function reload_table_zakat(){
        table_zakat.ajax.reload(null, false);
    }



</script>