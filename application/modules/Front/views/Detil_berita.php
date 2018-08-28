	<div class="main" style="background-color: transparent;">
        <div class="section" style="padding: 20px 0">
           <div class="container">
				<div class="row" >
                    
                    <div class="col-sm-8 col-xs-12" style="margin-top: 10px">
                        <div class="card" style="text-align: left">
                            <div class="content">
                                    <div class="row">
                                        <div class="col-sm-6 col-xs-5">
                                            <a style="font-size: 18px" onclick="get_content('Salingbantu')" href="#apps"><i class="material-icons">arrow_back</i>Kembali</a>
                                        </div>
                                        <div class="col-sm-6 col-xs-7" style="text-align: right" id="d_date_berita">
                                            
                                        </div>
                                    </div>
                                    <hr>

                                    <h3 id="d_judul_berita"></h3>

                                    <a href="#"><img class="img-responsive" id="d_img_berita" src="" style="width: 100%"></a>
                                    
                                    <hr>

                                    <h4 id="d_deskripsi_berita" style="margin-top: 20px;"></h4>


                                    
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-4 col-xs-12" style="margin-top: 10px">
                        <div class="card" >
                            <div class="content" id="list_berita_next">
                                                                            
                                        
                                

                            </div>
                        </div>
                    </div>

				</div>
            </div>
        </div>
    </div>

<script type="text/javascript">
    
    $(document).ready(function() {
        // alert()
         detil_berita2();
    });

    

    function detil_berita2(){
        
        $.ajax({
            url : "<?php echo site_url('Front/detil_berita2')?>",
            type: "POST",
            data: { 
                "id" : id_berita
            },
            dataType: "JSON",
            success: function(data)
            {
                
                
                $('#d_judul_berita').text(data.judul);
                $('#d_date_berita').empty();
                var rows = "<p style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>date_range</i>"+data.waktu+"</p>";
                $(rows).appendTo("#d_date_berita");

               
                $('#d_img_berita').attr('src', '<?php echo base_url()?>assets/img/berita/'+data.img);
                                
                $('#d_deskripsi_berita').text(data.deskripsi);
                
            },
        });

        
        $.ajax({
            url : "<?php echo site_url('Front/list_berita_next')?>",
            type: "POST",
            data: { 
                "id" : id_berita
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#list_berita_next').empty();

                $.each(data, function(k, v) {
                    rows1="<div class='row' style='margin-top:10px; margin-bottom:10px'><div class='col-xs-6'><img class='img-responsive' src='<?php echo base_url()?>assets/img/berita/"+v.img+"' style='width: 100%'></div><div class='col-xs-6' style='padding-left:0px'><a href='#front' onclick='detil_berita("+v.id+")'><h4 style='margin-top:0px; margin-bottom:0px'>"+v.judul+"</h4></a><p style='text-transform: uppercase; color:#4fc143'>"+v.waktu+"</p></div></div>";
                    $(rows1).appendTo("#list_berita_next");
                });
            },
        });
    }



</script>