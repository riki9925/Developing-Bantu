
                <div class="container-fluid" >
                
                    <div class="col-sm-8 col-sm-offset-2">
                            <div class="card">
                                <div class="card-header card-header-icon" data-background-color="rose">
                                    <i class="material-icons">add</i>
                                </div>
                                <div class="card-content">
                                    <h4 class="card-title" id="title_program"><?php echo $this->lang->line('tambah_program_terkini')?></h4>
                                    

                                    <form name="form_tambah_program" class="form form-horizontal" method="" action="" enctype="multipart/form-data" accept-charset="utf-8" id="form_tambah_program">
                                        
                                        <div  class="fileinput fileinput-new" style="width: 100%; margin-top: 15px" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-12">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                        <img id="img_exist_program" src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('judul_program')?></div>
                                            <div class="col-md-8">
                                                <input disabled="" maxlength="30" type="text" class="form-control" id="judul_program" name="judul_program">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('kategori')?></div>
                                            <div class="col-md-8">
                                                <select disabled="" name="kategori_program" id="kategori_program" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('provinsi')?></div>
                                            <div class="col-md-8">
                                                <select disabled="" onchange="get_kota_program()" name="provinsi_program" id="provinsi_program" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('kota')?></div>
                                            <div class="col-md-8">
                                                <select disabled="" name="kota_program" id="kota_program" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('target_dana')?> (Rp.)</div>
                                            <div class="col-md-8">
                                                <input disabled="" id="target_dana_program" name="target_dana_program" placeholder="Rp. 0" class="form-control" type="digit" onchange="change_format('target_dana_program')">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('jangka_waktu')?> (Hari)</div>
                                            <div class="col-md-8">
                                                <input disabled="" id="jangka_waktu_program" name="jangka_waktu_program" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group label-floating">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('deskripsi')?></div>
                                            <div class="col-md-8">
                                                <textarea disabled="" id="deskripsi_program" name="deskripsi_program" minlength="30" class="form-control" rows="5"></textarea>
                                            </div>
                                        </div>

                                                                              
                                    
                                        
                                    </form>

                                    <button onclick="get_content('Program_terkini')" class="btn btn-fill btn-info pull-left"><?php echo $this->lang->line('kembali')?></button>

                                </div>
                            </div>
                        
                    </div>


                </div>



<script type="text/javascript">

    $(document).ready(function() {
        load_kategori_program();

        //validasi form tambah kegiatan
        $('#form_tambah_program').bootstrapValidator({
            live: 'enabled',
            excluded: ':hidden , :disabled',
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                judul_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('judul_program')?>'
                        },
                        regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: '<?php echo $this->lang->line('tulis_dengan_huruf_atau_angka')?>'
                        }
                    }
                },
                kategori_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_kategori')?>'
                        }
                    }
                },
                provinsi_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_provinsi')?>'
                        }
                    }
                },
                kota_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('pilih_kota')?>'
                        }
                    }
                },
                target_dana_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_target_dana')?>'
                        },
                        regexp: {
                            regexp: /^[0-9, ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_angka')?>'
                        }
                    }
                },
                jangka_waktu_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('tulis_jangka_waktu')?>'
                        },
                        regexp: {
                            regexp: /^[0-9 ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_angka')?>'
                        }
                    }
                },
                
                deskripsi_program: {
                    trigger: 'change keyup',
                    validators: {
                        notEmpty: {
                            message: '<?php echo $this->lang->line('isi_deskripsi')?>'
                        }
                        ,regexp: {
                            regexp: /^[a-zA-Z0-9 ]*$/,
                            message: '<?php echo $this->lang->line('isi_dengan_huruf')?>'
                        }
                    }
                }
                
                
            },
            errorPlacement: function(error, element) {
                $(element).parent('div').addClass('has-error');
            }
        });

        detil_program_terkini(action_program_terkini);
        
    });




    function load_kategori_program(){
        $('#kategori_program').empty();
        $('#kategori_program').append('<option value="" selected="selected"></option>');
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
                    $(rows).appendTo("#kategori_program");
                });
                
            }
        });

        $('#provinsi_program').empty();
        $('#provinsi_program').append('<option value="" selected="selected"></option>');
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
                    $(rows).appendTo("#provinsi_program");
                });
                
            }
        });
    }

    function get_kota_program(){
        $('#kota_program').empty();
        $('#kota_program').append('<option value="" selected="selected"></option>');
        $.ajax({
            url: "<?php echo site_url('Pengurus/load_kota')?>",
            type: "POST",
            data: {
                "id": $('#provinsi_program').val()
            },
            dataType: "JSON",
            success: function(data) {
                
                $.each(data, function(k, v) {
                    rows ="<option value='"+v.id+"'>"+v.nama_kota+"</option>";
                    $(rows).appendTo("#kota_program");
                });
                
            }
        });
    }



    function detil_program_terkini(action){
            
            $('#title_program').text('<?php echo $this->lang->line('detil_program_terkini')?>');
            
            $.ajax({
                url : "<?php echo site_url('Pengurus/detil_program_terkini')?>",
                type: "POST",
                data: { 
                    "id" : id_program_terkini
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#judul_program').val(data.judul);

                    $('#deskripsi_program').val(data.deskripsi);   
                    $('#img_exist_program').attr('src', '<?php echo base_url()?>assets/img/program_terkini/'+data.gambar_utama); 
                    var kategori = data.kategori;
                    var provinsi = data.provinsi;
                    var kota = data.kota;
                    

                    //kategori program 
                    $('#kategori_program').empty();
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
                                $(rows).appendTo("#kategori_program");
                            });
                            
                        }
                    });

                    //provinsi
                    $('#provinsi_program').empty();
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
                                $(rows).appendTo("#provinsi_program");
                            });
                            
                        }
                    });


                    //kota
                    $('#kota_program').empty();
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
                                $(rows).appendTo("#kota_program");
                            });
                            
                        }
                    });

                    $('#target_dana_program').val(accounting.formatNumber(data.target_dana));
                    $('#jangka_waktu_program').val(data.target_hari);
                },
            });
        
    }
</script>