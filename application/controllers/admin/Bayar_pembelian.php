<?php
class Bayar_pembelian extends CI_Controller{
	function __construct(){
		parent::__construct();
		
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_bayar_beli');
		$this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$data['data']=$this->m_barang->tampil_barang($id_toko);
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['bayar']=$this->m_bayar_beli->tampil($id_toko);
		$this->load->view('admin/v_bayar_pembelian',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function print_label($id){
		$id_toko=$this->session->userdata('id_toko');
		$GETBARANG=$this->m_barang->tampil_baranglabel($id,$id_toko)->row();
		 $html='
				<table>
					<tr>
						<td colspan="3" align= "center" style="font-size: 14px;font-family: Calibri;padding-top:0px;">'.$GETBARANG->barang_nama.'</td>
                    </tr>
					
					<tr>
						<td colspan="3" align= "center"><barcode code='.$GETBARANG->barang_id.' type="C128B" class="barcode" size="1.2" height="1"/></td>
					</tr>
					<tr>
						<td colspan="3" align= "center" style="font-size: 12px;font-family: Calibri;">Rp '.number_format($GETBARANG->barang_harjul).'</td>
					</tr>
					</table>
					';
		
					
					ini_set('memory_limit', '-1');
		$this->load->library('M_pdf');
		$this->m_pdf->load();

		$mpdf=new mPDF('', array(110, 23), 10, 5, 30, 30, 2, 2, 5, 5);
		//$mpdf=new mPDF('', array(55, 23), '', '', 1, 2, 2, 2, 5, 5);

		$mpdf->list_number_suffix = ')';
		$mpdf->WriteHTML($html);
		$mpdf->Output('label.pdf', 'I');
	
	}
	function tambah_barang(){
	if($this->session->userdata('akses')=='1'){
		$kobar=$this->m_barang->get_kobar();
		$id_toko=$this->session->userdata('id_toko');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$id_toko);

		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function tambah_barang_manual(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$kobar=$this->input->post('kobar');
		$nabar=$this->input->post('nabar');
		$kat=$this->input->post('kategori');
		$satuan=$this->input->post('satuan');
		$harpok=str_replace(',', '', $this->input->post('harpok'));
		$harjul=str_replace(',', '', $this->input->post('harjul'));
		$harjul_grosir=str_replace(',', '', $this->input->post('harjul_grosir'));
		$stok=$this->input->post('stok');
		$min_stok=$this->input->post('min_stok');
		$this->m_barang->simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$id_toko);

		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_bayar(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$kobar=$this->input->post('kobar');
		$bayar=$this->input->post('bayar');
		$this->m_bayar_beli->simpan_bayar_beli($kobar,$bayar,$id_toko);
		$this->m_bayar_beli->update_bayar_beli($kobar,$bayar);
		redirect('admin/Bayar_pembelian');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function hapus_barang(){
	if($this->session->userdata('akses')=='1'){
		$kode=$this->input->post('kode');
		$this->m_barang->hapus_barang($kode);
		redirect('admin/barang');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
}