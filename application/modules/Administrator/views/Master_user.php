
                <div class="container-fluid">
                          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">group</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Master user</h4>
                                    <div class="toolbar">

                                        <div class="col-md-6">
                                            
                                        
                                            <div class="row">
                                                <label class="col-sm-4 label-on-left"><?php echo $this->lang->line('status_validasi')?></label>
                                                <div class="col-sm-6">
                                                    <div class="form-group label-floating is-empty" style="margin: 0px">
                                                        <label class="control-label"></label>
                                                        <select id="status_validasi" onchange="reload_table_user()" class="form-control">
                                                            <option selected="" value="Semua"><?php echo $this->lang->line('semua_status')?></option>
                                                            <option value="PENDING">Belum pengajuan </option>
                                                            <option value="PENGAJUAN">Pengajuan validasi </option>
                                                            <option value="VALID">Data valid </option>
                                                            <option value="INVALID">Data tidak valid</option>
                                                        </select>
                                                    <span class="material-input"></span></div>
                                                </div>


                                            </div>
                                        </div>

                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_user" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_user">
                                                    
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
    var table_user;
    $(document).ready(function() {
        set_responsive_user();
        load_table();
    });

    function set_responsive_user(){
        
        $('#thead_user').empty();
        if (layar == 'big') {
            rows = "<th style='width:5%'>No.</th><th style='width:20%'><?php echo $this->lang->line('nama')?></th><th><?php echo $this->lang->line('email')?></th><th><?php echo $this->lang->line('lokasi')?></th><th>HP</th><th><?php echo $this->lang->line('status_user')?></th><th><?php echo $this->lang->line('status_validasi')?></th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_user");
        }
        else if (layar == 'small'){
            rows = "<th style='width:70%'><?php echo $this->lang->line('daftar_user')?></th style='width:20%'><th>Status</th><th class='disabled-sorting text-right'>Action</th>";
            $(rows).appendTo("#thead_user");
        }
    }


    function load_table(){
        table_user = $('#table_user').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_user')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.status = 'Semua';
                        data.status_val = $('#status_validasi').val();
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

   

    function reload_table_user(){
        table_user.ajax.reload(null, false);
    }



    
    function detil_data_user(id){
        
        $.ajax({
                url : "<?php echo site_url('Administrator/load_detil_user')?>",
                type: "POST",
                data: { 
                  "id" : id
                },
                dataType: "JSON",
                success: function(data)
                {
                    if (data.st_validasi == 'PENGAJUAN') {
                        
                        $('#btn_invalid').show(); $('#btn_valid').show(); 
                    }else{
                        $('#btn_invalid').hide(); $('#btn_valid').hide(); 
                    }
                    $('#validasi_id_user').val(data.id);
                    $('#nama_lengkap').val(data.nama);
                    $('#email').val(data.email);
                    $('#alamat').val(data.alamat);
                    $('#hp').val(data.hp);
                    $('#jenis_ki').val(data.jenis_ki);
                    $('#provinsi').val(data.nama_provinsi);
                    $('#kota').val(data.nama_kota);

                    if (data.img != 'assets/img/foto/user.png') {
                        $('#foto_user_exist2').attr('src', '<?php echo base_url()?>/assets/img/foto/'+data.img);
                        $('#foto_user_exist').attr('src', '<?php echo base_url()?>/assets/img/foto/'+data.img);
                    }
                    else{
                        $('#foto_user_exist').attr('src', '<?php echo base_url()?>/assets/img/upload_file.gif');
                        $('#foto_user_exist2').attr('src', '<?php echo base_url()?>/assets/img/foto/user.png');
                    }


                    $('#foto_ki').attr('src', '<?php echo base_url()?>/assets/img/kartu_identitas/'+data.img_ki);
                    

                    $('#bio').val(data.biography);
                    $('#modal_detil_user').modal('show');
                },
                
            });
    }


    function validasi_data_diri(st){
        $.ajax({
            url : "<?php echo site_url('Administrator/validasi_data_diri')?>",
            type: "POST",
            data: { 
                "st" : st, id_user : $('#validasi_id_user').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                reload_table_user();
                swal("Sukses", "<?php echo $this->lang->line('data_user_telah_divalidasi')?>", "success");
            },
        });
    }


</script>