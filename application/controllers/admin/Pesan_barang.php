<?php
class Pesan_barang extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pesan_barang');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$x['data']=$this->m_barang->tampil_barang($id_toko);
		$x['sup']=$this->m_suplier->tampil_suplier();
		$this->load->view('admin/v_pesan_barang',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->input->post('kode_brg');
		$toko=$this->session->userdata('id_toko');
		$x['brg']=$this->m_barang->get_barang($kobar,$toko);
		$this->load->view('admin/v_detail_barang_beli',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart_beli(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $id_toko=$this->session->userdata('id_toko');
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_barang->get_barang($kobar,$id_toko);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'harpok'   => $i['barang_harpok'],
               'price'    => str_replace(",", "", $this->input->post('harjul'))-$this->input->post('diskon'),
               'harga'    => $i['barang_harjul'],
               'disc'     => $this->input->post('diskon'),
               'qty'      => $this->input->post('qty'),
               'amount'	  => str_replace(",", "", $this->input->post('harjul'))
            );
	if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('qty');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}

		redirect('admin/Pesan_barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart(){
	if($this->session->userdata('akses')=='1'){
		$nofak=$this->input->post('nofak');
		$tgl=$this->input->post('tgl');
		$toko=$this->session->userdata('id_toko');
		$suplier=$this->input->post('suplier');
		$this->session->set_userdata('nofak',$nofak);
		$this->session->set_userdata('tglfak',$tgl);
		$this->session->set_userdata('suplier',$suplier);
		$kobar=$this->input->post('kode_brg');
		$produk=$this->m_barang->get_barang($kobar,$toko);
		$i=$produk->row_array();
		$data = array(
               'id'       => $i['barang_id'],
               'name'     => $i['barang_nama'],
               'satuan'   => $i['barang_satuan'],
               'price'    => $this->input->post('harpok'),
               'harga'    => $this->input->post('harjul'),
               'qty'      => $this->input->post('jumlah')
           );
       if(!empty($this->cart->total_items())){
		foreach ($this->cart->contents() as $items){
			$id=$items['id'];
			$qtylama=$items['qty'];
			$rowid=$items['rowid'];
			$kobar=$this->input->post('kode_brg');
			$qty=$this->input->post('jumlah');
			if($id==$kobar){
				$up=array(
					'rowid'=> $rowid,
					'qty'=>$qtylama+$qty
					);
				$this->cart->update($up);
			}else{
				$this->cart->insert($data);
			}
		}
	}else{
		$this->cart->insert($data);
	}
		redirect('admin/Pesan_barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('akses')=='1'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/Pesan_barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_pembelian(){
	if($this->session->userdata('akses')=='1'){
		$toko=$this->session->userdata('id_toko');
		//$nofak=$this->session->userdata('nofak');
		$tglfak=$this->session->userdata('tglfak');
		$suplier=$this->session->userdata('suplier');
		if( !empty($tglfak) && !empty($suplier)){
			$beli_kode=$this->m_pesan_barang->get_kobel();
			$order_proses=$this->m_pesan_barang->simpan_pembelian($tglfak,$suplier,$beli_kode,$toko);
			if($order_proses){
				$this->cart->destroy();
				//$this->session->unset_userdata('nofak');
				$this->session->unset_userdata('tglfak');
				$this->session->unset_userdata('suplier');
				echo $this->session->set_flashdata('msg','<label class="label label-success">Pembelian Berhasil di Simpan ke Database</label>');
				redirect('admin/Pesan_barang');	
			}else{
				redirect('admin/Pesan_barang');
			}
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Pembelian Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/Pesan_barang');
		}
	}else{
        echo "Halaman tidak ditemukan";
    }	
	}
}