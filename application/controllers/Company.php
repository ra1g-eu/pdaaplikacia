<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Company extends CI_Controller{
	public function index(){
		$data['title'] = 'Company';

		$data['company'] = $this->Company_model->get_company();

		$this->load->model("Company_model");
		$edit = $this->input->get('edit'); 
		$remove = $this->input->get('remove'); 
if(!isset($edit)){
            // get data
            $data['response'] = $this->Company_model->getCompanyList();
            $data['id'] = $this->Company_model->naplnCompanyCRP();
            $data['view'] = 1;

            // load view
            $this->load->view('templates/header');
            $this->load->view('company/index',$data);
            $this->load->view('templates/footer');
        }else{

            // Check submit button POST or not
            if($this->input->post('aktualizovatCompany') != NULL ){
                // POST data
                $postData = $this->input->post();

                //load model
                $this->load->model('Company_model');


                // Update record
                $this->Company_model->updateCompany($postData,$edit);

                // Redirect page
                redirect('company');

            }else{

                // get data by id
                $data['response'] = $this->Company_model->getCompanyById($edit);
                $data['id'] = $this->Company_model->naplnCompanyCRP();
                $data['view'] = 2;

                // load view
            $this->load->view('templates/header');
            $this->load->view('company/index',$data);
            $this->load->view('templates/footer');

            }
        }

        if(!isset($remove)){            // get data
            
            $data['view'] = 3;
            }else{
            $this->load->model("Company_model");
            $data['response'] = $this->Company_model->delete_company($remove);
			$this->Company_model->delete_company($idcompany);
			redirect(site_url('company'));
            }

            	// pridat studenta
            if($this->input->post('pridajCompany') != NULL ){
            $data['idcrp'] = $this->Company_model->naplnCompanyCRP();
            $Cname = $this->input->post('addcompanyN');
            $Caddress = $this->input->post('addaddress');
            $Cfield = $this->input->post('addafield');
            $idcrp = $this->input->post('txt_meno');
             
            // Checking if everything is there
            if ($Cname && $Caddress && $Cfield && $idcrp) {
                // Loading model
                $this->load->model('Company_model');
                $data = array(
                    'company_name' => $Cname,
                    'company_address' => $Caddress,
                    'company_field' => $Cfield,
                    'company_responsible_person_idcrp' => $idcrp
                );

                // Calling model
                $id = $this->Company_model->addCompany($data);

                // You can do something else here
            }
}
}
public function dtcompany()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $stu = $this->Company_model->dtget_company();

          $data = array();

          foreach($stu->result() as $r) {

               $data[] = array(
                    $r->idcompany,
                    $r->company_name,
                    $r->company_address,
                    $r->company_field,
                    $r->cele_meno,
                    $r->href='<a href="'.site_url('company?edit='.$r->idcompany).'" class="btn btn-primary btn-sm" role="button">Upraviť</a>
                    <a href="'.site_url('company?remove='.$r->idcompany).'" class="btn btn-danger btn-sm" role="button">Vymazať</a>'
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