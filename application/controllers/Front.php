<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Front extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Front_model');
        $this->load->model('Pesanpakaian_model');
    }

    public function index()
    {
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $data['title'] = "Detail Pesanan";

        $this->load->view('templates/headerfront', $data);
        $this->load->view('pesanpakaian/index', $data);
        $this->load->view('templates/footerfront', $data);

        // $this->load->view('Front/templates/headerdepan', $data);
        // $this->load->view('Front/index', $data);
        // $this->load->view('Front/templates/footer');
    }


    public function daftar()
    {
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['get_allpesanan'] = $this->Front_model->get_allpesanan();
        $data['title'] = 'daftar pesanan';

        $this->load->view('Front/templates/header', $data);
        $this->load->view('Front/daftarpesanan', $data);
        $this->load->view('Front/templates/footer');   
    }

    public function detail($id)
    {
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['get_pesananby_id'] = $this->Front_model->get_pesananby_id($id);
        $data['get_all'] = $this->Front_model->get_all($id);
        $data['idd'] = $id;
        $data['title'] = 'Detail Pesanan';

        if ($data['get_pesananby_id']) {
            $this->load->view('Front/templates/header', $data);
            $this->load->view('Front/detail', $data);
            $this->load->view('Front/templates/footer');   
        }else{

        }
    }

    public function panduan()
    {
        $data['title'] = 'Panduan';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $this->load->view('Front/panduan', $data);
        $this->load->view('Front/templates/footer');
    }

    public function kontak()
    {
        $data['title'] = 'Kontak';
        $data['pegawai'] = $this->db->get_where('pegawai', ['IdPeg' => $this->session->userdata('id')])->row_array();
        $data['jnspkian'] = $this->Pesanpakaian_model->getAllJenisPakaian();
        $this->load->view('Front/templates/header', $data);
        $this->load->view('Front/kontak');
        $this->load->view('Front/templates/footer');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "pesanan.xls";
        $judul = "pesanan";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
        xlsWriteLabel($tablehead, $kolomhead++, "ID Detail Pesanan");
        xlsWriteLabel($tablehead, $kolomhead++, "Jumlah Pesanan");    
        xlsWriteLabel($tablehead, $kolomhead++, "Sub Total");    
        xlsWriteLabel($tablehead, $kolomhead++, "Nama Barang");  
        xlsWriteLabel($tablehead, $kolomhead++, "Ukuran");  
        xlsWriteLabel($tablehead, $kolomhead++, "Harga");  
    xlsWriteLabel($tablehead, $kolomhead++, "ID Pesanan");    
    xlsWriteLabel($tablehead, $kolomhead++, "IdPemesan");
    xlsWriteLabel($tablehead, $kolomhead++, "Nama");
    xlsWriteLabel($tablehead, $kolomhead++, "TglPesan");
    xlsWriteLabel($tablehead, $kolomhead++, "TotalHarga");
    
    

    foreach ($this->Front_model->get_report() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
            xlsWriteLabel($tablebody, $kolombody++, $data->IdDPesanan);
            xlsWriteLabel($tablebody, $kolombody++, $data->Jumlah);
            xlsWriteLabel($tablebody, $kolombody++, $data->SubTotal);
            xlsWriteLabel($tablebody, $kolombody++, $data->NamaBrg);
            xlsWriteLabel($tablebody, $kolombody++, $data->Ukuran);
            xlsWriteLabel($tablebody, $kolombody++, $data->Harga);

        xlsWriteLabel($tablebody, $kolombody++, $data->IdPesanan);
        xlsWriteLabel($tablebody, $kolombody++, $data->IdPemesan);
        xlsWriteLabel($tablebody, $kolombody++, $data->Nama);
        xlsWriteLabel($tablebody, $kolombody++, $data->TglPesan);
        xlsWriteNumber($tablebody, $kolombody++, $data->TotalHarga);
        
        

        $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function _rules() 
    {
        $this->form_validation->set_rules('Nama', 'Nama', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
        $this->form_validation->set_rules('Alamat', 'Alamat', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
        $this->form_validation->set_rules('Desa', 'Desa', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
        $this->form_validation->set_rules('Kecamatan', 'Kecamatan', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
        $this->form_validation->set_rules('KabOrKota', 'KabOrKota', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
        $this->form_validation->set_rules('NoTelp', 'NoTelp', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
        $this->form_validation->set_rules('Email', 'Email', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );

        $this->form_validation->set_rules('Deskripsi', 'Deskripsi', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );
        $this->form_validation->set_rules('total', 'total', 'trim|required', ['required' => '*Field Tidak Boleh Kosong'] );

        $this->form_validation->set_error_delimiters('<small class="text-danger">', '</small>');
    }
}

// public function pola($JenisPakaian)
//     {
//         $data['judul'] = 'Pilih Pola';
//         $data['pola'] = $this->Pesanpakaian_model->getAllPola($JenisPakaian);
//         $this->load->view('templates/headerfront', $data);
//         $this->load->view('pesanpakaian/pola', $data);
//         $this->load->view('templates/footerfront');
//     }

//     public function single($id)
//     {
//         $data['desain'] = $this->Front_model->get_desain_by_kdpola($id);
//         // $data['idpola'] = $id;

//         $this->load->view('Front/templates/header');
//         $this->load->view('Front/single', $data);
//         $this->load->view('Front/templates/footer');
//     }

//     public function pesan($id)
//     {
//         $data['getall'] = $this->Front_model->get_barang_by_kddesain($id);
//         $data['title'] = 'pesan';
//         $rowdesain = $this->Front_model->get_design($id);
//         $rowjenis = $this->Front_model->get_jenis_by_kddesain($id);

//         $data['GbrDesain'] = $rowdesain->GbrDesain;
//         $data['Jenis'] = $rowjenis->NamaJenis;
//         $data['idd'] = $id;
        
//         $this->_rules();
//         if ($this->form_validation->run() == false) {
//             $this->load->view('Front/templates/header');
//             $this->load->view('Front/pesan', $data);
//             $this->load->view('Front/templates/footer');    
//         }else{

//             $IdPesanan = $this->Front_model->get_kodepesan();
//             $IdPemesan = $this->Front_model->get_kodepemesan();
//             $Iddetail = $this->Front_model->get_kodedetail();
            
            
//             $datapesan = [
//                 'IdPesanan' => $IdPesanan,
//                 'TglPesan' => date("y-m-d"),
//                 'Deskripsi' => $this->input->post('Deskripsi',TRUE),
//                 'TotalHarga' => $this->input->post('total',TRUE),
//                 'StatusPesanan' => 'T',
//                 'StatusPembayaran' => 'T',
//                 'IdPemesan' => $IdPemesan
//             ];

//             $datapemesan = [
//                  'IdPemesan' => $IdPemesan,
//                  'Nama' => $this->input->post('Nama',TRUE),
//                  'Alamat' => $this->input->post('Alamat',TRUE),
//                  'Desa' => $this->input->post('Desa',TRUE),
//                  'Kecamatan' => $this->input->post('Kecamatan',TRUE),
//                  'KabOrKota' => $this->input->post('KabOrKota',TRUE),
//                  'NoTelp' => $this->input->post('NoTelp',TRUE),
//                  'Email' => $this->input->post('Email',TRUE)
//             ];

//             if (
//                     $this->input->post('barangS') and
//                     !$this->input->post('barangM') and
//                     !$this->input->post('barangL') and
//                     !$this->input->post('barangXL') and
//                     !$this->input->post('barangXXL')
//                 ) {
//                 $datadetail = array(
//                     'Jumlah' => $this->input->post('jmlhS',TRUE),
//                     'SubTotal' => $this->input->post('subS',TRUE),
//                     'IdPesanan' => $IdPemesan,
//                     'KdBarang' => $this->input->post('barangS',TRUE),
//                 );
//             }elseif (
//                     $this->input->post('barangS') and
//                     $this->input->post('barangM') and
//                     !$this->input->post('barangL') and
//                     !$this->input->post('barangXL') and
//                     !$this->input->post('barangXXL')
//                 ) {
//                 $datadetail = array(
//                     array(
//                         'Jumlah' => $this->input->post('jmlhS',TRUE),
//                         'SubTotal' => $this->input->post('subS',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangS',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhM',TRUE),
//                         'SubTotal' => $this->input->post('subM',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangM',TRUE),    
//                     ),
//                 );
//             }elseif (
//                         $this->input->post('barangS') and
//                         $this->input->post('barangM') and
//                         $this->input->post('barangL') and
//                         !$this->input->post('barangXL') and
//                         !$this->input->post('barangXXL')
//                     ) {
//                 $datadetail = array(
//                     array(
//                         'Jumlah' => $this->input->post('jmlhS',TRUE),
//                         'SubTotal' => $this->input->post('subS',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangS',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhM',TRUE),
//                         'SubTotal' => $this->input->post('subM',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangM',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhL',TRUE),
//                         'SubTotal' => $this->input->post('subL',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangL',TRUE),    
//                     ),
//                 );
//             }elseif (
//                     $this->input->post('barangS') and
//                     $this->input->post('barangM') and
//                     $this->input->post('barangL') and
//                     $this->input->post('barangXL') and
//                     !$this->input->post('barangXXL')
//                 ) {
//                 $datadetail = array(
//                     array(
//                         'Jumlah' => $this->input->post('jmlhS',TRUE),
//                         'SubTotal' => $this->input->post('subS',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangS',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhM',TRUE),
//                         'SubTotal' => $this->input->post('subM',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangM',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhL',TRUE),
//                         'SubTotal' => $this->input->post('subL',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangL',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhXL',TRUE),
//                         'SubTotal' => $this->input->post('subXL',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangXL',TRUE),    
//                     ),
//                 );
//             }elseif ($this->input->post('barangS') and
//                     $this->input->post('barangM') and
//                     $this->input->post('barangL') and
//                     $this->input->post('barangXL') and
//                     $this->input->post('barangXXL')
//                 ) {
//                 $datadetail = array(
//                     array(
//                         'Jumlah' => $this->input->post('jmlhS',TRUE),
//                         'SubTotal' => $this->input->post('subS',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangS',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhM',TRUE),
//                         'SubTotal' => $this->input->post('subM',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangM',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhL',TRUE),
//                         'SubTotal' => $this->input->post('subL',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangL',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhXL',TRUE),
//                         'SubTotal' => $this->input->post('subXL',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangXL',TRUE),    
//                     ),
//                     array(
//                         'Jumlah' => $this->input->post('jmlhXXL',TRUE),
//                         'SubTotal' => $this->input->post('subXXL',TRUE),
//                         'IdPesanan' => $IdPemesan,
//                         'KdBarang' => $this->input->post('barangXXL',TRUE),    
//                     ),
//                 );   
//             }

//             // var_dump($datadetail);
//             $this->Front_model->insertdatapesan($datapesan);
//             $this->Front_model->insertdatapemesan($datapemesan);
//             $this->Front_model->insertdetailpesanan($datadetail);
//             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Bahan Baku Berhasil Ditambah!</div>');
//             redirect('Front');
//         }
        
//     }