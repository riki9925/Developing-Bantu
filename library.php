1. GENERATE ID NUMBER EX: 0001 -> to next 0002, 0003 dst
proses di controller
<?php
		//query get last ID
		$query=$this->db->query("select RKNB_ID from mast_rknb order by RKNB_ID desc limit 1");
        $count=$query->num_rows();
        
        //jika rows yg didapat 0
        if($count==0) { 
	        $rknb_id ="001";

	    //jika ada rows
	    }else{
	        foreach ($query->result() as $row) { 

	        	$hasil = substr($row->ACT_ID, 3); //memotong variabel ex: ERP001 mjd 001

	          $counter=intval($row->RKNB_ID); //hasil yang didaptkan dirubah jadi integer. Ex: 0001 mjd 1.      
	          $new=intval($counter)+1;		   //digit terahit ditambah 1
	        }  
	          
	         if (strlen($new)==1){ //jika counter yg didapat panjangnya 1 ex: 1
	           $vcounter="00". '' .$new;                      
	         }
	         if (strlen($new)==2){  //jika counter yg didapat panjangnya 2 ex: 11
	           $vcounter="0". '' .$new;
	         }          
	         if (strlen($new)==3){
	           $vcounter=$new;
	         }  
	         
	         $rknb_id = $vcounter;

	    }//end else




2. error datatables 

ex: Message: Undefined index: search
biasanya terjadi pada :

$output = array(
                        "draw" => $_POST['draw'],
                        "recordsTotal" => $this->master->count_all_rkap(),
                        "recordsFiltered" => $this->master->count_filtered_rkap(),
                        "data" => $data,
                );
MASTER MENUNJUKAN MODEL YANG DITUNJUK. BIASANYA TERJADI KESALAHAN.




//3. table pada th, dapat diatur lebarnya : 
<th style="width:125px;">Pilih</th>

4. javascript pada inputan
//menampilkan modals
$('#modal_akun').modal('show');

//set judul modals
$('.modal-title_akun').text('Daftar Akun / Rekening Perkiraan'); // Set Title to Bootstrap modal title

//set nilai inputan
$('[name="dt_golongan"]').val("PBB");

//mengambil nilai input
var jenishut = $("#dtjenis_hutang").val();

//reset form
$('#form_realisasi')[0].reset(); // reset form on modals

//enabled disabled button
$('#btn_kategori').attr('disabled', false); //change button text

//TOOL TIPS PADA BUTTON
<button type="button" class="btn btn-primary btn-sm pull-right" data-widget="collapse" data-toggle="tooltip" title="" style="margin-right: 5px;" data-original-title="Hide Menu RK&B">
//here
data-original-title="Hide Menu RK&B"

            //modals delete html
			<!--modals delete-->
            <div class="modal fade bs-example-modal-lg" tabindex="-1" aria-labelledby="myLargeModalLabel" id="modal_form_del" role="dialog">
                <div class="modal-dialog modal-lg" role="document" style="width: 40%;">
                    <div class="modal-content" >
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Delete Periode Anggaran</h4>
                        </div>
                        <div class="modal-body form" >
                            <form action="#" id="form" class="form-horizontal">
                                
                                <div class="form-body">
                                    <div class="row">


                                    <div class="col-md-12">
                                        <span class="mailbox-attachment-icon"><i class="glyphicon glyphicon-trash"></i></span>
                                    </div>


                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer" style="background-color: #ecf0f5">
                            <button type="button" id="btn_delete" onclick="delete_pa()" class="btn btn-danger">Delete</button>
                            <button type="button" onclick="clear_form()" class="btn btn-primary" data-dismiss="modal">Cancel</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


?>


<script type="text/javascript">
    
//    1. MERUBAH INPUTAN MENJADI FORMAT MATA UANG - PHP
        
        <?php
        $angka = 3050145.756;
        $angka_format = number_format($angka,2,",",".");
        echo "Rp. ".$angka_format;
        // Rp. 3.050.145,76
        ?>



//      2. MERUBAH MENJADI FORMAT CURRENCY
        var jumlah = $("#jumlah").val(); //menangkap isi variable
        var harga_satuan = $("#harga_satuan").val(); //menangkap isi variable
        $('[name="harga_satuan"]').val(accounting.formatMoney(harga_satuan)); //mengembalikan mnjd format currency


//      3. PENJUMLAHAN FORMAT CURRENCY
        var total_nominal = jumlah * parseFloat(harga_satuan.replace(/[^0-9-.]/g, '')); //sudah dalam format number.(tanpa ,)

</script>




<?php



session:
$this->session->userdata('nik')
$this->session->userdata('id_jabatan')
$this->session->userdata('nama')
$this->session->userdata('foto')
$this->session->userdata('nama_jabatan')
$this->session->userdata('cost_center')
$this->session->userdata('lokasi')
$this->session->userdata('status_pegawai')
$this->session->userdata('module')
$this->session->userdata('nama_cost_center')


<img src="<?php echo base_url('img/img.jpg')?>" class="img-circle" alt="User Image">




//dom javascript
var myElement = document.getElementById("intro");
$("#test2").html("<b>Hello world!</b>");





?>





























  

  

  






