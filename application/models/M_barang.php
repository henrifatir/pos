<?php
class M_barang extends CI_Model{

	function hapus_barang($kode){
		$hsl=$this->db->query("DELETE FROM tbl_barang_toko where barang_id='$kode'");
		return $hsl;
	}

	function update_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_barang_toko SET barang_nama='$nabar',barang_satuan='$satuan',barang_harpok='$harpok',barang_harjul='$harjul',barang_harjul_grosir='$harjul_grosir',barang_stok='$stok',barang_min_stok='$min_stok',barang_tgl_last_update=NOW(),barang_kategori_id='$kat',barang_user_id='$user_id' WHERE barang_id='$kobar'");
		return $hsl;
	}
    function tampil_pasien(){
    	$hsl=$this->db->query("SELECT kode_pasien,tgl_masuk,nama_pasien from tbl_scan");
    	return $hsl;
    }
	function tampil_barang($id){
		$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang_toko JOIN tbl_kategori ON barang_kategori_id=kategori_id where toko='$id' ");
		return $hsl;
	}
	function tampil_barang_all(){
		$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang_toko JOIN tbl_kategori ON barang_kategori_id=kategori_id ");
		return $hsl;
	}
    function tampil_baranglabel($id,$toko){
		$hsl=$this->db->query("SELECT barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,kategori_nama FROM tbl_barang_toko JOIN tbl_kategori ON barang_kategori_id=kategori_id where barang_id='".$id."' and toko='$toko' ");
		return $hsl;
	}

	function simpan_barang($kobar,$nabar,$kat,$satuan,$harpok,$harjul,$harjul_grosir,$stok,$min_stok,$id_toko){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_barang_toko (barang_id,barang_nama,barang_satuan,barang_harpok,barang_harjul,barang_harjul_grosir,barang_stok,barang_min_stok,barang_kategori_id,barang_user_id,toko) VALUES ('$kobar','$nabar','$satuan','$harpok','$harjul','$harjul_grosir','$stok','$min_stok','$kat','$user_id','$id_toko')");
		return $hsl;
	}


	function get_barang($kobar,$toko){
		$hsl=$this->db->query("SELECT * FROM tbl_barang_toko where barang_id='$kobar' and toko='$toko'");
		return $hsl;
	}

	function get_kobar(){
		$q = $this->db->query("SELECT count(*) AS kd_max FROM tbl_barang_toko");
        $kd = "";
        if($q->row()->kd_max > 0){
            foreach($q->result() as $k){
                $tmp = ((int)$k->kd_max)+1;
                $kd = sprintf("%06s", $tmp);
            }
        }else{
            $kd = "000001";
        }
        return "BR".$kd;
	}

}