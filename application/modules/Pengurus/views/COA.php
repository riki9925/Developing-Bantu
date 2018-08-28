
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-3">
                            
                                <div id="s_akun_jenis" class="card warna" onclick="get_content_akun('Akun_jenis')" style="border-radius: 0px; cursor: pointer; margin-top: 0px" >
                                    <div class="card-content">
                                        <h4><?php echo $this->lang->line('akun_jenis')?><i class="material-icons pull-right" style="font-size: 30px; color: #4fc143">arrow_forward</i></h4>
                                    </div>
                                </div>

                                <div id="s_akun_kel" class="card warna" onclick="get_content_akun('Akun_kelompok')" style="border-radius: 0px; cursor: pointer; margin-top: 0px" >
                                    <div class="card-content">
                                        <h4><?php echo $this->lang->line('akun_kelompok')?><i class="material-icons pull-right" style="font-size: 30px; color: #4fc143">arrow_forward</i></h4>
                                    </div>
                                </div>


                                <div id="s_akun_bb" class="card warna" onclick="get_content_akun('Akun_bb')" style="border-radius: 0px; cursor: pointer; margin-top: 0px" >
                                    <div class="card-content">
                                        <h4><?php echo $this->lang->line('akun_buku_besar')?><i class="material-icons pull-right" style="font-size: 30px; color: #4fc143">arrow_forward</i></h4>
                                    </div>
                                </div>

                                <div id="s_akun_sbb" class="card warna" onclick="get_content_akun('Akun_sbb')" style="border-radius: 0px; cursor: pointer; margin-top: 0px" >
                                    <div class="card-content">
                                        <h4><?php echo $this->lang->line('akun_subbuku_besar')?><i class="material-icons pull-right" style="font-size: 30px; color: #4fc143">arrow_forward</i></h4>
                                    </div>
                                </div>
                        </div>


                        <div class="col-md-9" id="content_account">
                            
                            
                        </div>

                    </div>
                </div>


                

            

<script type="text/javascript">

    $(document).ready(function() {
        get_content_akun('Akun_jenis');
    });

    function get_content_akun(page){
        $('#content_account').empty();
            $.ajax({
                url : "<?php echo site_url('Administrator/get_content')?>",
                type: "POST",
                data: { 
                  "page" : page
                },
                dataType: "html",
                success: function(data)
                {
                    $('#content_account').html(data);
                },
                
            });               
    }


</script>