<?php
defined('BASEPATH') or exit('No direct script access allowed');

class pengajar extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if (!is_logged_in()) {
			redirect(base_url('auth'));
		} else {
			if ($this->session->userdata('role') != 'pengajar') {
				redirect(base_url('dashboard'));
			}
		}
		$this->load->model('user');
		$this->load->model('kuis');
	}

	public function index()
	{
		$data['kuis'] = $this->kuis->getKuisByPengajar($this->session->userdata('id'))->result_array();

		$data['title'] = 'Halaman Pengajar';
		$this->load->view('template/header', $data);
		$this->load->view('pengajar/index', $data);
		$this->load->view('template/footer');
	}

	public function tambah_kuis()
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Kuis';
			$this->load->view('template/header', $data);
			$this->load->view('pengajar/tambah_kuis');
			$this->load->view('template/footer');
		} else {
			$kuis = [
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
				'id_pengajar' => $this->session->userdata('id'),
			];

			$result = $this->kuis->insertKuis($kuis);
			if ($result) {
				redirect(base_url('pengajar'));
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="font-weight-bold">Gagal menambahkan kuis baru.</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect(base_url('pengajar/tambah_kuis'));
			};
		}
	}

	public function edit_kuis($id_kuisioner)
	{
		$this->form_validation->set_rules('judul', 'Judul', 'required');
		$this->form_validation->set_rules('deskripsi', 'Deskripsi', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Kuis';
			$data['kuis'] = $this->kuis->getKuisById($id_kuisioner)->row_array();
			
			$this->load->view('template/header', $data);
			$this->load->view('pengajar/edit_kuis', $data);
			$this->load->view('template/footer');
		} else {
			$kuis = [
				'judul' => $this->input->post('judul'),
				'deskripsi' => $this->input->post('deskripsi'),
			];

			$result = $this->kuis->updateKuis($id_kuisioner, $kuis);
			if ($result) {
				redirect(base_url('pengajar'));
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="font-weight-bold">Gagal mengedit kuis.</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect(base_url('pengajar/edit_kuis'));
			};
		}
	}

	public function daftar_soal($id_kuisioner)
	{
		$data['soal'] = $this->kuis->getSoalByKuis($id_kuisioner);
		$data['idkuis'] = $id_kuisioner;

		$data['title'] = 'Halaman Pengajar';
		$this->load->view('template/header', $data);
		$this->load->view('pengajar/daftar_soal', $data);
		$this->load->view('template/footer');
	}

	public function tambah_soal($id_kuisioner)
	{
		$this->form_validation->set_rules('pertanyaan_1', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('pertanyaan_1_jawaban_a', 'Jawaban', 'required');
		$this->form_validation->set_rules('pertanyaan_1_jawaban_b', 'Jawaban', 'required');
		$this->form_validation->set_rules('pertanyaan_1_jawaban_c', 'Jawaban', 'required');
		$this->form_validation->set_rules('pertanyaan_1_jawaban_d', 'Jawaban', 'required');
		$this->form_validation->set_rules('pertanyaan_1_jawaban_benar', 'Jawaban Benar', 'required_option');

		function required_option($option)
		{
			return $option == 'Jawaban benar' ? FALSE : TRUE;
		}

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Tambah Soal';
			$data['idkuis'] = $id_kuisioner;
			$this->load->view('template/header', $data);
			$this->load->view('pengajar/tambah_soal', $data);
			$this->load->view('template/footer');
		} else {
			$soal = [
				'id_kuisioner' => $id_kuisioner,
				'pertanyaan' => $this->input->post('pertanyaan_1'),
				'jawaban_a' => $this->input->post('pertanyaan_1_jawaban_a'),
				'jawaban_b' => $this->input->post('pertanyaan_1_jawaban_b'),
				'jawaban_c' => $this->input->post('pertanyaan_1_jawaban_c'),
				'jawaban_d' => $this->input->post('pertanyaan_1_jawaban_d'),
				'jawaban_benar' => $this->input->post('pertanyaan_1_jawaban_benar'),
			];

			// $i = 2;
			// $pertanyaan = $this->input->post('pertanyaan1');
			// while ($pertanyaan != null) {
			// 	array_push($data['kuis']['pertanyaan'], $pertanyaan);
			// 	$pertanyaan = $this->input->post('pertanyaan' . $i);
			// 	$i++;
			// }
			// var_dump($data);
			// die;

			$result = $this->kuis->insertSoal($soal);
			if ($result) {
				redirect(base_url('pengajar/daftar_soal/' . $id_kuisioner));
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="font-weight-bold">Gagal menambahkan soal baru.</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect(base_url('pengajar/tambah_soal/' . $id_kuisioner));
			};
		}
	}

	public function edit_soal($id_kuisioner, $id_soal)
	{
		$this->form_validation->set_rules('pertanyaan', 'Pertanyaan', 'required');
		$this->form_validation->set_rules('jawaban_a', 'Jawaban', 'required');
		$this->form_validation->set_rules('jawaban_b', 'Jawaban', 'required');
		$this->form_validation->set_rules('jawaban_c', 'Jawaban', 'required');
		$this->form_validation->set_rules('jawaban_d', 'Jawaban', 'required');

		if ($this->form_validation->run() == false) {
			$data['title'] = 'Edit Soal';
			$data['soal'] = $this->kuis->getSoalById($id_soal);
			$data['idkuis'] = $id_kuisioner;

			$this->load->view('template/header', $data);
			$this->load->view('pengajar/edit_soal', $data);
			$this->load->view('template/footer');
		} else {
			$soal = [
				'pertanyaan' => $this->input->post('pertanyaan'),
				'jawaban_a' => $this->input->post('jawaban_a'),
				'jawaban_b' => $this->input->post('jawaban_b'),
				'jawaban_c' => $this->input->post('jawaban_c'),
				'jawaban_d' => $this->input->post('jawaban_d'),
				'jawaban_benar' => $this->input->post('jawaban_benar'),
			];

			$result = $this->kuis->updateSoal($soal, $id_soal);
			if ($result) {
				redirect(base_url('pengajar/daftar_soal/' . $id_kuisioner));
			} else {
				$this->session->set_flashdata(
					'message',
					'<div class="alert alert-danger alert-dismissible fade show" role="alert">
						<span class="font-weight-bold">Gagal mengedit soal.</span>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>'
				);
				redirect(base_url('pengajar/edit_soal/' . $id_kuisioner . '/' . $id_soal));
			}
		}
	}

	public function hapus_soal($idkuis, $idsoal)
	{
		$result = $this->kuis->deleteSoal($idsoal);
		if ($result) {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-warning alert-dismissible fade show" role="alert">
					<span class="font-weight-bold">Soal berhasil dihapus.</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect(base_url('pengajar/daftar_soal/' . $idkuis));
		} else {
			$this->session->set_flashdata(
				'message',
				'<div class="alert alert-danger alert-dismissible fade show" role="alert">
					<span class="font-weight-bold">Gagal menghapus soal.</span>
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>'
			);
			redirect(base_url('pengajar/daftar_soal/' . $idkuis));
		}
	}

	public function required_option($option)
	{
		var_dump('get in');
		die;
		if ($option == '0') {
			return false;
			$this->form_validation->set_message('required_option', 'Pilih jawaban benar dari pertanyaan di atas.');
		} else {
			return true;
		}
	}
}
