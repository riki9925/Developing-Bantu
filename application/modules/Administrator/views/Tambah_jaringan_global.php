
                <div class="container-fluid" >
                
                    <div class="col-sm-8 col-sm-offset-2">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">add</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title" id="title_jaringan_g"><?php echo $this->lang->line('tambah_jaringan_global')?></h4>
                                    
                                    <form nctype="multipart/form-data" accept-charset="utf-8" class="form form-horizontal" method="" action="" id="form_jaringan_g">
                                        
                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('judul')?></div>
                                            <div class="col-md-8">
                                                <input maxlength="30" type="text" class="form-control" id="judul_jaringan_g" name="judul_jaringan_g">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('pilih_kategori')?></div>
                                            <div class="col-md-8">
                                                <select name="kategori_jaringan_g" id="kategori_jaringan_g" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('provinsi')?></div>
                                            <div class="col-md-8">
                                                <select onchange="get_kota_jaringan_g()" name="provinsi_jaringan_g" id="provinsi_jaringan_g" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('kota')?></div>
                                            <div class="col-md-8">
                                                <select name="kota_jaringan_g" id="kota_jaringan_g" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('tulis_target_dana')?> (Rp.)</div>
                                            <div class="col-md-8">
                                                <input id="target_dana_jaringan_g" name="target_dana_jaringan_g" placeholder="Rp. 0" class="form-control" type="digit" onchange="change_format('target_dana_jaringan_g')">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('tulis_jangka_waktu')?> (<?php echo $this->lang->line('hari')?>)</div>
                                            <div class="col-md-8">
                                                <input id="jangka_waktu_jaringan_g" name="jangka_waktu_jaringan_g" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('deskripsi')?></div>
                                            <div class="col-md-8">
                                                <textarea id="deskripsi_jaringan_g" name="deskripsi_jaringan_g" minlength="30" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                                                              
                                    
                                        <div  class="fileinput fileinput-new" style="width: 100%; margin-top: 15px" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                        <img id="img_exist_jaringan_g" src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="alert alert-warning" id="img_jaringan_g_kosong" hidden="">
                                                        <span>
                                                            <b> <?php echo $this->lang->line('informasi')?> - </b> <?php echo $this->lang->line('anda_belum_memilih_foto')?></span>
                                                    </div>
                                                    <div id="upload_img_jaringan_g">
                                                        <span class="btn btn-info btn-round btn-file">

                                                            <span  class="fileinput-new"><i class="material-icons">camera_alt</i> <?php echo $this->lang->line('pilih')?></span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> <?php echo $this->lang->line('ganti')?></span>
                                                            <input type="file" id="wizard-picture_jaringan_g" name="wizard-picture_jaringan_g" />
                                                        </span>
                                                        <a id="btn_delete_img" href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> <?php echo $this->lang->line('hapus')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <div class="form-group label-floating" id="note_penutupan_jaringan_g" hidden="">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('catatan_penutupan_jaringan_global')?></div>
                                            <div class="col-md-8">
                                                <textarea id="note_jaringan_g" name="note_jaringan_g" minlength="30" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <hr>

                                        </div>
                                    </form>

                                    <button onclick="get_content('Jaringan_global')" class="btn btn-fill btn-info pull-left"><?php echo $this->lang->line('kembali')?></button>
                                    
                                    <button id="btn_save_jaringan_g" hidden="" class="btn btn-fill btn-success pull-right"><?php echo $this->lang->line('tambah_jaringan_global')?> </button>
                                    
                                    <button id="btn_update_jaringan_g" hidden="" class="btn btn-fill btn-success pull-right"><?php echo $this->lang->line('perbarui')?> </button>
                                    <button id="btn_aktifkan_jaringan_g" hidden="" class="btn btn-fill btn-info pull-right"><?php echo $this->lang->line('aktifkan')?> </button>
                                    <button id="btn_stop_jaringan_g" hidden="" class="btn btn-fill btn-danger pull-right"><?php echo $this->lang->line('tutup')?></button>
                                    
                                </div>
                            </div>
                        
                    </div>


                </div>



<script type="text/javascript">

    $(document).ready(function() {
        load_kategori_jaringan_g();

        //validasi form tambah kegiatan
        $('#form_jaringan_g').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                judul_jaringan_g: {
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
                kategori_jaringan_g: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_kategori')?>'
                        }
                    }
                },
                provinsi_jaringan_g: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_provinsi')?>'
                        }
                    }
                },
                kota_jaringan_g: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_kota')?>'
                        }
                    }
                },
                target_dana_jaringan_g: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_target_dana')?>'
                        },
                        regexp: {
                            regexp: /^[0-9, ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_angka')?>'
                        }
                    }
                },
                jangka_waktu_jaringan_g: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_jangka_waktu')?>'
                        },
                        regexp: {
                            regexp: /^[0-9 ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_angka')?>'
                        }
                    }
                },
                
                deskripsi_jaringan_g: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_deskripsi')?>'
                        }
                        ,regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
                        }
                    }
                }
                
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });

        detil_jaringan_g(action_jaringan_g);
        
    });


    $('#btn_save_jaringan_g').on('click', function(){
        $("#form_jaringan_g").bootstrapValidator('validate');
        if($('#form_jaringan_g').data('bootstrapValidator').isValid()){
  
            if ($('#wizard-picture_jaringan_g').val() != "") {
                $('#img_jaringan_g_kosong').hide();
                $.ajax({
                    url: "<?php echo site_url('Administrator/tambah_jaringan_g')?>",
                    type: "POST",
                    data: {
                        "judul": $('#judul_jaringan_g').val(),
                        "kategori": $('#kategori_jaringan_g').val(),
                        "target_dana": $('#target_dana_jaringan_g').val().replace(/,/g , ''),
                        "jangka_waktu": $('#jangka_waktu_jaringan_g').val(),
                        "deskripsi": $('#deskripsi_jaringan_g').val(),
                        "provinsi": $('#provinsi_jaringan_g').val(),
                        "kota": $('#kota_jaringan_g').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("Sukses", "<?php echo $this->lang->line('program_jaringan_global_telah_dibuat')?>", "success");
                        upload_foto_jaringan(data.id);
                        
                    }
                });
            }
            else{
                $('#img_jaringan_g_kosong').show();
            }
        }
    });


    $('#btn_update_jaringan_g').on('click', function(){
        $("#form_jaringan_g").bootstrapValidator('validate');
        if($('#form_jaringan_g').data('bootstrapValidator').isValid()){
            
            //alert($('#wizard-picture_jaringan_g').val());

            //if ($('#wizard-picture_jaringan_g').val() != "") {
                $('#img_jaringan_g_kosong').hide();
                $.ajax({
                    url: "<?php echo site_url('Administrator/update_jaringan_g')?>",
                    type: "POST",
                    data: {
                        "judul": $('#judul_jaringan_g').val(),
                        "kategori": $('#kategori_jaringan_g').val(),
                        "target_dana": $('#target_dana_jaringan_g').val().replace(/,/g , ''),
                        "jangka_waktu": $('#jangka_waktu_jaringan_g').val(),
                        "deskripsi": $('#deskripsi_jaringan_g').val(),
                        "provinsi": $('#provinsi_jaringan_g').val(),
                        "kota": $('#kota_jaringan_g').val(),
                        "id_jaringan_g" : id_jaringan_g,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('draft_jaringan_global_telah_diperbarui')?>", "success");
                        upload_foto_jaringan(id_jaringan_g);
                        
                    }
                });
           
        }
    });


    $('#btn_stop_jaringan_g').on('click', function(){
                $.ajax({
                    url: "<?php echo site_url('Administrator/stop_jaringan_g')?>",
                    type: "POST",
                    data: {
                        "id" : id_jaringan_g,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('program_jaringan_global_telah_dihentikan')?>", "success");
                        get_content('Jaringan_global');
                    }
                });
    });
    

    $('#btn_aktifkan_jaringan_g').on('click', function(){
                $.ajax({
                    url: "<?php echo site_url('Administrator/aktifkan_jaringan_g')?>",
                    type: "POST",
                    data: {
                        "id_jaringan_g" : id_jaringan_g,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('program_jaringan_global_telah_diaktifkan')?>", "success");
                        get_content('Jaringan_global');
                    }
                });
    });


    function load_kategori_jaringan_g(){
        $('#kategori_jaringan_g').empty();
        $('#kategori_jaringan_g').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Administrator/get_kategori')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                    $(rows).appendTo("#kategori_jaringan_g");
                });
                
            }
        });

        $('#provinsi_jaringan_g').empty();
        $('#provinsi_jaringan_g').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Administrator/load_provinsi')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                    $(rows).appendTo("#provinsi_jaringan_g");
                });
                
            }
        });
    }

    function get_kota_jaringan_g(){
        $('#kota_jaringan_g').empty();
        $('#kota_jaringan_g').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Administrator/load_kota')?>",
            type: "POST",
            data: {
                "id": $('#provinsi_jaringan_g').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                    $(rows).appendTo("#kota_jaringan_g");
                });
                
            }
        });
    }



    function upload_foto_jaringan(id) {
                var send = id+":"+"jaringan_global"+":wizard-picture_jaringan_g";
                    $.ajax({
                        url: "<?php echo site_url('Administrator/upload')?>/" + send,
                        type: 'POST',
                        data: new FormData($('#form_jaringan_g')[0]),
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(data) {
                            get_content('Jaringan_global');
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                        }
                    });
    }

    // function upload_foto_jaringan(id) {

        
    //             var file_data = $('#wizard-picture_jaringan_g').prop('files')[0];
                    
    //                 var form_data = new FormData();
    //                 form_data.append('wizard-picture_jaringan_g', file_data);
    //                 $.ajax({
    //                     url: "<?php echo site_url('Administrator/upload_foto_jaringan')?>/"+id, 
    //                     dataType: 'text', 
    //                     cache: false,
    //                     contentType: false,
    //                     processData: false,
    //                     data: form_data,
    //                     type: 'post',
    //                     success: function (response) {
                            
    //                         get_content('Jaringan_global');
    //                     },
    //                     error: function (response) {
    //                         swal("Informasi", response)
    //                     }
    //             });
    // }

    function detil_jaringan_g(action){
        if (action == 'draft') {
            $('#btn_save_jaringan_g').hide();
            $('#btn_update_jaringan_g').show();
            $('#btn_stop_jaringan_g').hide();
            $('#btn_aktifkan_jaringan_g').show();

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_jaringan_g')?>",
                type: "POST",
                data: { 
                    "id" : id_jaringan_g
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_jaringan_g').val(data.judul);

                    $('#deskripsi_jaringan_g').val(data.deskripsi); 
                    $('#img_exist_jaringan_g').empty();   
                    $('#img_exist_jaringan_g').attr('src', '<?php echo base_url()?>assets/img/jaringan_global/'+data.gambar_utama); 


                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori jaringan_g 
                    $('#kategori_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/get_kategori')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            
                            $.each(data, function(k, v) {
                                if (v.id_kategori == kategori) {
                                    rows ="<option selected='' value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }else{
                                    rows ="<option value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }
                                $(rows).appendTo("#kategori_jaringan_g");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/load_provinsi')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (v.id == provinsi) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }
                                $(rows).appendTo("#provinsi_jaringan_g");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/load_kota')?>",
                        type: "POST",
                        data: {
                            "id": provinsi
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (data.id == kota) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }
                                $(rows).appendTo("#kota_jaringan_g");
                            });
                            
                        }
                    });

                    $('#target_dana_jaringan_g').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_jaringan_g').val(data.target_hari);
                },
            });
        }
        else if (action == 'add') {
            $('#btn_save_jaringan_g').show();
            $('#btn_update_jaringan_g').hide();
            $('#btn_stop_jaringan_g').hide();
            $('#btn_aktifkan_jaringan_g').hide();
        }
        else if (action == 'selesai') {
            
            $('#title_jaringan_g').text('<?php echo $this->lang->line('detil_jaringan_global')?>');
            $('#btn_save_jaringan_g').hide();
            $('#btn_update_jaringan_g').hide();
            $('#upload_img_jaringan_g').hide();
            $('#btn_stop_jaringan_g').hide();
            $('#btn_aktifkan_jaringan_g').hide();

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_jaringan_g')?>",
                type: "POST",
                data: { 
                    "id" : id_jaringan_g
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_jaringan_g').val(data.judul);

                    $('#deskripsi_jaringan_g').val(data.deskripsi); 
                    $('#img_exist_jaringan_g').empty();   
                    $('#img_exist_jaringan_g').attr('src', '<?php echo base_url()?>assets/img/jaringan_global/'+data.gambar_utama); 


                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori jaringan_g 
                    $('#kategori_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/get_kategori')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            
                            $.each(data, function(k, v) {
                                if (v.id_kategori == kategori) {
                                    rows ="<option selected='' value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }else{
                                    rows ="<option value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }
                                $(rows).appendTo("#kategori_jaringan_g");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/load_provinsi')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (v.id == provinsi) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }
                                $(rows).appendTo("#provinsi_jaringan_g");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/load_kota')?>",
                        type: "POST",
                        data: {
                            "id": provinsi
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (data.id == kota) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }
                                $(rows).appendTo("#kota_jaringan_g");
                            });
                            
                        }
                    });

                    $('#target_dana_jaringan_g').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_jaringan_g').val(data.target_hari);
                },
            });
        }
        else if (action == 'live') {
            
            $('#title_jaringan_g').text('Detil jaringan global');
            $('#btn_save_jaringan_g').hide();
            $('#btn_update_jaringan_g').hide();
            $('#upload_img_jaringan_g').hide();
            $('#btn_stop_jaringan_g').show();
            $('#btn_aktifkan_jaringan_g').hide();

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_jaringan_g')?>",
                type: "POST",
                data: { 
                    "id" : id_jaringan_g
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_jaringan_g').val(data.judul);

                    $('#deskripsi_jaringan_g').val(data.deskripsi); 
                    $('#img_exist_jaringan_g').empty();   
                    $('#img_exist_jaringan_g').attr('src', '<?php echo base_url()?>assets/img/jaringan_global/'+data.gambar_utama); 


                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori jaringan_g 
                    $('#kategori_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/get_kategori')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            
                            $.each(data, function(k, v) {
                                if (v.id_kategori == kategori) {
                                    rows ="<option selected='' value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }else{
                                    rows ="<option value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }
                                $(rows).appendTo("#kategori_jaringan_g");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/load_provinsi')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (v.id == provinsi) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }
                                $(rows).appendTo("#provinsi_jaringan_g");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Administrator/load_kota')?>",
                        type: "POST",
                        data: {
                            "id": provinsi
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (data.id == kota) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }
                                $(rows).appendTo("#kota_jaringan_g");
                            });
                            
                        }
                    });

                    $('#target_dana_jaringan_g').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_jaringan_g').val(data.target_hari);
                },
            });
        }
        
    }
</script>