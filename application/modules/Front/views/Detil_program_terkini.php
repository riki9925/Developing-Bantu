	<div class="main" style="background-color: transparent;">
        <div class="section" style="padding: 20px 0">
           <div class="container">
				<div class="row" >
                    
                    <div class="col-sm-8 col-xs-12" style="margin-top: 10px">
                        <div class="card" style="text-align: left">
                            <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-5">
                                            <a style="font-size: 18px" onclick="get_content('Program_terkini')" href="#apps"><i class="material-icons">arrow_back</i>Kembali</a>
                                        </div>
                                        <!-- <div class="col-sm-6 col-xs-7">
                                            <div class="row">
                                                <div class="col-sm-9 col-xs-8" style="text-align: right;">
                                                        <h4 class="nomargin">Arif Rahman</h4>
                                                        <p class="nomargin">Penggiat</p>
                                                </div>
                                                <div class="col-sm-3 col-xs-4">
                                                        <div class="photo" style="text-align: center">
                                                            <img style="width: 40px" src="http://salingbantu.or.id/assets/img/foto/user.png">
                                                        </div>
                                                    </div>
                                            </div>
                                        </div> -->
                                    </div>
                                    <hr>
                                    <h3 id="d_judul_program_terkini"></h3>
                                    <a href="#"><img class="img-responsive" id="d_img_program_terkini" src="" style="width: 100%"></a>
                                    <br>
                                    <div class="row">
                                        <div class="col-xs-8" id="d_kategori_program_terkini">
                                            
                                        </div>
                                    </div>
                                    <hr>
                                    <h4 id="d_deskripsi_program_terkini" style="margin-top: 20px"></h4>
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
                                            <p style="margin: 0px">Periode penggalangan: <b id="d_target_hari_program_terkini"></b></p>
                                            <p style="margin: 0px">Sisa hari: <b id="d_sisa_hari_program_terkini"></b></p>
                                        </div>
                                    </div>

                                    <div class="row" style="margin-top: 15px">
                                        <div class="col-xs-3" id="d_progress_program_terkini">
                                            
                                        </div>
                                        <div class="col-xs-9" style="text-align: left">
                                            <p style="margin: 0px">Target dana: <b id="d_target_dana_program_terkini"></b></p>
                                            <p style="margin: 0px">Terkumpul: <b id="d_tercapai_dana_program_terkini"></b></p>
                                        </div>
                                    </div>


                                    <div class="row">
                                        <hr>
                                        <div class="col-xs-12">
                                            <a style="margin-top: 20px; margin-bottom: 20px; font-size: 15px" class="btn btn-success btn-block" data-toggle="modal" data-target="#donasi"><i class="material-icons" style="font-size: 20px">account_balance_wallet</i>Donasi sekarang</a>
                                        </div>
                                    </div>
                                        
                                        
                                    <div class="row">
                                        <hr>
                                        <div class="col-xs-12">
                                            <h4>Daftar Donatur</h4>
                                        </div>

                                        <div class="col-xs-12" id="d_daftar_donatur_program_terkini">
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
        detil_program_terkini2();
    });

    

    function detil_program_terkini2(){
        //detil
        $.ajax({
            url : "<?php echo site_url('Front/preview_program_terkini')?>",
            type: "POST",
            data: { 
                "id" : id_program_terkini
            },
            dataType: "JSON",
            success: function(data)
            {
                
                $('#d_kategori_program_terkini').empty();
                 $('#d_judul_program_terkini').text(data.judul);
                 var rows = "<p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+data.nama_kategori+"</p>"
                 $(rows).appendTo("#d_kategori_program_terkini");



                $('#d_img_program_terkini').attr('src', '<?php echo base_url()?>assets/img/program_terkini/'+data.gambar_utama);
                
                $('#d_deskripsi_program_terkini').text(data.deskripsi);
                $('#d_target_hari_program_terkini').text(data.target_hari+" Hari");
                $('#d_sisa_hari_program_terkini').text(data.sisa_hari+" Hari");

                $('#d_target_dana_program_terkini').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_tercapai_dana_program_terkini').text("Rp. "+accounting.formatNumber(data.tercapai_dana));

                $('#d_progress_program_terkini').empty();
                var rows3 = "<div class='circles' style='text-align:center'><div class='second circle "+data.id+"'><strong></strong></div>"
                $(rows3).appendTo("#d_progress_program_terkini");
                
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
                "id" : id_program_terkini, "jenis" : "PROGRAM TERKINI"
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#d_daftar_donatur_program_terkini').empty();
                if (data == "") {
                    var rows = "<div class='alert alert-info'><span>Belum ada donatur di program ini.</span></div>"
                    $(rows).appendTo("#d_daftar_donatur_program_terkini");
                }
                else{
                    $.each(data, function(k, v) {
                        var rows = "<div class='row' style='margin-top: 10px'><div class='col-xs-3'><div class='photo'><img style='width:70px' src='<?php echo base_url()?>"+v.img+"'></div></div><div class='col-xs-9'><p class='nomargin'>"+v.nama+"</p><p class='nomargin'><b>Rp. "+accounting.formatNumber(v.nilai_donasi)+"</b></p><p class='nomargin'>"+v.waktu+"</p></div></div>"
                        $(rows).appendTo("#d_daftar_donatur_program_terkini");
                    })
                }
            },
        });
    }


  

</script>