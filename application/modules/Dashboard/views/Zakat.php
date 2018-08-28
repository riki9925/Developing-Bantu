
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Daftar zakat saya</h4>
                                    <div class="toolbar">

                                        <!-- <div class="row"> -->
                                            <!-- 
                                            </div> -->
                                            <div class="col-sm-6">
                                                <div class="row">
                                                    <div class="col-xs-3" style="border-right: solid 1px #4fc143">
                                                        <button data-toggle="modal" data-target="#kalkulator_zakat" id="btn_tambah_kegiatan" style="background-color: #4fc143; margin: 0px" class="  btn btn-round btn-green btn-fill btn-just-icon">
                                                            <i class="material-icons">add</i>
                                                        <div class="ripple-container"></div></button>
                                                    </div>

                                                    <h4 class="col-xs-3" style="text-align: right; margin-top: 0px"><i class="material-icons" style="color: #4fc143">filter_list</i><span id="filter_jenis_zakat"></span></h4>

                                                    <div class="col-xs-6">
                                                        <div class="form-group label-floating is-empty" style="margin: 0px">
                                                            <label class="control-label"></label>
                                                            <select id="jenis_zakat2" onchange="reload_table_zakat()" class="form-control">
                                                                <option selected="" value="Semua">Semua jenis</option>
                                                                <option>Profesi</option>
                                                                <option>Perdagangan</option>
                                                                <option>Emas</option>
                                                            </select>
                                                        <span class="material-input"></span></div>
                                                    </div>

                                                </div>
                                            </div>
                                        <!-- </div> -->
                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_zakat" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_zakat">
                                                    
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
    var table_zakat;
    var nilai_zakat_profesi;
    $(document).ready(function() {
        set_responsive_zakat();
        load_table_zakat();
    });

    function set_responsive_zakat(){

        if (layar == 'big') {
            $('#filter_jenis_zakat').text("Jenis");
            rows = "<th style='width:8%'>No.</th><th>Jenis zakat</th><th>Total zakat</th><th>Waktu</th>";
            $(rows).appendTo("#thead_zakat");
        }
        else{
            $('#filter_jenis_zakat').text("");
            rows = "<th>Jenis</th><th>Total</th><th>Waktu</th>";
            $(rows).appendTo("#thead_zakat");
        }
    }


    function load_table_zakat(){
        table_zakat = $('#table_zakat').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Dashboard/load_table_zakat')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar; data.jenis = $('#jenis_zakat2').val();
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

   

    function reload_table_zakat(){
        table_zakat.ajax.reload(null, false);
    }

    function payment_zakat(jenis){
        if (jenis == 'Profesi') {
            $("#jenis_zakat").text(jenis);
            $('#zakat').modal('show');
            $("#d_nilai_zakat").val(accounting.formatNumber(nilai_zakat_profesi));
        }
    }

    function zakat_sekarang(){
        
        var jenis = $("#jenis_zakat").text();
        $.ajax({
            url : "<?php echo site_url('Dashboard/zakat_sekarang')?>",
            type: "POST",
            data: { 
                "nilai_zakat" : $('#d_nilai_zakat').val().replace(/,/g , ''), "jenis" : jenis,
            },
            dataType: "JSON",
            success: function(data)
            {
                swal("Sukses", "Terimakasih telah berzakat di Yayasan Saling Bantu", "success")
                reload_table_zakat();
                $('#d_nilai_zakat').val("");
                $('#d_norek_zakat').val("");
                $('#d_koderek_zakat').val("");
                $('#kalkulator_zakat').modal('hide');

                //profesi
                $('#form_zakat_profesi')[0].reset();
                $('#penghasilan_bersih_profesi').text("Rp. 0");
                $('#nishab_profesi').text("Rp. 0");
                $('#nilai_zakat_profesi').text("Rp. 0");
                $('#btn_zakat_profesi').attr('disabled', true);
                
            },
        });
    }


    function hitung_penghasilan_zakat(){
        var penghasilan_profesi = parseFloat($("#penghasilan_profesi").val().replace(/,/g , ''));
        var bonus_profesi = parseFloat($("#bonus_profesi").val().replace(/,/g , ''));
        var biaya_profesi = parseFloat($("#biaya_profesi").val().replace(/,/g , ''));

        //change to cureency format
        if ($("#penghasilan_profesi").val() != "") {
            $("#penghasilan_profesi").val(accounting.formatNumber(penghasilan_profesi));
        }else{penghasilan_profesi = 0;}
        if ($("#bonus_profesi").val() != "") {
            $("#bonus_profesi").val(accounting.formatNumber(bonus_profesi));
        }else{bonus_profesi = 0;}
        if ($("#biaya_profesi").val() != "") {
            $("#biaya_profesi").val(accounting.formatNumber(biaya_profesi));
        }else{biaya_profesi = 0;}

        //hitung total penghasilan bersih
        var penghasilan_bersih = penghasilan_profesi + bonus_profesi - biaya_profesi;
        $("#penghasilan_bersih_profesi").text("Rp. "+accounting.formatNumber(penghasilan_bersih));


        //nihsab
        var beras_profesi = parseFloat($("#beras_profesi").val().replace(/,/g , ''));

        //change to cureency format
        if ($("#beras_profesi").val() != "") {
            $("#beras_profesi").val(accounting.formatNumber(beras_profesi));
        }else{beras_profesi = 0;}
        

        //hitung total penghasilan bersih
        var besar_nihsab = beras_profesi * 522;
        $("#nishab_profesi").text("Rp. "+accounting.formatNumber(besar_nihsab));

        //hasil perhitungan zakat
        if (besar_nihsab != "") {
            if (penghasilan_bersih!= "") {
                var selisih = besar_nihsab - penghasilan_bersih;
                if (selisih < 0) {
                    nilai_zakat_profesi = (penghasilan_bersih * 2.5)/100;
                    //alert("harus zakat")
                    $("#nilai_zakat_profesi").text("Rp. "+accounting.formatNumber(nilai_zakat_profesi));
                    $('#btn_zakat_profesi').attr('disabled', false);
                }else{
                    //alert("tdak perlu zakat")
                    $("#nilai_zakat_profesi").text("Rp. 0");
                    $('#btn_zakat_profesi').attr('disabled', true);
                }
            }
        }
    }



</script>