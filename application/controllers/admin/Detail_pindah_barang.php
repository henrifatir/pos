<?php
class Detail_pindah_barang extends CI_Controller{
	function __construct(){
			parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_pindah_barang');
		$this->load->library('barcode');
	}
	function index(){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		$data['data']=$this->m_barang->tampil_barang($id_toko);
		$data['kat']=$this->m_kategori->tampil_kategori();
		$data['kat2']=$this->m_kategori->tampil_kategori();
		$data['bayar']=$this->m_pindah_barang->tampil($id_toko);
		$data['data']=$this->m_pindah_barang->tampil_pesan($id_toko);
		$this->load->view('admin/v_detail_pindah_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function edit_bayar(){
	if($this->session->userdata('akses')=='1'){
         $kode=$this->input->post('kobar');
		$id_toko=$this->session->userdata('id_toko');
		$kobar=$this->input->post('kode_barang');
		$jml=$this->input->post('jml');
		$id=$this->input->post('kobar');
		$this->m_pindah_barang->update_barang_pesanan_new($kobar,$jml,$id);
		$data['data']=$this->m_barang->tampil_barang($id_toko);
		$data['bayar']=$this->m_pindah_barang->tampil_detail($id_toko,$kode);
		$data['data']=$this->m_pindah_barang->tampil_pesan($id_toko);
		$this->load->view('admin/v_detail_pindah_barang',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function detail($id){
	if($this->session->userdata('akses')=='1'){
		$id_toko=$this->session->userdata('id_toko');
		
		$data['data']=$this->m_barang->tampil_barang($id_toko);
		$data['bayar']=$this->m_pindah_barang->tampil_detail($id_toko,$id);
		$data['data']=$this->m_pindah_barang->tampil_pesan($id_toko);
		$this->load->view('admin/v_detail_pindah_barang',$data);
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