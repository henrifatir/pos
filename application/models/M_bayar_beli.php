<?php
class M_bayar_beli extends CI_Model{

	function simpan_pembelian($nofak,$tglfak,$suplier,$beli_kode,$toko){
		$idadmin=$this->session->userdata('idadmin');
		$this->db->query("INSERT INTO tbl_beli (beli_nofak,beli_tanggal,beli_suplier_id,beli_user_id,beli_kode,toko) VALUES ('$nofak','$tglfak','$suplier','$idadmin','$beli_kode','$toko')");
		foreach ($this->cart->contents() as $item) {
			$data=array(
				'd_beli_nofak' 		=>	$nofak,
				'd_beli_barang_id'	=>	$item['id'],
				'd_beli_harga'		=>	$item['price'],
				'd_beli_jumlah'		=>	$item['qty'],
				'd_beli_total'		=>	$item['subtotal'],
				'd_beli_kode'		=>	$beli_kode
			);
			$this->db->insert('tbl_detail_beli',$data);
			$this->db->query("update tbl_barang_toko set barang_stok=barang_stok+'$item[qty]',barang_harpok='$item[price]',barang_harjul='$item[harga]' where barang_id='$item[id]' and toko='$toko'");
		}
		return true;
	}
	  function tampil($toko){
    	$hsl=$this->db->query("SELECT sum(d_beli_total) as total,d_beli_barang_id,beli_nofak,DATE_FORMAT(beli_tanggal,'%M %Y') AS bulan,DATE_FORMAT(beli_tanggal,'%d %M %Y') AS beli_tanggal,barang_nama,d_beli_jumlah,d_beli_harga,d_beli_total,bayar,suplier_nama FROM tbl_beli JOIN tbl_detail_beli ON beli_nofak=d_beli_nofak join tbl_barang_toko on barang_id=d_beli_barang_id join tbl_suplier on suplier_id=beli_suplier_id where tbl_beli.toko='$toko' group by beli_nofak ");
		return $hsl;
    }
    	function simpan_bayar_beli($kobar,$bayar,$toko){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_bayar_pembelian (beli_nofak,bayar,id_user,toko) VALUES ('$kobar','$bayar','$user_id','$id_toko')");
		return $hsl;
	}

    function update_bayar_beli($kobar,$bayar){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_beli SET bayar=bayar+'$bayar' where beli_nofak='$kobar' ");
		return $hsl;
	}

	function get_kobel(){
		$q = $this->db->query("SELECT MAX(RIGHT(beli_kode,6)) AS kd_max FROM tbl_beli WHERE DATE(beli_tanggal)=CURDATE()");
        $kd = "";
        if($q->num_rows()>0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BL".date('dmy').$kd;
	}
}