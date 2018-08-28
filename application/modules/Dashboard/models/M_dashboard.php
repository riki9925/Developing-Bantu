<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_dashboard extends CI_Model
{
	function __construct() {
		  parent::__construct();
		  $this->load->database();
	}




    //donasi
    var $column_order_donasi = array('nilai_donasi',null); 
    var $column_search_donasi = array('nilai_donasi'); 
    var $order_donasi = array('nilai_donasi' => 'asc'); // default order

    //zakat
    var $column_order_zakat = array('nilai_zakat',null); 
    var $column_search_zakat = array('nilai_zakat'); 
    var $order_zakat = array('nilai_zakat' => 'asc'); // default order


    //infaq
    var $column_order_infaq = array('nilai_infaq',null); 
    var $column_search_infaq = array('nilai_infaq'); 
    var $order_infaq = array('nilai_infaq' => 'asc'); // default order

    //img kegiatan
    var $column_order_img_kegiatan = array('id',null); 
    var $column_search_img_kegiatan = array('id'); 
    var $order_img_kegiatan = array('id' => 'asc'); // default order


    public function _get_datatables_query($id3)
    {
        if ($id3 == 'donasi') {
            $this->db->select('donasiku.id, kegiatan.judul, donasiku.nilai_donasi, donasiku.waktu');
            $this->db->from('donasiku');
            $this->db->join('kegiatan', 'donasiku.id_kegiatan = kegiatan.id_kegiatan');
            $this->db->where('donasiku.id_user', $this->session->userdata('id_user'));

            //plugins
            $i = 0;
            foreach ($this->column_search_donasi as $item) // loop column
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

                    if(count($this->column_search_donasi) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_donasi[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_donasi))
            {
                $order_donasi = $this->order_donasi;
                $this->db->order_by(key($order_donasi), $order_donasi[key($order_donasi)]);
            }
        }
        else if ($id3 == 'zakat') {
            $this->db->select('id, nilai_zakat, waktu, jenis');
            $this->db->from('zakatku');
            $this->db->where('id_user', $this->session->userdata('id_user'));
            if ($this->input->post('jenis') != 'Semua') {
                $this->db->where('jenis', $this->input->post('jenis'));
            }
            

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
        else if ($id3 == 'img_kegiatan') {
            $this->db->select('id, img, id_kegiatan');
            $this->db->from('img_kegiatan');
            $this->db->where('id', $this->input->post('id'));
            

            //plugins
            $i = 0;
            foreach ($this->column_search_img_kegiatan as $item) // loop column
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

                    if(count($this->column_search_img_kegiatan) - 1 == $i) //last loop
                        $this->db->group_end(); //close bracket
                }
                $i++;
            }

            if(isset($_POST['order'])) // here order processing
            {
                $this->db->order_by($this->column_order_img_kegiatan[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
            }
            else if(isset($this->order_img_kegiatan))
            {
                $order_img_kegiatan = $this->order_img_kegiatan;
                $this->db->order_by(key($order_img_kegiatan), $order_img_kegiatan[key($order_img_kegiatan)]);
            }
        }
        else if ($id3 == 'infaq') {
            $this->db->select('id, nilai_infaq, waktu');
            $this->db->from('infaqku');
            $this->db->where('id_user', $this->session->userdata('id_user'));

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
