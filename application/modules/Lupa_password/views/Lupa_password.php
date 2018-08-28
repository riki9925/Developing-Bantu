<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../../assets/img/favicon.png" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Lupa password | salingbantu.or.id</title>
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
    <nav class="navbar navbar-primary navbar-transparent navbar-absolute">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <div class="logo-container" style="width: 210px; height: 50px">
                            <div class="logo">
                                <a href="http://salingbantu.or.id">
                                <img style="height: 50px" src="<?php echo base_url()?>assets/img/salingbantu.png" alt="Salingabntu.or.id" rel="tooltip" title="" data-placement="bottom" data-html="true" >
                                </a>
                            </div>
                </div>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- <li>
                        <a href="../dashboard.html">
                            <i class="material-icons">dashboard</i> Dashboard
                        </a>
                    </li>
                    <li class="">
                        <a href="register.html">
                            <i class="material-icons">person_add</i> Register
                        </a>
                    </li>
                    <li class=" active ">
                        <a href="login.html">
                            <i class="material-icons">fingerprint</i> Login
                        </a>
                    </li>
                    <li class="">
                        <a href="lock.html">
                            <i class="material-icons">lock_open</i> Lock
                        </a>
                    </li> -->
                </ul>
            </div>
        </div>
    </nav>
    <div class="wrapper wrapper-full-page">
        <div class="full-page login-page" filter-color="black" data-image="<?php echo base_url()?>assets/img/bg3.jpeg" style='background-color: green'>
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="content">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-md-offset-4 col-sm-offset-3">
                            
                                <div class="card card-login card-hidden">
                                    <div class="card-header text-center" data-background-color="green">
                                        <h4 class="card-title">Lupa password</h4>
                                        <p><i class="material-icons" style="font-size: 60px">lock_open</i></p>
                                    </div>
                                    <p class="category text-center">
                                        Password anda akan dikirimkan melalui email.
                                    </p>
                                    <div class="card-content">
                                        
                                        <form nctype="multipart/form-data" accept-charset="utf-8" class="form form-horizontal" method="" action="" id="form_lp">

                                            <div class="input-group">
                                                <span class="input-group-addon">
                                                    <i class="material-icons">email</i>
                                                </span>
                                                <div class="form-group label-floating">
                                                    <label class="control-label">Email address</label>
                                                    <input required="" type="email" id="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="footer text-center">
                                        
                                        
                                        <div class="row">
                                        
                                            <div class="col-xs-12" style="padding-right: 25px; padding-left: 25px">
                                                <br>
                                                <button style="margin-top: 5px" onclick="lupa_password()" class="btn btn-success btn-block">Kirim password<div class="ripple-container"></div></button>
                                                <a class="btn btn-success btn-block" href="http://salingbantu.or.id/Login">
                                                    <i class="material-icons">lock_open</i> Login
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="row" style="background-color: #f7f7f7; margin-top: 30px">
                        <div class="col-sm-3">
                            <img class="img" src="http://salingbantu.or.id/assets/img/kanan.png" alt="Berita salingbantu.or.id" style="width: 100%; height:180px">
                        </div>
                        <div class="col-sm-6" style="text-align: left; font-weight: bold">
                            <h2>Donasi anda bermanfaat bagi mereka</h2>
                            
                        </div>
                        <div class="col-sm-3">
                            <img class="img" src="http://salingbantu.or.id/assets/img/kiri.png" alt="Berita salingbantu.or.id" style="width: 100%; height:180px">
                        </div>
                </div>
            </div>
            <footer class="footer">
                <div class="container">
                    <nav class="pull-left">
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
                    </nav>
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
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
    </style>

<script type="text/javascript">
    $().ready(function() {
        demo.checkFullPageBackgroundImage();

        setTimeout(function() {
            // after 1000 ms we add the class animated to the login/register card
            $('.card').removeClass('card-hidden');
        }, 700)


        $('#form_lp').bootstrapValidator({
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
                }
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });
    });


    function lupa_password(){
        $("#form_lp").bootstrapValidator('validate');
        if($('#form_lp').data('bootstrapValidator').isValid()){
            $.ajax({
                url : "<?php echo site_url('Lupa_password/email')?>",
                type: "POST",
                data: { 
                    "email" : $('#email').val()
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
                    }
                },
                
            });
        }
    }


</script>

</html>