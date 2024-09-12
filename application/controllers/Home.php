<?php if(!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';

/**
 * @author : Tri Cahya Wibawa
 * @version : 1.1
 * @since : 23 Maret 2023
 */
class Home extends BaseController
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->model('master_model');
        $this->load->model('crud_model');
        $this->load->model('visitor_model');
    }

    /**
     * Index Page for this controller.
     */
    public function index()
    {
        $this->global['pageTitle'] = 'Mirota KSM | Home';
        
        $ip    = $this->input->ip_address(); // Mendapatkan IP user
        // $ipdat = json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        // $region = $ipdat->geoplugin_city;
        $date  = date("Y-m-d"); // Mendapatkan tanggal sekarang
        $waktu = time(); //
        $timeinsert = date("Y-m-d H:i:s");
        
        // Cek berdasarkan IP, apakah user sudah pernah mengakses hari ini
        $s = $this->visitor_model->GetVisitor($ip, $date);
        $ss = isset($s)?($s):0;
        
        
        // Kalau belum ada, simpan data user tersebut ke database
        if($ss == 0){

        $data = array(
            'ip'        => $ip,
            // 'region'    => isset($region)?($region):'',
            'date'      => $date,
            'hits'      => 1,
            'online'    => $waktu,
            'time'      => $timeinsert,
        );
        
        $this->crud_model->input($data, 'visitor');
        }
        
        // Jika sudah ada, update
        else{
        $hits = $this->visitor_model->GetHitsVisitor($ip, $date);
        $hits = $hits->hits;

        $data = array(
            'hits'      => $hits+1,
            'online'    => $waktu,
        );

        $where = array(
            'ip'        => $ip,
            'date'      => $date,
        );
        
        $this->crud_model->update($where, $data, 'visitor');
        }
        
        $data['artikel'] = $this->master_model->GetDataArtikel();
        
        $this->loadPageViews("pages/home", $this->global, $data, NULL);
    }
    
    public function getArtikel(){
        $this->global['pageTitle'] = 'Mirota KSM | Artikel';

        $slug = $this->uri->segment(2);
        $artikel = $this->master_model->GetArtikelBySlug($slug);
        $kategori = $artikel->kategori_id;
        $id = $artikel->id_artikel;

        $where = array(
            'id_artikel !=' => $id,
            'kategori_id' => $kategori
        );

        $data['artikel'] = $artikel;
        $data['artikel_terbaru'] = $this->master_model->GetArtikelASC(); 
        $data['artikel_terkait'] = $this->master_model->GetArtikelbyKategori($where); 

        $this->loadPageViews("pages/artikel", $this->global, $data, NULL);
    }

    public function privasi()
    {
        $this->global['pageTitle'] = 'Mirota KSM | Privasi';
        
        $this->loadPageViews("pages/privasi", $this->global , NULL);
    }

    public function syaratKetentuan()
    {
        $this->global['pageTitle'] = 'Mirota KSM | Syarat Ketentuan';
        
        $this->loadPageViews("pages/syaratKetentuan", $this->global , NULL);
    }

}