


			<div class="card card-raised card-carousel" style="margin: 0px 0">
				<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background-color: #0009; min-height: 200px">
				
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

					<!-- list donatur untuk tampilan mobile -->
				    <div id="list_donatur_small" class="section text-center section-landing" style="padding: 0px 0; padding-bottom: 0px">
				    	<div class="container" style="width: 100%">
				    		<div class="row text-left" style="background-color: white">

				    						<div class="col-xs-3" style="background-color: #F9690E; color: white">
				    							<p style="margin: 5px 0px 5px 0px">Donatur bulan ini</p>
				    						</div>
				    						<div class="col-xs-9" style="padding-left: 15px; padding-right: 15px">
				    							<div id="carousel-list_donatur" class="carousel slide" data-ride="carousel">
													<div class="carousel slide" data-ride="carousel">
														<div class="row">
															<div class="col-xs-1" style="margin-top: 12px; padding-left: 0px; padding-right: 0px">
																<a href="#carousel-list_donatur" data-slide="next">
																	<i style="color: green; font-size: 25px" class="material-icons visible-on-sidebar-regular">keyboard_arrow_left</i>
										                        </a>
															</div>
															<div class="col-xs-10">
																<div class="carousel-inner" id="content_list_donatur">
																													
																</div>
															</div>
															<div class="col-xs-1" style="margin-top: 12px; padding-left: 0px; padding-right: 0px">
																<a href="#carousel-list_donatur" data-slide="prev">
																	<i style="color: green; font-size: 25px" class="material-icons visible-on-sidebar-regular">keyboard_arrow_right</i>
										                        </a>
															</div>
														</div>
													</div>
												</div>
				    						</div>
				    					

				    		</div>
				    	</div>   
					</div>

				</div>
			</div>


			<!-- section 1 for phone -->
			<div class="row" id="section1_small" hidden="">
				<div class="col-xs-6" style="padding-right: 0px">
					<div class="main main-raised" style="background-color: white; border-radius: 3px; box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0), 0 6px 30px 5px rgba(0, 0, 0, 0.08), 0 8px 10px -5px rgba(0, 0, 0, 0)">
						<div class="container" style="width: 100%">
							<i style="margin-top: 10px; color: #009788; font-size: 3.4em" class="material-icons">assignment</i>
							<p style="margin: 0 0 0px">Founded activities</p>
							<h4 style="font-weight: bold; margin-top: 0px">5 activitites</h4>
						</div>
					</div>
				</div>
				<div class="col-xs-6" style="padding-left: 0px">
					<div class="main main-raised" style="background-color: white; border-radius: 3px; box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0), 0 6px 30px 5px rgba(0, 0, 0, 0.08), 0 8px 10px -5px rgba(0, 0, 0, 0)">
						<div class="container" style="width: 100%">
							<i style="margin-top: 10px; color: #cc3e3d; font-size: 3.4em" class="material-icons">insert_emoticon</i>
							<p style="margin: 0 0 0px">Donors</p>
							<h4 style="font-weight: bold; margin-top: 0px">5 Donors</h4>
						</div>
					</div>
				</div>
				<div class="col-xs-12">
					<div class="main main-raised" style="background-color: white; border-radius: 3px; box-shadow: 0 16px 24px 2px rgba(0, 0, 0, 0), 0 6px 30px 5px rgba(0, 0, 0, 0.08), 0 8px 10px -5px rgba(0, 0, 0, 0)">
						<div class="container" style="width: 100%">
							<div class="row">
								<div class="col-xs-2">
									<i style="margin-top: 10px; color: #36bbf7; font-size: 3.4em" class="material-icons">account_balance_wallet</i>
								</div>
								<div class="col-xs-10" style="padding-left: 20px; padding-top: 10px">
									<p style="margin: 0 0 0px">Donors found</p>
									<h4 style="font-weight: bold; margin-top: 0px">Rp. 1.000.000.000</h4>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>


	    	<div class="main main-raised" style="background-color: white; margin-bottom: 30px; padding-bottom: 20px">
					
				<!-- section1 -->
			    <div class="section text-center section-landing" style="padding: 0px 0; padding-bottom: 0px">
			    	<div class="container" style="width: 100%">
			    		<div class="row" id="what_we_do">

			    			<div class="col-md-6 col-xs-12" style="background-color: white">
			    				<div class="row text-center">

					    			<div id="section1_big" hidden="">

						    			<div class="col-sm-4 col-xs-6">
						    				<div class="info" style="padding: 20px 0px 30px">
						    					<div class="row">
						    						<div class="col-xs-12">
						    							<div class="icon icon-warning" style="color: #009788">
															<i id="ic2" class="material-icons">assignment</i>
														</div>
						    						</div>

						    						<div class="col-xs-12">
						    							<p class="nomargin"><?php echo $this->lang->line('kegiatan_terdanai')?></p>
														<h4 class="h4_responsive nomargin"><b id="kegiatan_terdanai"></b></h4>
						    						</div>
						    					</div>
											</div>
						    			</div>

						    			<div class="col-sm-4 col-xs-6">
						    				<div class="info" style="padding: 20px 0px 30px">
						    					<div class="row">
						    						<div class="col-xs-12">
						    							<div class="icon icon-warning" style="color: #cc3e3d">
															<i id="ic3" class="material-icons">insert_emoticon</i>
														</div>
						    						</div>

						    						<div class="col-xs-12">
						    							<p class="nomargin"><?php echo $this->lang->line('dermawan_berdonasi')?></p>
														<h4 class="h4_responsive nomargin"><b id="dermawan_berdonasi"></b></h4>
						    						</div>
						    					</div>
												
											</div>
						    			</div>

						    			<div class="col-sm-4 col-xs-12">
						    				<div class="info" style="padding: 20px 0px 30px">
						    					<div class="row">
						    						<div class="col-xs-12">
						    							<div class="icon icon-warning" style="color: #36bbf7">
															<i class="material-icons" id="ic1">account_balance_wallet</i>
														</div>
						    						</div>

						    						<div class="col-xs-12">
						    							<p class="nomargin"><?php echo $this->lang->line('dana_dermawan')?></p>
														<h4 class="h4_responsive nomargin"><b id="dana_dermawan"></b></h4>
						    						</div>
						    					</div>
												
											</div>
						    			</div>

					    			</div>

					    			<div class="col-xs-12" id="list_donatur_large">
					    				<h4 style="margin-bottom: 0px; margin-top: 5px"><?php echo $this->lang->line('daftar_donatur_bulan_ini')?></h4>
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

					    			<!-- <div class="card card-raised card-carousel"> -->
										
									<!-- </div> -->

			    				</div>
			    			</div>

			    			<div class="col-md-6 col-xs-12 text-left" style="padding-left: 20px; padding-right: 0px; background-color: #4fc143; color: white; padding-bottom: 5px; min-height: 360px">
			    				
			    				<h3 id="what_we_do" style="padding-top: 0px"><b><?php echo $this->lang->line('yang_kami_lakukan')?></b></h3>
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
				</div>



			    <!-- kegiatan -->
			    <div class="section text-center section-landing" style="padding: 0px 0; background-color: #ecf0f1">
			    	<div class="container">
						<div class="row" style="">
						

							<!-- pencarian -->
		    				<div class="col-md-8 col-md-offset-2 text-center" style="margin-bottom: 10px">
		    					<h3 class="title" style="margin-bottom: 0px">Kegiatan sosial terkini</h3>
		    					<h5 class="description">Program penggalangan dana dari para relawan salingbantu.or.id</h5>

		    					

		    					<div class="hide row card text-left" style="margin-bottom: 20px; ">

                                    <div class="col-sm-2 col-xs-12" style="border-right: solid white 1px">
                                        <h4><?php echo $this->lang->line('pencarian')?></h4>
                                    </div>



                                    <div class="col-sm-4 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-2 col-xs-3">
                                                <h4><i class="material-icons">sort</i></h4>
                                            </div>
                                            <div class="col-sm-10 col-xs-9 pull-left" style="border-right: solid white 1px">
                                                <div class="form-group label-static" style="margin: 0px">
                                                	<select style="margin-top: 5px" onchange="get_kegiatan()" name="cari_kategori" id="cari_kategori" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    	<?php
                                                    		echo "<option selected='' value='Semua'>Semua kategori</option>";
                                                    		$query = $this->db->query("SELECT id_kategori, nama_kategori from kategori_kegiatan where status = 'ACTIVE' order by nama_kategori");
                                                    		foreach ($query->result() as $row) {
                                                    			echo"
                                                            	<option value='".$row->id_kategori."'>".$row->nama_kategori."</option>
                                                    			";
                                                    		}

                                                    	?>
                                                	</select>
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>



                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-sm-2 col-xs-3">
                                                <h4><i class="material-icons">text_fields</i></h4>
                                            </div>
                                            <div class="col-sm-10 col-xs-9 pull-left" style="border-right: solid white 1px">
                                                <div class="form-group label-static" style="margin: 0px">
                                                    <input onchange="get_kegiatan()" class="datepicker form-control" value="" placeholder="Judul" id="cari_judul" type="text">
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
		    				</div>

		    				<!-- konten kegiatan -->
		    				<div class="col-md-12">
		    					<div class="columns">
			    					
				    					<div class="row owl-carousel owl-theme" id="content_kegiatan">

				    				
				    					</div>
				    				
				    			</div>
			    			</div>

			    			<!-- button -->
			    			<div class="col-xs-12">
			    				<button onclick="get_content('Kegiatan')" class="btn btn-warning  btn-round pull-center" style="margin-top: 30px; margin-bottom: 40px; background: transparent linear-gradient(to right, rgb(255, 78, 80), rgba(249, 171, 35, 0.87)) repeat scroll 0% 0%"> <i class="material-icons">autorenew</i> Load more<div class="ripple-container"></div></button>
			    			</div>

		    			</div>
		    		</div>
		    	</div>



		    	<!-- program2 kami -->
			    <div class="section text-center section-landing" style="padding: 0px 0; background-color: whitesmoke">
			    	<div class="container">
						<div class="row" style="">
						

							<!-- pencarian -->
		    				<div class="col-md-8 col-md-offset-2 text-center" style="margin-bottom: 10px">
		    					<h3 class="title" style="margin-bottom: 0px">Program-program salingbantu</h3>
		    					<h5 class="description">Program sosial yang diselenggarakan oleh yayasan salingbantu</h5>
		    				</div>

		    				<!-- konten kegiatan -->
		    				<div class="col-md-12">
				    			<div class="row" id="content_keperdulian">

				    				
				    			</div>
			    			</div>

			    			<!-- button -->
			    			<div class="col-xs-12">
			    				<button onclick="get_content('Jaringan_global')" class="btn btn-warning  btn-round pull-center" style="margin-top: 30px; margin-bottom: 40px; background: transparent linear-gradient(to right, rgb(255, 78, 80), rgba(249, 171, 35, 0.87)) repeat scroll 0% 0%"> <i class="material-icons">autorenew</i> Load more<div class="ripple-container"></div></button>
			    			</div>

		    			</div>
		    		</div>
		    	</div>

	    			

		    	<!-- cerita -->
			    <div class="section text-center section-landing" style="padding: 0px 0; background-color: transparent;">
			    	<div class="container" style="width: 100%">

		    			<div class="row" style="background-color: #4fc143;">
							
		    				<div class="col-md-4 col-sm-12 text-left" style=" color: white; min-height: 465px;">
		    					
		    					<!-- <h3 id="judul_section4"><?php echo $this->lang->line('donasi_anda_bermanfaat_untuk_mereka')?></h3> -->
		    					
		    					

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
											<h4 style="color: white; margin-top: 0px; margin-bottom: 0px"><?php echo $this->lang->line('laporan_keuangan_salingbantu.or.id')?></h4>
											<button class="btn btn-success" style="background-color: transparent;color: white; border: solid;">
		                                        <span class="btn-label">
		                                            <i class="material-icons">arrow_forward</i>
		                                        </span>
		                                        <?php echo $this->lang->line('lihat_laporan')?>
		                                    <div class="ripple-container"></div></button>
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
									<div class="col-xs-9" >
										<div class="info" style="padding: 0px">
											<h4 style="color: white; margin-top: 0px; margin-bottom: 0px"><?php echo $this->lang->line('bersihkan_harta_anda_dengan_berzakat')?></h4>
											<button class="btn btn-success" style="background-color: transparent;color: white; border: solid;">
		                                        <span class="btn-label">
		                                            <i class="material-icons">arrow_forward</i>
		                                        </span>
		                                        <?php echo $this->lang->line('zakat_sekarang')?>
		                                    <div class="ripple-container"></div></button>
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
											<h4 style="margin-top: 0px; margin-bottom: 0px; color: white"><?php echo $this->lang->line('infaq_anda_bermanfaat_bagi_mereka')?></h4>
											<button class="btn btn-success" style="background-color: transparent;color: white; border: solid;">
		                                        <span class="btn-label">
		                                            <i class="material-icons">arrow_forward</i>
		                                        </span>
		                                        <?php echo $this->lang->line('infaq_sekarang')?>
		                                    <div class="ripple-container"></div></button>
										</div>
									</div>
								</div>

								<br>
		    				</div>


		    				<div id="berita_section" class="col-md-8 col-sm-12" style="margin-top: 0px; background-color: white">
		    					<div class="row" style="margin-right: 0px; margin-left: 0px; max-height: 470px">


		    					<!-- berita -->
		    					<div class="col-xs-12">
			    					<div class="row">
			    						<div class="col-md-4 col-xs-12" style="margin-top: 0px;text-align: left;color: black"><h3 style="">Berita foto</h3>
			    						</div> 
										<div class="col-md-8 col-xs-12" id="btn_all_news2" style="margin-bottom: 20px;text-align: left;">
											<a href="#front" onclick="get_content('Berita_foto')" id="btn_all_news" style="color: #19ff01">
		                                        <i class="material-icons">arrow_forward</i> Tampilkan semua
		                                    <div class="ripple-container"></div></a>
										</div>
			    					</div>
		    					</div>

		    					<div class="col-xs-12">
			    					<div class="home-demo">
								      <div class="row">
								        <div class="large-12 columns">

								          <div class="owl-carousel owl-theme" id="content_berita">
								            <script type="text/javascript">
								            	
								            	if (window_width <= 767) {
								            		<?php $window_width_php = 'small';?>
								            		
								            	}
								            	else if (window_width >= 768){
								            		<?php $window_width_php = 'big';?>

								            	}
								            	
								            </script>
								            <?php
								            	$query = $this->db->query("SELECT id, judul, img, DATE_FORMAT(waktu, '%d-%M-%Y') AS waktu FROM berita WHERE st = 'ACTIVE' ORDER BY waktu DESC");
								            	
								            	if ($window_width_php == 'small') {
								            		$ukuran = 180;
								            	}
								            	else if ($window_width_php == 'big') {
								            		$ukuran = 250;
								            	}
								            	foreach ($query->result() as $row) {
								            		
								            		echo "
								            			<div class='item' style='margin-bottom: 10px; margin-left:5px; margin-right:5px'>
											              	<div class='card' style='width: ".$ukuran."px'>
												              	<div class='image'>
												              		<figure style='border-top-left-radius: 8px; border-top-right-radius:8px'><img class='img' src='http://salingbantu.or.id/assets/img/berita/".$row->img."' alt='Berita salingbantu.or.id' style='width: 100%; height:100%'>
												              		</figure>
												              	</div>
												              	<div align='left' style='background-color: whitesmoke; padding: 10px; box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.1); border-bottom-left-radius:8px; border-bottom-right-radius:8px; height: 120px'>
												              		<p class='category' style='margin:-5px 0 0px;'><i class='material-icons'>date_range</i>".$row->waktu."</p>
												              		<a href='#front' onclick='detil_berita(".$row->id.")'>
												              			<h4 style='width: 160px; overflow: hidden;display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; margin-top:0px; margin-bottom:0px'>".$row->judul."</h4>
												              		</a>
												              	</div>
											            	</div>
											            </div>
								            		";
								            	}
								            ?>
								          										            							            
								          </div>

								        </div>
								      </div>
								    </div>
								</div>


		    					<div class="col-xs-12" id="button_berita" style="margin-top: 20px">
			    					<div class="row">
			    						
			    					</div>
		    					</div>


		    					</div>
		    				</div>
		    			</div>

		    		</div>
		    	</div>

		    			
		    	<!-- video -->
		    	<div  class="section text-center section-landing" style="padding: 0px 0px 30px 0px; background-color: whitesmoke;background: url(http://salingbantu.or.id/assets/img/play.png);background-size: cover;">
			    	<div class="container" style="width: 100%">
		    			<div class="row">
		    				<div class="col-md-2 col-xs-12" style="margin-top: 30px">
		    					
		    				</div>
		    				
		    				<!-- video -->
		    				<div class="col-md-10 col-xs-12">
		    					<div id="carousel-list_video" class="carousel slide" data-ride="carousel">
									<div class="carousel slide" data-ride="carousel">

										

										<div class="col-xs-12 text-right" style="padding-right: 15px; padding-top: 20px">
					    					<h3 style="color:  #4fc143; margin-bottom: 0px">Berbagi itu indah</h3>
					    					<h4 style="margin-top: 0px">Donasi anda bermanfaat bagi mereka yang membutuhkan.</h4>
											<div class="carousel-inner" id="list_video" style="max-height: 225px">
																								
											</div>
											
											<button onclick="get_content('Berita_video')" class="btn btn-warning" style="margin-top: 20px">
		                                        <span class="btn-label">
		                                            <i class="material-icons">play_arrow</i>
		                                        </span>
		                                        Lihat semua video
		                                    <div class="ripple-container"></div></button>
										</div>
												
									</div>
								</div>
		    				</div>

		    			</div>
					</div>
				</div>





				<!-- partner -->
		    	<div  class="section text-center section-landing" style="padding: 0px 0; background-color: #e4e4e4">
			    	<div class="container" style="width: 100%">

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

		    				<div id="partner_small" class="col-xs-12" style="margin-top: 50px; margin-bottom: 50px; ">
		    					<div class="home-demo">
											    <div class="row" style="margin-left: -10px; margin-right: -10px">

											        	<div class="large-12 columns">
											          		<div class="owl-carousel owl-theme" id="">
											          			<?php
												            	$query = $this->db->query("SELECT  img FROM    partner WHERE   st = 'ACTIVE'");
												            	foreach ($query->result() as $row) {
												            		echo "
												            			<img style='width: 100px' class='img' src='http://salingbantu.or.id/assets/img/partners/".$row->img."'>
												            		";
												            	}
												            ?>
											          		</div>
														</div>
													</div>
												</div>
		    				</div>

			    	</div>
			    </div>

			    <p>hgygyy</p>

						
				<!-- footer -->
				<div  class="section text-center section-landing" style="background-color: white; padding: 10px 0">
			    	<div class="container" style="width: 100%">
	    				<div id="footer-areas" style="margin-top: 20px">
				            <footer class="footer footer-white footer-big">
				                <div class="container">

				                    <!-- <div class="content" >
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
				                    </div> -->

				                    <div class="row">
				                    	<div class="col-md-6">
				                    	
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

				                    	<div class="col-md-6"> </div>
				                    </div>
				                    			                    

				                    

				                    <div hidden="" class="copyright pull-center">
				                        Copyright © 2017 Salingbantu.or.id.
				                    </div>


				                </div>
				            </footer>
				        </div>
				    </div>
				</div> 

				            
					
			</div>




	<style type="text/css">
		@media screen and (max-width: 768px) {
                         
			.main-raised{
				margin-top: 10px;
				margin-left: 10px;
				margin-right: 10px;
			}

			.h4_responsive{
				font-size: 1.1em;
			}

			.carousel-indicators .active{
				width: 10px; height: 10px;
			}

			#ic1,#ic2,#ic3 { font-size: 3.4em; }
			#what_we_do { padding-top: 15px; }
			#berita_section { background-color: #1e222d; color: white}
			#button_berita {margin-bottom: 20px}
			/*#btn_all_news {background-color: transparent; border: 2px solid; margin-top: -5px; color: #67ffd1}*/
		} 

		@media screen and (min-width: 769px) {
			.main-raised{
				margin-top: -30px;
				margin-left: 15px;
				margin-right: 15px;
			}       

			.h4_responsive{
				font-size: 1.3em;
			}                                         
		} 

		.header-filter::after{
			width: 100%;
		}
		
		.nomargin{
			margin: 0px;
		}
	</style>




<script type="text/javascript">
	var id_kegiatan; var id_berita; var id_program;
	
	$(document).ready(function() {
		if (window_width <= 768){
			$("#carousel_indicators").css('margin-bottom', '0px');
			$("#list_donatur_large").hide();
			$("#list_donatur_small").show();
			get_list_donatur();
			$("#partner_small").show();
			$("#partner_big").hide();
			$("#section1_big").hide();
			$("#section1_small").show();
			$("#what_we_do").css('margin-top', '-15px');
			$("#berita_section").css('padding-bottom', '56px');
			
		}
		else if (window_width >= 769){
			$("#section1_big").show();
			$("#section1_small").hide();
			$("#carousel_indicators").css('margin-bottom', '20px');
			$("#list_donatur_large").show();
			$("#list_donatur_small").hide();
			get_list_donatur2();
			$("#partner_small").hide();
			$("#partner_big").show();
			get_list_dukungan();
			$("#btn_all_news2").css('margin-top', '25px');
			$("#btn_all_news2").css('text-align', 'right');
			$("#btn_all_news").css('color', '#4fc143');
		}

        get_content_page('Salingbantu', '1');
        get_content_page('Salingbantu', '2');
        get_content_page('Salingbantu', '3');
        get_content_page('Salingbantu', '4');
        get_content_page('Salingbantu', '5');
        get_kegiatan();
        get_program();
        get_berita();
        get_list_video();
        resume_salingbantu();
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });

        //owl carousel
        var owl = $('.owl-carousel');
	    owl.owlCarousel({
			stagePadding: 50,
	        loop:true,
	        margin:10,
	        //nav:true,
	        autoWidth:true,
	        responsive:{
	            0:{
	                items:1
	            },
	            600:{
	                items:3
	            },
	            1000:{
	                items:5
	            }
	        } 
	    })
    });

    //typing for searching
    var typingTimer;                
	var doneTypingInterval = 900;  



	//on input change, start the countdown
	$('#cari_judul').on("input", function() {    
	    clearTimeout(typingTimer);
	    typingTimer = setTimeout(function(){
	        get_kegiatan();
	    }, doneTypingInterval);
	});


	function cari_kegiatan_header(){
		$('#cari_kegiatan_header').modal('show');
		get_kegiatan_header();
	}

	function resume_salingbantu(){
		$.ajax({
                url : "<?php echo site_url('Front/resume_salingbantu')?>",
                type: "POST",
                data: { 
                  //"page" : page
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#dermawan_berdonasi').text(data.jumlah_donatur+" <?php echo $this->lang->line('donatur')?>");
                    $('#kegiatan_terdanai').text(data.jumlah_kegiatan+" <?php echo $this->lang->line('kegiatan')?>");
                    $('#dana_dermawan').text("Rp. "+accounting.formatNumber(data.nilai_donasi));
                },
                
        	});
	}
	
	function get_kegiatan(){
		$.ajax({
            url: "<?php echo site_url('Front/get_kegiatan')?>",
            type: "POST",
            data: {
                "kategori": $('#cari_kategori').val(), "judul": $('#cari_judul').val(), "limit":"3",
            },
            dataType: "JSON",
            success: function(data) {
            	$('#content_kegiatan').empty();
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

	function get_program(){
		$.ajax({
            url: "<?php echo site_url('Front/get_program')?>",
            type: "POST",
            data: {
                "kategori": $('#cari_kategori').val(), "judul": $('#cari_judul').val(), "limit":"3",
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

	function get_berita(){
		$.ajax({
            url: "<?php echo site_url('Front/get_berita')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
            	//$('#content_berita').empty();
            	var loop = 1;
            	var loop2 = 1;
            	var rows1; var rows; var static = 1;

                $.each(data, function(k, v) {

                	//alert();
                	//rows="<div class='item' style='margin-bottom: 10px'><div class='card' style='width: 260px'><div class='image'><figure style='border-top-left-radius: 8px; border-top-right-radius:8px'><img class='img' src='http://salingbantu.or.id/assets/img/berita/201706140856008.jpg' alt='Berita salingbantu.or.id' style='width: 100%; height:180px'></figure></div><div align='left' style='background-color: whitesmoke; padding: 10px; box-shadow: 0 0 15px 0 rgba(0, 0, 0, 0.1); border-bottom-left-radius:8px; border-bottom-right-radius:8px'><p class='category'><i class='material-icons'>date_range</i>5 Mei 2017</p><a href='#front' onclick='detil_berita(201706140856008)'><h4 style='width: 100%px; overflow: hidden; text-overflow: ellipsis; height:40px;'>kepedulian kita1</h4></a></div></div></div>";
                	rows="<div class='item' style='background-color: red'><h2>Swipe</h2></div>";
                	//$(rows).appendTo("#content_berita");
                	
                });
                
            }
        });
	}


	function get_list_donatur(){
		$.ajax({
            url: "<?php echo site_url('Front/get_list_donatur')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
            	$('#content_list_donatur').empty();
            	var loop = 1;
            	var loop2 = 1;
            	var rows1; var rows; var static = 1;

                $.each(data, function(k, v) {


                	if (loop == 1) {

                		if (loop2 == 1) {
                			rows1="<div class='item active'><div class='row' id='bulan_list_donatur"+loop+"'></div></div>";
                			$(rows1).appendTo("#content_list_donatur");
                		}
                		
                		if (loop2 <= 3) {
                			

                			//custom for testing mobile
                			rows="<div class='col-xs-4'><div class='card card-profile card-plain' style='margin-top:5px; margin-bottom: 0px'><div class='card-avatar hover01 column'><figure><img class='img-circle' style='width: 40px ;height: 40px' src='<?php echo base_url()?>assets/img/foto/"+v.img+"'></figure></div><div class='card-content' style='margin-top: 0px; margin-bottom5px'></div></div></div>";
                			$(rows).appendTo("#bulan_list_donatur"+loop);
                		}

                		if (loop2 == 3) {
                			loop += 1;
                			loop2 = 0;
                		}
                		loop2 += 1;

                	}
                	else{
                		
                		if (loop2 == 1) {
                			rows1="<div class='item'><div class='row' id='bulan_list_donatur"+loop+"'></div></div>";
                			$(rows1).appendTo("#content_list_donatur");
                		}

                		if (loop2 <= 3) {
                			rows="<div class='col-xs-4'><div class='card card-profile card-plain' style='margin-top:5px; margin-bottom: 0px'><div class='card-avatar hover01 column'><figure><img class='img-circle' style='width: 40px ;height: 40px' src='<?php echo base_url()?>assets/img/foto/"+v.img+"'></figure></div><div class='card-content' style='margin-top: 0px; margin-bottom5px'></div></div></div>";
                			$(rows).appendTo("#bulan_list_donatur"+loop);
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


	function get_list_donatur2(){
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
                			rows="<div class='col-md-3'><div class='card card-profile card-plain' style='margin-top:5px; margin-bottom: 0px'><div class='card-avatar hover01 column'><figure><img style='width: 70px ;height: 70px' class='img-circle' src='<?php echo base_url()?>assets/img/foto/"+v.img+"'></figure></div><div class='card-content' style='margin-top: 0px; margin-bottom: 5px'><p style='margin-bottom:5px'>"+v.nama+"</p></div></div></div>";
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
                			
                			rows="<div  class='col-md-4 col-sm-6'><div align='center' class='card card-profile card-plain' style='margin-top: 10px; box-shadow:0 4px 5px 0px rgba(140, 127, 127, 0.32), 0 7px 10px -5px rgb(101, 97, 97); background-color:black; border-radius:5px'><div style='background-color:white; padding:10px 10px 10px 10px; border-top-left-radius:5px; border-top-right-radius:5px'><h5 class='select_text' style='width: 100%; cursor:pointer; overflow: hidden; text-overflow: ellipsis; height:50px; margin:0px; text-align:justify'>"+v.deskripsi+"</h5></div>"+v.embed+"</div></div>";
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


	function detil_kegiatan(id){
        id_kegiatan = id;
        get_content('Detil_kegiatan');
    }

    function detil_program(id){
    	id_program = id;
        get_content('Detil_program');
    }

    function detil_berita(id){
        id_berita = id;
        get_content('Detil_berita');
    }


</script>


