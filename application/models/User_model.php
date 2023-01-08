<?php
class User_model extends CI_model
{
    function getUser()
    {
        return $this->db->get('user')->result_array();
    }

    function getUserGuru()
    {
        $ids = 2;
        $this->db->from("user");
        $this->db->where("role_id", $ids);
        // $this->db->order_by('kelas_id', 'asc');
        // $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
        #return $this->db->get_where('user', array('role_id' => $ids))->result_array();
    }

    function getUserSiswa()
    {
        $ids = 3;
        $this->db->from("user");
        $this->db->where("role_id", $ids);
        // $this->db->order_by('kelas_id', 'asc');
        // $this->db->order_by('name', 'asc');
        $query = $this->db->get();
        return $query->result_array();
        #return $this->db->get_where('user', array('role_id' => $ids))->result_array();
    }
    function getUserSiswaByKelas($id)
    {
        $ids = 3;
        $this->db->where("kelas", $id);
        $this->db->where("role_id", $ids);
        return $this->db->get('user')->result_array();
    }

    function insertUserGuru()
    {
        $user = array(
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "image" => "http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg",
            "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            "role_id" => 2,
            "is_active" => 1,
            "kelas_id" => $this->input->post("kelas_id"),
            "nuptk_nisn" => $this->input->post("nuptk"),
            "jabatan" => $this->input->post("jabatan"),
            "date_created" => time()
        );
        return $this->db->insert("user", $user);
    }

    function insertUserSiswa()
    {
        $user = array(
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "image" => "http://localhost/KP_VLE_SDN-KOPO-01/assets/img/profile/default.jpg",
            "password" => password_hash($this->input->post("password"), PASSWORD_DEFAULT),
            "role_id" => 3,
            "is_active" => 1,
            "kelas_id" => $this->input->post("kelas_id"),
            "nuptk_nisn" => $this->input->post("nisn"),
            "date_created" => time()
        );
        return $this->db->insert("user", $user);
    }

    function getUserById($id)
    {
        $this->db->where("id", $id);
        return $this->db->get('user');
    }

    function getUserKelasIdById($id)
    {
        $this->db->where("id", $id);
        $this->db->select('kelas_id');
        return $this->db->get('user');
    }

    function updateGuru($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update("user", $data);
    }

    function updateAkun($id, $data)
    {
        $this->db->where("id", $id);
        return $this->db->update("user", $data);
    }

    function updateSiswa($id)
    {
        $data = array(
            "name" => $this->input->post("name"),
            "email" => $this->input->post("email"),
            "kelas_id" => $this->input->post("kelas_id"),
            "nuptk_nisn" => $this->input->post("nisn"),
            "jabatan" => $this->input->post("jabatan")
        );
        $this->db->where("id", $id);
        return $this->db->update("user", $data);
    }

    function updatePassword($id)
    {
        $data = [
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
        ];
        $this->db->where("id", $id);
        return $this->db->update('user', $data);
    }

    function deleteAkun($id)
    {
        $this->db->where("id", $id);
        return $this->db->delete("user");
    }
}
