
                <div class="container-fluid" >
                    <div class="col-sm-4">
                        <div class="card" style="border-radius: 0px">
                                <div class="card-content">
                                    <h3><?php echo $this->lang->line('daftar_halaman')?></h3>
                                    <hr>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <img style="width: 60px" src="<?php echo base_url()?>assets/img/list.png">
                                        </div>
                                        <div class="col-xs-9">
                                            <h4><b><?php echo $this->lang->line('daftar_halaman')?></b></h4>

                                            <a  href="#apps" onclick="detil_set_page2('Page_sejarah')"><h4 id="Page_sejarah" class="bayu_picek"><?php echo $this->lang->line('sejarah')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page2('Page_visi_misi')"><h4 id="Page_visi_misi" class="bayu_picek"><?php echo $this->lang->line('visi_misi')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page2('Page_menejemen')"><h4 id="Page_menejemen" class="bayu_picek"><?php echo $this->lang->line('manajemen')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page2('Page_salam')"><h4 id="Page_salam" class="bayu_picek"><?php echo $this->lang->line('salam_presiden')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page2('Page_legal')"><h4 id="Page_legal" class="bayu_picek"><?php echo $this->lang->line('legal')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page2('Page_mitra')"><h4 id="Page_mitra" class="bayu_picek"><?php echo $this->lang->line('mitra')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page2('Page_karir')"><h4 id="Page_karir" class="bayu_picek"><?php echo $this->lang->line('karir')?></h4></a>
                                            <a  href="#apps" onclick="detil_set_page2('Page_kontak')"><h4 id="Page_kontak" class="bayu_picek"><?php echo $this->lang->line('kontak')?></h4></a>

                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <div class="col-sm-8" id="page_tentang_kami_child">
                            
                        
                    </div>


                </div>



<script type="text/javascript">

    $(document).ready(function() {

        
        detil_set_page2(page_tentang_kami);
        
    });

    function get_content_tentang_kami(page){

            $('#page_tentang_kami_child').empty();
            $.ajax({
                url : "<?php echo site_url('Administrator/get_content_setting')?>",
                type: "POST",
                data: { 
                  "page" : page
                },
                dataType: "html",
                success: function(data)
                {
                    $('#page_tentang_kami_child').html(data);
                },
                
            });
            
    }


    

    function detil_set_page2(action){
        get_content_tentang_kami('Page_setting_tentang_kami_child');

        page_tentang_kami = action;
            $('.bayu_picek').removeAttr("style");

            $('#'+action).css('background-color', 'whitesmoke');
            $('#'+action).css('padding', '5px');
            $('#'+action).css('border-left', 'solid');
        
            

            $.ajax({
                url : "<?php echo site_url('Administrator/detil_set_page')?>",
                type: "POST",
                data: { 
                    "id" : page_tentang_kami
                },
                dataType: "JSON",
                success: function(data)
                {
                   $('#judul_page_2').val(data.judul); 
                    $('#deskripsi_page_2').val(data.deskripsi); 
                    $('#img_exist_set_page_2').empty();   
                    $('#img_exist_set_page_2').attr('src', '<?php echo base_url()?>assets/img/header/'+data.img); 
                },
            });
        
    }
</script>