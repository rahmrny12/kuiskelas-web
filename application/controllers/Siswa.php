<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!is_logged_in()) {
			redirect(base_url('auth'));
		}
		$this->load->model('user');
		$this->load->model('kuis');
	}

	public function index()
	{
		$user = $this->user->getPengajarByEmail('rahmatprayogo12@gmail.com');
		$data['kuis'] = $this->kuis->getKuisByPengajar($user['id_pengajar'])->result_array();

		$data['title'] = 'Halaman Pengajar';
		$this->load->view('template/header', $data);
		$this->load->view('siswa/index', $data);
		$this->load->view('template/footer');
	}

	public function kerjakan_kuis($id_kuis)
	{
		$data['kuis'] = $this->kuis->getKuisById($id_kuis)->row_array();
		$data['soal'] = $this->kuis->getSoalByKuis($id_kuis);
		$data['id_kuis'] = $id_kuis;

		$data['title'] = 'Halaman Kuis';
		$this->load->view('template/header', $data);
		$this->load->view('siswa/kerjakan_kuis', $data);
		$this->load->view('template/footer');
	}

	public function nilai($id_kuis)
	{
		date_default_timezone_set('Asia/Jakarta');
		$waktu_penilaian = date('Y-m-d H:i:s');

		$kuis = $this->kuis->getSoalByKuis($id_kuis);
		$nilai = 0;
		$jawaban_benar = 0;
		$jawaban_salah = 0;

		$i = 1;
		foreach ($kuis as $data) {
			if ($data['jawaban_benar'] == $this->input->post('jawaban_pertanyaan_' . $i)) {
				$nilai += 10;
				$jawaban_benar += 1;
			} else {
				$nilai -= 10;
				$jawaban_salah += 1;
			}
			$i++;
		}

		$dataNilai = [
			'id_kuisioner' => $id_kuis,
			'id_siswa' => $this->session->userdata('id'),
			'nilai_kuis' => $nilai,
			'jawaban_benar' => $jawaban_benar,
			'jawaban_salah' => $jawaban_salah,
			'waktu_penilaian' => $waktu_penilaian,
		];

		$result = $this->kuis->nilaiSiswa($dataNilai);

		if ($result) {
			redirect(base_url('siswa/hasil/' . $id_kuis));
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<span class="small">Gagal mengirim penilaian kui.</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect(base_url('siswa/kerjakan_kuis/' . $id_kuis));
		}
	}

	public function hasil($id_kuis)
	{
		$id_siswa = $this->session->userdata('id');
		$data['penilaian'] = $this->kuis->getNilaiSiswa($id_siswa, $id_kuis);
		$waktu = new DateTime($data['penilaian']['waktu_penilaian']);
		$data['tanggal'] = $waktu->format('l, d F Y');
		$data['waktu'] = $waktu->format('H:i');

		$data['title'] = 'Halaman Penilaian';
		$this->load->view('template/header', $data);
		$this->load->view('siswa/penilaian', $data);
		$this->load->view('template/footer');
	}

	public function detail_nilai($id_penilaian)
	{
		$data['penilaian'] = $this->kuis->getNilaiSiswaById($id_penilaian);
		$waktu = new DateTime($data['penilaian']['waktu_penilaian']);
		$data['tanggal'] = $waktu->format('l, d F Y');
		$data['waktu'] = $waktu->format('H:i');

		$data['title'] = 'Halaman Penilaian';
		$this->load->view('template/header', $data);
		$this->load->view('siswa/penilaian', $data);
		$this->load->view('template/footer');
	}

	public function riwayat_penilaian()
	{
		$id_siswa = $this->session->userdata('id');
		$data['riwayat'] = $this->kuis->getRiwayatPenilaian($id_siswa);

		$data['title'] = 'Halaman Penilaian';
		$this->load->view('template/header', $data);
		$this->load->view('siswa/riwayat', $data);
		$this->load->view('template/footer');
	}
}
