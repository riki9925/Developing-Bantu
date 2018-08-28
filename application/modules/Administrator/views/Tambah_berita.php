
                <div class="container-fluid" >
                
                    <div class="col-sm-8 col-sm-offset-2">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">add</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title" id="title_tambah_berita"><?php echo $this->lang->line('tambah_berita')?></h4>
                                    
                                    <form enctype="multipart/form-data" accept-charset="utf-8" class="form form-horizontal" method="" action="" id="form_tambah_berita">
                                        
                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('judul')?></div>
                                            <div class="col-md-8">
                                                <input maxlength="30" type="text" class="form-control" id="judul_berita" name="judul_berita">
                                            </div>
                                        </div>


                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('deskripsi')?></div>
                                            <div class="col-md-8">
                                                <textarea id="deskripsi_berita" name="deskripsi_berita" minlength="30" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>
                                            
                                        
                                            
                                        <input id="id_berita" hidden="" disabled="" name="">


                                        <div class="row" style="margin-top: 20px">
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('gambar_berita')?></p></div>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" style="width: 100%" data-provides="fileinput">


                                                        <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                            <img id="foto_exist_berita" src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                        </div>

                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                        
                                                        <div class="alert alert-warning" id="img_berita_kosong" hidden="">
                                                        <span>
                                                            <b> <?php echo $this->lang->line('informasi')?> - </b> <?php echo $this->lang->line('anda_belum_memilih_foto')?></span>
                                                        </div>

                                                        <span class="btn btn-info btn-round btn-file" id="btn_upload_foto_berita">
                                                            <span class="fileinput-new"><i class="material-icons">camera_alt</i> <?php echo $this->lang->line('pilih')?></span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> <?php echo $this->lang->line('ganti')?></span>
                                                            <input type="file" id="wizard-picture_berita" name="wizard-picture_berita" />
                                                        </span>
                                                        <a id="btn_delete_berita" href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> <?php echo $this->lang->line('hapus')?></a>

                                                    </div>
                                                </div>
                                        </div>

                                        <hr>
                                    
                                    </form>

                                    <div class="row">
                                        <div class="col-sm-3">
                                            <button onclick="get_content('Posting_berita')" class="btn btn-fill btn-info pull-left"><?php echo $this->lang->line('kembali')?></button>
                                        </div>
                                        <div class="col-sm-9">
                                            <button id="btn_tambah_berita" onclick="tambah_berita()" hidden="" class="btn btn-fill btn-success pull-right"><?php echo $this->lang->line('tambah_berita')?></button>
                                            
                                            <button id="btn_edit_berita" hidden="" onclick="update_berita('perbarui')" class="btn btn-fill btn-success pull-right"><?php echo $this->lang->line('perbarui_berita')?></button>

                                            <button id="btn_aktifkan_berita" hidden="" onclick="update_berita('aktifkan')"  class="btn btn-fill btn-success pull-right"><?php echo $this->lang->line('aktifkan_berita')?></button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        
                    </div>


                </div>



<script type="text/javascript">

    $(document).ready(function() {
        
        $('#form_tambah_berita').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                judul_berita: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_judul')?>'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
                        }
                    }
                },
                deskripsi_berita: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
                        }
                    }
                }               
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });

        if ( action_berita == 'add') {
            $('#deskripsi_berita').attr('disabled', false);
            $('#judul_berita').attr('disabled', false);
            $('#btn_tambah_berita').show();
            $('#btn_edit_berita').hide();
            $('#btn_aktifkan_berita').hide();
            $('#btn_upload_foto_berita').show();
            
        }
        else if (action_berita == 'aktifkan') {
            $('#deskripsi_berita').attr('disabled', true);
            $('#judul_berita').attr('disabled', true);
            $('#btn_tambah_berita').hide();
            $('#btn_edit_berita').hide();
            $('#btn_aktifkan_berita').show();
            $('#btn_upload_foto_berita').hide();
            detil_berita(id_berita);
        }
        else if (action_berita == 'edit') {
            $('#deskripsi_berita').attr('disabled', false);
            $('#judul_berita').attr('disabled', false);
            $('#btn_tambah_berita').hide();
            $('#btn_edit_berita').show();
            $('#btn_aktifkan_berita').hide();
            $('#btn_upload_foto_berita').show();
            detil_berita(id_berita);
        }
        
    });



    function tambah_berita(){
        $("#form_tambah_berita").bootstrapValidator('validate');
        if($('#form_tambah_berita').data('bootstrapValidator').isValid()){
            if ($('#wizard-picture_berita').val() != "") {
                $('#img_berita_kosong').hide();
                $.ajax({
                    url : "<?php echo site_url('Administrator/tambah_berita')?>",
                    type: "POST",
                    data: { 
                        "judul" : $('#judul_berita').val(), "deskripsi" : $('#deskripsi_berita').val(), 
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        
                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('berita_baru_telah_ditambahkan')?>", "success");
                        upload_foto_berita(data.id_berita);
                    },
                });
            }
            else{
                $('#img_berita_kosong').show();
            }
        }
    }



    function upload_foto_berita(id) {
                var send = id+":"+"berita"+":wizard-picture_berita";
                    $.ajax({
                        url: "<?php echo site_url('Administrator/upload')?>/" + send,
                        type: 'POST',
                        data: new FormData($('#form_tambah_berita')[0]),
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(data) {
                            get_content('Posting_berita');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                        }
                    });
    }



    function detil_berita(id){
        $.ajax({
                    url : "<?php echo site_url('Administrator/detil_berita')?>",
                    type: "POST",
                    data: { 
                        id:id, 
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#judul_berita').val(data.judul);
                        $('#deskripsi_berita').val(data.deskripsi);
                        
                        $('#foto_exist_berita').attr('src', '<?php echo base_url()?>assets/img/berita/'+data.img); 
                    },
                });
    }


    function update_berita(jenis_update){

        $.ajax({
            url : "<?php echo site_url('Administrator/update_berita')?>",
            type: "POST",
            data: { 
                id : id_berita, judul : $('#judul_berita').val(), deskripsi : $('#deskripsi_berita').val() , jenis_update : jenis_update
            },
            dataType: "JSON",
            success: function(data)
            {
                if (action_berita == 'edit') {
                    upload_foto_berita(id_berita);
                    swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('berita_telah_diperbarui')?>", "success");
                }
                else{
                    swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('berita_telah_diaktifkan')?>", "success");
                    get_content('Posting_berita');
                }
                
            },  
        });
    }






    
    
</script>