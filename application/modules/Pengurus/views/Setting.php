				<div class="container-fluid">
	                <div class="row">

	                	<div class="col-md-4">
                            <div class="card" style="border-radius: 0px">
                                <div class="card-content">
                                    <h3><?php echo $this->lang->line('pengaturan_halaman_panduan_berdonasi')?></h3>
    								<hr>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img style="width: 60px" src="<?php echo base_url()?>assets/img/cara_berdonasi.png">
                                        </div>
                                        <div class="col-xs-9">
                                            <h4><b><?php echo $this->lang->line('cara_berdonasi')?></b></h4>
                                            <a href="#apps" onclick="set_page('Page_donasi_online')"><h4><?php echo $this->lang->line('donasi_online')?></h4></a>
                                            <a href="#apps" onclick="set_page('Page_transfer_bank')"><h4><?php echo $this->lang->line('transfer_bank')?></h4></a>
                                            <a href="#apps" onclick="set_page('Page_donasi_natuna')"><h4><?php echo $this->lang->line('donasi_natuna')?></h4></a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img style="width: 60px" src="<?php echo base_url()?>assets/img/ayo_bersinergi.png">
                                        </div>
                                        <div class="col-xs-9">
                                            <h4><b><?php echo $this->lang->line('ayo_bersinergi')?></b></h4>
                                            <a href="#apps" onclick="set_page('Page_komunitas')"><h4><?php echo $this->lang->line('komunitas')?></h4></a>
                                            <a href="#apps" onclick="set_page('Page_korporat')"><h4><?php echo $this->lang->line('korporate')?></h4></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card" style="border-radius: 0px">
                                <div class="card-content">
                                    <h3><?php echo $this->lang->line('pengaturan_halaman_tentang_kami')?></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img style="width: 60px" src="<?php echo base_url()?>assets/img/list.png">
                                        </div>
                                        <div class="col-xs-9">
                                            <h4><b><?php echo $this->lang->line('daftar_halaman')?></b></h4>
                                            <a href="#apps" onclick="set_page2('Page_sejarah')"><h4><?php echo $this->lang->line('sejarah')?></h4></a>
                                            <a href="#apps" onclick="set_page2('Page_visi_misi')"><h4><?php echo $this->lang->line('visi_misi')?></h4></a>
                                            <a href="#apps" onclick="set_page2('Page_menejemen')"><h4><?php echo $this->lang->line('manajemen')?></h4></a>
                                            <a href="#apps" onclick="set_page2('Page_salam')"><h4><?php echo $this->lang->line('salam_presiden')?></h4></a>
                                            <a href="#apps" onclick="set_page2('Page_legal')"><h4><?php echo $this->lang->line('legal')?></h4></a>
                                            <a href="#apps" onclick="set_page2('Page_mitra')"><h4><?php echo $this->lang->line('mitra')?></h4></a>
                                            <a href="#apps" onclick="set_page2('Page_karir')"><h4><?php echo $this->lang->line('karir')?></h4></a>
                                            <a href="#apps" onclick="set_page2('Page_kontak')"><h4><?php echo $this->lang->line('kontak_kami')?></h4></a>

                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card" style="border-radius: 0px">
                                <div class="card-content">
                                    <h3><?php echo $this->lang->line('pengaturan_halaman_beranda')?></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img style="width: 60px" src="<?php echo base_url()?>assets/img/home.png">
                                        </div>
                                        <div class="col-xs-9">
                                            <h4><b><?php echo $this->lang->line('daftar_konten')?></b></h4>
                                            <a href="#apps" onclick="get_content('Setting_slide')"><h4>Slide</h4></a>
                                            <a href="#apps" onclick="get_content('Kategori')"><h4><?php echo $this->lang->line('kategori_kegiatan')?></h4></a>
                                            <a href="#apps" onclick="get_content('Posting_berita')"><h4><?php echo $this->lang->line('posting_berita')?></h4></a>
                                            <!-- <a href="#apps" onclick="get_content('Setting_informasi')"><h4><?php echo $this->lang->line('atur_informasi_umum')?></h4></a> -->
                                            <a href="#apps" onclick="get_content('Daftar_dukungan')"><h4><?php echo $this->lang->line('daftar_dukungan')?></h4></a>
                                            <a href="#apps" onclick="get_content('Video')"><h4><?php echo $this->lang->line('video_pendukung')?></h4></a>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

						
	                </div>
	            </div>


<script type="text/javascript">
    var page_setting;
    var page_tentang_kami;
    function  set_page(page) {
        
            page_setting = page;
            get_content('Page_setting_panduan_donasi');
        
    }

    function  set_page2(page) {
        
            page_tentang_kami = page;
            get_content('Page_setting_tentang_kami');
        
    }
</script>
