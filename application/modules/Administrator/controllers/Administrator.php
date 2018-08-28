<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Administrator extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('M_administrator','M_administrator');

        if ($this->session->userdata('id_user') == null or $this->session->userdata('id_user') == "") {
            $this->session->set_userdata("status_login", "session_habis");
            redirect('Front/home');
        }
        if ($this->session->userdata('level_user') != 'ADMINISTRATOR') {
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
        // redirect('/Administrator/home');
      $this->load->view('layout/Header_administrator');
      $this->load->view('layout/Sidebar_administrator');
      $this->load->view('Administrator/Home');
    }

    // public function home(){
    //     $this->load->view('layout/Header_administrator');
    //     $this->load->view('layout/Sidebar_administrator');
    //     $this->load->view('Home');
    // }

    public function get_content(){
        $page = $this->input->post('page');
        echo $this->load->view($page);
    }

   
    public function delete_kategori(){
        $id = $this->input->post('id');
        $query=$this->db->query("DELETE FROM kategori_kegiatan WHERE id_kategori = '$id'");
        echo json_encode();
    }

    public function update_kategori(){
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $status = $this->input->post('status');
        $query=$this->db->query("UPDATE kategori_kegiatan set nama_kategori = '$nama', status = '$status' where id_kategori='$id'");
        echo json_encode(array("status"=>true));
    }


    public function posting_jurnal(){
        $ntrans = $this->input->post('ntrans');
        $keterangan = $this->input->post('keterangan');

        $query=$this->db->query("UPDATE transaksi set st = 'POSTED', keterangan = '$keterangan' where ntrans ='$ntrans'");
        echo json_encode(array("status"=>true));
    }


    public function reverse_jurnal(){
        $ntrans = $this->input->post('ntrans');
        $keterangan = $this->input->post('keterangan');

        $query=$this->db->query("UPDATE transaksi set st = 'REVERSE', keterangan_reverse = '$keterangan' where ntrans ='$ntrans'");
        echo json_encode(array("status"=>true));
    }



    function generate_neraca(){
        //proses 1
        $query = $this->db->query("DELETE FROM pergsbb");
        $query=$this->db->query("SELECT account.`accbb`, account.`acc`, account.`keterangan`, dt_acckel.`gol`, dt_acckel.`subgol`, rekap.`debet`, rekap.`kredit`
          from rekap,account,accountbb,dt_acckel,dt_accjenis 
          where rekap.`acc` = account.`acc` and account.`accbb` = accountbb.`accbb` and accountbb.`acckel` =dt_acckel.`acckel` and dt_acckel.`accjenis`=dt_accjenis.`accjenis`
        order by accountbb.`accbb`, account.`acc`");

        foreach ($query->result() as $row) {
            $acc = $row->acc;
            $accbb = $row->accbb;
            $keterangan = $row->keterangan;
            $gol = $row->gol;
            $subgol = $row->subgol;
            $debet = $row->debet;
            $kredit = $row->kredit;
          
            $query=$this->db->query("INSERT INTO pergsbb (accbb,acc,keterangan,gol,subgol, debet,kredit)
                    VALUE('$accbb','$acc','$keterangan','$gol','$subgol', '$debet','$kredit')");
           
        }





        //proses 2
        $query3=$this->db->query("SELECT account.`accbb`, account.`acc`, account.`keterangan`, dt_acckel.`gol`, dt_acckel.`subgol` 
          from account,accountbb,dt_acckel 
          where account.`accbb`=accountbb.`accbb` and accountbb.`acckel`=dt_acckel.`acckel`");

        $count=$query3->num_rows();
        foreach ($query3->result() as $row) {
            $acc = $row->acc;
            $accbb = $row->accbb;
            $keterangan = $row->keterangan;
            $gol = $row->gol;
            $subgol = $row->subgol;

            $trans=$this->db->query("SELECT sum(transaksi.`debet`) AS debet,sum(transaksi.`kredit`) AS kredit,
                                    sum(transaksi.`debet` + transaksi.`kredit`) AS total,transaksi.`st`
                                    from transaksi 
                                    where acc='$acc' AND transaksi.`st` ='POSTED'");

            foreach ($trans->result() as $q) {
                  $debet = $q->debet;
                  $kredit = $q->kredit;
                  $total = $q->total;
                  if($total != 0){
                    $query4=$this->db->query("SELECT acc FROM pergsbb WHERE acc='$acc'");
                    $count4=$query4->num_rows();

                    if($count4!=0) {

                        $query=$this->db->query("UPDATE pergsbb SET debet1 = '$debet', kredit1 = '$kredit' WHERE acc='$acc'");

                    }
                    else{
                        $query=$this->db->query("INSERT INTO pergsbb (accbb,acc, keterangan, gol, subgol, debet, kredit, debet1, kredit1, uid) VALUE('$accbb','$acc','$keterangan','$gol','$subgol', '0','0','$debet','$kredit', '')");
                    }
                  }
            }
            
        }





        //proses 3

        $query5=$this->db->query("UPDATE pergsbb SET debet2=(debet+(debet1-kredit1)) WHERE subgol='ASBB'");
        $query6=$this->db->query("UPDATE pergsbb SET debet2=(debet+(debet1-kredit1)) WHERE subgol='BYSBB'");
        $query7=$this->db->query("UPDATE pergsbb SET kredit2=(kredit+(kredit1-debet1)) WHERE subgol='PSBB'");
        $query8=$this->db->query("UPDATE pergsbb SET kredit2=(kredit+(kredit1-debet1)) WHERE subgol='PDSBB'");


        //proses 4
        $query9=$this->db->query("UPDATE pergsbb SET ldebet=debet2 WHERE subgol='BYSBB'");
        $query10=$this->db->query("UPDATE pergsbb SET lkredit=kredit2 WHERE subgol='PDSBB'");
        $query11=$this->db->query("UPDATE pergsbb SET ndebet=debet2 WHERE subgol='ASBB'");
        $query12=$this->db->query("UPDATE pergsbb SET nkredit=kredit2 WHERE subgol='PSBB'");




        //proses 5
        $query13=$this->db->query("SELECT SUM(lkredit-ldebet) AS labarugi FROM pergsbb ");
        foreach ($query13->result() as $row) {
            $labarugi = $row->labarugi;
        }

        $query14=$this->db->query("SELECT dt_lr.`lrbb`,account.`accbb`,account.`acc`,account.`keterangan`, dt_acckel.`gol`,dt_acckel.`subgol`
                                  FROM dt_lr,account,accountbb,dt_acckel,dt_accjenis
                                  WHERE dt_lr.`lrbb`=account.`acc` AND account.`accbb`=accountbb.`accbb` AND
                                  accountbb.`acckel`=dt_acckel.`acckel` AND
                                  dt_acckel.`accjenis`=dt_accjenis.`accjenis`
                                  ORDER BY accountbb.`accbb`,account.`acc`");
        foreach ($query14->result() as $row) {
            $acclr = $row->lrbb;
            $accbb = $row->accbb;
            $acc = $row->acc;
            $keterangan = $row->keterangan;
            $gol = $row->gol;
            $subgol = $row->subgol;

            $query15=$this->db->query("SELECT acc FROM pergsbb WHERE acc='$acclr'");
            $count15=$query15->num_rows();

            if($count15!=0) {
                $query16=$this->db->query("UPDATE pergsbb SET nkredit=nkredit+'$labarugi' WHERE acc='$acclr'");
            }
            else{
                $query17=$this->db->query("INSERT INTO pergsbb (accbb,acc,keterangan,gol,subgol, ndebet,nkredit) VALUE('$accbb','$acclr','$keterangan','$gol','$subgol', '0','$labarugi')");
            }
        }

    }

    function total(){
      $data=$this->db->query("SELECT SUM(debet) AS debet, SUM(kredit) AS kredit, SUM(debet1) AS debet1, SUM(kredit1) AS kredit1, SUM(debet2) AS debet2,  SUM(kredit2) AS kredit2, SUM(ldebet) AS ldebet, SUM(lkredit) AS lkredit, SUM(ndebet) AS ndebet, SUM(nkredit) AS nkredit FROM pergsbb")->row();
        echo json_encode($data);
    }

    function load_table_laporan_keu(){
       
       $list = $this->M_administrator->m_load_table('lap_keu');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $hasil->acc;
            $row[] = $hasil->keterangan;
            $row[] = $angka_format = number_format($hasil->debet,2,",",".");
            $row[] = $angka_format = number_format($hasil->kredit,2,",",".");

            $row[] = $angka_format = number_format($hasil->debet1,2,",",".");
            $row[] = $angka_format = number_format($hasil->kredit1,2,",",".");

            $row[] = $angka_format = number_format($hasil->debet2,2,",",".");
            $row[] = $angka_format = number_format($hasil->kredit2,2,",",".");

            $row[] = $angka_format = number_format($hasil->ldebet,2,",",".");
            $row[] = $angka_format = number_format($hasil->lkredit,2,",",".");

            $row[] = $angka_format = number_format($hasil->ndebet,2,",",".");
            $row[] = $angka_format = number_format($hasil->nkredit,2,",",".");
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('lap_keu'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_kategori(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('kategori');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $hasil->id_kategori; 
            if ($hasil->status == 'ACTIVE') {
                $color='green';
            }else{
                $color='red';
            }

            if ($layar == 'big') {
                $row[] = $hasil->nama_kategori; 
                $row[] = '<p style="color:'.$color.'">'.$hasil->status.'</p>'; 
                $row[] = '<div class="pull-right"><a href="#" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons" style="font-size:30px">edit</i></a><a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            }
            else{
                $row[] = $hasil->nama_kategori.'<br>'.'<p style="color:'.$color.'">'.$hasil->status.'</p>'; 
                $row[] = '<div class="pull-right"><a href="#" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons" style="font-size:30px">edit</i></a><a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('kategori'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_akun_jenis(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('jenis');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $hasil->accjenis; 
            $row[] = $hasil->jenis; 
            $row[] = '<div class="pull-right">
              <a onclick="preview_jenis('.$hasil->accjenis.')" href="#" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a>
              <a onclick="hapus_jenis('.$hasil->accjenis.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a>
              </div>';
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('jenis'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_laporan_transaksi(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('transaksi');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $no;
            $row[] = $hasil->tanggal; 
            $row[] = $hasil->keterangan; 
            $row[] = number_format($hasil->total); 
            if ($hasil->st == 'REVERSE') {
              $color = 'danger';
            }
            else if ($hasil->st == 'POSTED'){
              $color = 'info';
            }
            $row[] = '<span class="label label-'.$color.'">'.$hasil->st.'</span>' ;

            $row[] = '<div class="pull-right">
              <a onclick="info_transaksi('.$hasil->ntrans.')" href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a>
              </div>';
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('transaksi'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_akun_kelompok(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('kelompok');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $hasil->accjenis; 
            $row[] = $hasil->acckel; 
            $row[] = $hasil->kelompok; 
            $row[] = '<div class="pull-right">
              <a onclick="preview_kel('.$hasil->acckel.')" href="#" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a>
              <a onclick="hapus_kel('.$hasil->acckel.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a>
              </div>';
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('kelompok'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_akun_bb(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('bb');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $hasil->acckel; 
            $row[] = $hasil->accbb; 
            $row[] = $hasil->bukubesar; 
            $row[] = '<div class="pull-right">
              <a onclick="preview_bb('.$hasil->accbb.')" href="#" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a>
              <a onclick="hapus_bb('.$hasil->accbb.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a>
              </div>';
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('bb'),
                       "data" => $data,
               );
       echo json_encode($output);
    }

    function load_table_akun_sbb(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('sbb');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $hasil->accbb; 
            $row[] = $hasil->acc; 
            $row[] = $hasil->keterangan; 
            $row[] = '<div class="pull-right">
              <a onclick="preview_sbb('.$hasil->acc.')" href="#" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a>
              <a onclick="hapus_sbb('.$hasil->acc.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a>
              </div>';
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('sbb'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_ju(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('ju');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $no; 
            $row[] = $hasil->waktu; 
            $row[] = $hasil->acc; 
            $row[] = $hasil->keterangan; 
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('ju'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_cari_akun(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('cari_akun');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            $row[] = $no; 
            $row[] = $hasil->acc; 
            $row[] = $hasil->keterangan; 
            $row[] = '<div class="pull-right"><a data-dismiss="modal" onclick="pilih_akun('.$hasil->acc.')" href="#" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">check</i></a></div>';
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('cari_akun'),
                       "data" => $data,
               );
       echo json_encode($output);
    }

    function load_table_draft_jurnal(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('draft_jurnal');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            if ($this->input->post('halaman') == 'draft') {
                if ($hasil->st == 'POSTED') {
                  $row[] = '<div class="pull-left"><i class="material-icons" style="font-size:30px; color:#cfcfcf">not_interested</i></div>';
                }
                else if ($hasil->st == 'REVERSE') {
                  $row[] = '<div class="pull-left"><i class="material-icons" style="font-size:30px; color:#cfcfcf">not_interested</i></div>';
                }
                else if ($hasil->st == 'DRAFT'){
                  $row[] = '<div class="pull-left"><a  onclick="hapus_draft_jurnal('.$hasil->ide.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
                }
            }
            
            $row[] = $hasil->acc; 
            $row[] = $hasil->keterangan; 
            $row[] = '<p class="text-right">'.number_format($hasil->debet).'</p>'; 
            $row[] = '<p class="text-right">'.number_format($hasil->kredit).'</p>'; ; 
            
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('draft_jurnal'),
                       "data" => $data,
               );
       echo json_encode($output);
    }

    function load_table_jurnal_umum(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('jurnal_umum');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            if ($hasil->st == 'DRAFT') {
              $st = 'success';
            }
            else if($hasil->st == 'POSTED')
            {
              $st = 'info';
            }
            else if($hasil->st == 'REVERSE')
            {
              $st = 'danger';
            }
            

            $row[] = $no;
            $row[] = $hasil->tanggal; 
            $row[] = $hasil->keterangan; 
            $row[] = '<p >'.number_format($hasil->total_debet).'</p>'; 
            $row[] = '<p >'.number_format($hasil->total_kredit).'</p>'; 
            $row[] = '<span class="label label-'.$st.'">'.$hasil->st.'</span>'; 
            
            if ($hasil->st == 'DRAFT') {
              $row[] = '<div class="pull-right">
                <a  onclick="draft_jurnal('.$hasil->ntrans.')" href="#" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a>
                <a  onclick="hapus_jurnal('.$hasil->ntrans.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a>
              </div>';
            }
            else if($hasil->st == 'POSTED')
            {
              $row[] = '<div class="pull-right"><a data-dismiss="modal" onclick="posted_jurnal('.$hasil->ntrans.')" href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
            }
            else if($hasil->st == 'REVERSE')
            {
              $row[] = '<div class="pull-right"><a data-dismiss="modal" onclick="info_jurnal('.$hasil->ntrans.')" href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
            }
            
            
            
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('jurnal_umum'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_berita(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('berita');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();


            if ($hasil->st == 'ACTIVE') {
                $color='success';
            }
            else{
                $color='danger';
            }

            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = $hasil->judul; 
                $row[] = $hasil->deskripsi; 
                $row[] = '<img class="img-responsive" src="'.base_url().'assets/img/berita/'.$hasil->img.'" style="width: 60%">'; 
                $row[] = '<span class="label label-'.$color.'">'.$hasil->st.'</span>';
                
                if ($hasil->st == 'ACTIVE') {
                    $row[] = '<div class="pull-right">
                      <a href="#" onclick="nonaktifkan_berita('.$hasil->id.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">block</i></a>
                    </div>';
                }
                else if ($hasil->st == 'NONACTIVE') {
                    $row[] = '<div class="pull-right">
                      <a href="#" onclick="edit_berita('.$hasil->id.')" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">edit</i></a>
                      <a href="#" onclick="delete_berita('.$hasil->id.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a>
                      <a href="#" onclick="aktifkan_berita('.$hasil->id.')" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a>
                    </div>';
                }

            }
            else{
                $row[] = $hasil->nama_kategori.'<br>'.'<p style="color:'.$color.'">'.$hasil->status.'</p>'; 
                $row[] = '<div class="pull-right"><a href="#" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons" style="font-size:30px">edit</i></a><a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('berita'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_kegiatan(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('kegiatan');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            

            if ($hasil->status == 'LIVE') {
                $color='danger';
                $color2='red';
            }
            else if ($hasil->status == 'SELESAI') {
                $color='info';
                $color2 = '#36d1dc';
            }
            else if ($hasil->status == 'DRAFT') {
                $color='default';
                $color2='#009788';
            }
            else if ($hasil->status == 'BLOKIR') {
                $color='success';
                $color2='#4fc143';
            }
            else if ($hasil->status == 'PENGAJUAN') {
                $color='warning';
                $color2='#f9690e';
            }

            

            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = "<b>".$hasil->judul."</b><br>"."Kategori: ".$hasil->nama_kategori; 
                //$row[] = $hasil->nama_kategori; 

                $row[] = "Target: ".$hasil->target_hari." Hari"."<br>"."Berakhir: ".$hasil->tanggal_berakhir; 
                
                $row[] = "Target: ".number_format($hasil->target_dana)."<br>"."Tercapai: ".number_format($hasil->tercapai_dana); 

                $row[] = $hasil->nama; 

                $row[] = '<span class="label label-'.$color.'">'.$hasil->status.'</span>'; 

                if ($hasil->status == 'DRAFT') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="detil_kegiatan('.$hasil->id_kegiatan.')" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a></div>';
                }
                else if ($hasil->status == 'SELESAI') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="detil_kegiatan('.$hasil->id_kegiatan.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->status == 'LIVE') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="detil_live('.$hasil->id_kegiatan.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->status == 'BLOKIR') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="detil_block('.$hasil->id_kegiatan.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->status == 'PENGAJUAN') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="verifikasi_kegiatan('.$hasil->id_kegiatan.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                
            }
            else{
                if ($hasil->status == 'DRAFT') {
                  $a = "detil_kegiatan";
                }
                else if ($hasil->status == 'SELESAI') {
                  $a = "detil_kegiatan";
                }
                else if ($hasil->status == 'LIVE') {
                  $a = "detil_live";
                }
                else if ($hasil->status == 'BLOKIR') {
                  $a = "detil_block";
                }
                else if ($hasil->status == 'PENGAJUAN') {
                  $a = "verifikasi_kegiatan";
                }

                $row[] = "<div onclick='".$a."(".$hasil->id_kegiatan.")'><p style='margin-left:-20px'>".$hasil->judul."</p>".
                        "<p class='category' style='text-transform: uppercase; font-size:12px;margin-left:-20px'><i class='material-icons'>sort</i> ".$hasil->nama_kategori."</p>".
                        "<p class='category' style='text-transform: uppercase; font-size:12px;margin-left:-20px; margin-top:5px'><i class='material-icons'>perm_identity</i> ".$hasil->nama."</p></div>"; 
                
                $row[] = "<div onclick='".$a."(".$hasil->id_kegiatan.")'><p class='pull-right'>".number_format($hasil->target_dana)."</p><br>".
                        "<p class='category' style='margin-top:10px;font-size:12px;text-align:right'>".$hasil->target_hari." Hari</p><br>".
                        "<p class='category' style='font-weight:bold;margin-top:0px;text-align:right;font-size:15px;color:".$color2."'>".$hasil->status."</p></div>";
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('kegiatan'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_program_terkini(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('program_terkini');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            

            if ($hasil->status == 'LIVE') {
                $color='danger';
            }
            else if ($hasil->status == 'SELESAI') {
                $color='success';
            }
            else if ($hasil->status == 'DRAFT') {
                $color='info';
            }
            else if ($hasil->status == 'BLOKIR') {
                $color='warning';
            }

            

            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = "<b>".$hasil->judul."</b><br>"."Kategori: ".$hasil->nama_kategori; 


                $row[] = "Target: ".$hasil->target_hari." Hari"."<br>"."Tersisa: ".$hasil->sisa_hari." Hari"; 
                $row[] = "Target: ".number_format($hasil->target_dana)."<br>"."Tercapai: ".number_format($hasil->tercapai_dana); 

                $row[] = $hasil->nama_provinsi."<br>".$hasil->nama_kota; 

                $row[] = '<span class="label label-'.$color.'">'.$hasil->status.'</span>';

                if ($hasil->status == 'DRAFT') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="draft_program_terkini('.$hasil->id.')" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a>
                    <a href="#" onclick="delete_program_terkini('.$hasil->id.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
                }
                else if ($hasil->status == 'SELESAI') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="selesai_program_terkini('.$hasil->id.')" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->status == 'BLOKIR') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="selesai_program_terkini('.$hasil->id.')" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->status == 'LIVE') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="live_program_terkini('.$hasil->id.')" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                
            }
            else{
                $row[] = "<div onclick='verifikasi_kegiatan(".$hasil->id.")'><p style='margin-left:-20px'>".$hasil->judul."</p>".
                        "<p class='category' style='text-transform: uppercase; font-size:12px;margin-left:-20px'><i class='material-icons'>sort</i> ".$hasil->nama_kategori."</p></div>"; 
                $row[] = "<div onclick='verifikasi_kegiatan(".$hasil->id.")'><p class='pull-right'>".$hasil->target_dana."</p><br>".
                        "<p class='category' style='margin-top:10px;font-size:12px;text-align:right'>".$hasil->target_hari." Hari</p><br>".
                        "<p class='category' style='margin-top:0px;text-align:right;font-size:12px;color:".$color."'>".$hasil->status."</p></div>";
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('program_terkini'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_jaringan_g(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('jaringan_g');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            

            if ($hasil->status == 'LIVE') {
                $color='danger';
            }
            else if ($hasil->status == 'SELESAI') {
                $color='success';
            }
            else if ($hasil->status == 'DRAFT') {
                $color='info';
            }
            else if ($hasil->status == 'BLOKIR') {
                $color='warning';
            }

            

            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = "<b>".$hasil->judul."</b><br>"."Kategori: ".$hasil->nama_kategori; 


                $row[] = "Target: ".$hasil->target_hari." Hari"."<br>"."Tersisa: ".$hasil->sisa_hari." Hari"; 
                $row[] = "Target: ".number_format($hasil->target_dana)."<br>"."Tercapai: ".number_format($hasil->tercapai_dana); 

                $row[] = $hasil->nama_provinsi."<br>".$hasil->nama_kota; 

                $row[] = '<span class="label label-'.$color.'">'.$hasil->status.'</span>';

                if ($hasil->status == 'DRAFT') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="draft_jaringan_g('.$hasil->id.')" class="btn btn-simple btn-success btn-icon"><i class="material-icons" style="font-size:30px">border_color</i></a>
                    <a href="#" onclick="delete_jaringan_global('.$hasil->id.')" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
                }
                else if ($hasil->status == 'SELESAI') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="selesai_jaringan_g('.$hasil->id.')" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->status == 'BLOKIR') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="selesai_jaringan_g('.$hasil->id.')" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->status == 'LIVE') {
                  $row[] = '<div class="pull-right"><a href="#" onclick="live_jaringan_g('.$hasil->id.')" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                
            }
            else{
                $row[] = "<div onclick='verifikasi_kegiatan(".$hasil->id.")'><p style='margin-left:-20px'>".$hasil->judul."</p>".
                        "<p class='category' style='text-transform: uppercase; font-size:12px;margin-left:-20px'><i class='material-icons'>sort</i> ".$hasil->nama_kategori."</p></div>"; 
                $row[] = "<div onclick='verifikasi_kegiatan(".$hasil->id.")'><p class='pull-right'>".$hasil->target_dana."</p><br>".
                        "<p class='category' style='margin-top:10px;font-size:12px;text-align:right'>".$hasil->target_hari." Hari</p><br>".
                        "<p class='category' style='margin-top:0px;text-align:right;font-size:12px;color:".$color."'>".$hasil->status."</p></div>";
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('jaringan_g'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    function load_table_slider(){
      $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('slider');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

           
            if ($hasil->st == 'ACTIVE') {
                $color='green';
            }else{
                $color='red';
            }

            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = '<img class="img-responsive" src="'.base_url()."assets/img/slider/".$hasil->img.'" style="width: 50%">'; 
                // $row[] = '<p style="color:'.$color.'">'.$hasil->st.'</p>'; 
                $row[] = '<div class="pull-right"><a onclick="delete_slider('.$hasil->id.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            }
            else{
                $row[] = '<img class="img-responsive" src="'.base_url()."assets/img/slider/".$hasil->img.'" style="width: 60%">'; 
                $row[] = '<div class="pull-right"><a onclick="delete_slider('.$hasil->id.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('slider'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    
    function load_table_video(){
      $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('video');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();


            $row[] = $no; 
            

            $row[] = "<div class='card card-profile card-plain' style='margin-top: 10px'>".$hasil->embed."</div>";
                                  
                              
            $row[] = '<div class="pull-right"><a onclick="delete_video('.$hasil->id.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('video'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_dukungan(){
      $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('dukungan');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

           
            if ($hasil->st == 'ACTIVE') {
                $color='green';
            }else{
                $color='red';
            }

            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = '<img class="img-responsive" src="'.base_url()."assets/img/partners/".$hasil->img.'" style="width: 50%">'; 
                // $row[] = '<p style="color:'.$color.'">'.$hasil->st.'</p>'; 
                $row[] = '<div class="pull-right"><a onclick="delete_dukungan('.$hasil->id.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            }
            else{
                $row[] = '<img class="img-responsive" src="'.base_url()."assets/img/partners/".$hasil->img.'" style="width: 60%">'; 
                $row[] = '<div class="pull-right"><a onclick="delete_dukungan('.$hasil->id.')" href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">delete_forever</i></a></div>';
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('dukungan'),
                       "data" => $data,
               );
       echo json_encode($output);
    }
    



    function load_table_user(){
      $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('user');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

           
            if ($hasil->st == 'ACTIVE') {
                $color='success';
            }
            else if($hasil->st == 'NONACTIVE'){
                $color='danger';
            }

            if ($hasil->st_validasi == 'VALID') {
                $color2='success';
            }
            else if ($hasil->st_validasi == 'INVALID'){
                $color2='danger';
            }
            else if ($hasil->st_validasi == 'PENDING'){
                $color2='warning';
            }
            else if ($hasil->st_validasi == 'PENGAJUAN'){
                $color2='info';
            }

            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = '<img class="img-circle" src="'.base_url()."assets/img/foto/".$hasil->img.'" style="height: 35px; width: 35px">'.'   '.$hasil->nama;  
                $row[] = $hasil->email;  
                $row[] = $hasil->hp;  
                $row[] = $hasil->nama_provinsi.'<br>'.$hasil->nama_kota;  
                $row[] = '<span class="label label-'.$color.'">'.$hasil->st.'</span>'; 
                $row[] = '<span class="label label-'.$color2.'">'.$hasil->st_validasi.'</span>'; 

                if ($hasil->st_validasi == 'PENDING') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
                }
                else if ($hasil->st_validasi == 'PENGAJUAN') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->st_validasi == 'VALID') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
                }
                else if ($hasil->st_validasi == 'INVALID') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
                }
                
            }
            else{
                $row[] = '<div style="margin-left:-20px; text-align:center"><img class="img-circle" src="'.base_url()."assets/img/foto/".$hasil->img.'" style="width: 30px; height:30px"><br>'.$hasil->nama.'</div>'; 
                if ($hasil->st_validasi == 'VALID') {
                  $row[] = '<span class="label label-'.$color.'">'.$hasil->st.'</span>';
                }
                else{
                  $row[] = '<span class="label label-'.$color.'">'.$hasil->st_validasi.'</span>'; 
                }
                if ($hasil->st_validasi == 'PENDING') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
                }
                else if ($hasil->st_validasi == 'PENGAJUAN') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-danger btn-icon"><i class="material-icons" style="font-size:30px">launch</i></a></div>';
                }
                else if ($hasil->st_validasi == 'VALID') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
                }
                else if ($hasil->st_validasi == 'INVALID') {
                  $row[] = '<div onclick="detil_data_user('.$hasil->id.')" class="pull-right"><a href="#" class="btn btn-simple btn-info btn-icon"><i class="material-icons" style="font-size:30px">info_outline</i></a></div>';
                }
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('user'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_zakat(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('zakat');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

            
            if ($layar == 'big') {
                $row[] = $no; 
                $row[] = '<img class="img img-circle" src="'.base_url()."assets/img/foto/".$hasil->img.'" style="width: 40px; height:40px">'."     ".$hasil->nama; 
                $row[] = number_format($hasil->nilai_zakat); 
                $row[] = $hasil->waktu; 
            }
            else{
                $row[] = $no; 

                $row[] = $hasil->nama; 
                $row[] = number_format($hasil->nilai_zakat); 
                $row[] = $hasil->waktu; 
            }
            
            
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('zakat'),
                       "data" => $data,
               );
       echo json_encode($output);
    }



    function load_table_infaq(){
        $layar = $this->input->post('layar');
       $list = $this->M_administrator->m_load_table('infaq');
       $data = array();
       $no = $_POST['start'];
       foreach ($list as $hasil) {
           $no++;
           $row = array();

                $row[] = $no; 
                $row[] = '<img class="img img-circle" src="'.base_url()."assets/img/foto/".$hasil->img.'" style="width: 40px; height:40px">'."     ".$hasil->nama; 
                $row[] = number_format($hasil->nilai_infaq); 
                $row[] = $hasil->waktu; 
           
           $data[] = $row;
       }
       $output = array(
                       "draw" => $_POST['draw'],
                        "recordsFiltered" => $this->M_administrator->count_filtered('infaq'),
                       "data" => $data,
               );
       echo json_encode($output);
    }


    public function preview_kegiatan(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT judul, deskripsi, target_dana, target_hari, gambar_utama, kategori_kegiatan.`nama_kategori`, user.`nama`, user.`img`, kegiatan.`date`, id_kegiatan, target_hari, kegiatan.`status`
        FROM kegiatan
        JOIN kategori_kegiatan ON kegiatan.`kategori` = kategori_kegiatan.`id_kategori`
        JOIN user ON kegiatan.`id_user` = user.`id`
        WHERE kegiatan.`id_kegiatan` = '$id'")->row();
      echo json_encode($data);
    }

    public function preview_jenis(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT accjenis, jenis from dt_accjenis where accjenis = '$id'")->row();
      echo json_encode($data);
    }


    public function preview_kel(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT accjenis, acckel, kelompok from dt_acckel where acckel = '$id'")->row();
      echo json_encode($data);
    }


    public function preview_bb(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT acckel, accbb, bukubesar from accountbb where accbb = '$id'")->row();
      echo json_encode($data);
    }


    public function preview_sbb(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT acc, accbb, keterangan from account where acc = '$id'")->row();
      echo json_encode($data);
    }


    public function load_table_kategori2(){
        $query=$this->db->query("SELECT * from kategori_kegiatan order by id_kategori");
        $data = array();
           
           foreach ($query->result() as $hasil) {
               
               $row = array();

               $row[] = $hasil->id_kategori; 
               $row[] = $hasil->nama_kategori; 
               $row[] = $hasil->status; 
               $row[] = '<a href="#" class="btn btn-simple btn-success btn-icon edit"><i class="material-icons" style="font-size:30px">edit</i></a>
                        <a href="#" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons" style="font-size:30px">delete_forever</i></a>';
               
               $data[] = $row;
        }
        echo json_encode(array("data"=>$data));
    }

    public function tambah_kategori()
    {
      $nama = $this->input->post('nama');
      $query=$this->db->query("INSERT into kategori_kegiatan (nama_kategori, status) values ('$nama', 'ACTIVE')");
      echo json_encode(array("status"=>true));
    }


    public function tambah_akun_jenis()
    {
      $nama = $this->input->post('nama_akun_jenis');

      $query1 = $this->db->query("SELECT accjenis from dt_accjenis order by accjenis desc limit 1");
      foreach ($query1->result() as $row) {
        $id = $row->accjenis + 1;
      }

      $query=$this->db->query("INSERT into dt_accjenis (accjenis, jenis) values ('$id','$nama')");
      echo json_encode(array("status"=>true));
    }


    public function tambah_akun_kel()
    {
      $nama_akun_kel = $this->input->post('nama_akun_kel');
      $id_jenis = $this->input->post('id_jenis');

      $query1 = $this->db->query("SELECT acckel from dt_acckel where accjenis = '$id_jenis' order by acckel desc limit 1");
      foreach ($query1->result() as $row) {
        $id = substr($row->acckel,1)+1;
        $acc_kel = $id_jenis.$id;
      }

      $query=$this->db->query("INSERT into dt_acckel (accjenis, acckel, kelompok) values ('$id_jenis','$acc_kel', '$nama_akun_kel')");
      echo json_encode(array("status"=>true));
    }


    public function tambah_akun_bb()
    {
      $nama_akun_bb = $this->input->post('nama_akun_bb');
      $id_kel = $this->input->post('id_kel');

      $query1 = $this->db->query("SELECT accbb from accountbb where acckel = '$id_kel' order by accbb desc limit 1");
      foreach ($query1->result() as $row) {
        $a = substr($row->accbb,2); 
        $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
        $new=intval($counter)+1;         //digit terahit ditambah 1
      }
      if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
        $vcounter="0". '' .$new;
      }
      if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
        $vcounter=$new;
      }
      $accbb = $id_kel.$vcounter;

     

      $query=$this->db->query("INSERT into accountbb (acckel, accbb, bukubesar) values ('$id_kel','$accbb', '$nama_akun_bb')");
      echo json_encode(array("status"=>true));
    }


    public function tambah_akun_sbb()
    {
      $nama_akun_sbb = $this->input->post('nama_akun_sbb');
      $id_bb = $this->input->post('id_bb');

      $query1 = $this->db->query("SELECT acc from account where accbb = '$id_bb' order by acc desc limit 1");


                foreach ($query1->result() as $row) {
                    $a = substr($row->acc,4); 
                    $counter=intval($a); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.
                    $new=intval($counter)+1;         //digit terahit ditambah 1
                }
                if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
                   $vcounter="0". '' .$new;
                }
                if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
                   $vcounter=$new;
                }
                $acc = $id_bb.$vcounter;



      $query=$this->db->query("INSERT into account (accbb, acc, keterangan) values ('$id_bb','$acc', '$nama_akun_sbb')");
      echo json_encode(array("status"=>true));
    }


    public function block_kegiatan()
    {
      $id = $this->input->post('id');
      $query=$this->db->query("UPDATE kegiatan set status = 'BLOCK' where id_kegiatan = '$id'");
      echo json_encode(array("status"=>true));
    }


    public function validasi_data_diri()
    {
      $st = $this->input->post('st');
      $id_user = $this->input->post('id_user');
      $query=$this->db->query("UPDATE user set st_validasi = '$st' where id = '$id_user'");
      echo json_encode(array("status"=>true));
    }

    public function load_detil_user(){
      $id = $this->input->post('id');
        $data = $this->db->query("SELECT nama, email, img, alamat, hp, jenis_ki, biography, provinsi.`nama_provinsi`, kota.`nama_kota`, st_validasi, user.`id`, img_ki
          FROM user 
          JOIN provinsi ON user.`provinsi` = provinsi.`id`
          JOIN kota ON user.`kota` = kota.`id`
          WHERE user.`id` = '$id'")->row();
        echo json_encode($data);
    }


    public function resume_administrator(){
      $q1 = $this->db->query("SELECT COUNT(kegiatan.`id_kegiatan`) AS total_kegiatan_aktif FROM kegiatan WHERE 
        status ='LIVE'");
      foreach ($q1->result() as $row) {
        $total_kegiatan_aktif = $row->total_kegiatan_aktif;
      }


      $q10 = $this->db->query("SELECT COUNT(kegiatan.`id_kegiatan`) AS total_kegiatan_selesai FROM kegiatan WHERE 
        status ='SELESAI'");
      foreach ($q10->result() as $row) {
        $total_kegiatan_selesai = $row->total_kegiatan_selesai;
      }


      $q2 = $this->db->query("SELECT SUM(nilai_donasi) AS total_donasi FROM donasiku WHERE jenis_donasi = 'KEGIATAN'");
      foreach ($q2->result() as $row) {
        $total_donasi = $row->total_donasi;
      }

      $q3 = $this->db->query("SELECT SUM(nilai_zakat) AS total_zakat FROM zakatku");
      foreach ($q3->result() as $row) {
        $total_zakat = $row->total_zakat;
      }

      $q4 = $this->db->query("SELECT SUM(nilai_infaq) AS total_infaq FROM infaqku");
      foreach ($q4->result() as $row) {
        $total_infaq = $row->total_infaq;
      }

      $q5 = $this->db->query("SELECT COUNT(id) AS total_dermawan FROM user WHERE st_donasi = 'DONASI'");
      foreach ($q5->result() as $row) {
        $total_dermawan = $row->total_dermawan;
      }

      $q6 = $this->db->query("SELECT COUNT(id_kegiatan) AS menunggu_validasi_k FROM kegiatan WHERE status = 'PENGAJUAN'");
      foreach ($q6->result() as $row) {
        $menunggu_validasi_k = $row->menunggu_validasi_k;
      }

      $q7 = $this->db->query("SELECT COUNT(id) AS menunggu_validasi_u FROM user WHERE st_validasi = 'PENGAJUAN'");
      foreach ($q7->result() as $row) {
        $menunggu_validasi_u = $row->menunggu_validasi_u;
      }

      $q8 = $this->db->query("SELECT SUM(nilai_donasi) AS program_terkini FROM donasiku WHERE jenis_donasi = 'PROGRAM TERKINI'");
      foreach ($q8->result() as $row) {
        $program_terkini = $row->program_terkini;
      }

      $q9 = $this->db->query("SELECT SUM(nilai_donasi) AS jaringan_global FROM donasiku WHERE jenis_donasi = 'JARINGAN GLOBAL'");
      foreach ($q9->result() as $row) {
        $jaringan_global = $row->jaringan_global;
      }

      echo json_encode(array("total_kegiatan_aktif"=>$total_kegiatan_aktif, "total_kegiatan_selesai"=>$total_kegiatan_selesai, "total_donasi"=>$total_donasi, "total_zakat"=>$total_zakat, "total_infaq"=>$total_infaq, "total_dermawan"=>$total_dermawan, "menunggu_validasi_k"=>$menunggu_validasi_k, "menunggu_validasi_u"=>$menunggu_validasi_u, "program_terkini"=> $program_terkini, "jaringan_global"=>$jaringan_global));
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


    public function setujui_kegiatan()
    {
      $id = $this->input->post('id');
      $query2 = $this->db->query("SELECT target_hari from kegiatan where id_kegiatan = '$id'");
      foreach ($query2->result() as $row) {
        $target_hari = $row->target_hari;
      }


      $query3 = $this->db->query("SELECT CURRENT_DATE + INTERVAL '$target_hari' DAY as berakhir");
      foreach ($query3->result() as $row3) {
        $tanggal_berahir = $row3->berakhir;
      }

      $query=$this->db->query("UPDATE kegiatan set status = 'LIVE', tanggal_berakhir = '$tanggal_berahir' where id_kegiatan = '$id'");
      echo json_encode(array("status"=>true));
    }


    public function delete_slider(){
      $id = $this->input->post('id');
      $query=$this->db->query("DELETE from slider where id = '$id'");
      echo json_encode(array("status"=>true));
    }

    public function delete_video(){
      $id = $this->input->post('id');
      $query=$this->db->query("DELETE from video where id = '$id'");
      echo json_encode(array("status"=>true));
    }

    public function delete_dukungan(){
      $id = $this->input->post('id');
      $query=$this->db->query("DELETE from partner where id = '$id'");
      echo json_encode(array("status"=>true));
    }


    public function hapus_berita(){
      $id = $this->input->post('id');
      $query=$this->db->query("DELETE from berita where id = '$id'");
      echo json_encode(array("status"=>true));
    }

    public function hapus_program_terkini(){
      $id = $this->input->post('id');
      $query1 = $this->db->query("SELECT gambar_utama from program_terkini where id = '$id'");
      foreach ($query1->result() as $row) {
        unlink("assets/img/program_terkini/".$row->gambar_utama);
      }
      $query=$this->db->query("DELETE from program_terkini where id = '$id'");
      
      echo json_encode(array("status"=>true));
    }


    public function hapus_jaringan_global(){
      $id = $this->input->post('id');
      $query1 = $this->db->query("SELECT gambar_utama from jaringan_global where id = '$id'");
      foreach ($query1->result() as $row) {
        unlink("assets/img/jaringan_global/".$row->gambar_utama);
      }
      $query=$this->db->query("DELETE from jaringan_global where id = '$id'");
      
      echo json_encode(array("status"=>true));
    }


    public function hapus_coa(){
      $id = $this->input->post('id');
      if ($this->input->post('jenis_coa') == 'Tambah_akun_jenis') {
        $query=$this->db->query("DELETE from dt_accjenis where accjenis = '$id'");
      }
      echo json_encode(array("status"=>true));
    }

    public function hapus_kel(){
      $id = $this->input->post('id');
      $query=$this->db->query("DELETE from dt_acckel where acckel = '$id'");
      echo json_encode(array("status"=>true));
    }

    public function hapus_bb(){
      $id = $this->input->post('id');
      $query=$this->db->query("DELETE from accountbb where accbb = '$id'");
      echo json_encode(array("status"=>true));
    }


    public function hapus_sbb(){
      $id = $this->input->post('id');
      $query=$this->db->query("DELETE from account where acc = '$id'");
      echo json_encode(array("status"=>true));
    }


    public function hapus_jurnal(){
      $ntrans = $this->input->post('ntrans');
      $query=$this->db->query("DELETE from transaksi where ntrans = '$ntrans'");
      echo json_encode(array("status"=>true));
    }


    public function hapus_draft_jurnal(){
      $ide = $this->input->post('ide');
      $ntrans = $this->input->post('ntrans');
      $query=$this->db->query("DELETE from transaksi where ide = '$ide'");


      $query=$this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit from transaksi where ntrans = '$ntrans'");
        foreach ($query->result() as $row) { 
          $debet = $row->debet;
          $kredit = $row->kredit;
      }


      echo json_encode(array("status"=>true, "debet"=>$debet, "kredit"=>$kredit));
    }

    public function edit_akun_jenis(){
      
      if ($this->input->post('jenis_coa') == 'Tambah_akun_jenis') {
        $accjenis = $this->input->post('accjenis');
        $nama_akun_jenis = $this->input->post('nama_akun_jenis');
        $query=$this->db->query("UPDATE dt_accjenis set jenis = '$nama_akun_jenis' where accjenis = '$accjenis'");
      }
      echo json_encode(array("status"=>true));
    }





    public function edit_akun_kel(){
        $id_akun_kel = $this->input->post('id_akun_kel');
        $nama_akun_kel = $this->input->post('nama_akun_kel');
        $query=$this->db->query("UPDATE dt_acckel set kelompok = '$nama_akun_kel' where acckel = '$id_akun_kel'");
      echo json_encode(array("status"=>true));
    }

    public function edit_akun_bb(){
        $id_akun_bb = $this->input->post('id_akun_bb');
        $nama_akun_bb = $this->input->post('nama_akun_bb');
        $query=$this->db->query("UPDATE accountbb set bukubesar = '$nama_akun_bb' where accbb = '$id_akun_bb'");
      echo json_encode(array("status"=>true));
    }

    public function edit_akun_sbb(){
        $id_akun_sbb = $this->input->post('id_akun_sbb');
        $nama_akun_sbb = $this->input->post('nama_akun_sbb');
        $query=$this->db->query("UPDATE account set keterangan = '$nama_akun_sbb' where acc = '$id_akun_sbb'");
      echo json_encode(array("status"=>true));
    }


    public function detil_jurnal(){
        $ntrans = $this->input->post('ntrans');
        
        $query=$this->db->query("SELECT SUM(debet) as debet, SUM(kredit) as kredit, keterangan, keterangan_reverse from transaksi where ntrans = '$ntrans'");
        foreach ($query->result() as $row) { 
          $debet = $row->debet;
          $kredit = $row->kredit;
          $keterangan = $row->keterangan;
          $keterangan_reverse = $row->keterangan_reverse;
        }
      echo json_encode(array("status"=>true, "debet"=>$debet, "kredit"=>$kredit, "keterangan"=>$keterangan, "keterangan_reverse"=>$keterangan_reverse));
    }

    public function detil_berita(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT * from berita where id = '$id'")->row();
      echo json_encode($data);
    }

    public function detil_transaksi(){
      $ntrans = $this->input->post('ntrans');
      $data=$this->db->query("SELECT tanggal, SUM(debet) as total, st, keterangan, keterangan_reverse from transaksi where ntrans = '$ntrans' group by ntrans")->row();
      echo json_encode($data);
    }

    public function detil_set_page(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT * from konten_front where page = '$id'")->row();
      echo json_encode($data);
    }


    public function detil_program_terkini(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT * from program_terkini where id = '$id'")->row();
      echo json_encode($data);
    }

    public function detil_jaringan_g(){
      $id = $this->input->post('id');
      $data=$this->db->query("SELECT * from jaringan_global where id = '$id'")->row();
      echo json_encode($data);
    }


    public function tambah_berita(){
      $judul = $this->input->post('judul');
      $deskripsi = $this->input->post('deskripsi');



      //generate id
        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row) {
            $date = $row->sekarang;
        }
        

        $query = $this->db->query("SELECT id from berita order by id desc limit 1");
                $count = $query->num_rows();
                if($count==0) {
                    $id_berita = $date."001";
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
                    $id_berita = $date.$vcounter;
                }


      $query=$this->db->query("INSERT into berita (id, judul, deskripsi, st, waktu) values ('$id_berita', '$judul', '$deskripsi', 'NONACTIVE', NOW())");
      echo json_encode(array("status"=>true, "id_berita" =>$id_berita));
    }


    public function update_berita(){
      $judul = $this->input->post('judul');
      $deskripsi = $this->input->post('deskripsi');
      $id = $this->input->post('id');
      $jenis_update = $this->input->post('jenis_update');

      if ($jenis_update == 'perbarui') {
          $query=$this->db->query("UPDATE berita set judul = '$judul', deskripsi = '$deskripsi', waktu = NOW() where id = '$id'");
      }
      else{
        $query=$this->db->query("UPDATE berita set st = 'ACTIVE', waktu = NOW() where id = '$id'");
      }
      
      echo json_encode(array("status"=>true, "id_berita" =>$id, "jenis_update"));
    }



    public function update_program_terkini(){
      $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $target_dana = $this->input->post('target_dana');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $deskripsi = $this->input->post('deskripsi');
        $id_program = $this->input->post('id_program');

      $query=$this->db->query("UPDATE program_terkini set judul = '$judul', deskripsi = '$deskripsi', provinsi = '$provinsi', kota = '$kota', kategori = '$kategori', target_dana = '$target_dana', target_hari = '$jangka_waktu' ,date = NOW() where id = '$id_program'");
      
      echo json_encode(array("status"=>true));
    }



     public function aktifkan_program_terkini(){
        $id_program = $this->input->post('id_program');
        $query=$this->db->query("UPDATE program_terkini set status = 'LIVE', date = NOW() where id = '$id_program'");
      echo json_encode(array("status"=>true));
    }


    public function update_halaman(){
        $deskripsi = $this->input->post('deskripsi');
        $judul = $this->input->post('judul');
        $id = $this->input->post('id');
      $query=$this->db->query("UPDATE konten_front set judul = '$judul', deskripsi = '$deskripsi' , waktu = NOW() where page = '$id'");
      echo json_encode(array("status"=>true));
    }


    public function update_jaringan_g(){
      $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $target_dana = $this->input->post('target_dana');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $deskripsi = $this->input->post('deskripsi');
        $id_jaringan = $this->input->post('id_jaringan_g');

      $query=$this->db->query("UPDATE jaringan_global set judul = '$judul', deskripsi = '$deskripsi', provinsi = '$provinsi', kota = '$kota', kategori = '$kategori', target_dana = '$target_dana', target_hari = '$jangka_waktu' ,date = NOW() where id = '$id_jaringan'");
      
      echo json_encode(array("status"=>true));
    }

    public function stop_program_terkini(){
      $id_program = $this->input->post('id_program');
      $query=$this->db->query("UPDATE program_terkini set status = 'BLOKIR' , date = NOW() where id = '$id_program'");
      echo json_encode(array("status"=>true));
    }


    public function stop_jaringan_g(){
      $id_jaringan = $this->input->post('id');
      $query=$this->db->query("UPDATE jaringan_global set status = 'BLOKIR' , date = NOW() where id = '$id_jaringan'");
      echo json_encode(array("status"=>true));
    }


    public function aktifkan_jaringan_g(){
      $id_jaringan = $this->input->post('id_jaringan_g');

      $query=$this->db->query("UPDATE jaringan_global set status = 'LIVE' , date = NOW() where id = '$id_jaringan'");
      echo json_encode(array("status"=>true));
    }


    public function tambah_draft_jurnal(){
      $uid = $this->session->userdata('id_user');
      $acc = $this->input->post('acc');
      $nominal = $this->input->post('nominal');
      $ntrans_input = $this->input->post('ntrans');

      if ($this->input->post('jenis') == 'Debet') {
        $nominal_debet = $nominal;
        $nominal_kredit = 0;
      }else{
        $nominal_debet = 0;
        $nominal_kredit = $nominal;
      }

      $query_ket_acc = $this->db->query("SELECT keterangan from account where acc = '$acc'");
      foreach ($query_ket_acc->result() as $row4) {
          $ket_acc = $row4->keterangan;
      }

      $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
      foreach ($query_date->result() as $row3) {
          $date = $row3->sekarang;
      }

      if ($ntrans_input == "") {
          //generate ntrans
          $query = $this->db->query("SELECT ntrans from transaksi order by ntrans desc limit 1");
          $count = $query->num_rows();
          if($count==0) {
              $id_ntrans = $date."001";
          }
          else
          {
              foreach ($query->result() as $row) {
                  $a = substr($row->ntrans,12); 
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
              $id_ntrans = $date.$vcounter;
          }
      }else{
        $id_ntrans = $ntrans_input;
      }
      
        //generate ide
        $query = $this->db->query("SELECT ide from transaksi order by ide desc limit 1");
        $count = $query->num_rows();
        if($count==0) {
            $id_ide = $date."001";
        }
        else
        {
            foreach ($query->result() as $row) {
                $a = substr($row->ide,12); 
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
            $id_ide = $date.$vcounter;
        }
      

      $query=$this->db->query("INSERT into transaksi (ide, ntrans, kbt, tanggal, acc, ketacc, debet, kredit, st, uid, waktu) values ('$id_ide','$id_ntrans', 'GL', NOW() ,'$acc','$ket_acc', '$nominal_debet', '$nominal_kredit', 'DRAFT', '$uid', NOW())");

      $query_total = $this->db->query("SELECT SUM(debet) as total_debet, SUM(kredit) as total_kredit from transaksi where ntrans = '$id_ntrans'");
      foreach ($query_total->result() as $row5) {
        $total_debet = $row5->total_debet;
        $total_kredit = $row5->total_kredit;
      }

      echo json_encode(array("status"=>true, "ntrans"=>$id_ntrans, "debet"=>$total_debet, "kredit"=>$total_kredit));
    }



    public function upload($send) {
            list($id, $halaman, $input) = explode(":", $send);

           
            $upload_path = 'assets/img/'.$halaman.'/';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'jpg|png|gif';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            //$config['encrypt_name'] = TRUE;
            $config['file_name']            = $id;
            //store image info once uploaded
            $image_data = array();
            //check for errors
            //$is_file_error = FALSE;
            //check if file was selected for upload
            //if (!$_FILES) {
                //$is_file_error = TRUE;
                //$this->handle_error('Select an image file.');
            //}
            //if file was selected then proceed to upload
            //if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'image_name' is the name of the input
                if ($this->upload->do_upload($input)) {
                    //if file upload failed then catch the errors
                    //$this->handle_error($this->upload->display_errors());
                    //$is_file_error = TRUE;
                //} 
                //else {
                    //store the file info
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
            //}
            // There were errors, we have to delete the uploaded image
            //if ($is_file_error) {
                //if ($image_data) {
                    $file = $upload_path . $image_data['file_name'];
                    // if (file_exists($file)) {
                    //     unlink($file);
                    // }
                //}
            //} 
            //else {
                    $data['resize_img'] = $upload_path . $image_data['file_name'];
                    $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');
                    $nama = $this->upload->data('file_name');

                if ($image_data['file_name'] != "") {
                    if ($halaman == 'program_terkini') {
                        
                        $query1 = $this->db->query("SELECT gambar_utama from program_terkini where id = '$id'");
                        foreach ($query1->result() as $row) {
                          if ($row->gambar_utama != null) {
                            unlink("assets/img/program_terkini/".$row->gambar_utama);
                          }
                        }
                        $query2 = $this->db->query("UPDATE program_terkini set gambar_utama = '$nama' where id = '$id'");
                    }

                    else if ($halaman == 'jaringan_global') {
                        
                        $query1 = $this->db->query("SELECT gambar_utama from jaringan_global where id = '$id'");
                        foreach ($query1->result() as $row) {
                          if ($row->gambar_utama != null) {
                            unlink("assets/img/jaringan_global/".$row->gambar_utama);
                          }
                        }
                        $query2 = $this->db->query("UPDATE jaringan_global set gambar_utama = '$nama' where id = '$id'");
                    }
                    else if ($halaman == 'header') {
                        
                        $query1 = $this->db->query("SELECT img from konten_front where page = '$id'");
                        foreach ($query1->result() as $row) {
                            if ($row->img != null) {
                              unlink("assets/img/header/".$row->img);
                            }
                        }
                        $query2 = $this->db->query("UPDATE konten_front set img = '$nama' where page = '$id'");
                    }
                    else if ($halaman == 'berita') {
                        
                        $query1 = $this->db->query("SELECT img from berita where id = '$id'");
                        foreach ($query1->result() as $row) {
                          if ($row->img != null) {
                              unlink("assets/img/berita/".$row->img);
                          }
                        }
                        $query2 = $this->db->query("UPDATE berita set img = '$nama' where id = '$id'");
                    }
                    else if ($halaman == 'partner') {
                      $query2 = $this->db->query("INSERT into partner (id, img, st) values ('$id', '$nama', 'ACTIVE')");
                    }
                    
                }

                
            //}
        //}
 
        //load the error and success messages
        // $data['errors'] = $this->error;
        // $data['success'] = $this->success;
        //load the view along with data
        //$this->load->view('Crop', $data);
        echo json_encode(array("data"=>true, "messages"=>$data, "nama"=>$nama, "halaman"=>$halaman));
    }




    function upload_berita($id) {
        //upload file
        $config['upload_path'] = 'assets/img/berita/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_berita']['name'])) {
            if (0 < $_FILES['wizard-picture_berita']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_berita']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_berita']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_berita']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_berita')) {
                        //delete kegiatan
                        $query_insert = $this->db->query("DELETE berita where id = '$id'");
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE berita set img = '$nama' where id = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }



    function upload_img_slide() {

      $query = $this->db->query("SELECT id from slider order by id desc limit 1");
      foreach ($query->result() as $row) {
        $id = $row->id + 1;
      }

        //upload file
        $config['upload_path'] = 'assets/img/slider/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_slide']['name'])) {
            if (0 < $_FILES['wizard-picture_slide']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_slide']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_slide']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_slide']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_slide')) {
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query2 = $this->db->query("INSERT into slider (id, img, st) values ('$id', '$nama', 'ACTIVE')");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    
    function upload_img_dukungan() {

      $query = $this->db->query("SELECT id from partner order by id desc limit 1");
      foreach ($query->result() as $row) {
        $id = $row->id + 1;
      }

        //upload file
        $config['upload_path'] = 'assets/img/partners/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_dukungan']['name'])) {
            if (0 < $_FILES['wizard-picture_dukungan']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_dukungan']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_dukungan']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_dukungan']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_dukungan')) {
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query2 = $this->db->query("INSERT into partner (id, img, st) values ('$id', '$nama', 'ACTIVE')");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    public function upload_compres($id) {
        if ($this->input->post('wizard-picture_program')) {
            //set preferences
            //file upload destination
            $upload_path = 'assets/img/program_terkini/';
            $config['upload_path'] = $upload_path;
            //allowed file types. * means all types
            $config['allowed_types'] = 'jpg|png|gif';
            //allowed max file size. 0 means unlimited file size
            $config['max_size'] = '0';
            //max file name size
            $config['max_filename'] = '255';
            //whether file name should be encrypted or not
            $config['encrypt_name'] = TRUE;
            //$config['file_name'] = $id;
            //store image info once uploaded
            $image_data = array();
            //check for errors
            $is_file_error = FALSE;
            //check if file was selected for upload

            if (!$_FILES) {
                $is_file_error = TRUE;
                $this->handle_error('Select an image file.');
            }

            //if file was selected then proceed to upload
            if (!$is_file_error) {
                //load the preferences
                $this->load->library('upload', $config);
                //check file successfully uploaded. 'image_name' is the name of the input
                if (!$this->upload->do_upload('image_name')) {
                    //if file upload failed then catch the errors
                    $this->handle_error($this->upload->display_errors());
                    $is_file_error = TRUE;
                } 
                else {
                    //store the file info
                    $image_data = $this->upload->data();
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $image_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 150;
                    $config['height'] = 100;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $this->handle_error($this->image_lib->display_errors());
                    }
                }
            }
            // There were errors, we have to delete the uploaded image
            if ($is_file_error) {

                if ($image_data) {
                    $file = $upload_path . $image_data['file_name'];
                    if (file_exists($file)) {
                        unlink($file);
                    }
                }
            } 
            else {
                $data['resize_img'] = $upload_path . $image_data['file_name'];
                $this->handle_success('Image was successfully uploaded to direcoty <strong>' . $upload_path . '</strong> and resized.');

                        // $nama = $this->upload->data('file_name');
                        // $query_insert = $this->db->query("UPDATE program_terkini set gambar_utama = '$nama' where id = '$id'");
            }
        }
 
        //load the error and success messages
        $data['errors'] = $this->error;
        $data['success'] = $this->success;
        //load the view along with data
        echo json_encode(array("data"=>true, "messages"=>$data));
        //$this->load->view('Crop', $data);
    }

    //appends all error messages
    private function handle_error($err) {
        $this->error .= $err . "rn";
    }
 
    //appends all success messages
    private function handle_success($succ) {
        $this->success .= $succ . "rn";
    }

    function upload_foto_tentang_kami($id) {
        //upload file
        $config['upload_path'] = 'assets/img/header/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_tentang_kami']['name'])) {
            if (0 < $_FILES['wizard-picture_tentang_kami']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_tentang_kami']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_tentang_kami']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_tentang_kami']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_tentang_kami')) {
                        
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE konten_front set img = '$nama' where page = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    function upload_foto_set_page($id) {
        //upload file
        $config['upload_path'] = 'assets/img/header/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_set_page']['name'])) {
            if (0 < $_FILES['wizard-picture_set_page']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_set_page']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_set_page']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_set_page']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_set_page')) {
                        
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE konten_front set img = '$nama' where page = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }


    function upload_foto_program($id) {
        //upload file
        $config['upload_path'] = 'assets/img/program_terkini/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_program']['name'])) {
            if (0 < $_FILES['wizard-picture_program']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_program']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_program']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_program']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_program')) {
                        //delete kegiatan
                        $query_insert = $this->db->query("DELETE program_terkini where id = '$id'");
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE program_terkini set gambar_utama = '$nama' where id = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }



    function upload_foto_jaringan($id) {
        //upload file
        $config['upload_path'] = 'assets/img/jaringan_global/';
        $config['allowed_types'] = 'gif|jpg|png';
        // $config['max_filename'] = '255';
        // $config['encrypt_name'] = TRUE;
        $config['max_size'] = '5024'; //1 MB
        $config['file_name'] = $id;
 
        if (isset($_FILES['wizard-picture_jaringan_g']['name'])) {
            if (0 < $_FILES['wizard-picture_jaringan_g']['error']) {
                echo 'Error during file upload' . $_FILES['wizard-picture_jaringan_g']['error'];
            } 
            else {
                if (file_exists('upload/' . $_FILES['wizard-picture_jaringan_g']['name'])) {
                    echo 'File already exists : upload/' . $_FILES['wizard-picture_jaringan_g']['name'];
                } 
                else {
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload('wizard-picture_jaringan_g')) {
                        //delete kegiatan
                        $query_insert = $this->db->query("DELETE jaringan_global where id = '$id'");
                        echo $this->upload->display_errors();
                    } 
                    else {
                        echo 'File successfully uploaded : ' .$this->upload->data('file_name');
                        $nama = $this->upload->data('file_name');
                        $query_insert = $this->db->query("UPDATE jaringan_global set gambar_utama = '$nama' where id = '$id'");
                    }
                }
            }
        } 
        else {
            echo 'Please choose a file';
        }
    }



    public function get_kategori(){
        $data = $this->db->query("SELECT * from kategori_kegiatan where status = 'ACTIVE' order by nama_kategori")->result();
        echo json_encode($data);
    }

    public function get_list_jenis(){
        $data = $this->db->query("SELECT * from dt_accjenis order by accjenis")->result();
        echo json_encode($data);
    }

    public function get_list_kel(){
        $data = $this->db->query("SELECT * from dt_acckel order by acckel")->result();
        echo json_encode($data);
    }

    public function get_list_bb(){
        $data = $this->db->query("SELECT * from accountbb order by accbb")->result();
        echo json_encode($data);
    }


    public function save_video(){
      $embed = $this->input->post('iframe');
        $data = $this->db->query("INSERT into video (embed, st) values ('$embed','ACTIVE')");
        echo json_encode(array('status'=>true));
    }

    public function tambah_program(){

        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row3) {
            $date = $row3->sekarang;
        }

        $query = $this->db->query("SELECT id from program_terkini order by id desc limit 1");
        $count = $query->num_rows();
        if($count==0) {
            $id_program = $date."001";
        }
        else
        {
            foreach ($query->result() as $row) {
                $a = substr($row->id,12); 
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
            $id_program = $date.$vcounter;

            //echo $vcounter; echo $a; echo " - "; echo $row->id_kegiatan;
        }
         
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $target_dana = $this->input->post('target_dana');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $deskripsi = $this->input->post('deskripsi');


        $query_insert = $this->db->query("INSERT into program_terkini (provinsi, kota, id, kategori, judul, target_dana, tercapai_dana, sisa_dana, target_hari, total_hari, sisa_hari, deskripsi, status, date) values ('$provinsi','$kota','$id_program', '$kategori', '$judul', '$target_dana', '0', '$target_dana' ,'$jangka_waktu', '0', '$jangka_waktu' ,'$deskripsi', 'DRAFT' ,NOW())");
        echo json_encode(array("status"=>true, "id"=>$id_program));
    } 


    public function tambah_jaringan_g(){

        $query_date = $this->db->query("SELECT DATE_FORMAT(NOW(),'%Y%m%d%h%i') as sekarang");
        foreach ($query_date->result() as $row3) {
            $date = $row3->sekarang;
        }

        $query = $this->db->query("SELECT id from jaringan_global order by id desc limit 1");
        $count = $query->num_rows();
        if($count==0) {
            $id_jaringan_g = $date."001";
        }
        else
        {
            foreach ($query->result() as $row) {
                $a = substr($row->id,12); 
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
            $id_jaringan_g = $date.$vcounter;

            //echo $vcounter; echo $a; echo " - "; echo $row->id_kegiatan;
        }
         
        $provinsi = $this->input->post('provinsi');
        $kota = $this->input->post('kota');
        $judul = $this->input->post('judul');
        $kategori = $this->input->post('kategori');
        $target_dana = $this->input->post('target_dana');
        $jangka_waktu = $this->input->post('jangka_waktu');
        $deskripsi = $this->input->post('deskripsi');


        $query_insert = $this->db->query("INSERT into jaringan_global (provinsi, kota, id, kategori, judul, target_dana, tercapai_dana, sisa_dana, target_hari, total_hari, sisa_hari, deskripsi, status, date) values ('$provinsi','$kota','$id_jaringan_g', '$kategori', '$judul', '$target_dana', '0', '$target_dana' ,'$jangka_waktu', '0', '$jangka_waktu' ,'$deskripsi', 'DRAFT' ,NOW())");
        echo json_encode(array("status"=>true, "id"=>$id_jaringan_g));
    } 



    public function get_content_setting(){
        $page = $this->input->post('page');
        echo $this->load->view($page);
    }


    public function preview_kegiatan_gambar(){
      $id = $this->input->post('id');
        $data = $this->db->query("SELECT id, img
        FROM    img_kegiatan
        WHERE   id_kegiatan = '$id'")->result();
        echo json_encode($data);
    }

}
