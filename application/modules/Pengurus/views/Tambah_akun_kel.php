                                    <form class="form form-horizontal" method="" action="" id="form_akun_kel">

                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('akun_jenis')?></div>
                                            <div class="col-md-8">
                                                <select name="list_jenis" id="list_jenis" class="form-control">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('nama_akun_kelompok')?></div>
                                            <div class="col-md-8">
                                                <input maxlength="30" type="text" class="form-control" id="nama_akun_kel" name="nama_akun_kel">
                                                <input id="id_akun_kel" hidden="" disabled="" name="">
                                            </div>
                                        </div>

                                    </form>

                                    <script type="text/javascript">
                                        $(document).ready(function() {


                                            $('#list_jenis').empty();
                                            $.ajax({
                                                url: "<?php echo site_url('Administrator/get_list_jenis')?>",
                                                type: "POST",
                                                data: {
                                                    //"judul": $('#judul_kegiatan').val()
                                                },
                                                dataType: "JSON",
                                                success: function(data) {
                                                    $.each(data, function(k, v) {
                                                        rows ="<option value='"+v.accjenis+"'>"+v.accjenis+" - "+v.jenis+"</option>";
                                                        $(rows).appendTo("#list_jenis");
                                                    });
                                                }
                                            });





                                            $('#form_akun_kel').bootstrapValidator({
                                                live: 'enabled',
                                                excluded: ':hidden , :disabled',
                                                message: 'This value is not valid',
                                                feedbackIcons: {
                                                    valid: 'glyphicon glyphicon-ok',
                                                    invalid: 'glyphicon glyphicon-remove',
                                                    validating: 'glyphicon glyphicon-refresh'
                                                },
                                                fields: {
                                                    nama_akun_kel: {
                                                        trigger: 'change keyup',
                                                        validators: {
                                                            notEmpty: {
                                                                message: '<?php echo $this->lang->line('tulis_nama_akun_kelompok')?>'
                                                            },
                                                            regexp: {
                                                                regexp: /^[a-zA-Z0-9 ]*$/,
                                                                message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
                                                            }
                                                        }
                                                    },
                                                    list_jenis: {
                                                        trigger: 'change keyup',
                                                        validators: {
                                                            notEmpty: {
                                                                message: '<?php echo $this->lang->line('pilih_akun_jenis')?>'
                                                            }
                                                        }
                                                    }                                                    
                                                    
                                                },
                                                errorPlacement: function(error, element) {
                                                    $(element).parent('div').addClass('has-error');
                                                }
                                            });
                                        });
                                    </script>