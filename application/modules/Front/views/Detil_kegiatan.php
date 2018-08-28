	<div class="main" id="main_detil_kegiatan" style="background-color: #d4d4d4;margin-top: 120px">
        <div class="section" style="padding: 20px 0">
           <div class="container">
				<div class="row" >
                    
                    <div class="col-sm-8 col-xs-12" style="margin-top: 10px">
                        <div class="card" style="text-align: left">
                            <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-4">
                                            <a style="font-size: 18px" onclick="kembali_kegiatan()" href="#apps"><i class="material-icons">arrow_back</i><?php echo $this->lang->line('kembali')?></a>
                                        </div>
                                        <div class="col-sm-6 col-xs-8">
                                            <div class="row">
                                                <div class="col-sm-9 col-xs-8" style="text-align: right;">
                                                        <h4 class="nomargin">Arif Rahman</h4>
                                                        <p class="nomargin"><?php echo $this->lang->line('penggiat')?></p>
                                                </div>
                                                <div class="col-sm-3 col-xs-4">
                                                        <div class="photo" style="text-align: center">
                                                            <img style="width: 40px" src="http://salingbantu.or.id/assets/img/foto/user.png">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <h3 id="d_judul_kegiatan"></h3>
                                    <img class="img-responsive" id="d_img_kegiatan" src="" style="width: 100%">
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-8" id="d_kategori_kegiatan">
                                            
                                        </div>
                                        <div class="col-xs-4" id="d_status_kegiatan" style="text-align: right">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" id="list_foto_pendukung">
                                        
                                    </div>
                                    <hr>
                                    <ul class="nav nav-pills nav-pills-warning">
                                        <li class="active">
                                            <a href="#deskripsi" data-toggle="tab"><?php echo $this->lang->line('deskripsi')?></a>
                                        </li>
                                        <li>
                                            <a href="#laporan" data-toggle="tab"><?php echo $this->lang->line('laporan')?></a>
                                        </li>
                                    </ul>


                                    <div class="tab-content" style="margin-top: 20px">

                                        <div class="tab-pane active" id="deskripsi">
                                            <h4>Deskripsi kegiatan</h4>
                                            <p id="d_deskripsi_kegiatan" style="margin-top: 20px"></p>
                                        </div>


                                        <div class="tab-pane" id="laporan">
                                                        <h4>Laporan kegiatan</h4>
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

                    <div class="col-sm-4 col-xs-12" style="margin-top: 10px">
                        <div class="card" >
                            <div class="content">
                                    
                                        
                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-xs-3" style="text-align: center;">
                                            <i class="material-icons" style="font-size: 50px;color: green">date_range</i>
                                        </div>
                                        <div class="col-xs-9" style="text-align: left">
                                            <p style="margin: 0px"><?php echo $this->lang->line('periode_penggalangan')?>: <b id="d_target_hari"></b></p>
                                            <p style="margin: 0px"><?php echo $this->lang->line('sisa_hari')?>: <b id="d_sisa_hari"></b></p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-xs-3" id="d_progress">
                                            
                                        </div>
                                        <div class="col-xs-9" style="text-align: left">
                                            <p style="margin: 0px"><?php echo $this->lang->line('target_dana')?>: <b id="d_target_dana"></b></p>
                                            <p style="margin: 0px"><?php echo $this->lang->line('terkumpul')?>: <b id="d_tercapai_dana"></b></p>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <div class="col-xs-12" style="margin-top: 15px">
                                            
                                    

                                            <a style="margin-top: 10px; margin-bottom: 10px; font-size: 15px" class="btn btn-success btn-block" data-toggle="modal" data-target="#payment_front"><i class="material-icons">account_balance_wallet</i><?php echo $this->lang->line('donasi_sekarang')?></a>
                                        </div>
                                    </div>
                                        
                                        
                                    <div class="row">
                                        <hr>
                                        <div class="col-xs-12">
                                            <h4><?php echo $this->lang->line('daftar_donatur')?></h4>
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
        </div>
    </div>

<script type="text/javascript">
    
    $(document).ready(function() {
        if (window_width <= 768) {
           $("#main_detil_kegiatan").css('margin-top','60px');
        }
        else{
            $("#main_detil_kegiatan").css('margin-top','120px');
        }

        detil_kegiatan2();
        $("html, body").animate({
            scrollTop: 0
        }, 100);
    });

    function kembali_kegiatan(){
        if (asal_halaman_kegiatan == 'Home') {
            if (window_width <= 768) {
                get_content('Mobile');
            }else{
                get_content('Desktop');
            }
        }else{
            get_content('Kegiatan')
        }
    }

    function detil_kegiatan2(){
        //detil
        $.ajax({
            url : "<?php echo site_url('Front/preview_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan
            },
            dataType: "JSON",
            success: function(data)
            {
                
                $('#d_kategori_kegiatan').empty();
                 $('#d_judul_kegiatan').text(data.judul);
                 var rows = "<p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+data.nama_kategori+"</p>"
                 $(rows).appendTo("#d_kategori_kegiatan");

                if (data.status == 'DRAFT') {
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
                else if (data.status == 'BLOCK') {
                    var color = 'rgb(33, 181, 152)';
                    var icon = 'highlight_off';
                    $('#btn_update_laporan').hide();
                }

                $('#d_status_kegiatan').empty();
                var rows2 = "<p class='category' style='text-transform: uppercase; color:"+color+"'><i class='material-icons'>"+icon+"</i>"+data.status+"</p>"
                $(rows2).appendTo("#d_status_kegiatan");

                $('#d_img_kegiatan').attr('src', '<?php echo base_url()?>assets/img/content/'+data.gambar_utama);
                // $('#d_tanggal_kegiatan').text(data.date);
                
                $('#d_deskripsi_kegiatan').text(data.deskripsi);
                $('#d_target_hari').text(data.target_hari+" Hari");
                $('#d_sisa_hari').text(data.sisa_hari+" Hari");

                $('#d_target_dana').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_tercapai_dana').text("Rp. "+accounting.formatNumber(data.tercapai_dana));

                $('#d_progress').empty();
                var rows3 = "<div class='circles' style='text-align:center'><div class='second circle "+id_kegiatan+"'><strong></strong></div>"
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
            url : "<?php echo site_url('Front/daftar_donatur')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan , "jenis" : "KEGIATAN"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#d_daftar_donatur').empty();
                if (data == "") {
                    var rows = "<div class='alert alert-info'><span><?php echo $this->lang->line('belum_ada_donatur_di_kegiatan_ini')?></span></div>"
                    $(rows).appendTo("#d_daftar_donatur");
                }
                else{
                    $.each(data, function(k, v) {
                        var rows = "<div class='row' style='margin-top: 10px'><div class='col-xs-3'><div class='photo'><img style='width:70px' src='<?php echo base_url()?>"+v.img+"'></div></div><div class='col-xs-9'><p class='nomargin'>"+v.nama+"</p><p class='nomargin'><b>Rp. "+accounting.formatNumber(v.nilai_donasi)+"</b></p><p class='nomargin'>"+v.waktu+"</p></div></div>"
                        $(rows).appendTo("#d_daftar_donatur");
                    })
                }
            },
        });


        //foto pendukung
        $.ajax({
            url : "<?php echo site_url('Front/foto_pendukung')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan 
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#list_foto_pendukung').empty();
                if (data == "") {
                    var rows = "<div class='alert alert-info'><span>Tidak ada foto pendukung di kegiatan ini</span></div>"
                    $(rows).appendTo("#list_foto_pendukung");
                }
                else{
                    $.each(data, function(k, v) {
                        var rows = "<div class='col-xs-4'><img onclick=preview_image('"+v.img+"','"+v.desk+"') class='img' src='<?php echo base_url()?>assets/img/content/"+v.img+"' alt='Berita salingbantu.or.id' style='width: 100%; height:100%'></div>"
                        $(rows).appendTo("#list_foto_pendukung");
                    })
                }
            },
        });


        load_laporan_kegiatan();

    }


    function load_laporan_kegiatan(){
        //laporan 
        $.ajax({
            url : "<?php echo site_url('Front/laporan_kegiatan')?>",
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
                            rows3 = "<div class='panel panel-default' style='margin-top:15px; box-shadow:unset'><div class='panel-heading' role='tab' id='heading"+loop+"'><a role='button' data-toggle='collapse' data-parentaccordion' href='#collapse"+loop+"' aria-expanded='false' aria-controls='collapse"+loop+"' class='collapsed'><h4 class='panel-title'>"+v.judul+" , "+v.waktu+"<i class='material-icons'>keyboard_arrow_down</i></h4></a></div><div id='collapse"+loop+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+loop+"' aria-expanded='false' style='height: 0px; margin-top:-10px; background-color:whitesmoke'><div class='panel-body' style='margin:10px 10px 10px 10px; border-top:solid 1px whitesmoke'><img class='img-responsive' src='<?php echo base_url()?>/assets/img/laporan_kegiatan/"+v.img+"' style='width: 100%'><p style='margin:15px 0 10px'>"+v.deskripsi+"</p></div></div></div>"                            
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



    function preview_image(id, desk){
        $('#img_detil').empty();
        $('#deskripsi_foto').text(desk);
        //alert()
        $('#img_detil').attr('src', '<?php echo base_url()?>assets/img/content/'+id);
        if (window_width <= 768) {
           $("#width_preview_foto").css('width','90%');
        }
        else{
            $("#width_preview_foto").css('width','50%');
        }
        $('#preview_foto').modal('show');      
    }


    function donasi_kegiatan(){
        $.ajax({
            url : "<?php echo site_url('Front/donasi_kegiatan')?>",
            type: "POST",
            data: { 
                "id_kegiatan" : id_kegiatan, "nilai_donasi" : $('#d_nilai_donasi').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                swal("Sukses", "Terimakasih atas donasinya", "success")
                detil_kegiatan2();
                $('#d_nilai_donasi').val("");
                $('#d_norek').val("");
                $('#d_koderek').val(""); 
            },
        });
    }

</script>