<?php
defined('BASEPATH') or exit('No direct script access allowed');

use chriskacerguis\RestServer\RestController;

class Api extends RestController
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('kuis');
    }

    public function kuis_post()
    {
        try {
            $this->db->db_debug = FALSE;

            $id = $this->input->post('id');
            if ($id == null) {
                $kuis = $this->kuis->getAllKuis();
            } else {
                $kuis = $this->kuis->getKuisByPengajar($id);
            }

            if ($kuis) {
                if ($kuis != null) {
                    $this->response([
                        'kuis'   => $kuis->result(),
                        'status'  => 200,
                        'message' => 'Berhasil mengambil data kuis.',
                    ], 200);
                } else {
                    $this->response([
                        'kuis'   => $kuis->result(),
                        'status'  => 404,
                        'message' => 'Data kuis kosong.',
                    ], 200);
                }
            } else {
                $db_error = $this->db->error();
                throw new Exception('Database error. Pesan error: ' . $db_error['message']);
            }
        } catch (Exception $e) {
            $this->response([
                'status'  => 400,
                'message' => 'Gagal mengambil data kuis. ' . $e,
            ], 400);
        }
    }

    public function pengajar_post()
    {
        try {
            $this->db->db_debug = FALSE;
            
            $email = $this->input->post('email');
            if ($email == null) {
                $pengajar = $this->user->getAllPengajar();
            } else {
                $pengajar = $this->user->getPengajarByEmail($email);
            }
            
            if ($pengajar) {
                if ($pengajar != null) {
                    $this->response([
                        'pengajar'   => $pengajar->result(),
                        'status'  => 200,
                        'message' => 'Berhasil mengambil data pengajar.',
                    ], 200);
                } else {
                    $this->response([
                        'pengajar'   => $pengajar->result(),
                        'status'  => 404,
                        'message' => 'Data pengajar kosong.',
                    ], 200);
                }
            } else {
                $db_error = $this->db->error();
                throw new Exception('Database error. Pesan error: ' . $db_error['message']);
            }
        } catch (Exception $e) {
            $this->response([
                'status'  => 400,
                'message' => 'Gagal mengambil data kuis. ' . $e,
            ], 400);
        }
    }
}
