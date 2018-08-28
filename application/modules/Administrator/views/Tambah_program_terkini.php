
                <div class="container-fluid" >
                
                    <div class="col-sm-8 col-sm-offset-2">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">add</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title" id="title_program"><?php echo $this->lang->line('tambah_program_terkini')?></h4>
                                    

                                    <form name="form_tambah_program" class="form form-horizontal" method="" action="" enctype="multipart/form-data" accept-charset="utf-8" id="form_tambah_program">
                                        
                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('judul_program')?></div>
                                            <div class="col-md-8">
                                                <input maxlength="30" type="text" class="form-control" id="judul_program" name="judul_program">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('pilih_kategori')?></div>
                                            <div class="col-md-8">
                                                <select name="kategori_program" id="kategori_program" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('provinsi')?></div>
                                            <div class="col-md-8">
                                                <select onchange="get_kota_program()" name="provinsi_program" id="provinsi_program" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('kota')?></div>
                                            <div class="col-md-8">
                                                <select name="kota_program" id="kota_program" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('tulis_target_dana')?> (Rp.)</div>
                                            <div class="col-md-8">
                                                <input id="target_dana_program" name="target_dana_program" placeholder="Rp. 0" class="form-control" type="digit" onchange="change_format('target_dana_program')">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('jangka_waktu')?> (Hari)</div>
                                            <div class="col-md-8">
                                                <input id="jangka_waktu_program" name="jangka_waktu_program" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('deskripsikan_program_anda')?></div>
                                            <div class="col-md-8">
                                                <textarea id="deskripsi_program" name="deskripsi_program" minlength="30" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                                                              
                                    
                                        <div  class="fileinput fileinput-new" style="width: 100%; margin-top: 15px" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                        <img id="img_exist_program" src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div class="alert alert-warning" id="img_program_kosong" hidden="">
                                                        <span>
                                                            <b> <?php echo $this->lang->line('informasi')?> - </b> <?php echo $this->lang->line('anda_belum_memilih_foto')?></span>
                                                    </div>
                                                    <div id="upload_img_program">
                                                        <span class="btn btn-info btn-round btn-file">

                                                            <span  class="fileinput-new"><i class="material-icons">camera_alt</i> <?php echo $this->lang->line('pilih')?></span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> <?php echo $this->lang->line('ganti')?></span>
                                                            <input type="file" id="wizard-picture_program" name="wizard-picture_program" />
                                                        </span>
                                                        <a id="btn_delete_img" href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> <?php echo $this->lang->line('hapus')?></a>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                        <div class="form-group label-floating" id="note_penutupan" hidden="">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('catatan_penutupan_program')?></div>
                                            <div class="col-md-8">
                                                <textarea id="note_program" name="note_program" minlength="30" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                        <hr>

                                        </div>
                                    </form>

                                    <button onclick="get_content('Program_terkini')" class="btn btn-fill btn-info pull-left"><?php echo $this->lang->line('kembali')?></button>
                                    <button id="btn_save_program" hidden="" class="btn btn-fill btn-success pull-right"><?php echo $this->lang->line('tambah_program_terkini')?></button>
                                    <button id="btn_update_program" hidden="" class="btn btn-fill btn-success pull-right"><?php echo $this->lang->line('perbarui_program')?></button>

                                    <button id="btn_stop_program" hidden="" class="btn btn-fill btn-danger pull-right"><?php echo $this->lang->line('tutup_program')?></button>

                                    <button id="btn_aktifkan_program" hidden="" class="btn btn-fill btn-danger pull-right"><?php echo $this->lang->line('aktifkan_program')?></button>
                                    
                                </div>
                            </div>
                        
                    </div>


                </div>



<script type="text/javascript">

    $(document).ready(function() {
        load_kategori_program();

        //validasi form tambah kegiatan
        $('#form_tambah_program').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                judul_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('judul_program')?>'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: '<?php echo $this->lang->line('tulis_dengan_huruf_atau_angka')?>'
                        }
                    }
                },
                kategori_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_kategori')?>'
                        }
                    }
                },
                provinsi_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_provinsi')?>'
                        }
                    }
                },
                kota_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_kota')?>'
                        }
                    }
                },
                target_dana_program: {
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
                jangka_waktu_program: {
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
                
                deskripsi_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('isi_deskripsi')?>'
                        }
                        ,regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_huruf')?>'
                        }
                    }
                }
                
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });

        detil_program_terkini(action_program_terkini);
        
    });


    $('#btn_save_program').on('click', function(){
        $("#form_tambah_program").bootstrapValidator('validate');
        if($('#form_tambah_program').data('bootstrapValidator').isValid()){
  
            if ($('#wizard-picture_program').val() != "") {
                $('#img_program_kosong').hide();
                $.ajax({
                    url: "<?php echo site_url('Administrator/tambah_program')?>",
                    type: "POST",
                    data: {
                        "judul": $('#judul_program').val(),
                        "kategori": $('#kategori_program').val(),
                        "target_dana": $('#target_dana_program').val().replace(/,/g , ''),
                        "jangka_waktu": $('#jangka_waktu_program').val(),
                        "deskripsi": $('#deskripsi_program').val(),
                        "provinsi": $('#provinsi_program').val(),
                        "kota": $('#kota_program').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("Sukses", "<?php echo $this->lang->line('program_baru_telah_dibuat')?>", "success");
                        upload_foto_kegiatan(data.id);
                        get_content('Program_terkini');
                    }
                });
            }
            else{
                $('#img_program_kosong').show();
            }
        }
    });


    $('#btn_update_program').on('click', function(){
        $("#form_tambah_program").bootstrapValidator('validate');
        if($('#form_tambah_program').data('bootstrapValidator').isValid()){
  
            
                $.ajax({
                    url: "<?php echo site_url('Administrator/update_program_terkini')?>",
                    type: "POST",
                    data: {
                        "judul": $('#judul_program').val(),
                        "kategori": $('#kategori_program').val(),
                        "target_dana": $('#target_dana_program').val().replace(/,/g , ''),
                        "jangka_waktu": $('#jangka_waktu_program').val(),
                        "deskripsi": $('#deskripsi_program').val(),
                        "provinsi": $('#provinsi_program').val(),
                        "kota": $('#kota_program').val(),
                        "id_program" : id_program_terkini,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("Sukses", "<?php echo $this->lang->line('draft_program_telah_diperbarui')?>", "success");
                        upload_foto_kegiatan(id_program_terkini);
                        get_content('Program_terkini');
                        
                    }
                });
            
        }
    });

    $('#btn_aktifkan_program').on('click', function(){
        $("#form_tambah_program").bootstrapValidator('validate');
        if($('#form_tambah_program').data('bootstrapValidator').isValid()){
  
            
                
                $.ajax({
                    url: "<?php echo site_url('Administrator/aktifkan_program_terkini')?>",
                    type: "POST",
                    data: {
                        "id_program" : id_program_terkini,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("Sukses", "<?php echo $this->lang->line('draft_program_telah_diaktifkan')?>", "success");
                        upload_foto_kegiatan(id_program_terkini);
                        get_content('Program_terkini');
                    }
                });
            
        }
    });


    $('#btn_stop_program').on('click', function(){
                $.ajax({
                    url: "<?php echo site_url('Administrator/stop_program_terkini')?>",
                    type: "POST",
                    data: {
                        "id_program" : id_program_terkini,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("Sukses", "<?php echo $this->lang->line('program_telah_dihentikan')?>", "success");
                        get_content('Program_terkini');
                    }
                });
    });
    


    function load_kategori_program(){
        $('#kategori_program').empty();
        $('#kategori_program').append('<option value="" selected="selected"></option>');
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
                    $(rows).appendTo("#kategori_program");
                });
                
            }
        });

        $('#provinsi_program').empty();
        $('#provinsi_program').append('<option value="" selected="selected"></option>');
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
                    $(rows).appendTo("#provinsi_program");
                });
                
            }
        });
    }

    function get_kota_program(){
        $('#kota_program').empty();
        $('#kota_program').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Administrator/load_kota')?>",
            type: "POST",
            data: {
                "id": $('#provinsi_program').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                    $(rows).appendTo("#kota_program");
                });
                
            }
        });
    }

    function upload_foto_kegiatan(id) {
                var send = id+":"+"program_terkini"+":wizard-picture_program";
                    $.ajax({
                        url: "<?php echo site_url('Administrator/upload')?>/" + send,
                        type: 'POST',
                        data: new FormData($('#form_tambah_program')[0]),
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(data) {
                            
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                        }
                    });
    }

    function detil_program_terkini(action){
        if (action == 'draft') {
            $('#btn_save_program').hide();
            $('#btn_update_program').show();
            $('#btn_stop_program').hide();
            $('#btn_aktifkan_program').show();

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_program_terkini')?>",
                type: "POST",
                data: { 
                    "id" : id_program_terkini
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_program').val(data.judul);

                    $('#deskripsi_program').val(data.deskripsi);   
                    $('#img_exist_program').attr('src', '<?php echo base_url()?>assets/img/program_terkini/'+data.gambar_utama); 
                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori program 
                    $('#kategori_program').empty();
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
                                $(rows).appendTo("#kategori_program");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_program').empty();
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
                                $(rows).appendTo("#provinsi_program");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_program').empty();
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
                                $(rows).appendTo("#kota_program");
                            });
                            
                        }
                    });

                    $('#target_dana_program').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_program').val(data.target_hari);
                },
            });
        }
        else if (action == 'add') {
            $('#btn_save_program').show();
            $('#btn_update_program').hide();
            $('#btn_stop_program').hide();
            $('#btn_aktifkan_program').hide();
        }
        else if (action == 'selesai') {
            
            $('#title_program').text('<?php echo $this->lang->line('detil_program_terkini')?>');
            $('#btn_save_program').hide();
            $('#btn_update_program').hide();
            $('#upload_img_program').hide();
            $('#btn_stop_program').hide();
            $('#btn_aktifkan_program').hide();

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_program_terkini')?>",
                type: "POST",
                data: { 
                    "id" : id_program_terkini
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_program').val(data.judul);

                    $('#deskripsi_program').val(data.deskripsi);   
                    $('#img_exist_program').attr('src', '<?php echo base_url()?>assets/img/program_terkini/'+data.gambar_utama); 
                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori program 
                    $('#kategori_program').empty();
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
                                $(rows).appendTo("#kategori_program");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_program').empty();
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
                                $(rows).appendTo("#provinsi_program");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_program').empty();
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
                                $(rows).appendTo("#kota_program");
                            });
                            
                        }
                    });

                    $('#target_dana_program').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_program').val(data.target_hari);
                },
            });
        }
        else if (action == 'live') {
            
            $('#title_program').text('<?php echo $this->lang->line('detil_program_terkini')?>');
            $('#btn_save_program').hide();
            $('#btn_update_program').hide();
            $('#upload_img_program').hide();
            $('#btn_stop_program').show();
            $('#btn_aktifkan_program').hide();

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_program_terkini')?>",
                type: "POST",
                data: { 
                    "id" : id_program_terkini
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_program').val(data.judul);

                    $('#deskripsi_program').val(data.deskripsi);   
                    $('#img_exist_program').attr('src', '<?php echo base_url()?>assets/img/program_terkini/'+data.gambar_utama); 
                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori program 
                    $('#kategori_program').empty();
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
                                $(rows).appendTo("#kategori_program");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_program').empty();
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
                                $(rows).appendTo("#provinsi_program");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_program').empty();
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
                                $(rows).appendTo("#kota_program");
                            });
                            
                        }
                    });

                    $('#target_dana_program').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_program').val(data.target_hari);
                },
            });
        }
        
    }
</script>