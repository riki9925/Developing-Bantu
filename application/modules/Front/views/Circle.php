<!doctype html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <h1 class="page-title">
    jquery-circle-progress
  </h1>

  <div class="circles">
    <div class="second circle">
      <strong></strong>
    </div>
  </div>

  
  <!--     Fonts and icons     -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
  <link rel="stylesheet" href="<?=base_url("assets/front/css/bootstrap.min.css"); ?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="<?=base_url("assets/front/css/material-kit.css"); ?>" rel="stylesheet" type="text/css">
  


  <!--   Core JS Files   -->
  <script src="<?=base_url("assets/front/js/jquery.min.js"); ?>" type="text/javascript"></script>
  <script src="https://rawgit.com/kottenator/jquery-circle-progress/1.2.2/dist/circle-progress.js"></script>
  <script src="<?=base_url("assets/front/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
  <script src="<?=base_url("assets/front/js/material.min.js"); ?>" type="text/javascript"></script>
  <script src="<?=base_url("assets/front/js/nouislider.min.js"); ?>" type="text/javascript"></script>
  <script src="<?=base_url("assets/front/js/bootstrap-datepicker.js"); ?>" type="text/javascript"></script>
  <script src="<?=base_url("assets/front/js/material-kit.js"); ?>" type="text/javascript"></script>
  
</body>
</html>

<script type="text/javascript">
  (function($) {
 
      $('.second.circle').circleProgress({
        value: 0.9
      }).on('circle-animation-progress', function(event, progress) {
        $(this).find('strong').html(Math.round(90 * progress) + '<i>%</i>');
      });

  })(jQuery);
</script>

<style type="text/css">
  /* These are just a test styles - you don't need them in your project */
    body {
      background-color: #444;
      padding-top: 40px;
      font: 15px/1.3 Arial, sans-serif;
      color: #fff;
      text-align: center;
    }



    .circles {
      margin-bottom: -10px;
    }

    .circle {
      width: 100px;
      margin: 6px 6px 20px;
      display: inline-block;
      position: relative;
      text-align: center;
      line-height: 1.2;
    }

    .circle canvas {
      vertical-align: top;
    }

    .circle strong {
      position: absolute;
      top: 30px;
      left: 0;
      width: 100%;
      text-align: center;
      line-height: 40px;
      font-size: 30px;
    }

    .circle strong i {
      font-style: normal;
      font-size: 0.6em;
      font-weight: normal;
    }

    .circle span {
      display: block;
      color: #aaa;
      margin-top: 12px;
    }



    @media (max-height: 600px), (max-width: 480px) {
      .credits {
        position: inherit;
      }
    }

</style>