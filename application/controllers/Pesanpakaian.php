<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanpakaian extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pesanpakaian_model');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$data['judul'] = 'Pilih Pola';
		$this->load->view('pesanpakaian/index', $data);
		
	}

	public function pola($JenisPakaian)
	{
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['judul'] = 'Pilih Pola';
		$data['pola'] = $this->Pesanpakaian_model->getAllPola($JenisPakaian);
		$this->load->view('templates/headerfront', $data);
		$this->load->view('pesanpakaian/pola', $data);
		$this->load->view('templates/footerfront');
	}

	public function desain($JenisPakaian, $Pola)
	{
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['title'] = 'Pilih Desain';
		$data['KodeJenis'] = $JenisPakaian;
		$data['desain'] = $this->Pesanpakaian_model->getAllDesain($Pola);
		
		$this->load->view('Front/templates/header', $data);
		$this->load->view('pesanpakaian/desain', $data);
		$this->load->view('Front/templates/footer');
	}

	public function detailbarang($JenisPakaian, $Pola, $Desain)
	{
		$data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
		$data['JenisPakaian'] = $this->Pesanpakaian_model->getNamaJenispakaian($JenisPakaian);
		$data['title'] = 'pesan';
		$data['gambar'] = $this->Pesanpakaian_model->getGambar($JenisPakaian, $Pola, $Desain);
		$data['barang'] = $this->Pesanpakaian_model->getBarang($JenisPakaian, $Pola, $Desain);

		$this->load->view('Front/templates/header', $data);
		$this->load->view('pesanpakaian/detailbarang', $data);
		$this->load->view('Front/templates/footer', $data);
	}

	public function hitungharga($JenisPakaian, $Pola, $Desain)
	{
		// $data['JenisPakaian'] = $this->Pesanpakaian_model->getNamaJenispakaian($JenisPakaian);
		$data['KdPola'] = $Pola;
		$data['judul'] = 'Total Harga';
		// $data['gambar'] = $this->Pesanpakaian_model->getGambar($JenisPakaian, $Pola, $Desain);
		// $data['harga'] = $this->Pesanpakaian_model->getHarga($Desain);
		$data['jumlah'] = $_POST;

		// $this->load->view('template/Header', $data);
		$this->load->view('pesanpakaian/detailbarang', $data);
		$this->load->view('pesanpakaian/detailbarang2', $data);
		// $this->load->view('template/Footer');
	}

	public function inputPesananbaru($JenisPakaian, $Pola, $Desain)
	{
		$IdBaru = "concat_ws('-',right('" . $_POST['notelp'] . "',4),'ORDER',Date_Format(Now(), '%d%c%Y-%k%i'))";
		$IdBaruDPS = "concat_ws('-',right('" . $_POST['notelp'] . "',4),'S-ORDER',Date_Format(Now(), '%d%c%Y-%k%i'))";
		$IdBaruDPM = "concat_ws('-',right('" . $_POST['notelp'] . "',4),'M-ORDER',Date_Format(Now(), '%d%c%Y-%k%i'))";
		$IdBaruDPL = "concat_ws('-',right('" . $_POST['notelp'] . "',4),'L-ORDER',Date_Format(Now(), '%d%c%Y-%k%i'))";
		$IdBaruDPXL = "concat_ws('-',right('" . $_POST['notelp'] . "',4),'XL-ORDER',Date_Format(Now(), '%d%c%Y-%k%i'))";
		$IdBaruDPXXL = "concat_ws('-',right('" . $_POST['notelp'] . "',4),'XXL-ORDER',Date_Format(Now(), '%d%c%Y-%k%i'))";
		$IdPemesan = "ucase(concat(right('" . $_POST['Nama'] . "',4),right('" . $_POST['Alamat'] . "',4),right('" . $_POST['notelp'] . "',4),Date_Format(Now(), '%d%c%Y%k%i')))";

		$this->form_validation->set_rules('Nama', 'Nama', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('Alamat', 'Alamat', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('Desa', 'Desa', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('Kecamatan', 'Kecamatan', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('KabOrKota', 'KabOrKota', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('notelp', 'notelp', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('Email', 'Email', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('total', 'total', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'required|trim', ['required' => '*Field Tidak Boleh Kosong'] );
		$this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');

		if ($this->form_validation->run() == false) {
			if ($this->input->post('total') < 1 or $this->input->post('total') == 0) {
				$this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                Jumlah barang harus diisi</div>');
			}
			$this->detailbarang($JenisPakaian, $Pola, $Desain);
		} else {
			$this->Pesanpakaian_model->inputPesananBaruDB($_POST, $IdBaru, $IdBaruDPS, $IdBaruDPM, $IdBaruDPL, $IdBaruDPXL, $IdBaruDPXXL, $IdPemesan);
			$this->session->set_flashdata('message', 'Pesanan anda sedang dalam proses admin');
			redirect('Front');
		}
	}
}
