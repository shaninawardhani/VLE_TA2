<?php
class Materi_model extends CI_model
{
    public function getAllMateri()
    {
        $this->db->from("materi");
        $this->db->order_by('tema_id', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }
    function insertMateri($data)
    {
        return $this->db->insert("materi", $data);
    }
    function getMateriById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('materi');
    }
    function updateMateri($data, $id)
    {
        $this->db->where("id", $id);
        return $this->db->update('materi', $data);
    }
    function deleteMateri($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("materi");
    }
}
