
                <div class="container-fluid">
                          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">assignment</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('kategori_kegiatan')?></h4>
                                    <div class="toolbar">

                                        <button class="btn btn-success btn-round" onclick="get_content('Setting')">
                                        <i class="material-icons">add</i> <?php echo $this->lang->line('kembali')?>
                                        <div class="ripple-container"></div></button>

                                        <button class="btn btn-success btn-round" data-toggle="modal" data-target="#tambah_kategori">
                                        <i class="material-icons">add</i> <?php echo $this->lang->line('tambah_kategori')?>
                                        <div class="ripple-container"></div></button>

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_kategori" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_kategori">
                                                    
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
    var table_kategori;
    $(document).ready(function() {
        set_responsive_kategori();
        load_table();
    });

    function set_responsive_kategori(){

        if (layar == 'big') {
            rows = "<th style='width:8%'>No.</th><th><?php echo $this->lang->line('nama')?></th><th>Status</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_kategori");
        }
        else{
            rows = "<th style='width:8%'>No.</th><th><?php echo $this->lang->line('nama')?></th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_kategori");
        }
    }


    function load_table(){
        table_kategori = $('#table_kategori').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_kategori')?>",
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
        table_kategori.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table_kategori.row($tr).data();
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


        // Delete a record
        table_kategori.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            var data = table_kategori.row($tr).data();
            var id = data[0];
            var nama = data[1];
            swal({
                    title: 'Konfirmasi',
                    text: '<?php echo $this->lang->line('hapus_kategori')?> ?',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: '<?php echo $this->lang->line('hapus')?>',
                    cancelButtonText: '<?php echo $this->lang->line('batal')?>',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                })
            .then(function() {

                $.ajax({
                    url : "<?php echo site_url('Administrator/delete_kategori')?>",
                    type: "POST",
                    data: { 
                      "id" : id
                    },
                    dataType: "html",
                    success: function(data)
                    {
                        reload_table();
                    },
                    
                });     
                
                swal({
                    title: '<?php echo $this->lang->line('terhapus')?>',
                    text: '',
                    type: 'success',
                    confirmButtonClass: "btn btn-success",
                    buttonsStyling: false
                    })
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: '<?php echo $this->lang->line('terhapus')?>',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })

            e.preventDefault();
        });
    }

   
        


    function update_kategori(){
        $.ajax({
            url : "<?php echo site_url('Administrator/update_kategori')?>",
            type: "POST",
            data: { 
                "id" : $('#id_kategori').val(), "nama" : $('#nama_kategori').val(), "status" : $('#status_kategori').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                reload_table();
            },
        });
    }

    function reload_table(){
        table_kategori.ajax.reload(null, false);
    }


    $("#btn_tambah_kategori").click(function(){
        $.ajax({
            url : "<?php echo site_url('Administrator/tambah_kategori')?>",
            type: "POST",
            data: { 
                "nama" : $('#tambah_nama_kategori').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                swal("Sukses", "", "success");
                reload_table();
            },
        });
    })

</script>