            
                	<div class="container-fluid">

	                   
                    
                        <div class="col-md-4 col-md-offset-4 col-sm-12">
                            <div class="row">
                                <div class="col-xs-4">
                                    <i class="material-icons pull-right" style="font-size: 50px; color: rgb(243, 69, 57)">verified_user</i>
                                </div>
                                <div class="col-xs-4 text-center">
                                    <i class="material-icons" style="font-size: 80px; color: green; margin-top: -10px">verified_user</i>
                                </div>
                                <div class="col-xs-4">
                                    <i class="material-icons pull-left" style="font-size: 50px; color: rgb(50, 190, 252)">verified_user</i>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 text-center">
                            <h4>Selamat Datang <?php echo $this->session->userdata('nama_user'); ?></h4>
                            <p>Atur dan update semua kegiatan anda dengan lebih mudah</p>
                        </div>
                    </div>

                    <div class="row">

                        <div class="col-lg-4 col-md-6 col-sm-6" id="notif_profile_pending2" hidden="">
                            <div class="alert alert-warning alert-with-icon" style="margin-top: 20px" data-notify="container">
                            <i class="material-icons" style="color: orange" data-notify="icon">notifications</i>
                            <span data-notify="message">Silahkan lengkapi profile anda.</span>
                            <h4 onclick="get_content('Setting')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Profile<i class="material-icons" style="font-size: 30px; color: white">arrow_forward</i></h4>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6" id="notif_profile_pengajuan2" hidden="" >
                                <div class="alert alert-warning alert-with-icon" style="margin-top: 20px" data-notify="container">
                                    <i class="material-icons" style="color: blue" data-notify="icon">notifications</i>
                                    <span data-notify="message">Data diri anda sedang kami verifikasi.</span>
                                </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6" id="notif_profile_sukses2" hidden="">
                                <div class="alert alert-success alert-with-icon" style="margin-top: 20px" data-notify="container">
                                    <i class="material-icons" style="color: green" data-notify="icon">notifications</i>
                                    <span data-notify="message">Data diri anda sudah benar.</span>
                                    <h4 onclick="verifikasi_akun_saya('CLOSE')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Tutup pemberitahuan<i class="material-icons" style="font-size: 30px; color: white">close</i></h4>
                                </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6" id="notif_profile_gagal2" hidden="">
                                <div class="alert alert-danger alert-with-icon" style="margin-top: 20px" data-notify="container">
                                    <i class="material-icons" style="color: red" data-notify="icon">notifications</i>
                                    <span data-notify="message">Data diri anda belum benar.</span>
                                    <h4 onclick="get_content('Setting')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Lengkapi data diri<i class="material-icons" style="font-size: 30px; color: white">arrow_forward</i></h4>
                                </div>
                        </div>
                        

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Jumlah kegiatan</p>
                                    <h4 class="title"><b id="jumlah_kegiatan"></b></h4>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Donasi Masuk</p>
                                    <h4 class="title"><b id="jumlah_donasi_masuk"></b></h4>
                                </div>
                            </div>
                        </div>



                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Donasi keluar</p>
                                    <h4 class="title"><b id="jumlah_donasi_keluar"></b></h4>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Total zakatku</p>
                                    <h4 class="title"><b id="jumlah_zakat"></b></h4>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="orange">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <p class="category">Total infaqku</p>
                                    <h4 class="title"><b id="jumlah_infaq"></b></h4>
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                    
                </div>

            
<script type="text/javascript">
    $(document).ready(function() {
        detect_profile();
        resume_total();
        
        $('#form_identity_1').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nama_panggilan: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Masukkan Nama Panggilan'
                        },regexp: {
                            regexp: /^[a-zA-Z ]*$/,
                            message: 'Isi dengan huruf.'
                        }
                    }
                },
                email2: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Masukkan email'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z ]*$/,
                            message: 'Isi dengan huruf.'
                        },
                        required: true
                    }
                },
                nama_depan: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Masukkan Nama Depan'
                        },regexp: {
                            regexp: /^[a-zA-Z ]*$/,
                            message: 'Isi dengan huruf.'
                        }
                    }
                }
                
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
    	});



    });

    function go(){
    	$("#form_identity_1").bootstrapValidator('validate');
    	if($('#form_identity_1').data('bootstrapValidator').isValid()){
    		alert("sukses")
    	}
    }

    function resume_total(){
        $.ajax({
                url : "<?php echo site_url('Dashboard/get_resume_total')?>",
                type: "POST",
                data: { 
                  //"page" : page
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#jumlah_kegiatan').text(data.kegiatan+" Kegiatan");

                    if (data.donasi_masuk == null) {
                        $('#jumlah_donasi_masuk').text("Rp. 0");
                    }else{
                        $('#jumlah_donasi_masuk').text("Rp. "+accounting.formatNumber(data.donasi_masuk));
                    }

                    if (data.donasi_keluar == null) {
                        $('#jumlah_donasi_keluar').text("Rp. 0");
                    }else{
                        $('#jumlah_donasi_keluar').text("Rp. "+accounting.formatNumber(data.donasi_keluar));
                    }

                    if (data.zakatku == null) {
                        $('#jumlah_zakat').text("Rp. 0");
                    }else{
                        $('#jumlah_zakat').text("Rp. "+accounting.formatNumber(data.zakatku));
                    }

                    if (data.infaqku == null) {
                        $('#jumlah_infaq').text("Rp. 0");
                    }else{
                        $('#jumlah_infaq').text("Rp. "+accounting.formatNumber(data.infaqku));
                    }
                    
                },
                
            });
    }


    
</script>

