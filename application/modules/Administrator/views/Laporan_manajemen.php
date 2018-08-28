
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">account_balance_wallet</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('laporan_keuangan')?> </h4>
                                    <div class="toolbar">

                                        <div class="row" style="background-color: #ecf0f1; margin-right: 10px; margin-left: 10px">

                                            
                                        </div>

                                    </div>



                                    <div class="material-datatables">
                                        <table id="table_laporan_keu" class="table table-striped table-no-bordered table-hover" cellspacing="0"  width="190%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr>
                                                    <th rowspan="2" style="border-right: solid 1px"><?php echo $this->lang->line('akun')?></th>
                                                    <th rowspan="2" style="border-right: solid 1px; width: 200px"><?php echo $this->lang->line('nama_kun')?></th>
                                                    <th colspan="2" style="border-right: solid 1px; text-align: center;"><?php echo $this->lang->line('saldo_awal')?></th>
                                                    <th colspan="2" style="border-right: solid 1px; text-align: center;"><?php echo $this->lang->line('mutasi')?></th>
                                                    <th colspan="2" style="border-right: solid 1px; text-align: center;"><?php echo $this->lang->line('saldo_akhir')?></th>
                                                    <th colspan="2" style="border-right: solid 1px; text-align: center;"><?php echo $this->lang->line('laba_rugi')?></th>
                                                    <th colspan="2" style="border-right: solid 1px; text-align: center;"><?php echo $this->lang->line('neraca')?></th>
                                                </tr>
                                                <tr>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Debet</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Kredit</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Debet</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Kredit</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Debet</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Kredit</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Debet</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Kredit</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Debet</th>
                                                    <th style="border-right: solid 1px; border-top: solid 1px;">Kredit</th>
                                                </tr>
                                            </thead>
                                            <tfoot >
                                                <tr>
                                                    <th colspan="2"><h4 class="pull-left">Total</h4></th>
                                                    <th ><input style="width:150px" type="text" class="form-control" id="debet" name="debet"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="kredit" name="kredit"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="debet1" name="debet1"  disabled=""></th>
                                                    <th><input style="width:150px" style="width:150px" type="text" class="form-control" id="kredit1" name="kredit1"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="debet2" name="debet2"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="kredit2" name="kredit2"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="ldebet" name="ldebet"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="lkredit" name="lkredit"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="ndebet" name="ndebet"  disabled=""></th>
                                                    <th><input style="width:150px" type="text" class="form-control" id="nkredit" name="nkredit"  disabled=""></th>

                                                </tr>
                                            </tfoot>
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
    var table_laporan_keu;
    
    $(document).ready(function() {
        load_table_laporan_keu();
        generate_neraca();
    });


    //DELETE delete_pergsbb
    function generate_neraca()
    {
            // ajax delete data to database
            $.ajax({
                url : "<?php echo site_url('Administrator/generate_neraca')?>",
                type: "POST",
                dataType: "JSON",
                success: function(data)
                {
                    reload_table_laporan_keu();
                    total();
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    reload_table_laporan_keu();
                    total();
                }
            });

    }



    function total(){
        $.ajax({
                url : "<?php echo site_url('Administrator/total')?>",
                type: "GET",
                dataType: "JSON",
                success: function(data)
                {
                    $('[name="debet"]').val(accounting.formatNumber(data.debet));
                    $('[name="kredit"]').val(accounting.formatNumber(data.kredit));

                    $('[name="debet1"]').val(accounting.formatNumber(data.debet1));
                    $('[name="kredit1"]').val(accounting.formatNumber(data.kredit1));

                    $('[name="debet2"]').val(accounting.formatNumber(data.debet2));
                    $('[name="kredit2"]').val(accounting.formatNumber(data.kredit2));

                    $('[name="ldebet"]').val(accounting.formatNumber(data.ldebet));
                    $('[name="lkredit"]').val(accounting.formatNumber(data.lkredit));

                    $('[name="ndebet"]').val(accounting.formatNumber(data.ndebet));
                    $('[name="nkredit"]').val(accounting.formatNumber(data.nkredit));
                },
                error: function (jqXHR, textStatus, errorThrown)
                {
                    alert('Error get data from ajax');
                }
        });
      }


    function load_table_laporan_keu(){
        table_laporan_keu = $('#table_laporan_keu').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            "order": [], //Initial no order.
            "scrollX": true,
            "info": false,
            "scrollCollapse": true,
            "fixedColumns":   {
                "leftColumns": 2
            },
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_laporan_keu')?>",
                    "type": "POST",  
                    "data": function ( data ) {
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

   

    function reload_table_laporan_keu(){
        table_laporan_keu.ajax.reload(null, false);
    }

    


    


</script>