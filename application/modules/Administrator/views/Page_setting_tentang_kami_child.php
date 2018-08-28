<div class="card" style="border-radius: 0px">
                                
                                <div class="card-content" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                                    
                              

                                    <form enctype="multipart/form-data" accept-charset="utf-8" class="form form-horizontal" method="" action="" id="form_tentang_kami" name="form_tentang_kami">
                                        <div  class="fileinput fileinput-new" style="width: 100%; margin-top: 0px" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%; background-color: aliceblue">
                                                        <img id="img_exist_set_page_2" src="<?php echo base_url()?>assets/img/donasi_online.jpg" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="alert alert-warning" id="" hidden="">
                                                        <span>
                                                            <b> <?php echo $this->lang->line('informasi')?> - </b> <?php echo $this->lang->line('anda_belum_memilih_foto')?></span>
                                                    </div>
                                                    <div style="padding: 10px">
                                                        <span class="btn btn-info btn-round btn-file">

                                                            <span  class="fileinput-new"><i class="material-icons">camera_alt</i> <?php echo $this->lang->line('pilih')?></span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> <?php echo $this->lang->line('ganti')?></span>
                                                            <input type="file" id="wizard-picture_tentang_kami" name="wizard-picture_tentang_kami" />
                                                        </span>

                                                        <a id="btn_delete_img" href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> <?php echo $this->lang->line('hapus')?></a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                        <hr style="margin-left: -15px; margin-right: -15px">
                                        <h4><i class="material-icons" style="color: #4fc143">text_fields</i> <?php echo $this->lang->line('judul')?></h4>
                                        <div class="form-group label-floating">
                                                
                                                <div>
                                                    <input id="judul_page_2" name="judul_page_2" minlength="10" class="form-control" placeholder="<?php echo $this->lang->line('tulis_judul')?>"></input>
                                                </div>
                                        </div>



                                        <hr style="margin-left: -15px; margin-right: -15px">
                                        <h4><?php echo $this->lang->line('deskripsi')?></h4>

                                        <div class="form-group label-floating">
                                            
                                            <div>
                                                <textarea id="deskripsi_page_2" name="deskripsi_page_2" minlength="30" class="form-control" placeholder="<?php echo $this->lang->line('tulis_deskripsi')?>" rows="6"></textarea>
                                            </div>
                                        </div>
                                        </div>

                                        
                                    </form>

                                    <div class="col-xs-12">
                                    <button id="btn_update_tentang_kami"  class="btn btn-fill btn-success pull-right">Simpan</button>
                                    </div>
                                   
                                    
                                </div>
                            </div>


<script type="text/javascript">
    $(document).ready(function() {
        //validasi form tambah kegiatan
        $('#form_tentang_kami').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                deskripsi_page_2: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_deskripsi')?>'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9,.?! ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
                        }
                    }
                },
                judul_page_2: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_judul')?>'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9,. ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
                        }
                    }
                } 
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    });




    $('#btn_update_tentang_kami').on('click', function(){
        $("#form_tentang_kami").bootstrapValidator('validate');
        if($('#form_tentang_kami').data('bootstrapValidator').isValid()){
            
            
                $.ajax({
                    url: "<?php echo site_url('Administrator/update_halaman')?>",
                    type: "POST",
                    data: {
                        
                        "deskripsi": $('#deskripsi_page_2').val(),
                        "judul": $('#judul_page_2').val(),
                        "id" : page_tentang_kami,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        
                        
                        upload_foto_tentang_kami(page_tentang_kami);
                        
                        
                    }
                });
            // }
            // else{
            //     $('#img_jaringan_g_kosong').show();
            // }
        }
    });




    function upload_foto_tentang_kami(id) {
                var send = id+":"+"header"+":wizard-picture_tentang_kami";
                    $.ajax({
                        url: "<?php echo site_url('Administrator/upload')?>/" + send,
                        type: 'POST',
                        data: new FormData($('#form_tentang_kami')[0]),
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(data) {
                            detil_set_page2(page_tentang_kami);
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('halaman_telah_diperbarui')?>", "success");
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                        }
                    });
    }
    


    // function upload_foto_tentang_kami(id) {

    //             var file_data = $('#wizard-picture_tentang_kami').prop('files')[0];
                    
    //                 var form_data = new FormData();
    //                 form_data.append('wizard-picture_tentang_kami', file_data);
    //                 $.ajax({
    //                     url: "<?php echo site_url('Administrator/upload_foto_tentang_kami')?>/"+id, 
    //                     dataType: 'text', 
    //                     cache: false,
    //                     contentType: false,
    //                     processData: false,
    //                     data: form_data,
    //                     type: 'post',
    //                     success: function (response) {
                            
                            
    //                     },
    //                     error: function (response) {
    //                         swal("Informasi", response)
    //                     }
    //             });
    // }
    
</script>