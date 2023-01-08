<?php
class Kelas_model extends CI_model
{
    function getKelas()
    {
        $this->db->get('kelas');
    }

    function getKelasASC()
    {
        #$this->db->get("kelas")->result_array();
        $this->db->from("kelas");
        $this->db->order_by('tingkat', 'asc');
        $this->db->order_by('rombel', 'asc');
        $this->db->order_by('tahun', 'asc');
        $query = $this->db->get();
        return $query->result_array();
    }

    function insertKelas()
    {
        $kelas = array(
            "tingkat" => $this->input->post("tingkat"),
            "rombel" => $this->input->post("rombel"),
            "tahun" => $this->input->post("tahun")
        );
        return $this->db->insert("kelas", $kelas);
    }

    function getKelasById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('kelas');
    }
    function updateKelas($id)
    {
        $data = array(
            "tingkat" => $this->input->post("tingkat"),
            "rombel" => $this->input->post("rombel"),
            "tahun" => $this->input->post("tahun")
        );
        $this->db->where("id", $id);
        return $this->db->update("Kelas", $data);
    }

    function deleteKelas($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("kelas");
    }
}
