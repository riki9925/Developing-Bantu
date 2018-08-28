
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">account_balance_wallet</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('laporan_transaksi')?></h4>
                                    <div class="toolbar">

                                        <div class="row" style="background-color: #ecf0f1; margin-right: 10px; margin-left: 10px">

                                            <div class="col-md-4" style="border-right: solid 1px white;">
                                                <div class="form-group label-floating" name="div_form">
                                                    <div class="col-md-3" align="left">Status</div>
                                                    <div class="col-md-9">
                                                        
                                                        <select style="margin-top: -10px; margin-bottom: 10px" onchange="reload_table_laporan_transaksi()"  id="status_jurnal" class="form-control">
                                                            <option value="Semua" selected="selected"><?php echo $this->lang->line('semua')?></option>
                                                            <option value="POSTED">POSTED</option>
                                                            <option value="REVERSE">REVERSE</option>
                                                        </select>

                                                    </div>
                                                </div>
                                            </div>

                                            <div  class="col-md-4" style="border-right: solid 1px white;">
                                                <div class="form-group label-floating" name="div_form">
                                                    <div class="col-md-5" align="left">Dari tanggal</div>
                                                    <div class="col-md-7">
                                                        
                                                        <input class="datepicker form-control" type="text" value="03/12/2016"/>

                                                    </div>
                                                </div>
                                            </div>
                                            <div hidden="" class="col-md-4">
                                                <div class="form-group label-floating" name="div_form">
                                                    <div class="col-md-6" align="left">Sampai tanggal</div>
                                                    <div class="col-md-6">
                                                        <input style="margin-top: -10px; margin-bottom: 10px" class="form-control datepicker" value="2017-06-30" style="" type="text" id="sampai_tanggal" onchange="reload_table_laporan_transaksi()">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_laporan_transaksi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_laporan_transaksi">
                                                    
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
    var table_laporan_transaksi;
    
    $(document).ready(function() {
        set_responsive_infaq();
        load_table_laporan_transaksi();
        
    });

    function set_responsive_infaq(){

        if (layar == 'big') {
            rows = "<th style='width:8%'>No.</th><th><?php echo $this->lang->line('tanggal')?></th><th><?php echo $this->lang->line('keterangan')?></th><th>Total</th><th>Status</th><th style='text-align:right'>Action</th>";
            $(rows).appendTo("#thead_laporan_transaksi");
        }
        else{
            rows = "<th style='width:8%'>No.</th><th>Tanggal</th><th>Keterangan</th><th>Total</th><th>Status</th><th style='text-align:right'>Action</th>";
            $(rows).appendTo("#thead_laporan_transaksi");
        }
    }


    function load_table_laporan_transaksi(){
        table_laporan_transaksi = $('#table_laporan_transaksi').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_laporan_transaksi')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        //data.dari = $('#dari_tanggal').val();
                        data.status = $('#status_jurnal').val();
                        //data.sampai = $('#sampai_tanggal').val();
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

   

    function reload_table_laporan_transaksi(){
        table_laporan_transaksi.ajax.reload(null, false);
    }

    function info_transaksi(ntrans){
        $.ajax({
            url : "<?php echo site_url('Administrator/detil_transaksi')?>",
            type: "POST",
            data: { 
                "ntrans" : ntrans
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#status_transaksi').empty();
                if (data.st == 'POSTED') {
                    rows = "<span style='color: #4fc143'><i class='material-icons'>done</i> Transaksi terposting</span>";
                    $(rows).appendTo("#status_transaksi");
                }
                else if (data.st == 'REVERSE'){
                    rows = "<span style='color: red'><i class='material-icons'>repeat</i> Transaksi dibatalkan</span>";
                    $(rows).appendTo("#status_transaksi");
                }
                $('#tanggal_detil').text(data.tanggal);
                $('#total_transaksi_detil').text(accounting.formatNumber(data.total));
                $('#keterangan_detil_transaksi').text(data.keterangan);
                
            },
        });
        $('#detil_transaksi').modal('show');
        $('#ntrans_detil').val(ntrans);
        reload_table_detil_jurnal();
    }


    


</script>