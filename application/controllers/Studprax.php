<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Studprax extends CI_Controller{
	public function index(){
		$data['title'] = 'Studentska prax';

		$data['studprax'] = $this->Studprax_model->get_Studprax();

		$this->load->model("Studprax_model");
		$edit = $this->input->get('edit'); 
		$remove = $this->input->get('remove'); 
if(!isset($edit)){
            // get data
            $data['response'] = $this->Studprax_model->getStudpraxList();
            $data['idst'] = $this->Studprax_model->naplnStudpraxStudentName();
            $data['idco'] = $this->Studprax_model->naplnStudpraxCompanyName();
            $data['idnp'] = $this->Studprax_model->naplnStudpraxNazovPrace();
            $data['view'] = 1;

            // load view
            $this->load->view('templates/header');
            $this->load->view('studprax/index',$data);
            $this->load->view('templates/footer');
        }else{

            // Check submit button POST or not
            if($this->input->post('aktualizovatStudprax') != NULL ){
                // POST data
                $postData = $this->input->post();

                //load model
                $this->load->model('Studprax_model');


                // Update record
                $this->Studprax_model->updateStudprax($postData,$edit);

                // Redirect page
                redirect('studprax');

            }else{

                // get data by id
                $data['response'] = $this->Studprax_model->getStudpraxById($edit);
                $data['idst'] = $this->Studprax_model->naplnStudpraxStudentName();
                $data['idco'] = $this->Studprax_model->naplnStudpraxCompanyName();
                $data['idnp'] = $this->Studprax_model->naplnStudpraxNazovPrace();
                $data['view'] = 2;

                // load view
            $this->load->view('templates/header');
            $this->load->view('studprax/index',$data);
            $this->load->view('templates/footer');

            }
        }

        if(!isset($remove)){            // get data
            
            $data['view'] = 3;
            }else{
            $this->load->model("Studprax_model");
            $data['response'] = $this->Studprax_model->delete_Studprax($remove);
			$this->Studprax_model->delete_Studprax($idcompany);
			redirect(site_url('studprax'));
            }

            	// pridat studenta
            if($this->input->post('pridajStudprax') != NULL ){
            $data['idst'] = $this->Studprax_model->naplnStudpraxStudentName();
            $data['idco'] = $this->Studprax_model->naplnStudpraxCompanyName();
            $data['idnp'] = $this->Studprax_model->naplnStudpraxNazovPrace();
            $Cname = $this->input->post('addcompanyN');
            $Caddress = $this->input->post('addaddress');
            $Cfield = $this->input->post('addafield');
            $crp_meno = $this->input->post('txt_meno');
            // Checking if everything is there
            if ($Cname && $Caddress && $Cfield && $crp_meno>0) {
                // Loading model
                $this->load->model('Studprax_model');
                $data = array(
                    'company_name' => $Cname,
                    'company_address' => $Caddress,
                    'company_field' => $Cfield,
                    'company_responsible_person_idcrp' => $crp_meno
                );

                // Calling model
                $id = $this->Studprax_model->addStudprax($data);

                // You can do something else here
            }
}
}

public function dtstudprax()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $stu = $this->Studprax_model->dtget_studprax();

          $data = array();

          foreach($stu->result() as $r) {

               $data[] = array(
                    $r->idstudentska_prax,
                    $r->NazovFirmy,
                    $r->nazovprace,
                    $r->time_started,
                    $r->time_ended,
                    $r->cele_meno,
                    $r->href='<a href="'.site_url('studprax?edit='.$r->idstudentska_prax).'" class="btn btn-primary btn-sm" role="button">Upraviť</a>
                    <a href="'.site_url('studprax?remove='.$r->idstudentska_prax).'" class="btn btn-danger btn-sm" role="button">Vymazať</a>'
                    );
          }

          $output = array(
               "draw" => $draw,
                 "recordsTotal" => $stu->num_rows(),
                 "recordsFiltered" => $stu->num_rows(),
                 "data" => $data
            );
          echo json_encode($output);
          exit();
     }

}