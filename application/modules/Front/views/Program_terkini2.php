
		<div id="img_halaman" class="page-header header-filter" data-parallax="true" style="background-image: url(); transform: translate3d(0px, 1.33333px, 0px);">
		</div>

		<div class="main main-raised" style="margin-bottom: 30px; margin-left: 20px; margin-right: 20px">
			<div class="container" style="width: 100%">
		    	<div class="section text-center section-landing" style="padding-top: 0px">
	    			
	    			<div class="row" style="margin-top: 30px; padding-bottom: 50px">
	    				<div class="col-sm-12  text-center" style="padding-left: 30px; padding-right: 30px">
	    					<h3 style="margin-bottom: 0px">Program unggulan salingbantu</h3>
	    					<div class="row"><div class="col-md-2 col-md-offset-5"><hr style="border-top: 3px solid #4caf50"></div></div>
	    					
	    					<div class="row">

	    						<div class="col-md-4 col-sm-6 col-xs-12" id="kolom1">
                            
		                        </div>
		    					
		    					<div class="col-md-4 col-sm-6 col-xs-12" id="kolom2">
                            
		                        </div>


		                        <div class="col-md-4 col-sm-6 col-xs-12" id="kolom3">
		                            
		                        </div> 
		    					
		    				</div>
	    				</div>
	    			</div>



					<div class="section text-center section-landing" style="background-color: white; padding: 10px 0; border-top: solid 1px whitesmoke;">
				    	<div class="container" style="width: 100%">
		    				<div id="footer-areas" style="margin-top: 20px">
					            <footer class="footer footer-white footer-big">
					                <div class="container">
			                    			                    
					                		<div class="row">
				                    	<div class="col-md-2">
				                    		<img src="http://salingbantu.or.id/salingbantu_dev/assets/img/salingbantu5.png" style="width: 105%	">
				                    		

				                    	</div>

				                    	<div class="col-md-5 text-left">
				                    		<h4 style="margin: -2px; font-size: 14px">YAYASAN SALING BANTU INDONESIA</h4>
				                    		<P style="margin: -2px; font-size: 13px; color : black">Akte Notaris Ulia Azhar, SH. M.Kn Nomor 13 Tanggal 15 Mei 2017</P>
				                    		<p style="margin: -2px; font-size: 13px; color : black">Nomor: AHU-117.AH.02.01-TAHUN 2011</p>
				                    		<p style="margin: -2px; font-size: 13px; color : black">Email: yayasan.salingbantuindonesia@gmail.com</p>
				                    		<p style="margin: -2px; font-size: 13px; color : black">Donasi Ke Nomor Rekening: Bank Mandiri 129.00.880.12345</p>

				                    	</div>

				                    	<div class="col-md-5">
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
				                    	</div>
					                    <!-- <ul class="social-buttons">
					                        <li>
					                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-twitter">
					                            <i class="fa fa-twitter"></i>
					                          </a>
					                        </li>
					                        <li>
					                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-facebook">
					                            <i class="fa fa-facebook-square"></i>
					                          </a>
					                        </li>
					                        <li>
					                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-dribbble">
					                            <i class="fa fa-dribbble"></i>
					                          </a>
					                        </li>
					                        <li>
					                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-google">
					                            <i class="fa fa-google-plus"></i>
					                          </a>
					                        </li>
					                        <li>
					                          <a href="#pablo" class="btn btn-just-icon btn-simple btn-youtube">
					                            <i class="fa fa-youtube-play"></i>
					                          </a>
					                        </li>
					                    </ul> -->

					                    <div hidden="" class="copyright pull-center">
					                        Copyright © 2017 Salingbantu.or.id.
					                    </div>


					                </div>
					            </footer>
					        </div>
					    </div>
					</div>

					
	    			
	            </div>

	        	
	        </div>

		</div>




	<style type="text/css">
		@media screen and (max-width: 768px) {
                          
			.main-raised{
				margin-top: -50px;
				margin-left: 10px;
				margin-right: 10px;
			}
		} 

		@media screen and (min-width: 769px) {
                          
			.main-raised{
				margin-top: -30px;
				margin-left: 10px;
				margin-right: 10px;
			}
		} 
	</style>



<script type="text/javascript">
	var id_program_terkini;
	$(document).ready(function() {
		get_program_terkini();
    });


	function get_program_terkini(){
        $.ajax({
            url: "<?php echo site_url('Front/get_program_terkini')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                $('#kolom1').empty(); $('#kolom2').empty(); $('#kolom3').empty();
                var status; var color; var looping = 1; var action;

                $.each(data, function(k, v) {
                    
                    var persen = (v.tercapai_dana / v.target_dana)* 100;
                    var persen2 = v.tercapai_dana / v.target_dana;

                    

                    if (v.gambar_utama == null) {
                        var gambar = "assets/img/content/1.jpg";
                    }else{
                        var gambar = "assets/img/program_terkini/"+v.gambar_utama;
                    }


                    rows ="<div class='card' style='border-radius: 0px; margin-top: 20px; margin-bottom: 5px; box-shadow: 0 8px 10px 1px rgba(0,0,0,.14),0 3px 14px 2px rgba(0,0,0,.12),0 5px 5px -3px rgba(0,0,0,.2)'><div class='card-content'><div class='row'><div class='col-xs-12' style='padding:0px'><a href='#front' onclick='detil_program_terkini("+v.id+")'><h5 style='margin-top: 0px; margin-left: 5px; margin-right: 5px'>"+v.judul+"</h5></a><img class='img' src='<?php echo base_url()?>"+gambar+"' style='width: 100%'><div class='row' style='margin-top: 10px'><div class='col-xs-6'><p class='category pull-left' style='color:#4fc143'><i class='material-icons'>sort</i>"+v.nama_kategori+"</p></div><div class='col-xs-6'><p  class='category pull-right' style='color:#4fc143'><i class='material-icons'>location_on</i>"+v.nama_kota+"</p></div></div><hr><div class='row' style='margin-top: 15px'><div class='col-md-3 col-sm-3 col-xs-3' style='text-align: left'><div class='circles'><div class='second circle "+v.id+"'><strong></strong></div></div></div><div class='col-md-5 col-sm-5 col-xs-5' style='text-align: left'><p style='margin-bottom: 0px'>Terkumpul</p><p><b>Rp. "+accounting.formatNumber(v.tercapai_dana)+"</b></p></div><div class='col-md-4 col-sm-4 col-xs-4' style='text-align: left'><p style='margin-bottom: 0px'>Sisa waktu</p><p><b>"+v.sisa_hari+" Hari</b></p></div></div></div></div></div></div>";

                    if (looping == 1) {
                        $(rows).appendTo("#kolom1");
                    }
                    else if (looping == 2) {
                        $(rows).appendTo("#kolom2");
                    }
                    else if (looping == 3) {
                        $(rows).appendTo("#kolom3");
                        looping = 0;
                    }
                    

                    $('.second.circle.'+v.id).circleProgress({
                        value: persen2
                    }).on('circle-animation-progress', function(event, progress) {
                        $(this).find('strong').html(Math.round(persen * progress) + '<i>%</i>');
                    });

                    looping += 1;
                });
                
            }
        });
    }



    function detil_program_terkini(id){
        id_program_terkini = id;
        get_content('Detil_program_terkini');
    }

</script>