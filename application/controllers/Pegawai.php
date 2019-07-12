<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{

    public function index()
    {
        $data['title'] = 'Profile';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/index', $data);
        $this->load->view('templates/footer', $data);
    }

    public function dasboard()
    {
        $data['title'] = 'Dahsboard';

        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['peg'] = $this->db->get('pegawai')->num_rows();
        $data['pesanan'] = $this->db->get('pesanan')->num_rows();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('dasboard/index', $data);
        $this->load->view('templates/auth_footer');
    }

    public function listpegawai()
    {
        $data['title'] = 'Pegawai';

        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $this->db->where('level',0);
        $data['peg'] = $this->db->get('pegawai')->result_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pegawai/listpegawai', $data);
        $this->load->view('templates/footer');
    }

    public function getdata()
    {
        echo json_encode($this->db->get_where('pegawai', ['IdPeg' => $_POST['id']])->row_array());
    }

    public function delete()
    {
        $idpeg = $_POST['id'];
        $this->db->where('IdPeg', $idpeg);
        $this->db->delete('pegawai');
        $data['redirect'] = '';
        echo json_encode($data);
    }

    public function aktifkan($id){
        $this->db->set('Aktif','Y');
        $this->db->where('IdPeg',$id);
        $this->db->update('pegawai');
        redirect('pegawai/listpegawai');
    }

    public function naktifkan($id){
        $this->db->set('Aktif','T');
        $this->db->where('IdPeg',$id);
        $this->db->update('pegawai');
        redirect('pegawai/listpegawai');
    }
}
