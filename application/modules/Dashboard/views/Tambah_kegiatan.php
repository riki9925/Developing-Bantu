
                <div class="container-fluid" >
                   

                    <div class="col-sm-8 col-sm-offset-2" style="padding-left: 0px; padding-right: 0px">
                        <div class="wizard-container">
                            <div class="card wizard-card" data-color="red" id="wizardProfile">
                                
                                    <!--        You can switch " data-color="purple" "  with one of the next bright colors: "green", "orange", "red", "blue"       -->
                                    <div class="wizard-header">
                                        <h3 class="wizard-title">
                                            Galang dana baru
                                        </h3>
                                        
                                    </div>
                                    <div class="wizard-navigation">
                                        <ul>
                                            <li>
                                                <a  href="#deskripsi" id="btn_desk" data-toggle="tab">Deskripsi</a>
                                            </li>
                                            <li>
                                                <a href="#upload" id="btn_upload" data-toggle="tab">Upload gambar</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-content">
                                        <div class="tab-pane" id="deskripsi">
                                            <div class="row">
                                                <h4 class="info-text"> Deskripsikan kegiatan anda dengan jelas</h4>
                                            </div>
                                            <form class="form form-horizontal" method="" action="" id="form_tambah_kegiatan">
                                        
                                                <div class="form-group label-floating" name="div_form">
                                                    <div class="col-md-4" align="left">Judul kegiatan</div>
                                                    <div class="col-md-8">
                                                        <input maxlength="20" type="text" class="form-control" id="judul_kegiatan" name="judul_kegiatan">
                                                    </div>
                                                </div>

                                                <div class="form-group label-floating">
                                                    <div class="col-md-4" align="left">Pilih Kategori</div>
                                                    <div class="col-md-8">
                                                        <select name="kategori_kegiatan" id="kategori_kegiatan" class="form-control">
                                                            <option disabled="" selected="" value=""></option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group label-floating">
                                                    <div class="col-md-4" align="left">Provinsi</div>
                                                    <div class="col-md-8">
                                                        <select onchange="get_kota_kegiatan()" name="provinsi_kegiatan" id="provinsi_kegiatan" class="form-control">
                                                            <option disabled="" selected="" value=""></option>
                                                            
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="form-group label-floating">
                                                    <div class="col-md-4" align="left">Kota</div>
                                                    <div class="col-md-8">
                                                        <select name="kota_kegiatan" id="kota_kegiatan" class="form-control">
                                                            <option disabled="" selected="" value=""></option>
                                                        </select>
                                                    </div>
                                                </div>
                                                
                                                <div class="form-group label-floating">
                                                    <div class="col-md-4" align="left">Tulis target dana (Rp.)</div>
                                                    <div class="col-md-8">
                                                        <input id="target_dana" name="target_dana" placeholder="Rp. 0" class="form-control" type="digit" onchange="dashboard_change_format('target_dana')">
                                                    </div>
                                                </div>

                                                <div class="form-group label-floating">
                                                    <div class="col-md-4" align="left">Jangka waktu (Hari)</div>
                                                    <div class="col-md-8">
                                                        <input id="jangka_waktu" name="jangka_waktu" class="form-control" type="text">
                                                    </div>
                                                </div>
                                                <input type="" id="id_kegiatan" disabled="" hidden="" name="">

                                                <div class="form-group label-floating">
                                                    <div class="col-md-4" align="left">Deskripsikan kegiatan anda</div>
                                                    <div class="col-md-8">
                                                        <textarea id="deskripsi_kegiatan" name="deskripsi_kegiatan" minlength="20" class="form-control" rows="5"></textarea>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="tab-pane" id="upload">

                                            <div id="stop_upload" hidden="" align="center" class="col-sm-6 col-sm-offset-3" style="width: 300px; height: 300px; background: whitesmoke; -moz-border-radius: 50px; -webkit-border-radius: 50px; border-radius: 50%;">
                                                <img style="width: 40%; margin-top: 50px" src="<?php echo base_url()?>assets/img/file.png">
                                                <h4>Anda belum membuat deskripsi kegiatan</h4>
                                            </div>

                                            <div id="start_upload" hidden="" class="row" style="margin-left: 15px; margin-right: 15px">

                                                <div class="card" style="border-radius: 0px; margin-top: 5px; margin-bottom: 5px; ">
                                                    <div class="card-header" style="background-color: #4fc143; padding:5px 10px 5px">
                                                        <h4 style="color: white">Foto utama kegiatan</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="row">
                                                            <div class="col-xs-12" id="foto_utama_ada" hidden=""></div>
                                                            <div id="foto_utama_kosong" hidden="" class="col-xs-12" style="background: url('<?php echo base_url()?>assets/img/cover.jpg')no-repeat;background-size: cover; ">
                                                                <div class="col-sm-7 col-sm-offset-4 col-xs-10 col-xs-offset-1" style="width: 200px; height: 200px; margin-top: 10px; margin-bottom: 10px ;border-radius: 50%; display: block;background-color: whitesmoke;" align="center">
                                                                    <img style="width: 40%; margin-top: 50px" src="http://salingbantu.or.id/assets/img/file.png">
                                                                    <h4>Upload foto utama</h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-xs-12 pull-left" style="padding: 0px">
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-sm-6">
                                                                <div onclick="upload_gambar2()" class="card-content" style="padding-top: 0px; padding-bottom: 0px; background-color: whitesmoke; margin-bottom: 10px">
                                                                    <div class="row">
                                                                        <div class="col-xs-2">
                                                                            <button  style="background-color: #4fc143" class="btn btn-round btn-green btn-fill btn-just-icon"><i class="material-icons">cloud_upload</i>
                                                                            <div class="ripple-container"></div></button>
                                                                        </div>
                                                                        <div class="col-xs-7">
                                                                            <h6 style="margin-top: 10px; margin-left: 8px">  Upload foto utama</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>   
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="card" style="border-radius: 0px; margin-top: 30px; margin-bottom: 5px; ">
                                                    <div class="card-header" style="background-color: #4fc143; padding:5px 10px 5px">
                                                        <h4 style="color: white">Upload foto pendukung kegiatan maksimal 9</h4>
                                                    </div>
                                                    <div class="card-content">
                                                        <div class="row">

                                                            <!-- button tambah -->
                                                            <div class="col-sm-6" id="btn_tambah_gambar" hidden="" style="">
                                                                <div onclick="upload_gambar()" class="card-content" style="padding-top: 0px; padding-bottom: 0px; background-color: whitesmoke">
                                                                    <div class="row">
                                                                        <div class="col-xs-2">
                                                                            <button  style="background-color: #4fc143" class="btn btn-round btn-green btn-fill btn-just-icon"><i class="material-icons">cloud_upload</i>
                                                                            <div class="ripple-container"></div></button>
                                                                        </div>
                                                                        <div class="col-xs-9">
                                                                            <h6 style="margin-top: 10px; margin-left: 8px">  Upload foto pendukung</h6>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <!-- list image -->
                                                            <div class="row col-xs-12" id="list_image">
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>


                                        </div>
                                    </div>
                                    <div class="wizard-footer">
                                        <div class="pull-right">
                                            
                                            <button id="btn_save_1" class="btn btn-success">
                                                <span class="btn-label">
                                                    <i class="material-icons">check</i>
                                                </span>
                                                Selanjutnya
                                            <div class="ripple-container"></div></button>

                                            <!-- for next -->
                                            <input id="next" type='button' class='btn btn-next btn-fill btn-rose btn-wd hide' name='next' value='Next' />
                                            <!-- <input  type='button' class='btn btn-finish btn-fill btn-rose btn-wd' name='finish' value='Finish' /> -->

                                            <button id="btn_close" hidden="" class="btn btn-warning">
                                                <span class="btn-label">
                                                    <i class="material-icons">save</i>
                                                </span>
                                                Simpan draft
                                            <div class="ripple-container"></div></button>

                                            <button id="btn_ajukan_verifikasi" hidden="" class="btn btn-info">
                                                <span class="btn-label">
                                                    <i class="material-icons">done</i>
                                                </span>
                                                Ajukan verifikasi
                                            <div class="ripple-container"></div></button>

                                        </div>
                                        <div class="pull-left">
                                            <button id="btn_batalkan" class="btn btn-danger">
                                                <span class="btn-label">
                                                    <i class="material-icons">arrow_back</i>
                                                </span>
                                                Batal
                                            <div class="ripple-container"></div></button>
                                            <input id="prev" type='button' class='btn btn-previous btn-fill btn-default btn-wd' name='previous' value='Previous' />
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                
                            </div>
                        </div>

                    </div>

                </div>

<style type="text/css">

    .container {
        position: relative;
        width: 100%;
        margin-top: 20px;
        padding-right: 0px;
        padding-left: 0px;
    }

    .image {
      opacity: 1;
      display: block;
      width: 100%;
      height: auto;
      transition: .5s ease;
      backface-visibility: hidden;
    }

    .middle {
      transition: .5s ease;
      opacity: 0;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%)
    }

    .container:hover .image {
      opacity: 0.3;
    }

    .container:hover .middle {
      opacity: 1;
    }

    .text {
      background-color: rgb(229, 60, 56);
      color: white;
      font-size: 16px;
      padding: 16px 16px;
      border-radius: 50%;
    }
</style>

<script type="text/javascript">
    var table_img_kegiatan; var form_desk = 'invalid'; var upload_image;
    $(document).ready(function() {
        demo.initMaterialWizard();
        load_kategori2();
        check_st_upload();
        $('#btn_close').hide();
        $('#btn_ajukan_verifikasi').hide();
        //validasi form tambah kegiatan
        $('#form_tambah_kegiatan').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                judul_kegiatan: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Tulis judul kegiatan'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: 'Isi dengan huruf atau angka'
                        }
                    }
                },
                kategori_kegiatan: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Pilih kategori kegiatan'
                        }
                    }
                },
                provinsi_kegiatan: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Pilih provinsi kegiatan'
                        }
                    }
                },
                kota_kegiatan: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Pilih provinsi kegiatan'
                        }
                    }
                },
                target_dana: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Tulis target dana'
                        },
                        regexp: {
                            regexp: /^[0-9, ]*$/,
                            message: 'Isi dengan angka, contoh: 1000'
                        }
                    }
                },
                jangka_waktu: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Tulis jangka waktu'
                        },
                        regexp: {
                            regexp: /^[0-9 ]*$/,
                            message: 'Isi dengan angka, contoh: 30'
                        }
                    }
                },
                
                deskripsi_kegiatan: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Tulis deskripsi kegiatan'
                        }
                        ,regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: 'Isi dengan huruf.'
                        }
                    }
                }
                
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });

        if (width <= 768 ) {
            $('#btn_close').addClass('btn-block');
            $('#btn_ajukan_verifikasi').addClass('btn-block');
            $('#prev').addClass('btn-block');
        }
        else{
            $('#btn_close').removeClass('btn-block');
            $('#btn_ajukan_verifikasi').removeClass('btn-block');
            $('#prev').removeClass('btn-block');
        }

        if (id_edit != 0) {
            form_desk = 'valid';
            $('#id_kegiatan').val(id_edit);
            preview_kegiatan();
            load_image();
            check_st_upload();
            $('#btn_batalkan').hide();
            
        }
    });

    function preview_kegiatan(){
        $.ajax({
                    url: "<?php echo site_url('Dashboard/preview_kegiatan_edit')?>",
                    type: "POST",
                    data: {
                        "id": $('#id_kegiatan').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $('#judul_kegiatan').val(data.judul);
                        $('#target_dana').val(data.target_dana);
                        $('#jangka_waktu').val(data.target_hari);
                        $('#deskripsi_kegiatan').val(data.deskripsi);
                        
                        
                        kategori = data.kategori;
                        prov = data.provinsi;
                        kota = data.kota;
                        
                        // kategori
                        $('#kategori_kegiatan').empty();
                        $.ajax({
                            url: "<?php echo site_url('Dashboard/get_kategori')?>",
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
                                    $(rows).appendTo("#kategori_kegiatan");
                                });
                                
                            }
                        });

                        //provisni
                        $('#provinsi_kegiatan').empty();
                        $.ajax({
                            url: "<?php echo site_url('Dashboard/load_provinsi')?>",
                            type: "POST",
                            data: {
                                //"judul": $('#judul_kegiatan').val()
                            },
                            dataType: "JSON",
                            success: function(data) {
                                
                                $.each(data, function(k, v) {
                                    if (v.id == prov) {
                                        rows ="<option selected='' value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                    }
                                    else{
                                        rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                    }   
                                    $(rows).appendTo("#provinsi_kegiatan");
                                });
                                
                            }
                        });

                        //kota
                        $('#kota_kegiatan').empty();
                        $.ajax({
                            url: "<?php echo site_url('Dashboard/load_kota')?>",
                            type: "POST",
                            data: {
                                "id": prov
                            },
                            dataType: "JSON",
                            success: function(data) {
                                
                                $.each(data, function(k, v) {
                                    if (v.id == kota) {
                                        rows ="<option selected='' value='"+v.id+"'>"+v.nama_kota+"</option>";
                                    }
                                    else{
                                        rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                                    }
                                    $(rows).appendTo("#kota_kegiatan");
                                });
                                
                            }
                        });
                    }
                });
    }

    function check_st_upload() {
                $.ajax({
                    url: "<?php echo site_url('Dashboard/check_st_upload')?>",
                    type: "POST",
                    data: {
                        "id": $('#id_kegiatan').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.jml <= 8) {
                            $('#btn_tambah_gambar').show();
                        }else{
                            $('#btn_tambah_gambar').hide();
                        }
                    }
                });
    }

    function upload_gambar(){
        $("#btn_delete_img").click();
        $('#tambah_gambar').modal('show');
        upload_image = 'pendukung';
    }

    function upload_gambar2(){
        $("#btn_delete_img").click();
        $('#tambah_gambar').modal('show');
        upload_image = 'utama';
    }

    $('#prev').on('click', function(){  
        $('#btn_save_1').show();
        $('#btn_close').hide();
        $('#btn_ajukan_verifikasi').hide();
        if (id_edit != 0) {
            $('#btn_batalkan').hide();
        }
        else{
            $('#btn_batalkan').show();
        }
    });

  
    $('#btn_desk').on('click', function(){  
        $('#btn_save_1').show();
        $('#btn_close').hide();
        $('#btn_ajukan_verifikasi').hide();
        if (id_edit != 0) {
            $('#btn_batalkan').hide();
        }
        else{
            $('#btn_batalkan').show();
        }
    });

    $('#btn_upload').on('click', function(){  
        $('#btn_save_1').hide();
        $('#btn_batalkan').hide();
        if (form_desk == 'invalid') {
            $('#stop_upload').show();
            $('#start_upload').hide();
            $('#btn_close').hide();
            $('#btn_ajukan_verifikasi').hide();
        }
        else{
            $('#stop_upload').hide();
            $('#start_upload').show();
            $('#btn_close').show();
            $('#btn_ajukan_verifikasi').show();
        }

    });


    $('#btn_save_1').on('click', function(){
        $("#form_tambah_kegiatan").bootstrapValidator('validate');
        if($('#form_tambah_kegiatan').data('bootstrapValidator').isValid()){
            if (form_desk == 'invalid') {
                if (id_edit == 0) {
                    $.ajax({
                        url: "<?php echo site_url('Dashboard/tambah_kegiatan')?>",
                        type: "POST",
                        data: {
                            "judul": $('#judul_kegiatan').val(),
                            "kategori": $('#kategori_kegiatan').val(),
                            "target_dana": $('#target_dana').val().replace(/,/g , ''),
                            "jangka_waktu": $('#jangka_waktu').val(),
                            "deskripsi": $('#deskripsi_kegiatan').val(),
                            "provinsi": $('#provinsi_kegiatan').val(),
                            "kota": $('#kota_kegiatan').val(),
                        },
                        dataType: "JSON",
                        success: function(data) {
                            //upload(data.id);
                            form_desk = 'valid';
                            $('#id_kegiatan').val(data.id);
                            $('#next').click();
                            $('#btn_save_1').hide();
                            $('#btn_batalkan').hide();
                            $('#btn_close').show();
                            $('#btn_ajukan_verifikasi').show();
                            $('#stop_upload').hide();
                            $('#start_upload').show();
                            load_image();
                        }
                    });
                }
                //update kegiatan
                else{
                    $.ajax({
                        url: "<?php echo site_url('Dashboard/update_kegiatan')?>",
                        type: "POST",
                        data: {
                            "id":$('#id_kegiatan').val(),
                            "judul": $('#judul_kegiatan').val(),
                            "kategori": $('#kategori_kegiatan').val(),
                            "target_dana": $('#target_dana').val().replace(/,/g , ''),
                            "jangka_waktu": $('#jangka_waktu').val(),
                            "deskripsi": $('#deskripsi_kegiatan').val(),
                            "provinsi": $('#provinsi_kegiatan').val(),
                            "kota": $('#kota_kegiatan').val(),
                        },
                        dataType: "JSON",
                        success: function(data) {
                            
                            $('#next').click();
                            $('#btn_save_1').hide();
                            $('#btn_batalkan').hide();
                            $('#btn_close').show();
                            $('#btn_ajukan_verifikasi').show();
                            $('#stop_upload').hide();
                            $('#start_upload').show();
                            load_image();
                        }
                    });
                }
            }
            else{
                $('#next').click();
                $('#btn_save_1').hide();
                $('#btn_batalkan').hide();
                $('#btn_close').show();
                $('#btn_ajukan_verifikasi').show();
                $('#stop_upload').hide();
                $('#start_upload').show();
            }
        }
    });

    function load_image(){
        $('#list_image').empty();
                //foto pendukung
                $.ajax({
                    url: "<?php echo site_url('Dashboard/load_image')?>",
                    type: "POST",
                    data: {
                        "id": $('#id_kegiatan').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $.each(data, function(k, v) {
                            rows1="<div class='col-xs-6'><div class='container' style='background:#dedede; padding:5px'><img src='<?php echo base_url()?>assets/img/content/"+v.img+"' alt='Avatar' class='image' style='width:100%;'><div class='middle'><button onclick=delete_foto3('"+v.id+"') id='minimizeSidebar' class='btn btn-round btn-danger btn-fill btn-just-icon'><i class='material-icons'>delete_forever</i><div class='ripple-container'></div></button></div></div></div>";
                            $(rows1).appendTo("#list_image");
                        });
                    }
                });

                //foto utama
                $.ajax({
                    url: "<?php echo site_url('Dashboard/load_image_utama')?>",
                    type: "POST",
                    data: {
                        "id": $('#id_kegiatan').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        if (data.gambar_utama==null) {
                            $('#foto_utama_kosong').show();
                            $('#foto_utama_ada').hide();
                        }
                        else{
                            
                                $('#foto_utama_kosong').hide();
                                $('#foto_utama_ada').show(); 
                                $('#foto_utama_ada').empty(); 
                                rows1="<img src='<?php echo base_url()?>assets/img/content/"+data.gambar_utama+"' alt='Avatar' class='image' style='width:100%;'>";
                                $(rows1).appendTo("#foto_utama_ada");                           
                            
                        }
                        
                    }
                });
    }

    $('#btn_close').on('click', function(){
        get_content('Kegiatan');
    });
    
    $('#btn_batalkan').on('click', function(){
        if (form_desk == 'invalid') {
            get_content('Kegiatan');
        }
        else{
            $.ajax({
                    url: "<?php echo site_url('Dashboard/hapus_kegiatan')?>",
                    type: "POST",
                    data: {
                        "id": $('#id_kegiatan').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("Dibatalkan", "Draft kegiatan terhapus", "success");
                        get_content('Kegiatan');
                    }
                });
        }
    });


    function delete_foto3(id) {
       
        swal({
                    title: 'Hapus foto?',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                })
            .then(function() {

                $.ajax({
                    url: "<?php echo site_url('Dashboard/delete_image')?>",
                    type: "POST",
                    data: {
                        "id": id,
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("Terhapus", "Foto terhapus", "success");
                        load_image();
                        check_st_upload();
                    }
                });
                
                swal({
                    title: 'Sukses',
                    text: 'Foto terhapus',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                    })
            }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: 'Dibatalkan.',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    }
   



    function load_kategori2(){
        $('#kategori_kegiatan').empty();
        $('#kategori_kegiatan').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Dashboard/get_kategori')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                    $(rows).appendTo("#kategori_kegiatan");
                });
                
            }
        });

        $('#provinsi_kegiatan').empty();
        $('#provinsi_kegiatan').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Dashboard/load_provinsi')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                    $(rows).appendTo("#provinsi_kegiatan");
                });
                
            }
        });
    }

    function get_kota_kegiatan2(){
        $('#kota_kegiatan').empty();
        $('#kota_kegiatan').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Dashboard/load_kota')?>",
            type: "POST",
            data: {
                "id": $('#provinsi_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                    $(rows).appendTo("#kota_kegiatan");
                });
                
            }
        });
    }


    $('#btn_ajukan_verifikasi').on('click', function(){
        swal({
                    title: 'Ajukan verifikasi kegiatan',
                    text: 'Usulan kegiatan anda akan diverifikasi admin',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ajukan verifikasi',
                    cancelButtonText: 'Batal',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                })
            .then(function() {

                $.ajax({
                    url : "<?php echo site_url('Dashboard/verifikasi_kegiatan')?>",
                    type: "POST",
                    data: { 
                      "id" : $('#id_kegiatan').val()
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        get_content('Kegiatan');
                    },
                    
                });     
                
                swal({
                    title: 'Sukses',
                    text: 'Usulan kegiatan anda akan segera kami verifikasi',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                    })
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: 'Dibatalkan.',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    });


    
    function upload2(){

        var id = $('#id_kegiatan').val();
        if (upload_image == 'utama') {
            var a = 'content_utama';
        }
        else{
            var a = 'content_pendukung';
        }
                var send = id+":"+"content"+":wizard-picture_kegiatan:"+a;
                    $.ajax({
                        url: "<?php echo site_url('Dashboard/upload')?>/" + send,
                        type: 'POST',
                        data: new FormData($('#form_image_upload')[0]),
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(data) {
                            load_image();
                            check_st_upload();
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                        }
                    });
    }



</script>