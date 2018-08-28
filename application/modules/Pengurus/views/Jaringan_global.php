
                <div class="container-fluid">
                          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('master_program_jaringan_global')?></h4>
                                    <div class="toolbar">

                                        <div class="col-md-6">
                                            
                                        
                                            <div class="row">
                                                <h4 class="col-md-3">Status</h4>
                                                <div class="col-md-5">
                                                    <div class="form-group label-floating is-empty" style="margin: 0px">
                                                        <label class="control-label"></label>
                                                        <select name="status_jaringan_g" id="status_jaringan_g" onchange="reload_table_jaringan_g()" class="form-control">
                                                            <option selected="" value="Semua"><?php echo $this->lang->line('semua_status')?></option>
                                                            <option >DRAFT</option>
                                                            <option >LIVE</option>
                                                            <option >SELESAI</option>
                                                            <option >BLOKIR</option>
                                                        </select>
                                                    <span class="material-input"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_jaringan_g" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_jaringan_g">
                                                    
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
    var table_jaringan_g;
    var id_jaringan_g;
    var action_jaringan_g = 'add';
    $(document).ready(function() {
        set_responsive_jaringan_g();
        load_table_jaringan_g();
    });

    function set_responsive_jaringan_g(){
        
        $('#thead_jaringan_g').empty();
        if (layar == 'big') {
            rows = "<th style='width:5%'>No.</th><th style='width:30%'><?php echo $this->lang->line('judul')?></th><th><?php echo $this->lang->line('target_hari')?></th><th><?php echo $this->lang->line('target_dana')?></th><th><?php echo $this->lang->line('lokasi')?></th><th>Status</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_jaringan_g");
        }
        else if (layar == 'small'){
            rows = "<th style='width:70%'>Daftar Kegiatan</th><th class='disabled-sorting text-right'>Target</th>";
            $(rows).appendTo("#thead_jaringan_g");
        }
    }


    function load_table_jaringan_g(){
        table_jaringan_g = $('#table_jaringan_g').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Pengurus/load_table_jaringan_g')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.status = $('#status_jaringan_g').val();
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


    function selesai_jaringan_g(id){
        action_jaringan_g = 'selesai';
        id_jaringan_g = id;
        get_content('Tambah_jaringan_global');
    }



    function reload_table_jaringan_g(){
        table_jaringan_g.ajax.reload(null, false);
    }

</script>