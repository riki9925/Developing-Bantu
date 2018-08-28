
                <div class="container-fluid" >
                
                    <div class="col-sm-8 col-sm-offset-2">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">add</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title" id="title_jaringan_g"><?php echo $this->lang->line('detil_jaringan_global')?></h4>
                                    
                                    <form nctype="multipart/form-data" accept-charset="utf-8" class="form form-horizontal" method="" action="" id="form_jaringan_g">

                                        <div  class="fileinput fileinput-new" style="width: 100%; margin-top: 15px" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                        <img id="img_exist_jaringan_g" src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('judul')?></div>
                                            <div class="col-md-8">
                                                <input disabled="" maxlength="30" type="text" class="form-control" id="judul_jaringan_g" name="judul_jaringan_g">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('kategori')?></div>
                                            <div class="col-md-8">
                                                <select disabled="" name="kategori_jaringan_g" id="kategori_jaringan_g" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('provinsi')?></div>
                                            <div class="col-md-8">
                                                <select disabled="" onchange="get_kota_jaringan_g()" name="provinsi_jaringan_g" id="provinsi_jaringan_g" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('kota')?></div>
                                            <div class="col-md-8">
                                                <select disabled="" name="kota_jaringan_g" id="kota_jaringan_g" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('target_dana')?> (Rp.)</div>
                                            <div class="col-md-8">
                                                <input disabled="" id="target_dana_jaringan_g" name="target_dana_jaringan_g" placeholder="Rp. 0" class="form-control" type="digit" onchange="change_format('target_dana_jaringan_g')">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('jangka_waktu')?> (<?php echo $this->lang->line('hari')?>)</div>
                                            <div class="col-md-8">
                                                <input disabled="" id="jangka_waktu_jaringan_g" name="jangka_waktu_jaringan_g" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('deskripsi')?></div>
                                            <div class="col-md-8">
                                                <textarea disabled="" id="deskripsi_jaringan_g" name="deskripsi_jaringan_g" minlength="30" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                                                              
                                    
                                        
                                    </form>

                                    <button onclick="get_content('Jaringan_global')" class="btn btn-fill btn-info pull-left"><?php echo $this->lang->line('kembali')?></button>
                                    
                                    
                                </div>
                            </div>
                        
                    </div>


                </div>



<script type="text/javascript">

    $(document).ready(function() {
        load_kategori_jaringan_g();

        detil_jaringan_g(action_jaringan_g);
        
    });



    function load_kategori_jaringan_g(){
        $('#kategori_jaringan_g').empty();
        $('#kategori_jaringan_g').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Pengurus/get_kategori')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                    $(rows).appendTo("#kategori_jaringan_g");
                });
                
            }
        });

        $('#provinsi_jaringan_g').empty();
        $('#provinsi_jaringan_g').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Pengurus/load_provinsi')?>",
            type: "POST",
            data: {
                //"judul": $('#judul_kegiatan').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                    $(rows).appendTo("#provinsi_jaringan_g");
                });
                
            }
        });
    }

    function get_kota_jaringan_g(){
        $('#kota_jaringan_g').empty();
        $('#kota_jaringan_g').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Pengurus/load_kota')?>",
            type: "POST",
            data: {
                "id": $('#provinsi_jaringan_g').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                    $(rows).appendTo("#kota_jaringan_g");
                });
                
            }
        });
    }



    function detil_jaringan_g(action){

            $.ajax({
                url : "<?php echo site_url('Pengurus/detil_jaringan_g')?>",
                type: "POST",
                data: { 
                    "id" : id_jaringan_g
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_jaringan_g').val(data.judul);

                    $('#deskripsi_jaringan_g').val(data.deskripsi); 
                    $('#img_exist_jaringan_g').empty();   
                    $('#img_exist_jaringan_g').attr('src', '<?php echo base_url()?>assets/img/jaringan_global/'+data.gambar_utama); 


                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori jaringan_g 
                    $('#kategori_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Pengurus/get_kategori')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            
                            $.each(data, function(k, v) {
                                if (v.id_kategori == kategori) {
                                    rows ="<option selected='' value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }else{
                                    rows ="<option value='"+v.id_kategori+"'>"+v.nama_kategori+"</option>";
                                }
                                $(rows).appendTo("#kategori_jaringan_g");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Pengurus/load_provinsi')?>",
                        type: "POST",
                        data: {
                            //"judul": $('#judul_kegiatan').val()
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (v.id == provinsi) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_provinsi+"</option>";
                                }
                                $(rows).appendTo("#provinsi_jaringan_g");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_jaringan_g').empty();
                    $.ajax({
                        url: "<?php echo site_url('Pengurus/load_kota')?>",
                        type: "POST",
                        data: {
                            "id": provinsi
                        },
                        dataType: "JSON",
                        success: function(data) {
                            $.each(data, function(k, v) {
                                if (data.id == kota) {
                                    rows ="<option selected='' value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }else{
                                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                                }
                                $(rows).appendTo("#kota_jaringan_g");
                            });
                            
                        }
                    });

                    $('#target_dana_jaringan_g').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_jaringan_g').val(data.target_hari);
                },
            });
       
    }
</script>