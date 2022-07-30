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
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Login';
                $this->load->view('auth-template/header', $data);
                $this->load->view('auth/login');
                $this->load->view('auth-template/footer');
            } else {
                $email = $this->input->post('email');
                $password = $this->input->post('password');

                $loginPengajar = $this->user->getPengajarByEmail($email)->row_array();
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

    public function registrasi()
    {
        if (!is_logged_in()) {
            $role = $this->input->get('role');
            $this->form_validation->set_rules('name', 'Nama', 'trim|required');
            $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Konfirmasi Password', 'trim|required|matches[password]');
            if ($role == 'siswa') {
                $this->form_validation->set_rules('kelas', 'Kelas', 'trim|required');
            }

            if ($this->form_validation->run() == false) {
                $data['title'] = 'Registrasi';
                $this->load->view('auth-template/header', $data);
                $this->load->view('auth/registrasi');
                $this->load->view('auth-template/footer');
            } else {
                if ($role == 'siswa') {
                    $user = [
                        'nama' => $this->input->post('name'),
                        'kelas' => $this->input->post('kelas'),
                        'email' => $this->input->post('email'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    ];

                    $result = $this->user->insertSiswa($user);
                } else {
                    $user = [
                        'nama' => $this->input->post('name'),
                        'email' => $this->input->post('email'),
                        'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
                    ];

                    $result = $this->user->insertPengajar($user);
                }

                if ($result) {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-success alert-dismissible fade show" role="alert">
                            <span class="small">Registrasi berhasil, silahkan login.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect(base_url('auth'));
                } else {
                    $this->session->set_flashdata(
                        'message',
                        '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="small">Registrasi gagal, silahkan coba lagi nanti.</span>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>'
                    );
                    redirect(base_url('auth/registrasi'));
                };
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata(['name', 'email', 'logged_in']);
        $this->session->sess_destroy();
        redirect(base_url('auth'));
    }
}
