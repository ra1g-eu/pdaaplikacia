<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chart extends CI_Controller{
    function __construct(){
      parent::__construct();
      //load chart_model from model
      $this->load->model('Chart_model');
    }
 
    function index(){
      $data = $this->Chart_model->get_data()->result();      
      $x['data'] = json_encode($data);

      $spnpdata = $this->Chart_model->get_StudentPocetNaPraci()->result();
      $x['spnpdata'] = json_encode($spnpdata);

      $this->load->view('templates/header');
      $this->load->view('grafy/index',$x);
      $this->load->view('templates/footer');
    }
}