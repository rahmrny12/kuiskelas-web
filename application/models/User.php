<?php

class User extends CI_Model
{
    public function getPengajarByEmail($email)
    {
        return $this->db->get_where('pengajar', ['email' => $email])
            ->row_array();
    }

    public function getSiswaByEmail($email)
    {
        return $this->db->get_where('siswa', ['email' => $email])
            ->row_array();
    }

    public function getSiswaById($id)
    {
        return $this->db->get_where('siswa', ['id_siswa' => $id])
            ->row_array();
    }

    public function insertUser($data)
    {
        $this->db->insert('pengajar', $data);
    }
}