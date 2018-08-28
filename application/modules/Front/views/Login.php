		<div class="header header-filter" style="background-image: url('<?php echo base_url()?>assets/img/bg3.jpeg'); background-size: cover; background-position: top center;">
			<div class="container">
				<div class="row">
					<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3">
						<div class="card card-signup" style="margin: 130px 0 40px">
							<!-- <form class="form" method="" action=""> -->
								<div class="header header-success text-center">
									<h4>Log in</h4>
									<p><i class="material-icons" style="font-size: 60px">fingerprint</i></p>
								</div>
								
								<div class="content">

									
							        <div class="alert alert-danger" id="login_failed" hidden="">
							             <div class="container-fluid">
											 <div class="alert-icon">
												<i class="material-icons">error_outline</i>
											</div>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true"><i class="material-icons">clear</i></span>
											</button>
							                 <b>Error:</b> Akun login yang anda masukan salah.
							            </div>
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
									<button onclick="Login()" class="btn btn-success btn-round">Login <i class="material-icons">arrow_forward</i><div class="ripple-container"></div></button>

									<div class="row">
										<div class="col-md-6">
											<a href="Apps/lupa_password" class="btn btn-simple btn-success btn-lg">lupa password?</a>
										</div>
										<div class="col-md-6">
											<a href="#front" onclick="get_content('Register')" class="btn btn-simple btn-success btn-lg">register</a>
										</div>
									</div>
									
									<br>
									
								</div>
							<!-- </form> -->
						</div>
					</div>
				</div>
			</div>

			
		</div>




<script type="text/javascript">
	function Login(){
		$.ajax({
	            url : "<?php echo site_url('Front/login')?>",
	            type: "POST",
	            data: { 
		          	"email" : $('#email').val(), "password" : $('#password').val()
		        },
	            dataType: "JSON",
	            success: function(data)
	            {
	            	if (data.st == 'success') {
	            		$('#login_failed').hide();

	            		if (data.level == 'USER') {
	            			window.location.href = '<?php echo base_url()?>Front/';
	            			//get_content('Salingbantu');
	            		}
	            		else if (data.level == 'ADMINISTRATOR') {
	            			get_content('Administrator');
	            		}
	            		else if (data.level == 'PENGURUS') {
	            			get_content('Pengurus');
	            		}
	            	}
	            	else{
	            		$('#login_failed').show();
	            	}
	            },
	            
	        });
	}
</script>