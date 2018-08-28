<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Front extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');


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

    public function indexx() {
        $this->load->view('Detect');

    }  

    public function Home() {
        $this->load->view('Home/Home');
    }

         
    
    public function index() {
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
                if ($this->session->userdata('status_login') == 'session_habis') {
                    $a = "login";
                }
                else{
                    $a = "salingbantu";
                }

            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "status_login" => $a,
                "biaya_payment" => $row->biaya_payment,
            );
        }
        $this->load->view('layout/Header_front');
        $this->load->view('Home', $data);
        //$this->load->view('Home');
    }

    public function mobile() {
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
                if ($this->session->userdata('status_login') == 'session_habis') {
                    $a = "login";
                }
                else{
                    $a = "salingbantu";
                }

            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "status_login" => $a,
                "biaya_payment" => $row->biaya_payment,
            );
        }
        $this->load->view('layout/Header_administrator');
        $this->load->view('layout/Sidebar_administrator');
        $this->load->view('Mobile');
    }





    public function circle() {
        $this->load->view('Circle');
    }

    public function desktop(){
        
       $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
                if ($this->session->userdata('status_login') == 'session_habis') {
                    $a = "login";
                }
                else{
                    $a = "salingbantu";
                }

            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "status_login" => $a,
                "biaya_payment" => $row->biaya_payment,
            );
        }
        $this->load->view('layout/Header_front_desktop');
        $this->load->view('Home', $data);
    }



    public function resume_salingbantu(){
        $query1 = $this->db->query("SELECT COUNT(id) AS jumlah_donatur FROM user WHERE st_donasi = 'DONASI'");
        foreach ($query1->result() as $row1) {
            $jumlah_donatur = $row1->jumlah_donatur;
        }

        $query2 = $this->db->query("SELECT COUNT(id_kegiatan) AS jumlah_kegiatan FROM kegiatan WHERE tercapai_dana != '0'");
        foreach ($query2->result() as $row2) {
            $jumlah_kegiatan = $row2->jumlah_kegiatan;
        }

        $query3 = $this->db->query("SELECT SUM(nilai_donasi) AS nilai_donasi FROM donasiku");
        foreach ($query3->result() as $row3) {
            $nilai_donasi = $row3->nilai_donasi;
        }

        


        echo json_encode(array("jumlah_donatur"=>$jumlah_donatur, "jumlah_kegiatan"=>$jumlah_kegiatan, "nilai_donasi"=>$nilai_donasi));
    }

    // get content html
    public function get_content_desktop(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }

        $page = $this->input->post('page');
        echo $this->load->view($page, $data);
    }

        public function get_content(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        $page = $this->input->post('page');
        $this->load->view('layout/Header_front');
        $this->load->view($page, $data);
    }

    public function kepedulian_kami(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Kepedulian_kami", $data);
    }


    public function Jaringan_global(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Jaringan_global", $data);
    }

    public function Berita_foto(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Berita_foto", $data);

    }

    public function Program_yayasan(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Program_yayasan", $data);
    }

    public function Kegiatan_sosial(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Kegiatan_sosial", $data);
    }

    public function Berita_video(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Berita_video", $data);
        
    }

    public function Donasi_online2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Donasi_online2", $data);
    }

    public function Donasi_trf2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Donasi_trf2", $data);
    }

    public function Sejarah2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Sejarah2", $data);
    }

    public function Halaman_kami(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Halaman_kami", $data);
    }

    public function Management2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Management2", $data);
    }

    public function Mitra2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Mitra2", $data);
    }
    
    public function Karir2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Karir2", $data);
    }

    public function Kontak2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Kontak2", $data);
    }

    public function Donasi_sekarang2(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Donasi_sekarang2", $data);
    }

    public function Detail_kegiatan_sosial(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Detail_kegiatan_sosial", $data);
    }

    public function Detail_program_yayasan(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Detail_program_yayasan", $data);
    }

    public function Detail_foto(){
        $query = $this->db->query("SELECT * from general_information");
        foreach ($query->result() as $row) {
            $data = array(
                "alamat" => $row->alamat,
                "nama_website" => $row->nama_website,
                "email" => $row->email,
                "telephone" => $row->telephone,
                "deskripsi_singkat" => $row->deskripsi_singkat,
            );
        }
        
        $this->load->view('layout/Header_front');
        $this->load->view("Front/Detail_foto", $data);
    }












    public function get_content_page(){
        $page = $this->input->post('page');
        $section = $this->input->post('section');

        $data = $this->db->query("SELECT * from konten_front where page = '$page' and section = '$section'")->row();
        echo json_encode($data);
    }


    public function register(){
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $pwd = md5($this->input->post('password'));

        // /generate
        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row) {
            $date = $row->sekarang;
        }

        $query = $this->db->query("SELECT id from user order by id desc limit 1");
        $count = $query->num_rows();
        if($count==0) {
            $id_user ="001";
        }
        else
            {
                foreach ($query->result() as $row) {
                    $a = substr($row->id,13); 
                    $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                    $new=intval($counter)+1;         //digit terahit ditambah 1
                }
                if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                   $vcounter="000". '' .$new;
                }
                if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter="0". '' .$new;
                }
                if (strlen($new)==3){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter=$new;
                }
                $id_user = $date.$vcounter;
            }
            

        $query = $this->db->query("SELECT * from user where email = '$email'");
        $count = $query->num_rows();
        if ($count == 0) {
            $query2 = $this->db->query("INSERT into user (id, st_validasi, nama, password, img, email, level, st, date) values ('$id_user','PENDING','$nama', '$pwd', 'user.png','$email', 'USER','ACTIVE', NOW())");
            echo json_encode(array('st'=>'success'));
        }
        else{
            echo json_encode(array('st'=>'failed', 'email'=>$email));
        }
        
    }

    public function login(){
        $email = $this->input->post('email');
        $pwd = md5($this->input->post('password'));
        $query = $this->db->query("SELECT * from user where email = '$email' and password = '$pwd' and st = 'ACTIVE'");
        $count = $query->num_rows();
        if ($count == 1) {
            foreach ($query->result() as $row) {
                $row_data['level_user'] = $row->level;
                $row_data['id_user'] = $row->id;
                $row_data['nama_user'] = $row->nama;
                $row_data['foto_user'] = $row->img;
                $row_data['status_login'] = "session_berlaku";
                $this->session->set_userdata($row_data);
                echo json_encode(array('st'=>'success', 'level'=>$row->level ));
            }
        }
        else{
            echo json_encode(array('st'=>'failed'));
        }
    }


    public function logout(){
        $this->session->unset_userdata('level_user');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama_user');
        $this->session->unset_userdata('status_login');
        $this->index();
    }


    public function get_kegiatan(){
        $kategori = $this->input->post('kategori');
        $judul = $this->input->post('judul');
        $limit = $this->input->post('limit');

        if ($kategori != 'Semua' and $judul == '') {
            $data = $this->db->query("SELECT kegiatan.`id_kegiatan`, kategori_kegiatan.`nama_kategori`, kegiatan.`judul`, kegiatan.`deskripsi`, kegiatan.`target_dana`, kegiatan.`target_hari`,
            kegiatan.`gambar_utama`, kegiatan.`status`, kegiatan.`tercapai_dana`, kegiatan.`sisa_dana`, kegiatan.`total_hari`, kegiatan.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM kegiatan
            JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE kegiatan.`status` != 'BLOKIR' AND kategori_kegiatan.`status` != 'NONACTIVE' and kegiatan.`status` != 'DRAFT' and kegiatan.`status` != 'PENGAJUAN' and kategori = '$kategori'")->result();
        }

        if ($judul != '' and $kategori == 'Semua') {
            $data = $this->db->query("SELECT kegiatan.`id_kegiatan`, kategori_kegiatan.`nama_kategori`, kegiatan.`judul`, kegiatan.`deskripsi`, kegiatan.`target_dana`, kegiatan.`target_hari`,
            kegiatan.`gambar_utama`, kegiatan.`status`, kegiatan.`tercapai_dana`, kegiatan.`sisa_dana`, kegiatan.`total_hari`, kegiatan.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM kegiatan
            JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE kegiatan.`status` != 'BLOKIR' AND kategori_kegiatan.`status` != 'NONACTIVE' and kegiatan.`status` != 'DRAFT' and kegiatan.`status` != 'PENGAJUAN' and judul LIKE '%$judul%'")->result();
        }

        if ($kategori == 'Semua' and $judul == '' and $limit != '3') {
            $data = $this->db->query("SELECT kegiatan.`id_kegiatan`, kategori_kegiatan.`nama_kategori`, kegiatan.`judul`, kegiatan.`deskripsi`, kegiatan.`target_dana`, kegiatan.`target_hari`,
            kegiatan.`gambar_utama`, kegiatan.`status`, kegiatan.`tercapai_dana`, kegiatan.`sisa_dana`, kegiatan.`total_hari`, kegiatan.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM kegiatan
            JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE kegiatan.`status` != 'BLOKIR' AND kategori_kegiatan.`status` != 'NONACTIVE' and kegiatan.`status` != 'DRAFT' and kegiatan.`status` != 'PENGAJUAN'")->result();
        }
        else if ($kategori == 'Semua' and $judul == '' and $limit == '3') {
            $data = $this->db->query("SELECT kegiatan.`id_kegiatan`, kategori_kegiatan.`nama_kategori`, kegiatan.`judul`, kegiatan.`deskripsi`, kegiatan.`target_dana`, kegiatan.`target_hari`,
            kegiatan.`gambar_utama`, kegiatan.`status`, kegiatan.`tercapai_dana`, kegiatan.`sisa_dana`, kegiatan.`total_hari`, kegiatan.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM kegiatan
            JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE kegiatan.`status` != 'BLOKIR' AND kategori_kegiatan.`status` != 'NONACTIVE' and kegiatan.`status` != 'DRAFT' and kegiatan.`status` != 'PENGAJUAN' limit 3")->result();
        }

        
        echo json_encode($data);
    }


    public function get_program(){
        $kategori = $this->input->post('kategori');
        $judul = $this->input->post('judul');
        $limit = $this->input->post('limit');
        $urut = $this->input->post('urut');
        if ($urut == '') {
            $urut == 'ASC';
        }

        if ($kategori != 'Semua' and $judul == '') {
            $data = $this->db->query("SELECT program_terkini.`id`, kategori_kegiatan.`nama_kategori`, program_terkini.`judul`, program_terkini.`deskripsi`, program_terkini.`target_dana`, program_terkini.`target_hari`, program_terkini.`gambar_utama`, program_terkini.`status`, program_terkini.`tercapai_dana`, program_terkini.`sisa_dana`, program_terkini.`total_hari`, 
                program_terkini.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM program_terkini
            JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE program_terkini.`status` != 'BLOKIR' AND program_terkini.`status` != 'NONACTIVE' AND program_terkini.`status` != 'DRAFT' AND program_terkini.`status` != 'PENGAJUAN' AND program_terkini.`kategori` = '$kategori' ORDER by program_terkini.`date` $urut")->result();
        }

        if ($judul != '' and $kategori == 'Semua') {
            $data = $this->db->query("SELECT program_terkini.`id`, kategori_kegiatan.`nama_kategori`, program_terkini.`judul`, program_terkini.`deskripsi`, program_terkini.`target_dana`, program_terkini.`target_hari`, program_terkini.`gambar_utama`, program_terkini.`status`, program_terkini.`tercapai_dana`, program_terkini.`sisa_dana`, program_terkini.`total_hari`, 
                program_terkini.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM program_terkini
            JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE program_terkini.`status` != 'BLOKIR' AND program_terkini.`status` != 'NONACTIVE' AND program_terkini.`status` != 'DRAFT' AND program_terkini.`status` != 'PENGAJUAN' and program_terkini.`judul` LIKE '%$judul%' ORDER by program_terkini.`date` $urut")->result();
        }

        if ($kategori == 'Semua' and $judul == '' and $limit != '3') {
            $data = $this->db->query("SELECT program_terkini.`id`, kategori_kegiatan.`nama_kategori`, program_terkini.`judul`, program_terkini.`deskripsi`, program_terkini.`target_dana`, program_terkini.`target_hari`, program_terkini.`gambar_utama`, program_terkini.`status`, program_terkini.`tercapai_dana`, program_terkini.`sisa_dana`, program_terkini.`total_hari`, 
                program_terkini.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM program_terkini
            JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE program_terkini.`status` != 'BLOKIR' AND program_terkini.`status` != 'NONACTIVE' AND program_terkini.`status` != 'DRAFT' AND program_terkini.`status` != 'PENGAJUAN' ORDER by program_terkini.`date` $urut")->result();
        }
        else if ($kategori == 'Semua' and $judul == '' and $limit == '3') {
            $data = $this->db->query("SELECT program_terkini.`id`, kategori_kegiatan.`nama_kategori`, program_terkini.`judul`, program_terkini.`deskripsi`, program_terkini.`target_dana`, program_terkini.`target_hari`, program_terkini.`gambar_utama`, program_terkini.`status`, program_terkini.`tercapai_dana`, program_terkini.`sisa_dana`, program_terkini.`total_hari`, 
                program_terkini.`sisa_hari`, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
            FROM program_terkini
            JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori`
            WHERE program_terkini.`status` != 'BLOKIR' AND program_terkini.`status` != 'NONACTIVE' AND program_terkini.`status` != 'DRAFT' AND program_terkini.`status` != 'PENGAJUAN' limit $limit ")->result();
        }

        
        echo json_encode($data);
    }


    public function get_berita(){
        $urut = $this->input->post('urut');
        if ($urut == '') {
            $urut == 'ASC';
        }
        $data = $this->db->query("SELECT id, judul, deskripsi, img, DATE_FORMAT(waktu, '%d-%m-%Y') as waktu FROM berita WHERE st = 'ACTIVE' ORDER BY waktu $urut")->result();
        echo json_encode($data);
    }

    public function get_berita_total(){
        $data = $this->db->query("SELECT COUNT(id) as total FROM berita WHERE st = 'ACTIVE'")->row();
        echo json_encode($data);
    }

    public function get_video_total(){
        $data = $this->db->query("SELECT COUNT(id) as total FROM video WHERE st = 'ACTIVE'")->row();
        echo json_encode($data);
    }

    public function get_berita_front(){
        $data = $this->db->query("SELECT id, judul, deskripsi, img, DATE_FORMAT(waktu, '%d') AS tgl, DATE_FORMAT(waktu, ' - %M - ') AS bln, DATE_FORMAT(waktu, '%Y') AS th FROM berita WHERE st = 'ACTIVE' ORDER BY waktu DESC LIMIT 3")->result();
        echo json_encode($data);
    }

    public function get_image_kegiatan(){
        $id = $this->input->post('id');
        $data = $this->db->query("SELECT img FROM img_kegiatan WHERE id_kegiatan = '$id'")->result();
        echo json_encode($data);
    }

    public function get_image_program(){
        $id = $this->input->post('id');
        $data = $this->db->query("SELECT img FROM img_program WHERE id_program = '$id'")->result();
        echo json_encode($data);
    }

    public function get_list_donatur(){
        $data = $this->db->query("SELECT  user.`img`, user.`nama`
        FROM    donasiku
        JOIN user ON donasiku.`id_user` = user.`id`
        WHERE id_user != 'D' GROUP BY id_user")->result();
        echo json_encode($data);
    }
    

    public function get_list_dukungan(){
        $data = $this->db->query("SELECT  img
        FROM    partner
        WHERE   st = 'ACTIVE'")->result();
        echo json_encode($data);
    }


    public function get_list_video(){
        $urut = $this->input->post('urut');
        if ($urut == '') {
            $urut == 'ASC';
        }
        $data = $this->db->query("SELECT  embed, link, deskripsi, DATE_FORMAT(waktu, '%d-%m-%Y') as waktu
        FROM    video
        WHERE   st = 'ACTIVE' ORDER BY waktu $urut")->result();
        echo json_encode($data);
    }

    public function preview_kegiatan(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, target_dana, target_hari, gambar_utama, kategori_kegiatan.`nama_kategori`, user.`nama`, user.`img`, kegiatan.`date`, id_kegiatan, kegiatan.`status`, target_dana, tercapai_dana
        FROM kegiatan
        JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
        JOIN user ON kegiatan.`id_user` = user.`id`
        WHERE kegiatan.`id_kegiatan` = '$id'")->row();
      echo json_encode($data);
    }


    public function preview_program(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, target_dana, target_hari, gambar_utama, kategori_kegiatan.`nama_kategori`, program_terkini.`date`, id, program_terkini.`status`, target_dana, tercapai_dana, DATE_FORMAT(tanggal_berakhir, '%d-%m-%Y') as tanggal_berakhir
        FROM program_terkini
        JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori`
        WHERE program_terkini.`id` = '$id'")->row();
      echo json_encode($data);
    }


    public function preview_program_terkini(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT program_terkini.`id`, program_terkini.`judul`, program_terkini.`deskripsi`, program_terkini.`target_dana`, program_terkini.`target_hari`, 
            program_terkini.`gambar_utama`, kategori_kegiatan.`nama_kategori`, provinsi.`nama_provinsi`, kota.`nama_kota`, program_terkini.`sisa_hari`, program_terkini.`tercapai_dana`
            FROM program_terkini 
            JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori`
            JOIN provinsi ON program_terkini.`provinsi` = provinsi.`id`
            JOIN kota ON program_terkini.`kota` = kota.`id`
            WHERE program_terkini.`id` = '$id'")->row();
      echo json_encode($data);
    }


    public function preview_jaringan_global(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT jaringan_global.`id`, jaringan_global.`judul`, jaringan_global.`deskripsi`, jaringan_global.`target_dana`, jaringan_global.`target_hari`, 
            jaringan_global.`gambar_utama`, kategori_kegiatan.`nama_kategori`, provinsi.`nama_provinsi`, kota.`nama_kota`, jaringan_global.`sisa_hari`, jaringan_global.`tercapai_dana`
            FROM jaringan_global 
            JOIN kategori_kegiatan ON jaringan_global.`kategori` = kategori_kegiatan.`id_kategori`
            JOIN provinsi ON jaringan_global.`provinsi` = provinsi.`id`
            JOIN kota ON jaringan_global.`kota` = kota.`id`
            WHERE jaringan_global.`id` = '$id'")->row();
      echo json_encode($data);
    }


    public function detil_berita2(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, img, DATE_FORMAT(waktu, '%d-%m-%Y') as waktu from berita where id = '$id'")->row();
      echo json_encode($data);
    }


    public function daftar_donatur(){
      $id = $this->input->post('id');
      $jenis = $this->input->post('jenis');

      $data=$this->db->query("SELECT user.`nama`, donasiku.`nilai_donasi`, donasiku.`waktu`,user.`img`
      FROM donasiku
      JOIN user ON donasiku.`id_user` = user.`id`
      WHERE donasiku.`id_kegiatan` = '$id' and jenis_donasi = '$jenis' order by waktu asc")->result();
        echo json_encode($data);
    }


    public function foto_pendukung(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT img, desk
      FROM img_kegiatan
      WHERE id_kegiatan = '$id'")->result();
        echo json_encode($data);
    }

    public function foto_pendukung_prg(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT img, desk
      FROM img_program
      WHERE id_program = '$id'")->result();
        echo json_encode($data);
    }


    public function laporan_kegiatan(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, img, DATE_FORMAT(waktu, '%d-%m-%Y') as waktu FROM laporan_kegiatan WHERE id_kegiatan = '$id' order by waktu desc")->result();
        echo json_encode($data);
    }

    public function laporan_program(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, img, DATE_FORMAT(waktu, '%d-%m-%Y') as waktu FROM laporan_program WHERE id_program = '$id' order by waktu desc")->result();
        echo json_encode($data);
    }


    public function list_berita_next(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT * from berita where id != '$id' and st = 'ACTIVE' order by waktu desc")->result();
        echo json_encode($data);
    }


    public function donasi_kegiatan(){
      $id_kegiatan = $this->input->post('id_kegiatan');
      $nilai_donasi = $this->input->post('nilai_donasi');
      if ($this->session->userdata('id_user') == "" or $this->session->userdata('id_user') == null) {
          $user = "D";
      }else{
            $user = $this->session->userdata('id_user');
      }
      

        //generate id
        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d') as sekarang");
        foreach ($query_date->result() as $row) {
            $date = $row->sekarang;
        }
        

        $query = $this->db->query("SELECT id from donasiku order by id desc limit 1");
                $count = $query->num_rows();
                if($count==0) {
                    $id_donasi = $date.$user."001";
                }
                else
                {
                    foreach ($query->result() as $row) {
                        $a = substr($row->id,9); 
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
                    $id_donasi = $date.$user.$vcounter;
                }


      $data=$this->db->query("INSERT into donasiku (id, id_kegiatan, id_user, nilai_donasi, waktu) values ('$id_donasi', '$id_kegiatan', '$user', '$nilai_donasi', NOW())");

      //response to kegiatan
      $query2 = $this->db->query("SELECT tercapai_dana, sisa_dana from kegiatan where id_kegiatan = '$id_kegiatan'");
      foreach ($query2->result() as $row) {
        $tercapai = $row->tercapai_dana + $nilai_donasi;
        $sisa = $row->sisa_dana - $nilai_donasi;
      }
      $query3 = $this->db->query("UPDATE kegiatan set tercapai_dana = '$tercapai', sisa_dana = '$sisa' where id_kegiatan = '$id_kegiatan'");

        echo json_encode(array("status"=>true));
    }
   
    public function load_detil_user(){
      $user = $this->session->userdata('id_user');
        $data = $this->db->query("SELECT * from user where id = '$user'")->row();
        echo json_encode($data);
    }



    public function get_program_terkini(){

        $data = $this->db->query("SELECT program_terkini.`id`, program_terkini.`judul`, program_terkini.`deskripsi`, program_terkini.`target_dana`, program_terkini.`target_hari`, 
            program_terkini.`gambar_utama`, kategori_kegiatan.`nama_kategori`, provinsi.`nama_provinsi`, kota.`nama_kota`, program_terkini.`sisa_hari`, program_terkini.`tercapai_dana`
            FROM program_terkini 
            JOIN kategori_kegiatan ON program_terkini.`kategori` = kategori_kegiatan.`id_kategori`
            JOIN provinsi ON program_terkini.`provinsi` = provinsi.`id`
            JOIN kota ON program_terkini.`kota` = kota.`id`
            WHERE program_terkini.`status` = 'LIVE'
        order by date desc")->result();
        echo json_encode($data);
    }


    public function get_jaringan_global(){

        $data = $this->db->query("SELECT jaringan_global.`id`, jaringan_global.`judul`, jaringan_global.`deskripsi`, jaringan_global.`target_dana`, jaringan_global.`target_hari`, 
            jaringan_global.`gambar_utama`, kategori_kegiatan.`nama_kategori`, provinsi.`nama_provinsi`, kota.`nama_kota`, jaringan_global.`sisa_hari`, jaringan_global.`tercapai_dana`
            FROM jaringan_global 
            JOIN kategori_kegiatan ON jaringan_global.`kategori` = kategori_kegiatan.`id_kategori`
            JOIN provinsi ON jaringan_global.`provinsi` = provinsi.`id`
            JOIN kota ON jaringan_global.`kota` = kota.`id`
            WHERE jaringan_global.`status` = 'LIVE'
        ORDER BY date DESC")->result();
        echo json_encode($data);
    }


}
