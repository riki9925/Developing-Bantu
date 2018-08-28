                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('akun_subbuku_besar')?></h4>
                                    <div class="toolbar">

                                        <div class="row" style="background-color: #ecf0f1; margin-right: 10px; margin-left: 10px">
                                            <div class="col-md-3" style="border-right: 1px solid white">
                                                <button  onclick="tambah_sbb()" class="btn btn-success">
                                                    <span class="btn-label">
                                                        <i class="material-icons">add</i>
                                                    </span>
                                                    <?php echo $this->lang->line('tambah')?> 
                                                <div class="ripple-container"></div></button>
                                            </div>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating" name="div_form">
                                                    <div class="col-md-4" align="left">Akun buku besar</div>
                                                    <div class="col-md-8">
                                                        <select onchange="reload_table_akun_sbb()" name="list_bb2" id="list_bb2" class="form-control">
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_akun_sbb" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_sbb">
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>




<script type="text/javascript">
    var table_akun_sbb;
    $(document).ready(function() {
        load_akun_bb();
        set_responsive_akun_sbb();
        load_table_akun_sbb();
    });


    function load_akun_bb() {
        $('#list_bb2').empty();
        $('#list_bb2').append('<option value="Semua" selected="selected"><?php echo $this->lang->line('semua')?></option>');
            $.ajax({
                url: "<?php echo site_url('Administrator/get_list_bb')?>",
                type: "POST",
                data: {
                    //"judul": $('#judul_kegiatan').val()
                },
                dataType: "JSON",
                success: function(data) {
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.accbb+"'>"+v.accbb+" - "+v.bukubesar+"</option>";
                    $(rows).appendTo("#list_bb2");
                });
            }
        });
    }

    function set_responsive_akun_sbb(){
        if (layar == 'big') {
            rows = "<th><?php echo $this->lang->line('akun_buku_besar')?></th><th><?php echo $this->lang->line('akun_subbuku_besar')?></th><th><?php echo $this->lang->line('keterangan')?></th><th>Action</th>";
            $(rows).appendTo("#thead_sbb");
        }
        else{
            rows = "<th><?php echo $this->lang->line('akun_buku_besar')?></th><th><?php echo $this->lang->line('akun_subbuku_besar')?></th><th><?php echo $this->lang->line('keterangan')?></th><th>Action</th>";
            $(rows).appendTo("#thead_sbb");
        }
    }


    function load_table_akun_sbb(){
        table_akun_sbb = $('#table_akun_sbb').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_akun_sbb')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.bb = $('#list_bb2').val();
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

    function reload_table_akun_sbb(){
        table_akun_sbb.ajax.reload(null, false);
    }


    function tambah_sbb() {
        $('#btn_tambah_sbb').show();
        $('#btn_update_sbb').hide();
        $('#tambah_sbb').modal('show');
        $('#content_sbb').empty();

        $('#title_tambah_sbb').text('<?php echo $this->lang->line('tambah_akun_subbuku_besar')?>');
            $.ajax({
                url : "<?php echo site_url('Administrator/get_content')?>",
                type: "POST",
                data: { 
                  "page" : 'Tambah_akun_sbb'
                },
                dataType: "html",
                success: function(data)
                {
                    $('#content_sbb').html(data);
                    
                },
                
            });  
    }


    $('#btn_tambah_sbb').on('click', function(){
            $("#form_akun_sbb").bootstrapValidator('validate');
            if($('#form_akun_sbb').data('bootstrapValidator').isValid()){

                    $.ajax({
                        url: "<?php echo site_url('Administrator/tambah_akun_sbb')?>",
                        type: "POST",
                        data: {
                            "nama_akun_sbb": $('#nama_akun_sbb').val(), "id_bb" : $('#list_bb').val() 
                        },
                        dataType: "JSON",
                        success: function(data) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_subbuku_besar_ditambahkan')?>", "success");
                            reload_table_akun_sbb();
                            $('#tambah_sbb').modal('hide');
                        }
                    });
            }        
    });


    function hapus_sbb(id){
            swal({
                    title: '<?php echo $this->lang->line('hapus_akun_subbuku_besar')?>?',
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
                    url : "<?php echo site_url('Administrator/hapus_sbb')?>",
                    type: "POST",
                    data: { 
                      "id" : id 
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        reload_table_akun_sbb();
                    },
                    
                });     
                
                swal({
                    title: '<?php echo $this->lang->line('sukses')?>',
                    text: '<?php echo $this->lang->line('akun_subbuku_besar_terhapus')?>',
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


    function preview_sbb(id) {
        tambah_sbb();
        $('#title_tambah_sbb').text('<?php echo $this->lang->line('edit_akun_subbuku_besar')?>');
        $('#btn_tambah_sbb').hide();
        $('#btn_update_sbb').show();
            $.ajax({
                url : "<?php echo site_url('Administrator/preview_sbb')?>",
                type: "POST",
                data: { 
                  "id" : id
                },
                dataType: "JSON",
                success: function(data)
                {
                    
                    $('#nama_akun_sbb').val(data.keterangan);
                    $('#id_akun_sbb').val(data.acc);
                    
                    var acc_bb = data.accbb;

                    $('#list_bb').empty();
                        $.ajax({
                            url: "<?php echo site_url('Administrator/get_list_bb')?>",
                            type: "POST",
                            data: {
                                //"judul": $('#judul_kegiatan').val()
                            },
                            dataType: "JSON",
                            success: function(data) {
                            $.each(data, function(k, v) {
                                if (acc_bb == v.accbb) {
                                    rows ="<option selected='' value='"+v.accbb+"'>"+v.accbb+" - "+v.bukubesar+"</option>";
                                    $(rows).appendTo("#list_bb");
                                }
                            });
                        }
                    });

                    $('#list_bb').attr('disabled', true);

                },
                
            });  
    }

    $('#btn_update_sbb').on('click', function(){
            $("#form_akun_sbb").bootstrapValidator('validate');
            if($('#form_akun_sbb').data('bootstrapValidator').isValid()){

                    $.ajax({
                        url: "<?php echo site_url('Administrator/edit_akun_sbb')?>",
                        type: "POST",
                        data: {
                            "nama_akun_sbb": $('#nama_akun_sbb').val(), "id_akun_sbb" : $('#id_akun_sbb').val() 
                        },
                        dataType: "JSON",
                        success: function(data) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('akun_subbuku_besar_diperbarui')?>", "success");
                            reload_table_akun_sbb();
                            $('#tambah_sbb').modal('hide');
                        }
                    });
            }        
    });


</script>