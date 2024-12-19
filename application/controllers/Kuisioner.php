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
}