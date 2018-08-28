<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Login | salingbantu.or.id</title>
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
                                        <h4 class="card-title">Login</h4>
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
                                        <div id="login_failed" hidden="" class="alert alert-danger" style="margin-left: 20px">
                                            <span>
                                                Akun login anda tidak sesuai, silahkan ulangi</span>
                                        </div>
                                        
                                        <form id="form_login" action="" onsubmit="return false">

                                            <div class="input-group" >
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email address</label>
                                                    <input required="" type="email" id="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                            <div class="input-group" >
                                                <span class="input-group-addon">
                                                    <i class="material-icons">lock_outline</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Password</label>
                                                    <input required="" id="password" name="password" type="password" class="form-control">
                                                </div>
                                            </div>

                                        </form>
                                    </div>
                                    <div class="footer text-center">
                                        
                                        
                                        <div class="row">
                                        
                                            <div class="col-xs-12" style="padding-right: 25px; padding-left: 25px">
                                                <br>
                                                <button style="margin-top: 5px" onclick="login()" class="btn btn-success btn-block">Login<div class="ripple-container"></div></button>
                                                <br>
                                            </div>
                                            
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                                                <a href="http://salingbantu.or.id/Registrasi">
                                                    <i class="material-icons">person_add</i> Registrasi
                                                </a>
                                            </div>
                                            <div class="col-sm-6 col-xs-12" style="margin-top: 10px">
                                                <a href="http://salingbantu.or.id/Lupa_password">
                                                    <i class="material-icons">lock_open</i> Lupa password
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    
                </div>
                
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
                        <!-- <ul>
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
                        </ul> -->
                    </nav>
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


        @media screen and (max-width: 768px) {
            /*.form-group.label-static label.control-label, .form-group.label-floating.is-focused label.control-label, .form-group.label-floating:not(.is-empty) label.control-label{
                top: -10px;
            }*/
        }
        
    </style>

<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();


        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)


        $('#form_login').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
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
    });


    $('#email').keydown(function (e){
        
        if(e.keyCode == 13){
            login();
        }
    })


    $('#password').keydown(function (e){
        
        if(e.keyCode == 13){
            login();
        }
    })


    function login(){

        $("#form_login").bootstrapValidator('validate');
        if($('#form_login').data('bootstrapValidator').isValid()){
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
                            window.location.href = '<?php echo base_url()?>Administrator/';
                        }
                        else if (data.level == 'PENGURUS') {
                            window.location.href = '<?php echo base_url()?>Pengurus/';
                        }
                    }
                    else{
                        $('#login_failed').show();
                        return false; // prevent form from submitting
                    }
                    
                },
                
            });
        }
        return false; // prevent form from submitting
    }


</script>

</html>