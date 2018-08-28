        <div class="sidebar" data-active-color="green" data-background-color="black" data-image="../assets/img/sidebar-1.jpg">
            <!--
            Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
            Tip 2: you can also add an image using data-image tag
            Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Administrator
                </a>
            </div>
            <div class="logo logo-mini">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Ct
                </a>
            </div>
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img src="<?php  echo base_url().'assets/img/foto/'.$this->session->userdata('foto_user')?>" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?php echo $this->session->userdata('nama_user'); ?>
                        </a>
                    </div>
                </div>
                <ul class="nav" id="menu_sidebar">
                    
                    <li class="active">
                        <a href="#apps" onclick="get_content('Administrator')"><i class="material-icons">dashboard</i> Dashboard admin</a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Master_kegiatan')"><i class="material-icons">verified_user</i><?php echo $this->lang->line('master_kegiatan')?></a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Program_terkini')"><i class="material-icons">verified_user</i><?php echo $this->lang->line('program_terkini')?></a>
                    </li>

                    

                    <li >
                        <a href="#apps" onclick="get_content('Zakat')"><i class="material-icons">account_balance_wallet</i><?php echo $this->lang->line('master_zakat')?></a>
                    </li> 

                    <li >
                        <a href="#apps" onclick="get_content('Infaq')"><i class="material-icons">account_balance_wallet</i><?php echo $this->lang->line('master_infaq')?></a>
                    </li> 


                    <li >
                        <a href="#apps" onclick="get_content('Master_user')"><i class="material-icons">group</i>Master user</a>
                    </li> 

                    <li >
                        <a href="#apps" onclick="get_content('COA')"><i class="material-icons">sort</i><?php echo $this->lang->line('coa')?></a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Jurnal_umum')"><i class="material-icons">playlist_add</i><?php echo $this->lang->line('jurnal_umum')?></a>
                    </li> 


                    <li >
                        <a href="#apps" onclick="get_content('Laporan_transaksi')"><i class="material-icons">description</i><?php echo $this->lang->line('laporan_transaksi')?></a>
                    </li> 

                    <li >
                        <a href="#apps" onclick="get_content('Laporan_manajemen')"><i class="material-icons">description</i><?php echo $this->lang->line('laporan_keuangan')?></a>
                    </li> 

                    <li >
                        <a href="#apps" onclick="get_content('Setting')"><i class="material-icons">settings</i><?php echo $this->lang->line('pengaturan')?></a>
                    </li> 


                    <li >
                        <a href="#apps" onclick="get_content('Front')"><i class="material-icons">home</i><?php echo $this->lang->line('beranda')?></a>
                    </li>

                    <li >
                        <a href="#apps" onclick="logout()"><i class="material-icons">settings_power</i><?php echo $this->lang->line('keluar')?></a>
                    </li> 
                    
                </ul>
            </div>
        </div>

