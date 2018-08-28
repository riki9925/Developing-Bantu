
                <div class="container-fluid">
                          
                    <div class="row">

                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="green">
                                    <i class="material-icons">settings</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title">Daftar infaq saya</h4>
                                    <div class="toolbar">

                                        <!-- <div class="row"> -->
                                            <!-- <div class="col-sm-3"> -->
                                                <!-- <button class="btn btn-success btn-round" onclick="get_content('Setting')">
                                                <i class="material-icons">arrow_back</i> Kembali
                                                <div class="ripple-container"></div></button> -->

                                                <!-- <a href="#apps" onclick="get_content('Setting')"><i style="font-size: 30px; color: #4fc143" class="material-icons">arrow_back</i>Kembali</a> -->
                                            <!-- </div>
                                            <div class="col-sm-3"> -->
                                                <button class="btn btn-success btn-round" data-toggle="modal" data-target="#infaq"><i class="material-icons">add</i> Infaq<div class="ripple-container"></div></button>
                                            <!-- </div> -->
                                        <!-- </div> -->
                                        

                                    </div>
                                    <div class="material-datatables">
                                        <table id="table_infaq" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                            <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                <tr id="thead_infaq">
                                                    
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
    var table_infaq;
    $(document).ready(function() {
        set_responsive_infaq();
        load_table_infaq();
    });

    function set_responsive_infaq(){

        if (layar == 'big') {
            rows = "<th style='width:8%'>No.</th><th>Total infaq</th><th>Waktu</th>";
            $(rows).appendTo("#thead_infaq");
        }
        else{
            rows = "<th style='width:8%'>No.</th><th>Total infaq</th><th>Waktu</th>";
            $(rows).appendTo("#thead_infaq");
        }
    }


    function load_table_infaq(){
        table_infaq = $('#table_infaq').DataTable({ 
            "processing": true, //Feature control the processing indicator.
            "serverSide": true, //Feature control DataTables' server-side processing mode.
            // "order": [], //Initial no order.
             "info":     false,
            "bLengthChange": false,
            // "scrollX": true,
            // "searching": true,
                                
            // Load data for the table's content from an Ajax source
                "ajax": {
                    "url": "<?php echo site_url('Dashboard/load_table_infaq')?>",
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

   

    function reload_table_infaq(){
        table_infaq.ajax.reload(null, false);
    }


    function infaq_sekarang(){
        $.ajax({
            url : "<?php echo site_url('Dashboard/infaq_sekarang')?>",
            type: "POST",
            data: { 
                "nilai_infaq" : $('#d_total_infaq').text().replace(/,/g , '')
            },
            dataType: "JSON",
            success: function(data)
            {
                swal("Sukses", "Terimakasih telah berinfaq di Yayasan Saling Bantu", "success")
                reload_table_infaq();
                $('#d_nilai_infaq').val("");
                $('#d_norek_infaq').val("");
                $('#d_koderek_infaq').val("");
            },
        });
    }


    function get_total_infaq(){
        var input_infaq = $('#d_input_infaq').val().replace(/,/g , '');
        var total = input_infaq - 5000;
        $('#d_input_infaq').val(accounting.formatNumber(input_infaq))
        $('#d_total_infaq').text(accounting.formatNumber(total));

        
    }

</script>