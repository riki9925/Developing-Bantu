
                <div class="container-fluid">
                          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('posting_berita')?></h4>
                                    <div class="toolbar">

                                        <div class="col-md-6">
                                            
                                        
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <button onclick="get_content('Setting')" class="btn btn-info">
                                                        <span class="btn-label">
                                                            <i class="material-icons">arrow_back</i>
                                                        </span>
                                                        <?php echo $this->lang->line('kembali')?>
                                                    <div class="ripple-container"></div></button>
                                                </div>

                                                <div class="col-sm-4">
                                                    <button onclick="get_content('Tambah_berita')" class="btn btn-success">
                                                        <span class="btn-label">
                                                            <i class="material-icons">add</i>
                                                        </span>
                                                        <?php echo $this->lang->line('tambah')?>
                                                    <div class="ripple-container"></div></button>
                                                </div>


                                                <label hidden="" class="col-md-3 label-on-left" style="color: black"><i class="material-icons">filter_list</i>Status</label>

                                                <div hidden="" class="col-md-4">
                                                    <div class="form-group label-floating is-empty" style="margin: 0px">
                                                        <label class="control-label"></label>
                                                        <select name="status_kegiatan" id="status_kegiatan" onchange="reload_table_berita()" class="form-control">
                                                            <option selected="" value="Semua"><?php echo $this->lang->line('semua_status')?></option>
                                                            <option >AKTIF</option>
                                                            <option >NONAKTIF</option>
                                                        </select>
                                                    <span class="material-input"></span></div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_berita" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_berita">
                                                    
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
    var table_berita;
    var action_berita = 'add';
    var id_berita;
    $(document).ready(function() {
        set_responsive_berita();
        load_table();
    });

    function set_responsive_berita(){
        
        $('#thead_berita').empty();
        if (layar == 'big') {
            rows = "<th style='width:5%'>No.</th><th style='width:25%'><?php echo $this->lang->line('judul')?></th><th style='width:35%'><?php echo $this->lang->line('deskripsi')?></th><th style='width:10%'><?php echo $this->lang->line('gambar')?></th><th>Status</th><th class='disabled-sorting text-right' style='width:15%'>Actions</th>";
            $(rows).appendTo("#thead_berita");
        }
        else if (layar == 'small'){
            rows = "<th style='width:70%'>Daftar Kegiatan</th><th class='disabled-sorting text-right'>Target</th>";
            $(rows).appendTo("#thead_berita");
        }
    }


    function load_table(){
        table_berita = $('#table_berita').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_berita')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        //data.status = $('#status_kegiatan').val();
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

   
    

    

    function reload_table_berita(){
        table_berita.ajax.reload(null, false);
    }


    function edit_berita(id){
        action_berita = 'edit';
        get_content('Tambah_berita');
        id_berita = id;
    }


    function aktifkan_berita(id){
        action_berita = 'aktifkan';
        get_content('Tambah_berita');
        id_berita = id;
    }



    



    function delete_berita(id){
            swal({
                    title: '<?php echo $this->lang->line('hapus_berita')?>?',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '<?php echo $this->lang->line('hapus')?>',
                    cancelButtonText: '<?php echo $this->lang->line('batal')?>',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                })
            .then(function() {

                $.ajax({
                    url : "<?php echo site_url('Administrator/hapus_berita')?>",
                    type: "POST",
                    data: { 
                      "id" : id
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        reload_table_berita();
                    },
                    
                });     
                
                swal({
                    title: '<?php echo $this->lang->line('sukses')?>',
                    text: '<?php echo $this->lang->line('berita_terhapus')?>',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                    })
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: '<?php echo $this->lang->line('dibatalkan')?>',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    }



</script>