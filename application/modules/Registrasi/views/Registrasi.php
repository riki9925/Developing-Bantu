<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Registrasi | salingbantu.or.id</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link rel="stylesheet" href="<?=base_url("assets/dashboard/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css">
    <!--  Material Dashboard CSS    -->
    <link rel="stylesheet" href="<?=base_url("assets/dashboard/css/material-dashboard.css"); ?>" rel="stylesheet" type="text/css">
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link rel="stylesheet" href="<?=base_url("assets/dashboard/css/demo.css"); ?>" rel="stylesheet" type="text/css">
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons" />
</head>

<body>
    
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?php echo base_url()?>assets/img/bg3.jpeg" style='background-color: green'>
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="green">
                                        <h4 class="card-title">Registrasi</h4>
                                        <div class="social-line">
                                            <a href="#btn" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-facebook-square"></i>
                                            </a>
                                            <a href="#pablo" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                            <a href="#eugen" class="btn btn-just-icon btn-simple">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-content">

                                        <div id="error_login" hidden="" class="alert alert-danger" style="margin-left: 20px">
                                            <span>Email : <b id="email_error"></b> sudah digunakan.</span>
                                        </div>

                                        

                                        <form id="form_registrasi" onsubmit="return false">
                                            
                                            <div class="card-content">
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">face</i>
                                                    </span>
                                                    <div class="form-group is-empty">
                                                        <input id="nama" name="nama" class="form-control" placeholder="Nama" required="" type="text"><span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">settings_phone</i>
                                                    </span>
                                                    <div class="form-group is-empty">
                                                        <input id="hp" name="hp" class="form-control" placeholder="No. telephone/HP" required=""><span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">email</i>
                                                    </span>
                                                    <div class="form-group is-empty">
                                                        <input id="email" name="email" required="" class="form-control" placeholder="Email..." type="email"><span class="material-input"></span>
                                                    </div>
                                                </div>
                                                <div class="input-group">
                                                    <span class="input-group-addon">
                                                        <i class="material-icons">lock_outline</i>
                                                    </span>
                                                    <div class="form-group is-empty">
                                                        <input placeholder="Password..." id="password" name="password" required="" class="form-control" type="password"><span class="material-input"></span>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="footer text-center">
                                        
                                        
                                        <div class="row">
                                        
                                            <div class="col-xs-12" style="padding-right: 25px; padding-left: 25px">
                                                <br>
                                                <button style="margin-top: 5px" onclick="registrasi()" class="btn btn-success btn-block"><i class="material-icons">add_person</i>Registrasi<div class="ripple-container"></div></button>


                                                <a href="http://salingbantu.or.id/Login">
                                                    <i class="material-icons">fingerprint</i> Login
                                                </a>
                                                
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    
                </div>
               <!--  <div class="row" style="background-color: #f7f7f7; margin-top: 30px">
                        <div class="col-sm-3">
                            <img class="img" src="http://salingbantu.or.id/assets/img/kanan.png" alt="Berita salingbantu.or.id" style="width: 100%; height:180px">
                        </div>
                        <div class="col-sm-6" style="text-align: left; font-weight: bold">
                            <h2>Donasi anda bermanfaat bagi mereka</h2>
                            
                        </div>
                        <div class="col-sm-3">
                            <img class="img" src="http://salingbantu.or.id/assets/img/kiri.png" alt="Berita salingbantu.or.id" style="width: 100%; height:180px">
                        </div>
                </div> -->
            </div>
            <footer class="footer">
                <div class="container">
                    <!-- <nav class="pull-left">
                        <ul>
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                    </nav> -->
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://salingbantu.or.id">Yayasan saling bantu</a>
                    </p>
                </div>
            </footer>
        </div>
    </div>
</body>



                <div class="modal fade" id="sukses" role="dialog" style="top: -50px; background: rgba(0, 0, 0, 0.58)">
                    <div id="width_sukses" class="modal-dialog" style="width: 30%">
                        <div class="modal-content" style="background-color: #4fc143">
                            <div class="modal-body" style="color: white">
                                <i class="material-icons" style="font-size: 70px; color: white">verified_user</i>
                                <button data-dismiss="modal" type="button" aria-hidden="true" class="close"><i style="font-size: 20px; font-weight: bold;" class="material-icons">close</i></button>
                                <h1 style="margin-bottom: 0px">Sukses</h1>
                                <h4 style="margin-top: 0px">Registrasi anda sukses, silahkan login untuk mulai penggalangan dana.</h4>
                                <br><br>
                                <p style="margin-bottom: 0px">Username</p>
                                <h4 style="margin-top: 0px; font-weight: bold;" id="usr_1"></h4>
                                
                                <p style="margin-bottom: 0px">Password</p>
                                <h4 style="margin-top: 0px; font-weight: bold;" id="pwd_1"></h4>
                                <br>
                                <a class="btn btn-white" style="color: #4fc143" href="http://salingbantu.or.id/Login"><i class="material-icons">fingerprint</i> Login</a>
                            </div>
                        </div>
                    </div>
                </div>

<!--   Core JS Files   -->
    <!-- Forms Validations Plugin -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script src="<?=base_url("assets/dashboard/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/jquery-ui.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/material.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/perfect-scrollbar.jquery.min.js"); ?>" type="text/javascript"></script>




    <!-- Forms Validations Plugin -->
    <script src="<?=base_url("assets/dashboard/js/jquery.validate.min.js"); ?>" type="text/javascript"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="<?=base_url("assets/dashboard/js/moment.min.js"); ?>" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
    <script src="<?=base_url("assets/dashboard/js/bootstrap-notify.js"); ?>" type="text/javascript"></script>
    <!-- DateTimePicker Plugin -->
    <script src="<?=base_url("assets/dashboard/js/bootstrap-datetimepicker.js"); ?>" type="text/javascript"></script>



    <!-- Sliders Plugin -->
    <script src="<?=base_url("assets/dashboard/js/nouislider.min.js"); ?>" type="text/javascript"></script>



    <!-- Select Plugin -->
    <script src="<?=base_url("assets/dashboard/js/jquery.select-bootstrap.js"); ?>" type="text/javascript"></script>
    <!--  DataTables.net Plugin    -->
    <script src="<?=base_url("assets/dashboard/js/jquery.datatables.js"); ?>" type="text/javascript"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="<?=base_url("assets/dashboard/js/sweetalert2.js"); ?>" type="text/javascript"></script>
    <!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?=base_url("assets/dashboard/js/jasny-bootstrap.min.js"); ?>" type="text/javascript"></script>
    <!--  Full Calendar Plugin    -->
    <script src="<?=base_url("assets/dashboard/js/fullcalendar.min.js"); ?>" type="text/javascript"></script>
    <!-- TagsInput Plugin -->
    <script src="<?=base_url("assets/dashboard/js/jquery.tagsinput.js"); ?>" type="text/javascript"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="<?=base_url("assets/dashboard/js/material-dashboard.js"); ?>" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?=base_url("assets/dashboard/js/demo.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/accounting.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/validator.js"); ?>" type="text/javascript"></script>

    <style type="text/css">
        .form-group .help-block{
            position: relative;
        }

        .has-feedback label ~ .form-control-feedback{
            top: 0px;
        }

    </style>

<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)




        $('#form_registrasi').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                nama: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Masukan nama'
                        }
                    }
                },
                hp: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Masukan No. telephone/HP'
                        },
                        regexp: {
                            regexp: /^[0-9, ]*$/,
                            message: 'Nomor telephone harus angka'
                        }
                    }
                },
                email: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Masukan email'
                        }
                    }
                },
                password: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: 'Masukan password'
                        }
                    }
                }
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });


        if (window_width >= 992){
            $('#width_sukses').css('width', '93%');
            $('#sukses').css('top', '-50px');
        }

        if (window_width <= 768) {
            $('#width_sukses').css('width', '93%');
            $('#sukses').css('top', '-80px');
        }
    });


    $('#hp').keydown(function (e){
        if(e.keyCode == 13){
            registrasi();
        }
    })
    $('#nama').keydown(function (e){
        if(e.keyCode == 13){
            registrasi();
        }
    })
    $('#email').keydown(function (e){
        if(e.keyCode == 13){
            registrasi();
        }
    })
    $('#password').keydown(function (e){
        if(e.keyCode == 13){
            registrasi();
        }
    })


    function registrasi(){
        $("#form_registrasi").bootstrapValidator('validate');
        if($('#form_registrasi').data('bootstrapValidator').isValid()){
            $.ajax({
                url : "<?php echo site_url('Front/register')?>",
                type: "POST",
                data: { 
                  "hp" : $('#hp').val(), "nama" : $('#nama').val(), "email" : $('#email').val(), "password" : $('#password').val()
                },
                dataType: "JSON",
                success: function(data)
                {
                    if (data.st == 'success') {
                        $('#usr_1').text($('#email').val());
                        $('#pwd_1').text($('#password').val());

                        $('#nama').val('');
                        $('#hp').val('');
                        $('#email').val('');
                        $('#password').val('');
                        $('#error_login').hide();

                        

                        $('#sukses').modal('show');
                        //window.location.href = '<?php echo base_url()?>Login/';
                    }
                    else{
                        //alert('failed');
                        $('#email_error').text(data.email);
                        $('#error_login').show();
                    }
                },
                
            });
        }
    }




</script>

</html>