                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="background-color: #0009;padding-top: 70px">
                
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
                                        echo"<div class='item active' style='height: 211px;background: url(".base_url()."assets/img/slider/".$row->img.");background-size: cover;'>
                                            </div>";
                                    }
                                    else{
                                        echo"<div class='item' style='height: 211px;background: url(".base_url()."assets/img/slider/".$row->img.");background-size: cover;'>
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

                <!-- daftar donatur -->
                <div class="section text-center section-landing" style="padding: 0px;box-shadow: 0 16px 38px -12px rgba(0, 0, 0, 0.56), 0 4px 25px 0px rgba(0, 0, 0, 0.12), 0 8px 10px -5px rgba(0, 0, 0, 0.2)">
                    <div class="container" style="width: 100%">
                        <div class="row text-left" style="background-color: white">

                            <div class="col-xs-3" style="background-color: #F9690E; color: white; padding: 10px; min-height: 80px">
                                <h4 style="margin: 5px 0px 5px 0px; font-weight: initial;">Donatur bulan ini</h4>
                            </div>
                            

                            <div class="col-xs-9" style="padding-left: 15px; padding-right: 15px; padding-top: 5px">
                                <div class="home-demo">
                                  <div class="row">
                                    <div class="large-12 columns">
                                      


                                        <div id="list_donatur" class="owl-carousel">
                                        <?php
                                            $data = $this->db->query("SELECT  user.`img`, user.`nama` FROM donasiku JOIN user ON donasiku.`id_user` = user.`id` WHERE id_user != 'D' GROUP BY id_user");
                                            foreach ($data->result() as $row) {
                                                echo"
                                                <div class='item' align='center' >
                                                  <img align='center' class='img img-circle' style='width: 50px; height: 50px; border:solid #dbdbdb;' src='".base_url()."assets/img/foto/".$row->img."'>
                                                  <p align='center' style='margin-bottom:0px'>".$row->nama."</p>
                                                </div>
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
                </div>


                <div class="section section-landing" style="padding: 10px;">
                    <div class="container" style="width: 100%">
                        <div class="row" style="padding-top: 5px;">

                            <div class="col-xs-6" style="padding-left: 0px; padding-right: 5px">
                                <div class="card" style="padding: 10px">
                                    <img class="img" src="<?php echo base_url()?>assets/img/kegiatan.png" alt="" style="height: 60px; opacity: 1;">
                                    <p>Founded activities</p>
                                    <h4><b>5 activitites</b></h4>
                                </div>
                            </div>

                            <div class="col-xs-6" style="padding-left: 5px; padding-right: 0px">
                                <div class="card" style="padding: 10px">
                                    <img class="img" src="<?php echo base_url()?>assets/img/user.png" alt="" style="height: 60px; opacity: 1;">
                                    <p>Donors</p>
                                    <h4><b>5 Donors</b></h4>
                                </div>
                            </div>

                            <div class="col-xs-12" style="padding-left: 0px; padding-right: 0px; margin-top: 10px">
                                <div class="card" style="padding: 10px">
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img class="img" src="<?php echo base_url()?>assets/img/wallet.png" alt="" style="height: 60px; opacity: 1;">
                                        </div>
                                        <div class="col-xs-9" style="padding-left: 20px; padding-top: 10px">
                                            <p style="margin: 0 0 0px">Donors found</p>
                                            <h4 style="font-weight: bold; margin-top: 0px">Rp. 1.000.000.000</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>


                <div class="section section-landing" style="padding: 10px;background-color: #93e888;background-image: linear-gradient(110deg, #91d588 0%, #3fb333 100%); color: white;padding: 20px;">
                    <div class="container" style="width: 100%">
                        <h3><b>What we do</b></h3>
                        <h4>Yayasan Salingbantu.or.id bergerak di bidang sosial kemanusiaan dan keagamaan. Kami menggalang dana dari para dermawan untuk disalurkan kepada sesama dan kegiatan sosial yang membutuhkan.</h4>
                        <div class="row">
                                    <div class="col-xs-6">
                                        <h4><i class="material-icons" style="color: orange">playlist_add_check</i>Zakat</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <h4><i class="material-icons" style="color: orange">playlist_add_check</i>Infaq </h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <h4><i class="material-icons" style="color: orange">playlist_add_check</i>Education</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <h4><i class="material-icons" style="color: orange">playlist_add_check</i>Disaster </h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <h4><i class="material-icons" style="color: orange">playlist_add_check</i>Free donation</h4>
                                    </div>
                                    <div class="col-xs-6">
                                        <h4><i class="material-icons" style="color: orange">playlist_add_check</i>Social and humanity</h4>
                                    </div>
                                    
                                </div>
                    </div>
                </div>


                <!-- kegiatan sosial -->
                <div class="section text-center section-landing" style="padding: 10px;background-color: transparent;">
                    <div class="container" style="width: 100%">
                        <h3><b>Kegiatan sosial terkini</b></h3>
                        <h4>Program penggalangan dana dari para relawan salingbantu.or.id</h4>

                        <div id="list_kegiatan" class="owl-carousel owl-theme">

                            <?php
                                $data = $this->db->query("SELECT kegiatan.`id_kegiatan`, kategori_kegiatan.`nama_kategori`, kegiatan.`judul`, kegiatan.`target_dana`, kegiatan.`gambar_utama`, kegiatan.`status`, kegiatan.`tercapai_dana`,  DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir FROM kegiatan JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori` WHERE kegiatan.`status` = 'LIVE'");
                                    
                                    foreach ($data->result() as $row) {
                                        
                                        echo"
                                            <div class='item' data-merge='2.5' style='padding: 5px'>
                                                    <div class='card card-raised card-carousel' style='margin: 10px; border-radius: 5px; box-shadow: 0 0 18px -12px rgba(0, 0, 0, 0.02), 0 4px 25px 0px rgba(0, 0, 0, 0), 0 8px 10px -5px rgba(189, 189, 189, 0.2)'>


                                                        <div id='carousel-example-generic_".$row->id_kegiatan."' class='carousel slide' data-ride='carousel'>

                                                            <div class='carousel slide' data-ride='carousel'>
                                                                <ol class='carousel-indicators'>";

                                                                //looping image
                                                                $data2 = $this->db->query("SELECT img FROM img_kegiatan WHERE id_kegiatan = '$row->id_kegiatan'");
                                                                $a = 0;
                                                                foreach ($data2->result() as $row2) {
                                                                    if ($a == 0) {
                                                                        echo"<li data-target='#carousel-example-generic_".$row->id_kegiatan."' data-slide-to='".$a."' class='active'></li>";
                                                                    }else{
                                                                        echo"<li data-target='#carousel-example-generic_".$row->id_kegiatan."' data-slide-to='".$a."' class=''></li>";
                                                                    }
                                                                    $a+=1;
                                                                }
                                                                //end looping image
                                                                
                                                                echo"</ol>
                                                                <div class='carousel-inner' style='border-top-left-radius:5px; border-top-right-radius:5px'>";

                                                                $b = 0;
                                                                    foreach ($data2->result() as $row2) {
                                                                        if ($b == 0) {
                                                                            echo"<div class='item active' style='background-image: url(".base_url()."assets/img/content/".$row->gambar_utama.");background-size: cover;height: 208px;'>
                                                                                    
                                                                                </div>";
                                                                        }else{
                                                                            echo"<div class='item' style='background-image: url(".base_url()."assets/img/content/".$row->gambar_utama.");background-size: cover;height: 208px;'>
                                                                                    
                                                                                </div>";
                                                                        }
                                                                        $b+=1;
                                                                    }


                                                                    echo"
                                                                </div>

                                                                <a class='left carousel-control' href='#carousel-example-generic_".$row->id_kegiatan."' data-slide='prev'>
                                                                    <i class='material-icons'>keyboard_arrow_left</i>
                                                                </a>
                                                                <a class='right carousel-control' href='#carousel-example-generic_".$row->id_kegiatan."' data-slide='next'>
                                                                    <i class='material-icons'>keyboard_arrow_right</i>
                                                                </a>
                                                            </div>


                                                            <div class='content' style='text-align: left'>
                                                                <div class='row'>

                                                                        <div class='col-xs-8'>
                                                                            <p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>".$row->nama_kategori."</p>
                                                                        </div>
                                                                        <div class='col-xs-4'>
                                                                            <p class='category pull-right' style='color:#f83600'><i class='material-icons'>play_circle_outline</i>".$row->status."</p>
                                                                        </div>
                                                                </div>

                                                                <p class='select_text' onclick=detil_kegiatan('".$row->id_kegiatan."') style='width: 100%; cursor:pointer; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px'>".$row->judul."</p>

                                                                <div class='row' style='margin-top: 15px'>
                                                                    
                                                                    <div class='col-xs-7' style='text-align: left'>
                                                                        <p style='margin-bottom: 0px'>Dana terkumpul</p>
                                                                        <p><b>Rp. ".$row->tercapai_dana."</b></p>
                                                                    </div>

                                                                    <div class='col-xs-5' style='text-align: left'>
                                                                        <p style='margin-bottom: 0px'>Berakhir</p>
                                                                        <p><b>".$row->tanggal_berakhir."</b></p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>
                                            ";
                                        
                                    }
                            ?>
                        </div>

                        <a href="#" onclick="get_content('Kegiatan')" class="btn btn-new btn-wd btn-social btn-white btn-email btn-fill btn-round">
                            <i style="font-size: 20px" class="rotate material-icons">autorenew</i> Tampilkan lainnya
                        </a>
                    </div>
                </div>




                <!-- program terkini -->
                <div class="section text-center section-landing" style="padding: 10px;background-color: white;box-shadow: 0 4px 5px 0px rgba(140, 127, 127, 0.1), 0 7px 10px -5px rgba(161, 158, 159, 0.37)">
                    <div class="container" style="width: 100%; margin-bottom: 20px">
                        <h3><b>Program-program salingbantu</b></h3>
                        <h4>Program sosial yang diselenggarakan oleh yayasan salingbantu</h4>


                        <div id="list_program" class="owl-carousel owl-theme">

                            <?php
                                $data = $this->db->query("SELECT program_terkini.`id`, kategori_kegiatan.`nama_kategori`, program_terkini.`judul`, program_terkini.`gambar_utama`, program_terkini.`tercapai_dana`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir FROM program_terkini JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori` WHERE program_terkini.`status` = 'LIVE' ");
                                    
                                    foreach ($data->result() as $row) {
                                        
                                        echo"
                                            <div class='item' data-merge='2.5' style='padding: 5px'>
                                                    <div class='card card-raised card-carousel' style='margin: 10px; border-radius: 5px; box-shadow: 0 0 18px -12px rgba(0, 0, 0, 0.02), 0 4px 25px 0px rgba(0, 0, 0, 0), 0 8px 10px -5px rgba(189, 189, 189, 0.2)'>


                                                        <div id='carousel-example-program_".$row->id."' class='carousel slide' data-ride='carousel'>

                                                            <div class='carousel slide' data-ride='carousel'>
                                                                <ol class='carousel-indicators'>";

                                                                //looping image
                                                                $data2 = $this->db->query("SELECT img FROM img_program WHERE id_program = '$row->id'");
                                                                $a = 0;
                                                                foreach ($data2->result() as $row2) {
                                                                    if ($a == 0) {
                                                                        echo"<li data-target='#carousel-example-program_".$row->id."' data-slide-to='".$a."' class='active'></li>";
                                                                    }else{
                                                                        echo"<li data-target='#carousel-example-program_".$row->id."' data-slide-to='".$a."' class=''></li>";
                                                                    }
                                                                    $a+=1;
                                                                }
                                                                //end looping image
                                                                
                                                                echo"</ol>
                                                                <div class='carousel-inner' style='border-top-left-radius:5px; border-top-right-radius:5px'>";

                                                                $b = 0;
                                                                    foreach ($data2->result() as $row2) {
                                                                        if ($b == 0) {
                                                                            echo"<div class='item active' style='background-image: url(".base_url()."assets/img/program_terkini/".$row->gambar_utama.");background-size: cover;height: 208px;'>
                                                                                    
                                                                                </div>";
                                                                        }else{
                                                                            echo"<div class='item' style='background-image: url(".base_url()."assets/img/program_terkini/".$row2->img.");background-size: cover;height: 208px;'>
                                                                                    
                                                                                </div>";
                                                                        }
                                                                        $b+=1;
                                                                    }


                                                                    echo"
                                                                </div>

                                                                <!-- Controls -->
                                                                <a class='left carousel-control' href='#carousel-example-program_".$row->id."' data-slide='prev'>
                                                                    <i class='material-icons'>keyboard_arrow_left</i>
                                                                </a>
                                                                <a class='right carousel-control' href='#carousel-example-program_".$row->id."' data-slide='next'>
                                                                    <i class='material-icons'>keyboard_arrow_right</i>
                                                                </a>
                                                            </div>


                                                            <div class='content' style='text-align: left; background-color: #F0F1F3; border-bottom-left-radius:5px; border-bottom-right-radius:5px'>
                                                                <div class='row'>

                                                                        <div class='col-xs-8'>
                                                                            <p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>".$row->nama_kategori."</p>
                                                                        </div>
                                                                        <div class='col-xs-4'>
                                                                            <p class='category pull-right' style='color:#f83600'><i class='material-icons'>play_circle_outline</i>LIVE</p>
                                                                        </div>
                                                                </div>

                                                                <p class='select_text' onclick=detil_program('".$row->id."') style='width: 100%; cursor:pointer; overflow: hidden; text-overflow: ellipsis; font-weight:bold; height:40px'>".$row->judul."</p>

                                                                <div class='row' style='margin-top: 15px'>
                                                                    
                                                                    <div class='col-xs-8' style='text-align: left'>
                                                                        <p style='margin-bottom: 0px'>Dana terkumpul</p>
                                                                        <p><b>Rp. ".$row->tercapai_dana."</b></p>
                                                                    </div>

                                                                    <div class='col-xs-4' style='text-align: left'>
                                                                        <p style='margin-bottom: 0px'>Berakhir</p>
                                                                        <p><b>".$row->tanggal_berakhir."</b></p>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                            </div>
                                            ";
                                        
                                    }
                            ?>
                        </div>

                        <a href="#" onclick="get_content('Program_terkini')" class="btn btn-new btn-wd btn-social btn-success btn-email btn-fill btn-round">
                            <i style="font-size: 20px" class="rotate material-icons">autorenew</i> Tampilkan lainnya
                        </a>
                    </div>
                </div>


                <div class="section section-landing" style="padding: 0px;margin-top: -20px">
                    <div class="container" style="width: 100%">
                        <div class="card" style="background-color: #ffc400;background-image: linear-gradient(225deg, #ffc400 0%, #fc5c01 99%)">
                            <div class="row" style="margin-top: 30px; padding-left: 20px; padding-right: 20px">
                                <div class="col-xs-3">
                                    <img class="img" src="<?php echo base_url()?>assets/img/kegiatan.png" alt="" style="height: 60px; opacity: 1;">
                                </div>
                                <div class="col-xs-9">
                                    <div class="info" style="padding: 0px">
                                        <h4 style="color: white; margin-top: 0px; margin-bottom: 0px">Donation report salingbantu.or.id</h4>
                                        <button class="btn btn-success  btn-sm" style="background-color: transparent;color: white; border: solid;">
                                            <span class="btn-label"><i class="material-icons">arrow_forward</i></span>view report<div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 30px; padding-left: 20px; padding-right: 20px">
                                <div class="col-xs-3">
                                    <img class="img" src="<?php echo base_url()?>assets/img/kegiatan.png" alt="" style="height: 60px; opacity: 1;">
                                </div>
                                <div class="col-xs-9">
                                    <div class="info" style="padding: 0px">
                                        <h4 style="color: white; margin-top: 0px; margin-bottom: 0px">Clean your finances with zakat </h4>
                                        <button class="btn btn-success btn-sm" style="background-color: transparent;color: white; border: solid;">
                                            <span class="btn-label"><i class="material-icons">arrow_forward</i></span>Zakat now<div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div class="row" style="margin-top: 30px; padding-left: 20px; padding-right: 20px; margin-bottom: 20px">
                                <div class="col-xs-3">
                                    <img class="img" src="<?php echo base_url()?>assets/img/kegiatan.png" alt="" style="height: 60px; opacity: 1;">
                                </div>
                                <div class="col-xs-9">
                                    <div class="info" style="padding: 0px">
                                        <h4 style="color: white; margin-top: 0px; margin-bottom: 0px">Your infaq give them the benefit </h4>
                                        <button class="btn btn-success btn-sm" style="background-color: transparent;color: white; border: solid;">
                                            <span class="btn-label"><i class="material-icons">arrow_forward</i></span>Infaq now<div class="ripple-container"></div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- berita foto -->
                <div class="section section-landing" style="padding: 10px;background-color: transparent;">
                    <div class="container" style="width: 100%">
                        <h3><b>Berita foto</b></h3>
                        <p onclick="get_content('Berita_foto')" style="cursor: pointer;"><b>Tampilkan semua<i class="material-icons">arrow_forward</i></b></p>


                        <div id="list_berita_foto" class="owl-carousel owl-theme">

                            <?php
                                $data = $this->db->query("SELECT id, judul, img, DATE_FORMAT(waktu, '%d-%m-%Y') as waktu FROM berita WHERE st = 'ACTIVE' ORDER BY waktu ASC");
                                    
                                    foreach ($data->result() as $row) {
                                        
                                        echo"<div class='item' data-merge='2.5' style='padding: 5px'>
                                            <div class='card' style='border-radius: 5px; margin-top: 20px; margin-bottom: 5px; padding: 0px 15px 0px 15px'>
                                                
                                                <div class='row'>
                                                    <div class='col-xs-12' style='padding:0px' onclick=detil_berita('mobile','".$row->id."')>
                                                        <p style='margin: 15px; text-align:left'>".$row->judul."</p>
                                                        <div style='border-bottom-right-radius:5px; border-bottom-left-radius:5px;height: 200px;background-size:cover;background-image: url(".base_url()."assets/img/berita/".$row->img.")'></div>
                                                    </div>
                                                </div>
                                            </div>
                                            </div>
                                            ";
                                        
                                    }
                            ?>
                        </div>

                        
                        
                    </div>
                </div>


                <!-- berita video -->
                <div class="section text-right section-landing" style="padding: 10px;background-color: white;">
                    <div class="container" style="width: 100%">
                        <h3><b>Berbagi itu indah</b></h3>
                        <h4>Donasi anda bermanfaat bagi mereka yang membutuhkan.</h4>

                        <div id="list_video" class="owl-carousel owl-theme">

                            <?php
                                $data = $this->db->query("SELECT  embed, link FROM video WHERE   st = 'ACTIVE' ORDER BY waktu");
                                    
                                    foreach ($data->result() as $row) {
                                        

                                        echo"<div class='item-video' data-merge='1'><a class='' href='".$row->link."'></a>".$row->embed."</div>
                                            ";
                                        
                                    }
                            ?>
                        </div>
                        <div align="center">
                            <button onclick="get_content('Berita_video')" class="btn btn-warning btn-round" style="margin-top: 20px"><span class="btn-label"><i class="material-icons">play_arrow</i></span>Lihat semua video<div class="ripple-container"></div></button>
                        </div>
                    </div>
                </div>

                <!-- partner kami -->
                <div class="section text-center section-landing" style="padding: 10px;background-color: whitesmoke;">
                    <div class="container" style="width: 100%">
                        <h3><b>Partner kami</b></h3>

                        <div id="list_partner" class="owl-carousel owl-theme">

                            <?php
                                $data = $this->db->query("SELECT  img FROM    partner WHERE   st = 'ACTIVE'");
                                    
                                    foreach ($data->result() as $row) {
                                        
                                        echo"<div class='item' data-merge='1' style='padding: 5px'><img style='width: 100px' class='img' src='".base_url()."assets/img/partners/".$row->img."'></div>
                                            ";
                                        
                                    }
                            ?>
                        </div>

                    </div>
                </div>

                <!-- footter -->
                <div class="section text-center section-landing" style="background-color: white; padding: 10px 0">
                    <div class="container" style="width: 100%">
                        <div id="footer-areas" style="margin-top: 20px">
                            <footer class="footer footer-white footer-big">
                                <div class="container">

                                    <div class="content" hidden="">
                                        <div class="row">

                                          <div class="col-md-3" style="text-align: left">
                                            <a href="#pablo"><h5 class="bree">salingbantu.or.id</h5></a>
                                            <p>Probably the best UI Kit in the world! We know you've been waiting for it, so don't be shy!</p>
                                          </div>

                                          <div class="col-md-3" style="text-align: left">
                                            <a href="#pablo"><h5 class="bree">Contact</h5></a>
                                            <p>Jl. merdeka 21, Kalibata, Jakarta Selatan.</p>
                                            <p>salingbantu@mail.com</p>
                                            <p>031-123311</p>
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

                                    <div class="copyright pull-center" hidden="">
                                        Copyright © 2017 Salingbantu.or.id.
                                    </div>


                                </div>
                            </footer>
                        </div>
                    </div>
                </div>


<script>
    $('#list_donatur').owlCarousel({
        margin:10,
        //loop:true,
        //autoWidth:true,
        items:4
    })

    
    $('#list_kegiatan').owlCarousel({
        items:2,
        loop:true,
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

    $('#list_program').owlCarousel({
        items:2,
        loop:true,
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


    $('#list_berita_foto').owlCarousel({
        items:3,
        loop:true,
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

    $('#list_partner').owlCarousel({
        items:3,
        //loop:true,
        margin:15,
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


    $('#list_video').owlCarousel({
        items:1,
        merge:true,
        loop:true,
        margin:10,
        video:true,
        lazyLoad:true,
        center:true,
        responsive:{
            480:{
                items:2
            },
            600:{
                items:4
            }
        }
    })
    
</script>



                                                
                                                