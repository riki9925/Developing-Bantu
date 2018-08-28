                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('table_akun_jenis')?></h4>
                                    <div class="toolbar">

                                        <div class="col-md-12" style="background-color: #ecf0f1">
                                            <button  onclick="tambah_coa('Tambah_akun_jenis')" class="btn btn-success">
                                                <span class="btn-label">
                                                    <i class="material-icons">add</i>
                                                </span>
                                                <?php echo $this->lang->line('tambah')?> 
                                            <div class="ripple-container"></div></button>
                                                
                                        </div>

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_akun_jenis" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_jenis">
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>




<script type="text/javascript">
    var table_akun_jenis;
    var jenis_tambah_coa = 'Tambah_akun_jenis';
    $(document).ready(function() {
        set_responsive_akun_jenis();
        load_table_akun_jenis();
    });


    function tambah_coa(jenis) {
        jenis_tambah_coa = jenis;
        if (jenis_tambah_coa == 'Tambah_akun_jenis') {
            $('#title_tambah_coa').text('<?php echo $this->lang->line('tambah_akun_jenis')?>');
        }
        $('#tambah_COA').modal('show');
        $('#content_COA').empty();
        
            $.ajax({
                url : "<?php echo site_url('Administrator/get_content')?>",
                type: "POST",
                data: { 
                  "page" : jenis_tambah_coa
                },
                dataType: "html",
                success: function(data)
                {
                    $('#content_COA').html(data);
                    $('#btn_tambah_COA').show();
                    $('#btn_update_COA').hide();
                },
                
            });  
    }


    function preview_jenis(id) {
        tambah_coa(jenis_tambah_coa);
        if (jenis_tambah_coa == 'Tambah_akun_jenis') {
            $('#title_tambah_coa').text('<?php echo $this->lang->line('edit_akun_jenis')?>');
        }

            $.ajax({
                url : "<?php echo site_url('Administrator/preview_jenis')?>",
                type: "POST",
                data: { 
                  "id" : id
                },
                dataType: "JSON",
                success: function(data)
                {
                    
                    $('#nama_akun_jenis').val(data.jenis);
                    $('#id_akun_jenis').val(data.accjenis);
                    $('#btn_tambah_COA').hide();
                    $('#btn_update_COA').show();

                },
                
            });  
    }


    function hapus_jenis(id){
            swal({
                    title: '<?php echo $this->lang->line('hapus_akun_jenis')?>?',
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
                    url : "<?php echo site_url('Administrator/hapus_coa')?>",
                    type: "POST",
                    data: { 
                      "id" : id , "jenis_coa" : jenis_tambah_coa
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        reload_table_akun_jenis();
                        
                    },
                    
                });     
                
                swal({
                    title: '<?php echo $this->lang->line('sukses')?>',
                    text: '<?php echo $this->lang->line('akun_jenis_terhapus')?>',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                    })
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: '<?php echo $this->lang->line('dibatalkan')?>.',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    }


    function set_responsive_akun_jenis(){

        if (layar == 'big') {
            rows = "<th><?php echo $this->lang->line('akun_jenis')?></th><th><?php echo $this->lang->line('nama_akun_jenis')?></th><th>Action</th>";
            $(rows).appendTo("#thead_jenis");
        }
        else{
            rows = "<th><?php echo $this->lang->line('akun_jenis')?></th><th><?php echo $this->lang->line('nama_akun_jenis')?></th><th>Action</th>";
            $(rows).appendTo("#thead_jenis");
        }
    }


    function load_table_akun_jenis(){
        table_akun_jenis = $('#table_akun_jenis').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_akun_jenis')?>",
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

   

    function reload_table_akun_jenis(){
        table_akun_jenis.ajax.reload(null, false);
    }



    function tambah_jenis(){
            $("#form_akun_jenis").bootstrapValidator('validate');
            if($('#form_akun_jenis').data('bootstrapValidator').isValid()){

                    $.ajax({
                        url: "<?php echo site_url('Administrator/tambah_akun_jenis')?>",
                        type: "POST",
                        data: {
                            "nama_akun_jenis": $('#nama_akun_jenis').val()
                        },
                        dataType: "JSON",
                        success: function(data) {

                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_jenis_telah_ditambahkan')?>", "success");
                            reload_table_akun_jenis();
                            $('#tambah_COA').modal('hide');
                        }
                    });
            }
    }
        


    $('#btn_update_COA').on('click', function(){

        if (jenis_tambah_coa == 'Tambah_akun_jenis') {
            $("#form_akun_jenis").bootstrapValidator('validate');
            if($('#form_akun_jenis').data('bootstrapValidator').isValid()){

                    $.ajax({
                        url: "<?php echo site_url('Administrator/edit_akun_jenis')?>",
                        type: "POST",
                        data: {
                            "accjenis" : $('#id_akun_jenis').val() , "nama_akun_jenis": $('#nama_akun_jenis').val() , "jenis_coa" : jenis_tambah_coa
                        },
                        dataType: "JSON",
                        success: function(data) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_jenis_telah_diperbarui')?>", "success");
                            reload_table_akun_jenis();
                            $('#tambah_COA').modal('hide');
                        }
                    });
            }
        }
        
    });


</script>