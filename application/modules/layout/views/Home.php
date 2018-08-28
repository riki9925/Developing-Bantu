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
                        <a class="navbar-brand" href="#"> Dashboard </a>
                    </div>
                    
                </div>
            </nav>



            <div class="content" id="content_dashboard">
                <!-- content dashboard is here-->
            </div>

            <!-- kegiatan -->
                <!-- tambah -->
                <div class="modal fade" id="tambah_kegiatan" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #4fc143; padding-bottom: 10px">
                                  <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                  <h4 style="color: white" class="modal-title"><b>Tambah Kegiatan</b></h4>
                            </div>

                            <div class="modal-body">
                                        

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">text_fields</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Judul kegiatan</label>
                                                <input class="form-control" type="text" id="judul_kegiatan">
                                                <span class="material-input"></span></div>
                                        </div>

                                        
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">format_list_numbered</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Pilih Kategori</label>
                                                <select name="kategori_kegiatan" id="kategori_kegiatan" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>

                                        
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">format_list_numbered</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Provinsi </label>
                                                <select onchange="get_kota_kegiatan()" name="provinsi_kegiatan" id="provinsi_kegiatan" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>


                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">format_list_numbered</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Kota </label>
                                                <select name="kota_kegiatan" id="kota_kegiatan" class="form-control">
                                                    <option disabled="" selected="" value=""></option>
                                                    
                                                </select>
                                                <span class="material-input"></span></div>
                                        </div>


                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <p>Rp. </p>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Tulis target dana</label>
                                                <input id="target_dana" class="form-control" type="digit" onchange="dashboard_change_format('target_dana')">
                                                <span class="material-input"></span></div>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">text_fields</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Jangka waktu (Hari)</label>
                                                <input id="jangka_waktu" class="form-control" type="text">
                                                <span class="material-input"></span>
                                            </div>
                                        </div>

                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">text_fields</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Deskripsikan kegiatan anda</label>
                                                <textarea id="deskripsi_kegiatan" class="form-control" rows="5"></textarea>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        
                                    
                                        <div class="fileinput fileinput-new" style="width: 100%" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                        <img src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div>
                                                        <span class="btn btn-info btn-round btn-file">
                                                            <span class="fileinput-new"><i class="material-icons">camera_alt</i> Pilih</span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> Ganti</span>
                                                            <input type="file" id="wizard-picture" name="wizard-picture" />
                                                        </span>
                                                        <a id="btn_delete_img" href="#pablo" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <hr>
                                        </div>
                            </div>

                            <div class="modal-footer">
                                <button id="btn_save_1" data-dismiss="modal" class="btn btn-fill btn-success">Tambah Kegiatan</button>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- update kegiatan -->
                <div class="modal fade" id="update_kegiatan" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color: #4fc143; padding-bottom: 10px">
                                  <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                  <h4 style="color: white" class="modal-title"><b>Update laporan kegiatan</b></h4>
                            </div>

                            <div class="modal-body">
                                        
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">text_fields</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Judul update kegiatan</label>
                                                <input class="form-control" type="text" id="update_judul_kegiatan">
                                                <span class="material-input"></span></div>
                                        </div>


                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">text_fields</i>
                                            </span>
                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Deskripsikan update kegiatan</label>
                                                <textarea id="update_deskripsi_kegiatan" class="form-control" rows="5"></textarea>
                                                <span class="material-input"></span>
                                            </div>
                                        </div>
                                        
                                    
                                        <div class="fileinput fileinput-new" style="width: 100%" data-provides="fileinput">
                                            <div class="row">
                                                <div class="col-xs-8">
                                                    <div class="fileinput-new thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%">
                                                        <img src="<?php echo base_url()?>/assets/img/upload_file.gif" alt="...">
                                                    </div>
                                                    <div class="fileinput-preview fileinput-exists thumbnail" style="box-shadow: unset; border-radius: 0px; max-width: 100%"></div>
                                                </div>
                                                <div class="col-xs-4">
                                                    <div>
                                                        <span class="btn btn-info btn-round btn-file">
                                                            <span class="fileinput-new"><i class="material-icons">camera_alt</i> Pilih</span>
                                                            <span class="fileinput-exists"><i class="material-icons">sync</i> Ganti</span>
                                                            <input type="file" id="wizard-picture_update" name="wizard-picture_update" />
                                                        </span>
                                                        <a id="btn_delete_img_update" href="#" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        <hr>
                                        </div>
                            </div>

                            <div class="modal-footer">
                                <button onclick="update_laporan_kegiatan()" data-dismiss="modal" class="btn btn-fill btn-success">Update Kegiatan</button>
                            </div>
                        </div>
                    </div>
                </div>

            <!-- kalkulator zakat -->
                <div class="modal fade" id="kalkulator_zakat" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#4fc143">
                                  <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                  <h4 style="color: white" class="modal-title"><i class="material-icons">keyboard</i> Kalkulator zakat</h4>
                            </div>

                            <div class="modal-body">
                                        
                                    <div class="row">
                                        <div class="col-xs-12" style="text-align: left;">
                                            
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                                <div class="panel panel-default">
                                                
                                                    <div class="panel-heading" role="tab" id="headingOne">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                                                            <h3 class="panel-title">
                                                                Zakat profesi
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h3>
                                                        </a>
                                                    </div>

                                                    <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false" style="height: 0px;">
                                                        <div class="panel-body" style="background-color:whitesmoke; padding: 15px; border-left: solid #4fc143; ">
                                                            <form id="form_zakat_profesi">
                                                            <div class="row">
                                                                <label style="margin-top: 25px; color: black" class="col-xs-1 label-on-left">Rp.</label>
                                                                <div class="col-xs-11 form-group label-floating is-empty">
                                                                    <label class="control-label">Tulis penghasilan perbulan</label>
                                                                    <input class="form-control" type="digit" id="penghasilan_profesi" onchange="hitung_penghasilan_zakat()">
                                                                <span class="material-input"></span></div>
                                                            </div>
                                                            
                                                            <div class="row">
                                                                <label style="margin-top: 25px; color: black" class="col-xs-1 label-on-left">Rp.</label>
                                                                <div class="col-xs-11 form-group label-floating is-empty">
                                                                    <label class="control-label">Tulis bonus/tambahan perbulan</label>
                                                                    <input class="form-control" type="digit" id="bonus_profesi" onchange="hitung_penghasilan_zakat()">
                                                                <span class="material-input"></span></div>
                                                            </div>

                                                            <div class="row">
                                                                <label style="margin-top: 25px; color: black" class="col-xs-1 label-on-left">Rp.</label>
                                                                <div class="col-xs-11 form-group label-floating is-empty">
                                                                    <label class="control-label">Tulis biaya/pengeluaran perbulan</label>
                                                                    <input class="form-control" type="digit" id="biaya_profesi" onchange="hitung_penghasilan_zakat()"> 
                                                                <span class="material-input"></span></div>
                                                            </div>

                                                            <h4><i class="material-icons">dehaze</i>Total penghasilan bersih: </h4>
                                                            <h4><b id="penghasilan_bersih_profesi">Rp. 0</b></h4>
                                                            

                                                            <hr>

                                                            <h4><i class="material-icons">dehaze</i>Perhitungan nihsab</h4>


                                                            <div class="row">
                                                                <label style="margin-top: 25px; color: black" class="col-xs-1 label-on-left">Rp.</label>
                                                                <div class="col-xs-11 form-group label-floating is-empty">
                                                                    <label class="control-label">Tulis harga beras perkilo</label>
                                                                    <input class="form-control" type="digit" id="beras_profesi" onchange="hitung_penghasilan_zakat()">
                                                                <span class="material-input"></span></div>
                                                            </div>

                                                            <h4><i class="material-icons">dehaze</i>Besarnya Nishab Zakat Penghasilan per Bulan: </h4>
                                                            <h4><b id="nishab_profesi">Rp. 0</b></h4>


                                                            <h4><i class="material-icons">dehaze</i>Jumlah yang Saya Harus Dibayarkan per Bulan: </h4>
                                                            <h3><b id="nilai_zakat_profesi" style="color: #4fc143">Rp. 0</b></h3>

                                                            </form>

                                                            
                                                            <button id="btn_zakat_profesi" disabled="" class="btn btn-success pull-right" onclick="payment_zakat('Profesi')"><span class="btn-label"><i class="material-icons">payment</i></span>Bayarkan zakat<div class="ripple-container"></div></button>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingTwo">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                            <h4 class="panel-title">
                                                                Zakat perdagangan
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading" role="tab" id="headingThree">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <h4 class="panel-title">
                                                                Zakat emas
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree" aria-expanded="false">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>
                                                
                                            </div>
                                        </div>
                                    </div>
                            </div>

                            <div class="modal-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>

            <!-- zakat payment -->
                <div class="modal fade" id="zakat" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header" style="background-color:#4fc143">
                                  <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                  <h3 style="color: white" class="modal-title"><i class="material-icons">payment</i> Payment </h3>
                            </div>

                            <div class="modal-body">
                                        
                                    <div class="row">
                                        <div class="col-xs-4" style="text-align: center;">
                                            <div class="photo">
                                                <img style="width: 100px" id="d_foto_user" src="" />
                                            </div>
                                            <h4 id="d_nama_user"></h4>
                                            
                                        </div>
                                        <div class="col-xs-8">
                                            <h4>Transfer zakat <span id="jenis_zakat"></span></h4>
                                            <div class="form-group label-floating is-empty">
                                                
                                                <input disabled="" class="form-control" type="digit" id="d_nilai_zakat">
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">Nomor rekening</label>
                                                <input class="form-control" type="digit" id="d_norek_zakat">
                                            <span class="material-input"></span></div>

                                            <div class="form-group label-floating is-empty">
                                                <label class="control-label">CVV</label>
                                                <input class="form-control" type="digit" id="d_koderek_zakat">
                                            <span class="material-input"></span></div>
                                            <!-- <div class="form-group label-floating is-empty">
                                                <label class="control-label">Expired</label>
                                                <input class="form-control" type="text">
                                            <span class="material-input"></span></div> -->

                                            <a data-dismiss="modal" class="btn btn-success btn-block" onclick="zakat_sekarang()"><i class="material-icons">account_balance_wallet</i>Zakat sekarang</a>
                                        </div>
                                    </div>
                            </div>

                            <div class="modal-footer">
                                
                            </div>
                        </div>
                    </div>
                </div>

            <!-- infaq -->
                <div class="modal fade" id="infaq" align="center" role="dialog">
                    <div class="modal-dialog" id="width_infaq" style="width: 60%">
                        <div class="modal-content" style="border-radius: 0px">
                            <div class="modal-header" hidden="" style="background-color:#4fc143">
                                  <button type="button" class="close" data-dismiss="modal"><i style="color: white;font-size: 20px" class="material-icons">close</i></button>
                                  <h3 style="color: white" class="modal-title"><i class="material-icons">payment</i> Payment </h3>
                            </div>

                            <div class="modal-body" style="padding-top:0px; padding-right:15px; padding-bottom:0px; padding-left:15px">
                                        
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-12" style="text-align: left; min-height: 500px">
                                            <div class="row">
                                                <div class="col-xs-10" style="background-color: #4fc143;">
                                                    <h4 style="color: white"><i class="material-icons">payment</i>Payment</h4>
                                                </div>
                                                <div class="col-xs-2" align="right" style="background-color: #4fc143;">
                                                    <h4 data-dismiss="modal" style="color: white; cursor: pointer;"><i class="material-icons">close</i></h4>
                                                </div>
                                            </div>

                                            <div class="row" style="margin-top: 20px">
                                                <div class="col-xs-3">
                                                    <div class="photo">
                                                        <img class="img-circle" style="width: 50px; height: 50px" id="d_foto_user2" src="" />
                                                    </div>
                                                </div>
                                                <div class="col-xs-9">
                                                    <p style="margin-bottom: 0px">Dermawan</p>
                                                    <h4 style="margin-top: 0px" id="d_nama_user2"></h4>
                                                </div>
                                            </div>
                                            
                                            <div class="row" style="margin-left: 0px; margin-right: 0px">

                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">email</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty">
                                                            <p  style="margin-top: 0px;"><b id="d_email_user2">a@a.com</b></p>
                                                        </div>
                                                </div>
                                                <div class="input-group">
                                                        <span class="input-group-addon nomargin">
                                                            <i class="material-icons">settings_phone</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty nomargin" style="padding: 0px">
                                                            <p style="margin-top: 0px;"><b id="d_hp_user2">08723235323</b></p>
                                                        </div>
                                                </div>

                                                <p style="padding: 5px; color: #4fc143; background-color: whitesmoke; margin-left: 15px; margin-top: 15px">Kode transfer anda akan dikirim ke nomor HP dan email diatas</p>

                                                <div class="input-group">
                                                        <span class="input-group-addon">
                                                            <i class="material-icons">keyboard</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty">
                                                            <label class="control-label">Nilai transfer
                                                                <small>(required)</small>
                                                            </label>
                                                            <input id="d_input_infaq" onchange="get_total_infaq()" class="form-control" type="digit">
                                                        <span class="material-input"></span></div>
                                                </div>

                                                <div class="input-group">
                                                        <span class="input-group-addon nomargin">
                                                            <i class="material-icons">info_outline</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty nomargin" style="padding: 0px">
                                                            <p style="margin-bottom: 0px">Biaya administrasi</p>
                                                            <p style="margin-top: 0px;"><b>Rp. 5.000</b></p>
                                                        </div>
                                                </div>

                                                <div class="input-group">
                                                        <span class="input-group-addon nomargin">
                                                            <i class="material-icons">swap_horiz</i>
                                                        </span>
                                                        <div class="form-group label-floating is-empty nomargin" style="padding: 0px">
                                                            <p style="margin-bottom: 0px">Total infaq</p>
                                                            <h4 style="margin-top: 0px; margin-bottom: 0px ;color: #4fc143"><b>Rp. </b><b id="d_total_infaq">0</b></h4>
                                                        </div>
                                                </div>
                                                
                                            </div>
                                            
                                        </div>
                                        <div class="col-sm-8 col-xs-12 ScrollStyle" align="left" style="background-color: whitesmoke; min-height: 500px">

                                            <h4 style="color: #4fc143"><i class="material-icons">payment</i>  Pilih cara pembayaran anda</h4>

                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                                <div class="panel panel-default">
                                                    <div style="padding: 10px 10px 10px 15px; background-color: white; border-bottom: unset" class="panel-heading" role="tab" id="headingOne2">
                                                        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne2" aria-expanded="false" aria-controls="collapseOne2">
                                                            <h4 class="panel-title">
                                                                Mandiri
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseOne2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne2">
                                                        <div class="panel-body" style="padding: 15px 15px 5px; background-color: rgb(236, 240, 241)">

                                                            <ul class="timeline timeline-simple">
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge danger">
                                                                        <i class="material-icons">card_travel</i>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Silahkan pergi ke gerai indomaret / alfamart terdekat dan bayar kepada kasir dengan menyebutkan "Pembayaran Jasa Telkom - Finpay".</p>
                                                                        </div>
                                                                        <h6>
                                                                            <i class="ti-time"></i> 11 hours ago via Twitter
                                                                        </h6>
                                                                    </div>
                                                                </li>
                                                                <li class="timeline-inverted">
                                                                    <div class="timeline-badge success">
                                                                        <i class="material-icons">extension</i>
                                                                    </div>
                                                                    <div class="timeline-panel">
                                                                        
                                                                        <div class="timeline-body">
                                                                            <p>Silahkan berikan kode pembayaran yang anda dapat pada saat pemesanan tanpa menggunakan angka 0 di depannya 021xxxxxxxxxx (13 digit).</p>
                                                                        </div>
                                                                    </div>
                                                                </li>
                                                            </ul>

                                                            <a data-dismiss="modal" class="btn btn-success pull-right" onclick="infaq_sekarang()"><i class="material-icons">account_balance_wallet</i>Infaq sekarang</a>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="panel panel-default">
                                                    <div style="padding: 10px 10px 10px 15px; background-color: white; border-bottom: unset" class="panel-heading" role="tab" id="headingTwo">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo2" aria-expanded="false" aria-controls="collapseTwo2">
                                                            <h4 class="panel-title">
                                                                Indomaret
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo2">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="panel panel-default">
                                                    <div style="padding: 10px 10px 10px 15px; background-color: white; border-bottom: unset" class="panel-heading" role="tab" id="headingThree">
                                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                            <h4 class="panel-title">
                                                                BNI
                                                                <i class="material-icons">keyboard_arrow_down</i>
                                                            </h4>
                                                        </a>
                                                    </div>
                                                    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                                                        <div class="panel-body">
                                                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                                                        </div>
                                                    </div>
                                                </div>

                                            </div>

                                            
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            


            <footer class="footer">
                <div class="container-fluid">
                    
                    <p class="copyright pull-right">
                         © 2017 Yayasan Saling Bantu
                    </p>
                </div>
            </footer>
        </div>

 </div>
</body>


</html>


    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->
    <script src="<?=base_url("assets/dashboard/js/jquery-3.1.1.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/front/js/jquery.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/front/js/circle_progress.js"); ?>" type="text/javascript"></script>

    <script src="<?=base_url("assets/dashboard/js/jquery-ui.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/bootstrap.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/material.min.js"); ?>" type="text/javascript"></script>
    <script src="<?=base_url("assets/dashboard/js/perfect-scrollbar.jquery.min.js"); ?>" type="text/javascript"></script>





    <!-- Forms Validations Plugin -->
    <!-- <script src="<?=base_url("assets/dashboard/js/jquery.validate.min.js"); ?>" type="text/javascript"></script> -->

    <!--  Plugin for Date Time Picker and Full Calendar Plugin-->
    <script src="<?=base_url("assets/dashboard/js/moment.min.js"); ?>" type="text/javascript"></script>


    <!--  Charts Plugin -->
     <script src="<?=base_url("assets/dashboard/js/chartist.min.js"); ?>" type="text/javascript"></script>

    <!--  Plugin for the Wizard -->
    <script src="<?=base_url("assets/dashboard/js/jquery.bootstrap-wizard.js"); ?>" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="<?=base_url("assets/dashboard/js/bootstrap-notify.js"); ?>" type="text/javascript"></script>

    <!-- DateTimePicker Plugin -->
    <script src="<?=base_url("assets/dashboard/js/bootstrap-datetimepicker.js"); ?>" type="text/javascript"></script>

    <!-- Vector Map plugin -->
    <script src="<?=base_url("assets/dashboard/js/jquery-jvectormap.js"); ?>" type="text/javascript"></script>
    <!-- Sliders Plugin -->
    <script src="<?=base_url("assets/dashboard/js/nouislider.min.js"); ?>" type="text/javascript"></script>

    <!--  Google Maps Plugin    -->
    <!-- <script src="https://maps.googleapis.com/maps/api/js"></script> -->

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
        .nomargin{
            margin: 0px;
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

        .ScrollStyle
        {
            max-height: 500px;
            overflow-y: scroll;
        }
    </style>

    <style type="text/css">
        /*cicrcle progress bar*/
            .circles {
              margin-bottom: -10px;
            }

            .circle {
              width: 50px;
              margin: 0px;
              display: inline-block;
              position: relative;
              text-align: center;
              line-height: 1.2;
            }

            .circle canvas {
              vertical-align: top;
            }

            .circle strong {
              position: absolute;
              top: 5px;
              left: 0px;
              width: 50px;
              text-align: center;
              line-height: 40px;
              font-size: 20px;
            }

            .circle strong i {
              font-style: normal;
              font-size: 0.6em;
              font-weight: normal;
            }

            .circle span {
              display: block;
              color: #aaa;
              margin-top: 12px;
            }

            

            @media (max-height: 600px), (max-width: 480px) {
              .credits {
                position: inherit;
              }
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
    $(document).ready(function() {
        get_content('Dashboard');
        detect_screen();
        set_payment();
        set_foto_profile();
        
    });



    function dashboard_change_format(id){
        if (id == 'target_dana') {
            var target_dana = $('#target_dana').val().replace(/,/g , '');
            $("#target_dana").val(accounting.formatNumber(target_dana));
        }
    }


    function set_foto_profile(){
        $.ajax({
                url : "<?php echo site_url('Dashboard/load_detil_user')?>",
                type: "POST",
                data: { 
                  //"page" : page
                },
                dataType: "JSON",
                success: function(data)
                {
                    
                    if (data.img != 'assets/img/foto/user.png') {
                        $('#foto_user_exist3').attr('src', '<?php echo base_url()?>/assets/img/foto/'+data.img);
                    }
                    else{
                        $('#foto_user_exist3').attr('src', '<?php echo base_url()?>assets/img/foto/user.png');
                    }
                    
                },
                
            });
    }


    function verifikasi_akun_saya(status){
        $.ajax({
                url : "<?php echo site_url('Dashboard/verifikasi_akun_saya')?>",
                type: "POST",
                data: { 
                  "status" : status
                },
                dataType: "JSON",
                success: function(data)
                {
                    
                   detect_profile();
                    
                },
                
        });  
    }

    function detect_profile(){
        $.ajax({
                url : "<?php echo site_url('Dashboard/detect_profile')?>",
                type: "POST",
                data: { 
                  //"page" : page
                },
                dataType: "JSON",
                success: function(data)
                {
                    
                    if (data.st_validasi == 'PENDING') {

                        $('#notif_profile_pending1').show();
                        $('#notif_profile_pending2').show();
                        $('#notif_profile_pending3').show();
                        $('#btn_tambah_kegiatan').attr('disabled', true);
                        
                    }
                    else if(data.st_validasi == 'PENGAJUAN'){
                        $('#notif_profile_pengajuan2').show();
                        $('#notif_profile_pengajuan1').show();
                        $('#notif_profile_pengajuan3').show();
                        $('#btn_tambah_kegiatan').attr('disabled', true);
                        $('#notif_profile_pending1').hide();
                        $('#notif_profile_gagal1').hide();
                    }
                    else if(data.st_validasi == 'VALID'){
                        if (data.st_notif == 'CLOSE') {
                            $('#notif_profile_sukses2').hide();
                            $('#notif_profile_sukses3').hide();
                            $('#notif_profile_sukses1').hide();
                        }
                        else{
                            $('#notif_profile_sukses2').show();
                            $('#notif_profile_sukses3').show();
                            $('#notif_profile_sukses1').show();
                        }
                        $('#btn_tambah_kegiatan').attr('disabled', false);
                    }
                    else if(data.st_validasi == 'INVALID'){
                        $('#notif_profile_gagal2').show();
                        $('#notif_profile_gagal1').show();
                        $('#notif_profile_gagal3').show();
                        $('#btn_tambah_kegiatan').attr('disabled', true);
                    }
                    
                },
                
            });
    }





    function set_payment(){
        $.ajax({
                url : "<?php echo site_url('Dashboard/load_detil_user')?>",
                type: "POST",
                data: { 
                  //"page" : page
                },
                dataType: "JSON",
                success: function(data)
                {
                    $('#d_foto_user').attr('src', '<?php echo base_url()?>assets/img/foto/'+data.img);
                    $('#d_nama_user').text(data.nama);
                    $('#d_foto_user2').attr('src', '<?php echo base_url()?>assets/img/foto/'+data.img);
                    $('#d_nama_user2').text(data.nama);
                    $('#d_email_user2').text(data.email);
                    $('#d_hp_user2').text(data.hp);
                },
                
        });
       
    }


    function detect_screen(){
        
        var width = $(window).width();

        if (width <= 800 ) {
            layar = 'small';
            $('#width_infaq').css('width', '90%');
            
        }
        else if (width > 800) {
            layar = 'big';
        }
        else if (width <= 480) {
            layar = 'extrasmall';
            
        }
    }

    $('#menu_sidebar').on('click', 'li', function() {
        $('#menu_sidebar li.active').removeClass('active');
        $(this).addClass('active');
    });

    function get_content(page){
        if (page == 'Front') {
            window.location.href = '<?php echo base_url()?>Front/';
        }
        else{
            $('#content_dashboard').empty();
            $.ajax({
                url : "<?php echo site_url('Dashboard/get_content')?>",
                type: "POST",
                data: { 
                  "page" : page
                },
                dataType: "html",
                success: function(data)
                {
                    $('#content_dashboard').html(data);
                },
                
            });
        }
               
    }


    function logout(){
        window.location.href = '<?php echo base_url()?>Front/logout';
    }

</script>

   
