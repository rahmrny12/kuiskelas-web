<?php

class Kuis extends CI_Model
{
    public function insertKuis($data)
    {
        return $this->db->insert('kuisioner', $data);
    }

    public function updateKuis($id_kuis, $data)
    {
        return $this->db->update('kuisioner', $data, ['id_kuisioner' => $id_kuis]);
    }

    public function getAllKuis()
    {
        return $this->db->get('kuisioner');
    }
    
    public function getKuisById($id)
    {
        return $this->db->get_where('kuisioner', ['id_kuisioner' => $id]);
    }

    public function getKuisByPengajar($id)
    {
        return $this->db->get_where('kuisioner', ['id_pengajar' => $id]);
    }

    public function getPengajarDash($id)
    {
        $kuis = $this->db->get_where('kuisioner', ['id_pengajar' => $id]);
        $soal = 0;

        foreach ($kuis->result_array() as $data) {
            $soal += $this->db->where(['id_kuisioner' => $data['id_kuisioner']])->from('soal')->count_all_results();
        }

        $count = [
            'kuis' => $kuis->num_rows(),
            'soal' => $soal,
        ];
        return $count;
    }

    public function getSiswaDash($id)
    {
        $jumlah_kuis_dikerjakan = $this->db->get_where('penilaian', ['id_siswa' => $id]);
        $jumlah_soal_dikerjakan = 0;

        foreach ($jumlah_kuis_dikerjakan->result_array() as $data) {
            $jumlah_soal_dikerjakan += $this->db->where(['id_kuisioner' => $data['id_kuisioner']])->from('soal')->count_all_results();
        }

        $count = [
            'jumlah_kuis_dikerjakan' => $jumlah_kuis_dikerjakan->num_rows(),
            'jumlah_soal_dikerjakan' => $jumlah_soal_dikerjakan,
        ];
        return $count;
    }

    public function insertSoal($data)
    {
        return $this->db->insert('soal', $data);
    }

    public function getSoalById($id)
    {
        return $this->db->get_where('soal', ['id_soal' => $id])
            ->row_array();
    }

    public function getSoalByKuis($id)
    {
        return $this->db->get_where('soal', ['id_kuisioner' => $id])
            ->result_array();
    }

    public function updateSoal($data, $id)
    {
        return $this->db->update('soal', $data, ['id_soal' => $id]);
    }

    public function deleteSoal($id)
    {
        return $this->db->delete('soal', ['id_soal' => $id]);
    }

    public function nilaiSiswa($data)
    {
        return $this->db->insert('penilaian', $data);
    }

    public function getNilaiSiswa($id_siswa, $id_kuis)
    {
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->join('kuisioner', 'kuisioner.id_kuisioner=penilaian.id_kuisioner');
        $this->db->join('siswa', 'siswa.id_siswa=penilaian.id_siswa');
        $this->db->where(['penilaian.id_siswa' => $id_siswa, 'penilaian.id_kuisioner' => $id_kuis]);
        $this->db->order_by('id_penilaian',"DESC");
        return $this->db->get()->row_array();
    }

    public function getNilaiSiswaById($id_penilaian)
    {
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->join('kuisioner', 'kuisioner.id_kuisioner=penilaian.id_kuisioner');
        $this->db->join('siswa', 'siswa.id_siswa=penilaian.id_siswa');
        $this->db->where(['penilaian.id_penilaian' => $id_penilaian]);
        return $this->db->get()->row_array();
    }

    public function getRiwayatPenilaian($id_siswa)
    {
        $this->db->select('*');
        $this->db->from('penilaian');
        $this->db->join('kuisioner', 'kuisioner.id_kuisioner=penilaian.id_kuisioner');
        $this->db->order_by('id_penilaian',"DESC");
        return $this->db->get()->result_array();
    }
}
