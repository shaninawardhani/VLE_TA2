<?php
class Jawaban_model extends CI_model
{
    public function getJawaban()
    {
        return $this->db->get('jawaban')->result_array();
    }
    public function getJawabanById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('jawaban')->result_array();
    }
    public function getJawabanByKuis($id)
    {
        $this->db->where("kuis_id", $id);
        return $this->db->get('jawaban')->result_array();
    }
    public function getJawabanByNilai($id)
    {
        $this->db->where("nilai_id", $id);
        return $this->db->get('jawaban')->result_array();
    }

    function insertJawaban($id)
    {
        return $this->db->insert("jawaban", $id);
    }
}
