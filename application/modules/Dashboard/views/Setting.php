<div class="container-fluid">
	                <div class="row">

	                    <div class="col-md-6 col-md-offset-3">
	                        <div class="card">
	                        	<div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">perm_identity</i>
                                </div>
	                            


	                            <div class="card-content">
	                            	<h4 class="card-title">Data diri</h4>

                                        <div class="row">
                                            <div class="col-xs-12" id="notif_profile_pending1" hidden="">
                                                <div class="alert alert-warning alert-with-icon" style="margin-top: 20px" data-notify="container">
                                                <i class="material-icons" style="color: orange" data-notify="icon">notifications</i>
                                                <span data-notify="message">Data diri anda belum terverifikasi oleh kami. Lengkapi form dibawah ini, dan ajukan verifikasi.</span>
                                                <h4 onclick="verifikasi_akun_saya('PENGAJUAN')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Ajukan verifikasi<i class="material-icons" style="font-size: 30px; color: white">arrow_forward</i></h4>
                                                </div>
                                            </div>

                                            <div class="col-xs-12" id="notif_profile_pengajuan1" hidden="">
                                                <div class="alert alert-info alert-with-icon" style="margin-top: 20px" data-notify="container">
                                                <i class="material-icons" style="color: blue" data-notify="icon">notifications</i>
                                                <span data-notify="message">Data diri anda sedang kami verifikasi.</span>
                                                </div>
                                            </div>

                                            <div class="col-xs-12" id="notif_profile_sukses1" hidden="">
                                                <div class="alert alert-success alert-with-icon" style="margin-top: 20px" data-notify="container">
                                                <i class="material-icons" style="color: green" data-notify="icon">notifications</i>
                                                <span data-notify="message">Data diri anda sudah benar.</span>
                                                <h4 onclick="verifikasi_akun_saya('CLOSE')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Tutup pemberitahuan<i class="material-icons" style="font-size: 30px; color: white">close</i></h4>
                                                </div>
                                            </div>

                                            <div class="col-xs-12" id="notif_profile_gagal1" hidden="">
                                                <div class="alert alert-danger alert-with-icon" style="margin-top: 20px" data-notify="container">
                                                <i class="material-icons" style="color: red" data-notify="icon">notifications</i>
                                                <span data-notify="message">Data diri anda belum benar, silahkan lengkapi dengan mengisi form dibawah ini.</span>
                                                <h4 onclick="verifikasi_akun_saya('PENGAJUAN')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Ajukan verifikasi<i class="material-icons" style="font-size: 30px; color: white">arrow_forward</i></h4>
                                                </div>
                                            </div>
                                        </div>
	                                	
	                            		<div class="row">
	                            			<div class="col-sm-3 col-xs-12">
	                            				<img id="foto_user_exist2" class="img-responsive" src="" style="width: 100%">
	                            			</div>
	                            			<div class="col-sm-9 col-xs-12">

	                            				<div class="row">
			                                        <div class="col-md-3"><p style="margin: 5px 0 0px">Nama</p></div>
			                                        <div class="col-md-9">
														<div class="form-group label-floating is-empty nomargin">
		                                                    <label class="control-label"></label>
		                                                    <input id="nama_lengkap" class="form-control" placeholder="Tulis nama lengkapmu" type="text">
		                                                <span class="material-input"></span></div>
			                                        </div>
			                                    </div>

			                                    <div class="row">
			                                        <div class="col-md-3"><p style="margin: 5px 0 0px">Email</p></div>
			                                        <div class="col-md-9">
														<div class="form-group label-floating is-empty nomargin">
		                                                    <label class="control-label"></label>
		                                                    <input id="email" class="form-control" placeholder="Tulis alamat e-mailmu" type="email">
		                                                <span class="material-input"></span></div>
			                                        </div>
			                                    </div>

	                            			</div>
	                            		</div>

	                                    

	                                    

	                                    <hr>



	                                    <div class="row">
	                                        <div class="col-md-3"><p style="margin: 5px 0 0px">Alamat</p></div>
	                                        <div class="col-md-9">
	                                        	<div class="form-group label-floating is-empty nomargin">
                                                    <label class="control-label"></label>
                                                    <input id="alamat" class="form-control" placeholder="Tulis alamat anda" type="text">
                                                <span class="material-input"></span></div>
	                                        </div>
	                                    </div>

	                                    <div class="row" >
	                                        <div class="col-md-3"><p style="margin: 5px 0 0px">Provinsi</p></div>
	                                        <div class="col-md-9">
	                                        	<div class="form-group label-floating is-empty nomargin">
                                                    <select onchange="get_kota()" name="provinsi" id="provinsi" class="form-control">
                                                    </select>
                                                    <span class="material-input"></span></div>
	                                        </div>
	                                    </div>

	                                    <div class="row" >
	                                        <div class="col-md-3"><p style="margin: 5px 0 0px">Kota/kabupaten</p></div>
	                                        <div class="col-md-9">
	                                        	<div class="form-group label-floating is-empty nomargin">
                                                    
                                                        <select id="kota" class="form-control">
                                                            
                                                        </select>
                                                    <span class="material-input"></span></div>
	                                        </div>
	                                    </div>

                                        <div class="row">
                                            <div class="col-md-3"><p style="margin: 5px 0 0px">No handphone</p></div>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty nomargin">
                                                    <label class="control-label"></label>
                                                    <input id="hp" class="form-control" placeholder="Tulis nomor handphonemu" type="text">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>

                                        <div class="row" >
                                            <div class="col-md-3"><p style="margin: 5px 0 0px">Kartu identitas</p></div>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty nomargin">
                                                    
                                                        <select id="jenis_ki" class="form-control">
                                                            <option> KTP </option>
                                                            <option> SIM </option>
                                                        </select>
                                                    <span class="material-input"></span></div>
                                            </div>
                                        </div>

	                                    
                                        <div class="row">
                                            <div class="col-md-3"><p style="margin: 5px 0 0px">Upload foto anda</p></div>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new" style="width: 100%" data-provides="fileinput">


                                                <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                    <img id="foto_user_exist" src="<?php echo base_url()?>" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                    
                                                <span class="btn btn-info btn-round btn-file">
                                                    <span class="fileinput-new"><i class="material-icons">camera_alt</i> Pilih</span>
                                                    <span class="fileinput-exists"><i class="material-icons">sync</i> Ganti</span>
                                                    <input type="file" id="wizard-picture2" name="wizard-picture2" />
                                                </span>

                                                <a id="btn_delete_img" href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>

                                                </div>
                                            </div>
                                        </div>




                                        <div class="row">
                                            <div class="col-md-3"><p style="margin: 5px 0 0px">Upload kartu identitas</p></div>
                                            <div class="col-md-9">
                                                <div class="fileinput fileinput-new" style="width: 100%" data-provides="fileinput">


                                                <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                    <img id="foto_user_exist_identitas" src="<?php echo base_url()?>" alt="...">
                                                </div>
                                                <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                    
                                                <span class="btn btn-info btn-round btn-file">
                                                    <span class="fileinput-new"><i class="material-icons">camera_alt</i> Pilih</span>
                                                    <span class="fileinput-exists"><i class="material-icons">sync</i> Ganti</span>
                                                    <input type="file" id="wizard-picture_identitas" name="wizard-picture_identitas" />
                                                </span>

                                                <a id="btn_delete_identitas" href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>

                                                </div>
                                            </div>
                                        </div>



	                                    <div class="row" hidden="">
	                                        <div class="col-md-3"><p style="margin: 5px 0 0px">Jenis kartu identitas</p></div>
	                                        <div class="col-md-9">
	                                        	<div class="form-group label-floating is-empty nomargin">
                                                    <select id="jenis_identitas" class="form-control">
                                                            <option> KTP </option>
                                                            <option> SIM </option>
                                                    </select>
                                                    <span class="material-input"></span></div>
	                                        </div>
	                                    </div>


	                                    <div class="row">
	                                        <div class="col-md-3"><p style="margin: 5px 0 0px">Biography</p></div>
	                                        <div class="col-md-9">
	                                        	<label class="control-label"></label>
                                                <textarea id="bio" placeholder="Deskripsikan diri anda dalam beberapa kalimat" class="form-control nomargin" rows="5"></textarea>
                                                <span class="material-input"></span></div>

	                                        </div>
	                                    </div>
	                                    


	                                    <button onclick="simpan_data_user()" class="btn btn-round btn-success pull-right">Update Profile</button>
	                                    <div class="clearfix"></div>
	                                
	                            </div>

	                        </div>
	                    </div>
						
	                </div>
	            </div>



<script type="text/javascript">
    var provinsi_user; var kota_user;
	$(document).ready(function() {
        load_detil_user();
        load_provinsi('');
        detect_profile();
    });


    function load_provinsi(){
        $.ajax({
            url: "<?php echo site_url('Dashboard/load_provinsi')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {

                $('#provinsi').empty();
                if (provinsi_user == null) {
                    rows ="<option value=''>-Pilih provinsi-</option>";
                    $(rows).appendTo("#provinsi");

                    $.each(data, function(k, v) {
                        rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                        $(rows).appendTo("#provinsi");
                    });
                }
                else{
                    rows ="<option value=''>-Pilih provinsi-</option>";
                    $(rows).appendTo("#provinsi");

                    $.each(data, function(k, v) {
                        if (provinsi_user == v.id) {
                            rows ="<option selected='' value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                        }else{
                            rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                        }
                        $(rows).appendTo("#provinsi");
                    });
                }
                
            }
        });
    }

    function get_kota(){
        $.ajax({
            url: "<?php echo site_url('Dashboard/load_kota')?>",
            type: "POST",
            data: {
                "id": $('#provinsi').val()
            },
            dataType: "JSON",
            success: function(data) {

                $('#kota').empty();

                rows ="<option value=''>-Pilih kota-</option>";
                $(rows).appendTo("#kota");

                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                    $(rows).appendTo("#kota");
                });
                
            }
        });
    }


    function load_detil_user(){
    	$.ajax({
                url : "<?php echo site_url('Dashboard/load_detil_user')?>",
                type: "POST",
                data: { 
                  //"page" : page
                },
                dataType: "JSON",
                success: function(data)
                {
                	
                    $('#nama_lengkap').val(data.nama);
                    $('#email').val(data.email);
                    $('#alamat').val(data.alamat);
                    provinsi_user = data.provinsi;
                    kota_user = data.kota;
                    $('#hp').val(data.hp);


                    $('#jenis_ki').empty();
                    if (data.jenis_ki == 'KTP') {
                        rows ="<option selected=''>KTP</option><option>SIM</option>";
                        $(rows).appendTo("#jenis_ki");
                    }else{
                        rows ="<option>KTP</option><option selected=''>SIM</option>";
                        $(rows).appendTo("#jenis_ki");
                    }

                    if (data.img != 'assets/img/foto/user.png') {
                        $('#foto_user_exist2').attr('src', '<?php echo base_url()?>/assets/img/foto/'+data.img);
                        $('#foto_user_exist').attr('src', '<?php echo base_url()?>/assets/img/foto/'+data.img);
                    }
                    else{
                        $('#foto_user_exist').attr('src', '<?php echo base_url()?>/assets/img/upload_file.gif');
                        $('#foto_user_exist2').attr('src', '<?php echo base_url()?>/assets/img/foto/user.png');
                    }


                    if (data.img_ki != null) {
                        $('#foto_user_exist_identitas').attr('src', '<?php echo base_url()?>/assets/img/kartu_identitas/'+data.img_ki);
                    }
                    else{
                        $('#foto_user_exist_identitas').attr('src', '<?php echo base_url()?>/assets/img/upload_file.gif');
                    }
                    

                    //$('#jenis_identitas').val(data.jenis_identitas);
                    $('#bio').val(data.biography);

                    $.ajax({
                        url: "<?php echo site_url('Dashboard/load_kota')?>",
                        type: "POST",
                        data: {
                            "id": data.provinsi
                        },
                        dataType: "JSON",
                        success: function(data) {

                            $('#kota').empty();

                            rows ="<option value=''>-Pilih kota-</option>";
                            $(rows).appendTo("#kota");

                            $.each(data, function(k, v) {
                                if (v.id == kota_user) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }
                                
                                $(rows).appendTo("#kota");
                            });
                            
                        }
                    });
                },
                
            });
    }


    function simpan_data_user(){
    		$.ajax({
                url : "<?php echo site_url('Dashboard/simpan_data_user')?>",
                type: "POST",
                data: { 
                  "nama" : $('#nama_lengkap').val(), "email" : $('#email').val(), "alamat" : $('#alamat').val(), "hp" : $('#hp').val(), "bio" : $('#bio').val(), "provinsi" : $('#provinsi').val(), "kota" : $('#kota').val(), "jenis_ki" : $('#jenis_ki').val()
                },
                dataType: "JSON",
                success: function(data)
                {
                    //swal("Berhasil", "Data anda telah diperbarui", "success");
                    upload_foto_identitas();
                    upload_foto_user();
                    swal("Berhasil", "Data anda telah diperbarui", "success");
                },
                
            });
    }


    function upload_foto_user() {

                var file_data = $('#wizard-picture2').prop('files')[0];
                    
                    var form_data = new FormData();
                    form_data.append('wizard-picture2', file_data);
                    $.ajax({
                        url: "<?php echo site_url('Dashboard/upload_file_foto')?>", 
                        dataType: 'text', 
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            
                            load_detil_user();
                            set_foto_profile();
                        },
                        error: function (response) {
                            swal("Informasi", response)
                        }
                });
    }


    function upload_foto_identitas() {

                var file_data = $('#wizard-picture_identitas').prop('files')[0];
                    
                    var form_data = new FormData();
                    form_data.append('wizard-picture_identitas', file_data);
                    $.ajax({
                        url: "<?php echo site_url('Dashboard/upload_file_foto2')?>", 
                        dataType: 'text', 
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            // swal("Berhasil", "Data anda telah diperbarui", "success");
                            load_detil_user();
                            // set_foto_profile();
                        },
                        error: function (response) {
                            swal("Informasi", response)
                        }
                });
    }
</script>