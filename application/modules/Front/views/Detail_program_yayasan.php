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
    })
    
    $(document).ready(function() {
        cek_session();
        window_width = $(window).width();

        if (window_width <= 768) {
           $("#main_detil_program").css('margin-top','60px');
           $("#head1").hide();
            $("#navbar_desktop").hide();
            $("#navbar_mobile").show();
        }
        else{
            $("#main_detil_program").css('margin-top','120px');
            $("#head1").show();
            $("#navbar_desktop").show();
            $("#navbar_mobile").hide();
        }

        detil_program2();
        $("html, body").animate({
            scrollTop: 0
        }, 100);
    });

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