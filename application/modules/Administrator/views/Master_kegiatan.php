
                <div class="container-fluid">
                          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">verified_user</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('master_kegiatan')?></h4>
                                    <div class="toolbar">

                                        <div class="col-md-6">
                                            
                                        
                                        <div class="row">
                                            <label class="col-md-4 label-on-left"><?php echo $this->lang->line('status_kegiatan')?></label>
                                            <div class="col-md-8">
                                                <div class="form-group label-floating is-empty" style="margin: 0px">
                                                    <label class="control-label"></label>
                                                    <select name="status_kegiatan" id="status_kegiatan" onchange="reload_table_kegiatan()" class="form-control">
                                                        <option selected="" value="Semua"><?php echo $this->lang->line('semua_status')?></option>
                                                        <option >DRAFT</option>
                                                        <option >PENGAJUAN</option>
                                                        <option >LIVE</option>
                                                        <option >BLOKIR</option>
                                                        <option >SELESAI</option>
                                                    </select>
                                                <span class="material-input"></span></div>
                                            </div>
                                        </div>
                                        </div>

                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_kegiatan" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_kegiatan">
                                                    
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
    var table_kegiatan;
    $(document).ready(function() {
        set_responsive_kegiatan();
        load_table();

    });

    function set_responsive_kegiatan(){
        
        $('#thead_kegiatan').empty();
        if (layar == 'big') {
            rows = "<th style='width:5%'>No.</th><th style='width:30%'><?php echo $this->lang->line('judul')?></th><th><?php echo $this->lang->line('target_hari')?></th><th><?php echo $this->lang->line('target_dana')?></th><th>User</th><th>Status</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_kegiatan");
        }
        else if (layar == 'small'){
            rows = "<th style='width:70%'>Kegiatan</th><th class='disabled-sorting text-right'>Target</th>";
            $(rows).appendTo("#thead_kegiatan");
        }
    }


    function load_table(){
        table_kegiatan = $('#table_kegiatan').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_kegiatan')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.status = $('#status_kegiatan').val();
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
        table_kegiatan.on('click', '.edit', function() {
            $tr = $(this).closest('tr');
            var data = table_kegiatan.row($tr).data();
            $('#modal_edit_kategori').modal('show');
            $('#id_kategori').val(data[0]);
            $('#nama_kategori').val(data[1]);
            $('#status_kategori').empty();
            if (data[2] == 'ACTIVE') {
                rows = "<option selected=''>ACTIVE </option><option>NONACTIVE </option>";
                $(rows).appendTo("#status_kategori");
            }
            else{
                rows = "<option>ACTIVE </option><option selected=''>NONACTIVE </option>";
                $(rows).appendTo("#status_kategori");
            }
        });


        // Delete a record
        table_kegiatan.on('click', '.remove', function(e) {
            $tr = $(this).closest('tr');
            var data = table_kegiatan.row($tr).data();
            var id = data[0];
            var nama = data[1];
            swal({
                    title: 'Konfirmasi',
                    text: 'Anda akan mengahpus kategori: '+ nama,
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Hapus',
                    cancelButtonText: 'Batal',
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
                        reload_table_kegiatan();
                    },
                    
                });     
                
                swal({
                    title: 'Terhapus',
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
                      title: 'Dibatalkan.',
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

   
    function verifikasi_kegiatan(id){
    
        $.ajax({
            url : "<?php echo site_url('Administrator/preview_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#d_id_kegiatan').text(data.id_kegiatan);
                $('#d_judul_kegiatan').text(data.judul);

                $('#d_kategori_kegiatan').empty();
                rows="<p class='category' style='text-transform: uppercase; color:#4fc143'><i class='material-icons'>sort</i>"+data.nama_kategori+"</p>";
                $(rows).appendTo("#d_kategori_kegiatan");

                $('#d_tanggal_kegiatan').empty();
                rows1="<p class='category' style='text-transform: uppercase; color: #F9690E'><i class='material-icons'>date_range</i>"+data.date+"</p>";
                $(rows1).appendTo("#d_tanggal_kegiatan");
                
                $('#d_img_kegiatan').attr('src', '<?php echo base_url()?>assets/img/content/'+data.gambar_utama);
                $('#d_deskripsi_kegiatan').text(data.deskripsi);
                $('#d_target_dana_kegiatan').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_target_waktu_kegiatan').text(data.target_hari+" <?php echo $this->lang->line('hari')?>");
                $('#d_foto_user').attr('src', '<?php echo base_url()?>assets/img/foto/'+data.img);
                $('#d_nama_user').text(data.nama);

                $('#judul_modal_kegiatan').text("<?php echo $this->lang->line('verifikasi_kegiatan_baru')?>");
                $('#btn_setujui_kegiatan').show();
                $('#btn_block_kegiatan').show();

                //daftar gambar
                $.ajax({
                    url : "<?php echo site_url('Administrator/preview_kegiatan_gambar')?>",
                    type: "POST",
                    data: { 
                        "id" : id
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#daftar_gambar_kegiatan').empty();
                        $.each(data, function(k, v) {
                            var rows = "<div class='col-md-3 col-xs-4' style='cursor:pointer;'><img onclick=preview_image('"+v.img+"') class='img-responsive' src='http://salingbantu.or.id/assets/img/content/"+v.img+"' style='width: 100%'></div>"
                            $(rows).appendTo("#daftar_gambar_kegiatan");
                        });

                        
                    },
                });

                $('#modal_verifikasi_kegiatan').modal('show');
            },
        });
    }


    function preview_image(id){
        $('#image_list').empty();
        
        var rows = "<img class='img-responsive' src='<?php echo base_url()?>assets/img/content/"+id+"' style='width: 100%; border-radius:5px;'>";
        $(rows).appendTo("#image_list");
        
        $('#preview_image').modal('show');
    }

    function detil_block(id){
    
        $.ajax({
            url : "<?php echo site_url('Administrator/preview_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#d_id_kegiatan').text(data.id_kegiatan);
                $('#d_judul_kegiatan').text(data.judul);
                $('#d_kategori_kegiatan').text(data.nama_kategori);
                $('#d_tanggal_kegiatan').text(data.date);
                $('#d_img_kegiatan').attr('src', '<?php echo base_url()?>assets/img/content/'+data.gambar_utama);
                $('#d_deskripsi_kegiatan').text(data.deskripsi);
                $('#d_target_dana_kegiatan').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_target_waktu_kegiatan').text(data.target_hari+" <?php echo $this->lang->line('hari')?>");
                $('#d_foto_user').attr('src', '<?php echo base_url()?>assets/img/foto/'+data.img);
                $('#d_nama_user').text(data.nama);

                $('#judul_modal_kegiatan').text("<?php echo $this->lang->line('detil_kegiatan')?>");
                $('#btn_setujui_kegiatan').show();
                $('#btn_block_kegiatan').hide();


                //daftar gambar
                $.ajax({
                    url : "<?php echo site_url('Administrator/preview_kegiatan_gambar')?>",
                    type: "POST",
                    data: { 
                        "id" : id
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#daftar_gambar_kegiatan').empty();
                        $.each(data, function(k, v) {
                            var rows = "<div class='col-md-3 col-xs-4' style='cursor:pointer;'><img onclick=preview_image('"+v.img+"') class='img-responsive' src='http://salingbantu.or.id/assets/img/content/"+v.img+"' style='width: 100%'></div>"
                            $(rows).appendTo("#daftar_gambar_kegiatan");
                        });

                        
                    },
                });

                
                $('#modal_verifikasi_kegiatan').modal('show');

                

            },
        });
    }


    function detil_live(id){
    
        $.ajax({
            url : "<?php echo site_url('Administrator/preview_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#d_id_kegiatan').text(data.id_kegiatan);
                $('#d_judul_kegiatan').text(data.judul);
                $('#d_kategori_kegiatan').text(data.nama_kategori);
                $('#d_tanggal_kegiatan').text(data.date);
                $('#d_img_kegiatan').attr('src', '<?php echo base_url()?>assets/img/content/'+data.gambar_utama);
                $('#d_deskripsi_kegiatan').text(data.deskripsi);
                $('#d_target_dana_kegiatan').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_target_waktu_kegiatan').text(data.target_hari+" <?php echo $this->lang->line('hari')?>");
                $('#d_foto_user').attr('src', '<?php echo base_url()?>assets/img/foto/'+data.img);
                $('#d_nama_user').text(data.nama);

                $('#judul_modal_kegiatan').text("<?php echo $this->lang->line('detil_kegiatan')?>");
                $('#btn_setujui_kegiatan').hide();
                $('#btn_block_kegiatan').show();
                $('#modal_verifikasi_kegiatan').modal('show');

                

            },
        });
    }


    $("#btn_block_kegiatan").click(function(){
        $.ajax({
            url : "<?php echo site_url('Administrator/block_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : $('#d_id_kegiatan').text()
            },
            dataType: "JSON",
            success: function(data)
            {
                swal("Sukses", "Kegiatan telah diblock", "success");
                reload_table_kegiatan();
            },
        });
    })


    $("#btn_setujui_kegiatan").click(function(){
        $.ajax({
            url : "<?php echo site_url('Administrator/setujui_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : $('#d_id_kegiatan').text()
            },
            dataType: "JSON",
            success: function(data)
            {
                swal("Sukses", "Kegiatan telah disetujui", "success");
                reload_table_kegiatan();
            },
        });
    })



    function detil_kegiatan(id){
    
        $.ajax({
            url : "<?php echo site_url('Administrator/preview_kegiatan')?>",
            type: "POST",
            data: { 
                "id" : id
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#d_id_kegiatan').text(data.id_kegiatan);
                $('#d_judul_kegiatan').text(data.judul);
                $('#d_kategori_kegiatan').text(data.nama_kategori);
                $('#d_tanggal_kegiatan').text(data.date);
                $('#d_img_kegiatan').attr('src', '<?php echo base_url()?>assets/img/content/'+data.gambar_utama);
                $('#d_deskripsi_kegiatan').text(data.deskripsi);
                $('#d_target_dana_kegiatan').text("Rp. "+accounting.formatNumber(data.target_dana));
                $('#d_target_waktu_kegiatan').text(data.target_hari+" <?php echo $this->lang->line('hari')?>");
                $('#d_foto_user').attr('src', '<?php echo base_url()?>assets/img/foto/'+data.img);
                $('#d_nama_user').text(data.nama);


                if (data.status == 'DRAFT') {
                    $('#btn_setujui_kegiatan').show();
                    $('#btn_block_kegiatan').hide();
                }else{
                    $('#btn_setujui_kegiatan').hide();
                    $('#btn_block_kegiatan').hide();
                }

                $('#judul_modal_kegiatan').text("<?php echo $this->lang->line('detil_kegiatan')?>");
                $('#modal_verifikasi_kegiatan').modal('show');
            },
        });
    }


    function update_kegiatan(){
        $.ajax({
            url : "<?php echo site_url('Administrator/update_kategori')?>",
            type: "POST",
            data: { 
                "id" : $('#id_kategori').val(), "nama" : $('#nama_kategori').val(), "status" : $('#status_kategori').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                reload_table_kegiatan();
            },
        });
    }

    function reload_table_kegiatan(){
        table_kegiatan.ajax.reload(null, false);
    }

</script>