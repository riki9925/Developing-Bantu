	<div class="container-fluid">
					<div class="row">
                                                

                        <div class="col-sm-8 col-xs-12">
                            
                                


                                <div class="card" style="border-radius: 5px; margin-top: 0px; margin-bottom: 5px; ">
                                    <div class="card-header" id="card_header" style="background-color: #4fc143; padding:15px 20px 15px; border-top-left-radius: 5px; border-top-right-radius: 5px">
                                        <div class="row">
                                            <div class="col-xs-6">
                                                <a style="color: white" onclick="get_content('Kegiatan')" href="#apps"><i class="material-icons">arrow_back</i>KEMBALI</a>
                                            </div>
                                            <div class="col-xs-6" id="d_status_kegiatan" style="text-align: right">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-content">
                                        <div class="row">
                                            <div class="col-xs-12" style="padding:0px">
                                                <h4 id="d_judul_kegiatan"></h4>
                                                <img class="img-responsive" id="d_img_kegiatan" src="" style="width: 100%">
                                                
                                                <div class="row" style="margin-top: 10px">
                                                    <div class="col-xs-8" id="d_kategori_kegiatan">
                                                        
                                                    </div>
                                                    <div class="col-xs-4">
                                                        
                                                    </div>
                                                </div>
                                                
                                                <hr>

                                                <ul class="nav nav-pills nav-pills-warning" style="margin-right: 10px; margin-left: 10px">
                                                    <li class="active">
                                                        <a href="#deskripsi" data-toggle="tab">Deskripsi</a>
                                                    </li>
                                                    <li>
                                                        <a href="#laporan" data-toggle="tab">Laporan</a>
                                                    </li>
                                                </ul>

                                                <div class="row" hidden="">
                                                    <div class="col-xs-4">
                                                        <a style="font-size: 18px" href="#deskripsi" data-toggle="tab"><i class="material-icons">format_size</i> Deskripsi</a>
                                                    </div>
                                                    <div class="col-xs-4">
                                                        <a href="#laporan" data-toggle="tab">Laporan</a>
                                                    </div>
                                                </div>

                                                <div class="tab-content" style="background-color: whitesmoke; margin-right: 10px; margin-left: 10px; padding: 10px">

                                                    <div class="tab-pane active"  id="deskripsi">
                                                        <h4>Deskripsi kegiatan</h4>
                                                        <p id="d_deskripsi_kegiatan"></p>
                                                    </div>


                                                    <div class="tab-pane" id="laporan">
                                                        <h4>Laporan Kegiatan</h4>
                                                        <div id="laporan_kosong">
                                                            
                                                        </div>

                                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
                                                            <div id="laporan_kegiatan"></div>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>


                        <div class="col-sm-4 col-xs-12">
                            <div class="card" style="margin-top: 0px">

                                <div class="card-content">

                                    <div class="row">
                                        <div class="col-xs-12">
                                            <a id="btn_update_laporan" class="btn btn-info btn-block" data-toggle="modal" data-target="#update_kegiatan" ><i class="material-icons">add</i>UPDATE LAPORAN</a>
                                            <hr>
                                        </div>
                                    </div>

                                        
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <i class="material-icons" style="font-size: 40px;color: green">date_range</i>
                                        </div>
                                        <div class="col-xs-9">
                                            <p style="margin: 0px">Periode penggalangan: <b id="d_target_hari"></b></p>
                                            <p style="margin: 0px">Sisa hari: <b id="d_sisa_hari"></b></p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-xs-3" id="d_progress">
                                            
                                        </div>
                                        <div class="col-xs-9">
                                            <p style="margin: 0px">Target dana: <b id="d_target_dana"></b></p>
                                            <p style="margin: 0px">Terkumpul: <b id="d_tercapai_dana"></b></p>
                                        </div>
                                    </div>
                                        
                                        
                                    <div class="row">
                                        <hr>
                                        <div class="col-xs-12">
                                            <h4>Daftar Donatur</h4>
                                        </div>

                                        <div class="col-xs-12" id="d_daftar_donatur">
                                            <!-- daftar donatur -->
                                        </div>
                                    </div>

                                    
                                </div>
                            </div>
                        </div>
                        						
						
					</div>

					
				</div>

<style type="text/css">
    .panel .panel-heading{
        background-color: white;
        padding: 15px 10px 15px 10px; 
        border-bottom: unset;
    }

    .collapse.in{
        background-color:white;
        margin-top: -10px;
    }
</style>

<script type="text/javascript">
    
    $(document).ready(function() {
        detil_kegiatan2();
    });

    

    function detil_kegiatan2(){
        //detil
        $.ajax({
            url : "<?php echo site_url('Dashboard/preview_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan
            },
            dataType: "JSON",
            success: function(data)
            {
                
                // $('#d_id_kegiatan').text(data.id_kegiatan);
                 $('#d_judul_kegiatan').text(data.judul);
                 var rows = "<p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+data.nama_kategori+"</p>";
                
                 $(rows).appendTo("#d_kategori_kegiatan");

                if (data.status == 'DRAFT') {
                    var color = 'rgb(206, 221, 60)';
                    var icon = 'rotate_right';
                    $('#btn_update_laporan').hide();
                }
                if (data.status == 'PENGAJUAN') {
                    var color = 'rgb(206, 221, 60)';
                    var icon = 'rotate_right';
                    $('#btn_update_laporan').hide();
                }
                else if (data.status == 'LIVE') {
                    var color = '#f83600';
                    var icon = 'play_circle_outline';
                    $('#btn_update_laporan').show();
                }
                else if (data.status == 'SELESAI') {
                    var color = '#36d1dc';
                    var icon = 'verified_user';
                    $('#btn_update_laporan').hide();
                }
                else if (data.status == 'BLOKIR') {
                    var color = 'rgb(33, 181, 152)';
                    var icon = 'highlight_off';
                    $('#btn_update_laporan').hide();
                }

                $('#card_header').css('background-color',color);

                var rows2 = "<p class='category' style='text-transform: uppercase; color:white'><i class='material-icons'>"+icon+"</i>"+data.status+"</p>"
                $(rows2).appendTo("#d_status_kegiatan");


                if (data.gambar_utama == null) {
                    $('#d_img_kegiatan').attr('src', '<?php echo base_url()?>'+"assets/img/content/1.jpg");
                }
                else{
                    $('#d_img_kegiatan').attr('src', '<?php echo base_url()?>assets/img/content/'+data.gambar_utama);
                }
                
                // $('#d_tanggal_kegiatan').text(data.date);
                
                $('#d_deskripsi_kegiatan').text(data.deskripsi);
                $('#d_target_hari').text(data.target_hari+" Hari");
                $('#d_sisa_hari').text(data.sisa_hari+" Hari");

                $('#d_target_dana').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_tercapai_dana').text("Rp. "+accounting.formatNumber(data.tercapai_dana));


                var rows3 = "<div class='circles'><div class='second circle "+id_kegiatan+"'><strong></strong></div>"
                $(rows3).appendTo("#d_progress");
                
                var persen = (data.tercapai_dana / data.target_dana)* 100;
                var persen2 = data.tercapai_dana / data.target_dana;

                
                $('.second.circle.'+id_kegiatan).circleProgress({
                        value: persen2
                }).on('circle-animation-progress', function(event, progress) {
                        $(this).find('strong').html(Math.round(persen * progress) + '<i>%</i>');
                });
            },
        });

        //donatur 
        $.ajax({
            url : "<?php echo site_url('Dashboard/daftar_donatur')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#d_daftar_donatur').empty();
                if (data == "") {
                    var rows = "<div class='alert alert-info'><div class='container-fluid'><div class='alert-icon'><i class='material-icons'>info_outline</i></div><b>Informasi:</b> Belum ada donatur untuk kegiatan ini.</div></div>"
                    $(rows).appendTo("#d_daftar_donatur");
                }
                else{
                    $.each(data, function(k, v) {
                        var rows = "<div class='row' style='margin-top: 10px'><div class='col-xs-3'><div class='photo'><img src='<?php echo base_url()?>"+v.img+"'></div></div><div class='col-xs-9'><p class='nomargin'>"+v.nama+"</p><p class='nomargin'><b>Rp. "+accounting.formatNumber(v.nilai_donasi)+"</b></p><p class='nomargin'>"+v.waktu+"</p></div></div>"
                        $(rows).appendTo("#d_daftar_donatur");
                    })
                }
            },
        });

        load_laporan_kegiatan();
        
    }


    function load_laporan_kegiatan(){
        //laporan 
        $.ajax({
            url : "<?php echo site_url('Dashboard/laporan_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan
            },
            dataType: "JSON",
            success: function(data)
            {
                
                if (data == "") {
                    $('#laporan_kosong').empty();
                    $('#laporan_kegiatan').hide();
                    $('#laporan_kosong').show();

                    var rows2 = "<div class='alert alert-info'><div class='container-fluid'><div class='alert-icon'><i class='material-icons'>info_outline</i></div><b>Informasi:</b> Belum ada laporan terbaru untuk kegiatan ini.</div></div>"
                    $(rows2).appendTo("#laporan_kosong");
                }
                else{
                    $('#laporan_kegiatan').empty();
                    $('#laporan_kegiatan').show();
                    $('#laporan_kosong').hide();

                    

                    var loop = 1;
                    var rows3;
                    $.each(data, function(k, v) {
                        if (loop == 1) {
                            rows3 = "<div class='panel panel-default'><div class='panel-heading' role='tab' id='heading"+loop+"'><a role='button' data-toggle='collapse' data-parentaccordion' href='#collapse"+loop+"' aria-expanded='false' aria-controls='collapse"+loop+"' class='collapsed'><h4 class='panel-title'>"+v.judul+" , "+v.waktu+"<i class='material-icons'>keyboard_arrow_down</i></h4></a></div><div id='collapse"+loop+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+loop+"' aria-expanded='false' style='height: 0px;'><div class='panel-body' style='margin:10px 10px 10px 10px; border-top:solid 1px whitesmoke'><img class='img-responsive' src='<?php echo base_url()?>/assets/img/laporan_kegiatan/"+v.img+"' style='width: 100%'><p style='margin:15px 0 10px'>"+v.deskripsi+"</p></div></div></div>"                            
                        }
                        else{
                            rows3 = "<div class='panel panel-default'><div class='panel-heading' role='tab' id='heading"+loop+"'><a role='button' data-toggle='collapse' data-parentaccordion' href='#collapse"+loop+"' aria-expanded='false' aria-controls='collapse"+loop+"' class='collapsed'><h4 class='panel-title'>"+v.judul+" , "+v.waktu+"<i class='material-icons'>keyboard_arrow_down</i></h4></a></div><div id='collapse"+loop+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+loop+"' aria-expanded='false' style='height: 0px;'><div class='panel-body' style='margin:10px 10px 10px 10px; border-top:solid 1px whitesmoke'><img class='img-responsive' src='<?php echo base_url()?>/assets/img/laporan_kegiatan/"+v.img+"' style='width: 100%'><p style='margin:15px 0 10px'>"+v.deskripsi+"</p></div></div></div>"
                        }
                        
                        $(rows3).appendTo("#laporan_kegiatan");
                        loop += 1;
                    })
                }
            },
        });
    }



    function update_laporan_kegiatan(){
        //detil
        $.ajax({
            url : "<?php echo site_url('Dashboard/update_laporan_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan, "judul" : $('#update_judul_kegiatan').val(), "deskripsi" : $('#update_deskripsi_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                upload_img_update_kegiatan(data.id_kegiatan);                
            },
        });

    }

    function upload_img_update_kegiatan(id) {

        
                var file_data = $('#wizard-picture_update').prop('files')[0];
                    
                    var form_data = new FormData();
                    form_data.append('wizard-picture_update', file_data);
                    $.ajax({
                        url: "<?php echo site_url('Dashboard/upload_file_update_kegiatan')?>/"+id, 
                        dataType: 'text', 
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            swal("Sukses", "Laporan kegiatan talah diperbarui", "success");
                            load_laporan_kegiatan();
                            $('#update_judul_kegiatan').val("");
                            $('#update_deskripsi_kegiatan').val("")
                        },
                        error: function (response) {
                            swal("Informasi", response)
                        }
                });
    }


</script>