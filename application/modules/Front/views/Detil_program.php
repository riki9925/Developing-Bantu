	<div class="main" id="main_detil_program" style="background-color: #d4d4d4;margin-top: 120px">
        <div class="section" style="padding: 20px 0">
           <div class="container">
				<div class="row" >
                    
                    <div class="col-sm-8 col-xs-12" style="margin-top: 10px">
                        <div class="card" style="text-align: left">
                            <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-4">
                                            <a style="font-size: 18px" onclick="kembali_program()" href="#apps"><i class="material-icons">arrow_back</i><?php echo $this->lang->line('kembali')?></a>
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
                                    <h3 id="d_judul_program"></h3>
                                    <img class="img-responsive" id="d_img_program" src="" style="width: 100%">
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-8" id="d_kategori_program">
                                            
                                        </div>
                                        <div class="col-xs-4" id="d_status_program" style="text-align: right">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row" id="list_foto_pendukung_prg">
                                        
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
                                            <h4>Deskripsi program</h4>
                                            <p id="d_deskripsi_program" style="margin-top: 20px"></p>
                                        </div>


                                        <div class="tab-pane" id="laporan">
                                                        <h4>Laporan program</h4>
                                                        <div id="laporan_kosong_prg">
                                                            
                                                        </div>

                                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true" >
                                                            <div id="laporan_kegiatan_prg"></div>
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
                                            <p style="margin: 0px"><?php echo $this->lang->line('periode_penggalangan')?>: <b id="d_target_hari_prg"></b></p>
                                            <p style="margin: 0px">Tanggal berakhir: <b id="d_sisa_hari_prg"></b></p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-xs-3" id="d_progress_prg">
                                            
                                        </div>
                                        <div class="col-xs-9" style="text-align: left">
                                            <p style="margin: 0px"><?php echo $this->lang->line('target_dana')?>: <b id="d_target_dana_prg"></b></p>
                                            <p style="margin: 0px">Terkumpul: <b id="d_tercapai_dana_prg"></b></p>
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

                                        <div class="col-xs-12" id="d_daftar_donatur_prg">
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
           $("#main_detil_program").css('margin-top','60px');
        }
        else{
            $("#main_detil_program").css('margin-top','120px');
        }

        detil_program2();
        $("html, body").animate({
            scrollTop: 0
        }, 100);
    });



    function kembali_program(){
        if (asal_halaman_program == 'Home') {
            if (window_width <= 768) {
                get_content('Mobile');
            }else{
                get_content('Desktop');
            }
        }else{
            get_content('Jaringan_global');
        }
    }

    function detil_program2(){
        $.ajax({
            url : "<?php echo site_url('Front/preview_program')?>",
            type: "POST",
            data: { 
                "id" : id_program
            },
            dataType: "JSON",
            success: function(data)
            {
                
                $('#d_kategori_program').empty();
                 $('#d_judul_program').text(data.judul);
                 var rows = "<p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+data.nama_kategori+"</p>"
                 $(rows).appendTo("#d_kategori_program");

                if (data.status == 'DRAFT') {
                    var color = 'rgb(206, 221, 60)';
                    var icon = 'rotate_right';
                    $('#btn_update_laporan_prg').hide();
                }
                else if (data.status == 'LIVE') {
                    var color = '#f83600';
                    var icon = 'play_circle_outline';
                    $('#btn_update_laporan_prg').show();
                }
                else if (data.status == 'SELESAI') {
                    var color = '#36d1dc';
                    var icon = 'verified_user';
                    $('#btn_update_laporan_prg').hide();
                }
                else if (data.status == 'BLOCK') {
                    var color = 'rgb(33, 181, 152)';
                    var icon = 'highlight_off';
                    $('#btn_update_laporan_prg').hide();
                }

                $('#d_status_program').empty();
                var rows2 = "<p class='category' style='text-transform: uppercase; color:"+color+"'><i class='material-icons'>"+icon+"</i>"+data.status+"</p>"
                $(rows2).appendTo("#d_status_program");

                $('#d_img_program').attr('src', '<?php echo base_url()?>assets/img/program_terkini/'+data.gambar_utama);
                
                $('#d_deskripsi_program').text(data.deskripsi);
                $('#d_target_hari_prg').text(data.target_hari+" Hari");
                $('#d_sisa_hari_prg').text(data.tanggal_berakhir);

                $('#d_target_dana_prg').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_tercapai_dana_prg').text("Rp. "+accounting.formatNumber(data.tercapai_dana));

                $('#d_progress_prg').empty();
                var rows3 = "<div class='circles' style='text-align:center'><div class='second circle "+data.id+"'><strong></strong></div>"
                $(rows3).appendTo("#d_progress_prg");
                
                var persen = (data.tercapai_dana / data.target_dana)* 100;
                var persen2 = data.tercapai_dana / data.target_dana;

                
                $('.second.circle.'+data.id).circleProgress({
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
                "id" : id_kegiatan , "jenis" : "PROGRAM TERKINI"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#d_daftar_donatur_prg').empty();
                if (data == "") {
                    var rows = "<div class='alert alert-info'><span><?php echo $this->lang->line('belum_ada_donatur_di_kegiatan_ini')?></span></div>"
                    $(rows).appendTo("#d_daftar_donatur_prg");
                }
                else{
                    $.each(data, function(k, v) {
                        var rows = "<div class='row' style='margin-top: 10px'><div class='col-xs-3'><div class='photo'><img style='width:70px' src='<?php echo base_url()?>"+v.img+"'></div></div><div class='col-xs-9'><p class='nomargin'>"+v.nama+"</p><p class='nomargin'><b>Rp. "+accounting.formatNumber(v.nilai_donasi)+"</b></p><p class='nomargin'>"+v.waktu+"</p></div></div>"
                        $(rows).appendTo("#d_daftar_donatur_prg");
                    })
                }
            },
        });


        //foto pendukung
        $.ajax({
            url : "<?php echo site_url('Front/foto_pendukung_prg')?>",
            type: "POST",
            data: { 
                "id" : id_program 
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#list_foto_pendukung_prg').empty();
                if (data == "") {
                    var rows = "<div class='alert alert-info'><span>Tidak ada foto pendukung di program ini</span></div>"
                    $(rows).appendTo("#list_foto_pendukung_prg");
                }
                else{
                    $.each(data, function(k, v) {
                        var rows = "<div class='col-xs-4'><img onclick=preview_image_prg('"+v.img+"','"+v.desk+"') class='img' src='<?php echo base_url()?>assets/img/program_terkini/"+v.img+"' alt='Program salingbantu.or.id' style='width: 100%; height:100%'></div>"
                        $(rows).appendTo("#list_foto_pendukung_prg");
                    })
                }
            },
        });


        load_laporan_kegiatan_prg();

    }


    function load_laporan_kegiatan_prg(){
        //laporan 
        $.ajax({
            url : "<?php echo site_url('Front/laporan_program')?>",
            type: "POST",
            data: { 
                "id" : id_kegiatan
            },
            dataType: "JSON",
            success: function(data)
            {
                
                if (data == "") {
                    $('#laporan_kosong_prg').empty();
                    $('#laporan_kegiatan_prg').hide();
                    $('#laporan_kosong_prg').show();

                    var rows2 = "<div class='alert alert-info'><div class='container-fluid'><div class='alert-icon'><i class='material-icons'>info_outline</i></div><b>Informasi:</b> Belum ada laporan terbaru untuk program ini.</div></div>"
                    $(rows2).appendTo("#laporan_kosong_prg");
                }
                else{
                    $('#laporan_kegiatan_prg').empty();
                    $('#laporan_kegiatan_prg').show();
                    $('#laporan_kosong_prg').hide();

                    var loop = 1;
                    var rows3;
                    $.each(data, function(k, v) {
                        if (loop == 1) {
                            rows3 = "<div class='panel panel-default' style='margin-top:15px; box-shadow:unset'><div class='panel-heading' role='tab' id='heading_prg"+loop+"'><a role='button' data-toggle='collapse_prg' data-parentaccordion' href='#collapse_prg"+loop+"' aria-expanded='false' aria-controls='collapse_prg"+loop+"' class='collapsed'><h4 class='panel-title'>"+v.judul+" , "+v.waktu+"<i class='material-icons'>keyboard_arrow_down</i></h4></a></div><div id='collapse_prg"+loop+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading_prg"+loop+"' aria-expanded='false' style='height: 0px; margin-top:-10px; background-color:whitesmoke'><div class='panel-body' style='margin:10px 10px 10px 10px; border-top:solid 1px whitesmoke'><img class='img-responsive' src='<?php echo base_url()?>/assets/img/program_terkini/"+v.img+"' style='width: 100%'><p style='margin:15px 0 10px'>"+v.deskripsi+"</p></div></div></div>"                            
                        }
                        else{
                            rows3 = "<div class='panel panel-default'><div class='panel-heading' role='tab' id='heading_prg"+loop+"'><a role='button' data-toggle='collapse' data-parentaccordion' href='#collapse_prg"+loop+"' aria-expanded='false' aria-controls='collapse_prg"+loop+"' class='collapsed'><h4 class='panel-title'>"+v.judul+" , "+v.waktu+"<i class='material-icons'>keyboard_arrow_down</i></h4></a></div><div id='collapse_prg"+loop+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading_prg"+loop+"' aria-expanded='false' style='height: 0px;'><div class='panel-body' style='margin:10px 10px 10px 10px; border-top:solid 1px whitesmoke'><img class='img-responsive' src='<?php echo base_url()?>/assets/img/program_terkini/"+v.img+"' style='width: 100%'><p style='margin:15px 0 10px'>"+v.deskripsi+"</p></div></div></div>"
                        }
                        
                        $(rows3).appendTo("#laporan_kegiatan_prg");
                        loop += 1;
                    })
                }
            },
        });
    }



    function preview_image_prg(id, desk){
        alert()
        $('#img_detil').empty();
        $('#deskripsi_foto').text(desk);
        //alert()
        $('#img_detil').attr('src', '<?php echo base_url()?>assets/img/program_terkini/'+id);
        if (window_width <= 768) {
           $("#width_preview_foto").css('width','90%');
        }
        else{
            $("#width_preview_foto").css('width','50%');
        }
        $('#preview_foto').modal('show');       
    }


    

</script>