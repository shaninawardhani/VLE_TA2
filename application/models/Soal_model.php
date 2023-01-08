<?php
class Soal_model extends CI_model
{
    public function getSoalEssay()
    {
        return $this->db->get('soal_essay')->result_array();
    }
    public function getSoalPG()
    {
        return $this->db->get('soal_pg')->result_array();
    }

    public function getSoalPGByKuis($id)
    {
        $this->db->where("kuis_id", $id);
        return $this->db->get('soal_pg')->result_array();
    }

    public function getSoalEssayByKuis($id)
    {
        $this->db->where("kuis_id", $id);
        return $this->db->get('soal_essay')->result_array();
    }

    public function deleteSoalEssay($id)
    {
        $this->db->where("kuis_id", $id);
        return $this->db->delete("soal_essay");
    }
    public function deleteSoalPG($id)
    {
        $this->db->where("kuis_id", $id);
        return $this->db->delete("soal_pg");
    }
}
