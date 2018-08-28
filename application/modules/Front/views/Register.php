<div class="header header-filter" style="background-image: url('<?php echo base_url() ?>assets/img/bg3.jpeg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup" style="margin: 130px 0 40px">
							<!-- <form class="form" method="" action=""> -->
								<div class="header header-success text-center">
									<h4>Registrasi</h4>
									<p><i class="material-icons" style="font-size: 60px">assignment</i></p>
								</div>
								
								<div class="content">

									<div class="alert alert-success" id="register_success" hidden="">
							            <div class="container-fluid">
											<div class="alert-icon">
												<i class="material-icons">check</i>
											</div>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="material-icons">clear</i></span>
											</button>
							            	<b>Success:</b> Akun anda telah aktif. Silahkan login.
							            </div>
							        </div>

							        <div class="alert alert-danger" id="register_failed" hidden="">
							             <div class="container-fluid">
											 <div class="alert-icon">
												<i class="material-icons">error_outline</i>
											</div>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="material-icons">clear</i></span>
											</button>
							                 <b>Error:</b> Email anda sudah dipakai, silahkan mendaftar dengan menggunakan email lainnya.
							            </div>
							        </div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">face</i>
										</span>
										<div class="form-group is-empty"><input class="form-control" placeholder="Nama lengkap..." id="nama" type="text"><span class="material-input"></span></div>
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">email</i>
										</span>
										<input type="text" id="email" class="form-control" placeholder="Email...">
									</div>

									<div class="input-group">
										<span class="input-group-addon">
											<i class="material-icons">lock_outline</i>
										</span>
										<input type="password" id="password" placeholder="Password..." class="form-control" />
									</div>
								</div>
								<div class="footer text-center">
									<button onclick="registrasi()" class="btn btn-success btn-round">Registrasi <i class="material-icons">arrow_forward</i><div class="ripple-container"></div></button>

									<div class="row">
										<!-- <div class="col-md-6">
											<a href="Apps/lupa_password" class="btn btn-simple btn-success btn-lg">lupa password?</a>
										</div> -->
										<div class="col-md-6">
											<a href="#front" onclick="get_content('Login')" class="btn btn-simple btn-success btn-lg">Login</a>
										</div>
									</div>
									
									<br>
									
								</div>
							
						</div>
					</div>
				</div>
			</div>

			
		</div>




<script type="text/javascript">
	function registrasi(){
		//alert()
		$.ajax({
	            url : "<?php echo site_url('Front/register')?>",
	            type: "POST",
	            data: { 
		          "nama" : $('#nama').val(), "email" : $('#email').val(), "password" : $('#password').val()
		        },
	            dataType: "JSON",
	            success: function(data)
	            {
	            	if (data.st == 'success') {
	            		$('#nama').val('');
	            		$('#email').val('');
	            		$('#password').val('');
	            		$('#register_success').show();
	            		$('#register_failed').hide();
	            		get_content('Login')
	            	}
	            	else{
	            		//alert('failed');
	            		$('#register_success').hide();
	            		$('#register_failed').show();
	            	}
	            },
	            
	        });
	}
</script>