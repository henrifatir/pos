<?php
class m_pindah_barang extends CI_Model{

	
	  function tampil($toko){
    	$hsl=$this->db->query("SELECT * from tbl_pesan_barang ");
		return $hsl;
    }
      function tampil_pesan($toko){
    	$hsl=$this->db->query("SELECT d_beli_id,d_beli_barang_id,d_beli_kode,d_beli_harga,d_beli_jumlah,barang_nama,toko from tbl_detail_pesan p inner join tbl_barang_toko b on p.d_beli_barang_id=b.barang_id where toko='$toko' ");
		return $hsl;
    }
     function tampil_detail($toko,$id){
    	$hsl=$this->db->query("SELECT d_beli_id,d_beli_barang_id,d_beli_kode,d_beli_harga,d_beli_jumlah,barang_nama,toko from tbl_detail_pesan p inner join tbl_barang_toko  b on p.d_beli_barang_id=b.barang_id where d_beli_kode='$id' and toko='$toko' ");
		return $hsl;
    }
    	function simpan_bayar_beli($kobar,$toko){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO barang (jual_nofak,jual_jml_uang,id_user,toko) VALUES ('$kobar','$bayar','$user_id','$id_toko')");
		return $hsl;
	}
/*SELECT * FROM tbl_pesan_barang p inner join tbl_detail_pesan dtl on p.beli_kode=dtl.d_beli_kode*/
    function update_barang_pesanan($kobar,$jml,$toko){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang_toko SET barang_stok=barang_stok+'$jml' where toko='$toko' and barang_id='$kobar' ");

		return $hsl;
	}
	 function update_barang_pesanan_new($kobar,$jml,$id){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_detail_pesan SET d_beli_jumlah='$jml' where d_beli_barang_id='$kobar' and d_beli_kode='$id'");

		return $hsl;
	}
    function update_barang($kobar,$jumlah,$toko){
	
	$this->db->query("update tbl_barang_toko set barang_stok=barang_stok-'$jumlah' where barang_id='kobar' and toko='$id_toko'");
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