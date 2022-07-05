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
            $data['dash'] = $this->kuis->getTotalKuisAndSoal($this->session->userdata('id'));
        } else {
            // $data['dash'] = $this->kuis->getTotalKuisAndSoal($user['id_pengajar']);
        }
        
        $data['title'] = 'Halaman Pengajar';
        $this->load->view('template/header', $data);
        // $this->load->view('dashboard');
        $this->load->view('template/footer');
    }
}
