<?php
class Status_Tugas_model extends CI_model
{
    public function getStatusTugas()
    {
        return $this->db->get('status_tugas')->result_array();
    }
    public function getStatusTugasById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('status_tugas');
    }
    public function getStatusTugasByPenugasan($id)
    {
        $this->db->where("penugasan_id", $id);
        return $this->db->get('status_tugas');
    }

    function insertStatusTugas($data)
    {
        return $this->db->insert("status_tugas", $data);
    }
}
