<?php
class Laporan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_pembelian');
		$this->load->model('m_penjualan');
		$this->load->model('m_laporan');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$data['data']=$this->m_barang->tampil_barang($id_toko);
		$data['data_all']=$this->m_barang->tampil_barang_all();
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['jual_bln_all']=$this->m_laporan->get_bulan_jual_all($id_toko);
		$data['jual_bln']=$this->m_laporan->get_bulan_jual_all();
		$data['jual_thn_all']=$this->m_laporan->get_tahun_jual_all($id_toko);
		$data['jual_thn']=$this->m_laporan->get_tahun_jual_all();
		$data['nofak']=$this->m_laporan->get_nofak();
		$data['nofak_pesan']=$this->m_laporan->get_nofak_pesan($id_toko);
		$this->load->view('admin/v_laporan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function lap_stok_barang(){
	    $id_toko=$this->session->userdata('id_toko');
		$x['data']=$this->m_laporan->get_stok_barang($id_toko);
		$this->load->view('admin/laporan/v_lap_stok_barang',$x);
	}
	function lap_data_barang(){
		$id_toko=$this->session->userdata('id_toko');
		$x['data']=$this->m_laporan->get_data_barang($id_toko);
		$this->load->view('admin/laporan/v_lap_barang',$x);
	}
	function lap_data_penjualan(){
		$id_toko=$this->session->userdata('id_toko');
		$x['data']=$this->m_laporan->get_data_penjualan($id_toko);
		$x['jml']=$this->m_laporan->get_total_penjualan($id_toko);
		$this->load->view('admin/laporan/v_lap_penjualan',$x);
	}
	function lap_penjualan_pertanggal(){
		$id_toko=$this->session->userdata('id_toko');
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal,$id_toko);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal,$id_toko);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal',$x);
	}
	function lap_penjualan_perbulan(){
		$id_toko=$this->session->userdata('id_toko');
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan,$id_toko);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan,$id_toko);
		$this->load->view('admin/laporan/v_lap_jual_perbulan',$x);
	}
		function lap_pesan_perkode(){
		$id_toko=$this->session->userdata('id_toko');
		$bulan=$this->input->post('bln');
		$x['data']=$this->m_laporan->get_pesan_perbulan($bulan,$id_toko);
		$this->load->view('admin/laporan/v_lap_pesan_perbulan',$x);
	}
	function lap_pesan_perbulan_all(){
		$id_toko=$this->session->userdata('id_toko');
		$bulan=$this->input->post('bln');
		$x['data']=$this->m_laporan->get_pesan_perbulan_all($bulan,$id_toko);
		$this->load->view('admin/laporan/v_lap_pesan_perbulan_all',$x);
	}
	function lap_pembelian(){
		$id_toko=$this->session->userdata('id_toko');
		$faktur=$this->input->post('faktur');
		$komponen=explode('|', $faktur);
		$kode=$komponen[0];
		$x['data']=$this->m_laporan->get_pembelian($kode);
		$this->load->view('admin/laporan/v_lap_pembelian',$x);
	}
	function lap_penjualan_pertahun(){
		$id_toko=$this->session->userdata('id_toko');
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun,$id_toko);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun,$id_toko);
		$this->load->view('admin/laporan/v_lap_jual_pertahun',$x);
	}
	function lap_laba_rugi(){
		$id_toko=$this->session->userdata('id_toko');
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($bulan,$id_toko);
		$x['data']=$this->m_laporan->get_lap_laba_rugi($bulan,$id_toko);
		$this->load->view('admin/laporan/v_lap_laba_rugi',$x);
	}
	function lap_stok_barang_all(){
		$x['data']=$this->m_laporan->get_stok_barang();
		$this->load->view('admin/laporan/v_lap_stok_barang',$x);
	}
	function lap_data_barang_all(){
		$x['data']=$this->m_laporan->get_data_barang();
		$this->load->view('admin/laporan/v_lap_barang',$x);
	}
	function lap_data_penjualan_all(){
		$x['data']=$this->m_laporan->get_data_penjualan();
		$x['jml']=$this->m_laporan->get_total_penjualan();
		$this->load->view('admin/laporan/v_lap_penjualan',$x);
	}
	function lap_penjualan_pertanggal_all(){
		$tanggal=$this->input->post('tgl');
		$x['jml']=$this->m_laporan->get_data__total_jual_pertanggal($tanggal);
		$x['data']=$this->m_laporan->get_data_jual_pertanggal($tanggal);
		$this->load->view('admin/laporan/v_lap_jual_pertanggal',$x);
	}
	function lap_penjualan_perbulan_all(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_jual_perbulan($bulan);
		$x['data']=$this->m_laporan->get_jual_perbulan($bulan);
		$this->load->view('admin/laporan/v_lap_jual_perbulan',$x);
	}
	function lap_pembelian_all(){
		$faktur=$this->input->post('faktur');
		$komponen=explode('|', $faktur);
		$kode=$komponen[0];
		$x['data']=$this->m_laporan->get_pembelian($kode);
		$this->load->view('admin/laporan/v_lap_pembelian',$x);
	}
	function lap_penjualan_pertahun_all(){
		$tahun=$this->input->post('thn');
		$x['jml']=$this->m_laporan->get_total_jual_pertahun($tahun);
		$x['data']=$this->m_laporan->get_jual_pertahun($tahun);
		$this->load->view('admin/laporan/v_lap_jual_pertahun',$x);
	}
	function lap_laba_rugi_all(){
		$bulan=$this->input->post('bln');
		$x['jml']=$this->m_laporan->get_total_lap_laba_rugi($bulan);
		$x['data']=$this->m_laporan->get_lap_laba_rugi($bulan);
		$this->load->view('admin/laporan/v_lap_laba_rugi',$x);
	}
}