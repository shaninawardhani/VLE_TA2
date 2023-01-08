<?php
class Status_kuis_model extends CI_model
{
    public function getStatusKuis()
    {
        return $this->db->get('status_kuis')->result_array();
    }

    public function getStatusKuisById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get("status_kuis");
    }

    public function getStatusKuisByKelas($id)
    {
        $this->db->where("kelas_id", $id);
        return $this->db->get("status_kuis");
    }

    public function getStatusKuisByKuis($id)
    {
        $this->db->where("kuis_id", $id);
        return $this->db->get("status_kuis")->result_array();
    }

    public function updateStatus($id)
    {
        $data = array(
            "status" => $this->input->post("status")
        );
        $this->db->where("id", $id);
        return $this->db->update("status_kuis", $data);
    }
}
