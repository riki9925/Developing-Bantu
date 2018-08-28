                                    <form class="form form-horizontal" method="" action="" id="form_akun_jenis">
                                        
                                        <div class="form-group label-floating" name="div_form">
                                            <div class="col-md-4" align="left"><?php echo $this->lang->line('judul')?></div>
                                            <div class="col-md-8">
                                                <input maxlength="30" type="text" class="form-control" id="nama_akun_jenis" name="nama_akun_jenis">
                                                <input id="id_akun_jenis" hidden="" disabled="" name="">
                                            </div>
                                        </div>
                                    </form>

                                    <script type="text/javascript">
                                        $(document).ready(function() {
                                            $('#form_akun_jenis').bootstrapValidator({
                                                live: 'enabled',
                                                excluded: ':hidden , :disabled',
                                                message: 'This value is not valid',
                                                feedbackIcons: {
                                                    valid: 'glyphicon glyphicon-ok',
                                                    invalid: 'glyphicon glyphicon-remove',
                                                    validating: 'glyphicon glyphicon-refresh'
                                                },
                                                fields: {
                                                    nama_akun_jenis: {
                                                        trigger: 'change keyup',
                                                        validators: {
                                                            notEmpty: {
                                                                message: '<?php echo $this->lang->line('tulis_nama_akun_jenis')?>'
                                                            },
                                                            regexp: {
                                                                regexp: /^[a-zA-Z0-9 ]*$/,
                                                                message: '<?php echo $this->lang->line('isi_dengan_huruf_atau_angka')?>'
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