
		<div id="header_program_terkini" class="header"  style="background-image: url('<?php echo base_url()?>assets/img/desk.png'); background-size: cover;height: 60vh; min-height: auto">
            <div class="container" style="padding-top: 20vh; width: 80%">
                <div class="row">
					<div class="col-md-7" style="color: black; margin-left: 20px">
						<p id="judul_program_terkini" style="font-weight: inherit;color: #4fc143">Program-program unggulan yayasan salingbantu</p>
						<p id="deskripsi_program_terkini"></p>
					</div>
                </div>
            </div>
        </div>

        <div class="main" style="background-color: transparent; margin-top: 30px; margin-bottom: 30px">
			<div class="container" style="width: 90%">
				<div  class="section text-center section-landing" style=" padding: 10px 0">
					<div class="container" style="width: 100%">
						
						<div class="row" style="margin-top: 20px; margin-left: -35px; margin-right: -35px">
								<div class="col-md-4 col-xs-12">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">keyboard</i>
										</span>
										<div class="form-group is-empty">
											<input id="cari_program" style="font-size: 20px" class="form-control" placeholder="Judul program" type="text">
											<p align="left">Tekan ENTER untuk pencarian</p>
										</div>
									</div>
								</div>

								<div class="col-md-3 col-xs-12">
									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">sort</i>
										</span>
										<div class="form-group label-floating is-empty">
                                        	<select onchange="get_program_2()" id="kategori" class="form-control">
	                                            <option selected="" value="Semua">Semua kategori</option>
	                                            <?php
	                                            	$query = $this->db->query("SELECT id_kategori, nama_kategori from kategori_kegiatan where status = 'ACTIVE'");
	                                            	foreach ($query->result() as $row) {
	                                            		echo "<option value='".$row->id_kategori."'>".$row->nama_kategori."</option>";
	                                            	}
	                                            ?>
                                        	</select>
                                    	<span class="material-input"></span></div>
                                    </div>
								</div>

								<div class="col-md-3 ">
									<div class="input-group" style="display: none">
										<span class="input-group-addon">
											<i class="material-icons">date_range</i>
										</span>
										<div class="form-group label-floating is-empty">
											<div class="row">
												<div class="col-md-4">
													<select name="date" class="form-control" hidden="">
                                                            <option selected="">01</option>
                                                            <option>02</option>
                                                            <option>03</option>
                                                            <option>04</option>
                                                            <option>05</option>
                                                            <option>06</option>
                                                            <option>07</option>
                                                            <option>08</option>
                                                            <option>09</option>
                                                            <option>10</option>
                                                            <option>11</option>
                                                            <option>12</option>
                                            		</select>
												</div>
												<div class="col-md-6">
													<select name="date" class="form-control" hidden="">
                                                            <option value="01" selected="">Januari</option>
                                                            <option value="02">Februari</option>
                                                            <option value="03">Maret</option>
                                                            <option value="04">April</option>
                                                            <option value="05">Mei</option>
                                                            <option value="06">Juni</option>
                                                            <option value="07">Juli</option>
                                                            <option value="08">Agustus</option>
                                                            <option value="09">September</option>
                                                            <option value="10">Oktober</option>
                                                            <option value="11">November</option>
                                                            <option value="12">Desember</option>
                                            		</select>
												</div>
											</div>
                                            
                                        </div>
									</div>
								</div> 

								<div class="col-md-1 col-xs-6" style="margin-top: 25px; padding-left: 25px">
									<h4 id="terbaru" onclick="terbaru()" align="center" style="cursor: pointer;border-bottom: solid;font-weight: bold">Terbaru</h4>
								</div>

								<div class="col-md-1 col-xs-6" style="margin-top: 25px; padding-right: 25px">
									<h4 id="terlama" onclick="terlama()" align="center" style="cursor: pointer;">Terlama</h4>
								</div>

								<div class="col-md-12" style="margin-bottom: 20px"></div>

								<div class="col-md-4 col-sm-6 col-xs-12" id="kolom_1_">
		                        </div>
		                        <div class="col-md-4 col-sm-6 col-xs-12" id="kolom_2_">
		                        </div>
		                        <div class="col-md-4 col-sm-6 col-xs-12" id="kolom_3_">
		                        </div>

		                        <div class="col-md-12 col-xs-12" onclick="up_page()" align="center" style="margin-top: 30px">
		                        	<button class="btn btn-white btn-fab btn-fab-large btn-round">
										<i class="material-icons">arrow_upward</i>
									<div class="ripple-container"></div></button>
		                        </div>
						</div>
					</div>
				</div>

			</div>
		</div>

		<div class="main" style="background-color: white; ">
			<div class="container">
				<!-- footer -->
				<div  class="section text-center section-landing" style="padding: 10px 0">
					    	<div class="container" style="width: 100%">
			    				<div id="footer-areas" style="margin-top: 20px">
						            <footer class="footer footer-white footer-big">
						                <div class="container">

						                    <div class="content" hidden="">
						                        <div class="row">

						                          <div class="col-md-3" style="text-align: left">
						                            <a href="#pablo"><h5 class="bree"><?php echo $nama_website; ?></h5></a>
						                            <p><?php echo $deskripsi_singkat; ?></p>
						                          </div>

						                          <div class="col-md-3" style="text-align: left">
						                            <a href="#pablo"><h5 class="bree">Contact</h5></a>
						                            <p><?php echo $alamat; ?></p>
						                            <p><?php echo $email; ?></p>
						                            <p><?php echo $telephone; ?></p>
						                          </div>

						                          <div class="col-md-2" style="text-align: left">
						                            <h5 class="bree">About</h5>
						                            <p>About Us</p>			                            
						                            <p>FAQ</p>
						                          </div>

						                          
						                          <div class="col-md-4" style="text-align: left">
						                            <h5>Subscribe to Newsletter</h5>
						                            <p>
						                              Dapatkan update informasi setiap saat dengan subscribe email anda.
						                            </p>
						                            <form class="form form-newsletter" method="" action="">
						                              <div class="row">
						                                <div class="col-md-8">
						                                  <div class="form-group is-empty">
						                                    <input class="form-control" placeholder="Your Email..." type="email">
						                                  <span class="material-input"></span></div>
						                                </div>
						                                <div class="col-md-4">
						                                  <button type="button" class="btn btn-primary btn-just-icon" style="background-color: #F9690E" name="button">
						                                    <i class="material-icons">send</i>
						                                  </button>
						                                </div>
						                              </div>
						                            </form>
						                          </div>
						                        </div>
						                    </div>
						                    			                    

						                    <ul class="social-buttons">
						                        <li>
						                          <a href="https://twitter.com/Saling_Bantu" target="blank" class="btn btn-just-icon btn-simple btn-twitter">
						                            <i class="fa fa-twitter"></i>
						                          </a>
						                        </li>
						                        <li>
						                          <a href="https://www.facebook.com/profile.php?id=100018235811418" target="blank" class="btn btn-just-icon btn-simple btn-facebook">
						                            <i class="fa fa-facebook-square"></i>
						                          </a>
						                        </li>
						                        <li>
						                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-google">
						                            <i class="fa fa-instagram"></i>
						                          </a>
						                        </li>
						                        <li>
						                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-youtube">
						                            <i class="fa fa-youtube-play"></i>
						                          </a>
						                        </li>
						                        <li>
						                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-youtube">
						                            <i class="fa fa-path"></i>
						                          </a>
						                        </li>
						                    </ul>

						                    <div hidden="" class="copyright pull-center">
						                        Copyright © 2017 Salingbantu.or.id.
						                    </div>


						                </div>
						            </footer>
						        </div>
						    </div>
				</div> 

			</div>
		</div>



<script type="text/javascript">
	var urut = 'ASC';
	$(document).ready(function() {
		
        if (window_width <= 768) {
           $("#header_program_terkini").css('height','unset');
           $("#judul_program_terkini").css('font-size','1.5em');
           $("#judul_program_terkini").css('font-weight','bold');
            $("#deskripsi_program_terkini").css('font-size','1.1em');
        }
        else{
            $("#header_program_terkini").css('height','60vh');
            $("#judul_program_terkini").css('font-size','2.6em');
            $("#deskripsi_program_terkini").css('font-size','1.825em');
            
        }
		get_program_2();
    });


    $('#cari_program').keydown(function (e){
	    if(e.keyCode == 13){
	        get_program_2();
	    }
	})

    function get_program_2(){
		$.ajax({
            url: "<?php echo site_url('Front/get_program')?>",
            type: "POST",
            data: {
                "kategori": $('#kategori').val(), "judul": $('#cari_program').val(), "limit":"9999999999999", "urut": urut
            },
            dataType: "JSON",
            success: function(data) {
            	$('#kolom_1_').empty(); $('#kolom_2_').empty(); $('#kolom_3_').empty();
            	var status;
            	var looping = 1;
                $.each(data, function(k, v) {
                	// alert(v.judul);
                	var persen = (v.tercapai_dana / v.target_dana)* 100;
                	var persen2 = v.tercapai_dana / v.target_dana;
                	var id = v.id; var gambar_utama = v.gambar_utama; 

                	if (v.status == 'LIVE') {
                		status = "<p class='category pull-right' style='color:#f83600'><i class='material-icons'>play_circle_outline</i>LIVE</p>"; 
                	}
                	else if (v.status == 'SELESAI') {
                		status = "<p class='category pull-right' style='color:#36d1dc'><i class='material-icons'>verified_user</i>SELESAI</p>";
                	}


                	rows="<div class='card card-raised card-carousel' style='margin: 10px; margin-top: 20px; border-radius: 5px; box-shadow: 0 0px 3px -1px rgba(0, 0, 0, 0.18), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2)'><div id='carousel-example-program_"+id+"' class='carousel slide' data-ride='carousel'><div class='carousel slide' data-ride='carousel'><ol class='carousel-indicators' id='carousel_program_"+id+"' style='bottom:-5px; left:40%; width:80%'></ol><div class='carousel-inner' style='width: 100%; height: 225px;' id='carousel_img_program"+id+"'></div><a class='left carousel-control' href='#carousel-example-program_"+id+"' data-slide='prev'><i class='material-icons'>keyboard_arrow_left</i></a><a class='right carousel-control' href='#carousel-example-program_"+id+"' data-slide='next'><i class='material-icons'>keyboard_arrow_right</i></a></div><div class='content' style='text-align: left'><div class='row'><div class=''><div class='col-xs-8'><p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-4'>"+status+"</div></div></div><p class='select_text' onclick=detil_program2('"+v.id+"') style='width: 100%; cursor:pointer; font-weight:bold;'>"+v.judul+"</p><div class='row' style='margin-top: 15px'><div class='col-md-3 col-sm-3 col-xs-3' style='text-align: left; height: 10px'><div class='circles'><div class='second circle "+v.id_kegiatan+"'><strong></strong></div></div></div><div class='col-md-5 col-sm-5 col-xs-5' style='text-align: left'><p style='margin-bottom: 0px'>Terkumpul</p><p><b>Rp. "+accounting.formatNumber(v.tercapai_dana)+"</b></p></div><div class='col-md-4 col-sm-4 col-xs-4' style='text-align: left'><p style='margin-bottom: 0px'>Berakhir</p><p><b>"+v.tanggal_berakhir+"</b></p></div></div></div></div></div>";

                	if (looping == 1) {
                        $(rows).appendTo("#kolom_1_");
                    }
                    else if (looping == 2) {
                        $(rows).appendTo("#kolom_2_");
                    }
                    else if (looping == 3) {
                        $(rows).appendTo("#kolom_3_");
                        looping = 0;
                    }
                    

                    looping += 1;


                	$('.second.circle.'+v.id_kegiatan).circleProgress({
				        value: persen2
				    }).on('circle-animation-progress', function(event, progress) {
				        $(this).find('strong').html(Math.round(persen * progress) + '<i>%</i>');
				    });
                

					$.ajax({
				            url: "<?php echo site_url('Front/get_image_program')?>",
				            type: "POST",
				            data: {
				                "id": id
				            },
				            dataType: "JSON",
				            success: function(data) {
				            	
				            	var carousel1 = 0;
				                $.each(data, function(x, y) {
				                	if (carousel1 == 0) {
				                		rows2 = "<li data-target='#carousel-example-program_"+id+"' data-slide-to='"+carousel1+"' class='active'></li>";
				                	}else{
				                		rows2 = "<li data-target='#carousel-example-program_"+id+"' data-slide-to='"+carousel1+"' class=''></li>";
				                	}
				                	$(rows2).appendTo("#carousel_program_"+id);
				                	carousel1 += 1;
				                });
				                

				                
				                var img1 = 0;
				                $.each(data, function(a, b) {

				                	if (img1 == 0) {
				                		rows3 = "<div class='active' style='background: url(<?php echo base_url()?>assets/img/program_terkini/"+gambar_utama+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div><div class='' style='background: url(<?php echo base_url()?>assets/img/program_terkini/"+b.img+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div>";
				                	}else{
				                		rows3 = "<div class='' style='background: url(<?php echo base_url()?>assets/img/program_terkini/"+b.img+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div>";
				                	}
				                	img1 += 1;
				                	$(rows3).appendTo("#carousel_img_program"+id);
				                });
				                
				            }
				    });


                	
					
                });
				
				
            }
        });
	}

	function detil_program2(id){
    	asal_halaman_program = 'Jaringan_global';
    	id_program = id;
        get_content('Detil_program');
    }

	function terbaru(){
		urut = 'ASC'
		$("#terbaru").css('border-bottom', 'solid');
		$("#terbaru").css('cursor', 'pointer');
		$("#terbaru").css('font-weight', 'bold');
		$("#terlama").removeAttr('style');
		$("#terlama").css('cursor', 'pointer');
		get_program_2();
	}

	function terlama(){
		urut = 'DESC'
		$("#terlama").css('border-bottom', 'solid');
		$("#terlama").css('cursor', 'pointer');
		$("#terlama").css('font-weight', 'bold');
		$("#terbaru").removeAttr('style');
		$("#terbaru").css('cursor', 'pointer');
		get_program_2();
	}	


</script>