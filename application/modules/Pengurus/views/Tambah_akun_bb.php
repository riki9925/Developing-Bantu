                                    <form class="form form-horizontal" method="" action="" id="form_akun_bb">

                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('akun_kelompok')?></div>
                                            <div class="col-md-8">
                                                <select name="list_kel_bb" id="list_kel_bb" class="form-control">
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('nama_akun_buku_besar')?></div>
                                            <div class="col-md-8">
                                                <input maxlength="30" type="text" class="form-control" id="nama_akun_bb" name="nama_akun_bb">
                                                <input id="id_akun_bb" hidden="" disabled="" name="">
                                            </div>
                                        </div>

                                    </form>

                                    <script type="text/javascript">
                                        $(document).ready(function() {


                                            $('#list_kel_bb').empty();
                                            $.ajax({
                                                url: "<?php echo site_url('Administrator/get_list_kel')?>",
                                                type: "POST",
                                                data: {
                                                    //"judul": $('#judul_kegiatan').val()
                                                },
                                                dataType: "JSON",
                                                success: function(data) {
                                                    $.each(data, function(k, v) {
                                                        rows ="<option value='"+v.acckel+"'>"+v.acckel+" - "+v.kelompok+"</option>";
                                                        $(rows).appendTo("#list_kel_bb");
                                                    });
                                                }
                                            });





                                            $('#form_akun_bb').bootstrapValidator({
                                                live: 'enabled',
                                                excluded: ':hidden , :disabled',
                                                message: 'This value is not valid',
                                                feedbackIcons: {
                                                    valid: 'glyphicon glyphicon-ok',
                                                    invalid: 'glyphicon glyphicon-remove',
                                                    validating: 'glyphicon glyphicon-refresh'
                                                },
                                                fields: {
                                                    nama_akun_bb: {
                                                        trigger: 'change keyup',
                                                        validators: {
                                                            notEmpty: {
                                                                message: '<?php echo $this->lang->line('tulis_nama_akun_buku_besar')?>'
                                                            },
                                                            regexp: {
                                                                regexp: /^[a-zA-Z0-9 ]*$/,
                                                                message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
                                                            }
                                                        }
                                                    },
                                                    list_kel_bb: {
                                                        trigger: 'change keyup',
                                                        validators: {
                                                            notEmpty: {
                                                                message: '<?php echo $this->lang->line('pilih_akun_kelompok')?>'
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