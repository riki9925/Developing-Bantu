

	<body class="landing-page index-page" id="body_class" style="background-color: transparent;">


		<nav class="navbar navbar-fixed-top navbar-success" style="background-color: white; padding-top: 0px; ">
			


			<div class="tool_header">
				<div class="container">
					<div class="navbar-header"></div>

					<div class="collapse navbar-collapse" id="navbar">
				    	<ul class="nav navbar-nav navbar-right">
				    	

				    		<li>
								<a id="eng_lang"  href="<?php echo base_url(); ?>Languange/LanguageSwitcher/switchLang/english"  style="font-weight: bold; color: green">
									<img class="img" src="<?php echo base_url()?>assets/img/english-flag.png">  English
								</a>
							</li>
				    		<li>
								<a id="ind_lang" href="<?php echo base_url(); ?>Languange/LanguageSwitcher/switchLang/indonesia" style="font-weight: bold; color: green">
									 <img class="img" src="<?php echo base_url()?>assets/img/indonesia-flag.png"> Indonesia
								</a>
							</li>
							<li id="header_login">
								<a id="login" href="#front" onclick="get_content('Login')" style="font-weight: bold; color: green">
									<i class="material-icons">fingerprint</i> Teras Dermawan
								</a>
							</li>

							<li>
								<a id="cari" href="#front" onclick="cari_kegiatan_header()" style="font-weight: bold; color: green">
									<i class="material-icons" style="font-size: 25px; margin-right: 15px">search</i><?php echo $this->lang->line('cari_kegiatan')?>
								</a>
							</li>


							<li id="header_register_top">
								<button  style="margin-top: 5px" onclick="get_content('Register')" class="header_register_top btn btn-info"><?php echo $this->lang->line('calon_dermawan')?><div class="ripple-container"></div></button>
							</li>

							<li>
								<button style="margin-top: 5px" onclick="get_content('Donasi')" class="header_donasi_sekarang_top btn btn-warning"><?php echo $this->lang->line('donasi_sekarang')?><div class="ripple-container"></div></button>
							</li>
				    		
							
							
							<!-- user login -->
					    	<li id="header_user_login" class="dropdown" style="border-left: solid 1px #4fc143; margin-left: 10px">
									<a id="btn_menu" href="#"  class="dropdown-toggle" style="font-weight: bold; color: green; padding-top: 5px; padding-bottom: 5px; " data-toggle="dropdown">
									<img class="img img-circle" id="icon_user_login" style="width: 40px; height: 40px" src="../assets/img/faces/marc.jpg">
									<div class="ripple-container"></div></a>
									<ul class="dropdown-menu dropdown-with-icons">
										<li class="disabled" style="padding: 10px; text-align: center">
											<img id="icon_user_login2" class="img img-circle" style="width: 80px; height: 80px" src="../assets/img/faces/marc.jpg">
											<p><?php echo $this->lang->line('selamat_datang')?></p>
											<h4 id="nama_user_login">Arif rahman</h4>
											<hr>
										</li>
										<li id="header_dashboard1" hidden="">
											<a href="#" onclick="get_content('Dashboard')" style="font-weight: bold; color: green">
											<i class="material-icons">dashboard</i> Dashboard
											</a>
										</li>

										<li id="header_administrator" hidden="">
											<a href="#" onclick="get_content('Administrator')" style="font-weight: bold; color: green">
											<i class="material-icons">dashboard</i> Administrator
											</a>
										</li>
										<li id="header_pengurus" hidden="">
											<a href="#" onclick="get_content('Pengurus')" style="font-weight: bold; color: green">
											<i class="material-icons">dashboard</i> <?php echo $this->lang->line('pengelola')?>
											</a>
										</li>

										<li id="header_logout" hidden="">
											<a id="btn_logout" href="#front" onclick="logout()" style="font-weight: bold; color: green">
												<i class="material-icons">settings_power</i> Log out
											</a>
										</li>
									</ul>
							</li>
							

				    	</ul>
			    	</div>
				</div>
		    </div>


			<div class="container container2" style="margin-top: 10px;">
		        <div class="navbar-header">
		        		
				    	<button id="button_navbar" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
				        	<span class="sr-only">Toggle navigation</span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
				        	<span class="icon-bar"></span>
				    	</button>
			    		
			    		<a href="#" class="navbar-toggle" onclick="cari_kegiatan_header()" style="margin-top: 0px; color: black">
                            <i class="material-icons" style="margin-top: 5px">search</i>
                        </a>

			        	<div class="logo-container" style="width: 180px; height: 50px">
			                <div class="logo">
			                	<a href="#front" onclick="get_content('Salingbantu')">
			                    <img style="height: 40px; margin-top: 8px; margin-left: 10px" src="<?php echo base_url()?>assets/img/salingbantu5.png" alt="Salingabntu.or.id" rel="tooltip" title="" data-placement="bottom" data-html="true" >
			                    </a>
			                </div>
						</div>
			      	
			    </div>

			    <div class="collapse navbar-collapse" id="navigation-index" style="max-height: 460px">
			    	<div class="row">
			    			<div style="padding-top: 20px; border-bottom: solid 1px #4fc143" id="user_login" class="col-xs-12" align="center" hidden="">
			    				<img id="icon_user_login3" class="img img-circle" style="width: 80px; height: 80px" src="">
			    				<h4 id="nama_user_login3" style="color: black"></h4>
			    				
			    				<div class="row" style="margin-bottom: 10px">
			    					<div class="col-xs-6 text-right" style="border-right: solid 2px black">
			    						<a id="header_dashboard3" href="#" onclick="get_content('Dashboard')" style="font-weight: bold; color: green"><i class="material-icons">dashboard</i> Dashboard</a>
										
										<a id="header_administrator3" href="#" onclick="get_content('Administrator')" style="font-weight: bold; color: green"><i class="material-icons">dashboard</i> Administrator</a>
											
										<a id="header_pengurus3" href="#" onclick="get_content('Pengurus')" style="font-weight: bold; color: green; "><i class="material-icons">dashboard</i> <?php echo $this->lang->line('pengelola')?></a>
			    					</div>
			    					<div class="col-xs-6 text-left">
			    						<a href="#front" onclick="logout()" style="font-weight: bold; color: green; margin-top: 10px"><i class="material-icons">settings_power</i> Log out</a>
			    					</div>
			    				</div>
			    			</div>

			    			<div id="user_login2" class="col-xs-10 pull-right">
			    				<ul class="nav navbar-nav navbar-right">


								<!-- aktivitas kami -->
					    		<li class="dropdown">
									<a id="btn_menu" href="#"  class="dropdown-toggle" style="font-weight: bold; color: green" data-toggle="dropdown"><?php echo $this->lang->line('aktivitas_kami')?><b class="caret"></b>
									<div class="ripple-container"></div></a>
									<ul class="dropdown-menu dropdown-with-icons">
										
										<li>
											<a href="#front" onclick="get_content('Program_terkini')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('program_terkini')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content('Jaringan_global')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('jaringan_global')?>
											</a>
										</li>
									</ul>
								</li>


								<!-- Berita dan media -->
					    		<li class="dropdown">
									<a id="btn_menu" href="#"  class="dropdown-toggle" style="font-weight: bold; color: green" data-toggle="dropdown"><?php echo $this->lang->line('berita_dan_media')?><b class="caret"></b>
									<div class="ripple-container"></div></a>
									<ul class="dropdown-menu dropdown-with-icons">
										
										<li>
											<a href="#front" onclick="get_content('')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i>Foto
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content('')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> Video
											</a>
										</li>
									</ul>
								</li>


								<!-- panduan berdonasi -->
					    		<li class="dropdown">
									<a id="btn_menu" href="#"  class="dropdown-toggle" style="font-weight: bold; color: green" data-toggle="dropdown"> <?php echo $this->lang->line('panduan_berdonasi')?> <b class="caret"></b>
									<div class="ripple-container"></div></a>
									<ul class="dropdown-menu dropdown-with-icons">
										
										<li>
											<a href="#front" onclick="get_content_halaman('Page_donasi_online')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('donasi_online')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman('Page_transfer_bank')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('transfer_bank')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman('Page_donasi_natuna')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('donasi_natuna')?>
											</a>
										</li>
									</ul>
								</li>


								<!-- tentang kami -->
					    		<li class="dropdown">
									<a id="btn_menu" href="#"  class="dropdown-toggle" style="font-weight: bold; color: green" data-toggle="dropdown"><?php echo $this->lang->line('tentang_kami')?><b class="caret"></b>
									<div class="ripple-container"></div></a>
									<ul class="dropdown-menu dropdown-with-icons">
										
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_sejarah')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('sejarah')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_visi_misi')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('visi_misi')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_menejemen')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('manajemen')?>
											</a>
										</li>
										
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_mitra')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('mitra')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_karir')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('karir')?>
											</a>
										</li>
										<li hidden="">
											<a href="#front" onclick="get_content_halaman_kami('Page_tentang_kami')" style="font-weight: bold; color: green">
												<i class="material-icons">group</i> <?php echo $this->lang->line('tentang_kami')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_kontak')" style="font-weight: bold; color: green">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('kontak_kami')?>
											</a>
										</li>
									</ul>
								</li>


								<li id="login_layar_kecil" style="border-top: solid 1px #4fc143; display: none;">
										<div class="row" style="margin-top: 20px; margin-bottom: 10px ;padding-left: 10px">
											<div class="col-xs-12">
												<a name="login" class="btn btn-white" href="#front" onclick="get_content('Login')" style="font-weight: bold; color: green"> Teras Dermawan</a>
												<button name="register" style="margin-top: 5px" onclick="get_content('Register')" class="header_register_top btn btn-info">Donors candidate<div class="ripple-container"></div></button>
											</div>

											<div class="col-xs-6" style="margin-top: 0px">
												<a id="ind_layar_kecil" href="<?php echo base_url(); ?>Languange/LanguageSwitcher/switchLang/indonesia" style="font-weight: bold; color: green; display: none;"><img class="img" src="<?php echo base_url()?>assets/img/indonesia-flag.png"> Indonesia</a>
											</div>
											<div class="col-xs-6" style="margin-top: 0px">
												<a id="eng_layar_kecil" href="<?php echo base_url(); ?>Languange/LanguageSwitcher/switchLang/english"  style="font-weight: bold; color: green; display: none;"><img class="img" src="<?php echo base_url()?>assets/img/english-flag.png"> Inggris</a>
											</div>
										</div>
								</li>
						
								
								<li id="header_register"  hidden="">
									<button  style="margin-top: 5px" onclick="get_content('Register')" class="header_register btn btn-info"><?php echo $this->lang->line('calon_dermawan')?><div class="ripple-container"></div></button>
									
								</li>

								<li>
									<button style="margin-top: 5px" onclick="get_content('Donasi')" class="header_donasi_sekarang btn btn-warning"><?php echo $this->lang->line('donasi_sekarang')?><div class="ripple-container"></div></button>
								</li>
					    	</ul>
			    			</div>
			    		</div>

			    	

			    </div>
			</div>
		</nav>

	    

		<div class="se-pre-con"></div>
	    <div class="wrapper" id="content_page" style="background-color: white;">
	    	
	    <!-- html page here -->


	    	
	  	</div>
	</body>

				

				<div class="modal fade" id="donasi" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">

                            <div class="modal-body">
                            	<button data-dismiss='modal' id="minimizeSidebar" class="btn btn-round btn-danger btn-fill btn-just-icon">
                                        <i class="material-icons">clear</i>
                                    <div class="ripple-container"></div></button>
                                    <div id="image_list" style="margin-top: -87px; margin-left: -25px;margin-right: -25px; margin-bottom: -26px"></div>
                            </div>                        
                        </div>
                    </div>
                </div>


                
                <!-- cari kegiatan header -->
                <div class="modal fade" id="cari_kegiatan_header" align="center" role="dialog" data-backdrop="static" and data-keyboard="false">
                    <div class="modal-dialog" style="width: 90%; margin-top: 60px">
                        <div class="modal-content" style="border-radius: 0px">


                            <div class="modal-body" style="padding-top:0px; padding-right:15px; padding-bottom:0px; padding-left:15px">
                                        
                                    <div class="row">

                                        <div class="col-sm-3 col-xs-12" style="text-align: left;">
                                            <div class="row">
                                                <div class="col-xs-10" style="background-color: #4fc143;">
                                                    <h4 style="color: white"><i class="material-icons">search</i>Cari kegiatan </h4>
                                                </div>
                                                <div class="col-xs-2" align="right" style="background-color: #4fc143;">
                                                    <h4 data-dismiss="modal" style="color: white; cursor: pointer;"><i class="material-icons">close</i></h4>
                                                </div>
                                            </div>

                                            
                                            <div class="row" style="margin-left: 0px; margin-right: 0px">

                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons">sort</i></span>
                                                    <div class="form-group label-floating is-empty">
                                                    	<select style="margin-top: 5px" onchange="get_kegiatan_header()" id="cari_kategori_header" class="form-control">
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
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon nomargin" style="padding: 0px 15px 0px">
                                                        <i class="material-icons">text_fields</i>
                                                    </span>
                                                    <div class="form-group label-floating is-empty nomargin" style="padding: 0px">
	                                                   	<label class="control-label">Judul kegiatan</label>
	                                                    <input id="cari_judul_kegiatan_header" class="form-control" type="text">
                                                        
                                                    </div>
                                                </div>

                                                <div class="input-group">
                                                    <span class="input-group-addon"><i class="material-icons">swap_vert</i></span>
                                                    <div class="form-group label-floating is-empty">
                                                    	<select style="margin-top: 5px" onchange="get_kegiatan_header()" id="cari_kategori_terlama" class="form-control">
                                                    		<option value='terbaru'>Kegiatan terbaru</option>
                                                    		<option value='terlama'>Kegiatan terlama</option>
                                                        </select> 
                                                    </div>
                                                </div>

                                            </div>
                                            
                                        </div>

                                        <div class="col-sm-9 col-xs-12" align="left" style="background-color: whitesmoke; padding-left: 30px; padding-right: 30px ;max-height: 500px; overflow-y: scroll;">
                                        	
                                        	<div class="row" id="content_kegiatan_header" style="margin-top: 20px; margin-bottom: 20px">
				    				
                                        		<div class="col-sm-4" style="padding-right: 15px; padding-left: 0px">
							    					<div class="card card-raised card-carousel" style="margin: 10px">
														<div id="carousel-example-kegiatan" class="carousel slide" data-ride="carousel">


																<div class="carousel slide" data-ride="carousel">

																	<!-- Indicators -->
																	<ol class="carousel-indicators">
																		<li data-target="#carousel-example-kegiatan" data-slide-to="0" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="1" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="2" class="active"></li>
																	</ol>

																	<!-- Wrapper for slides -->
																	<div class="carousel-inner">

																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg2.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg3.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item active">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg4.jpeg" alt="Awesome Image">
																		</div>

																	</div>

																	<!-- Controls -->
																	<a class="left carousel-control" href="#carousel-example-kegiatan" data-slide="prev">
																		<i class="material-icons">keyboard_arrow_left</i>
																	</a>
																	<a class="right carousel-control" href="#carousel-example-kegiatan" data-slide="next">
																		<i class="material-icons">keyboard_arrow_right</i>
																	</a>
																</div>
																<div class="content" style="text-align: left">
																	<div class="row">
																		<div class="">
																			<div class="col-xs-8" style="padding-right: 0px">
																				<p class="p_12" style="text-transform: uppercase; color:#4fc143"><i class="material-icons">sort</i>Anak terlantar</p>
																			</div>
																			<div class="col-xs-4" style="padding-left: 0px">
																				<p class="pull-right p_12" style="color:#36d1dc"><i class="material-icons">verified_user</i>SELESAI</p>
																			</div>
																		</div>
																	</div>
																	<p style="width: 100%; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px">300 PAKET BERBUKA UNTUK SD JUARA PEKANBARU</p>
																	<div class="row" style="margin-top: 15px">
																		<div class="col-md-3 col-sm-3 col-xs-3" style="text-align: left; height: 10px">
																			<div class="circles">
																				<div class="second circle 201706040206004">
																					<canvas width="50" height="50"></canvas>
																					<strong>0<i>%</i></strong>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Terkumpul</p>
																			<p class="p_12"><b>Rp. 0</b></p>
																		</div>
																		<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Sisa waktu</p>
																			<p class="p_12"><b>1 Hari</b></p>
																		</div>
																	</div>
																</div>
															

														</div>
													</div>
												</div>

												<div class="col-sm-4" style="padding-right: 15px; padding-left: 0px">
							    					<div class="card card-raised card-carousel" style="margin: 10px">
														<div id="carousel-example-kegiatan" class="carousel slide" data-ride="carousel">


																<div class="carousel slide" data-ride="carousel">

																	<!-- Indicators -->
																	<ol class="carousel-indicators">
																		<li data-target="#carousel-example-kegiatan" data-slide-to="0" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="1" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="2" class="active"></li>
																	</ol>

																	<!-- Wrapper for slides -->
																	<div class="carousel-inner">

																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg2.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg3.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item active">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg4.jpeg" alt="Awesome Image">
																		</div>

																	</div>

																	<!-- Controls -->
																	<a class="left carousel-control" href="#carousel-example-kegiatan" data-slide="prev">
																		<i class="material-icons">keyboard_arrow_left</i>
																	</a>
																	<a class="right carousel-control" href="#carousel-example-kegiatan" data-slide="next">
																		<i class="material-icons">keyboard_arrow_right</i>
																	</a>
																</div>
																<div class="content" style="text-align: left">
																	<div class="row">
																		<div class="">
																			<div class="col-xs-8" style="padding-right: 0px">
																				<p class="p_12" style="text-transform: uppercase; color:#4fc143"><i class="material-icons">sort</i>Anak terlantar</p>
																			</div>
																			<div class="col-xs-4" style="padding-left: 0px">
																				<p class="pull-right p_12" style="color:#36d1dc"><i class="material-icons">verified_user</i>SELESAI</p>
																			</div>
																		</div>
																	</div>
																	<p style="width: 100%; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px">300 PAKET BERBUKA UNTUK SD JUARA PEKANBARU</p>
																	<div class="row" style="margin-top: 15px">
																		<div class="col-md-3 col-sm-3 col-xs-3" style="text-align: left; height: 10px">
																			<div class="circles">
																				<div class="second circle 201706040206004">
																					<canvas width="50" height="50"></canvas>
																					<strong>0<i>%</i></strong>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Terkumpul</p>
																			<p class="p_12"><b>Rp. 0</b></p>
																		</div>
																		<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Sisa waktu</p>
																			<p class="p_12"><b>1 Hari</b></p>
																		</div>
																	</div>
																</div>
															

														</div>
													</div>
												</div>

												<div class="col-sm-4" style="padding-right: 15px; padding-left: 0px">
							    					<div class="card card-raised card-carousel" style="margin: 10px">
														<div id="carousel-example-kegiatan" class="carousel slide" data-ride="carousel">


																<div class="carousel slide" data-ride="carousel">

																	<!-- Indicators -->
																	<ol class="carousel-indicators">
																		<li data-target="#carousel-example-kegiatan" data-slide-to="0" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="1" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="2" class="active"></li>
																	</ol>

																	<!-- Wrapper for slides -->
																	<div class="carousel-inner">

																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg2.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg3.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item active">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg4.jpeg" alt="Awesome Image">
																		</div>

																	</div>

																	<!-- Controls -->
																	<a class="left carousel-control" href="#carousel-example-kegiatan" data-slide="prev">
																		<i class="material-icons">keyboard_arrow_left</i>
																	</a>
																	<a class="right carousel-control" href="#carousel-example-kegiatan" data-slide="next">
																		<i class="material-icons">keyboard_arrow_right</i>
																	</a>
																</div>
																<div class="content" style="text-align: left">
																	<div class="row">
																		<div class="">
																			<div class="col-xs-8" style="padding-right: 0px">
																				<p class="p_12" style="text-transform: uppercase; color:#4fc143"><i class="material-icons">sort</i>Anak terlantar</p>
																			</div>
																			<div class="col-xs-4" style="padding-left: 0px">
																				<p class="pull-right p_12" style="color:#36d1dc"><i class="material-icons">verified_user</i>SELESAI</p>
																			</div>
																		</div>
																	</div>
																	<p style="width: 100%; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px">300 PAKET BERBUKA UNTUK SD JUARA PEKANBARU</p>
																	<div class="row" style="margin-top: 15px">
																		<div class="col-md-3 col-sm-3 col-xs-3" style="text-align: left; height: 10px">
																			<div class="circles">
																				<div class="second circle 201706040206004">
																					<canvas width="50" height="50"></canvas>
																					<strong>0<i>%</i></strong>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Terkumpul</p>
																			<p class="p_12"><b>Rp. 0</b></p>
																		</div>
																		<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Sisa waktu</p>
																			<p class="p_12"><b>1 Hari</b></p>
																		</div>
																	</div>
																</div>
															

														</div>
													</div>
												</div>


												<div class="col-sm-4" style="padding-right: 15px; padding-left: 0px">
							    					<div class="card card-raised card-carousel" style="margin: 10px">
														<div id="carousel-example-kegiatan" class="carousel slide" data-ride="carousel">


																<div class="carousel slide" data-ride="carousel">

																	<!-- Indicators -->
																	<ol class="carousel-indicators">
																		<li data-target="#carousel-example-kegiatan" data-slide-to="0" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="1" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="2" class="active"></li>
																	</ol>

																	<!-- Wrapper for slides -->
																	<div class="carousel-inner">

																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg2.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg3.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item active">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg4.jpeg" alt="Awesome Image">
																		</div>

																	</div>

																	<!-- Controls -->
																	<a class="left carousel-control" href="#carousel-example-kegiatan" data-slide="prev">
																		<i class="material-icons">keyboard_arrow_left</i>
																	</a>
																	<a class="right carousel-control" href="#carousel-example-kegiatan" data-slide="next">
																		<i class="material-icons">keyboard_arrow_right</i>
																	</a>
																</div>
																<div class="content" style="text-align: left">
																	<div class="row">
																		<div class="">
																			<div class="col-xs-8" style="padding-right: 0px">
																				<p class="p_12" style="text-transform: uppercase; color:#4fc143"><i class="material-icons">sort</i>Anak terlantar</p>
																			</div>
																			<div class="col-xs-4" style="padding-left: 0px">
																				<p class="pull-right p_12" style="color:#36d1dc"><i class="material-icons">verified_user</i>SELESAI</p>
																			</div>
																		</div>
																	</div>
																	<p style="width: 100%; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px">300 PAKET BERBUKA UNTUK SD JUARA PEKANBARU</p>
																	<div class="row" style="margin-top: 15px">
																		<div class="col-md-3 col-sm-3 col-xs-3" style="text-align: left; height: 10px">
																			<div class="circles">
																				<div class="second circle 201706040206004">
																					<canvas width="50" height="50"></canvas>
																					<strong>0<i>%</i></strong>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Terkumpul</p>
																			<p class="p_12"><b>Rp. 0</b></p>
																		</div>
																		<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Sisa waktu</p>
																			<p class="p_12"><b>1 Hari</b></p>
																		</div>
																	</div>
																</div>
															

														</div>
													</div>
												</div>

												<div class="col-sm-4" style="padding-right: 15px; padding-left: 0px">
							    					<div class="card card-raised card-carousel" style="margin: 10px">
														<div id="carousel-example-kegiatan" class="carousel slide" data-ride="carousel">


																<div class="carousel slide" data-ride="carousel">

																	<!-- Indicators -->
																	<ol class="carousel-indicators">
																		<li data-target="#carousel-example-kegiatan" data-slide-to="0" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="1" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="2" class="active"></li>
																	</ol>

																	<!-- Wrapper for slides -->
																	<div class="carousel-inner">

																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg2.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg3.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item active">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg4.jpeg" alt="Awesome Image">
																		</div>

																	</div>

																	<!-- Controls -->
																	<a class="left carousel-control" href="#carousel-example-kegiatan" data-slide="prev">
																		<i class="material-icons">keyboard_arrow_left</i>
																	</a>
																	<a class="right carousel-control" href="#carousel-example-kegiatan" data-slide="next">
																		<i class="material-icons">keyboard_arrow_right</i>
																	</a>
																</div>
																<div class="content" style="text-align: left">
																	<div class="row">
																		<div class="">
																			<div class="col-xs-8" style="padding-right: 0px">
																				<p class="p_12" style="text-transform: uppercase; color:#4fc143"><i class="material-icons">sort</i>Anak terlantar</p>
																			</div>
																			<div class="col-xs-4" style="padding-left: 0px">
																				<p class="pull-right p_12" style="color:#36d1dc"><i class="material-icons">verified_user</i>SELESAI</p>
																			</div>
																		</div>
																	</div>
																	<p style="width: 100%; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px">300 PAKET BERBUKA UNTUK SD JUARA PEKANBARU</p>
																	<div class="row" style="margin-top: 15px">
																		<div class="col-md-3 col-sm-3 col-xs-3" style="text-align: left; height: 10px">
																			<div class="circles">
																				<div class="second circle 201706040206004">
																					<canvas width="50" height="50"></canvas>
																					<strong>0<i>%</i></strong>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Terkumpul</p>
																			<p class="p_12"><b>Rp. 0</b></p>
																		</div>
																		<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Sisa waktu</p>
																			<p class="p_12"><b>1 Hari</b></p>
																		</div>
																	</div>
																</div>
															

														</div>
													</div>
												</div>

												<div class="col-sm-4" style="padding-right: 15px; padding-left: 0px">
							    					<div class="card card-raised card-carousel" style="margin: 10px">
														<div id="carousel-example-kegiatan" class="carousel slide" data-ride="carousel">


																<div class="carousel slide" data-ride="carousel">

																	<!-- Indicators -->
																	<ol class="carousel-indicators">
																		<li data-target="#carousel-example-kegiatan" data-slide-to="0" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="1" class=""></li>
																		<li data-target="#carousel-example-kegiatan" data-slide-to="2" class="active"></li>
																	</ol>

																	<!-- Wrapper for slides -->
																	<div class="carousel-inner">

																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg2.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg3.jpeg" alt="Awesome Image">
																		</div>
																		<div class="item active">
																			<img style="max-height: 400px" src="<?php echo base_url()?>assets/img/bg4.jpeg" alt="Awesome Image">
																		</div>

																	</div>

																	<!-- Controls -->
																	<a class="left carousel-control" href="#carousel-example-kegiatan" data-slide="prev">
																		<i class="material-icons">keyboard_arrow_left</i>
																	</a>
																	<a class="right carousel-control" href="#carousel-example-kegiatan" data-slide="next">
																		<i class="material-icons">keyboard_arrow_right</i>
																	</a>
																</div>
																<div class="content" style="text-align: left">
																	<div class="row">
																		<div class="">
																			<div class="col-xs-8" style="padding-right: 0px">
																				<p class="p_12" style="text-transform: uppercase; color:#4fc143"><i class="material-icons">sort</i>Anak terlantar</p>
																			</div>
																			<div class="col-xs-4" style="padding-left: 0px">
																				<p class="pull-right p_12" style="color:#36d1dc"><i class="material-icons">verified_user</i>SELESAI</p>
																			</div>
																		</div>
																	</div>
																	<p style="width: 100%; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px">300 PAKET BERBUKA UNTUK SD JUARA PEKANBARU</p>
																	<div class="row" style="margin-top: 15px">
																		<div class="col-md-3 col-sm-3 col-xs-3" style="text-align: left; height: 10px">
																			<div class="circles">
																				<div class="second circle 201706040206004">
																					<canvas width="50" height="50"></canvas>
																					<strong>0<i>%</i></strong>
																				</div>
																			</div>
																		</div>
																		<div class="col-md-5 col-sm-5 col-xs-5" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Terkumpul</p>
																			<p class="p_12"><b>Rp. 0</b></p>
																		</div>
																		<div class="col-md-4 col-sm-4 col-xs-4" style="text-align: left">
																			<p class="p_12" style="margin-bottom: 0px">Sisa waktu</p>
																			<p class="p_12"><b>1 Hari</b></p>
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
                        </div>
                    </div>
                </div>




                <!-- payment front -->
                <div class="modal fade" id="payment_front" align="center" role="dialog" data-backdrop="static" and data-keyboard="false">
                    <div class="modal-dialog" id="width_payment" style="width: 60%">
                        <div class="modal-content" style="border-radius: 0px">
                            <div class="modal-header" hidden="" style="background-color:#4fc143">
                                  <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                  <h3 style="color: white" class="modal-title"><i class="material-icons">payment</i> Payment </h3>
                            </div>

                            <div class="modal-body" style="padding-top:0px; padding-right:15px; padding-bottom:0px; padding-left:15px">
                                        
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12" style="text-align: left; min-height: 540px">
                                            <div class="row">
                                                <div class="col-xs-10" style="background-color: #4fc143;">
                                                    <h4 style="color: white"><i class="material-icons">payment</i>Payment</h4>
                                                </div>
                                                <div class="col-xs-2" align="right" style="background-color: #4fc143;">
                                                    <h4 data-dismiss="modal" style="color: white; cursor: pointer;"><i class="material-icons">close</i></h4>
                                                </div>
                                            </div>

                                            <div class="row" style="margin-top: 20px">
                                                <div class="col-xs-3">
                                                    <div class="photo">
                                                        <img class="img-circle" style="width: 50px; height: 50px" id="d_foto_user2" src="" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-9">
                                                    <p style="margin-bottom: 0px">Dermawan</p>
                                                    <h4 style="margin-top: 0px" id="d_nama_user2"></h4>
                                                </div>
                                            </div>
                                            
                                            <div class="row" style="margin-left: 0px; margin-right: 0px">

                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty">
                                                            <p  style="margin-top: 0px;"><b id="d_email_user2">ex</b></p>
                                                            <div id="d_email_user3">
                                                            	<label class="control-label">Tulis alamat email
                                                                	<small>(required)</small>
	                                                            </label>
	                                                            <input id="d_input_email" class="form-control" type="email">
                                                            </div>
                                                        </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon nomargin" style="padding: 0px 15px 0px">
                                                        <i class="material-icons">settings_phone</i>
                                                    </span>
                                                    <div class="form-group label-floating is-empty nomargin" style="padding: 0px">
                                                        <p style="margin-top: 0px;"><b id="d_hp_user2">ex</b></p>
                                                        <div id="d_hp_user3">
                                                           	<label class="control-label">Tulis nomor HP
                                                                <small>(required)</small>
	                                                        </label>
	                                                        <input id="d_input_hp" class="form-control" type="digit">
                                                        </div>
                                                    </div>
                                                </div>

                                                <p style="padding: 5px; color: #4fc143; background-color: whitesmoke; margin-left: 15px; margin-top: 15px">Kode transfer anda akan dikirim ke nomor HP dan email diatas</p>

                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">keyboard</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label">Nilai transfer
                                                                <small>(required)</small>
                                                            </label>
                                                            <input id="d_input_payment" onchange="get_total_payment()" class="form-control" type="digit">
                                                        <span class="material-input"></span></div>
                                                </div>

                                                <div class="input-group">
                                                        <span class="input-group-addon nomargin">
                                                            <i class="material-icons">info_outline</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty nomargin" style="padding: 0px">
                                                            <p style="margin-bottom: 0px">Biaya administrasi</p>
                                                            <p style="margin-top: 0px;"><b>Rp.</b><b id="biaya_payment"></b></p>
                                                        </div>
                                                </div>

                                                <div class="input-group">
                                                        <span class="input-group-addon nomargin">
                                                            <i class="material-icons">swap_horiz</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty nomargin" style="padding: 0px">
                                                            <p style="margin-bottom: 0px">Total payment</p>
                                                            <h4 style="margin-top: 0px; margin-bottom: 0px ;color: #4fc143"><b>Rp. </b><b id="d_total_payment">0</b></h4>
                                                        </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>

                                        <div class="col-sm-8 col-xs-12 ScrollStyle" align="left" style="background-color: whitesmoke; min-height: 540px">

                                            <h4 style="color: #4fc143"><i class="material-icons">payment</i>  Pilih cara pembayaran anda</h4>

                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                                <div class="panel panel-default">
                                                    <div style="padding: 10px 10px 10px 15px; background-color: white; border-bottom: unset" class="panel-heading" role="tab" id="headingOne2">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                                            <h4 class="panel-title">
                                                                <img style="width: 100px" class="img" src="<?php echo base_url()?>assets/img/payment/mandiri.png">
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne2">
                                                        <div class="panel-body" style="padding: 15px 15px 5px; background-color: rgb(236, 240, 241)">
                                                        
                                                            <ul class="timeline timeline-simple">
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge danger">
                                                                        <h4 style="margin-top: 5px">1</h4>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Step 1<br>Deskripsi</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge success">
                                                                        <h4 style="margin-top: 5px">2</h4>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Step 2<br>Deskripsi</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <a data-dismiss="modal" class="btn btn-success pull-right" onclick="pembayaran_sekarang()"><i class="material-icons">account_balance_wallet</i>Pilih pembayaran</a>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="panel panel-default">
                                                    <div style="padding: 10px 10px 10px 15px; background-color: white; border-bottom: unset" class="panel-heading" role="tab" id="headingTwo">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                                            <h4 class="panel-title">
                                                                <img style="width: 100px" class="img" src="<?php echo base_url()?>assets/img/payment/bca.png">
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2">
                                                        <div class="panel-body" style="padding: 15px 15px 5px; background-color: rgb(236, 240, 241)">
                                                        
                                                            <ul class="timeline timeline-simple">
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge danger">
                                                                        <h4 style="margin-top: 5px">1</h4>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Step 1<br>Deskripsi</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge success">
                                                                        <h4 style="margin-top: 5px">2</h4>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Step 2<br>Deskripsi</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <a data-dismiss="modal" class="btn btn-success pull-right" onclick="pembayaran_sekarang()"><i class="material-icons">account_balance_wallet</i>Pilih pembayaran</a>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="panel panel-default">
                                                    <div style="padding: 10px 10px 10px 15px; background-color: white; border-bottom: unset" class="panel-heading" role="tab" id="headingThree">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <h4 class="panel-title">
                                                                <img style="width: 100px" class="img" src="<?php echo base_url()?>assets/img/payment/bni.png">
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body" style="padding: 15px 15px 5px; background-color: rgb(236, 240, 241)">
                                                        
                                                            <ul class="timeline timeline-simple">
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge danger">
                                                                        <h4 style="margin-top: 5px">1</h4>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Step 1<br>Deskripsi</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge success">
                                                                        <h4 style="margin-top: 5px">2</h4>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Step 2<br>Deskripsi</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <a data-dismiss="modal" class="btn btn-success pull-right" onclick="pembayaran_sekarang()"><i class="material-icons">account_balance_wallet</i>Pilih pembayaran</a>
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


                <!-- slide image -->
                <div class="modal fade" id="modal_slide" align="center" role="dialog" data-backdrop="static" and data-keyboard="false">
                    <div class="modal-dialog"  style="width: 100%">
                        <div class="modal-content" style="border-radius: 0px">
                            
                            <div class="modal-body" style="padding-top:0px; padding-right:15px; padding-bottom:0px; padding-left:15px">
                                       
                                   
                            </div>
                        </div>
                    </div>
                </div>



                    <!-- <div class="modal fade" id="" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body" >
                                    
                                </div>
                            </div>
                        </div>
                    </div> -->

</html>

        
	<div class="modal fade in" id="modalvideo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="material-icons">clear</i>
					</button>
					<h4 class="modal-title"><?php echo $nama_website ?></h4>
				</div>
				<div class="modal-body">
					<iframe width="100%" height="315" src="https://www.youtube.com/embed/XrdVOE-WR9o" frameborder="0" allowfullscreen></iframe>
				</div>
				
			</div>
		</div>
	</div>





	<style type="text/css">
		.p_12{
			font-size: 12px;
		}
		.modal-open .modal{
			background-color: #00000080;
		}

		.disabled {
		    pointer-events:none; 
		    opacity:0.6;         
		}

		.timeline::before{bottom:100px;}


		@media screen and (max-width: 767px) {
			.wrapper {
				margin-top: 75px;
				background-color: white;
			}

			.container-fluid>.navbar-collapse, .container-fluid>.navbar-header, .container>.navbar-collapse, .container>.navbar-header{
				margin-left: -15px;
				margin-right: -15px;
			}

			.tool_header{
				display: none;
			}

			.navbar .navbar-collapse, .navbar .navbar-form{
				background-color: white;
				border-top: solid 2px #4fc143;
			}
			.navbar-collapse collapse in{
				.navbar.navbar-success{
				border-radius: 100%/0 0 30px 30px;
			}
			}
		} 

		@media screen and (max-width: 1199px) {
			.header_register{
				display: none;
			}

			.header_donasi_sekarang{
				display: none;
			}

			.header_register_top{
				display: block;
			}

			.header_donasi_sekarang_top{
				display: block;
			}
		}

		
		@media screen and (min-width: 1200px) {
			.header_register{
				display: block;
			}

			.header_donasi_sekarang{
				display: block;
			}

			.header_register_top{
				display: none;
			}

			.header_donasi_sekarang_top{
				display: none;
			}
		}

		@media screen and (min-width: 769px) {
			.wrapper {
				margin-top: 130px;
			}                                                
		} 

		@media screen and (min-width: 991px) {
			.container2 {
				width: 970px;
			}                                                
		} 


		@media screen and (min-width: 1200px) {
			.container2 {
				width: unset;
			}                                                
		} 

		

		@media screen and (max-width: 990px) {
			.container2 {
				width: 850px;
			}                                                
		} 

		@media screen and (max-width: 767px) {
			.container2 {
				width: unset;
			}                                          
		} 


		.se-pre-con {
	      position: fixed;
	      left: 0px;
	      top: 0px;
	      width: 100%;
	      height: 100%;
	      z-index: 9999;
	      opacity: 0.9;
	      background: url(<?= base_url("assets/img/loading1.gif"); ?>) center no-repeat #ecf0f1;
	    }


	    button, input, optgroup, select, textarea{
	    	color: green;
	    }


	    /*cicrcle progress bar*/
		.circles {
		  margin-bottom: -10px;
		}

		.circle {
		  width: 50px;
		  margin: 0px;
		  display: inline-block;
		  position: relative;
		  text-align: center;
		  line-height: 1.2;
		}

		.circle canvas {
		  vertical-align: top;
		}

		.circle strong {
		  position: absolute;
		  top: 5px;
		  left: 0px;
		  width: 50px;
		  text-align: center;
		  line-height: 40px;
		  font-size: 20px;
		}

		.circle strong i {
		  font-style: normal;
		  font-size: 0.6em;
		  font-weight: normal;
		}

		.circle span {
		  display: block;
		  color: #aaa;
		  margin-top: 12px;
		}

		

		@media (max-height: 600px), (max-width: 480px) {
		  .credits {
		    position: inherit;
		  }
		}


		.modal .modal-dialog{
            margin-top: 30px;
        }

        .nomargin{
        	margin: 0px;
        }


        .ScrollStyle
        {
            max-height: 540px;
            overflow-y: scroll;
        }

        .tool_header {
		    height: 60px;
		    width: 100%;
		    background-color: whitesmoke;
		    color: black;
		    padding-top: 5px;
		    border-bottom: solid 3px #d3d3d3;
		}


		/*hover*/
		.column {
			margin: unset;
			padding: 0;
		}
		.column:last-child {
			padding-bottom: 60px;
		}
		.column::after {
			content: '';
			clear: both;
			display: block;
		}
		.column div {
			position: relative;
			float: left;
			width: 300px;
			height: 200px;
			margin: 0 0 0 25px;
			padding: 0;
		}
		.column div:first-child {
			margin-left: 0;
		}
		.column div span {
			position: absolute;
			bottom: -20px;
			left: 0;
			z-index: -1;
			display: block;
			width: 300px;
			margin: 0;
			padding: 0;
			color: #444;
			font-size: 18px;
			text-decoration: none;
			text-align: center;
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
			opacity: 0;
		}
		figure {
			width: 100%;
			height: 100%;
			margin: 0;
			padding: 0;
			background: transparent;
			overflow: hidden;
		}
		figure:hover+span {
			bottom: -36px;
			opacity: 1;
		}



		/* Zoom In #1 */
		.hover01 figure img {
			-webkit-transform: scale(1);
			transform: scale(1);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover01 figure:hover img {
			-webkit-transform: scale(1.3);
			transform: scale(1.3);
		}

		/* Zoom In #2 */
		.hover02 figure img {
			width: 300px;
			height: auto;
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover02 figure:hover img {
			width: 350px;
		}

		/* Zoom Out #1 */
		.hover03 figure img {
			-webkit-transform: scale(1.5);
			transform: scale(1.5);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover03 figure:hover img {
			-webkit-transform: scale(1);
			transform: scale(1);
		}

		/* Zoom Out #2 */
		.hover04 figure img {
			width: 400px;
			height: auto;
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover04 figure:hover img {
			width: 300px;
		}

		/* Slide */
		.hover05 figure img {
			margin-left: 30px;
			-webkit-transform: scale(1.5);
			transform: scale(1.5);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover05 figure:hover img {
			margin-left: 0;
		}

		/* Rotate */
		.hover06 figure img {
			-webkit-transform: rotate(15deg) scale(1.4);
			transform: rotate(15deg) scale(1.4);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover06 figure:hover img {
			-webkit-transform: rotate(0) scale(1);
			transform: rotate(0) scale(1);
		}

		/* Blur */
		.hover07 figure img {
			-webkit-filter: blur(3px);
			filter: blur(3px);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover07 figure:hover img {
			-webkit-filter: blur(0);
			filter: blur(0);
		}

		/* Gray Scale */
		.hover08 figure img {
			-webkit-filter: grayscale(100%);
			filter: grayscale(100%);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover08 figure:hover img {
			-webkit-filter: grayscale(0);
			filter: grayscale(0);
		}

		/* Sepia */
		.hover09 figure img {
			-webkit-filter: sepia(100%);
			filter: sepia(100%);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover09 figure:hover img {
			-webkit-filter: sepia(0);
			filter: sepia(0);
		}

		/* Blur + Gray Scale */
		.hover10 figure img {
			-webkit-filter: grayscale(0) blur(0);
			filter: grayscale(0) blur(0);
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover10 figure:hover img {
			-webkit-filter: grayscale(100%) blur(3px);
			filter: grayscale(100%) blur(3px);
		}

		/* Opacity #1 */
		.hover11 figure img {
			opacity: 1;
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover11 figure:hover img {
			opacity: .5;
		}

		/* Opacity #2 */
		.hover12 figure {
			background: #1abc9c;
		}
		.hover12 figure img {
			opacity: 1;
			-webkit-transition: .3s ease-in-out;
			transition: .3s ease-in-out;
		}
		.hover12 figure:hover img {
			opacity: .5;
		}


					

	</style>


<!-- script mylivechat -->
<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=88444993"></script>



<script type="text/javascript">
var window_width;

	$(window).scroll(function() {
		window_width = $(window).width();
		if (window_width >= 768) {
			if ($(this).scrollTop()>0)
		    {
		        $('.tool_header').fadeOut();
		    }
		    else
		    {
		      $('.tool_header').fadeIn();
		    }
		}
	 });



	$(window).width(function() {
		window_width = $(window).width();
		if (window_width >= 992){
            big_image = $('.wrapper > .header');
            $(window).on('scroll', materialKitDemo.checkScrollForParallax);
		}

		if (window_width <= 767){
			$("#user_login2").removeClass().addClass('col-xs-12');
		}
		else if (window_width <=839){
			$("#user_login2").removeClass().addClass('col-xs-8');
		}
		else if (window_width <= 840){
			$("#user_login2").removeClass().addClass('col-xs-7');
		}
		else if (window_width <= 991){
			$("#user_login2").removeClass().addClass('col-xs-8');
		}
		else if (window_width <= 1199){
			$("#user_login2").removeClass().addClass('col-xs-9');
		}
		else if (window_width >= 1200){
			$("#user_login2").removeClass().addClass('col-xs-10');
		}

		if (window_width <= 767) {
			$("#judul_section4").attr('style','margin-top: 20px');
			$('#width_payment').css('width', '90%');
			$('#login_layar_kecil').css('display', 'block');
			$('#eng_layar_kecil').css('display', 'block');
			$('#ind_layar_kecil').css('display', 'block');
		}

		if (window_width >= 768) {
			$('#login_layar_kecil').css('display', 'none');
			$('#eng_layar_kecil').css('display', 'none');
			$('#ind_layar_kecil').css('display', 'none');
		}

		if (window_width <= 991) {
			$("#cari").css('font-size', '0px');
			$("#ind_lang").css('font-size', '0px');
			$("#eng_lang").css('font-size', '0px');
			$("#login").css('font-size', '0px');
		}
	});

	$(document).ajaxStop(function() {
      //setTimeout(function(){
        $( ".se-pre-con" ).hide();
      //},15000);
	});

	$(document).ajaxStart(function() {
	    $(".se-pre-con").show();
	});

	$(document).ajaxError(function() {
	    //setTimeout(function(){
	    $( ".se-pre-con" ).hide();
	    //},1500);
	});

	
	$(document).ready(function() {
        window_width = $(window).width();
		cek_status_login();
		set_payment();
    });

	function get_kegiatan_header(){
		$.ajax({
            url: "<?php echo site_url('Front/get_kegiatan')?>",
            type: "POST",
            data: {
                "kategori": $('#cari_kategori_header').val(), "judul": $('#cari_judul_kegiatan_header').val()
            },
            dataType: "JSON",
            success: function(data) {
            	$('#content_kegiatan_header').empty();
            	var status;

                $.each(data, function(k, v) {
                	// alert(v.judul);
                	var persen = (v.tercapai_dana / v.target_dana)* 100;
                	var persen2 = v.tercapai_dana / v.target_dana;

                	if (v.status == 'LIVE') {
                		status = "<p class='category pull-right' style='color:#f83600'><i class='material-icons'>play_circle_outline</i>LIVE</p>"; 
                	}
                	else if (v.status == 'SELESAI') {
                		status = "<p class='category pull-right' style='color:#36d1dc'><i class='material-icons'>verified_user</i>SELESAI</p>";
                	}

                	rows="<div  class='col-md-4' style='cursor: pointer; margin-top: 10px; margin-bottom: 20px;'><div class='card card-profile' onclick='detil_kegiatan("+v.id_kegiatan+")' style='box-shadow: 0 0 25px 0 rgba(0, 0, 0, 0.3)'><div class='image'><a href='#'><img class='img' src='<?php echo base_url()?>assets/img/content/"+v.gambar_utama+"' style='width: 360px; height:240px'></a></div><div class='content' style='text-align: left'><div class='row'><div class=''><div class='col-xs-8'><p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-4'>"+status+"</div></div></div><h4>"+v.judul+"</h4><div class='row' style='margin-top: 15px'><div class='col-md-3 col-sm-3 col-xs-3' style='text-align: left'><div class='circles'><div class='second circle header"+v.id_kegiatan+"'><strong></strong></div></div></div><div class='col-md-5 col-sm-5 col-xs-5' style='text-align: left'><p style='margin-bottom: 0px'>Terkumpul</p><p><b>Rp. "+v.tercapai_dana+"</b></p></div><div class='col-md-4 col-sm-4 col-xs-4' style='text-align: left'><p style='margin-bottom: 0px'>Sisa waktu</p><p><b>"+v.sisa_hari+" Hari</b></p></div></div></div></div></div>";
                	$(rows).appendTo("#content_kegiatan_header");

                	$('.second.circle.header'+v.id_kegiatan).circleProgress({
				        value: persen2
				    }).on('circle-animation-progress', function(event, progress) {
				        $(this).find('strong').html(Math.round(persen * progress) + '<i>%</i>');
				    });
                });
                
            }
        });
	}

    function get_total_payment(){
    	// var biaya_payment = '<?php  ?>';
     //    var input_payment = $('#d_input_payment').val().replace(/,/g , '');
     //    var total = input_payment - biaya_payment;
     //    $('#d_input_payment').val(accounting.formatNumber(input_payment))
     //    $('#d_total_payment').text(accounting.formatNumber(total));
    }


    function set_payment(){
    	var id_user = '<?php echo $this->session->userdata('id_user'); ?>';
    	var gambar = '<?php echo $this->session->userdata('foto_user'); ?>';
    	var nama_user = '<?php echo $this->session->userdata('nama_user'); ?>';
    	// $('#biaya_payment').text(accounting.formatNumber('<?php  ?>'));


    	if (id_user == "") {
    		$('#d_foto_user').attr('src', '<?php echo base_url()?>assets/img/foto/user.png');
    		$('#d_nama_user').text("Dermawan");
    		$('#notif_belum_login').show();

    		//payment
    		$('#d_foto_user2').attr('src', '<?php echo base_url()?>assets/img/foto/user.png');
    		$('#d_nama_user2').text("Dermawan");

    		$('#d_email_user2').hide();
    		$('#d_email_user3').show();

    		$('#d_hp_user2').hide();
    		$('#d_hp_user3').show();

    		
    	}
    	else if (id_user == null ) {
    		$('#d_foto_user').attr('src', '<?php echo base_url()?>assets/img/foto/user.png');
    		$('#d_nama_user').text("Dermawan");
    		$('#notif_belum_login').show();

    		//payment
    		$('#d_foto_user2').attr('src', '<?php echo base_url()?>assets/img/foto/user.png');
    		$('#d_nama_user2').text("Dermawan");

    		$('#d_email_user2').hide();
    		$('#d_email_user3').show();

    		$('#d_hp_user2').hide();
    		$('#d_hp_user3').show();
    	}

    	//user login
    	else{
    		$.ajax({
                url : "<?php echo site_url('Front/load_detil_user')?>",
                type: "POST",
                data: { 
                  //"page" : page
                },
                dataType: "JSON",
                success: function(data)
                {
                	
                    $('#d_foto_user').attr('src', '<?php echo base_url()?>'+gambar);
		    		$('#d_nama_user').text(nama_user);
		    		$('#notif_belum_login').hide();

		    		//payment
		    		$('#d_foto_user2').attr('src', '<?php echo base_url()?>assets/img/foto/'+gambar);
		    		$('#d_nama_user2').text(nama_user);

		    		$('#d_email_user2').show();
		    		$('#d_email_user2').text(data.email);
		    		$('#d_email_user3').hide();

		    		$('#d_hp_user2').show();
		    		$('#d_hp_user3').hide();
		    		$('#d_hp_user2').text(data.hp);

		    		//icon login
		    		$('#icon_user_login').attr('src', '<?php echo base_url()?>assets/img/foto/'+gambar);
                	$('#icon_user_login2').attr('src', '<?php echo base_url()?>assets/img/foto/'+gambar);
                	$('#icon_user_login3').attr('src', '<?php echo base_url()?>assets/img/foto/'+gambar);
                	$('#nama_user_login').text(nama_user);
                	$('#nama_user_login3').text(nama_user);

                },
                
        	});
    		
    	}
    }


	function cek_status_login(){
		var status_login = '<?php echo $this->session->userdata('status_login'); ?>';
		//alert(status_login);
		if (status_login == 'session_habis') {
			get_content('Login');
		}
		else{
			get_content('Salingbantu');
		}
	}


	function cek_session(){
		var session_level = '<?php echo $this->session->userdata('level_user'); ?>';
		var session_id = '<?php echo $this->session->userdata('id_user'); ?>';
		if (session_level == 'ADMINISTRATOR') {
			
			$("#header_user_login").show();
			$("#header_administrator").show();
			$("#header_pengurus").hide();
			$("#header_dashboard1").hide();

			$("#header_administrator3").show();
			$("#header_pengurus3").hide();
			$("#header_dashboard3").hide();

			$("#header_login").hide();
			$('[name="login"]').hide();
			$('[name="register"]').hide();
			$("#header_register").hide();
			$("#header_register_top").hide();
			$("#header_logout").show();
			if (window_width >= 768) {
				$("#user_login").hide();
			}
			else if (window_width <= 767) {
				$("#user_login").show();
			}
			
		}
		else if (session_level == 'PENGURUS') {
			
			$("#header_user_login").show();
			$("#header_administrator").hide();
			$("#header_pengurus").show();
			$("#header_dashboard1").hide();

			$("#header_administrator3").hide();
			$("#header_pengurus3").show();
			$("#header_dashboard3").hide();

			$("#header_login").hide();
			$('[name="login"]').hide();
			$('[name="register"]').hide();
			$("#header_register").hide();
			$("#header_register_top").hide();
			$("#header_logout").show();
			if (window_width >= 768) {
				$("#user_login").hide();
			}
			else if (window_width <= 767) {
				$("#user_login").show();
			}
			//$("#user_login2").removeClass('col-xs-12').addClass('col-xs-7');
		}
		else if (session_level == 'USER') {
			$("#header_administrator3").hide();
			$("#header_pengurus3").hide();
			$("#header_dashboard3").show();
			
			//$("#user_login2").removeClass('col-xs-12').addClass('col-xs-7');
			$('[name="login"]').hide();
			$('[name="register"]').hide();
			$("#header_dashboard1").show();
			$("#header_logout").show();
			if (window_width >= 768) {
				$("#user_login").hide();
			}
			else if (window_width <= 767) {
				$("#user_login").show();
			}
		}
		else{
			if (session_id == '') {
				$("#header_user_login").hide();
				$("#header_login").show();
				$("#header_register").show();
				$("#header_register_top").show();
				$("#header_logout").hide();
				$("#header_dashboard1").hide();
				$("#header_administrator").hide();
				$("#header_pengurus").hide();
				$('[name="login"]').show();
				$('[name="register"]').show();

				$("#user_login").hide();
				//$("#user_login2").removeClass('col-xs-7').addClass('col-xs-12');
			}
			else if (session_id != ''){
				//alert()
				$("#header_user_login").show();
				$("#header_logout").show();
				$("#header_dashboard1").show();
				$("#header_login").hide();
				$("#header_register").hide();
				$("#header_register_top").hide();
				$("#header_administrator").hide();
				$("#header_pengurus").hide();
				$('[name="register"]').hide();
				$('[name="login"]').hide();

				if (window_width >= 768) {
					$("#user_login").hide();
				}
				else if (window_width <= 767) {
					$("#user_login").show();
				}
			}
			
		}
	}

	var halaman_front;
	function get_content_halaman(page){

		// set header
		$("#button_navbar").addClass('collapsed');
		$("#navigation-index").removeClass('in');
		$("button_navbar").attr("aria-expanded","false");
		$("navigation-index").attr("aria-expanded","false");
		// header

		halaman_front = page;


			$('#content_page').empty();
	        $.ajax({
	            url : "<?php echo site_url('Front/get_content')?>",
	            type: "POST",
	            data: { 
		          "page" : "Halaman"
		        },
	            dataType: "html",
	            success: function(data)
	            {
	              	$('#content_page').html(data);

	            },
	            
	        });       
    }


    function get_content_halaman_kami(page){
		// set header
		$("#button_navbar").addClass('collapsed');
		$("#navigation-index").removeClass('in');
		$("button_navbar").attr("aria-expanded","false");
		$("navigation-index").attr("aria-expanded","false");
		// header

		halaman_front = page;


			$('#content_page').empty();
	        $.ajax({
	            url : "<?php echo site_url('Front/get_content')?>",
	            type: "POST",
	            data: { 
		          "page" : "Halaman_kami"
		        },
	            dataType: "html",
	            success: function(data)
	            {
	              	$('#content_page').html(data);

	            },
	            
	        });       
    }



    function get_content(page){

		// set header
		$("#button_navbar").addClass('collapsed');
		$("#navigation-index").removeClass('in');
		$("button_navbar").attr("aria-expanded","false");
		$("navigation-index").attr("aria-expanded","false");
		// header

		if (page == 'Dashboard') {
			window.location.href = '<?php echo base_url()?>Dashboard/';
		}
		else if (page == 'Administrator') {
			window.location.href = '<?php echo base_url()?>Administrator/';
		}
		else if (page == 'Pengurus') {
			window.location.href = '<?php echo base_url()?>Pengurus/';
		}
		else if (page == 'Login') {
			window.location.href = '<?php echo base_url()?>Login/';
		}
		else{
			$('#content_page').empty();
	        $.ajax({
	            url : "<?php echo site_url('Front/get_content')?>",
	            type: "POST",
	            data: { 
		          "page" : page
		        },
	            dataType: "html",
	            success: function(data)
	            {
	            	if (page == 'Login') {
	            		$("#body_class").removeClass();
	            		$('#body_class').addClass('signup-page');
	            		$("#header_login").hide();
	            		$("#header_register").hide();
	            		$("#header_register_top").hide();
	            		$("#header_dashboard1").hide();	            		
	            	}
	            	else if (page == 'Register') {
	            		$("#body_class").removeClass();
	            		$('#body_class').addClass('signup-page');
	            		$("#header_login").hide();
	            		$("#header_register").hide();
	            		$("#header_register_top").hide();
	            		$("#header_dashboard1").hide();
	            	}
	            	else{
	            		$("#body_class").removeClass();
	            		$('#body_class').addClass('landing-page index-page');
	            		$("#header_login").show();
	            		$("#header_register").show();
	            		$("#header_register_top").show();
	            		cek_session();
	            	}
	              	$('#content_page').html(data);

	            },
	            
	        });
		}
		       
    }


    function get_content_page(page, section){
		$.ajax({
	            url : "<?php echo site_url('Front/get_content_page')?>",
	            type: "POST",
	            data: { 
		          "page" : page, "section" : section
		        },
	            dataType: "JSON",
	            success: function(data)
	            {
	            	$('#judul_section'+section).text(data.judul);
	            	if (data.deskripsi != null) {
	            		$('#deskripsi_section'+section).text(data.deskripsi);
	            	}
	            	if (data.img != null) {
	            		$('#img_section'+section).attr('src', '<?php echo base_url()?>'+data.img);
	            	}
	            },
	            
	        });
	}


	function logout(){
		window.location.href = '<?php echo base_url()?>Front/logout';
	}


</script>