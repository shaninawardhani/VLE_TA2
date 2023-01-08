<?php
class Kuis_model extends CI_model
{
    public function getAllKuis()
    {
        return $this->db->get('kuis')->result_array();
    }
    #contoh
    public function getLastKuis()
    {
        $this->db->select('id');
        $this->db->get('kuis');
        return $this->db->insert_id();
    }

    public function insertKuis()
    {
        $data = array(
            "user_id" => $this->input->post("user_id"),
            "tema_id" => $this->input->post("tema_id"),
            "kelas_id" => $this->input->post("kelas_id"),
            "judul_kuis" => $this->input->post("judul_kuis"),
            "due_date" => date("Y-m-d H:i:s", strtotime($this->input->post("due_date")))
        );
        $this->db->set($data);
        return $this->db->insert("kuis");
    }

    function getKuisById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('kuis');
    }

    function updateKuis($id)
    {
        $this->db->where("id", $id);
        $data = array(
            "tema_id" => $this->input->post("tema_id"),
            "judul_kuis" => $this->input->post("judul_kuis"),
            "due_date" => date("Y-m-d H:i:s", strtotime($this->input->post("due_date")))
        );
        $this->db->set($data);
        return $this->db->update('kuis');
    }

    public function deleteKuis($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("kuis");
    }
}
