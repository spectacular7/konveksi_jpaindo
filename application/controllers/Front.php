<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Front_model');
    }

    public function index()
    {
        $data['jenis'] = $this->Front_model->get_limit_jenis();
        $data['jenislimit1'] = $this->Front_model->get_limit1_jenis();
        $data['jenislimit2'] = $this->Front_model->get_limit2_jenis();

        $this->load->view('Front/templates/headerdepan', $data);
        $this->load->view('Front/index', $data);
        $this->load->view('Front/templates/footer');
    }

    public function panduan()
    {
        $this->load->view('Front/panduan');
        $this->load->view('Front/templates/footer');
    }

    public function kontak()
    {
        $this->load->view('Front/templates/header');
        $this->load->view('Front/kontak');
        $this->load->view('Front/templates/footer');
    }
}