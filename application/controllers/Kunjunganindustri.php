<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Kunjunganindustri extends BaseController
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
      $this->global['pageTitle'] = 'Mirota KSM | Kunjungan Industri';

      $this->loadPageViews("pages/kunjunganindustri", $this->global, NULL);
  }

  public function formulir(){
      $this->global['pageTitle'] = 'Mirota KSM | Pendaftaran Kunjungan Industri';

      $syarat = $this->crud_model->tampildata('tbl_syaratkunjungan');

      foreach ($syarat as $data) {
          $deskripsi = $data->deskripsi;
      }

      $data = array(
          'dataprov' => $this->crud_model->getdataprov(),
          'syarat' => $deskripsi,
      );
      
      $this->loadPageViews("pages/form_kunjungan", $this->global, $data, NULL);
  }

  public function getdatakabupaten(){
      $id_provinsi = $this->input->post('provinsi');
      $getdatakab = $this->crud_model->getdatakab($id_provinsi);

      // var_dump($getdatakab);

      echo json_encode($getdatakab);
  }

  public function datakunjungan(){
      $this->isLoggedIn();
      $this->global['pageTitle'] = 'Mirota KSM | Pendaftaran Kunjungan Industri';

      $data = array(
          'syarat'     => $this->crud_model->tampildata('tbl_syaratkunjungan'),
        //   'produk'     => $this->crud_model->tampildata('tbl_kunjungan_produk'),
          'list_data'  => $this->master_model->getdatakunjungan(),
          'dataprov' => $this->crud_model->getdataprov(),
        );

      $this->loadViews("adminpanel/kunjungan/data", $this->global, $data , NULL);
  }

  public function save(){
    $id = $this->uri->segment(3);
    $config['upload_path']          = './assets/dokumen_kunjungan';
    $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg|pdf';

    $this->load->library('upload', $config);

    if (!$this->upload->do_upload('userfile')) {

      $tgl_kunjungan = $this->input->post('tgl_kunjungan');
      $nama = $this->input->post('nama');
      $no_ktp = $this->input->post('no_ktp');
      $npwp = $this->input->post('npwp');
      $instansi = $this->input->post('instansi');
      $jurusan = $this->input->post('jurusan');
      $no_hp = $this->input->post('no_hp');
      $email = $this->input->post('email');
      $id_provinsi = $this->input->post('id_provinsi');
      $id_kabupaten = $this->input->post('id_kabupaten');
      $alamat = $this->input->post('alamat');
      $jml_pengunjung = $this->input->post('jml_pengunjung');
      $jml_pendamping = $this->input->post('jml_pendamping');
      $sumber_info = $this->input->post('sumber_info');

      $data = array(
        'tgl_kunjungan' => $tgl_kunjungan,
        'nama' => $nama,
        'no_ktp' => $no_ktp,
        'npwp' => $npwp,
        'instansi' => $instansi,
        'jurusan' => $jurusan,
        'no_hp' => $no_hp,
        'email' => $email,
        'id_prov' => $id_provinsi,
        'id_kab' => $id_kabupaten,
        'alamat' => $alamat,
        'jml_pengunjung' => $jml_pengunjung,
        'jml_pendamping' => $jml_pendamping,
        'sumber_info' => $sumber_info,
        'datecreated' => DATE('Y-m-d'),
      );
    } else {

      if($this->upload->do_upload('userfile')){
          $file1 = $this->upload->data();
          $file_kunjungan = $file1['file_name'];
      }
      
      if($this->upload->do_upload('file_ktp')){
          $file2 = $this->upload->data();
          $file_ktp = $file2['file_name'];
      }
      $tgl_kunjungan = $this->input->post('tgl_kunjungan');
      $nama = $this->input->post('nama');
      $no_ktp = $this->input->post('no_ktp');
      $npwp = $this->input->post('npwp');
      $instansi = $this->input->post('instansi');
      $jurusan = $this->input->post('jurusan');
      $no_hp = $this->input->post('no_hp');
      $email = $this->input->post('email');
      $id_provinsi = $this->input->post('id_provinsi');
      $id_kabupaten = $this->input->post('id_kabupaten');
      $alamat = $this->input->post('alamat');
      $jml_pengunjung = $this->input->post('jml_pengunjung');
      $jml_pendamping = $this->input->post('jml_pendamping');



      $data = array(
        'tgl_kunjungan' => $tgl_kunjungan,
        'nama' => $nama,
        'no_ktp' => $no_ktp,
        'npwp' => $npwp,
        'instansi' => $instansi,
        'jurusan' => $jurusan,
        'no_hp' => $no_hp,
        'email' => $email,
        'id_prov' => $id_provinsi,
        'id_kab' => $id_kabupaten,
        'alamat' => $alamat,
        'jml_pengunjung' => $jml_pengunjung,
        'jml_pendamping' => $jml_pendamping,
        'file' => $file_kunjungan,
        'foto_ktp' => $file_ktp,
      );
    }

    $this->crud_model->input($data, 'tbl_kunjungan_industri');
    if (is_null($id)){
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil!</strong> Tim Kami Akan Segera Menghubungi Instansi Anda<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>');
        redirect('formulir-kunjungan');
    }else{
    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>Data Berhasil Ditambah! Tim Kami Akan Segera Menghubungi Instansi Anda</div>');
    redirect('datakunjungan');
    }
  }

  public function updateStatus(){
    $id_kunjungan = $this->uri->segment(3);  
    $status = $this->uri->segment(4);

    $query = $this->crud_model->update(['id_kunjungan' => $id_kunjungan],['status' => $status],'tbl_kunjungan_industri');

    redirect('datakunjungan');
  }

  public function detailkunjungan($id) {
      $kunjunggan = $this->master_model->GetKunjunganById($id);
      echo json_encode($kunjunggan[0]);
  }

  public function syaratkunjungan(){
      $deskripsi = $this->input->post('deskripsi');
      $datecreated = date('Y-m-d H:i:s');

      $data = array(
          'deskripsi' => $deskripsi,
          'datecreated' => $datecreated,
      );

      $cekdata = $this->crud_model->tampildata('tbl_syaratkunjungan');

      foreach($cekdata as $cek){
          $id = $cek->id_syarat;
      }

      if(isset($id)){
          $where = array(
              'id_syarat' => $id
          );

          $this->crud_model->update($where, $data, 'tbl_syaratkunjungan');
      }else{
          $this->crud_model->input($data, 'tbl_syaratkunjungan');
      }

      redirect('datakunjungan');
  }

  public function kalender(){
      $this->global['pageTitle'] = 'Mirota KSM | Kalender';

      $this->load->view("adminpanel/kunjungan/kalender", $this->global, NULL);
  }

  public function getjadwal(){
      $list_data  = $this->master_model->getkunjungan();

      foreach ($list_data->result_array() as $row){

          $data[] = array(
              'id' => $row['id_kunjungan'],
              'title' => $row['instansi'].', '.$row['jml_pengunjung'].' Peserta, '.$row['jml_pendamping'].'  Pendamping',
              'start' => $row['tgl_kunjungan']
          );
      }
      
      echo json_encode($data);
  }

  public function cetaksertifikat(){
      $nama = $this->uri->segment(3);
      if (empty($nama)) {
          $gambar = "/sertifikat.jpg";
      }
        else {
        $gambar = base_url('assets/images/mirotaksm.jpg');
      }
      $image = imagecreatefromjpeg($gambar);
      $white = imageColorAllocate($image, 255, 255, 255);
      $black = imageColorAllocate($image, 0, 0, 0);
      $font = "./QuinchoScript_PersonalUse.ttf";
      $size = 42;
      //definisikan lebar gambar agar posisi teks selalu ditengah berapapun jumlah hurufnya
      $image_width = imagesx($image);  
      //membuat textbox agar text centered
      $text_box = imagettfbbox($size,0,$font,$nama);
      $text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
      $text_height = $text_box[3]-$text_box[1];
      $x = ($image_width/2) - ($text_width/2);
      //generate sertifikat beserta namanya
      imagettftext($image, $size, 0, $x, 400, $black, $font, $nama);
      //tampilkan di browser
      header("Content-type:  image/jpeg");
      imagejpeg($image);
      imagedestroy($image);
  }

  public function edittanggalkunjungan(){
    $id_kunjungan = $this->input->post('id_kunjungan');
    $tgl_kunjungan = $this->input->post('tgl_kunjungan');

    $where = array(
        'id_kunjungan' => $id_kunjungan
    );

    $data = array(
        'tgl_kunjungan' => $tgl_kunjungan
    );

    $sql = $this->crud_model->update($where,$data,'tbl_kunjungan_industri');
    if (empty($sql)){
      $this->set_notifikasi_swal('success','Berhasil','Data Berhasil Diupdate');
    }else{
      $this->set_notifikasi_swal('error','Gagal','Data Gagal Disimpan');
    }
    redirect('datakunjungan');
  }

//   public function detailprodukkunjungan($id) {
//       $produk = $this->master_model->GetProdukKunjunganById($id);
//       echo json_encode($produk[0]);
//   }

//   public function dataprodukkunjungan(){
//       $this->isLoggedIn();
//       $this->global['pageTitle'] = 'Mirota KSM | Data Produk';

//       $data = array(
//           'list_data'     => $this->crud_model->tampildata('tbl_kunjungan_produk'),
//         );

//       $this->loadViews("adminpanel/kunjungan/dataproduk", $this->global, $data , NULL);
//   }

//   public function simpanproduk(){
//       $nama_produk = $this->input->post('nama_produk');
//       $harga_produk = $this->input->post('harga_produk');

//       $data = array(
//           'nama_produk' => $nama_produk,
//           'harga_produk' => $harga_produk,
//       );

//       $this->crud_model->input($data, 'tbl_kunjungan_produk');
//       redirect('dataprodukkunjungan');
//   }

//   public function updateproduk(){
//       $id = $this->input->post('id_produk');

//       $nama_produk = $this->input->post('nama_produk');
//       $harga_produk = $this->input->post('harga_produk');

//       $data = array(
//           'nama_produk' => $nama_produk,
//           'harga_produk' => $harga_produk,
//       );

//       $where = array(
//           'id_produk_kunjungan' => $id
//       );

//       $this->crud_model->update($where, $data, 'tbl_kunjungan_produk');
//       redirect('dataprodukkunjungan');
//   }

//   public function hapusproduk(){
//       $id = $this->uri->segment(3);

//       $where = array(
//           'id_produk_kunjungan' => $id
//       );

//       $this->crud_model->delete($where, 'tbl_kunjungan_produk');
//       redirect('dataprodukkunjungan');
//   }

//   public function detailtransaksi(){
//       $this->isLoggedIn();
//       $this->global['pageTitle'] = 'Mirota KSM | Detail Transaksi';

//       $data = array(
//           'syarat'     => $this->crud_model->tampildata('tbl_syaratkunjungan'),
//           'list_data'  => $this->master_model->getdatakunjungan(),
//           'dataprov' => $this->crud_model->getdataprov(),
//         );

//       $this->loadViews("adminpanel/kunjungan/detailtransaksi", $this->global, $data , NULL);
//   }

//   public function tambahtransaksi(){
//       $this->isLoggedIn();
//       $this->global['pageTitle'] = 'Mirota KSM | Tambah Transaksi';
//       $idkunjungan = $this->uri->segment(3);

//       $data = array(
//           'idkunjungan'=> $idkunjungan,
//           'list_data'  => $this->master_model->getdatakunjunganbyId($idkunjungan),
//         );

//       $this->loadViews("adminpanel/kunjungan/tambahtransaksi", $this->global, $data , NULL);
//   }

  public function exportKunjungan(){
    $tgl_awal = $this->input->post('tgl_awal');
    $tgl_akhir = $this->input->post('tgl_akhir');

    $where = array(
      'DATE(tgl_kunjungan) >=' => $tgl_awal,
      'DATE(tgl_kunjungan) <=' => $tgl_akhir
    );

    $list_data = $this->master_model->getdatakunjunganWhere($where);

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $style_col = [
      'font' => ['bold' => true], // Set font nya jadi bold
      'alignment' => [
      'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
      'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ],
      'borders' => [
          'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
          'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
          'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
          'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
      ]
    ];

    $styleRight = [
      'font' => [
        'bold' => true,
      ],
      'alignment' => [
        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
      ],
      'borders' => [
        'top' => [
          'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
        ],
      ],
    ];
        

    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = [
      'alignment' => [
      'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ],
      'borders' => [
      'top' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border top dengan garis tipis
      'right' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],  // Set border right dengan garis tipis
      'bottom' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN], // Set border bottom dengan garis tipis
      'left' => ['borderStyle'  => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN] // Set border left dengan garis tipis
      ]
    ];

    $sheet->setCellValue('B2', 'Laporan Kunjungan PT. Mirota KSM'); // Set kolom A1 Sebagai Header
    // $sheet->mergeCells('B2:E2'); // Set Merge Cell pada kolom A1 sampai E1
    
    $sheet->setCellValue('B3', 'No');
    $sheet->setCellValue('C3', 'Tanggal');
    $sheet->setCellValue('D3', 'Institusi');
    $sheet->setCellValue('E3', 'Jurusan');
    $sheet->setCellValue('F3', 'kabupaten');
    $sheet->setCellValue('G3', 'provinsi');
    $sheet->setCellValue('H3', 'alamat');
    $sheet->setCellValue('I3', 'PIC');
    $sheet->setCellValue('J3', 'Kontak PIC');
    $sheet->setCellValue('K3', 'pengunjung');
    $sheet->setCellValue('L3', 'pendamping');


    $sheet->getStyle('B3')->applyFromArray($style_col);
    $sheet->getStyle('C3')->applyFromArray($style_col);
    $sheet->getStyle('D3')->applyFromArray($style_col);
    $sheet->getStyle('E3')->applyFromArray($style_col);
    $sheet->getStyle('F3')->applyFromArray($style_col);
    $sheet->getStyle('G3')->applyFromArray($style_col);
    $sheet->getStyle('H3')->applyFromArray($style_col);
    $sheet->getStyle('I3')->applyFromArray($style_col);
    $sheet->getStyle('J3')->applyFromArray($style_col);
    $sheet->getStyle('K3')->applyFromArray($style_col);
    $sheet->getStyle('L3')->applyFromArray($style_col);


    $no = 1;
    $numrow = 4;
    foreach ($list_data as $ld) {

      $sheet->setCellValue('B'.$numrow, $no);
      $sheet->setCellValue('C'.$numrow, $ld->date);
      $sheet->setCellValue('D'.$numrow, $ld->instansi);
      $sheet->setCellValue('E'.$numrow, $ld->jurusan);
      $sheet->setCellValue('F'.$numrow, $ld->city_name);
      $sheet->setCellValue('G'.$numrow, $ld->prov_name);
      $sheet->setCellValue('H'.$numrow, $ld->alamat);
      $sheet->setCellValue('I'.$numrow, $ld->nama);
      $sheet->setCellValue('J'.$numrow, $ld->no_hp);
      $sheet->setCellValue('K'.$numrow, $ld->jml_pengunjung);
      $sheet->setCellValue('L'.$numrow, $ld->jml_pendamping);

      $sheet->getColumnDimension('C')->setAutoSize(true);
      $sheet->getColumnDimension('D')->setAutoSize(true);
      $sheet->getColumnDimension('E')->setAutoSize(true);
      $sheet->getColumnDimension('F')->setAutoSize(true);
      $sheet->getColumnDimension('G')->setAutoSize(true);
      $sheet->getColumnDimension('H')->setAutoSize(true);
      $sheet->getColumnDimension('I')->setAutoSize(true);
      $sheet->getColumnDimension('J')->setAutoSize(true);
      $sheet->getColumnDimension('K')->setAutoSize(true);
      $sheet->getColumnDimension('L')->setAutoSize(true);
  
      $sheet->getStyle('B'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('C'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('D'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('E'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('F'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('G'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('H'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('I'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('J'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('K'.$numrow)->applyFromArray($style_row);
      $sheet->getStyle('L'.$numrow)->applyFromArray($style_row);

      $no++;
      $numrow++;
    }


    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.ms-excel');

    header('Content-Disposition: attactchment;filename= Laporan peserta kunjungan '.$tgl_awal.' - '.$tgl_akhir.'.xlsx');

    header('Cache-Control: max-age=0');
    $writer->save("php://output");
    exit();
  }

  public function infoKunjungan(){
    $this->global['pageTitle'] = 'Mirota KSM | Info Kunjungan Industri';

    $id = $this->uri->segment(2);

    $where = array(
      'id_info' => $id
    );

    $data = array(
      'info_gudang' => $this->crud_model->GetDataByWhere($where,'tbl_infoKunjungan'),
    );
    
    $this->loadPageViews("pages/infoKunjungan", $this->global,$data,NULL);
  }

  public function listInfo(){
    $this->isLoggedIn();   
    $this->global['pageTitle'] = 'Mirota KSM | Info Kunjungan Industri';

    $data = array(
      'list_data' => $this->crud_model->tampildata('tbl_infoKunjungan'),
    );
    
    $this->loadViews("adminpanel/kunjungan/dataInfoKunjungan", $this->global ,$data , NULL);
  }

  public function simpanInfo(){
    $this->isLoggedIn();

    $cekMaxId = $this->crud_model->cekMaxId('id_info', 'tbl_infoKunjungan');
    $id = $cekMaxId+1;

    $config['upload_path']          = FCPATH.'assets/video_kunjungan';
    $config['allowed_types']        = 'wmv|mp4|avi|mov|webm';

    $this->load->library('upload', $config);

    if ($this->upload->do_upload('file_video'))
    {    
    $file = $this->upload->data();
    $video = $file['file_name'];

    $judul_info = $this->input->post('judul_info');
    $deskripsi = $this->input->post('deskripsi');
    $barcode = $this->generateBarcode('info_kunjungan',str_replace(" ","-",$judul_info),$id);

    $data = array(
    'judul_info' => $judul_info,
    'deskripsi' => $deskripsi,
    'video_info' => $video,
    'barcode' => $barcode
    );

    $this->crud_model->input($data, 'tbl_infoKunjungan');
    $this->set_notifikasi_swal('success','BERHASIL !!','Data Berhasil Disimpan');
    redirect('list-kunjungan');
    }
  }

  public function showInfo($id){

    $where = array(
      'id_info' => $id
    );

    $info = $this->crud_model->GetRowById($where,'tbl_infoKunjungan');
    echo json_encode($info);
  }
}