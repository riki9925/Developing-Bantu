<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Codeigniter Image Resize</title>
        <style type="text/css">
 
            ::selection { background-color: #E13300; color: white; }
            ::-moz-selection { background-color: #E13300; color: white; }
 
            body {
                background-color: #fff;
                margin: 40px;
                font: 13px/20px normal Helvetica, Arial, sans-serif;
                color: #4F5155;
            }            
 
            #body {
                margin: 0 15px 0 15px;
            }
 
            #container {
                margin: 10px;
                border: 1px solid #D0D0D0;
                box-shadow: 0 0 8px #D0D0D0;
            }
 
            .error {
                color: #E13300;
            }
 
            .success {
                color: darkgreen;
            }
        </style>
    </head>
    <body>
        <div id="container">
            <h1>CodeIgniter Image Resize</h1>
 
            <div id="body">
                <p>Select an image file to resize</p>
                <?php
                if (isset($success) && strlen($success)) {
                    echo '<div class="success">';
                    echo '<p>' . $success . '</p>';
                    echo '</div>';
                }
                if (isset($errors) && strlen($errors)) {
                    echo '<div class="error">';
                    echo '<p>' . $errors . '</p>';
                    echo '</div>';
                }
                if (validation_errors()) {
                    echo validation_errors('<div class="error">', '</div>');
                }
                if (isset($resize_img)) {
                    echo img($resize_img);
                }
                ?>

                

                <form  name="image_upload_form" id="image_upload_form" enctype="multipart/form-data" accept-charset="utf-8">
                    <p><input name="image_name" id="image_name" readonly="readonly" type="file"></p>
                    <!-- <p><input name="image_upload" value="Upload Image" type="submit"></p> -->
                </form>

                <button onclick="uploadimage()">go</button>

                <script src="<?=base_url("assets/dashboard/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>
                <script type="text/javascript">
                
                function uploadimage() {
                    trx_id = 'aaaaaa';
                    $.ajax({
                        url: "<?php echo site_url('Crop/upload')?>/" + trx_id,
                        type: 'POST',
                        data: new FormData($('#image_upload_form')[0]),
                        processData: false,
                        contentType: false,
                        dataType: "JSON",
                        success: function(data) {
                            
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            
                        }
                    });
                }

            </script>

            </div>
 
        </div>
    </body>
</html>