
                <div class="container-fluid">
                    <div class="row">



                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('jumlah_kegiatan_aktif')?></p>
                                    <h4 class="title"><b id="jumlah_kegiatan_aktif"></b></h4>
                                </div>
                                
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('jumlah_kegiatan_selesai')?></p>
                                    <h4 class="title"><b id="jumlah_kegiatan_selesai"></b></h4>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('total_donasi_kegiatan')?></p>
                                    <h4 class="title"><b id="total_donasi"></b></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('total_donasi_program_terkini')?></p>
                                    <h4 class="title"><b id="total_program_terkini"></b></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('total_donasi_jaringan_global')?></p>
                                    <h4 class="title"><b id="total_jaringan_global"></b></h4>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('total_zakat')?></p>
                                    <h4 class="title"><b id="total_zakat"></b></h4>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('total_infaq')?></p>
                                    <h4 class="title"><b id="total_infaq"></b></h4>
                                </div>
                                
                            </div>
                        </div>

                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('jumlah_dermawan')?></p>
                                    <h4 class="title"><b id="jumlah_dermawan"></b></h4>
                                </div>
                                
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('kegiatan_menunggu_validasi')?></p>
                                    <h4 class="title"><b id="kegiatan_menunggu_validasi"></b></h4>
                                </div>
                                
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header" data-background-color="blue">
                                    <i class="material-icons">beenhere</i>
                                </div>
                                <div class="card-content">
                                    <p class="category"><?php echo $this->lang->line('user_menunggu_validasi')?></p>
                                    <h4 class="title"><b id="user_menunggu_validasi"></b></h4>
                                </div>
                                
                            </div>
                        </div>

                    </div>

                    

                </div>
            


<script type="text/javascript">
    $(document).ready(function() {
        
        
            $.ajax({
                url: "<?php echo site_url('Administrator/resume_administrator')?>",
                type: "POST",
                data: {
                    //"judul": $('#judul_kegiatan').val()
                },
                dataType: "JSON",
                success: function(data) {
                    $('#jumlah_kegiatan_aktif').text(data.total_kegiatan_aktif+" <?php echo $this->lang->line('kegiatan')?>");  
                    $('#jumlah_kegiatan_selesai').text(data.total_kegiatan_selesai+" <?php echo $this->lang->line('kegiatan')?>");   
                    $('#total_donasi').text("Rp. "+accounting.formatNumber(data.total_donasi));        
                    $('#total_zakat').text("Rp. "+accounting.formatNumber(data.total_zakat));   
                    $('#total_infaq').text("Rp. "+accounting.formatNumber(data.total_infaq));   
                    $('#jumlah_dermawan').text(data.total_dermawan+" <?php echo $this->lang->line('dermawan')?>");   
                    $('#kegiatan_menunggu_validasi').text(data.menunggu_validasi_k+" <?php echo $this->lang->line('kegiatan')?>");   
                    $('#user_menunggu_validasi').text(data.menunggu_validasi_u+" User");  
                    $('#total_program_terkini').text("Rp. "+accounting.formatNumber(data.program_terkini));
                    $('#total_jaringan_global').text("Rp. "+accounting.formatNumber(data.jaringan_global));  
                }
            });
        
    });

    
</script>