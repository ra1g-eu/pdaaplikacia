<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Crp extends CI_Controller{
	public function index(){
		$data['title'] = 'Company responsible person info';

		$data['company_responsible_person'] = $this->Crp_model->get_crp();
		
		
		

		$this->load->model("Crp_model");
		$edit = $this->input->get('edit'); 
		$remove = $this->input->get('remove'); 

		if(!isset($edit)){
            // get data
            $data['response'] = $this->Crp_model->getCrpList();
            $data['view'] = 1;

            // load view
            $this->load->view('templates/header');
            $this->load->view('crp/index',$data);
            $this->load->view('templates/footer');
        }else{

            // Check submit button POST or not
            if($this->input->post('aktualizovatCrp') != NULL ){
                // POST data
                $postData = $this->input->post();

                //load model
                $this->load->model('Crp_model');

                // Update record
                $this->Crp_model->updateCrp($postData,$edit);

                // Redirect page
                redirect('crp');

            }else{

                // get data by id
                $data['response'] = $this->Crp_model->getCrpById($edit);
                $data['view'] = 2;

                // load view
            $this->load->view('templates/header');
            $this->load->view('crp/index',$data);
            $this->load->view('templates/footer');

            }
        }

        if(!isset($remove)){            // get data
            
            $data['view'] = 3;
            }else{
            $this->load->model("Crp_model");
            $data['response'] = $this->Crp_model->delete_crp($remove);
			$this->Crp_model->delete_crp($idcrp);
			redirect(site_url('crp'));
            }

            	// pridat studenta
            if($this->input->post('pridajCrp') != NULL ){
            $fname = $this->input->post('addfname');
            $lname = $this->input->post('addlname');
            $phonen = $this->input->post('addphonen');
            $mail = $this->input->post('addmail');
            // Checking if everything is there
            if ($fname && $lname && $mail && $phonen) {
                // Loading model
                $this->load->model('Crp_model');
                $data = array(
                    'crp_fname' => $fname,
                    'crp_lname' => $lname,
                    'crp_phonenum' => $phonen,
                    'crp_mail' => $mail
                );

                // Calling model
                $id = $this->Crp_model->addCrp($data);

                // You can do something else here
            }
}
}

public function dtcrp()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $stu = $this->Crp_model->dtget_crp();

          $data = array();

          foreach($stu->result() as $r) {

               $data[] = array(
                    $r->idcrp,
                    $r->crp_fname,
                    $r->crp_lname,
                    $r->crp_phonenum,
                    $r->crp_mail,
                    $r->href='<a href="'.site_url('crp?edit='.$r->idcrp).'" class="btn btn-primary btn-sm" role="button">Upraviť</a>
                    <a href="'.site_url('crp?remove='.$r->idcrp).'" class="btn btn-danger btn-sm" role="button">Vymazať</a>'
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