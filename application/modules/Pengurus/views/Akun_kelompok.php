                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('akun_kelompok')?></h4>
                                    <div class="toolbar">
                                        <div class="row" style="background-color: #ecf0f1; margin-right: 10px; margin-left: 10px">
                                            <div class="col-md-3" style="border-right: 1px solid white">
                                                <button  onclick="tambah_kelompok()" class="btn btn-success">
                                                    <span class="btn-label">
                                                        <i class="material-icons">add</i>
                                                    </span>
                                                    <?php echo $this->lang->line('tambah')?> 
                                                <div class="ripple-container"></div></button>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group label-floating" name="div_form">
                                                    <div class="col-md-4" align="left"><?php echo $this->lang->line('akun_jenis')?></div>
                                                    <div class="col-md-8">
                                                        <select onchange="reload_table_akun_kelompok()" name="list_jenis2" id="list_jenis2" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_akun_kelompok" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_kelompok">
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>




<script type="text/javascript">
    var table_akun_kelompok;
    $(document).ready(function() {
        load_akun_jenis();
        set_responsive_akun_kelompok();
        load_table_akun_kelompok();
    });


    function load_akun_jenis() {
        $('#list_jenis2').empty();
        $('#list_jenis2').append('<option value="Semua" selected="selected">Semua</option>');
            $.ajax({
                url: "<?php echo site_url('Administrator/get_list_jenis')?>",
                type: "POST",
                data: {
                    //"judul": $('#judul_kegiatan').val()
                },
                dataType: "JSON",
                success: function(data) {
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.accjenis+"'>"+v.accjenis+" - "+v.jenis+"</option>";
                    $(rows).appendTo("#list_jenis2");
                });
            }
        });
    }

    function set_responsive_akun_kelompok(){

        if (layar == 'big') {
            rows = "<th><?php echo $this->lang->line('akun_jenis')?></th><th><?php echo $this->lang->line('akun_kelompok')?></th><th><?php echo $this->lang->line('nama_akun_kelompok')?></th><th>Action</th>";
            $(rows).appendTo("#thead_kelompok");
        }
        else{
            rows = "<th><?php echo $this->lang->line('akun_jenis')?></th><th><?php echo $this->lang->line('akun_kelompok')?></th><th><?php echo $this->lang->line('nama_akun_kelompok')?></th><th>Action</th>";
            $(rows).appendTo("#thead_kelompok");
        }
    }


    function load_table_akun_kelompok(){
        table_akun_kelompok = $('#table_akun_kelompok').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_akun_kelompok')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.jenis = $('#list_jenis2').val();
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

   

    function reload_table_akun_kelompok(){
        table_akun_kelompok.ajax.reload(null, false);
    }


    function tambah_kelompok() {
        $('#btn_tambah_kel').show();
        $('#btn_update_kel').hide();
        $('#tambah_kel').modal('show');
        $('#content_kel').empty();
        $('#title_tambah_kel').text('<?php echo $this->lang->line('tambah_akun_kelompok')?>');
            $.ajax({
                url : "<?php echo site_url('Administrator/get_content')?>",
                type: "POST",
                data: { 
                  "page" : 'Tambah_akun_kel'
                },
                dataType: "html",
                success: function(data)
                {
                    $('#content_kel').html(data);
                    
                },
                
            });  
    }




        function tambah_kel(){
            $("#form_akun_kel").bootstrapValidator('validate');
            //if($('#form_akun_kel').data('bootstrapValidator').isValid()){
                // alert()
                    $.ajax({
                        url: "<?php echo site_url('Administrator/tambah_akun_kel')?>",
                        type: "POST",
                        data: {
                            "nama_akun_kel": $('#nama_akun_kel').val(), "id_jenis" : $('#list_jenis').val() 
                        },
                        dataType: "JSON",
                        success: function(data) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_kelompok_telah_ditambahkan')?>", "success");
                            reload_table_akun_kelompok();
                            $('#tambah_kel').modal('hide');
                        }
                    });
            //}  
        }      



    $('#btn_update_kel').on('click', function(){
            $("#form_akun_kel").bootstrapValidator('validate');
            if($('#form_akun_kel').data('bootstrapValidator').isValid()){

                    $.ajax({
                        url: "<?php echo site_url('Administrator/edit_akun_kel')?>",
                        type: "POST",
                        data: {
                            "nama_akun_kel": $('#nama_akun_kel').val(), "id_akun_kel" : $('#id_akun_kel').val() 
                        },
                        dataType: "JSON",
                        success: function(data) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_kelompok_telah_diperbarui')?>", "success");
                            reload_table_akun_kelompok();
                            $('#tambah_kel').modal('hide');
                        }
                    });
            }        
    });
    



    function hapus_kel(id){
            swal({
                    title: '<?php echo $this->lang->line('hapus_akun_kelompok')?>?',
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
                    url : "<?php echo site_url('Administrator/hapus_kel')?>",
                    type: "POST",
                    data: { 
                      "id" : id 
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        reload_table_akun_kelompok();
                        
                    },
                    
                });     
                
                swal({
                    title: '<?php echo $this->lang->line('sukses')?>',
                    text: '<?php echo $this->lang->line('akun_kelompok_terhapus')?>',
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


    function preview_kel(id) {
        tambah_kelompok();
        $('#title_tambah_kel').text('<?php echo $this->lang->line('detil_akun_kelompok')?>');
        $('#btn_tambah_kel').hide();
        $('#btn_update_kel').show();
            $.ajax({
                url : "<?php echo site_url('Administrator/preview_kel')?>",
                type: "POST",
                data: { 
                  "id" : id
                },
                dataType: "JSON",
                success: function(data)
                {
                    
                    $('#nama_akun_kel').val(data.kelompok);
                    $('#id_akun_kel').val(data.acckel);
                    
                    var acc_jenis = data.accjenis;

                    $('#list_jenis').empty();
                        $.ajax({
                            url: "<?php echo site_url('Administrator/get_list_jenis')?>",
                            type: "POST",
                            data: {
                                //"judul": $('#judul_kegiatan').val()
                            },
                            dataType: "JSON",
                            success: function(data) {
                            $.each(data, function(k, v) {
                                if (acc_jenis == v.accjenis) {
                                    rows ="<option selected='' value='"+v.accjenis+"'>"+v.accjenis+" - "+v.jenis+"</option>";
                                    $(rows).appendTo("#list_jenis");
                                }
                            });
                        }
                    });

                    $('#list_jenis').attr('disabled', true);

                },
                
            });  
    }

</script>