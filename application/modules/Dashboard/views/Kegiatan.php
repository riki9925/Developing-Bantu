	           <div class="container-fluid">
					<div class="row">
                        
                        <div class="col-md-4 col-sm-6 col-xs-12">

                            <div id="notif_profile_pending3" hidden="" class="alert alert-warning alert-with-icon" style="margin-top: 20px" data-notify="container">
                                <i class="material-icons" style="color: orange" data-notify="icon">notifications</i>
                                <span data-notify="message">Untuk dapat menggalang dana, anda harus melengkapi profile terlebih dahulu.</span>
                                <h4 onclick="get_content('Setting')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Profile<i class="material-icons" style="font-size: 30px; color: white">arrow_forward</i></h4>
                            </div>


                            <div id="notif_profile_pengajuan3" hidden="" class="alert alert-info alert-with-icon" style="margin-top: 20px" data-notify="container">
                                <i class="material-icons" style="color: blue" data-notify="icon">notifications</i>
                                <span data-notify="message">Data diri anda sedang kami verifikasi. Anda dapat menggalang dana setelah data diri anda kami nyatakan valid.</span>
                            </div>

                            <div id="notif_profile_sukses3" hidden="" class="alert alert-success alert-with-icon" style="margin-top: 20px" data-notify="container">
                                <i class="material-icons" style="color: green" data-notify="icon">notifications</i>
                                <span data-notify="message">Data diri anda sudah benar.</span><h4 onclick="verifikasi_akun_saya('CLOSE')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Tutup pemberitahuan<i class="material-icons" style="font-size: 30px; color: white">close</i></h4>
                            </div>
                          

                            <div id="notif_profile_gagal3" hidden="" class="alert alert-danger alert-with-icon" style="margin-top: 20px" data-notify="container">
                                <i class="material-icons" style="color: red" data-notify="icon">notifications</i>
                                <span data-notify="message">Data diri anda belum benar, silahkan lengkapi data diri anda terlebih dahulu.</span>
                                <h4 onclick="get_content('Setting')" style="cursor: pointer;margin-bottom: 0px; font-weight: bold;">Profile<i class="material-icons" style="font-size: 30px; color: white">arrow_forward</i></h4>
                            </div>            

                                            

                                         




                            <div class="card" style="border-radius: 0px; margin-bottom: 5px; margin-top: 5px">
                                <div class="card-content" style="padding-top: 0px; padding-bottom: 0px">
                                    <div class="row">
                                        <div class="col-xs-2">
                                            <button onclick="get_content('Tambah_kegiatan')" id="btn_tambah_kegiatan" style="background-color: #4fc143" class="btn btn-round btn-green btn-fill btn-just-icon">
                                                <i class="material-icons">add</i>
                                            <div class="ripple-container"></div></button>
                                        </div>
                                        <div class="col-xs-9">
                                            <h4 style="margin-top: 17px">Galang dana baru</h4>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div id="kolom1">

                            </div>
                                                      

                        </div>   

                        <div class="col-md-4 col-sm-6 col-xs-12" id="kolom2">
                            

                        </div>


                        <div class="col-md-4 col-sm-6 col-xs-12" id="kolom3">
                            
                        </div>          


                        <div hidden="" class="col-md-12" id="pencarian_kegiatan" >
                            <div class="row card text-left" style="margin-bottom: 20px; ">

                                    <div class="col-sm-2 col-xs-12" style="border-right: solid white 1px">
                                        <h4>Pencarian</h4>
                                    </div>

                                    <div class="col-sm-3 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-3">
                                                <h4><i class="material-icons">date_range</i></h4>
                                            </div>
                                            <div class="col-sm-8 col-xs-9 pull-left" style="border-right: solid white 1px">
                                                <div class="form-group label-static" style="margin: 0px">
                                                    <input class="datepicker form-control" value="" placeholder="Tanggal" type="text">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-sm-3 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-3">
                                                <h4><i class="material-icons">sort</i></h4>
                                            </div>
                                            <div class="col-sm-8 col-xs-9 pull-left" style="border-right: solid white 1px">
                                                <div class="form-group label-static" style="margin: 0px">
                                                    <input class="datepicker form-control" value="" placeholder="Kategori" type="text">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-sm-3 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-4 col-xs-3">
                                                <h4><i class="material-icons">text_fields</i></h4>
                                            </div>
                                            <div class="col-sm-8 col-xs-9 pull-left" style="border-right: solid white 1px">
                                                <div class="form-group label-static" style="margin: 0px">
                                                    <input class="datepicker form-control" value="" placeholder="Judul" type="text">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-1 col-xs-12" style="color: white;background: transparent linear-gradient(to right, rgb(255, 78, 80), rgba(249, 171, 35, 0.87)) repeat scroll 0% 0%">
                                        <h4><i class="material-icons">arrow_forward</i></h4>
                                    </div>
                                </div>
                        </div>

					</div>

					
				</div>

<script type="text/javascript">
    var id_kegiatan;
    var id_edit = 0;
    $(document).ready(function() {
        get_kegiatan();
        detect_profile();
        
        
    });



    function get_kegiatan(){
        $.ajax({
            url: "<?php echo site_url('Dashboard/get_kegiatan')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                $('#kolom1').empty(); $('#kolom2').empty(); $('#kolom3').empty();
                var status; var color; var looping = 1; var action;

                $.each(data, function(k, v) {
                    
                    var persen = (v.tercapai_dana / v.target_dana)* 100;
                    var persen2 = v.tercapai_dana / v.target_dana;

                    if (v.status == 'LIVE') {
                        status = "<p class='category pull-left' style='color:white'><i class='material-icons'>play_circle_outline</i>LIVE</p>"; 
                        action = "<p onclick='detil_kegiatan("+v.id_kegiatan+")' class='category pull-right' style='color:white;cursor:pointer'>DETIL<i class='material-icons'>arrow_forward</i></p>";
                        color = 'rgb(22, 176, 245)';
                    }
                    else if (v.status == 'SELESAI') {
                        status = "<p class='category pull-left' style='color:white'><i class='material-icons'>verified_user</i>SELESAI</p>";
                        action = "<p onclick='detil_kegiatan("+v.id_kegiatan+")' class='category pull-right' style='color:white;cursor:pointer'>DETIL<i class='material-icons'>arrow_forward</i></p>";
                        color = 'rgb(48, 191, 162)';
                    }
                    else if (v.status == 'DRAFT') {
                        status = "<p class='category pull-left' style='color:white'><i class='material-icons'>drafts</i>DRAFT</p>";

                        if (v.gambar_utama == null) {
                            action = "<div class='dropdown pull-right'><p class='dropdown-toggle' style='color: white; cursor:pointer; margin:0 0 -10px' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i><div class='ripple-container'></div></p><ul class='dropdown-menu dropdown-menu-right' role='menu'><li hidden=''><button disabled='' class='btn btn-primary btn-simple'>Edit <div class='ripple-container'></div></button></li><li><button onclick='edit_kegiatan("+v.id_kegiatan+")' class='btn btn-primary btn-simple'>Edit <div class='ripple-container'></div></button></li><li><button onclick='delete_kegiatan("+v.id_kegiatan+")' class='btn btn-primary btn-simple'>Hapus <div class='ripple-container'></div></button></li></ul></div>";
                        }else{
                            action = "<div class='dropdown pull-right'><p class='dropdown-toggle' style='color: white; cursor:pointer; margin:0 0 -10px' data-toggle='dropdown' aria-expanded='false'><i class='material-icons'>more_vert</i><div class='ripple-container'></div></p><ul class='dropdown-menu dropdown-menu-right' role='menu'><li><button onclick='verifikasi_kegiatan("+v.id_kegiatan+")' class='btn btn-primary btn-simple'>ajukan Verifikasi<div class='ripple-container'></div></button></li><li hidden=''><button disabled='' class='btn btn-primary btn-simple'>Edit <div class='ripple-container'></div></button></li><li><button onclick='edit_kegiatan("+v.id_kegiatan+")' class='btn btn-primary btn-simple'>Edit <div class='ripple-container'></div></button></li><li><button onclick='delete_kegiatan("+v.id_kegiatan+")' class='btn btn-primary btn-simple'>Hapus <div class='ripple-container'></div></button></li></ul></div>";
                        }
                        color = 'rgb(206, 221, 60)';
                    }
                    else if (v.status == 'BLOKIR') {
                        status = "<p class='category pull-left' style='color:white'><i class='material-icons'>highlight_off</i>BLOKIR</p>";
                        action = "<p onclick='detil_kegiatan("+v.id_kegiatan+")' class='category pull-right' style='color:white;cursor:pointer'>DETIL<i class='material-icons'>arrow_forward</i></p>";
                        color = 'rgb(213, 54, 54)';
                    }
                    else if (v.status == 'PENGAJUAN') {
                        status = "<p class='category pull-left' style='color:white'><i class='material-icons'>rotate_right</i>PENGAJUAN</p>";
                        action = "<p onclick='detil_kegiatan("+v.id_kegiatan+")' class='category pull-right' style='color:white;cursor:pointer'>DETIL<i class='material-icons'>arrow_forward</i></p>";
                        color = '#4fc143';
                    }

                    if (v.gambar_utama == null) {
                        var gambar = "<div style='background:url(http://salingbantu.or.id/assets/img/cover.jpg) no-repeat; background-size:cover'><div class='card' style='width: 200px; height: 200px; margin-top: 10px; margin-bottom: 10px ;border-radius: 50%; display: block;background-color: whitesmoke; margin-left:50px' align='center'><img style='width: 40%; margin-top: 50px' src='http://salingbantu.or.id/assets/img/file.png'><h4>Upload foto utama</h4></div></div>";
                    }else{
                        var gambar = "<img class='img' src='<?php echo base_url()?>assets/img/content/"+v.gambar_utama+"' style='width: 100%'>";
                    }

                    if (v.status != 'DRAFT' && v.status != 'PENGAJUAN') {
                        rows ="<div class='card'  style='border-radius: 0px; margin-top: 5px; margin-bottom: 5px; '><div class='card-header' style='background-color: "+color+"; padding:15px 20px 15px'><div class='row' ><div class='col-xs-6'>"+status+"</div><div class='col-xs-6' style='text-align:right'>"+action+"</div></div></div><div class='card-content'><div class='row'><div class='col-xs-12' style='padding:0px'><h5 style='margin-top: 0px; margin-left: 5px; margin-right: 5px'>"+v.judul+"</h5>"+gambar+"<div class='row' style='margin-top: 10px'><hr><div class='col-xs-6'><p class='category pull-left' style='color: #4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-6'><p  class='category pull-right' style='color:#F9690E'><i class='material-icons'>location_on</i>"+v.nama_kota+"</p></div></div><hr><div class='row' style='margin-top: 15px'><div class='col-md-3 col-sm-3 col-xs-3' style='text-align: left'><div class='circles'><div class='second circle "+v.id_kegiatan+"'><strong></strong></div></div></div><div class='col-md-5 col-sm-5 col-xs-5' style='text-align: left'><p style='margin-bottom: 0px'>Terkumpul</p><p><b>Rp. "+accounting.formatNumber(v.tercapai_dana)+"</b></p></div><div class='col-md-4 col-sm-4 col-xs-4' style='text-align: left'><p style='margin-bottom: 0px'>Sisa waktu</p><p><b>"+v.sisa_hari+" Hari</b></p></div></div></div></div></div></div>";
                    }
                    else{
                        rows ="<div class='card'  style='border-radius: 0px; margin-top: 5px; margin-bottom: 5px; '><div class='card-header' style='background-color: "+color+"; padding:15px 20px 15px'><div class='row' ><div class='col-xs-6'>"+status+"</div><div class='col-xs-6' style='text-align:right'>"+action+"</div></div></div><div class='card-content'><div class='row'><div class='col-xs-12' style='padding:0px'><h5 style='margin-top: 0px; margin-left: 5px; margin-right: 5px'>"+v.judul+"</h5>"+gambar+"<div class='row' style='margin-top: 10px'><hr><div class='col-xs-6'><p class='category pull-left' style='color:#4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-6'><p  class='category pull-right' style='color:#F9690E'><i class='material-icons'>location_on</i>"+v.nama_kota+"</p></div></div></div></div></div></div>";
                    }
                    if (looping == 1) {
                        $(rows).appendTo("#kolom1");
                    }
                    else if (looping == 2) {
                        $(rows).appendTo("#kolom2");
                    }
                    else if (looping == 3) {
                        $(rows).appendTo("#kolom3");
                        looping = 0;
                    }
                    

                    $('.second.circle.'+v.id_kegiatan).circleProgress({
                        value: persen2
                    }).on('circle-animation-progress', function(event, progress) {
                        $(this).find('strong').html(Math.round(persen * progress) + '<i>%</i>');
                    });

                    looping += 1;
                });
                
            }
        });
    }


    function edit_kegiatan(id){
        id_edit = id;
        get_content('Tambah_kegiatan');
    }


    function detil_kegiatan(id){
        id_kegiatan = id;
        get_content('Detil_kegiatan');
    }

    function load_kategori(){
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


    function get_kota_kegiatan(){
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

    $('#btn_tambah_kegiatan').on('click', function(){
        load_kategori();
    });
    

    


    function verifikasi_kegiatan(id){
            swal({
                    title: 'Verifikasi kegiatan',
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
                      "id" : id
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        get_kegiatan();
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
    }



    function delete_kegiatan(id){
            swal({
                    title: 'Hapus kegiatan?',
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
                    url : "<?php echo site_url('Dashboard/hapus_kegiatan')?>",
                    type: "POST",
                    data: { 
                      "id" : id
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        get_kegiatan();
                    },
                    
                });     
                
                swal({
                    title: 'Sukses',
                    text: 'Draft kegiatan telah terhapus',
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


    

</script>