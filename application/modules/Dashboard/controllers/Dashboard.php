<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        // $this->load->library('image_lib');
        // $this->load->library('upload');
        $this->load->model('M_dashboard','M_dashboard');

        if ($this->session->userdata('id_user') == null or $this->session->userdata('id_user') == "") {
            $this->session->set_userdata("status_login", "session_habis");
            redirect('Front/home');
        }
        if ($this->session->userdata('level_user') != 'USER') {
            redirect('Front/home');
        }



         //Setting language in session on first load
        if(!$this->session->userdata('site_lang')){ 
          $this->load->library('session');
          $newdata = array(
            'site_lang'  => $this->config->item('language')
          );
          $this->session->set_userdata($newdata);
        }
              //Loading language from session variable
        $this->language = $this->session->userdata['site_lang']; 
        $this->lang->load('messages',$this->language);
    }    
    
    public function index() {
        redirect('/Dashboard/home');
    }

    


    public function home(){
        $this->load->view('layout/Header_dashboard');
        $this->load->view('layout/Sidebar_dashboard');
        $this->load->view('Home');
    }

    public function get_content(){
        $page = $this->input->post('page');
        echo $this->load->view($page);
    }
   
    public function tambah_kegiatan(){

        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row3) {
            $date = $row3->sekarang;
        }

        $query = $this->db->query("SELECT id_kegiatan from kegiatan order by id_kegiatan desc limit 1");
        $count = $query->num_rows();
        if($count==0) {
            $id_kegiatan = $date."001";
        }
        else
        {
            foreach ($query->result() as $row) {
                $a = substr($row->id_kegiatan,12); 
                $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                $new=intval($counter)+1;         //digit terahit ditambah 1
            }
            if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                   $vcounter="00". '' .$new;
            }
            if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter="0". '' .$new;
            }
            if (strlen($new)==3){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter=$new;
            }
            $id_kegiatan = $date.$vcounter;

            //echo $vcounter; echo $a; echo " - "; echo $row->id_kegiatan;
        }
         
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $target_dana = $this->input->post('target_dana');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $deskripsi = $this->input->post('deskripsi');
        $id_user = $this->session->userdata('id_user');

        $query_insert = $this->db->query("INSERT into kegiatan (provinsi, kota,id_kegiatan, id_user, kategori, judul, target_dana, tercapai_dana, sisa_dana, target_hari, total_hari, sisa_hari, deskripsi, status, date) values ('$provinsi','$kota','$id_kegiatan', '$id_user', '$kategori', '$judul', '$target_dana', '0', '$target_dana' ,'$jangka_waktu', '0', '$jangka_waktu' ,'$deskripsi', 'DRAFT' ,NOW())");
        echo json_encode(array("status"=>true, "id"=>$id_kegiatan));
    }   


    function update_kegiatan(){
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $target_dana = $this->input->post('target_dana');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $deskripsi = $this->input->post('deskripsi');
        $id = $this->input->post('id');
        $query_update = $this->db->query("UPDATE kegiatan set kategori = '$kategori', judul = '$judul', provinsi = '$provinsi', kota='$kota', deskripsi = '$deskripsi', target_dana='$target_dana', target_hari='$jangka_waktu' where id_kegiatan = '$id'");
        echo json_encode(array("status"=>true));
    }



    function upload_file($id) {
        //upload file
        $config['upload_path'] = 'assets/img/content/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture']['name'])) {
            if (0 < $_FILES['wizard-picture']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture')) {
                        //delete kegiatan
                        $query_insert = $this->db->query("DELETE kegiatan where id_kegiatan = '$id'");
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE kegiatan set gambar_utama = '$nama' where id_kegiatan = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    


    function upload_file_foto() {
      $id = $this->session->userdata('id_user');
        //upload file
        $config['upload_path'] = 'assets/img/foto/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture2']['name'])) {
            if (0 < $_FILES['wizard-picture2']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture2']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture2']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture2']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture2')) {
                        //delete kegiatan
                        // $query_insert = $this->db->query("DELETE kegiatan where id_kegiatan = '$id'");
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE user set img = '$nama' where id = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    function upload_file_foto2() {
      $id = $this->session->userdata('id_user');
        //upload file
        $config['upload_path'] = 'assets/img/kartu_identitas/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_identitas']['name'])) {
            if (0 < $_FILES['wizard-picture_identitas']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_identitas']['error'];
            } 
            else {
                if (file_exists('assets/img/kartu_identitas/' . $_FILES['wizard-picture_identitas']['name'])) {
                    echo 'File already exists :' . $_FILES['wizard-picture_identitas']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_identitas')) {
                        //delete kegiatan
                        // $query_insert = $this->db->query("DELETE kegiatan where id_kegiatan = '$id'");
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE user set img_ki = '$nama' where id = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    public function get_kegiatan(){
      $user = $this->session->userdata('id_user');
        $data = $this->db->query("SELECT kegiatan.`id_kegiatan`, kategori_kegiatan.`nama_kategori`, kegiatan.`judul`, kegiatan.`deskripsi`, kegiatan.`target_dana`, kegiatan.`target_hari`, 
        kegiatan.`gambar_utama`, kegiatan.`status`, kegiatan.`tercapai_dana`, kegiatan.`sisa_dana`, kegiatan.`total_hari`, kegiatan.`sisa_hari`, kota.`nama_kota`
        FROM kegiatan
        JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
        JOIN kota on kegiatan.`kota` = kota.`id`
        WHERE  kegiatan.`id_user` = '$user' order by date desc")->result();
        echo json_encode($data);
    }



    public function get_kategori(){
        $data = $this->db->query("SELECT * from kategori_kegiatan where status = 'ACTIVE' order by nama_kategori")->result();
        echo json_encode($data);
    }


    public function load_provinsi(){
        $data = $this->db->query("SELECT * from provinsi order by nama_provinsi")->result();
        echo json_encode($data);
    }


    public function load_kota(){
      $prov = $this->input->post('id');
        $data = $this->db->query("SELECT * from kota where id_provinsi = '$prov' order by nama_kota")->result();
        echo json_encode($data);
    }



    function load_table_donasi(){
        $layar = $this->input->post('layar');
       $list = $this->M_dashboard->m_load_table('donasi');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            
            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = $hasil->judul; 
                $row[] = number_format($hasil->nilai_donasi); 
                $row[] = $hasil->waktu; 
                
            }
            // else{
            //     $row[] = $hasil->nama_kategori.'<br>'.'<p style="color:'.$color.'">'.$hasil->status.'</p>'; 
            //     $row[] = '<div class="pull-right"><a href="#" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons" style="font-size:30px">edit</i></a><a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            // }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_dashboard->count_filtered('donasi'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_img_kegiatan(){
        $layar = $this->input->post('layar');
       $list = $this->M_dashboard->m_load_table('img_kegiatan');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

                $row[] = '<img class="img" src="<?php echo base_url()?>assets/img/content/'.$hasil->img.'" style="width: 100%">'; 
                $row[] = '<div class="pull-right"><a href="#" onclick="delete_img('.$hasil->id.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
                
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_dashboard->count_filtered('img_kegiatan'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_zakat(){
        $layar = $this->input->post('layar');
       $list = $this->M_dashboard->m_load_table('zakat');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            
            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = $hasil->jenis; 
                $row[] = number_format($hasil->nilai_zakat); 
                $row[] = $hasil->waktu; 
            }
            else{
                $row[] = "<p style='margin-left:-25px'>".$hasil->jenis."</p>";  
                $row[] = number_format($hasil->nilai_zakat); 
                $row[] = $hasil->waktu; 
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_dashboard->count_filtered('zakat'),
                       "data" => $data,
               );
       echo json_encode($output);
    }

    function load_table_infaq(){
        $layar = $this->input->post('layar');
       $list = $this->M_dashboard->m_load_table('infaq');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

                $row[] = $no; 
                $row[] = number_format($hasil->nilai_infaq); 
                $row[] = $hasil->waktu; 
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_dashboard->count_filtered('infaq'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    public function load_detil_user(){
      $user = $this->session->userdata('id_user');
        $data = $this->db->query("SELECT * from user where id = '$user'")->row();
        echo json_encode($data);
    }

    public function simpan_data_user(){
      $user = $this->session->userdata('id_user');
      $nama = $this->input->post('nama');
      $email = $this->input->post('email');
      $alamat = $this->input->post('alamat');
      $hp = $this->input->post('hp');
      $bio = $this->input->post('bio');
      $provinsi = $this->input->post('provinsi');
      $kota = $this->input->post('kota');
      $jenis_ki = $this->input->post('jenis_ki');

      $data = $this->db->query("UPDATE user set nama = '$nama', email = '$email', alamat = '$alamat', biography = '$bio', hp = '$hp', provinsi = '$provinsi', kota = '$kota', jenis_ki = '$jenis_ki' where id = '$user'");
        echo json_encode(array("status" => true));
    }



    public function verifikasi_akun_saya(){
      $user = $this->session->userdata('id_user');
      $status = $this->input->post('status');

      if ($status == 'CLOSE') {
        $data = $this->db->query("UPDATE user set st_notif = '$status' where id = '$user'");
      }
      else{
        $data = $this->db->query("UPDATE user set st_validasi = '$status' where id = '$user'");
      }
      echo json_encode(array("status" => true));
    }


    public function preview_kegiatan(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, target_dana, target_hari, gambar_utama, kategori_kegiatan.`nama_kategori`, user.`nama`, user.`img`, kegiatan.`date`, id_kegiatan, kegiatan.`status`, target_dana, tercapai_dana, sisa_hari
        FROM kegiatan
        JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
        JOIN user ON kegiatan.`id_user` = user.`id`
        WHERE kegiatan.`id_kegiatan` = '$id'")->row();
      echo json_encode($data);
    }


    public function daftar_donatur(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT user.`nama`, donasiku.`nilai_donasi`, donasiku.`waktu`,user.`img`
      FROM donasiku
      JOIN user ON donasiku.`id_user` = user.`id`
      WHERE donasiku.`id_kegiatan` = '$id' order by waktu asc")->result();
        echo json_encode($data);
    }




    public function laporan_kegiatan(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, img, DATE_FORMAT(waktu, '%d-%m-%Y') as waktu FROM laporan_kegiatan WHERE id_kegiatan = '$id' order by waktu desc")->result();
        echo json_encode($data);
    }


    public function update_laporan_kegiatan(){
      $id_kegiatan = $this->input->post('id');
      $judul = $this->input->post('judul');
      $deskripsi = $this->input->post('deskripsi');


        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row3) {
            $date = $row3->sekarang;
        }

        $query = $this->db->query("SELECT id_lap from laporan_kegiatan order by id_lap desc limit 1");
        $count = $query->num_rows();
        if($count==0) {
            $id_laporan = $date."001";
        }
        else
        {
            foreach ($query->result() as $row) {
                $a = substr($row->id_lap,12); 
                $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                $new=intval($counter)+1;         //digit terahit ditambah 1
            }
            if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                   $vcounter="00". '' .$new;
            }
            if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter="0". '' .$new;
            }
            if (strlen($new)==3){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter=$new;
            }
            $id_laporan = $date.$vcounter;
        }

      $data=$this->db->query("INSERT into laporan_kegiatan (id_lap, id_kegiatan, judul, deskripsi, waktu) values ('$id_laporan', '$id_kegiatan', '$judul', '$deskripsi', NOW())");
        echo json_encode(array("status"=>true, "id_kegiatan"=>$id_laporan));
    }




    public function upload($send) {
            list($id, $halaman, $input, $detil_halaman) = explode(":", $send);

           
            $upload_path = 'assets/img/'.$halaman.'/';
            $config['upload_path'] = $upload_path;
            $config['allowed_types'] = 'jpg|png|gif';
            $config['max_size'] = '0';
            $config['max_filename'] = '255';
            $config['file_name']            = $id;
            $image_data = array();

                $this->load->library('upload', $config);
                if ($this->upload->do_upload($input)) {

                    $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 650;
                    $config['height'] = 600;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
                }
                    $file = $upload_path . $image_data['file_name'];
                    $data['resize_img'] = $upload_path . $image_data['file_name'];
                    //$this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
                    $nama = $this->upload->data('file_name');

                if ($image_data['file_name'] != "") {
                    
                    //if kegiatan
                    if ($halaman == 'content') {
                      if ($detil_halaman == 'content_pendukung') {
                        $query = $this->db->query("SELECT id from img_kegiatan where id_kegiatan = '$id' order by id desc limit 1");
                        $count = $query->num_rows();
                        if($count==0) {
                            $id_img = $id."01";
                        }
                        else
                        {
                            foreach ($query->result() as $row) {
                                $a = substr($row->id,15); 
                                $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                                $new=intval($counter)+1;         //digit terahit ditambah 1
                            }
                            if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                               $vcounter="0". '' .$new;
                            }
                            if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                               $vcounter=$new;
                            }
                            $id_img = $id.$vcounter;
                        }
                        // insert img
                        $query2 = $this->db->query("INSERT into img_kegiatan (id, id_kegiatan, img) values ('$id_img', '$id', '$nama')");
                      }
                      else if ($detil_halaman == 'content_utama') {
                        $query = $this->db->query("SELECT gambar_utama from kegiatan where id_kegiatan = '$id'");
                        foreach ($query->result() as $row) {
                          unlink("assets/img/content/".$row->gambar_utama);
                        }
                        $query2 = $this->db->query("UPDATE kegiatan set gambar_utama = '$nama' where id_kegiatan = '$id'");
                      }
                    }
                }

                
        echo json_encode(array("data"=>true, "messages"=>$data, "nama"=>$nama, "halaman"=>$halaman));
    }





    function upload_file_update_kegiatan($id) {
        //upload file
        $config['upload_path'] = 'assets/img/laporan_kegiatan/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_update']['name'])) {
            if (0 < $_FILES['wizard-picture_update']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_update']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_update']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_update']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_update')) {
                        //delete kegiatan
                        $query_insert = $this->db->query("DELETE laporan_kegiatan where id_lap = '$id'");
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE laporan_kegiatan set img = '$nama' where id_lap = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    public function zakat_sekarang(){
      $id_user = $this->session->userdata('id_user');
      $nilai_zakat = $this->input->post('nilai_zakat');
      $jenis = $this->input->post('jenis');

      //generate id
        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row) {
            $date = $row->sekarang;
        }
        

        $query = $this->db->query("SELECT id from zakatku order by id desc limit 1");
                $count = $query->num_rows();
                if($count==0) {
                    $id_zakat = $date."001";
                }
                else
                {
                    foreach ($query->result() as $row) {
                        $a = substr($row->id,13); 
                        $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                        $new=intval($counter)+1;         //digit terahit ditambah 1
                    }
                    if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                       $vcounter="00". '' .$new;
                    }
                    if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                       $vcounter="0". '' .$new;
                    }
                    if (strlen($new)==3){  //jika counter yg didapat panjangnya 2 ex: 11
                       $vcounter=$new;
                    }
                    $id_zakat = $date.$vcounter;
                }

      $data=$this->db->query("INSERT into zakatku (id, id_user, jenis, nilai_zakat, waktu) values ('$id_zakat', '$id_user', '$jenis', '$nilai_zakat', NOW())");
        echo json_encode(array("status"=>true));
    }

    public function get_resume_total(){
      $id_user = $this->session->userdata('id_user');
      $data = $this->db->query("SELECT COUNT(kegiatan.`id_kegiatan`) AS kegiatan, SUM(kegiatan.`tercapai_dana`) AS donasi_masuk, SUM(donasiku.`nilai_donasi`) AS donasi_keluar,
      SUM(zakatku.`nilai_zakat`) AS zakatku, SUM(infaqku.`nilai_infaq`) AS infaqku
      FROM user
      JOIN kegiatan ON user.`id` = kegiatan.`id_user`
      JOIN donasiku ON user.`id` = donasiku.`id_user`
      JOIN zakatku ON user.`id` = zakatku.`id_user`
      JOIN infaqku ON user.`id` = infaqku.`id_user`
      WHERE user.`id` = '$id_user'")->row();
      echo json_encode($data);
    }


    public function detect_profile(){
      $id_user = $this->session->userdata('id_user');
      $data = $this->db->query("SELECT st_validasi, st_notif from user where id = '$id_user'")->row();
      echo json_encode($data);
    }


    public function infaq_sekarang(){
      $id_user = $this->session->userdata('id_user');
      $nilai_infaq = $this->input->post('nilai_infaq');
      //generate id
        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row) {
            $date = $row->sekarang;
        }
        

        $query = $this->db->query("SELECT id from infaqku order by id desc limit 1");
                $count = $query->num_rows();
                if($count==0) {
                    $id_infaq = $date."001";
                }
                else
                {
                    foreach ($query->result() as $row) {
                        $a = substr($row->id,13); 
                        $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                        $new=intval($counter)+1;         //digit terahit ditambah 1
                    }
                    if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                       $vcounter="00". '' .$new;
                    }
                    if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                       $vcounter="0". '' .$new;
                    }
                    if (strlen($new)==3){  //jika counter yg didapat panjangnya 2 ex: 11
                       $vcounter=$new;
                    }
                    $id_infaq = $date.$vcounter;
                }

      $data=$this->db->query("INSERT into infaqku (id, id_user, nilai_infaq, waktu) values ('$id_infaq', '$id_user', '$nilai_infaq', NOW())");
        echo json_encode(array("status"=>true));
    }


    public function verifikasi_kegiatan(){
      $id = $this->input->post('id');
      $data=$this->db->query("UPDATE kegiatan set status = 'PENGAJUAN' where id_kegiatan = '$id'");
        echo json_encode(array("status"=>true));
    }

    public function hapus_kegiatan(){
      $id = $this->input->post('id');
      $data=$this->db->query("DELETE from kegiatan where id_kegiatan = '$id'");
        echo json_encode(array("status"=>true));
    }

    public function delete_image(){
      $id = $this->input->post('id');
      $query1 = $this->db->query("SELECT img from img_kegiatan where id = '$id'");
      foreach ($query1->result() as $row) {
        unlink("assets/img/content/".$row->img);
      }
      $query=$this->db->query("DELETE from img_kegiatan where id = '$id'");
      echo json_encode(array("status"=>true));
    }

    public function load_image(){
      $id = $this->input->post('id');
        $data = $this->db->query("SELECT id, img
        FROM    img_kegiatan
        WHERE   id_kegiatan = '$id'")->result();
        echo json_encode($data);
    }


    public function check_st_upload(){
      $id = $this->input->post('id');
        $query = $this->db->query("SELECT id from img_kegiatan where id_kegiatan = '$id'");
        $count = $query->num_rows();
        echo json_encode(array("jml"=>$count));
    }

    public function preview_kegiatan_edit(){
      $id = $this->input->post('id');
        $data = $this->db->query("SELECT * from kegiatan where id_kegiatan = '$id'")->row();
        echo json_encode($data);
    }

    public function load_image_utama(){
      $id = $this->input->post('id');
        $data = $this->db->query("SELECT gambar_utama from kegiatan where id_kegiatan = '$id'")->row();
        echo json_encode($data);
    }

}
