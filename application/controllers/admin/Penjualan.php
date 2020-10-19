<?php
class Penjualan extends CI_Controller{
	function __construct(){
		parent::__construct();
		if($this->session->userdata('masuk') !=TRUE){
            $url=base_url();
            redirect($url);
        };
		$this->load->model('m_kategori');
		$this->load->model('m_barang');
		$this->load->model('m_suplier');
		$this->load->model('m_penjualan');
	}
	function index(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $id_toko=$this->session->userdata('id_toko');
		$data['data']=$this->m_barang->tampil_barang($id_toko);
		$this->load->view('admin/v_penjualan',$data);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function get_barang(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
        $id_toko=$this->session->userdata('id_toko');
		$kobar=$this->input->post('kode_brg');
		$x['brg']=$this->m_barang->get_barang($kobar,$id_toko);
		$this->load->view('admin/v_detail_barang_jual',$x);
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function add_to_cart(){
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

		redirect('admin/penjualan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function remove(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$row_id=$this->uri->segment(4);
		$this->cart->update(array(
               'rowid'      => $row_id,
               'qty'     => 0
            ));
		redirect('admin/penjualan');
	}else{
        echo "Halaman tidak ditemukan";
    }
	}
	function simpan_penjualan(){
	if($this->session->userdata('akses')=='1' || $this->session->userdata('akses')=='2'){
		$total=$this->input->post('total');
        $kredit=$_POST['kredit'];
        $id_toko=$this->session->userdata('id_toko');
		$jml_uang=str_replace(",", "", $this->input->post('jml_uang'));
		$kembalian=$jml_uang-$total;
        if ($kredit=='kredit') {
            $nofak=$this->m_penjualan->get_nofak();
                $this->session->set_userdata('nofak',$nofak);
                $order_proses=$this->m_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian,$id_toko);
                if($order_proses){
                    $this->cart->destroy();
                    
                    $this->session->unset_userdata('tglfak');
                    $this->session->unset_userdata('suplier');
                    $this->load->view('admin/alert/alert_sukses');  
                }else{
                    redirect('admin/penjualan');
                }
        }else{

		if(!empty($total) && !empty($jml_uang)){
			if($jml_uang < $total){
				echo $this->session->set_flashdata('msg','<label class="label label-danger">Jumlah Uang yang anda masukan Kurang</label>');
				redirect('admin/penjualan');
			}else{
				$nofak=$this->m_penjualan->get_nofak();
				$this->session->set_userdata('nofak',$nofak);
				$order_proses=$this->m_penjualan->simpan_penjualan($nofak,$total,$jml_uang,$kembalian,$id_toko);
				if($order_proses){
					$this->cart->destroy();
					
					$this->session->unset_userdata('tglfak');
					$this->session->unset_userdata('suplier');
					$this->load->view('admin/alert/alert_sukses');	
				}else{
					redirect('admin/penjualan');
				}
			}
			
		}else{
			echo $this->session->set_flashdata('msg','<label class="label label-danger">Penjualan Gagal di Simpan, Mohon Periksa Kembali Semua Inputan Anda!</label>');
			redirect('admin/penjualan');
		}
        }

	}else{
        echo "Halaman tidak ditemukan";
    }
	}

	function cetak_faktur(){
		$x['data']=$this->m_penjualan->cetak_faktur();
		//$this->load->view('admin/laporan/v_faktur',$x);
		//$this->session->unset_userdata('nofak');
		$this->cetak_struk();
	}
	public function cetak_struk() {
        // me-load library escpos
        $this->load->library('escpos');
 
        // membuat connector printer ke shared printer bernama "printer_a" (yang telah disetting sebelumnya)
        $connector = new Escpos\PrintConnectors\WindowsPrintConnector("struk2");
 
        // membuat objek $printer agar dapat di lakukan fungsinya
        $printer = new Escpos\Printer($connector);
 
        // membuat fungsi untuk membuat 1 baris tabel, agar dapat dipanggil berkali-kali dgn mudah
        function buatBaris4Kolom($kolom1, $kolom2, $kolom3, $kolom4) {
            // Mengatur lebar setiap kolom (dalam satuan karakter)
            $lebar_kolom_1 = 10;
            $lebar_kolom_2 = 3;
            $lebar_kolom_3 = 6;
            $lebar_kolom_4 = 8;
 
            // Melakukan wordwrap(), jadi jika karakter teks melebihi lebar kolom, ditambahkan \n 
            $kolom1 = wordwrap($kolom1, $lebar_kolom_1, "\n", true);
            $kolom2 = wordwrap($kolom2, $lebar_kolom_2, "\n", true);
            $kolom3 = wordwrap($kolom3, $lebar_kolom_3, "\n", true);
            $kolom4 = wordwrap($kolom4, $lebar_kolom_4, "\n", true);
 
            // Merubah hasil wordwrap menjadi array, kolom yang memiliki 2 index array berarti memiliki 2 baris (kena wordwrap)
            $kolom1Array = explode("\n", $kolom1);
            $kolom2Array = explode("\n", $kolom2);
            $kolom3Array = explode("\n", $kolom3);
            $kolom4Array = explode("\n", $kolom4);
 
            // Mengambil jumlah baris terbanyak dari kolom-kolom untuk dijadikan titik akhir perulangan
            $jmlBarisTerbanyak = max(count($kolom1Array), count($kolom2Array), count($kolom3Array), count($kolom4Array));
 
            // Mendeklarasikan variabel untuk menampung kolom yang sudah di edit
            $hasilBaris = array();
 
            // Melakukan perulangan setiap baris (yang dibentuk wordwrap), untuk menggabungkan setiap kolom menjadi 1 baris 
            for ($i = 0; $i < $jmlBarisTerbanyak; $i++) {
 
                // memberikan spasi di setiap cell berdasarkan lebar kolom yang ditentukan, 
                $hasilKolom1 = str_pad((isset($kolom1Array[$i]) ? $kolom1Array[$i] : ""), $lebar_kolom_1, " ");
                $hasilKolom2 = str_pad((isset($kolom2Array[$i]) ? $kolom2Array[$i] : ""), $lebar_kolom_2, " ");
 
                // memberikan rata kanan pada kolom 3 dan 4 karena akan kita gunakan untuk harga dan total harga
                $hasilKolom3 = str_pad((isset($kolom3Array[$i]) ? $kolom3Array[$i] : ""), $lebar_kolom_3, " ", STR_PAD_LEFT);
                $hasilKolom4 = str_pad((isset($kolom4Array[$i]) ? $kolom4Array[$i] : ""), $lebar_kolom_4, " ", STR_PAD_LEFT);
 
                // Menggabungkan kolom tersebut menjadi 1 baris dan ditampung ke variabel hasil (ada 1 spasi disetiap kolom)
                $hasilBaris[] = $hasilKolom1 . " " . $hasilKolom2 . " " . $hasilKolom3 . " " . $hasilKolom4;
            }
 
            // Hasil yang berupa array, disatukan kembali menjadi string dan tambahkan \n disetiap barisnya.
            return implode($hasilBaris, "\n") . "\n";
        }   
        //Tampil Data Penjualan
        $data=$this->m_penjualan->cetak_faktur();
        $datajual_total=$this->m_penjualan->total_penjualan()->row()->jual_total;
        $datajual_jml_uang=$this->m_penjualan->total_penjualan()->row()->jual_jml_uang;
        $datajual_kembalian=$this->m_penjualan->total_penjualan()->row()->jual_kembalian;
         foreach ($data->result_array() as $i) {
       // $no++;
        
        $nabar=$i['d_jual_barang_nama'];
        $satuan=$i['d_jual_barang_satuan'];
        $tanggal=date('d-M-Y');
        $harjul=$i['d_jual_barang_harjul'];
        $qty=$i['d_jual_qty'];
        $diskon=$i['d_jual_diskon'];
        $total=$i['d_jual_total'];
        // Membuat judul
        $printer->initialize();
        $printer->selectPrintMode(Escpos\Printer::MODE_DOUBLE_HEIGHT); // Setting teks menjadi lebih besar
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER); // Setting teks menjadi rata tengah
       // $printer->'assets/img/gambar.jpeg');
        $printer->text("TOKO OLEH-OLEH KHAS MADIUN\n");
        $printer->text("Pe-We\n");
        $printer->text("\n");
 
        // Data transaksi
        $printer->initialize();
       // $printer->text("Kasir : Badar Wildanie\n");
        $printer->text($tanggal);
 
        // Membuat tabel
        $printer->initialize(); // Reset bentuk/jenis teks

        $printer->text("-------------------------------\n");
        $printer->text(buatBaris4Kolom("Barang", "qty", "Satuan", "Total"));
        $printer->text("-------------------------------\n");
        $printer->text(buatBaris4Kolom($nabar, $qty, $satuan, 'Rp '.number_format($total)));
        $printer->text("-------------------------------\n");
        $printer->text(buatBaris4Kolom('Jumlah', '', "Rp", number_format($datajual_total)));
        $printer->text(buatBaris4Kolom('Dibayar', '', "Rp", number_format($datajual_jml_uang)));
        $printer->text(buatBaris4Kolom('Kembali', '', "Rp", number_format($datajual_kembalian)));
        $printer->text("\n");
 
         // Pesan penutupikasi
        $printer->initialize();
        $printer->setJustification(Escpos\Printer::JUSTIFY_CENTER);
        $printer->text("Terima kasih telah berbelanja\n");
        $printer->text("Instagram @pewe_madiun\n");

 
        $printer->feed(5); // mencetak 5 baris kosong agar terangkat (pemotong kertas saya memiliki jarak 5 baris dari toner)
        $printer->close();
    }
}


}