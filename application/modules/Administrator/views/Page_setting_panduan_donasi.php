
                <div class="container-fluid" >
                    <div class="col-sm-4">
                        <div class="card" style="border-radius: 0px">
                                <div class="card-content">
                                    <h3><?php echo $this->lang->line('daftar_halaman')?></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img style="width: 60px" src="<?php echo base_url()?>assets/img/cara_berdonasi.png">
                                        </div>
                                        <div class="col-xs-9">
                                            <h4><b><?php echo $this->lang->line('cara_berdonasi')?></b></h4>

                                            <a  href="#apps" onclick="detil_set_page('Page_donasi_online')"><h4 id="Page_donasi_online" class="bayu_edan"><?php echo $this->lang->line('donasi_online')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page('Page_transfer_bank')"><h4 id="Page_transfer_bank" class="bayu_edan"><?php echo $this->lang->line('transfer_bank')?></h4></a>
                                            <!-- <a  href="#apps" onclick="detil_set_page('Page_donasi_natuna')"><h4 id="Page_donasi_natuna" class="bayu_edan"><?php echo $this->lang->line('donasi_natuna')?></h4></a> -->
                                        </div>
                                    </div>
                                    
                                    <div class="row" hidden="">
                                        <div class="col-xs-3">
                                            <img style="width: 60px" src="<?php echo base_url()?>assets/img/ayo_bersinergi.png">
                                        </div>
                                        <div class="col-xs-9">
                                            <h4><b><?php echo $this->lang->line('ayo_bersinergi')?></b></h4>
                                            <a href="#apps" onclick="detil_set_page('Page_komunitas')"><h4 id="Page_komunitas" class="bayu_edan"><?php echo $this->lang->line('komunitas')?></h4></a>
                                            <a href="#apps" onclick="detil_set_page('Page_korporat')"><h4 id="Page_korporat" class="bayu_edan"><?php echo $this->lang->line('korporate')?></h4></a>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-8" id="setting_panduan_donasi_child">
                            
                        
                    </div>


                </div>



<script type="text/javascript">

    $(document).ready(function() {
        
        detil_set_page(page_setting);
        
    });

    function get_content_panduan_donasi(page){

            $('#setting_panduan_donasi_child').empty();
            $.ajax({
                url : "<?php echo site_url('Administrator/get_content_setting')?>",
                type: "POST",
                data: { 
                  "page" : page
                },
                dataType: "html",
                success: function(data)
                {
                    $('#setting_panduan_donasi_child').html(data);
                },
                
            });
            
    }

    function detil_set_page(action){

        get_content_panduan_donasi('Page_setting_panduan_donasi_child');

        page_setting = action;
            $('.bayu_edan').removeAttr("style");

            $('#'+action).css('background-color', 'whitesmoke');
            $('#'+action).css('padding', '5px');
            $('#'+action).css('border-left', 'solid');
        
            

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_set_page')?>",
                type: "POST",
                data: { 
                    "id" : page_setting
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_page').val(data.judul); 
                    $('#deskripsi_page').val(data.deskripsi); 
                    $('#img_exist_set_page').empty();   
                    $('#img_exist_set_page').attr('src', '<?php echo base_url()?>assets/img/header/'+data.img); 
                },
            });
        
    }
</script>