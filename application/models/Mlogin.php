<?php
class Mlogin extends CI_Model{
    function cekadmin($u,$p){
        $hasil=$this->db->query("select*from tbl_user u,tbl_toko tk where u.toko=tk.id and u.user_username='$u'and u.user_password=md5('$p')");
        return $hasil;
    }
  
}
