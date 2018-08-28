        <div class="se-pre-con"></div>
        <div class="main-panel">
            <nav class="navbar navbar-transparent navbar-absolute">
                <div class="container-fluid">
                    <div class="navbar-minimize">
                        <button id="minimizeSidebar" class="btn btn-round btn-white btn-fill btn-just-icon">
                            <i class="material-icons visible-on-sidebar-regular">more_vert</i>
                            <i class="material-icons visible-on-sidebar-mini">view_list</i>
                        </button>
                    </div>
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a id="judul_konten" class="navbar-brand" href="#"> Dashboard pengurus</a>
                    </div>
                    
                </div>
            </nav>



            <div class="content" id="content_Pengurus">
                <!-- content dashboard is here-->

                <!-- COA -->
                    <!-- jenis -->
                    <div class="modal fade" id="tambah_COA" role="dialog" data-backdrop="static" and data-keyboard="false">
                        <div class="modal-dialog" style="margin-top: 30px">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" id="title_tambah_coa"></h4>
                            </div>
                            <div class="modal-body" id="content_COA">
                                
                            </div>
                            <div class="modal-footer">

                                <button hidden="" id="btn_tambah_COA" onclick="tambah_jenis()" class="btn btn-success">
                                    <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div></button>

                                <button hidden="" id="btn_update_COA" class="btn btn-success">
                                    <i class="material-icons">save</i> Perbarui
                                <div class="ripple-container"></div></button>

                            </div>
                          </div>
                        </div>
                    </div>



                    <!-- kelompok -->
                    <div class="modal fade" id="tambah_kel" role="dialog" data-backdrop="static" and data-keyboard="false">
                        <div class="modal-dialog" style="margin-top: 30px">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" id="title_tambah_kel"></h4>
                            </div>
                            <div class="modal-body" id="content_kel">
                                
                            </div>
                            <div class="modal-footer">

                                <button hidden="" id="btn_tambah_kel" onclick="tambah_kel()" class="btn btn-success">
                                    <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div></button>

                                <button hidden="" id="btn_update_kel"  class="btn btn-success">
                                    <i class="material-icons">save</i> Perbarui
                                <div class="ripple-container"></div></button>

                            </div>
                          </div>
                        </div>
                    </div>




                    <!-- bb -->
                    <div class="modal fade" id="tambah_bb" role="dialog" data-backdrop="static" and data-keyboard="false">
                        <div class="modal-dialog" style="margin-top: 30px">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" id="title_tambah_bb"></h4>
                            </div>
                            <div class="modal-body" id="content_bb">
                                
                            </div>
                            <div class="modal-footer">

                                <button hidden="" id="btn_tambah_bb" onclick="tambah_akun_bb()" class="btn btn-success">
                                    <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div></button>

                                <button hidden="" id="btn_update_bb" class="btn btn-success">
                                    <i class="material-icons">save</i> Perbarui
                                <div class="ripple-container"></div></button>

                            </div>
                          </div>
                        </div>
                    </div>


                    <!-- sbb -->
                    <div class="modal fade" id="tambah_sbb" role="dialog" data-backdrop="static" and data-keyboard="false">
                        <div class="modal-dialog" style="margin-top: 30px">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title" id="title_tambah_sbb"></h4>
                            </div>
                            <div class="modal-body" id="content_sbb">
                                
                            </div>
                            <div class="modal-footer">

                                <button hidden="" id="btn_tambah_sbb" class="btn btn-success">
                                    <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div></button>

                                <button hidden="" id="btn_update_sbb" class="btn btn-success">
                                    <i class="material-icons">save</i> Perbarui
                                <div class="ripple-container"></div></button>

                            </div>
                          </div>
                        </div>
                    </div>



                <!-- kategori kontent -->
                    <!-- tambah -->
                    <div class="modal fade" id="tambah_kategori" role="dialog">
                        <div class="modal-dialog" style="margin-top: 30px">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Tambah kategori kegiatan</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                            <label class="col-md-3 label-on-left">Nama Kategori</label>
                                            <div class="col-md-9">
                                                <div class="form-group label-floating is-empty">
                                                    <label class="control-label"></label>
                                                    <input class="form-control" maxlength="20" type="text" id="tambah_nama_kategori">
                                                <span class="material-input"></span></div>
                                            </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button id="btn_tambah_kategori" class="btn btn-success btn-round" data-dismiss="modal">
                                    <i class="material-icons">add</i> Tambah
                                <div class="ripple-container"></div></button>
                            </div>
                          </div>
                        </div>
                    </div>

                    <!-- edit -->
                    <div class="modal fade" id="modal_edit_kategori" role="dialog">
                        <div class="modal-dialog" style="margin-top: 30px">
                          <div class="modal-content">
                            <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal">&times;</button>
                              <h4 class="modal-title">Edit kategori</h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <input id="id_kategori" hidden="" disabled="">
                                    <label class="col-sm-3 label-on-left">Nama kategori</label>
                                    <div class="col-sm-6">
                                        <div class="form-group label-floating is-empty" style="margin: 0px">
                                            <label class="control-label"></label>
                                            <input class="form-control" id="nama_kategori" type="text">
                                            <span class="material-input"></span>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="row">
                                    <label class="col-sm-3 label-on-left">Status kategori</label>
                                    <div class="col-sm-6">
                                        <select class="form-control" id="status_kategori">
                                            <option>ACTIVE </option>
                                            <option>NONACTIVE </option>
                                        </select>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button onclick="update_kategori()" data-dismiss="modal" class="btn btn-success btn-round">Simpan<div class="ripple-container"></div></button>
                            </div>
                          </div>
                        </div>
                    </div>

                <!-- kegiatan -->
                    <!-- verifikasi kegiatan -->
                    <div class="modal fade" id="modal_verifikasi_kegiatan" role="dialog">
                        <div class="modal-dialog" style="margin-top: 30px">
                          <div class="modal-content">
                            <div class="modal-header" style="background-color: #4fc143; padding-bottom: 5px">
                              <button type="button" class="close" data-dismiss="modal"><i style="color: white; font-size: 17px" class="material-icons">close</i></button>
                              <h4 class="modal-title" id="judul_modal_kegiatan" style="color: white; "><b><?php echo $this->lang->line('verifikasi_kegiatan')?></b></h4>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <h4 id="d_judul_kegiatan"><b></b> </h4>

                                    <div class="col-xs-6" style="padding-left: 0px; padding-right: 0px">
                                        <p class="category" id="d_kategori_kegiatan" style="text-transform: uppercase;"></p>
                                    </div>
                                    <div class="col-xs-6" style="padding-left: 0px; padding-right: 0px">
                                        <p class="category" id="d_tanggal_kegiatan" style="text-transform: uppercase; text-align: right;">5 Juni 2017</p>
                                    </div>
                                    

                                    

                                    <img id="d_img_kegiatan" class="img-responsive" src="" style="width: 100%">
                                    <br>
                                    <p id="d_deskripsi_kegiatan" style="font-size: 16px"></p>
                                    <hr>
                                    <div class="row" id="daftar_gambar_kegiatan"></div>
                                    <hr>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <i style="font-size: 50px; color: #4fc143" class="material-icons">account_balance_wallet</i>
                                            </div>
                                            <div class="col-xs-8">
                                                <p><?php echo $this->lang->line('target_dana')?></p>
                                                <h4 id="d_target_dana_kegiatan" style="margin-top: 0px"></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-xs-4">
                                                <i style="font-size: 50px; color: rgb(80, 206, 224)" class="material-icons">date_range</i>
                                            </div>
                                            <div class="col-xs-8">
                                                <p><?php echo $this->lang->line('jangka_waktu')?></p>
                                                <h4 id="d_target_waktu_kegiatan" style="margin-top: 0px"></h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12">
                                    <hr>
                                    </div>

                                    <div class="col-sm-2 col-xs-4">
                                        <img id="d_foto_user" class="img-circle img-responsive" src="" style="width: 70px; height: 70px">
                                    </div>
                                    <div class="col-sm-10 col-xs-8">
                                        <h4 style="margin-top: 0px"><?php echo $this->lang->line('dermawan_penggiat_kegiatan')?></h4>
                                        <p id="d_nama_user"></p>
                                    </div>
                                    <p hidden="" id="d_id_kegiatan"></p>
                                </div>

                            </div>
                          </div>
                        </div>
                    </div>


                <!-- user -->
                    <!-- detil user -->
                    <div class="modal fade" id="modal_detil_user" role="dialog">
                        <div class="modal-dialog" style="margin-top: 30px">
                            <div class="modal-content">

                                <div class="modal-header" style="background-color: #4fc143;color: white;padding-bottom: 20px;">
                                  <button style="color: white;font-size: 30px;" type="button" class="close" data-dismiss="modal">&times;</button>
                                  <h4 class="modal-title"><?php echo $this->lang->line('detil_data_user')?></h4>
                                </div>


                                <div class="modal-body">
                                    
                                            <div class="row">
                                                <div class="col-sm-3 col-xs-12">
                                                    <div class="photo">
                                                        <img id="foto_user_exist2" class="img-responsive img-circle" src="" style="width: 100px; height: 100px">
                                                    </div>
                                                </div>
                                                <div class="col-sm-9 col-xs-12">

                                                    <div class="row">
                                                        <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('nama')?></p></div>
                                                        <div class="col-md-9">
                                                            <div class="form-group label-floating is-empty nomargin">
                                                                <label class="control-label"></label>
                                                                <input disabled="" id="nama_lengkap" class="form-control" placeholder="Kosong" type="text">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('email')?></p></div>
                                                        <div class="col-md-9">
                                                            <div class="form-group label-floating is-empty nomargin">
                                                                <label class="control-label"></label>
                                                                <input disabled="" id="email" class="form-control" placeholder="Kosong" type="email">
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('alamat')?></p></div>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty nomargin">
                                                        <label class="control-label"></label>
                                                        <input disabled="" id="alamat" class="form-control" placeholder="Kosong" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" >
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('provinsi')?></p></div>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty nomargin">
                                                        <input disabled="" id="provinsi" class="form-control" placeholder="Kosong" type="text">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="row" >
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('kota/kabupaten')?></p></div>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty nomargin">
                                                    <input disabled="" id="kota" class="form-control" placeholder="Kosong" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"><p style="margin: 5px 0 0px">No handphone</p></div>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty nomargin">
                                                        <label class="control-label"></label>
                                                        <input disabled="" id="hp" class="form-control" placeholder="Kosong" type="text">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row" >
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('kartu_identitas')?></p></div>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty nomargin">
                                                        
                                                        <input disabled="" id="jenis_ki" class="form-control" placeholder="Kosong" type="text">
                                                        </div>
                                                </div>
                                            </div>

                                            <div class="row" >
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('foto_identitas')?></p></div>
                                                <div class="col-md-9">
                                                   <img id="foto_ki" class="img-responsive" src="" style="width: 100%">
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('biography')?></p></div>
                                                <div class="col-md-9">
                                                    <textarea disabled="" id="bio" placeholder="Kosong" class="form-control nomargin" rows="5"></textarea>
                                                    <input id="validasi_id_user" hidden=""  disabled="">
                                                    <span class="material-input"></span>
                                                </div>

                                            </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- video -->
                    <div class="modal fade" id="tambah_video" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #4fc143; padding-bottom: 10px">
                                      <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                      <h4 style="color: white" class="modal-title"><b><?php echo $this->lang->line('tambah_video')?></b></h4>
                                </div>

                                <div class="modal-body">

                                            <div class="row">
                                                <div class="alert alert-info alert-with-icon" data-notify="container">
                                                            <i class="material-icons" data-notify="icon">notifications</i>
                                                            <h4>
                                                            <?php echo $this->lang->line('petunjuk_upload')?></h4>
                                                        </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('kode_iframe_youtube')?></p></div>
                                                <div class="col-md-9">
                                                    <div class="form-group label-floating is-empty nomargin">
                                                        <label class="control-label"></label>
                                                        <textarea id="iframe_y" class="form-control" rows="5"></textarea>
                                                        <span class="material-input"></span>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                </div>

                                <div class="modal-footer">
                                    <button id="btn_tambah_berita" onclick="simpan_video()" data-dismiss="modal" class="btn btn-fill btn-success"><?php echo $this->lang->line('tambah_video')?></button>
                                    
                                </div>
                            </div>
                        </div>
                    </div>




                	<!-- gambar slide -->
                    <div class="modal fade" id="tambah_slide" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #4fc143; padding-bottom: 10px">
                                      <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                      <h4 style="color: white" class="modal-title"><b>Tambah slide</b></h4>
                                </div>

                                <div class="modal-body">


                                            <div class="row">
                                                <div class="col-md-3"><p style="margin: 5px 0 0px">Gambar slide</p></div>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" style="width: 100%" data-provides="fileinput">


                                                        <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                            <img id="foto_exist_berita" src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                        
                                                        <span class="btn btn-info btn-round btn-file" id="btn_upload">
                                                            <span class="fileinput-new"><i class="material-icons">camera_alt</i> Pilih</span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> Ganti</span>
                                                            <input type="file" id="wizard-picture_slide" name="wizard-picture_slide" />
                                                        </span>
                                                        <a id="btn_delete_slide" href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        
                                        
                                </div>

                                <div class="modal-footer">
                                    <button id="btn_tambah_berita" onclick="upload_slide()" data-dismiss="modal" class="btn btn-fill btn-success">Tambah slide</button>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- gambar dukungan -->
                    <div class="modal fade" id="tambah_dukungan" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #4fc143; padding-bottom: 10px">
                                      <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                      <h4 style="color: white" class="modal-title"><b><?php echo $this->lang->line('tambah_logo_dukungan')?></b></h4>
                                </div>

                                <div class="modal-body">


                                            <div class="row">
                                                <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('logo_dukungan')?></p></div>
                                                <div class="col-md-9">
                                                    <div class="fileinput fileinput-new" style="width: 100%" data-provides="fileinput">


                                                        <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                            <img id="foto_exist_berita" src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                        </div>
                                                        <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                        
                                                        <span class="btn btn-info btn-round btn-file" id="btn_upload">
                                                            <span class="fileinput-new"><i class="material-icons">camera_alt</i> <?php echo $this->lang->line('pilih')?></span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> <?php echo $this->lang->line('ganti')?></span>
                                                            <input type="file" id="wizard-picture_dukungan" name="wizard-picture_dukungan" />
                                                        </span>
                                                        <a id="btn_delete_dukungan" href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> <?php echo $this->lang->line('hapus')?></a>

                                                    </div>
                                                </div>
                                            </div>
                                            
                                        
                                        
                                </div>

                                <div class="modal-footer">
                                    <button id="btn_tambah_berita" onclick="upload_dukungan()" data-dismiss="modal" class="btn btn-fill btn-success"><?php echo $this->lang->line('tambah')?></button>
                                </div>
                            </div>
                        </div>
                    </div>






                <!-- jurnal umum -->
                    <!-- tambah -->
                    <div class="modal fade" id="modal_tambah_ju" align="center" role="dialog" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" id="width_payment" style="width: 90%">
                            <div class="modal-content" style="border-radius: 0px">
                                <div class="modal-body" style="padding-top:0px; padding-right:15px; padding-bottom:0px; padding-left:15px">
                                        <div class="row">

                                            <div class="col-sm-3 col-xs-12" style="text-align: left; min-height: 540px">

                                                <h4><i class="material-icons">playlist_add</i><?php echo $this->lang->line('tambah_jurnal_baru')?></h4>
                                                <hr>
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-md-3"><p style="margin: 5px 0 0px">Jenis </p></div>
                                                    <div class="col-md-9">
                                                        <div class="form-group label-floating is-empty nomargin">
                                                            <select onchange="" name="jenis_transaksi" id="jenis_transaksi" class="form-control">
                                                                <option>Debet</option>
                                                                <option>Kredit</option>
                                                            </select>
                                                            <span class="material-input"></span></div>
                                                    </div>
                                                </div>

                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-md-3"><p style="margin: 5px 0 0px"><?php echo $this->lang->line('akun')?> </p></div>
                                                    <div class="col-md-9">
                                                        <div class="form-group label-floating is-empty nomargin">
                                                            <input id="input_acc" onclick="cari_akun()" style="cursor: pointer;" class="form-control" placeholder="<?php echo $this->lang->line('klik_untuk_cari_akun')?>" type="text">
                                                            <span class="material-input"></span></div>
                                                    </div>
                                                </div>
                                                
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-md-3"><p style="margin: 5px 0 0px">Nominal </p></div>
                                                    <div class="col-md-9">
                                                        <div class="form-group label-floating is-empty nomargin">
                                                            <input id="input_nominal_transaksi" onchange="change_format()" class="form-control" placeholder="<?php echo $this->lang->line('tulis_nominal_transaksi')?>" type="text">
                                                            <span class="material-input"></span></div>
                                                    </div>
                                                </div>

                                                <input id="ntrans" hidden="" disabled="" name="">

                                                <button id="btn_tambah_draft" onclick="tambah_draft_jurnal()" class="btn btn-success pull-right">
                                                    <span class="btn-label">
                                                        <i class="material-icons">add</i>
                                                    </span>
                                                    <?php echo $this->lang->line('tambah')?>
                                                <div class="ripple-container"></div></button>
                                            </div>



                                            <div class="col-sm-6 col-xs-12 ScrollStyle" align="left" style="background-color: whitesmoke; min-height: 540px">
                                                <h4 style="color: #4fc143"><i class="material-icons">playlist_add_check</i><?php echo $this->lang->line('daftar_jurnal_baru')?></h4>
                                                <div class="material-datatables">
                                                    <table id="table_draft_jurnal" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                        <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                            <tr>
                                                                <th class='disabled-sorting text-left'>Actions</th>
                                                                <th style='width:80px'><?php echo $this->lang->line('akun')?></th>
                                                                <th style='width:120px'><?php echo $this->lang->line('nama_akun')?></th>
                                                                <th class="text-right">Debet</th>
                                                                <th class="text-right">Kredit</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>



                                            <div class="col-sm-3 col-xs-12" style="text-align: left; min-height: 540px; background-color: #4fc143">
                                                <div class="row">
                                                    <div class="col-xs-10" style="background-color: #4fc143;">
                                                        <h4 style="color: white"><i class="material-icons">playlist_add</i><?php echo $this->lang->line('resume_jurnal')?></h4>
                                                    </div>
                                                    <div class="col-xs-2" align="right" style="background-color: #4fc143;">
                                                        <h4 data-dismiss="modal" onclick="reload_table_jurnal_umum()" style="color: white; cursor: pointer;"><i class="material-icons">close</i></h4>
                                                    </div>
                                                </div>

                                                <br>
                                                <div id="detil_input">
	                                                <p class="nomargin" style="color: white">Total debet</p>
	                                                <h3 class="nomargin" style="color: white; font-weight: bold" id="total_debet">0</h3>
	                                                <br>
	                                                <p class="nomargin" style="color: white">Total kredit</p>
	                                                <h3 class="nomargin" style="color: white; font-weight: bold" id="total_kredit">0</h3>
	                                                <br>
	                                                <p class="nomargin" style="color: white"><?php echo $this->lang->line('selisih')?></p>
	                                                <h3 class="nomargin" style="color: white; font-weight: bold" id="selisih">0</h3>
                                                </div>
                                                
                                                <div class="row" style="margin-top: 20px">
                                                    <div class="col-md-12">
                                                        <div style="color: white" class="form-group label-floating is-empty nomargin">
                                                        	<label style="color: white"><?php echo $this->lang->line('keterangan_transaksi')?></label>
                                                            <textarea style="color: white" class="form-control" type="text" rows="3" id="keterangan_transaksi"></textarea>
                                                            <span class="material-input"></span>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-12" id="detil_reverse" hidden="" style="margin-top: 10px">
                                                        <div style="color: white" class="form-group label-floating is-empty nomargin">
                                                        	<label style="color: white"><?php echo $this->lang->line('keterangan_reverse')?></label>
                                                            <textarea style="color: white" class="form-control" type="text" rows="3" id="keterangan_reverse"></textarea>
                                                            <span class="material-input"></span>
                                                        </div>
                                                    </div>
                                                </div>


                                                <button style="background-color: white; color: #4fc143" onclick="posting_jurnal()" data-dismiss="modal" id="btn_posting" class="btn btn-success pull-left">
                                                    <span class="btn-label">
                                                        <i class="material-icons">verified_user</i>
                                                    </span>
                                                    Posting
                                                <div class="ripple-container"></div></button>

                                                <button style="background-color: white; color: #4fc143" onclick="reverse_jurnal()" id="btn_reverse" class="btn btn-danger pull-left">
                                                    <span class="btn-label">
                                                        <i class="material-icons">repeat</i>
                                                    </span>
                                                    Reverse
                                                <div class="ripple-container"></div></button>

                                            </div>

                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>





                    <!-- detil transaksi -->
                    <div class="modal fade" id="detil_transaksi" align="center" role="dialog" data-backdrop="static" data-keyboard="false">
                        <div class="modal-dialog" style="width: 70%">
                            <div class="modal-content" style="border-radius: 0px">
                                <div class="modal-body" style="padding-top:0px; padding-right:15px; padding-bottom:0px; padding-left:15px">
                                        <div class="row">

                                            <input type="" disabled="" hidden="" id="ntrans_detil">
                                            <div class="col-sm-9 col-xs-12 ScrollStyle" align="left" style="background-color: whitesmoke; min-height: 540px">
                                                <h4 style="color: #4fc143"><i class="material-icons">playlist_add_check</i>  Daftar jurnal transaksi</h4>
                                                <div class="material-datatables">
                                                    <table id="table_detil_jurnal" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                        <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                            <tr>
                                                                <th style='width:80px'>Akun</th>
                                                                <th style='width:120px'>Nama akun</th>
                                                                <th class="text-right">Debet</th>
                                                                <th class="text-right">Kredit</th>
                                                                
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                            </div>



                                            <div class="col-sm-3 col-xs-12" style="text-align: left; min-height: 540px; background-color: #4fc143">
                                                <div class="row">
                                                    <div class="col-xs-9" style="background-color: #4fc143;">
                                                        <h4 style="color: white"><i class="material-icons">playlist_add</i>Resume jurnal</h4>
                                                    </div>
                                                    <div class="col-xs-3" align="right" style="background-color: #4fc143;">
                                                        <h4 data-dismiss="modal" style="color: white; cursor: pointer;"><i class="material-icons">close</i></h4>
                                                    </div>
                                                </div>

                                                <div style="margin-top: 30px" class="alert alert-info" style="background-color: white; color: black" id="status_transaksi">
                                                    
                                                </div>

                                                <br>
                                                <p class="nomargin" style="color: white">Tanggal transaksi</p>
                                                <h3 class="nomargin" style="color: white; font-weight: bold" id="tanggal_detil"></h3>

                                                <br>
                                                <p class="nomargin" style="color: white">Total transaksi</p>
                                                <h3 class="nomargin" style="color: white; font-weight: bold" id="total_transaksi_detil"></h3>
                                                
                                                <br>
                                                <p style="color: white">Keterangan</p>
                                                <p id="keterangan_detil_transaksi" style="color: white"></p>
                                               
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- cari akun -->
                    <div class="modal fade" id="cari_akun" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header" style="background-color: #4fc143; padding-bottom: 10px">
                                      <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                      <h4 style="color: white" class="modal-title"><b>Cari akun</b></h4>
                                </div>

                                <div class="modal-body">
                                    

                                                <div class="material-datatables">
                                                    <table id="table_cari_akun" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                                                        <thead style="background-color: #3498db; color: white; font-weight: bold;" >
                                                            <tr>
                                                                <th style='width:8%'>No.</th>
                                                                <th>Kode akun</th>
                                                                <th>Nama akun</th>
                                                                <th class='disabled-sorting text-right'>Pilih</th>
                                                            </tr>
                                                        </thead>
                                                    </table>
                                                </div>
                                </div>

                            </div>
                        </div>
                    </div>





            </div>


            <footer class="footer">
                <div class="container-fluid">
                    <p class="copyright pull-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="http://salingbantu.or.id">Yayasan Saling Bantu</a>
                    </p>
                </div>
            </footer>
        </div>

 </div>
</body>


</html>
    <!--  Google Maps Plugin    -->




    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script src="<?=base_url("assets/dashboard/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/jquery-ui.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/material.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/perfect-scrollbar.jquery.min.js"); ?>" type="text/javascript"></script>




    <!-- Forms Validations Plugin -->
    <script src="<?=base_url("assets/dashboard/js/jquery.validate.min.js"); ?>" type="text/javascript"></script>
    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="<?=base_url("assets/dashboard/js/moment.min.js"); ?>" type="text/javascript"></script>
    <!--  Notifications Plugin    -->
    <script src="<?=base_url("assets/dashboard/js/bootstrap-notify.js"); ?>" type="text/javascript"></script>
    <!-- DateTimePicker Plugin -->
    <script src="<?=base_url("assets/dashboard/js/bootstrap-datetimepicker.js"); ?>" type="text/javascript"></script>



    <!-- Sliders Plugin -->
    <script src="<?=base_url("assets/dashboard/js/nouislider.min.js"); ?>" type="text/javascript"></script>



    <!-- Select Plugin -->
    <script src="<?=base_url("assets/dashboard/js/jquery.select-bootstrap.js"); ?>" type="text/javascript"></script>
    <!--  DataTables.net Plugin    -->
    <script src="<?=base_url("assets/dashboard/js/jquery.datatables.js"); ?>" type="text/javascript"></script>
    <!-- Sweet Alert 2 plugin -->
    <script src="<?=base_url("assets/dashboard/js/sweetalert2.js"); ?>" type="text/javascript"></script>
    <!--    Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="<?=base_url("assets/dashboard/js/jasny-bootstrap.min.js"); ?>" type="text/javascript"></script>
    <!--  Full Calendar Plugin    -->
    <script src="<?=base_url("assets/dashboard/js/fullcalendar.min.js"); ?>" type="text/javascript"></script>
    <!-- TagsInput Plugin -->
    <script src="<?=base_url("assets/dashboard/js/jquery.tagsinput.js"); ?>" type="text/javascript"></script>
    <!-- Material Dashboard javascript methods -->
    <script src="<?=base_url("assets/dashboard/js/material-dashboard.js"); ?>" type="text/javascript"></script>
    <!-- Material Dashboard DEMO methods, don't include it in your project! -->
    <script src="<?=base_url("assets/dashboard/js/demo.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/accounting.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/validator.js"); ?>" type="text/javascript"></script>

    <style type="text/css">
        .form-horizontal .has-feedback .form-control-feedback{
            right: 25px;            
        }

        .modal-open .modal{
            background-color: #00000080;
        }

        .form-group .help-block{
            font-size: 14px;
            color: #f34539;
        }

        .modal .modal-dialog{
            margin-top: 30px;
        }

        .se-pre-con {
          position: fixed;
          left: 0px;
          top: 0px;
          width: 100%;
          height: 100%;
          z-index: 9999;
          opacity: 0.9;
          background: url(<?= base_url("assets/img/loading1.gif"); ?>) center no-repeat #ecf0f1;
        }

        .nomargin{
            margin: 0px;
        }
    </style>

<script type="text/javascript">
    $(document).ajaxStop(function() {
      //setTimeout(function(){
        $( ".se-pre-con" ).hide();
      //},15000);
    });

    $(document).ajaxStart(function() {
        $(".se-pre-con").show();
    });

    $(document).ajaxError(function() {
        //setTimeout(function(){
        $( ".se-pre-con" ).hide();
        //},1500);
    });



    var layar;
    var table_detil_jurnal;
    $(document).ready(function() {
        //demo.initFormExtendedDatetimepickers();
        get_content('Pengurus');
        detect_screen();
        // load_table_detil_jurnal();
        // load_table_cari_akun();
    });


    $('#menu_sidebar').on('click', 'li', function() {
        $('#menu_sidebar li.active').removeClass('active');
        $(this).addClass('active');
    });



    function load_table_cari_akun(){
        table_cari_akun = $('#table_cari_akun').DataTable({ 
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
                    "url": "<?php echo site_url('Pengurus/load_table_cari_akun')?>",
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

    function reload_table_cari_akun(){
        table_cari_akun.ajax.reload(null, false);
    }


    function cari_akun(){
        $('#cari_akun').modal({backdrop: 'static', keyboard: false},'show');
    }

    function detect_screen(){
        var width = $(window).width();
        if (width <= 800 ) {
            layar = 'small';
            
        }
        else if (width > 800) {
            layar = 'big';
        }
        else if (width <= 480) {
            layar = 'extrasmall';
        }
    }



    function load_table_detil_jurnal(){
        table_detil_jurnal = $('#table_detil_jurnal').DataTable({ 
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
                    "url": "<?php echo site_url('Pengurus/load_table_draft_jurnal')?>",
                    "type": "POST",  
                    "data": function ( data ) {
                        data.layar = layar;
                        data.ntrans = $('#ntrans_detil').val();
                        data.halaman = 'detil';
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

    function reload_table_detil_jurnal(){
        table_detil_jurnal.ajax.reload(null, false);
    }



    function get_content(page){

        if (page == 'Front') {
            window.location.href = '<?php echo base_url()?>Front/';
        }else{
            // $('#judul_konten').text(page);
            $('#content_Pengurus').empty();
            $.ajax({
                url : "<?php echo site_url('Pengurus/get_content')?>",
                type: "POST",
                data: { 
                  "page" : page
                },
                dataType: "html",
                success: function(data)
                {
                    $('#content_Pengurus').html(data);
                },
                
            });   
        }            
    }

    function change_format(id){
        if (id == 'target_dana_program') {
            var angka = $('#target_dana_program').val().replace(/,/g , '');
            $('#target_dana_program').val(accounting.formatNumber(angka));
        }
        else if (id == 'target_dana_jaringan_g') {
            var angka = $('#target_dana_jaringan_g').val().replace(/,/g , '');
            $('#target_dana_jaringan_g').val(accounting.formatNumber(angka));
        }
        
        else{
            var input_nominal_transaksi = $('#input_nominal_transaksi').val().replace(/,/g , '');
            $('#input_nominal_transaksi').val(accounting.formatNumber(input_nominal_transaksi));
        }
        
    }


    function logout(){
        window.location.href = '<?php echo base_url()?>Front/logout';
    }

</script>

   