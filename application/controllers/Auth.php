<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Pesanpakaian_model');
    }
    public function index()
    {
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $this->load->view('templates/headerfront');
        $this->load->view('pesanpakaian/index', $data);
        $this->load->view('templates/footerfront', $data);
    }

    public function masuk()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');
        if ($this->form_validation->run() == false) {
            $data['title'] = 'Login';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('templates/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $id = htmlspecialchars($this->input->post('id', true));
        $password = $this->input->post('password');

        $pegawai = $this->db->get_where('pegawai', ['IdPeg' => $id])->row_array();
        if ($pegawai) {
            if ($pegawai['Aktif'] == 'T') {
                $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                NIP has not been activated</div>');
                redirect('auth/masuk');
            } else {
                if (password_verify($password, $pegawai['Password'])) {
                    $data = [
                        'id' => $pegawai['IdPeg'],
                        'level' => $pegawai['Level']
                    ];
                    $this->session->set_userdata($data);
                    redirect('pegawai');
                } else {
                    $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
                    Wrong password!</div>');
                    redirect('auth/masuk');
                }
            }
        } else {
            $this->session->set_flashdata('message', '<div class=" alert alert-danger" role="alert">
            Can not found id, please check your id</div>');
            redirect('auth/masuk');
        }
    }

    public function daftar()
    {
        $this->form_validation->set_rules('id', 'Id', 'required|trim|min_length[6]|is_unique[pegawai.IdPeg]');
        $this->form_validation->set_rules('name', 'Name', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[pegawai.Email]');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim|is_unique[pegawai.NoTelp]');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[6]|matches[password2]', [
            'matches' => 'Password dont matces!',
            'min_length' => 'Password too short!'
        ]);

        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registration';
            $this->load->view('templates/auth_header', $data);
            $this->load->view('auth/daftar');
            $this->load->view('templates/auth_footer');
        } else {
            $data = [
                'IdPeg' => htmlspecialchars($this->input->post('id', true)),
                'Nama' => htmlspecialchars($this->input->post('name', true)),
                'Email' => htmlspecialchars($this->input->post('email', true)),
                'NoTelp' => htmlspecialchars($this->input->post('phone', true)),
                'Password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'WaktuDaftar' => time()
            ];

            $this->db->insert("pegawai", $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Congratulation!</strong> Your account has been registration.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('auth/masuk');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('id');
        $this->session->unset_userdata('level');
        $this->session->set_flashdata('message', '<div class="alert alert-success alert-dismissible fade show" role="alert">
            You have been logged out
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            </div>');
        redirect('auth/masuk');
    }
}
