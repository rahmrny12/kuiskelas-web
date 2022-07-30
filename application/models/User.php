<?php

class User extends CI_Model
{
    public function getAllPengajar()
    {
        return $this->db->get('pengajar');
    }

    public function getPengajarByEmail($email)
    {
        return $this->db->get_where('pengajar', ['email' => $email]);
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

    public function insertPengajar($data)
    {
        return $this->db->insert('pengajar', $data);
    }

    public function insertSiswa($data)
    {
        return $this->db->insert('siswa', $data);
    }
}
