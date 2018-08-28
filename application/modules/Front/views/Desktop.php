
		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background-color: #0009; min-height: 200px; padding-top: 120px">
				
					<div class="carousel slide" data-ride="carousel">

						<!-- Indicators -->
						<ol class="carousel-indicators" id="carousel_indicators">

							<?php
								$query_slider2 = $this->db->query("SELECT img from slider where st = 'ACTIVE'");
								$loop2 = 0;
								foreach ($query_slider2->result() as $row2) {
									if ($loop2 == 0) {
										echo"<li data-target='#carousel-example-generic' data-slide-to='0' class='active'></li>";
									}
									else{
										echo"<li data-target='#carousel-example-generic' data-slide-to='0' class=''></li>";
									}
													
									$loop2 += 1;
								}
							?>
										
						</ol>



						<!-- Wrapper for slides -->
						<div class="carousel-inner">
							<?php
								$query_slider = $this->db->query("SELECT img from slider where st = 'ACTIVE'");
								$loop = 0;
								foreach ($query_slider->result() as $row) {
									if ($loop == 0) {
										echo"<div class='item active' style='height: 500px;background: url(".base_url()."assets/img/slider/".$row->img.");background-size: cover;'>
											</div>";
									}
									else{
										echo"<div class='item' style='height: 500px;background: url(".base_url()."assets/img/slider/".$row->img.");background-size: cover;'>
											</div>";
									}
												
									$loop += 1;
								}
							?>
						</div>

						<!-- Controls -->
						<a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
							<i class="material-icons">keyboard_arrow_left</i>
						</a>
						<a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
							<i class="material-icons">keyboard_arrow_right</i>
						</a>
					</div>
		</div>

		<div class="main main-raised" style="margin: -15px 30px 0px">
		    <div class="row" style="margin-left: 0px; margin-right: 0px">

		    			<div class="col-md-6 col-xs-12" style="padding: 20px">
		    				<div class="col-sm-4 col-xs-6">
		    					<img class="img" src="<?php echo base_url()?>assets/img/kegiatan.png" alt="" style="height: 90px; opacity: 1;">
						    	<h4 class="nomargin"><?php echo $this->lang->line('kegiatan_terdanai')?></h4>
								<h4 class="h4_responsive nomargin"><b id="kegiatan_terdanai" class="counter">0</b> Activity</h4>
						    </div>

						    <div class="col-sm-4 col-xs-6">
		    					<img class="img" src="<?php echo base_url()?>assets/img/user.png" alt="" style="height: 90px; opacity: 1;">
						    	<h4 class="nomargin"><?php echo $this->lang->line('dermawan_berdonasi')?></h4>
								<h4 class="h4_responsive nomargin"><b class="counter" id="dermawan_berdonasi">1</b> Donors</h4>
						    </div>

						    <div class="col-sm-4 col-xs-6">
		    					<img class="img" src="<?php echo base_url()?>assets/img/wallet.png" alt="" style="height: 90px; opacity: 1;">
						    	<h4 class="nomargin"><?php echo $this->lang->line('dana_dermawan')?></h4>
								<h4 class="h4_responsive nomargin">Rp. <b id="dana_dermawan" class="counter">2,300,000</b></h4>
						    </div>

						    <!-- list donatur bulan ini -->
						    <div class="col-xs-12" id="list_donatur_large" style="margin-top: 20px">
					    		<h3 style="margin-bottom: 10px; margin-top: 5px"><?php echo $this->lang->line('daftar_donatur_bulan_ini')?></h3>
					    				<div id="carousel-list_donatur2" class="carousel slide" data-ride="carousel2">
											<div class="carousel slide" data-ride="carousel2">

												<!-- Wrapper for slides -->
												<div class="col-xs-1" style="margin-top: 25px">
													<a href="#carousel-list_donatur2" data-slide="next">
														<i style="color: green; font-size: 40px; background-color: #0000001a" class="material-icons visible-on-sidebar-regular">keyboard_arrow_left</i>
							                        </a>
												</div>
												<div class="col-xs-10">
													<div class="carousel-inner" id="content_list_donatur2">
																										
													</div>
												</div>
												<div class="col-xs-1" style="margin-top: 25px">
													<a href="#carousel-list_donatur2" data-slide="prev">
														<i style="color: green; font-size: 40px; background-color: #0000001a" class="material-icons visible-on-sidebar-regular">keyboard_arrow_right</i>
							                        </a>
												</div>
												
												<!-- Controls -->
												
											</div>
										</div>
					    	</div>
		    			</div>



		    			<div class="col-md-6 col-xs-12" style="background-color: #93e888;background-image: linear-gradient(110deg, #91d588 0%, #3fb333 100%); color: white;padding: 20px; border-top-right-radius:5px; border-bottom-right-radius:5px;min-height: 360px">

		    				<h3 id="what_we_do" style="margin-top: 0px"><b><?php echo $this->lang->line('yang_kami_lakukan')?></b></h3>
			    			<h4>Yayasan Salingbantu.or.id bergerak di bidang sosial kemanusiaan dan keagamaan. Kami menggalang dana dari para dermawan untuk disalurkan kepada sesama dan kegiatan sosial yang membutuhkan.</h4>
			    			<div class="row">
			    					<div class="col-xs-6">
			    						<h4><i class="material-icons" style="color: orange">playlist_add_check</i><?php echo $this->lang->line('zakat')?></h4>
			    					</div>
			    					<div class="col-xs-6">
			    						<h4><i class="material-icons" style="color: orange">playlist_add_check</i><?php echo $this->lang->line('infaq')?> </h4>
			    					</div>
			    					<div class="col-xs-6">
			    						<h4><i class="material-icons" style="color: orange">playlist_add_check</i><?php echo $this->lang->line('pendidikan')?></h4>
			    					</div>
			    					<div class="col-xs-6">
			    						<h4><i class="material-icons" style="color: orange">playlist_add_check</i><?php echo $this->lang->line('bencana_alam')?> </h4>
			    					</div>
			    					<div class="col-xs-6">
			    						<h4><i class="material-icons" style="color: orange">playlist_add_check</i><?php echo $this->lang->line('sumbangan_bebas')?></h4>
			    					</div>
			    					<div class="col-xs-6">
			    						<h4><i class="material-icons" style="color: orange">playlist_add_check</i><?php echo $this->lang->line('sosial_dan_kemanusiaan')?></h4>
			    					</div>
			    			</div>
		    			</div>
		    </div>
		</div>




		<!-- kegiatan -->
		<div class="main" style="background-color: transparent;">
			<div class="section section-basic">
		    	<div class="container">
		            <div class="title" align="Center">
		                <h3 style="color: #4fc143; font-weight: bold">Kegiatan sosial terkini</h3>
		                <h4>Program penggalangan dana dari para relawan salingbantu.or.id</h4>

		                <!-- konten -->
		                <div class="row" style="margin-top: 20px">
		    				<div class="col-md-12">
		    					
				    					<div class="row" id="content_kegiatan">

				    				
				    					</div>
				    				
			    			</div>
			    		</div>
		                <!-- konten -->

		                <br>
		                <a href="Front/Kegiatan_sosial" onclick="get_content()" class="btn btn-new btn-wd btn-social btn-white btn-email btn-fill btn-round">
			                <i style="font-size: 20px" class="rotate material-icons">autorenew</i> Tampilkan lainnya
			            </a>
			            
		            </div>
		    	</div>
		    </div>
		</div>



		<!-- program yayasan -->
		<div class="main section-white-gradient" style="background-color: white;">
			<div class="section section-basic ">
		    	<div class="container">
		            <div class="title" align="Center">
		                <h3 style="color: #4fc143; font-weight: bold">Program-program salingbantu</h3>
		                <h4>Program sosial yang diselenggarakan oleh yayasan salingbantu</h4>
		                
		                <!-- konten kegiatan -->
		                <div class="row" style="margin-top: 20px">
		    				<div class="col-md-12">
				    			<div class="row" id="content_keperdulian">

				    				
				    			</div>
			    			</div>
			    		</div>


		                <br>
		                <a href="Front/Program_yayasan" style="margin-bottom: 30px" href="#" class="btn btn-new btn-wd btn-social btn-success btn-email btn-fill btn-round">
			                <i style="font-size: 20px" class="rotate material-icons">autorenew</i> Tampilkan lainnya
			            </a>


		            </div>
		    	</div>
		    </div>
		</div>


		<!-- berita foto -->
		<div class="main main-raised" style="margin: -60px 0px 0px 30px; border-top-right-radius:0px; border-bottom-right-radius:0px; border-top-left-radius: 5px; border-bottom-left-radius: 5px">
			<div class="section section-basic" style="padding-top: 0px; padding: 0px 0">
		    	<div class="container" style="width: 100%">
		            <div class="row">

		            	<div class="col-sm-4" style="background-color: #ffc400;background-image: linear-gradient(225deg, #ffc400 0%, #fc5c01 99%);border-top-left-radius:5px; border-bottom-left-radius:5px; max-height: 395px">

		            		<div class="row" style="margin-top: 30px">
			    				<div class="col-xs-3">
				    				<div class="info" style="padding: 0px">
										<div class="icon icon-warning" style="color: white">
											<i class="material-icons">beenhere</i>
										</div>
									</div>
								</div>
								<div class="col-xs-9">
									<div class="info" style="padding: 0px">
									<h4 style="color: white; margin-top: 0px; margin-bottom: 0px">Donation report salingbantu.or.id</h4>
										<button class="btn btn-success" style="background-color: transparent;color: white; border: solid;">
			                                <span class="btn-label">
			                                    <i class="material-icons">arrow_forward</i>
			                                </span>
			                                view report<div class="ripple-container"></div></button>
									</div>
								</div>
							</div>

							<div class="row" style="margin-top: 30px">
			    				<div class="col-xs-3">
				    				<div class="info" style="padding: 0px">
										<div class="icon icon-warning" style="color: white">
											<i class="material-icons">beenhere</i>
										</div>
									</div>
								</div>
								<div class="col-xs-9">
									<div class="info" style="padding: 0px">
									<h4 style="color: white; margin-top: 0px; margin-bottom: 0px">Donation report salingbantu.or.id</h4>
										<button class="btn btn-success" style="background-color: transparent;color: white; border: solid;">
			                                <span class="btn-label">
			                                    <i class="material-icons">arrow_forward</i>
			                                </span>
			                                view report<div class="ripple-container"></div></button>
									</div>
								</div>
							</div>

							<div class="row" style="margin-top: 30px; margin-bottom: 30px">
			    				<div class="col-xs-3">
				    				<div class="info" style="padding: 0px">
										<div class="icon icon-warning" style="color: white">
											<i class="material-icons">beenhere</i>
										</div>
									</div>
								</div>
								<div class="col-xs-9">
									<div class="info" style="padding: 0px">
									<h4 style="color: white; margin-top: 0px; margin-bottom: 0px">Donation report salingbantu.or.id</h4>
										<button class="btn btn-success" style="background-color: transparent;color: white; border: solid;">
			                                <span class="btn-label">
			                                    <i class="material-icons">arrow_forward</i>
			                                </span>
			                                view report<div class="ripple-container"></div></button>
									</div>
								</div>
							</div>
		            	</div>

		            	<div class="col-sm-8" style="max-height: 395px">
		            		
		            		<div class="row">
		            			<div class="col-md-6" align="left">
		            				<h3>Berita foto</h3>
		            			</div>
		            			<div class="col-md-6" align="right">
		            			<!-- <button onclick="get_content('Berita_foto')" class="btn btn-primary btn-simple">Lihat semua <i class="material-icons">arrow_forward</i><div class="ripple-container"></div></button> -->
		            				<a href="<?php echo base_url();?>Front/Berita_foto" class="btn btn-primary btn-simple">Lihat Semua</a>
		            			</div>
		            			<div class="ripple-container"></div>

		            			<div class="col-sm-12"></div>

		            			<div id="list_berita">
		            				
		            			</div>
		            			

		            		</div>
		            	</div>

		            </div>
		    	</div>
		    </div>
		</div>


		<!-- video -->
		<div class="main" style="background-color: transparent;">
			<div class="section section-basic" style="background: url('<?php echo base_url()?>assets/img/play.png');background-size: cover;">
		    	<div class="container">
  		            <div class="title" align="center">
		                <h3 style="color: #4fc143; font-weight: bold">Berbagi itu indah</h3>
		                <h4>Donasi anda bermanfaat bagi mereka yang membutuhkan.</h4>

		                <div class="row">
		    				
		    				
		    				<!-- video -->
		    				<div class="col-md-12 col-xs-12">
		    					<div id="carousel-list_video" class="carousel slide" data-ride="carousel">
									<div class="carousel slide" data-ride="carousel">

										

										<div class="col-xs-12 text-center" style="padding-right: 15px; padding-top: 20px">
											<div class="carousel-inner" id="list_video" style="max-height: 270px">
																								
											</div>
											
											<!-- <button onclick="get_content('Berita_video')" class="btn btn-warning btn-round" style="margin-top: 20px">
		                                        <span class="btn-label">
		                                            <i class="material-icons">play_arrow</i>
		                                        </span>
		                                        Lihat semua video
		                                    <div class="ripple-container"></div></button> -->
		                                    <a href="<?php echo base_url();?>Front/Berita_video" class="btn btn-warning btn-round" style="margin-top: 20px">Lihat Semua Video</a>
										</div>
												
									</div>
								</div>
		    				</div>

		    			</div>


		                <br>	
		            </div>
		    	</div>
		    </div>
		</div>


		<!-- partners -->
		<div class="main" style="background-color: white;">
			<div class="section section-basic">
		    	<div class="container">
		            <div class="title" align="center">
		                <h3 style="color: #4fc143">Partner kami</h3>
		               
		               	<!-- partners -->
		    				<div id="partner_big" class="col-xs-12" style="margin-top: 50px; margin-bottom: 50px">
		    					<div id="carousel-list_partner" class="carousel slide" data-ride="carousel">
											<div class="carousel slide" data-ride="carousel">

												
												<div class="col-xs-1">
													<a href="#carousel-list_partner" data-slide="next">
														<i style="font-size: 50px; color: #4fc143" class="material-icons">keyboard_arrow_left</i>
							                        </a>
												</div>

												<div class="col-xs-10">
													<div class="carousel-inner" id="list_dukungan">

														
																										
													</div>
												</div>

												<div class="col-xs-1">
													<a href="#carousel-list_partner" data-slide="prev">
														<i style="font-size: 50px; color: #4fc143" class="material-icons">keyboard_arrow_right</i>
							                        </a>
												</div>
												
											</div>
										</div>
		    				</div>

		                <br>
		            </div>
		    	</div>
		    </div>
		</div>


	    <!-- footer -->
		<div  class="section text-center section-landing" style="background-color: #e0e0e0; padding: 10px 0">
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
				                    			                    
				                    		

				                    <div class="row">
				                    	<div class="col-md-2">
				                    		<img src="http://salingbantu.or.id/salingbantu_dev/assets/img/salingbantu5.png" style="width: 105%	">
				                    		

				                    	</div>

				                    	<div class="col-md-5 text-left">
				                    		<h4 style="margin: -2px; font-size: 14px">YAYASAN SALING BANTU INDONESIA</h4>
				                    		<P style="margin: -2px; font-size: 13px; color : black">Akte Notaris Ulia Azhar, SH. M.Kn Nomor 13 Tanggal 15 Mei 2017</P>
				                    		<p style="margin: -2px; font-size: 13px; color : black">Nomor: AHU-117.AH.02.01-TAHUN 2011</p>
				                    		<p style="margin: -2px; font-size: 13px; color : black">Email: yayasan.salingbantuindonesia@gmail.com</p>
				                    		<p style="margin: -2px; font-size: 13px; color : black">Donasi Ke Nomor Rekening: Bank Mandiri 129.00.880.12345</p>

				                    	</div>

				                    	<div class="col-md-5">
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
				                    	</div>

				                   

				                    <div hidden="" class="copyright pull-center">
				                        Copyright © 2017 Salingbantu.or.id.
				                    </div>


				                </div>
				            </footer>
				        </div>
				    </div>
		</div> 


<style type="text/css">
	.rotate{
	    transition:2.5s;
	}
	.rotate:hover{
	    -o-transform:rotate(720deg);
	    -ms-transform:rotate(720deg);
	    -moz-transform:rotate(720deg);
	    -webkit-transform:rotate(720deg);
	    transform:rotate(720deg);
	}
</style>


<script type="text/javascript">
	jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });

	$(document).ready(function() {
		get_list_donatur();
		get_kegiatan();
		get_program();
		get_list_video();
		get_list_dukungan();
		get_img();
	});


	$('#cari_header').keydown(function (e){
	    if(e.keyCode == 13){
	        get_kegiatan_header();
	    }
	})

	function get_list_donatur(){
		$.ajax({
            url: "<?php echo site_url('Front/get_list_donatur')?>",
            type: "POST",
            data: {
                
            },
            dataType: "JSON",
            success: function(data) {
            	$('#content_list_donatur2').empty();
            	var loop = 1;
            	var loop2 = 1;
            	var rows1; var rows; var static = 1;

                $.each(data, function(k, v) {


                	if (loop == 1) {

                		if (loop2 == 1) {
                			rows1="<div class='item active'><div class='row' id='bulan_list_donatur2"+loop+"'></div></div>";
                			$(rows1).appendTo("#content_list_donatur2");
                		}
                		
                		if (loop2 <= 4) {
                			               			
                			//ori
                			rows="<div class='col-md-3' align='center'><img style='width: 70px ;height: 70px' class='img-circle' src='<?php echo base_url()?>assets/img/foto/"+v.img+"'><p style='margin-top:5px'>"+v.nama+"</p></div>";
                			$(rows).appendTo("#bulan_list_donatur2"+loop);
                		}

                		if (loop2 == 4) {
                			loop += 1;
                			loop2 = 0;
                		}
                		loop2 += 1;

                	}
                	else{
                		
                		if (loop2 == 1) {
                			rows1="<div class='item'><div class='row' id='bulan_list_donatur2"+loop+"'></div></div>";
                			$(rows1).appendTo("#content_list_donatur2");
                		}

                		if (loop2 <= 4) {
                			rows="<div class='col-md-3'><div class='card card-profile card-plain' style='margin-top:5px; margin-bottom: 0px'><div class='card-avatar hover01 column'><figure><img style='width: 70px ;height: 70px' class='img-circle' src='<?php echo base_url()?>assets/img/foto/"+v.img+"'></figure></div><div class='card-content' style='margin-top: 0px; margin-bottom5px'><p style='margin-bottom:5px'>"+v.nama+"</p></div></div></div>";
                			$(rows).appendTo("#bulan_list_donatur2"+loop);
                		}

                		if (loop2 == 4) {
                			loop += 1;
                			loop2 = 0;
                		}
                		loop2 += 1;
                	}
                	
                });
                
            }
        });
	}

	function get_kegiatan(){
		$.ajax({
            url: "<?php echo site_url('Front/get_kegiatan')?>",
            type: "POST",
            data: {
                "kategori": "Semua", "judul": "", "limit":"3",
            },
            dataType: "JSON",
            success: function(data) {
            	$('#content_kegiatan').empty();
            	var status;

                $.each(data, function(k, v) {
                	// alert()
                	// alert(v.judul);
                	var persen = (v.tercapai_dana / v.target_dana)* 100;
                	var persen2 = v.tercapai_dana / v.target_dana;
                	var id = v.id_kegiatan; var gambar_utama = v.gambar_utama;

                	if (v.status == 'LIVE') {
                		status = "<p class='category pull-right' style='color:#f83600'><i class='material-icons'>play_circle_outline</i>LIVE</p>"; 
                	}
                	else if (v.status == 'SELESAI') {
                		status = "<p class='category pull-right' style='color:#36d1dc'><i class='material-icons'>verified_user</i>SELESAI</p>";
                	}

                	rows="<div class='col-sm-4 item'><div class='card card-raised card-carousel' style='margin: 10px; border-radius: 5px'><div id='carousel-example-kegiatan_"+id+"' class='carousel slide' data-ride='carousel'><div class='carousel slide' data-ride='carousel'><ol class='carousel-indicators' id='carousel_kegiatan_"+id+"' style='bottom:-5px; left:40%; width:80%'></ol><div class='carousel-inner' style='width: 100%; height: 225px;' id='carousel_img_"+id+"'></div><a class='left carousel-control' href='#carousel-example-kegiatan_"+id+"' data-slide='prev'><i class='material-icons'>keyboard_arrow_left</i></a><a class='right carousel-control' href='#carousel-example-kegiatan_"+id+"' data-slide='next'><i class='material-icons'>keyboard_arrow_right</i></a></div><div class='content' style='text-align: left'><div class='row'><div class=''><div class='col-xs-8'><p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-4'>"+status+"</div></div></div><p class='select_text' onclick='detil_kegiatan("+v.id_kegiatan+")' style='width: 100%; cursor:pointer; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px'>"+v.judul+"</p><div class='row' style='margin-top: 15px'><div class='col-md-3 col-sm-3 col-xs-3' style='text-align: left; height: 10px'><div class='circles'><div class='second circle "+v.id_kegiatan+"'><strong></strong></div></div></div><div class='col-md-5 col-sm-5 col-xs-5' style='text-align: left'><p style='margin-bottom: 0px'>Terkumpul</p><p><b>Rp. "+accounting.formatNumber(v.tercapai_dana)+"</b></p></div><div class='col-md-4 col-sm-4 col-xs-4' style='text-align: left'><p style='margin-bottom: 0px'>Berakhir</p><p><b>"+v.tanggal_berakhir+"</b></p></div></div></div></div></div></div>";
                	$(rows).appendTo("#content_kegiatan");

                	$('.second.circle.'+v.id_kegiatan).circleProgress({
				        value: persen2
				    }).on('circle-animation-progress', function(event, progress) {
				        $(this).find('strong').html(Math.round(persen * progress) + '<i>%</i>');
				    });
                

					$.ajax({
				            url: "<?php echo site_url('Front/get_image_kegiatan')?>",
				            type: "POST",
				            data: {
				                "id": id
				            },
				            dataType: "JSON",
				            success: function(data) {
				            	
				            	var carousel1 = 0;
				                $.each(data, function(x, y) {
				                	if (carousel1 == 0) {
				                		rows2 = "<li data-target='#carousel-example-kegiatan_"+id+"' data-slide-to='"+carousel1+"' class='active'></li>";
				                	}else{
				                		rows2 = "<li data-target='#carousel-example-kegiatan_"+id+"' data-slide-to='"+carousel1+"' class=''></li>";
				                	}
				                	$(rows2).appendTo("#carousel_kegiatan_"+id);
				                	carousel1 += 1;
				                });
				                

				                
				                var img1 = 0;
				                $.each(data, function(a, b) {
				                	if (img1 == 0) {
				                		rows3 = "<div class='active' style='background: url(<?php echo base_url()?>assets/img/content/"+gambar_utama+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div><div class='' style='background: url(<?php echo base_url()?>assets/img/content/"+b.img+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div>";
				                	}else{
				                		rows3 = "<div class='' style='background: url(<?php echo base_url()?>assets/img/content/"+b.img+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div>";
				                	}
				                	img1 += 1;
				                	$(rows3).appendTo("#carousel_img_"+id);
				                });
				                
				            }
				    });


                	
					
                });
				
				
            }
        });
	}

	function get_kegiatan_header(){
		$.ajax({
            url: "<?php echo site_url('Front/get_kegiatan')?>",
            type: "POST",
            data: {
                "kategori": "Semua", "judul": $('#cari_header').val(), "limit":"",
            },
            dataType: "JSON",
            success: function(data) {
            	$('#hasil_cari').empty();
            	var status;

                $.each(data, function(k, v) {
                	// alert(v.judul);
                	var persen = (v.tercapai_dana / v.target_dana)* 100;
                	var persen2 = v.tercapai_dana / v.target_dana;
                	var id = v.id_kegiatan; var gambar_utama = v.gambar_utama;

                	if (v.status == 'LIVE') {
                		status = "<p class='category pull-right' style='color:#f83600'><i class='material-icons'>play_circle_outline</i>LIVE</p>"; 
                	}
                	else if (v.status == 'SELESAI') {
                		status = "<p class='category pull-right' style='color:#36d1dc'><i class='material-icons'>verified_user</i>SELESAI</p>";
                	}

                	rows="<div class='col-sm-3 item'><div class='card card-raised card-carousel' style='margin: 10px; border-radius: 5px'><div id='carousel-example-kegiatan_"+id+"' class='carousel slide' data-ride='carousel'><div class='carousel slide' data-ride='carousel'><ol class='carousel-indicators' id='carousel_kegiatan_header"+id+"' style='bottom:-5px; left:40%; width:80%'></ol><div class='carousel-inner' style='width: 100%; height: 225px;' id='carousel_img_header"+id+"'></div><a class='left carousel-control' href='#carousel-example-kegiatan_header"+id+"' data-slide='prev'><i class='material-icons'>keyboard_arrow_left</i></a><a class='right carousel-control' href='#carousel-example-kegiatan_header"+id+"' data-slide='next'><i class='material-icons'>keyboard_arrow_right</i></a></div><div class='content' style='text-align: left'><div class='row'><div class=''><div class='col-xs-8'><p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-4'>"+status+"</div></div></div><p class='select_text' onclick='detil_kegiatan("+v.id_kegiatan+")' style='width: 100%; cursor:pointer; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px'>"+v.judul+"</p><div class='row' style='margin-top: 15px'><div class='col-md-3 col-sm-3 col-xs-3' style='text-align: left; height: 10px'><div class='circles'><div class='second circle "+"header"+v.id_kegiatan+"'><strong></strong></div></div></div><div class='col-md-5 col-sm-5 col-xs-5' style='text-align: left'><p style='margin-bottom: 0px'>Terkumpul</p><p><b>Rp. "+accounting.formatNumber(v.tercapai_dana)+"</b></p></div><div class='col-md-4 col-sm-4 col-xs-4' style='text-align: left'><p style='margin-bottom: 0px'>Berakhir</p><p><b>"+v.tanggal_berakhir+"</b></p></div></div></div></div></div></div>";
                	$(rows).appendTo("#hasil_cari");

                	$('.second.circle.'+'header'+v.id_kegiatan).circleProgress({
				        value: persen2
				    }).on('circle-animation-progress', function(event, progress) {
				        $(this).find('strong').html(Math.round(persen * progress) + '<i>%</i>');
				    });
                

					$.ajax({
				            url: "<?php echo site_url('Front/get_image_kegiatan')?>",
				            type: "POST",
				            data: {
				                "id": id
				            },
				            dataType: "JSON",
				            success: function(data) {
				            	
				            	var carousel1 = 0;
				                $.each(data, function(x, y) {
				                	if (carousel1 == 0) {
				                		rows2 = "<li data-target='#carousel-example-kegiatan_header"+id+"' data-slide-to='"+carousel1+"' class='active'></li>";
				                	}else{
				                		rows2 = "<li data-target='#carousel-example-kegiatan_header"+id+"' data-slide-to='"+carousel1+"' class=''></li>";
				                	}
				                	$(rows2).appendTo("#carousel_kegiatan_header"+id);
				                	carousel1 += 1;
				                });
				                

				                
				                var img1 = 0;
				                $.each(data, function(a, b) {
				                	if (img1 == 0) {
				                		rows3 = "<div class='active' style='background: url(<?php echo base_url()?>assets/img/content/"+gambar_utama+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div><div class='' style='background: url(<?php echo base_url()?>assets/img/content/"+b.img+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div>";
				                	}else{
				                		rows3 = "<div class='' style='background: url(<?php echo base_url()?>assets/img/content/"+b.img+") no-repeat; width: 100%; height: 225px; background-size: cover; border-top-right-radius: 5px; border-top-left-radius: 5px'></div>";
				                	}
				                	img1 += 1;
				                	$(rows3).appendTo("#carousel_img_header"+id);
				                });
				                
				            }
				    });


                	
					
                });
				
				
            }
        });
	}

	function get_program(){
		$.ajax({
            url: "<?php echo site_url('Front/get_program')?>",
            type: "POST",
            data: {
                "kategori": "Semua", "judul": "", "limit":"3",
            },
            dataType: "JSON",
            success: function(data) {
            	$('#content_keperdulian').empty();
            	var status;

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


                	rows="<div class='col-sm-4 item'><div class='card card-raised card-carousel' style='margin: 10px; border-radius: 5px'><div id='carousel-example-program_"+id+"' class='carousel slide' data-ride='carousel'><div class='carousel slide' data-ride='carousel'><ol class='carousel-indicators' id='carousel_program_"+id+"' style='bottom:-5px; left:40%; width:80%'></ol><div class='carousel-inner' style='width: 100%; height: 225px;' id='carousel_img_program"+id+"'></div><a class='left carousel-control' href='#carousel-example-program_"+id+"' data-slide='prev'><i class='material-icons'>keyboard_arrow_left</i></a><a class='right carousel-control' href='#carousel-example-program_"+id+"' data-slide='next'><i class='material-icons'>keyboard_arrow_right</i></a></div><div class='content' style='text-align: left'><div class='row'><div class=''><div class='col-xs-8'><p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-4'>"+status+"</div></div></div><p class='select_text' onclick=detil_program('"+v.id+"') style='width: 100%; cursor:pointer; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px'>"+v.judul+"</p><div class='row' style='margin-top: 15px'><div class='col-md-3 col-sm-3 col-xs-3' style='text-align: left; height: 10px'><div class='circles'><div class='second circle "+v.id_kegiatan+"'><strong></strong></div></div></div><div class='col-md-5 col-sm-5 col-xs-5' style='text-align: left'><p style='margin-bottom: 0px'>Terkumpul</p><p><b>Rp. "+accounting.formatNumber(v.tercapai_dana)+"</b></p></div><div class='col-md-4 col-sm-4 col-xs-4' style='text-align: left'><p style='margin-bottom: 0px'>Berakhir</p><p><b>"+v.tanggal_berakhir+"</b></p></div></div></div></div></div></div>";
                	$(rows).appendTo("#content_keperdulian");

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

	function get_img(){
		$.ajax({
            url: "<?php echo site_url('Front/get_berita_front')?>",
            type: "POST",
            data: {
                
            },
            dataType: "JSON",
            success: function(data) {
            	$('#list_berita').empty();
            	
                $.each(data, function(k, v) {
                	rows="<div class='col-md-4'><div class='example-2 card'><div class='wrapper' style='background: url(<?php echo base_url()?>assets/img/berita/"+v.img+") center/cover no-repeat; min-height: 275px; box-shadow:0 4px 5px 0px rgba(140, 127, 127, 0.32), 0 7px 10px -5px rgb(101, 97, 97)'><div class='header' style='background-color: transparent; min-height: 275px; height: 275px; box-shadow:unset'><div class='date' style='background-color: #02020233;padding-left: 5px;padding-right: 5px;border-radius: 2px;'><span class='day'>"+v.tgl+"</span><span class='month'>"+v.bln+"</span><span class='year'>"+v.th+"</span></div></div><div class='data'><div class='content' style='background-color:#02020233'><h4 class='title'><a href='#'>"+v.judul+"</a></h4><p class='text' style='padding-top: 10px'>"+v.deskripsi+"</p><a style='cursor:pointer;' onclick=detil_berita('desktop','"+v.id+"') class='button'>Selengkapnya</a></div></div></div</div></div>";
                	$(rows).appendTo("#list_berita");

                });
				
				
            }
        });
	}

    

	function get_list_video(){
		$.ajax({
            url: "<?php echo site_url('Front/get_list_video')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
            	$('#list_video').empty();
            	var loop = 1;
            	var loop2 = 1;
            	var rows1; var rows; var static = 1;

                $.each(data, function(k, v) {


                	if (loop == 1) {

                		if (loop2 == 1) {
                			rows1="<div class='item active'><div class='row' id='list_video2"+loop+"'></div></div>";
                			$(rows1).appendTo("#list_video");
                		}
                		
                		if (loop2 <= 3) {
                			
                			rows="<div  class='col-md-4 col-sm-6'><div align='center' class='card card-profile card-plain' style='margin-bottom:20px ;margin-top: 10px; box-shadow:0 4px 5px 0px rgba(140, 127, 127, 0.32), 0 7px 10px -5px rgb(101, 97, 97); background-color:black'>"+v.embed+"<div style='background-color:white; padding:20px 20px 20px 20px'><h5 class='select_text' style='width: 100%; cursor:pointer; overflow: hidden; text-overflow: ellipsis; height:50px; margin:0px; text-align:left'>"+v.deskripsi+"</h5></div></div></div>";
                			$(rows).appendTo("#list_video2"+loop);
                		}

                		if (loop2 == 3) {
                			loop += 1;
                			loop2 = 0;
                		}
                		loop2 += 1;

                	}
                	else{
                		
                		if (loop2 == 1) {
                			rows1="<div class='item'><div class='row' id='list_video2"+loop+"'></div></div>";
                			$(rows1).appendTo("#list_video");
                		}

                		if (loop2 <= 3) {
                			rows="<div class='col-md-4'><div class='card card-profile card-plain' style='margin-top: 10px'>"+v.embed+"	</div></div>";

                			$(rows).appendTo("#list_video2"+loop);
                		}

                		if (loop2 == 3) {
                			loop += 1;
                			loop2 = 0;
                		}
                		loop2 += 1;
                	}
                	
                });
                
            }
        });
	}

	function get_list_dukungan(){
		$.ajax({
            url: "<?php echo site_url('Front/get_list_dukungan')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
            	$('#list_dukungan').empty();
            	var loop = 1;
            	var loop2 = 1;
            	var rows1; var rows; var static = 1;

                $.each(data, function(k, v) {


                	if (loop == 1) {

                		if (loop2 == 1) {
                			rows1="<div class='item active'><div class='row' id='list_dukungan2"+loop+"'></div></div>";
                			$(rows1).appendTo("#list_dukungan");
                		}
                		
                		if (loop2 <= 6) {
                			
                			rows="<div class='col-md-2 hover01 column'><figure><img style='width: 100px' class='img' src='<?php echo base_url()?>assets/img/partners/"+v.img+"'></figure></div>";
                			$(rows).appendTo("#list_dukungan2"+loop);
                		}

                		if (loop2 == 6) {
                			loop += 1;
                			loop2 = 0;
                		}
                		loop2 += 1;

                	}
                	else{
                		
                		if (loop2 == 1) {
                			rows1="<div class='item'><div class='row' id='list_dukungan2"+loop+"'></div></div>";
                			$(rows1).appendTo("#list_dukungan");
                		}

                		if (loop2 <= 6) {
                			rows="<div class='col-md-2'><img style='width: 100px' class='img' src='<?php echo base_url()?>assets/img/partners/"+v.img+"'></div>";
                			$(rows).appendTo("#list_dukungan2"+loop);
                		}

                		if (loop2 == 6) {
                			loop += 1;
                			loop2 = 0;
                		}
                		loop2 += 1;
                	}
                	
                });
                
            }
        });
	}
</script>