<nav id="navbar_desktop" hidden="" class="navbar navbar-fixed-top" style="background-color: white">
		<div class="container">

			<div class="navbar-collapse" id="head1" style="background-color: #2b6e24; margin: -11px -183px 10px; border-bottom: medium solid #4fc143; padding-right: 170px;">
				<ul class="nav navbar-nav navbar-right">
		    		<li style="color: white">
						<a href="<?php echo base_url(); ?>Languange/LanguageSwitcher/switchLang/english"><img src="<?php echo base_url()?>assets/img/english.png" style="height: 15px"> English<div class="ripple-container"></div></a>
					</li>
					<li style="color: white">
						<a href="<?php echo base_url(); ?>Languange/LanguageSwitcher/switchLang/indonesia"><img src="<?php echo base_url()?>assets/img/indonesia.gif" style="height: 15px"> Indonesia<div class="ripple-container"></div></a>
					</li>
					<li id="header_login" style="color: white">
						<a href="#front" onclick="get_content('Login')" >
							<i class="material-icons">fingerprint</i> Teras dermawan
						<div class="ripple-container"></div></a>
					</li>
					<li style="color: white">
						<a href="#front" onclick="open_cari_head()">
							<i class="material-icons">search</i> <?php echo $this->lang->line('cari_kegiatan')?>
						<div class="ripple-container"></div></a>
					</li>


					<!-- user login -->
					<li id="header_user_login" class="dropdown" style="margin-left: 10px">
						<a href="#"  class="dropdown-toggle" style="font-weight: bold; color: green; padding-top: 5px; padding-bottom: 5px; " data-toggle="dropdown">
							<img class="img img-circle" id="icon_user_login" style="width: 40px; height: 40px; border:solid #eaeaea;" src="<?php echo base_url()?>assets/img/foto/user.png">
							<div class="ripple-container"></div>
						</a>

						<ul class="dropdown-menu dropdown-with-icons" style="min-width: 200px">
							<li class="disabled" style="padding: 10px; text-align: center">
								<img id="icon_user_login2" class="img img-circle" style="width: 80px; height: 80px" src="<?php echo base_url()?>assets/img/foto/user.png">>
								<p style="margin: 10px 0 10px; color: black">Selamat datang</p>
								<h4 id="nama_user_login"></h4>
								<hr>
							</li>
							<li id="header_dashboard" hidden="">
								<a href="#" onclick="get_content('Dashboard')" style="font-weight: bold; color: green"><i class="material-icons">dashboard</i> Dashboard</a>
							</li>

							<li id="header_administrator" hidden="">
								<a href="#" onclick="get_content('Administrator')" style="font-weight: bold; color: green"><i class="material-icons">dashboard</i> Administrator</a>
							</li>
										
							<li id="header_pengurus" hidden="">
								<a href="#" onclick="get_content('Pengurus')" style="font-weight: bold; color: green"><i class="material-icons">dashboard</i> <?php echo $this->lang->line('pengelola')?></a>
							</li>

							<li id="header_logout">
								<a id="btn_logout" href="#front" onclick="logout()" style="font-weight: bold; color: green"><i class="material-icons">settings_power</i> Log out</a>
							</li>
						</ul>
					</li>

				</ul>
		    </div>

	        <div class="navbar-header">
		    	<button style="color: black" type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-index">
		        	<span class="sr-only">Toggle navigation</span>
		        	<span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
		    	</button>
		    	<a href="<?php echo base_url()?>">
		        	<div class="logo-container">
		                <div class="logo" style="overflow: unset;border-radius: unset;border: unset;">
		                    <img style="width: 200px" src="<?php echo base_url()?>assets/img/salingbantu5.png" alt="Creative Tim Logo" rel="tooltip" title="<b>Yayasan salingbantu</b><br>Kami peduli dan berbagi" data-placement="bottom" data-html="true">
		                </div>
					</div>
		      	</a>
		    </div>


		    <div class="collapse navbar-collapse" id="navigation-index">
		    	<ul class="nav navbar-nav navbar-right">
					
		    		<!-- aktivitas kami -->
					<li style="color: rgb(43, 110, 36); font-size: 13px" class="menu-item  dropdown"><a title="Categories" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><?php echo $this->lang->line('aktivitas_kami')?> <span class="caret"></span></a>
						<ul role="menu" class=" dropdown-menu">
							<li  class="menu-item">
								<a href="http://salingbantu.or.id/salingbantu_dev/Home" ><?php echo $this->lang->line('program_terkini')?></a>
							</li>
							<li  class="menu-item">
								<a  href="#front" onclick="get_content('Jaringan_global')"><?php echo $this->lang->line('jaringan_global')?></a>
							</li>
						</ul>
					</li>


					<!-- Berita dan media -->
					<li style="color: rgb(43, 110, 36); font-size: 13px" class="menu-item  dropdown"><a title="Categories" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><?php echo $this->lang->line('berita_dan_media')?><span class="caret"></span></a>
						<ul role="menu" class=" dropdown-menu">
							<li  class="menu-item"><a onclick="get_content('Berita_foto')" href="#front">Foto</a></li>
							<li  class="menu-item"><a onclick="get_content('Berita_video')" href="#front">Video</a></li>
						</ul>
					</li>



					<!-- panduan berdonasi -->
					<li style="color: rgb(43, 110, 36); font-size: 13px" class="menu-item  dropdown"><a title="Categories" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><?php echo $this->lang->line('panduan_berdonasi')?> <span class="caret"></span></a>
						<ul role="menu" class=" dropdown-menu">
							<li  class="menu-item"><a onclick="get_content_halaman('Page_donasi_online')" title="" href="#front"><?php echo $this->lang->line('donasi_online')?></a></li>
							<li  class="menu-item"><a onclick="get_content_halaman('Page_transfer_bank')" title="" href="#front"><?php echo $this->lang->line('transfer_bank')?></a></li>
						</ul>
					</li>



					<!-- tentang kami -->
					<li style="color: rgb(43, 110, 36); font-size: 13px" class="menu-item  dropdown"><a title="Categories" href="#" data-toggle="dropdown" class="dropdown-toggle" aria-expanded="false"><?php echo $this->lang->line('tentang_kami')?> <span class="caret"></span></a>
						<ul role="menu" class=" dropdown-menu">
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_sejarah')">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('sejarah')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_visi_misi')">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('visi_misi')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_menejemen')">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('manajemen')?>
											</a>
										</li>
										
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_mitra')">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('mitra')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_karir')">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('karir')?>
											</a>
										</li>
										<li>
											<a href="#front" onclick="get_content_halaman_kami('Page_kontak')">
												<i class="material-icons">keyboard_arrow_right</i> <?php echo $this->lang->line('kontak_kami')?>
											</a>
										</li>
						</ul>
					</li>

					<button id="header_register" onclick="get_content('Registrasi')" class="btn btn-warning"><?php echo $this->lang->line('calon_dermawan')?><div class="ripple-container"></div></button>

					<button onclick="get_content('Donasi')" class="btn btn-info"><?php echo $this->lang->line('donasi_sekarang')?><div class="ripple-container"></div></button>

		    	</ul>
		    </div>

		    <div class="navbar-collapse" id="cari_head" hidden="" style=" color: green; margin-top: 10px;">
		    	<div class="row" style="background-color: whitesmoke;">
		    		<div class="col-sm-3" align="left">
		    			<div class="row" style="background-color: #4fc143;">
		    				<div class="col-sm-10">
		    					<h4><i class="material-icons">search</i>Cari kegiatan/program</h4>
		    				</div>
		    				<div class="col-xs-2"  align="right">
	                            <h4 onclick="close_cari_head()" style="color: white; cursor: pointer;"><i class="material-icons">close</i></h4>
	                        </div>
		    			</div>
		    			<div class="row">
		    				<div class="col-sm-12">
		    					<div class="form-group label-floating is-empty">
									<label class="control-label">Judul kegiatan/program</label>
									<input class="form-control" type="email">
								<span class="material-input"></span></div>

								<div class="form-group label-floating is-empty">
									<label class="control-label">Judul kegiatan/program</label>
									<input class="form-control" type="email">
								<span class="material-input"></span></div>

								<div class="form-group label-floating is-empty">
									<label class="control-label">Judul kegiatan/program</label>
									<input class="form-control" type="email">
								<span class="material-input"></span></div>
							</div>
						</div>
		    		</div>
		    		
		    		<div class="col-sm-9" >
		    			
		    		</div>
		    	</div>
		    </div>

		</div>
	</nav>




	<!-- navbar mobile -->
	<nav id="navbar_mobile" hidden="" class="navbar navbar-default navbar-fixed-top" role="navigation" style="background-color: white; padding-bottom: 0px">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header" style="padding-left: 10px; padding-right: 10px">
                <button style="color: black" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>

                <button style="color: black" type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="">
                <span class="sr-only">Toggle navigation</span>
                    <i style="margin-top: -4px; font-size: 27px" class="material-icons">search</i>
                </button>

                <a href="<?php echo base_url()?>">
		        	<div class="logo-container" style="margin-bottom: 10px">
		                <div class="logo" style="overflow: unset;border-radius: unset;border: unset;">
		                    <img style="width: 200px" src="<?php echo base_url()?>assets/img/salingbantu5.png" alt="Creative Tim Logo" rel="tooltip" title="<b>Yayasan salingbantu</b><br>Kami peduli dan berbagi" data-placement="bottom" data-html="true">
		                </div>
					</div>
		      	</a>
            </div>


            <!-- menu sidebar -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" style="max-height: 440px;">
                <ul class="nav navbar-nav navbar-right" style="background-color: #214a16; margin-bottom: 0px; color: black; margin: 0px 0px; margin-bottom: 15px">

                	<div class="row" style="margin-right: 0px; margin-left: 0px">
                		<div class="col-xs-4" style="padding: 20px;" align="center">
                			<img id="icon_user_login3" class="img img-circle" style="width: 90px; height: 90px; border:solid white;" src="http://salingbantu.or.id/assets/img/foto/user.png">
                		</div>
                		<div class="col-xs-8" style="padding: 15px; color: white">
                			<h4 style="margin-bottom: 0px">Welcome <b>Arif rahman</b></h4>
                			<button style="margin-top: 5px" onclick="" class="header_donasi_sekarang btn btn-warning btn-sm">Administrator<div class="ripple-container"></div></button>
                			<button style="margin-top: 5px" onclick="get_content('Donasi')" class="header_donasi_sekarang btn btn-danger btn-sm">Logout<div class="ripple-container"></div></button>
                		</div>
                	</div>

                	<div id="resume_user" class="owl-carousel" style="padding-left: 15px; padding-right: 15px">
					    <div class="item" data-merge="1">
					    	<div class="card" style="background-color: #e8f0f8;background-image: linear-gradient(62deg, #e8f0f8 0%, #f1e4fc 100%); box-shadow: unset;padding: 10px">
	                            <h4>Donasi</h4>
	                            <p style="margin: 0px" class="card-title">Rp. <b>102</b></p>
	                    	</div>
					    </div>
					    <div class="item" data-merge="1">
					    	<div class="card" style="background-color: #e8f0f8;background-image: linear-gradient(62deg, #e8f0f8 0%, #f1e4fc 100%); box-shadow: unset;padding: 10px">
	                            <h4>Zakat</h4>
	                            <p style="margin: 0px" class="card-title">Rp. <b>102</b></p>
	                    	</div>
					    </div>
					    <div class="item" data-merge="1">
					    	<div class="card" style="background-color: #e8f0f8;background-image: linear-gradient(62deg, #e8f0f8 0%, #f1e4fc 100%); box-shadow: unset;padding: 10px">
	                            <h4>Infaq</h4>
	                            <p style="margin: 0px" class="card-title">Rp. <b>102</b></p>
	                    	</div>
					    </div>
					</div>

                	

                    <li class="dropdown">
						<a id="btn_menu" href="#" class="dropdown-toggle" style="font-weight: bold; color: white" data-toggle="dropdown">Our concern<b class="caret"></b>
						<div class="ripple-container"></div></a>
						<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="#front" onclick="get_content('Kepedulian_kami')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Our concern</a>
							</li>
							<li>
								<a href="#front" onclick="get_content('Program_terkini')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Our program</a>
							</li>
						</ul>
					</li>
                    <li class="dropdown">
						<a id="btn_menu" href="#" class="dropdown-toggle" style="font-weight: bold; color: white" data-toggle="dropdown">News and media<b class="caret"></b>
						<div class="ripple-container"></div></a>
						<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="#front" onclick="get_content('Berita_foto')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i>Foto</a>
							</li>
							<li>
								<a href="#front" onclick="get_content('Berita_video')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Video</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a id="btn_menu" href="#" class="dropdown-toggle" style="font-weight: bold; color: white" data-toggle="dropdown"> Donation guidelines <b class="caret"></b>
						<div class="ripple-container"></div></a>
						<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="#front" onclick="get_content_halaman('Page_donasi_online')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Online donations</a>
							</li>
							<li>
								<a href="#front" onclick="get_content_halaman('Page_transfer_bank')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Bank transfer donations</a>
							</li>
							<li>
								<a href="#front" onclick="get_content_halaman('Page_donasi_natuna')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Direct donation</a>
							</li>
						</ul>
					</li>
					<li class="dropdown">
						<a id="btn_menu" href="#" class="dropdown-toggle" style="font-weight: bold; color: white" data-toggle="dropdown">About Us<b class="caret"></b>
						<div class="ripple-container"></div></a>
						<ul class="dropdown-menu dropdown-with-icons">
							<li>
								<a href="#front" onclick="get_content_halaman_kami('Page_sejarah')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> History</a>
							</li>
							<li>
								<a href="#front" onclick="get_content_halaman_kami('Page_visi_misi')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Vission and mission</a>
							</li>
							<li>
								<a href="#front" onclick="get_content_halaman_kami('Page_menejemen')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Management</a>
							</li>
										
							<li>
								<a href="#front" onclick="get_content_halaman_kami('Page_mitra')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Partners</a>
							</li>
							<li>
								<a href="#front" onclick="get_content_halaman_kami('Page_karir')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Careers</a>
							</li>
							<li>
								<a href="#front" onclick="get_content_halaman_kami('Page_kontak')" style="font-weight: bold; color: white"><i class="material-icons">keyboard_arrow_right</i> Contact Us</a>
							</li>
						</ul>
					</li>
					<li id="login_layar_kecil" style="border-top: 1px solid rgb(79, 193, 67); margin-bottom: 20px">
						<div class="row" style="margin-top: 20px; margin-bottom: 10px ;padding-left: 10px">
							<div class="col-xs-12">
								<a name="login" class="btn btn-white" href="#front" onclick="get_content('Login')" style="font-weight: bold; color: white; display: none;"> Teras Dermawan</a>
								<button name="register" style="margin-top: 5px; display: none;" onclick="get_content('Register')" class="header_register_top btn btn-info">Donors candidate<div class="ripple-container"></div></button>
							</div>

							<div class="col-xs-6" style="margin-top: 0px">
								<a id="ind_layar_kecil" href="http://salingbantu.or.id/Languange/LanguageSwitcher/switchLang/indonesia" style="font-weight: bold; color: white; display: block;"><img class="img" src="http://salingbantu.or.id/assets/img/indonesia-flag.png"> Indonesia</a>
							</div>
							<div class="col-xs-6" style="margin-top: 0px">
								<a id="eng_layar_kecil" href="http://salingbantu.or.id/Languange/LanguageSwitcher/switchLang/english" style="font-weight: bold; color: white; display: block;"><img class="img" src="http://salingbantu.or.id/assets/img/english-flag.png"> Inggris</a>
							</div>
						</div>
					</li>

                </ul>
            </div>




            
        </div>
        <!-- /.container -->
    </nav>


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
			</div>

	<script type="text/javascript" async="async" defer="defer" data-cfasync="false" src="https://mylivechat.com/chatinline.aspx?hccid=88444993"></script>

<style type="text/css">
		.collapse.in{
			headingOne{
				border-bottom: solid;
			}
		}
		.select_text:hover{
			color: #36BBF7;
		}
		.p_12{
			font-size: 12px;
		}
		.modal-open .modal{
			background-color: #000c;
		}
		.disabled {
		    pointer-events:none; 
		    opacity:0.6;         
		}
		.timeline::before{bottom:100px;}
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
        .navbar .dropdown-menu li > a:hover, .navbar .dropdown-menu li > a:focus, .navbar.navbar-default .dropdown-menu li > a:hover, .navbar.navbar-default .dropdown-menu li > a:focus{
        	background-color: #4fc143;
        }
        .navbar .navbar-nav > li > a{
        	font-size: inherit;
        }
</style>


<!-- navbar -->
<style type="text/css">
	.navbar-toggle {
	  border: none;
	  background: transparent !important;
	}
	.navbar-toggle:hover {
	  background: transparent !important;
	}
	.navbar-toggle .icon-bar {
	  width: 22px;
	  transition: all 0.2s;
	}
	.navbar-toggle .top-bar {
	  transform: rotate(45deg);
	  transform-origin: 10% 10%;
	}
	.navbar-toggle .middle-bar {
	  opacity: 0;
	}
	.navbar-toggle .bottom-bar {
	  transform: rotate(-45deg);
	  transform-origin: 10% 90%;
	}
	.navbar-toggle.collapsed .top-bar {
	  transform: rotate(0);
	}
	.navbar-toggle.collapsed .middle-bar {
	  opacity: 1;
	}
	.navbar-toggle.collapsed .bottom-bar {
	  transform: rotate(0);
	}
</style>



<script type="text/javascript">

	var id_kegiatan; var id_berita; var id_program; var asal_halaman_kegiatan; var asal_halaman_program;
	$(document).scroll(function(e){
		    // grab the scroll amount and the window height
		    var scrollAmount = $(window).scrollTop();
		    var documentHeight = $(document).height();

		    // calculate the percentage the user has scrolled down the page
		    var scrollPercent = (scrollAmount / documentHeight) * 100;

		    if(scrollPercent > 6) {
		       scrolldown();
		    }
		    else{
		    	scrollup();
		    }

		    function scrolldown() { 
		    	$('#head1').hide();
		    }
		    function scrollup() { 
		    	$('#head1').show();
		    }
	});

	$('#resume_user').owlCarousel({
	    items:2,
	    margin:10,
	    merge:true,
	    responsive:{
	        678:{
	            mergeFit:true
	        },
	        1000:{
	            mergeFit:false
	        }
	    }
	});



	var urut = 'ASC';
	$(document).ready(function() {
		cek_session();
        window_width = $(window).width();
		
        if (window_width <= 768) {
           $("#header_program_terkini").css('height','unset');
           $("#judul_program_terkini").css('font-size','1.5em');
           $("#judul_program_terkini").css('font-weight','bold');
            $("#deskripsi_program_terkini").css('font-size','1.1em');
            $("#head1").hide();
			$("#navbar_desktop").hide();
			$("#navbar_mobile").show(); 
        }
        else{
            $("#header_program_terkini").css('height','60vh');
            $("#judul_program_terkini").css('font-size','2.6em');
            $("#deskripsi_program_terkini").css('font-size','1.825em');
            $("#head1").show();
			$("#navbar_desktop").show();
			$("#navbar_mobile").hide();
        }
		get_program_2();
		 $("html, body").animate({
            scrollTop: 0
        }, 100);
    });

    $('#cari_program').keydown(function (e){
	    if(e.keyCode == 13){
	        get_program_2();
	    }
	})

    function cek_session(){
		var session_level = '<?php echo $this->session->userdata('level_user'); ?>';
		var session_id = '<?php echo $this->session->userdata('id_user'); ?>';
		
		if (session_level == 'ADMINISTRATOR') {
			$("#header_user_login").show();

			$("#header_administrator").show();
			$("#header_pengurus").hide();
			$("#header_dashboard").hide();

			$("#header_login").hide();
			$("#header_register").hide();
		}
		else if (session_level == 'PENGURUS') {
			$("#header_user_login").show();

			$("#header_administrator").hide();
			$("#header_pengurus").show();
			$("#header_dashboard").hide();

			$("#header_login").hide();
			$("#header_register").hide();
		}
		else if (session_level == 'USER') {
			$("#header_user_login").show();

			$("#header_administrator").hide();
			$("#header_pengurus").hide();
			$("#header_dashboard").show();

			$("#header_login").hide();
			$("#header_register").hide();
		}
		else{
			if (session_id == '') {
				
			}
			else if (session_id != ''){
				
			}
			$("#header_user_login").hide();
			$("#header_login").show();
			$("#header_register").show();
		}
	}

    
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