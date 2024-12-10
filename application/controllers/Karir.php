<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * @author : Tri Cahya Wibawa
 * @version : 1.1
 * @since : 23 Maret 2023
 */
class Karir extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('crud_model');
        $this->load->model('master_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Mirota KSM | Bergabung Bersama Kami';

        $data = array(
            'list_data'       => $this->master_model->GetdataLowongan(),
        );

        
        $this->loadPageViews("pages/karir", $this->global ,$data , NULL);
    }

    // 
    // LOWONGAN
    // 

    public function formulir()
    {
        $id_lowongan = $this->uri->segment(2);
        $getlowongan = $this->master_model->GetLowonganById($id_lowongan);

        foreach ($getlowongan as $getlowongan) {
            $nama_lowongan = $getlowongan->nama_lowongan;
        }

        $this->global['pageTitle'] = 'Mirota KSM | Formulir';

        $data = array(
            'id_lowongan' => $id_lowongan,
            'nama_lowongan' => $nama_lowongan
        );
        
        $this->loadPageViews("pages/form_lowongan", $this->global,$data, NULL);
    }

    public function datalowongan()
    {
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Mirota KSM | Data Lowongan Kerja';

        $data = array(
            'list_data'       => $this->crud_model->tampildata('tbl_lowongan'),
          );

        $this->loadViews("adminpanel/karir/data_lowongan", $this->global, $data , NULL);

    }

    public function save(){

        $nama_lowongan = $this->input->post('nama_lowongan');
        $kategori = $this->input->post('kategori');
        $lokasi = $this->input->post('lokasi');
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'nama_lowongan' => $nama_lowongan,
            'kategori' => $kategori,
            'wilayah' => $lokasi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'deskripsi' => $deskripsi,
        );

        $this->crud_model->input($data, 'tbl_lowongan');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="allert">Data Berhasil Ditambah!</div>');

        redirect('datalowongan');
    }

    public function detaillowongan(){
        $this->isLoggedIn();
        $this->global['pageTitle'] = 'Mirota KSM | Detail Lowongan Kerja';

        $id_lowongan = $this->input->get('id');
        $data = array(
            'list_data'       => $this->master_model->GetLowonganById($id_lowongan),
            'id_lowongan'       => $id_lowongan
          );

        $this->loadViews("adminpanel/karir/edit_lowongan", $this->global, $data , NULL);
    }

    public function update(){
        $id_lowongan = $this->input->get('id');

        $nama_lowongan = $this->input->post('nama_lowongan');
        $kategori = $this->input->post('kategori');
        $lokasi = $this->input->post('lokasi');
        $tgl_awal = $this->input->post('tgl_awal');
        $tgl_akhir = $this->input->post('tgl_akhir');
        $deskripsi = $this->input->post('deskripsi');

        $data = array(
            'nama_lowongan' => $nama_lowongan,
            'kategori' => $kategori,
            'wilayah' => $lokasi,
            'tgl_awal' => $tgl_awal,
            'tgl_akhir' => $tgl_akhir,
            'deskripsi' => $deskripsi,
        );
        
        $where = array(
            'id_lowongan' => $id_lowongan
        );

        $this->crud_model->update($where, $data, 'tbl_lowongan');
        $this->session->set_flashdata('berhasil', 'Data Berhasil Diubah!');

        redirect('datalowongan');
    }

    public function delete(){
        $id_lowongan = $this->input->get('id');

        $where = array(
            'id_lowongan' => $id_lowongan
        );

        $sql = $this->crud_model->delete($where, 'tbl_lowongan');
        $this->session->set_flashdata('berhasil', 'Data Berhasil Dihapus!');
        redirect('datalowongan');
    }

    // 
    // END LOWONGAN
    // 

    public function datapelamar()
    {
        $this->isLoggedIn();

        $this->global['pageTitle'] = 'Mirota KSM | Data Lowongan Kerja';

        $data = array(
            'list_data'       => $this->master_model->getDataPelamar(),
          );

        $this->loadViews("adminpanel/karir/data_pelamar", $this->global, $data , NULL);

    }

    public function savepelamar(){
        $data = array();
        $config['upload_path']          = './assets/dokumen_pelamar';
        $config['allowed_types']        = 'gif|jpg|png|PNG|jpeg|pdf';

        $this->load->library('upload', $config);
        

        if (!$this->upload->do_upload('file_surat')) {

            $this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="allert">Data Gagal Ditambah!</div>');
            $this->formulir();

        } else {

            if($this->upload->do_upload('file_surat')){
                $file_surat = $this->upload->data();
                $file_surat = $file_surat['file_name'];
            }

            if($this->upload->do_upload('file_cv')){
                $file_cv = $this->upload->data();
                $file_cv = $file_cv['file_name'];
            }

            if($this->upload->do_upload('file_ijazah')){
                $file_ijazah = $this->upload->data();
                $file_ijazah = $file_ijazah['file_name'];
            }

            if($this->upload->do_upload('file_lampiran')){
                $file_lampiran = $this->upload->data();
                $file_lampiran = $file_lampiran['file_name'];
            }else{
                $file_lampiran = "";
            }

            $posisi = $this->input->post('posisi');
            $nama_pelamar = $this->input->post('nama_pelamar');
            $alamat = $this->input->post('alamat');
            $email = $this->input->post('email');
            $no_wa = $this->input->post('no_wa');


            $data = array(
                'lowongan_id' => $posisi,
                'nama_pelamar' => $nama_pelamar,
                'alamat_pelamar' => $alamat,
                'email_pelamar' => $email,
                'no_wa' => $no_wa,
                'file_surat' => $file_surat,
                'file_cv' => $file_cv,
                'file_ijazah' => $file_ijazah,
                'file_lampiran' => $file_lampiran,
                'datecreated' => DATE('Y-m-d H:i:s'),
            );
        }

        $this->crud_model->input($data, 'tbl_pelamar');
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="allert">Data Berhasil Ditambah!</div>');

        redirect('karir');
    }

    function getDataPelamar($id){
        $pelamar = $this->master_model->GetPelamarById($id);
        echo json_encode($pelamar[0]);
    }

    public function delete_pelamar(){
        $id_pelamar = $this->input->get('id');

        $where = array(
            'id_pelamar' => $id_pelamar
        );

        $sql = $this->crud_model->delete($where, 'tbl_pelamar');
        $this->session->set_flashdata('berhasil', 'Data Berhasil Dihapus!');
        redirect('datapelamar');
    }
}