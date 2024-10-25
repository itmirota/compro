<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * @author : Tri Cahya Wibawa
 * @version : 1.1
 * @since : 23 Maret 2023
 */
class Artikel extends BaseController
{

  public function __construct()
  {
      parent::__construct();
      $this->load->model('login_model');
      $this->load->model('crud_model');
      $this->load->model('master_model');

      $config['upload_path']          = FCPATH.'assets/images/artikel';
      $config['allowed_types']        = 'gif|jpg|png|webp';
      // $config['max_size']             = 100;
      // $config['max_width']            = 1024;
      // $config['max_height']           = 768;
  
      $this->load->library('upload', $config);  
  }

  public function index(){
    $this->global['pageTitle'] = 'Mirota KSM | Artikel';

    $this->loadPageViews("pages/artikel", $this->global, NULL);
  }

  public function listArtikel(){
    $this->isLoggedIn();
    $this->global['pageTitle'] = 'Mirota KSM | List Artikel';

    $data['list_data'] = $this->master_model->GetDataArtikel();
    $data['list_kategori'] = $this->crud_model->tampildata('tbl_kategori_artikel');

    $this->loadViews("adminpanel/artikel/data", $this->global, $data, NULL);
  }

  public function saveArtikel(){
    $this->isLoggedIn();

    $judul_artikel  = $this->input->post('judul_artikel');
    $kategori_id    = $this->input->post('kategori');
    $artikel        = $this->input->post('artikel');
    $penulis        = $this->input->post('penulis');
    $slug        = $this->input->post('slug');
    $credit_image        = $this->input->post('credit_image');
    $createdBy      = $this->session->userdata ( 'userId' );
    $datecreated    = DATE('Y-m-d');

    if ($this->upload->do_upload('gambar_artikel'))
    {
      $file = $this->upload->data();
      $gambar_artikel = $file['file_name'];
      $data = array (
        'judul_artikel'   => $judul_artikel,
        'kategori_id'     => $kategori_id,
        'artikel'         => $artikel,
        'penulis'         => $penulis,
        'slug'            => $slug,
        'credit_image'    => $credit_image,
        'createdBy'       => $createdBy,
        'datecreated'     => $datecreated,
        'gambar_artikel'  => $gambar_artikel,
      );
    }else{
      $data = array (
        'judul_artikel'   => $judul_artikel,
        'kategori_id'     => $kategori_id,
        'artikel'         => $artikel,
        'penulis'         => $penulis,
        'slug'            => $slug,
        'credit_image'    => $credit_image,
        'createdBy'       => $createdBy,
        'datecreated'     => $datecreated,
        'gambar_artikel'  => $gambar_artikel,
      );
    }

    $this->crud_model->input($data, 'tbl_artikel');
    $this->session->set_flashdata('msg_berhasil','Data Berhasil Ditambah');

    redirect('dataartikel');
  }

  public function saveKategori(){
    $this->isLoggedIn();
    $nama_kategori  = $this->input->post('nama_kategori');

    $data = array(
      'nama_kategori' => $nama_kategori
    );

    $this->crud_model->input($data, 'tbl_kategori_artikel');
    $this->session->set_flashdata('msg_berhasil','Kategori Berhasil Ditambah');
    redirect('dataartikel');
  }

  public function detail($id){
    $this->isLoggedIn();

    $data['detail'] = $this->master_model->GetArtikelById($id);
    $data['list_kategori'] = $this->crud_model->tampildata('tbl_kategori_artikel');

    $this->loadViews("adminpanel/artikel/edit", $this->global, $data, NULL);
  }

  public function update(){
    $this->isLoggedIn();

    $judul_artikel  = $this->input->post('judul_artikel');
    $kategori_id    = $this->input->post('kategori');
    $artikel        = $this->input->post('artikel');
    $penulis        = $this->input->post('penulis');
    $slug        = $this->input->post('slug');
    $credit_image        = $this->input->post('credit_image');
    $createdBy      = $this->session->userdata ( 'userId' );
    $id_artikel = $this->uri->segment(3);

    if ($this->upload->do_upload('gambar_artikel'))
    {
      $file = $this->upload->data();
      $gambar_artikel = $file['file_name'];
      $data = array (
        'judul_artikel'   => $judul_artikel,
        'kategori_id'     => $kategori_id,
        'artikel'         => $artikel,
        'penulis'         => $penulis,
        'slug'            => $slug,
        'credit_image'    => $credit_image,
        'createdBy'       => $createdBy,
        'gambar_artikel'  => $gambar_artikel,
      );
    }else{
      $data = array (
        'judul_artikel'   => $judul_artikel,
        'kategori_id'     => $kategori_id,
        'artikel'         => $artikel,
        'penulis'         => $penulis,
        'slug'            => $slug,
        'credit_image'    => $credit_image,
        'createdBy'       => $createdBy,
      );
    }

    $where = array(
      'id_artikel' => $id_artikel
    );

    $this->crud_model->update($where, $data, 'tbl_artikel');
    $this->session->set_flashdata('msg_berhasil','DataBerhasil Diupdate');

    redirect('dataartikel');
  }

  public function delete(){
    $id_artikel = $this->uri->segment(3);

    var_dump($id_artikel);

    $where = array(
      'id_artikel' => $id_artikel
    );

    $this->crud_model->delete($where, 'tbl_artikel');
    $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="allert">Data Berhasil Ditambah!</div>');

    redirect('dataartikel');
  }
}