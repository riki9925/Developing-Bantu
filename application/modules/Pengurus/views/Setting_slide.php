
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('setting_slide_gambar')?></h4>
                                    <div class="toolbar">

                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-sm-3"> -->
                                                <button class="btn btn-success btn-round" onclick="get_content('Setting')">
                                                <i class="material-icons">arrow_back</i> <?php echo $this->lang->line('kembali')?>
                                                <div class="ripple-container"></div></button>

                                                <!-- <a href="#apps" onclick="get_content('Setting')"><i style="font-size: 30px; color: #4fc143" class="material-icons">arrow_back</i>Kembali</a> -->
                                            <!-- </div>
                                            <div class="col-sm-3"> -->
                                                <button onclick="tambah_slide()" class="btn btn-success btn-round" ><i class="material-icons">add</i> <?php echo $this->lang->line('tambah_gambar')?><div class="ripple-container"></div></button>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_slider" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_slider">
                                                    
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                                <!-- end content-->
                            </div>
                            <!--  end card  -->
                        </div>

                    </div>
                </div>


                

            

<script type="text/javascript">
    var table_slider;
    $(document).ready(function() {
        set_responsive_slider();
        load_table_slider();
    });

    function set_responsive_slider(){

        if (layar == 'big') {
            rows = "<th style='width:8%'>No.</th><th style='width:50%'><?php echo $this->lang->line('gambar')?></th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_slider");
        }
        else{
            rows = "<th style='width:60%'>Gambar</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_slider");
        }
    }


    function load_table_slider(){
        table_slider = $('#table_slider').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_slider')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                    },
                },
                //Set column definition initialisation properties.
                "columnDefs": [
                    { 
                        "targets": [ -1 ], //last column
                        "orderable": false, //set not orderable
                    },
                ],
        });



        // Edit record
        table_slider.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table_slider.row($tr).data();
            $('#modal_edit_kategori').modal('show');
            $('#id_kategori').val(data[0]);
            $('#nama_kategori').val(data[1]);
            $('#status_kategori').empty();

            if (data[2] == '<p style="color:green">ACTIVE</p>') {
                
                rows = "<option selected=''>ACTIVE </option><option>NONACTIVE </option>";
                $(rows).appendTo("#status_kategori");
            }
            else{
                
                rows = "<option>ACTIVE </option><option selected=''>NONACTIVE </option>";
                $(rows).appendTo("#status_kategori");
            }
        }); 
    }

   
    function reload_table_slider(){
        table_slider.ajax.reload(null, false);
    }


    function tambah_slide(){
        $('#tambah_slide').modal('show');
        $('#btn_delete_slide').click();
    }

    function delete_slider(id){

        swal({
            title: '<?php echo $this->lang->line('hapus_gambar_slide')?>',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: '<?php echo $this->lang->line('hapus')?>',
            buttonsStyling: false
        }).then(function() {

            $.ajax({
                url : "<?php echo site_url('Administrator/delete_slider')?>",
                type: "POST",
                data: { 
                    "id" : id
                },
                dataType: "JSON",
                success: function(data)
                {
                    swal({
                        title: '<?php echo $this->lang->line('terhapus')?>',
                        text: '',
                        type: 'success',
                        confirmButtonClass: "btn btn-success",
                        buttonsStyling: false
                    })
                    reload_table_slider();
                },
            });

            
        });


        // swal({
        //   title: "Anda akan menghapus gambar slide",
        //   text: "",
        //   type: "warning",
        //   showCancelButton: true,
        //   confirmButtonColor: "#DD6B55",
        //   confirmButtonText: "Hapus",
        //   closeOnConfirm: false
        // },
        // function(){
            
          
        // });
        
    }



    function upload_slide() {

                var file_data = $('#wizard-picture_slide').prop('files')[0];
                    
                    var form_data = new FormData();
                    form_data.append('wizard-picture_slide', file_data);
                    $.ajax({
                        url: "<?php echo site_url('Administrator/upload_img_slide')?>", 
                        dataType: 'text', 
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('slide_gambar_ditambahkan')?>", "success");
                            reload_table_slider();
                        },
                        error: function (response) {
                            swal("Informasi", response)
                        }
                });
    }

</script>