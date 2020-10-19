<?php
class M_pesan_barang extends CI_Model{

	function simpan_pembelian($tglfak,$suplier,$beli_kode,$toko){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_pesan_barang (beli_nofak,beli_tanggal,beli_suplier_id,beli_user_id,beli_kode,toko) VALUES ('','$tglfak','$suplier','$idadmin','$beli_kode','$toko')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_beli_nofak' 		=>	'',
				'd_beli_barang_id'	=>	$item['id'],
				'd_beli_harga'		=>	$item['price'],
				'd_beli_jumlah'		=>	$item['qty'],
				'd_beli_total'		=>	$item['subtotal'],
				'd_beli_kode'		=>	$beli_kode
			);
			$this->db->insert('tbl_detail_pesan',$data);
			/*$this->db->query("update tbl_barang_toko set barang_stok=barang_stok+'$item[qty]',barang_harpok='$item[price]',barang_harjul='$item[harga]' where barang_id='$item[id]' and toko='$toko'");*/
		}
		return true;
	}
	function get_kobel(){
		$q = $this->db->query("SELECT MAX(RIGHT(beli_kode,6)) AS kd_max FROM tbl_pesan_barang WHERE DATE(beli_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "PN".date('dmy').$kd;
	}
}