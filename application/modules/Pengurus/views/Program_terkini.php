
                <div class="container-fluid">
                          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('master_program_terkini')?></h4>
                                    <div class="toolbar">

                                        <div class="col-md-6">
                                            
                                        
                                            <div class="row">
                                                
                                                <h4 class="col-md-3">Status</h4>
                                                <div class="col-md-5">
                                                    <div class="form-group label-floating is-empty" style="margin: 0px">
                                                        <label class="control-label"></label>
                                                        <select name="status_program" id="status_program" onchange="reload_table_program_terkini()" class="form-control">
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
                                        <table id="table_program_terkini" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_program_terkini">
                                                    
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
    var table_program_terkini;
    var id_program_terkini;
    var action_program_terkini = 'add';
    $(document).ready(function() {
        set_responsive_program_terkini();
        load_table_program_terkini();
    });

    function set_responsive_program_terkini(){
        
        $('#thead_program_terkini').empty();
        if (layar == 'big') {
            rows = "<th style='width:5%'>No.</th><th style='width:30%'><?php echo $this->lang->line('judul')?></th><th><?php echo $this->lang->line('target_hari')?></th><th><?php echo $this->lang->line('target_dana')?></th><th><?php echo $this->lang->line('lokasi')?></th><th>Status</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_program_terkini");
        }
        else if (layar == 'small'){
            rows = "<th style='width:70%'><?php echo $this->lang->line('daftar_program')?></th><th class='disabled-sorting text-right'>Target</th>";
            $(rows).appendTo("#thead_program_terkini");
        }
    }


    function load_table_program_terkini(){
        table_program_terkini = $('#table_program_terkini').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Pengurus/load_table_program_terkini')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.status = $('#status_program').val();
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

   
    function delete_program_terkini(id){
            swal({
                    title: 'Hapus draft program terkini?',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                })
            .then(function() {

                $.ajax({
                    url : "<?php echo site_url('Pengurus/hapus_program_terkini')?>",
                    type: "POST",
                    data: { 
                      "id" : id
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        reload_table_program_terkini();
                    },
                    
                });     
                
                swal({
                    title: 'Sukses',
                    text: 'Draft program terkini telah terhapus',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                    })
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: 'Dibatalkan.',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    }





    function detil_program_terkini(id){
        $('#btn_aktifkan_program').hide();
        action_program_terkini = 'selesai';
        id_program_terkini = id;
        get_content('Tambah_program_terkini');
    }



    function reload_table_program_terkini(){
        table_program_terkini.ajax.reload(null, false);
    }

</script>