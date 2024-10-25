<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

class Kuisioner extends BaseController
{
  public function __construct(){
      parent::__construct();
      $this->load->model('crud_model');
      $this->load->model('master_model');
  }

  /**
   * Index Page for this controller.
   */
  public function index(){
    $this->isLoggedIn();
    $this->global['pageTitle'] = 'Mirota KSM | Kuisioner Kunjungan';
    $datenow = DATE('Y-m-d');

    // $instansi = $this->crud_model->tampildata('tbl_kunjungan_kategoriKuisioner')

    $data = array(
      'kategori' => $this->crud_model->tampildata('tbl_kunjungan_kategoriKuisioner'),
      'dataKunjungan' => $this->crud_model-> GetDataByDate('tgl_kunjungan', $datenow, 'tbl_kunjungan_industri')
    );

    $this->loadViews("kuisioner/kategori", $this->global, $data, NULL);
  }

  public function saveKategori(){
    $this->isLoggedIn();

    $cekMaxId = $this->crud_model->cekMaxId('id_kategori', 'tbl_kunjungan_kategoriKuisioner');
    $id = $cekMaxId+1;

    $kategori = $this->input->post('kategori');

    $slug = str_replace(" ","-",$kategori);
    $barcode = $this->generateBarcode('kategori_kuisioner',$slug,$slug);


    $data = array(
      'nama_kategori' => $kategori,
      'createdBy' => $this->vendorId,
      'barcode' => $barcode
    );

    $this->crud_model->input($data, 'tbl_kunjungan_kategoriKuisioner');
    $this->set_notifikasi_swal('success','BERHASIL !!','Data Berhasil Disimpan');
    redirect('list-kuisioner');
  }



  public function kuisionerKunjungan(){
    $this->global['pageTitle'] = 'Mirota KSM | Kuisioner Kunjungan';

    $this->loadPageViews("kuisioner/kunjunganindustri", $this->global, NULL);
  }

  public function LaporanKuisionerKunjungan(){
    $this->isLoggedIn();
    $this->global['pageTitle'] = 'Mirota KSM | Kuisioner Kunjungan';

    $data = array(
      'list_data' => $this->crud_model->tampildata('tbl_kunjungan_hasilKuisioner')
    );

    $this->loadViews("kuisioner/hasilKuisionerKunjungan", $this->global, $data, NULL);
  }

  public function saveKuisionerKunjungan(){
    $instansi = $this->input->post('instansi');
    $nama = $this->input->post('nama');
    $no_hp = $this->input->post('no_hp');
    $kesan = $this->input->post('kesan');
    $poin_menarik = $this->input->post('poin_menarik');
    $interaksi_tim = $this->input->post('interaksi_tim');
    $kesesuaian_materi = $this->input->post('kesesuaian_materi');
    $pengetahuan_mirota = $this->input->post('pengetahuan_mirota');
    $pengetahuan_produk = $this->input->post('pengetahuan_produk');
    $konsumsi_produk = $this->input->post('konsumsi_produk');
    $kegiatan_aula = $this->input->post('kegiatan_aula');
    $kegiatan_pabrik = $this->input->post('kegiatan_pabrik');
    $freedrink = $this->input->post('freedrink');
    $saran = $this->input->post('saran');

    $data = array(
      'instansi' => $instansi,
      'nama' => $nama,
      'no_hp' => $no_hp,
      'jawaban' => $kesan.'|'.$poin_menarik.'|'.$interaksi_tim.'|'.$kesesuaian_materi.'|'.$pengetahuan_mirota.'|'.$pengetahuan_produk.'|'.$konsumsi_produk.'|'.$kegiatan_aula.'|'.$kegiatan_pabrik.'|'.$freedrink.'|'.$saran
    );

    $this->crud_model->input($data, 'tbl_kunjungan_hasilKuisioner');
    $this->set_notifikasi_swal('success','BERHASIL !!','Data Berhasil Disimpan');
    redirect('kuisioner-kunjungan');
  }
}