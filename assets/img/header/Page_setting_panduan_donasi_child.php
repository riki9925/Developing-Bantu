                            <div class="card" style="border-radius: 0px" >
                                <div class="card-content" style="padding-top: 0px; padding-right: 0px; padding-left: 0px">
                                    

                                    <form nctype="multipart/form-data" accept-charset="utf-8" class="form form-horizontal" method="" action="" id="form_set_page" name="form_set_page">
                                        
                                        <div  class="fileinput fileinput-new" style="width: 100%; margin-top: 0px" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%; background-color: aliceblue">
                                                        <img id="img_exist_set_page" src="<?php echo base_url()?>assets/img/donasi_online.jpg" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                </div>
                                                <div class="col-xs-12">
                                                    <div class="alert alert-warning" id="img_set_page_kosong" hidden="">
                                                        <span>
                                                            <b> INFORMASI - </b> Anda belum memilih foto</span>
                                                    </div>
                                                    <div style="padding: 10px">
                                                        <span class="btn btn-info btn-round btn-file">

                                                            <span  class="fileinput-new"><i class="material-icons">camera_alt</i> Pilih</span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> Ganti</span>
                                                            <input type="file" id="wizard-picture_set_page" name="wizard-picture_set_page" />
                                                        </span>
                                                        <a id="btn_delete_img" href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-xs-12">
                                            <hr style="margin-left: -15px; margin-right: -15px">
                                            <h4><i class="material-icons" style="color: #4fc143">text_fields</i> Judul halaman</h4>
                                            <div class="form-group label-floating">
                                                
                                                <div>
                                                    <input id="judul_page" name="judul_page" minlength="10" class="form-control" placeholder="Tulis judul"></input>
                                                </div>
                                            </div>



                                            <hr style="margin-left: -15px; margin-right: -15px">
                                            <h4><i class="material-icons" style="color: #4fc143">text_fields</i> Deskripsi halaman</h4>

                                            <div class="form-group label-floating">
                                                
                                                <div>
                                                    <textarea id="deskripsi_page" name="deskripsi_page" minlength="30" class="form-control" placeholder="Tulis deskripsi" rows="6"></textarea>
                                                </div>
                                            </div>
                                        </div>

                                        
                                    </form>

                                    <div class="col-xs-12">
                                    <button id="btn_update_set_page"  class="btn btn-fill btn-success pull-right">Simpan </button>
                                    </div>
                                   
                                    
                                </div>
                            </div>

<script type="text/javascript">
    $(document).ready(function() {
        //validasi form tambah kegiatan
        $('#form_set_page').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                deskripsi_page: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Tulis deskripsi'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9,.?! ]*$/,
                            message: 'Isi dengan huruf atau angka'
                        }
                    }
                },
                judul_page: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Tulis judul'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9,. ]*$/,
                            message: 'Isi dengan huruf atau angka'
                        }
                    }
                }
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });

    });



    $('#btn_update_set_page').on('click', function(){
        $("#form_set_page").bootstrapValidator('validate');
        if($('#form_set_page').data('bootstrapValidator').isValid()){
            

                $.ajax({
                    url: "<?php echo site_url('Administrator/update_halaman')?>",
                    type: "POST",
                    data: {
                        "deskripsi": $('#deskripsi_page').val(),
                        "judul": $('#judul_page').val(),
                        "id" : page_setting,
                    },
                    dataType: "JSON",
                    success: function(data) {

                            detil_set_page(page_setting);
                        
                        upload_foto_panduan_donasi(page_setting);
                        swal("Sukses", "Halaman telah diperbarui", "success");
                        
                    }
                });

        }
    });


    


    // function upload_foto_panduan_donasi(id) {
    //             var file_data = $('#wizard-picture_set_page').prop('files')[0];
                    
    //                 var form_data = new FormData();
    //                 form_data.append('wizard-picture_set_page', file_data);
    //                 $.ajax({
    //                     url: "<?php echo site_url('Administrator/upload_foto_set_page')?>/"+id, 
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



    function upload_foto_panduan_donasi(id) {
                var send = id+":"+"header"+":wizard-picture_set_page";
                    $.ajax({
                        url: "<?php echo site_url('Administrator/upload')?>/" + send,
                        type: 'POST',
                        data: new FormData($('#form_set_page')[0]),
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(data) {
                            //get_content('Jaringan_global');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                        }
                    });
    }



</script>