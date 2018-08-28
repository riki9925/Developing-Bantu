        <div class="sidebar" data-active-color="green" data-background-color="white" data-image="<?php echo base_url()?>assets/img/sidebar-1.jpg">
            <!--
            Tip 1: You can change the color of active element of the sidebar using: data-active-color="purple | blue | green | orange | red | rose"
            Tip 2: you can also add an image using data-image tag
            Tip 3: you can change the color of the sidebar with data-background-color="white | black"
            -->
            
            <div class="sidebar-wrapper">
                <div class="user">
                    <div class="photo">
                        <img id="foto_user_exist3" style="height: 100%" src="" />
                    </div>
                    <div class="info">
                        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
                            <?php echo $this->session->userdata('nama_user'); ?>
                        </a>
                    </div>
                </div>
                <ul class="nav" id="menu_sidebar">
                    
                    <li class="active">
                        <a href="#apps" onclick="get_content('Dashboard')"><i class="material-icons">dashboard</i> Dashboard</a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Kegiatan')"><i class="material-icons">content_paste</i>kegiatanku</a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Donasi')"><i class="material-icons">account_balance_wallet</i>Donasiku</a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Zakat')"><i class="material-icons">account_balance_wallet</i>Zakat</a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Infaq')"><i class="material-icons">account_balance_wallet</i>Infaq</a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Setting')"><i class="material-icons">perm_identity</i>Profile</a>
                    </li>

                    <li >
                        <a href="#apps" onclick="get_content('Front')"><i class="material-icons">home</i>Home</a>
                    </li>

                    <li >
                    <a href="#apps" onclick="logout()"><i class="material-icons">settings_power</i>Logout</a>
                    </li>
                    
                </ul>
            </div>
        </div>

