<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_administrator extends CI_Model
{
	function __construct() {
		  parent::__construct();
		  $this->load->database();
	}




    //kategori
    var $column_order_kategori = array('id_kategori', 'nama_kategori',null); 
    var $column_search_kategori = array('id_kategori', 'nama_kategori'); 
    var $order_kategori = array('nama_kategori' => 'asc'); // default order

    //kegiatan
    var $column_order_kegiatan = array('id_kegiatan', 'judul',null); 
    var $column_search_kegiatan = array('id_kegiatan', 'judul'); 
    var $order_kegiatan = array('date' => 'asc'); // default order

    //setting slider
    var $column_order_slider = array('st',null); 
    var $column_search_slider = array('st'); 
    var $order_slider = array('st' => 'asc'); // default order


    //setting slider
    var $column_order_video = array('st',null); 
    var $column_search_video = array('st'); 
    var $order_video = array('st' => 'asc'); // default order


    //setting dukungan
    var $column_order_dukungan = array('st',null); 
    var $column_search_dukungan = array('st'); 
    var $order_dukungan = array('st' => 'asc'); // default order

    //setting user
    var $column_order_user = array('nama', 'email', 'st', 'date',null); 
    var $column_search_user = array('nama', 'email', 'st', 'date'); 
    var $order_user = array('nama' => 'asc'); // default order


    //zakat
    var $column_order_zakat = array('nilai_zakat','nama',null); 
    var $column_search_zakat = array('nilai_zakat','nama'); 
    var $order_zakat = array('nilai_zakat' => 'asc'); // default order


    //infaq
    var $column_order_infaq = array('nilai_infaq','nama',null); 
    var $column_search_infaq = array('nilai_infaq','nama'); 
    var $order_infaq = array('nilai_infaq' => 'asc'); // default order


    //berita
    var $column_order_berita = array('judul',null); 
    var $column_search_berita = array('judul'); 
    var $order_berita = array('judul' => 'asc'); // default order


    //akun_jenis
    var $column_order_jenis = array('accjenis','jenis',null); 
    var $column_search_jenis = array('accjenis','jenis'); 
    var $order_jenis = array('accjenis' => 'asc'); // default order

    //akun_kelompok
    var $column_order_kelompok = array('accjenis','acckel','kelompok',null); 
    var $column_search_kelompok = array('accjenis','acckel','kelompok'); 
    var $order_kelompok = array('accjenis' => 'asc'); // default order

    //akun_bb
    var $column_order_bb = array('accbb','acckel','bukubesar',null); 
    var $column_search_bb = array('accbb','acckel','bukubesar'); 
    var $order_bb = array('acckel' => 'asc'); // default order

    //akun_sbb
    var $column_order_sbb = array('accbb','acc','keterangan',null); 
    var $column_search_sbb = array('accbb','acc','keterangan'); 
    var $order_sbb = array('accbb' => 'asc'); // default order

    //cari_akun
    var $column_order_cari_akun = array('acc','keterangan',null); 
    var $column_search_cari_akun = array('acc','keterangan'); 
    var $order_cari_akun = array('acc' => 'asc'); // default order

    //draft_jurnal
    var $column_order_draft_jurnal = array('acc','account.keterangan',null); 
    var $column_search_draft_jurnal = array('acc','account.keterangan'); 
    var $order_draft_jurnal = array('acc' => 'asc'); // default order


    //jurnal umum
    var $column_order_jurnal_umum = array('keterangan','tanggal',null); 
    var $column_search_jurnal_umum = array('keterangan','tanggal'); 
    var $order_jurnal_umum = array('tanggal' => 'desc'); // default order


    //program_terkini
    var $column_order_program_terkini = array('id', 'judul',null); 
    var $column_search_program_terkini = array('id', 'judul'); 
    var $order_program_terkini = array('date' => 'asc'); // default order


    //jaringan global
    var $column_order_jaringan_g = array('id', 'judul',null); 
    var $column_search_jaringan_g = array('id', 'judul'); 
    var $order_jaringan_g = array('date' => 'asc'); // default order

    //transaksi
    var $column_order_transaksi = array('tanggal', 'keterangan',null); 
    var $column_search_transaksi = array('tanggal', 'keterangan'); 
    var $order_transaksi = array('tanggal' => 'desc'); // default order


    //lap keu
    var $column_order_keu = array('ACC','KETERANGAN','DEBET','KREDIT','DEBET1','KREDIT1','DEBET2','KREDIT2','LDEBET','LKREDIT','NDEBET','NKREDIT',null); 
    var $column_search_keu = array('ACC','KETERANGAN','DEBET','KREDIT','DEBET1','KREDIT1','DEBET2','KREDIT2','LDEBET','LKREDIT','NDEBET','NKREDIT'); 
    var $order_keu = array('ACC' => 'asc'); // default order


    public function _get_datatables_query($id3)
    {
        if ($id3 == 'kategori') {
            $this->db->select('id_kategori, nama_kategori, status');
            $this->db->from('kategori_kegiatan');

            //plugins
            $i = 0;
            foreach ($this->column_search_kategori as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_kategori) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_kategori[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_kategori))
            {
                $order_kategori = $this->order_kategori;
                $this->db->order_by(key($order_kategori), $order_kategori[key($order_kategori)]);
            }
        }
        
        else if ($id3 == 'kegiatan') {
            $this->db->select('id_kegiatan, judul, nama_kategori, target_dana, tercapai_dana ,target_hari, sisa_hari, nama, a.status, tanggal_berakhir');
            $this->db->from('kegiatan a');
            $this->db->join('kategori_kegiatan', 'a.kategori = kategori_kegiatan.id_kategori');
            $this->db->join('user', 'a.id_user = user.id');
            if ($this->input->post('status') != 'Semua') {
                $this->db->where('a.status', $this->input->post('status'));
            }
            $this->db->order_by('a.date', 'desc');
            

            //plugins
            $i = 0;
            foreach ($this->column_search_kegiatan as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_kegiatan) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_kegiatan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_kegiatan))
            {
                $order_kegiatan = $this->order_kegiatan;
                $this->db->order_by(key($order_kegiatan), $order_kegiatan[key($order_kegiatan)]);
            }
        }

        else if ($id3 == 'lap_keu') {
            $this->db->select('acc,keterangan,debet,kredit,debet1,kredit1,debet2,kredit2 ,ldebet,lkredit,ndebet, nkredit');
            $this->db->from('pergsbb');
            

            //plugins
            $i = 0;
            foreach ($this->column_search_keu as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_keu) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_keu[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_keu))
            {
                $order_keu = $this->order_keu;
                $this->db->order_by(key($order_keu), $order_keu[key($order_keu)]);
            }
        }

        else if ($id3 == 'transaksi') {
            $this->db->select('tanggal, SUM(debet) as total, keterangan, st, ntrans, ide');
            $this->db->from('transaksi');
            if ($this->input->post('status') != 'Semua') {
                $this->db->where('st', $this->input->post('status'));
            }
            else{
                $this->db->where('st !=', 'DRAFT');
            }
            $this->db->group_by('ntrans');
                //$this->db->where('tanggal >=',  $this->input->post('dari'));
                //$this->db->where('tanggal <=',  $this->input->post('sampai'));
            

            //plugins
            $i = 0;
            foreach ($this->column_search_transaksi as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_transaksi) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_transaksi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_transaksi))
            {
                $order_transaksi = $this->order_transaksi;
                $this->db->order_by(key($order_transaksi), $order_transaksi[key($order_transaksi)]);
            }
        }

        else if ($id3 == 'program_terkini') {
            $this->db->select('a.id, judul, nama_kategori, target_dana, tercapai_dana ,target_hari, sisa_hari, a.status, provinsi.nama_provinsi, kota.nama_kota');
            $this->db->from('program_terkini a');
            $this->db->join('kategori_kegiatan', 'a.kategori = kategori_kegiatan.id_kategori');
            $this->db->join('provinsi', 'a.provinsi = provinsi.id');
            $this->db->join('kota', 'a.kota = kota.id');
            if ($this->input->post('status') != 'Semua') {
                $this->db->where('a.status', $this->input->post('status'));
            }
            $this->db->order_by('date', 'desc');
            

            //plugins
            $i = 0;
            foreach ($this->column_search_program_terkini as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_program_terkini) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_program_terkini[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_program_terkini))
            {
                $order_program_terkini = $this->order_program_terkini;
                $this->db->order_by(key($order_program_terkini), $order_program_terkini[key($order_program_terkini)]);
            }
        }

        else if ($id3 == 'jaringan_g') {
            $this->db->select('a.id, judul, nama_kategori, target_dana, tercapai_dana ,target_hari, sisa_hari, a.status, provinsi.nama_provinsi, kota.nama_kota');
            $this->db->from('jaringan_global a');
            $this->db->join('kategori_kegiatan', 'a.kategori = kategori_kegiatan.id_kategori');
            $this->db->join('provinsi', 'a.provinsi = provinsi.id');
            $this->db->join('kota', 'a.kota = kota.id');
            if ($this->input->post('status') != 'Semua') {
                $this->db->where('a.status', $this->input->post('status'));
            }
            $this->db->order_by('date', 'desc');
            

            //plugins
            $i = 0;
            foreach ($this->column_search_jaringan_g as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_jaringan_g) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_jaringan_g[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_jaringan_g))
            {
                $order_jaringan_g = $this->order_jaringan_g;
                $this->db->order_by(key($order_jaringan_g), $order_jaringan_g[key($order_jaringan_g)]);
            }
        }

        else if ($id3 == 'slider') {
            $this->db->select('id, img, st');
            $this->db->from('slider');


            //plugins
            $i = 0;
            foreach ($this->column_search_slider as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_slider) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_slider[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_slider))
            {
                $order_slider = $this->order_slider;
                $this->db->order_by(key($order_slider), $order_slider[key($order_slider)]);
            }
        }

        else if ($id3 == 'dukungan') {
            $this->db->select('id, img, st');
            $this->db->from('partner');


            //plugins
            $i = 0;
            foreach ($this->column_search_dukungan as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_dukungan) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_dukungan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_dukungan))
            {
                $order_dukungan = $this->order_dukungan;
                $this->db->order_by(key($order_dukungan), $order_dukungan[key($order_dukungan)]);
            }
        }

        else if ($id3 == 'video') {
            $this->db->select('id, embed, st');
            $this->db->from('video');


            //plugins
            $i = 0;
            foreach ($this->column_search_video as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_video) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_video[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_video))
            {
                $order_video = $this->order_video;
                $this->db->order_by(key($order_video), $order_video[key($order_video)]);
            }
        }

        else if ($id3 == 'user') {
            $this->db->select('user.id, nama, email, img, st, date, st_validasi, hp, provinsi.nama_provinsi, kota.nama_kota');
            $this->db->from('user');
            $this->db->join('provinsi', 'user.provinsi = provinsi.id');
            $this->db->join('kota', 'user.kota = kota.id');
            if ($this->input->post('status') != 'Semua') {
                $this->db->where('st', $this->input->post('status'));
            }

            if ($this->input->post('status_val') != 'Semua') {
                $this->db->where('st_validasi', $this->input->post('status_val'));
            }
            

            //plugins
            $i = 0;
            foreach ($this->column_search_user as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_user) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_user[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_user))
            {
                $order_user = $this->order_user;
                $this->db->order_by(key($order_user), $order_user[key($order_user)]);
            }
        }

        else if ($id3 == 'zakat') {
            $this->db->select('zakatku.id, nilai_zakat, waktu, user.nama, user.img');
            $this->db->from('zakatku');
            $this->db->join('user', 'zakatku.id_user = user.id');

            //plugins
            $i = 0;
            foreach ($this->column_search_zakat as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_zakat) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_zakat[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_zakat))
            {
                $order_zakat = $this->order_zakat;
                $this->db->order_by(key($order_zakat), $order_zakat[key($order_zakat)]);
            }
        }

        else if ($id3 == 'infaq') {

            $this->db->select('infaqku.id, nilai_infaq, waktu, user.nama, user.img');
            $this->db->from('infaqku');
            $this->db->join('user', 'infaqku.id_user = user.id');
            
            //plugins
            $i = 0;
            foreach ($this->column_search_infaq as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_infaq) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_infaq[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_infaq))
            {
                $order_infaq = $this->order_infaq;
                $this->db->order_by(key($order_infaq), $order_infaq[key($order_infaq)]);
            }
        }


        else if ($id3 == 'berita') {

            $this->db->select('*');
            $this->db->from('berita');
            
            
            //plugins
            $i = 0;
            foreach ($this->column_search_berita as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_berita) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_berita[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_berita))
            {
                $order_berita = $this->order_berita;
                $this->db->order_by(key($order_berita), $order_berita[key($order_berita)]);
            }
        }

        else if ($id3 == 'jenis') {

            $this->db->select('*');
            $this->db->from('dt_accjenis');
            
            
            //plugins
            $i = 0;
            foreach ($this->column_search_jenis as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_jenis) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_jenis[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_jenis))
            {
                $order_jenis = $this->order_jenis;
                $this->db->order_by(key($order_jenis), $order_jenis[key($order_jenis)]);
            }
        }

        else if ($id3 == 'kelompok') {

            $this->db->select('*');
            $this->db->from('dt_acckel');
            $this->db->order_by('acckel');
            if ($this->input->post('jenis') != 'Semua') {
                $this->db->where('accjenis', $this->input->post('jenis'));
            }
            
            
            //plugins
            $i = 0;
            foreach ($this->column_search_kelompok as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_kelompok) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_kelompok[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_kelompok))
            {
                $order_kelompok = $this->order_kelompok;
                $this->db->order_by(key($order_kelompok), $order_kelompok[key($order_kelompok)]);
            }
        }

        else if ($id3 == 'bb') {

            $this->db->select('*');
            $this->db->from('accountbb');
            $this->db->order_by('acckel');
            if ($this->input->post('kelompok') != 'Semua') {
                $this->db->where('acckel', $this->input->post('kelompok'));
            }
            
            //plugins
            $i = 0;
            foreach ($this->column_search_bb as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_bb) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_bb[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_bb))
            {
                $order_bb = $this->order_bb;
                $this->db->order_by(key($order_bb), $order_bb[key($order_bb)]);
            }
        }

        else if ($id3 == 'sbb') {

            $this->db->select('*');
            $this->db->from('account');
            $this->db->order_by('accbb');
            if ($this->input->post('bb') != 'Semua') {
                $this->db->where('accbb', $this->input->post('bb'));
            }
            
            //plugins
            $i = 0;
            foreach ($this->column_search_sbb as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_sbb) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_sbb[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_sbb))
            {
                $order_sbb = $this->order_sbb;
                $this->db->order_by(key($order_sbb), $order_sbb[key($order_sbb)]);
            }
        }

        else if ($id3 == 'cari_akun') {

            $this->db->select('*');
            $this->db->from('account');
            
            
            //plugins
            $i = 0;
            foreach ($this->column_search_cari_akun as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_cari_akun) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_cari_akun[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_cari_akun))
            {
                $order_cari_akun = $this->order_cari_akun;
                $this->db->order_by(key($order_cari_akun), $order_cari_akun[key($order_cari_akun)]);
            }
        }

        else if ($id3 == 'draft_jurnal') {

            $this->db->select('transaksi.acc, account.keterangan, debet, kredit, ntrans, transaksi.st, ide');
            $this->db->from('transaksi');
            $this->db->join('account', 'transaksi.acc = account.acc');
            $this->db->where('ntrans', $this->input->post('ntrans'));
            
            //plugins
            $i = 0;
            foreach ($this->column_search_draft_jurnal as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_draft_jurnal) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_draft_jurnal[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_draft_jurnal))
            {
                $order_draft_jurnal = $this->order_draft_jurnal;
                $this->db->order_by(key($order_draft_jurnal), $order_draft_jurnal[key($order_draft_jurnal)]);
            }
        }

        else if ($id3 == 'jurnal_umum') {

            $this->db->select('ntrans, keterangan, tanggal, st, SUM(debet) as total_debet, SUM(kredit) as total_kredit');
            $this->db->from('transaksi');

            if ($this->input->post('st') != 'Semua') {
                $this->db->where('st', $this->input->post('st'));
            }
            
            $this->db->group_by('ntrans');
            
            //plugins
            $i = 0;
            foreach ($this->column_search_jurnal_umum as $item) // loop column
            {
                if($_POST['search']['value']) // if datatable send POST for search
                {

                    if($i===0) // first loop
                    {
                        $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                        $this->db->like($item, $_POST['search']['value']);
                    }
                    else
                    {
                        $this->db->or_like($item, $_POST['search']['value']);
                    }

                    if(count($this->column_search_jurnal_umum) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_jurnal_umum[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_jurnal_umum))
            {
                $order_jurnal_umum = $this->order_jurnal_umum;
                $this->db->order_by(key($order_jurnal_umum), $order_jurnal_umum[key($order_jurnal_umum)]);
            }
        }
        // $this->db->join('uid_level', 'user_login.LEVEL = uid_level.ID');
        // $this->db->join('uid_departemen', 'user_login.DEPARTEMEN = uid_departemen.ID');
        //$this->db->where('mast_job_posting.`ID_LOWONGAN`', $this->input->post('id_lowongan'));
        
    }

    function m_load_table($id)
    {
        $this->_get_datatables_query($id);
        if($_POST['length'] != -1)
        $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }


    function count_filtered($id2)
    {
        $this->_get_datatables_query($id2);
        $query = $this->db->get();
        return $query->num_rows();
    }



   
}
