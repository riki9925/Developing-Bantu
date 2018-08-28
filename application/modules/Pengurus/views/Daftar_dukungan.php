
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('daftar_dukungan')?></h4>
                                    <div class="toolbar">

                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-sm-3"> -->
                                                <button class="btn btn-success btn-round" onclick="get_content('Setting')">
                                                <i class="material-icons">arrow_back</i> <?php echo $this->lang->line('kembali')?>
                                                <div class="ripple-container"></div></button>

                                                <!-- <a href="#apps" onclick="get_content('Setting')"><i style="font-size: 30px; color: #4fc143" class="material-icons">arrow_back</i>Kembali</a> -->
                                            <!-- </div>
                                            <div class="col-sm-3"> -->
                                                <button onclick="tambah_dukungan()" class="btn btn-success btn-round" ><i class="material-icons">add</i> <?php echo $this->lang->line('tambah')?><div class="ripple-container"></div></button>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_dukungan" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_dukungan">
                                                    
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
    var table_dukungan;
    $(document).ready(function() {
        set_responsive_dukungan();
        load_table_dukungan();
    });

    function set_responsive_dukungan(){

        if (layar == 'big') {
            rows = "<th style='width:8%'>No.</th><th style='width:50%'><?php echo $this->lang->line('gambar')?></th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_dukungan");
        }
        else{
            rows = "<th style='width:60%'><?php echo $this->lang->line('gambar')?></th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_dukungan");
        }
    }


    function load_table_dukungan(){
        table_dukungan = $('#table_dukungan').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_dukungan')?>",
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

   
    function reload_table_dukungan(){
        table_dukungan.ajax.reload(null, false);
    }


    function tambah_dukungan(){
        $('#tambah_dukungan').modal('show');
        $('#btn_delete_dukungan').click();
    }

    function delete_dukungan(id){

        swal({
            title: '<?php echo $this->lang->line('hapus_logo_dukungan')?>',
            text: "",
            type: 'warning',
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger',
            confirmButtonText: '<?php echo $this->lang->line('hapus')?>',
            buttonsStyling: false
        }).then(function() {

            $.ajax({
                url : "<?php echo site_url('Administrator/delete_dukungan')?>",
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
                    reload_table_dukungan();
                },
            });

            
        });
        
    }



    function upload_dukungan() {

                var file_data = $('#wizard-picture_dukungan').prop('files')[0];
                    
                    var form_data = new FormData();
                    form_data.append('wizard-picture_dukungan', file_data);
                    $.ajax({
                        url: "<?php echo site_url('Administrator/upload_img_dukungan')?>", 
                        dataType: 'text', 
                        cache: false,
                        contentType: false,
                        processData: false,
                        data: form_data,
                        type: 'post',
                        success: function (response) {
                            swal("Sukses", "Icon dukungan berhasil ditambahkan", "success");
                            reload_table_dukungan();
                        },
                        error: function (response) {
                            swal("Informasi", response)
                        }
                });
    }

</script>