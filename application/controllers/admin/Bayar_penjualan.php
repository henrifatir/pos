<?php
class Bayar_penjualan extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_bayar_jual');
		$this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$data['data']=$this->m_barang->tampil_barang($id_toko);
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['bayar']=$this->m_bayar_jual->tampil($id_toko);
		$this->load->view('admin/v_bayar_penjualan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_bayar(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$kobar=$this->input->post('kobar');
		$bayar=$this->input->post('bayar');
		$this->m_bayar_jual->simpan_bayar_beli($kobar,$bayar,$id_toko);
		$this->m_bayar_jual->update_bayar_beli($kobar,$bayar);
		redirect('admin/Bayar_penjualan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_bayar_jual->hapus_barang($kode);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}