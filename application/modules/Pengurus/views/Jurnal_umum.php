
                <div class="container-fluid">
                          
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">


                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">playlist_add</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title"><?php echo $this->lang->line('jurnal_umum')?></h4>
                                    <div class="toolbar">
                                        <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-2" style="border-right: solid 1px #4fc143">
                                                        <button onclick="tambah_jurnal()" id="btn_tambah_ju" style="background-color: #4fc143; margin: 0px" class="  btn btn-round btn-green btn-fill btn-just-icon">
                                                            <i class="material-icons">add</i>
                                                        <div class="ripple-container"></div></button>
                                                    </div>

                                                    <h4 class="col-xs-3" style="text-align: right; margin-top: 0px"><i class="material-icons" style="color: #4fc143">filter_list</i><span id="filter_status_jurnal">Status</span></h4>

                                                    <div class="col-xs-4">
                                                        <div class="form-group label-floating is-empty" style="margin: 0px">
                                                            <label class="control-label"></label>
                                                            <select id="status_jurnal" onchange="reload_table_jurnal_umum()" class="form-control">
                                                                <option selected="" value="Semua"><?php echo $this->lang->line('semua')?></option>
                                                                <option value="DRAFT">Draft</option>
                                                                <option value="POSTED">Terposting</option>
                                                                <option value="REVERSE">Dibatalkan</option>
                                                            </select>
                                                        <span class="material-input"></span></div>
                                                    </div>

                                                </div>
                                            </div>
                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_ju" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_ju">
                                                    
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
    var table_ju;
    var table_draft_jurnal;
    var table_cari_akun;

    $(document).ready(function() {
        set_responsive_ju();
        load_table_draft_jurnal();
        load_table_jurnal_umum();
    });


    function load_table_jurnal_umum(){
        table_ju = $('#table_ju').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
             "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            //"pageLength": 5,
            "paging": true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_jurnal_umum')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.st = $('#status_jurnal').val();
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

    function reload_table_jurnal_umum(){
        table_ju.ajax.reload(null, false);
    }





    function set_responsive_ju(){

        if (layar == 'big') {
            rows = "<th style='width:8%'>No.</th><th><?php echo $this->lang->line('tanggal')?></th><th>Keterangan</th><th>Debet</th><th>Kredit</th><th>Status</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_ju");
        }
        else{
            rows = "<th style='width:8%'>No.</th><th>Nama</th><th class='disabled-sorting text-right'>Actions</th>";
            $(rows).appendTo("#thead_ju");
        }
    }


    






    function load_table_draft_jurnal(){
        table_draft_jurnal = $('#table_draft_jurnal').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
             "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            //"pageLength": 5,
            "paging": true,
            "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Administrator/load_table_draft_jurnal')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.ntrans = $('#ntrans').val();
                        data.halaman = 'draft';
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

    function reload_table_draft_jurnal(){
        table_draft_jurnal.ajax.reload(null, false);
    }





    function pilih_akun(acc){
        $('#input_acc').val(acc);
    }

    function tambah_jurnal(){
        $('#jenis_transaksi').attr('disabled', false);
        $('#input_acc').attr('disabled', false);
        $('#input_nominal_transaksi').attr('disabled', false);
        $('#btn_tambah_draft').attr('disabled', false);
        $('#keterangan_transaksi').attr('disabled', false);
        $('#btn_posting').show();
        $('#btn_reverse').hide();

        $('#detil_input').show();
        $('#detil_reverse').hide();
        
    	$('#modal_tambah_ju').modal('show');
    	$('#ntrans').val("");
        $('#total_debet').text("0");
        $('#total_kredit').text("0");
        $('#selisih').text("0");
        $('#btn_posting').attr('disabled', true);
    	$('#input_acc').val("");
    	$('#input_nominal_transaksi').val("");
    	reload_table_draft_jurnal();
    }

    function tambah_draft_jurnal(){
        $.ajax({
            url : "<?php echo site_url('Administrator/tambah_draft_jurnal')?>",
            type: "POST",
            data: { 
                "jenis" : $('#jenis_transaksi').val(), "acc" : $('#input_acc').val(), "nominal" : $('#input_nominal_transaksi').val().replace(/,/g , ''), "ntrans" : $('#ntrans').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                $('#ntrans').val(data.ntrans);
                $('#input_acc').val("");
    			$('#input_nominal_transaksi').val("");
                //swal("Sukses", "Draft jurnal baru ditambahkan", "success");
                reload_table_draft_jurnal();
                $('#total_debet').text(accounting.formatNumber(data.debet));
    			$('#total_kredit').text(accounting.formatNumber(data.kredit));
                var selisih = data.debet - data.kredit;
                $('#selisih').text(accounting.formatNumber(selisih));
                if (selisih == 0) {
                    $('#btn_posting').attr('disabled', false);
                }else{
                    $('#btn_posting').attr('disabled', true);
                }
            },
        });
        
    }


    function posted_jurnal(ntrans){
        $('#ntrans').val(ntrans);
        reload_table_draft_jurnal();
        $('#detil_input').hide();
        $('#detil_reverse').show();
        

        $('#modal_tambah_ju').modal('show');
        $.ajax({
            url : "<?php echo site_url('Administrator/detil_jurnal')?>",
            type: "POST",
            data: { 
                "ntrans" : ntrans
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#total_debet').text(accounting.formatNumber(data.debet));
                $('#total_kredit').text(accounting.formatNumber(data.kredit));
                var selisih = data.debet - data.kredit;
                $('#selisih').text(accounting.formatNumber(selisih));
                if (selisih == 0) {
                    $('#btn_posting').attr('disabled', false);
                }else{
                    $('#btn_posting').attr('disabled', true);
                }
                $('#jenis_transaksi').attr('disabled', true);
                $('#input_acc').attr('disabled', true);
                $('#input_nominal_transaksi').attr('disabled', true);
                $('#btn_tambah_draft').attr('disabled', true);
                $('#keterangan_transaksi').attr('disabled', true);
                $('#keterangan_transaksi').val(data.keterangan);
                $('#btn_posting').hide();
                $('#btn_reverse').show();
                $('#ntrans').val(ntrans);
            },
        });
    }


    function draft_jurnal(ntrans){
        $('#ntrans').val(ntrans);
        reload_table_draft_jurnal();
        $('#detil_input').show();
        $('#detil_reverse').hide();
        

        $('#modal_tambah_ju').modal('show');
        $.ajax({
            url : "<?php echo site_url('Administrator/detil_jurnal')?>",
            type: "POST",
            data: { 
                "ntrans" : ntrans
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#total_debet').text(accounting.formatNumber(data.debet));
                $('#total_kredit').text(accounting.formatNumber(data.kredit));
                var selisih = data.debet - data.kredit;
                $('#selisih').text(accounting.formatNumber(selisih));
                if (selisih == 0) {
                    $('#btn_posting').attr('disabled', false);
                }else{
                    $('#btn_posting').attr('disabled', true);
                }

                $('#jenis_transaksi').attr('disabled', false);
                $('#input_acc').attr('disabled', false);
                $('#input_nominal_transaksi').attr('disabled', false);
                $('#btn_tambah_draft').attr('disabled', false);
                $('#keterangan_transaksi').attr('disabled', false);

                $('#btn_posting').show();
                $('#btn_reverse').hide();
            },
        });
    }


    function info_jurnal(ntrans){
        $('#ntrans').val(ntrans);
        reload_table_draft_jurnal();

        $('#detil_input').show();
        $('#detil_reverse').show();
        

        $('#modal_tambah_ju').modal('show');
        $.ajax({
            url : "<?php echo site_url('Administrator/detil_jurnal')?>",
            type: "POST",
            data: { 
                "ntrans" : ntrans
            },
            dataType: "JSON",
            success: function(data)
            {

                $('#total_debet').text(accounting.formatNumber(data.debet));
                $('#total_kredit').text(accounting.formatNumber(data.kredit));
                var selisih = data.debet - data.kredit;
                $('#selisih').text(accounting.formatNumber(selisih));
                if (selisih == 0) {
                    $('#btn_posting').attr('disabled', false);
                }else{
                    $('#btn_posting').attr('disabled', true);
                }
                $('#jenis_transaksi').attr('disabled', true);
                $('#input_acc').attr('disabled', true);
                $('#input_nominal_transaksi').attr('disabled', true);
                $('#btn_tambah_draft').attr('disabled', true);
                $('#keterangan_transaksi').attr('disabled', true);
                $('#keterangan_transaksi').val(data.keterangan);
                $('#keterangan_reverse').attr('disabled', true);
                $('#keterangan_reverse').val(data.keterangan_reverse);
                $('#btn_posting').hide();
                $('#btn_reverse').hide();
                $('#ntrans').val(ntrans);
            },
        });
    }



    function hapus_jurnal(ntrans){
            swal({
                    title: '<?php echo $this->lang->line('hapus_draft_jurnal')?>?',
                    text: '',
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
                    url : "<?php echo site_url('Administrator/hapus_jurnal')?>",
                    type: "POST",
                    data: { 
                        "ntrans" : ntrans
                    },
                    dataType: "JSON",
                    success: function(data)
                    {

                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('draft_jurnal_terhapus')?>", "success");
                        reload_table_jurnal_umum();
                    },
                });    
                
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: '<?php echo $this->lang->line('dibatalkan')?>.',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    }


    function hapus_draft_jurnal(ide){
            swal({
                    title: '<?php echo $this->lang->line('hapus_draft_jurnal')?>?',
                    text: '',
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
                    url : "<?php echo site_url('Administrator/hapus_draft_jurnal')?>",
                    type: "POST",
                    data: { 
                        "ide" : ide, "ntrans" : $('#ntrans').val(),
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#total_debet').text(accounting.formatNumber(data.debet));
                        $('#total_kredit').text(accounting.formatNumber(data.kredit));
                        var selisih = data.debet - data.kredit;
                        $('#selisih').text(accounting.formatNumber(selisih));
                        if (selisih == 0) {
                            $('#btn_posting').attr('disabled', false);
                        }else{
                            $('#btn_posting').attr('disabled', true);
                        }
                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('draft_jurnal_terhapus')?>", "success");
                        reload_table_draft_jurnal();
                    },
                });    
                
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: '<?php echo $this->lang->line('dibatalkan')?>.',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    }



    function reverse_jurnal(ntrans){
            swal({
                    title: 'Reverse jurnal?',
                    text: '',
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Reverse',
                    cancelButtonText: '<?php echo $this->lang->line('batal')?>',
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonsStyling: false
                })
            .then(function() {

                $.ajax({
                    url : "<?php echo site_url('Administrator/reverse_jurnal')?>",
                    type: "POST",
                    data: { 
                        "ntrans" : $('#ntrans').val(), "keterangan" : $('#keterangan_reverse').val()
                    },
                    dataType: "JSON",
                    success: function(data)
                    {
                        $('#modal_tambah_ju').modal('hide');
                        swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('jurnal_tereverse')?>", "success");
                        reload_table_jurnal_umum();
                    },
                });    
                
                }, 
            function(dismiss) {
                  // dismiss can be 'overlay', 'cancel', 'close', 'esc', 'timer'
                  if (dismiss === 'cancel') {
                    swal({
                      title: '<?php echo $this->lang->line('dibatalkan')?>.',
                      text: '',
                      type: 'error',
                      confirmButtonClass: "btn btn-info",
                      buttonsStyling: false
                    })
                  }
            })
    }


    function posting_jurnal(){
        $.ajax({
            url : "<?php echo site_url('Administrator/posting_jurnal')?>",
            type: "POST",
            data: { 
                "ntrans" : $('#ntrans').val(), "keterangan" : $('#keterangan_transaksi').val()
            },
            dataType: "JSON",
            success: function(data)
            {
                
                swal("<?php echo $this->lang->line('sukses')?>", "<?php echo $this->lang->line('draft_jurnal_ditambahkan')?>", "success");
                reload_table_jurnal_umum();
                
            },
        });
    }


</script>