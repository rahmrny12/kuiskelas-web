<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('user');
        $this->load->model('kuis');
        if (!is_logged_in()) {
            redirect(base_url('auth'));
        }
    }
    
    public function index()
    {
        if ($this->session->userdata('role') == 'pengajar') {
            $data['dash'] = $this->kuis->getPengajarDash($this->session->userdata('id'));
            $data['title'] = 'Halaman Pengajar';
            $this->load->view('template/header', $data);
            $this->load->view('dashboard_pengajar', $data);
            $this->load->view('template/footer');
        } else {
            $data['dash'] = $this->kuis->getSiswaDash($this->session->userdata('id'));
            $data['title'] = 'Halaman Siswa';
            $this->load->view('template/header', $data);
            $this->load->view('dashboard_siswa', $data);
            $this->load->view('template/footer');
        }
        
    }
}
