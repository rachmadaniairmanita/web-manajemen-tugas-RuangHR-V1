<?php
class management extends CI_model {
    // kode belum optimal
    function getAllData(){
        $query = "SELECT *, count(member.id_departemen) AS jumlah FROM departemen INNER JOIN member on member.id_departemen = departemen.id_departemen group by departemen.id_departemen";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    function getAllAnggota(){
        $query = "SELECT * FROM user JOIN member on user.id_user = member.id_user JOIN departemen ON member.id_departemen = departemen.id_departemen";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    function getProfileDetail($id_user=-1){
        $query= "SELECT * FROM user WHERE id_user='".$id_user."'";
        $res = $this->db->query($query);
        return $res->result_array();
    }

    function updateProfileDetail($id_user=-1){
        $this->db->set("username", $this->input->post('username'));
        $this->db->set("nama_user", $this->input->post("nama"));
        $this->db->set("alamat", $this->input->post("alamat"));
        $this->db->set("nomor_telepon", $this->input->post("nomor"));
        $this->db->where("id_user", $id_user);
        $this->db->update('user');
        return $this->db->insert_id();
    }
}

?>