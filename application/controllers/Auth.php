<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
    }

    public function index()
    {
        if (!is_logged_in()) {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
                'required' => 'Isi email terlebih dahulu.',
                'valid_email' => 'Format email tidak sesuai.',
            ]);

            $this->form_validation->set_rules('password', 'Password', 'trim|required', [
                'required' => 'Isi password terlebih dahulu.',
            ]);

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login';
                $this->load->view('auth-template/header', $data);
                $this->load->view('auth/login');
                $this->load->view('auth-template/footer');
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $loginPengajar = $this->user->getPengajarByEmail($email);
                if ($loginPengajar != null) {
                    $userPassword = $loginPengajar['password'];
                    $user = [
                        'id' => $loginPengajar['id_pengajar'],
                        'name' => $loginPengajar['nama'],
                        'email' => $loginPengajar['email'],
                        'role' => 'pengajar',
                        'logged_in' => true,
                    ];
                } else {
                    $loginSiswa = $this->user->getSiswaByEmail($email);
                    $userPassword = $loginSiswa['password'];
                    $user = [
                        'id' => $loginSiswa['id_siswa'],
                        'name' => $loginSiswa['nama'],
                        'email' => $loginSiswa['email'],
                        'role' => 'siswa',
                        'logged_in' => true,
                    ];
                }

                if (password_verify($password, $userPassword)) {
                    $this->session->set_userdata($user);
                    redirect(base_url());
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span class="small">Username atau password Anda salah.</span>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>'
                    );
                    redirect(base_url('auth'));
                }
            }
        } else {
            redirect(base_url());
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['name', 'email', 'logged_in']);
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
