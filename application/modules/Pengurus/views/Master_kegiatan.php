
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
                                                    <select name="status_kegiatan_p" id="status_kegiatan_p" onchange="reload_table_kegiatan_p()" class="form-control">
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
                                        <table id="table_kegiatan_p" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_kegiatan_p">
                                                    
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
    var table_kegiatan_p;
    $(document).ready(function() {
        set_responsive_kegiatan_p();
        load_table();
    });

    function set_responsive_kegiatan_p(){
        
        $('#thead_kegiatan_p').empty();
        if (layar == 'big') {
            rows = "<th style='width:5%'>No.</th><th style='width:30%'><?php echo $this->lang->line('judul')?></th><th><?php echo $this->lang->line('target_hari')?></th><th><?php echo $this->lang->line('target_dana')?></th><th>User</th><th>Status</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_kegiatan_p");
        }
        else if (layar == 'small'){
            rows = "<th style='width:70%'><?php echo $this->lang->line('daftar_kegiatan')?></th><th class='disabled-sorting text-right'>Target</th>";
            $(rows).appendTo("#thead_kegiatan_p");
        }
    }


    function load_table(){
        table_kegiatan_p = $('#table_kegiatan_p').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Pengurus/load_table_kegiatan')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.status = $('#status_kegiatan_p').val();
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

   


    function detil_live(id){
    
        $.ajax({
            url : "<?php echo site_url('Pengurus/preview_kegiatan')?>",
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

                //daftar gambar
                $.ajax({
                    url : "<?php echo site_url('Pengurus/preview_kegiatan_gambar')?>",
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

            },
        });
    }




    function detil_kegiatan(id){
    
        $.ajax({
            url : "<?php echo site_url('Pengurus/preview_kegiatan')?>",
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

                $('#judul_modal_kegiatan').text("<?php echo $this->lang->line('detil_kegiatan')?>");
                $('#modal_verifikasi_kegiatan').modal('show');
            },
        });
    }



    function reload_table_kegiatan_p(){
        table_kegiatan_p.ajax.reload(null, false);
    }

</script>