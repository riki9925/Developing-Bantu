
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Daftar donasi saya</h4>
                                    <div class="toolbar">

                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-sm-3"> -->
                                                <!-- <button class="btn btn-success btn-round" onclick="get_content('Setting')">
                                                <i class="material-icons">arrow_back</i> Kembali
                                                <div class="ripple-container"></div></button> -->

                                                <!-- <a href="#apps" onclick="get_content('Setting')"><i style="font-size: 30px; color: #4fc143" class="material-icons">arrow_back</i>Kembali</a> -->
                                            <!-- </div>
                                            <div class="col-sm-3"> -->
                                                <!-- <button disabled="" class="btn btn-success btn-round" data-toggle="modal" data-target="#tambah_slider_gambar"><i class="material-icons">add</i> Tambah gambar<div class="ripple-container"></div></button> -->
                                            <!-- </div> -->
                                        <!-- </div> -->
                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_donasi" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_donasi">
                                                    
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
    var table_donasi;
    $(document).ready(function() {
        set_responsive_donasi();
        
    });

    function set_responsive_donasi(){

        if (layar == 'big') {
            rows = "<th>No.</th><th>Judul</th><th>Nilai zakat</th><th>Waktu</th>";
            //rows = "<th style='width:8%'>No.</th><th>Nama kegiatan</th><th>Total donasi</th><th>Waktu</th>";
            $(rows).appendTo("#thead_donasi");
        }
        else{
            rows = "<th style='width:60%'>Nama kegiatan</th><th>Total donasi</th><th>Waktu</th>";
            $(rows).appendTo("#thead_donasi");
        }
        load_table_donasi();
    }


    function load_table_donasi(){
        table_donasi = $('#table_donasi').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Dashboard/load_table_donasi')?>",
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
        table_donasi.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table_donasi.row($tr).data();
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

   

    function reload_table_donasi(){
        table_donasi.ajax.reload(null, false);
    }



</script>