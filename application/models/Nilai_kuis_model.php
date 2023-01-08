<?php
class Nilai_kuis_model extends CI_model
{
    public function getNilaiKuis()
    {
        return $this->db->get('nilai_kuis')->result_array();
    }

    public function getNilaiKuisById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("nilai_kuis");
    }

    public function getNilaiKuisByKelas($id)
    {
        $this->db->where("kelas_id", $id);
        return $this->db->get("nilai_kuis");
    }
    #contoh
    public function getNilaiKuisByKuis($id)
    {
        $this->db->where("kuis_id", $id);
        return $this->db->get("nilai_kuis");
    }

    public function updateNilai($id)
    {
        $data = array(
            "nilai" => $this->input->post("nilai")
        );
        $this->db->where("id", $id);
        return $this->db->update("nilai_kuis", $data);
    }
}
