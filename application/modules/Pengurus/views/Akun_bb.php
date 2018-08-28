                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('akun_buku_besar')?></h4>
                                    <div class="toolbar">

                                        <div class="row" style="background-color: #ecf0f1; margin-right: 10px; margin-left: 10px">
                                            <div class="col-md-3" style="border-right: 1px solid white">
                                                <button  onclick="tambah_bb()" class="btn btn-success">
                                                    <span class="btn-label">
                                                        <i class="material-icons">add</i>
                                                    </span>
                                                    <?php echo $this->lang->line('tambah')?> 
                                                <div class="ripple-container"></div></button>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating" name="div_form">
                                                    <div class="col-md-3" align="left">Akun kelompok</div>
                                                    <div class="col-md-9">
                                                        <select onchange="reload_table_akun_bb()" name="list_kel2" id="list_kel2" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_akun_bb" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_bb">
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>




<script type="text/javascript">
    var table_akun_bb;
    $(document).ready(function() {
        load_akun_kel();
        set_responsive_akun_bb();
        load_table_akun_bb();
        
    });

    function load_akun_kel() {
        $('#list_kel2').empty();
        $('#list_kel2').append('<option value="Semua" selected="selected"><?php echo $this->lang->line('semua')?></option>');
            $.ajax({
                url: "<?php echo site_url('Administrator/get_list_kel')?>",
                type: "POST",
                data: {
                    //"judul": $('#judul_kegiatan').val()
                },
                dataType: "JSON",
                success: function(data) {
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.acckel+"'>"+v.kelompok+"</option>";
                    $(rows).appendTo("#list_kel2");
                });
            }
        });
    }

    function set_responsive_akun_bb(){

        if (layar == 'big') {
            rows = "<th><?php echo $this->lang->line('akun_kelompok')?></th><th><?php echo $this->lang->line('akun_buku_besar')?></th><th><?php echo $this->lang->line('nama_akun_buku_besar')?></th><th>Action</th>";
            $(rows).appendTo("#thead_bb");
        }
        else{
            rows = "<th><?php echo $this->lang->line('akun_kelompok')?></th><th><?php echo $this->lang->line('akun_buku_besar')?></th><th><?php echo $this->lang->line('nama_akun_buku_besar')?></th><th>Action</th>";
            $(rows).appendTo("#thead_bb");
        }
    }


    function load_table_akun_bb(){
        table_akun_bb = $('#table_akun_bb').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_akun_bb')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.kelompok = $('#list_kel2').val();
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

    function reload_table_akun_bb(){
        table_akun_bb.ajax.reload(null, false);
    }

    
    function tambah_bb() {
        $('#btn_tambah_bb').show();
        $('#btn_update_bb').hide();
        $('#tambah_bb').modal('show');
        $('#content_bb').empty();

        $('#title_tambah_bb').text('<?php echo $this->lang->line('tambah_akun_buku_besar')?>');
            $.ajax({
                url : "<?php echo site_url('Administrator/get_content')?>",
                type: "POST",
                data: { 
                  "page" : 'Tambah_akun_bb'
                },
                dataType: "html",
                success: function(data)
                {
                    $('#content_bb').html(data);
                    
                },
                
            });  
    }


    function tambah_akun_bb(){
            $("#form_akun_bb").bootstrapValidator('validate');
            if($('#form_akun_bb').data('bootstrapValidator').isValid()){

                    $.ajax({
                        url: "<?php echo site_url('Administrator/tambah_akun_bb')?>",
                        type: "POST",
                        data: {
                            "nama_akun_bb": $('#nama_akun_bb').val(), "id_kel" : $('#list_kel_bb').val() 
                        },
                        dataType: "JSON",
                        success: function(data) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_buku_besar_telah_ditambahkan')?>", "success");
                            reload_table_akun_bb();
                            $('#tambah_bb').modal('hide');
                        }
                    });
            }        
    }



    function hapus_bb(id){
            swal({
                    title: '<?php echo $this->lang->line('hapus_akun_buku_besar')?>?',
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
                    url : "<?php echo site_url('Administrator/hapus_bb')?>",
                    type: "POST",
                    data: { 
                      "id" : id 
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        reload_table_akun_bb();
                        
                    },
                    
                });     
                
                swal({
                    title: '<?php echo $this->lang->line('sukses')?>',
                    text: '<?php echo $this->lang->line('akun_buku_besar_terhapus')?>',
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


    function preview_bb(id) {
        tambah_bb();
        $('#title_tambah_bb').text('<?php echo $this->lang->line('edit_akun_buku_besar')?>');
        $('#btn_tambah_bb').hide();
        $('#btn_update_bb').show();
            $.ajax({
                url : "<?php echo site_url('Administrator/preview_bb')?>",
                type: "POST",
                data: { 
                  "id" : id
                },
                dataType: "JSON",
                success: function(data)
                {
                    
                    $('#nama_akun_bb').val(data.bukubesar);
                    $('#id_akun_bb').val(data.accbb);
                    
                    var acc_kel = data.acckel;

                    $('#list_kel_bb').empty();
                        $.ajax({
                            url: "<?php echo site_url('Administrator/get_list_kel')?>",
                            type: "POST",
                            data: {
                                //"judul": $('#judul_kegiatan').val()
                            },
                            dataType: "JSON",
                            success: function(data) {
                            $.each(data, function(k, v) {
                                if (acc_kel == v.acckel) {
                                    rows ="<option selected='' value='"+v.acckel+"'>"+v.kelompok+"</option>";
                                    $(rows).appendTo("#list_kel_bb");
                                }
                            });
                        }
                    });

                    $('#list_kel_bb').attr('disabled', true);

                },
                
            });  
    }



    $('#btn_update_bb').on('click', function(){
            $("#form_akun_bb").bootstrapValidator('validate');
            if($('#form_akun_bb').data('bootstrapValidator').isValid()){

                    $.ajax({
                        url: "<?php echo site_url('Administrator/edit_akun_bb')?>",
                        type: "POST",
                        data: {
                            "nama_akun_bb": $('#nama_akun_bb').val(), "id_akun_bb" : $('#id_akun_bb').val() 
                        },
                        dataType: "JSON",
                        success: function(data) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_buku_besar_diperbarui')?>", "success");
                            reload_table_akun_bb();
                            $('#tambah_bb').modal('hide');
                        }
                    });
            }        
    });


</script>