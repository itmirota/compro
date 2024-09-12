<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * @author : Tri Cahya Wibawa
 * @version : 1.1
 * @since : 23 Maret 2023
 */
class Produk extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('crud_model');
        $this->load->model('master_model');
  
        $config['upload_path']          = FCPATH.'assets/landingpage/images/produk';
        $config['allowed_types']        = 'gif|jpg|png|webp';
        // $config['max_size']             = 100;
        // $config['max_width']            = 1024;
        // $config['max_height']           = 768;
    
        $this->load->library('upload', $config);  
    }

    /**
     * Index Page for this controller.
     */
    public function index(){
        $this->global['pageTitle'] = 'Mirota KSM | Produk Kami';

        $data['list_data'] = $this->crud_model->tampildata('tbl_produk');
        
        $this->loadPageViews("pages/produk", $this->global, $data, NULL);
    }

    public function listProduk(){
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Mirota KSM | List Artikel';

        $data['list_data'] = $this->crud_model->tampildata('tbl_produk');

        $this->loadViews("adminpanel/produk/data", $this->global, $data, NULL);
    }

    public function saveProduk(){
        $this->isLoggedIn();
        $nama_produk  = $this->input->post('nama_produk');
        $keterangan_produk  = $this->input->post('keterangan_produk');
        $deskripsi_produk  = $this->input->post('deskripsi_produk');
        $gambar_produk  = $this->input->post('gambar_produk');
    
        $data = array(
          'nama_produk' => $nama_produk,
          'keterangan_produk' => $keterangan_produk,
          'gambar_produk' => $gambar_produk,
          'deskripsi_produk' => $deskripsi_produk
        );
    
        $this->crud_model->input($data, 'tbl_produk');
        $this->session->set_flashdata('msg_berhasil','Kategori Berhasil Ditambah');
        redirect('dataproduk');
      }

}