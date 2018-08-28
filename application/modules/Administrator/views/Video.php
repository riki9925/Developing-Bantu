
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('daftar_video_dukungan')?></h4>
                                    <div class="toolbar">

                                        <div class="col-md-12" style="background-color: #ecf0f1">
                                            <div class="toolbar">

                                                <div class="row">
                                                    <div class="col-sm-3">
                                                        <button class="btn btn-success btn-round" onclick="get_content('Setting')">
                                                        <i class="material-icons">arrow_back</i> <?php echo $this->lang->line('kembali')?>
                                                        <div class="ripple-container"></div></button>

                                                        <button onclick="tambah_video()" class="btn btn-success btn-round" ><i class="material-icons">add</i> <?php echo $this->lang->line('tambah_video')?><div class="ripple-container"></div></button>
                                                        
                                                    </div>
                                                    <div class="col-sm-9">
                                                        <div class="alert alert-info alert-with-icon" data-notify="container">
                                                            <i class="material-icons" data-notify="icon">notifications</i>
                                                            <h4>
                                                            Untuk ukuran tampilan yang presisi, rubah ukuran <b>width="320"</b> dan <b>height="150"</b></h4>
                                                        </div>
                                                    </div>
                                                </div>
                                                

                                            </div>    
                                        </div>

                                    </div>
                                    
                                    <div class="material-datatables">
                                        <table id="table_video" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_video">
                                                    <th style='width:8%'>No.</th>
                                                    <th style='width:50%'>Video</th>
                                                    <th class='disabled-sorting text-right'>Actions</th>
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
    var table_video;
    $(document).ready(function() {
        load_table_video();
    });


    function load_table_video(){
        table_video = $('#table_video').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_video')?>",
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
    }

   
    function reload_table_video(){
        table_video.ajax.reload(null, false);
    }


    function tambah_video(){
        $('#tambah_video').modal('show');
         $('#iframe_y').val(''); 
    }


    function simpan_video(){
        $.ajax({
                    url: "<?php echo site_url('Administrator/save_video')?>",
                    type: "POST",
                    data: {
                        "iframe" : $('#iframe_y').val(),
                    },
                    dataType: "JSON",
                    success: function(data) {
                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('video_ditambahkan')?>", "success");
                        reload_table_video();
                    }
                });
    }

    function delete_video(id){

        swal({
            title: '<?php echo $this->lang->line('hapus_video')?>',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: '<?php echo $this->lang->line('hapus')?>',
            buttonsStyling: false
        }).then(function() {

            $.ajax({
                url : "<?php echo site_url('Administrator/delete_video')?>",
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
                    reload_table_video();
                },
            });

            
        });


        
    }


</script>