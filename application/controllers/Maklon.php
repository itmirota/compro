<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * @author : Tri Cahya Wibawa
 * @version : 1.1
 * @since : 23 Maret 2023
 */
class Maklon extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->model('master_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Mirota KSM | Maklon';
        
        $this->loadPageViews("pages/maklon", $this->global , NULL);
    }

    public function kategori_produk(){
        $this->isLoggedIn();

        $this->global['pageTitle'] = 'Mirota KSM | Kategori Produk Maklon';

        $data = array (
            'list_data' => $this->crud_model->tampildata('tbl_maklon_kategoriproduk')
        );
        
        $this->loadViews("adminpanel/maklon/kategori_produk", $this->global, $data, NULL);
    }

    public function detailKategoriproduk(){
        $id = $this->input->post('id');
        $getdata = $this->crud_model->GetDataByWhere(['id_maklon_kategoriproduk' => $id],'tbl_maklon_kategoriproduk');
    
        echo json_encode($getdata[0]);
    }

    public function saveKategoriMaklon(){
        $nama_kategoriproduk = $this->input->post('nama_kategoriproduk');

        $data = array(
            'nama_kategoriproduk' => $nama_kategoriproduk,
        );

        $this->crud_model->input($data, 'tbl_maklon_kategoriproduk');
        $this->set_notifikasi_swal('success','Berhasil','Data Berhasil Disimpan');

        redirect('maklon/kategori_produk');
    }

    public function updateKategoriMaklon(){
        $id_kategoriproduk = $this->input->post('id_kategoriproduk');
        $nama_kategoriproduk = $this->input->post('nama_kategoriproduk');

        $data = array(
            'nama_kategoriproduk' => $nama_kategoriproduk,
        );

        $this->crud_model->update(['id_maklon_kategoriproduk' => $id_kategoriproduk], $data, 'tbl_maklon_kategoriproduk');
        $this->set_notifikasi_swal('success','Berhasil','Data Berhasil Disimpan');

        redirect('maklon/kategori_produk');
    }

    public function hapusKategoriMaklon($id){

        $this->crud_model->delete(['id_maklon_kategoriproduk' => $id], 'tbl_maklon_kategoriproduk');
        $this->set_notifikasi_swal('success','Berhasil','Data Berhasil Dihapus');

        redirect('maklon/kategori_produk');
    }

    // DATA MAKLON 
    public function formulir()
    {
        $this->global['pageTitle'] = 'Mirota KSM | Formulir Pendaftaran Maklon';

        $data = array(
          'dataprov' => $this->crud_model->getdataprov(),
          'kategori' => $this->crud_model->tampildata('tbl_maklon_kategoriproduk')
        );

        
        $this->loadPageViews("pages/form_maklon", $this->global,$data, NULL);
    }

    public function datamaklon()
    {
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Mirota KSM | Data maklon Kerja';

        $data = array(
        'list_data'       => $this->master_model->getMaklon(NULL),
        );

        $this->loadViews("adminpanel/maklon/data", $this->global, $data , NULL);

    }

    public function saveMaklon(){
        $nama_perusahaan = $this->input->post('nama_perusahaan');
        $kecamatan = $this->input->post('id_kecamatan');
        $kabupaten = $this->input->post('id_kabupaten');
        $provinsi = $this->input->post('id_provinsi');
        $alamat = $this->input->post('alamat');
        $nama_pic = $this->input->post('nama_pic');
        $no_telpon = $this->input->post('no_telpon');
        $email = $this->input->post('email');
        $jabatan = $this->input->post('jabatan');
        $sumber_info = $this->input->post('sumber_info');
        $sumber_person = $this->input->post('sumber_person');
        $kategori_produk_maklon = $this->input->post('kategori_produk_maklon');
        $produk_exist = $this->input->post('produk_exist');
        $ijin_halal = $this->input->post('ijin_halal');
        $ijin_bpom = $this->input->post('ijin_bpom');
        $haki = $this->input->post('haki');
        $plan_produksi = $this->input->post('plan_produksi');
        $estimasi_nilai_project = $this->input->post('estimasi_nilai_project');

        $data = array(
            'nama_perusahaan' => $nama_perusahaan,
            'kecamatan' => $kecamatan,
            'kabupaten' => $kabupaten,
            'provinsi' => $provinsi,
            'alamat' => $alamat,
            'nama_pic' => $nama_pic,
            'no_telpon' => $no_telpon,
            'email' => $email,
            'jabatan' => $jabatan,
            'sumber_info' => $sumber_info,
            'sumber_person' => $sumber_person,
            'kategoriproduk_maklon_id' => $kategori_produk_maklon,
            'produk_exist' => $produk_exist,
            'ijin_halal' => $ijin_halal,
            'ijin_bpom' => $ijin_bpom,
            'haki' => $haki,
            'plan_produksi' => $plan_produksi,
            'estimasi_nilai_project' => $estimasi_nilai_project,
            'datecreated' => DATE('Y-m-d'),
        );

        $this->crud_model->input($data, 'tbl_maklon');
        $this->session->set_flashdata('berhasil', 'Data Berhasil Disimpan');

        redirect('maklon/formulir');
    }

    public function detailmaklon(){
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Mirota KSM | Detail maklon Kerja';

        $id_maklon = $this->input->get('id');
        $data = array(
        'list_data'       => $this->master_model->GetMaklonById($id_maklon),
        'id_maklon'       => $id_maklon
        );

        $this->loadViews("adminpanel/maklon/edit_maklon", $this->global, $data , NULL);
    }

    public function updateProgress(){
        $id_maklon = $this->input->post('id_maklon');
        $progress = $this->input->post('progres');
        $kendala = $this->input->post('kendala');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'progress' => $progress,
            'kendala' => $kendala,
            'keterangan' => $keterangan,
            'datecreated' => DATE('Y-m-d'),
        );
        
        $where = array(
            'id_maklon' => $id_maklon
        );

        $this->crud_model->update($where, $data, 'tbl_maklon');
        $this->set_notifikasi_swal('success','Berhasil','Data Berhasil Disimpan');

        redirect('datamaklon');
    }

    public function delete(){
        $id_maklon = $this->input->get('id');

        $where = array(
            'id_maklon' => $id_maklon
        );

        $sql = $this->crud_model->delete($where, 'tbl_maklon');
        $this->session->set_flashdata('berhasil', 'Data Berhasil Dihapus!');
        redirect('datamaklon');
    }

    public function export(){
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');

        if(empty($tgl_awal)){
            $where = NULL;
        }else{
            $where = array(
                'datecreated >=' => $tgl_awal,
                'datecreated <=' => $tgl_akhir
                );
        }
    
        $list_data = $this->master_model->GetMaklon($where);
    
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
    
        $sheet->setCellValue('B2', 'Laporan Maklon PT. Mirota KSM'); // Set kolom A1 Sebagai Header
        // $sheet->mergeCells('B2:E2'); // Set Merge Cell pada kolom A1 sampai E1
        
        $sheet->setCellValue('B3', 'No');
        $sheet->setCellValue('C3', 'Tahun');
        $sheet->setCellValue('D3', 'Bulan');
        $sheet->setCellValue('E3', 'Tanggal');
        $sheet->setCellValue('F3', 'Nama Perusahaan');
        $sheet->setCellValue('G3', 'Kecamatan');
        $sheet->setCellValue('H3', 'Kabupaten');
        $sheet->setCellValue('I3', 'Provinsi');
        $sheet->setCellValue('J3', 'Alamat');
        $sheet->setCellValue('K3', 'Nama PIC');
        $sheet->setCellValue('L3', 'Kontak');
        $sheet->setCellValue('M3', 'Email');
        $sheet->setCellValue('N3', 'Jabatan');
        $sheet->setCellValue('O3', 'Info Maklon');
        $sheet->setCellValue('P3', 'Nama Sales');
        $sheet->setCellValue('Q3', 'Kategori Produk');
        $sheet->setCellValue('R3', 'Existing Produk');
        $sheet->setCellValue('S3', 'Ijin Halal');
        $sheet->setCellValue('T3', 'Ijin BPOM');
        $sheet->setCellValue('U3', 'Sertifikat HAKI');
        $sheet->setCellValue('V3', 'Plan Produksi');
        $sheet->setCellValue('W3', 'Estimasi Nilai Project');
    
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
        $sheet->getStyle('M3')->applyFromArray($style_col);
        $sheet->getStyle('N3')->applyFromArray($style_col);
        $sheet->getStyle('O3')->applyFromArray($style_col);
        $sheet->getStyle('P3')->applyFromArray($style_col);
        $sheet->getStyle('Q3')->applyFromArray($style_col);
        $sheet->getStyle('R3')->applyFromArray($style_col);
        $sheet->getStyle('S3')->applyFromArray($style_col);
        $sheet->getStyle('T3')->applyFromArray($style_col);
        $sheet->getStyle('U3')->applyFromArray($style_col);
        $sheet->getStyle('V3')->applyFromArray($style_col);
        $sheet->getStyle('W3')->applyFromArray($style_col);

    
    
        $no = 1;
        $numrow = 4;
        foreach ($list_data as $ld) {
    
          $sheet->setCellValue('B'.$numrow, $no);
          $sheet->setCellValue('C'.$numrow, date("Y", strtotime($ld->datecreated)));
          $sheet->setCellValue('D'.$numrow, date("m", strtotime($ld->datecreated)));
          $sheet->setCellValue('E'.$numrow, date("d", strtotime($ld->datecreated)));
          $sheet->setCellValue('F'.$numrow, $ld->nama_perusahaan);
          $sheet->setCellValue('G'.$numrow, $ld->dis_name);
          $sheet->setCellValue('H'.$numrow, $ld->city_name);
          $sheet->setCellValue('I'.$numrow, $ld->prov_name);
          $sheet->setCellValue('J'.$numrow, $ld->alamat);
          $sheet->setCellValue('K'.$numrow, $ld->nama_pic);
          $sheet->setCellValue('L'.$numrow, $ld->no_telpon);
          $sheet->setCellValue('M'.$numrow, $ld->email);
          $sheet->setCellValue('N'.$numrow, $ld->jabatan);
          $sheet->setCellValue('O'.$numrow, $ld->sumber_info);
          $sheet->setCellValue('P'.$numrow, $ld->sumber_person);
          $sheet->setCellValue('Q'.$numrow, $ld->nama_kategoriproduk);
          $sheet->setCellValue('R'.$numrow, $ld->produk_exist);
          $sheet->setCellValue('S'.$numrow, $ld->ijin_halal);
          $sheet->setCellValue('T'.$numrow, $ld->ijin_bpom);
          $sheet->setCellValue('U'.$numrow, $ld->haki);
          $sheet->setCellValue('V'.$numrow, $ld->plan_produksi);
          $sheet->setCellValue('W'.$numrow, $ld->estimasi_nilai_project);
    
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
          $sheet->getColumnDimension('M')->setAutoSize(true);
          $sheet->getColumnDimension('N')->setAutoSize(true);
          $sheet->getColumnDimension('O')->setAutoSize(true);
          $sheet->getColumnDimension('P')->setAutoSize(true);
          $sheet->getColumnDimension('Q')->setAutoSize(true);
          $sheet->getColumnDimension('R')->setAutoSize(true);
          $sheet->getColumnDimension('S')->setAutoSize(true);
          $sheet->getColumnDimension('T')->setAutoSize(true);
          $sheet->getColumnDimension('U')->setAutoSize(true);
          $sheet->getColumnDimension('V')->setAutoSize(true);
          $sheet->getColumnDimension('W')->setAutoSize(true);

      
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
          $sheet->getStyle('M'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('N'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('O'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('P'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('Q'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('R'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('S'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('T'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('U'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('V'.$numrow)->applyFromArray($style_row);
          $sheet->getStyle('W'.$numrow)->applyFromArray($style_row);

    
          $no++;
          $numrow++;
        }
    
    
        $writer = new Xlsx($spreadsheet);
        header('Content-Type: application/vnd.ms-excel');

        if(empty($tgl_awal)){
        header('Content-Disposition: attactchment;filename= Laporan Maklon.xlsx');
        } else {
        header('Content-Disposition: attactchment;filename= Laporan Maklon '.mediumdate_indo($tgl_awal).' - '.mediumdate_indo($tgl_akhir).'.xlsx');
        }
    
        header('Cache-Control: max-age=0');
        $writer->save("php://output");
        exit();
    }
    // END DATA MAKLON 

}