<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

require APPPATH . '/libraries/BaseController.php';
require 'vendor/autoload.php';

class Wilayah extends BaseController
{

  public function __construct(){
      parent::__construct();
      $this->load->model('crud_model');
      $this->load->model('master_model');
  }

  public function getdatakabupaten(){
    $id_provinsi = $this->input->post('provinsi');
    $getdatakab = $this->crud_model->getdatakab($id_provinsi);

    echo json_encode($getdatakab);
  }

  public function getdatakecamatan(){
    $id_kabupaten = $this->input->post('kabupaten');
    $getdatakec = $this->crud_model->GetDataByWhere(['city_id' => $id_kabupaten],'districts');

    echo json_encode($getdatakec);
  }
}