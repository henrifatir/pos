<?php
class M_bayar_jual extends CI_Model{

	
	  function tampil($toko){
    	$hsl=$this->db->query("SELECT jual_nofak,jual_tanggal,jual_total,jual_jml_uang,jual_keterangan from tbl_jual where toko='$toko'  ");
		return $hsl;
    }
    	function simpan_bayar_beli($kobar,$bayar,$toko){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("INSERT INTO tbl_bayar_jual (jual_nofak,jual_jml_uang,id_user,toko) VALUES ('$kobar','$bayar','$user_id','$id_toko')");
		return $hsl;
	}

    function update_bayar_beli($kobar,$bayar){
		$user_id=$this->session->userdata('idadmin');
		$hsl=$this->db->query("UPDATE tbl_jual SET jual_jml_uang=jual_jml_uang+'$bayar' where jual_nofak='$kobar' ");
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