<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Students extends CI_Controller{
	public function index(){
		$data['title'] = 'Students info';

		$data['students'] = $this->Students_info->get_students();
		
		
		

		$this->load->model("Students_info");
		$edit = $this->input->get('edit'); 
		$remove = $this->input->get('remove'); 

		if(!isset($edit)){
            // get data

            $data['response'] = $this->Students_info->getUsersList();
            $data['view'] = 1;

            // load view
            $this->load->view('templates/header');
            $this->load->view('students/index',$data);
            $this->load->view('templates/footer');
        }else{

            // Check submit button POST or not
            if($this->input->post('aktualizovatStudenta') != NULL ){
                // POST data
                $postData = $this->input->post();

                //load model
                $this->load->model('Students_info');

                // Update record
                $this->Students_info->updateUser($postData,$edit);

                // Redirect page
                redirect('students');

            }else{

                // get data by id
                $data['response'] = $this->Students_info->getUserById($edit);
                $data['view'] = 2;

                // load view
            $this->load->view('templates/header');
            $this->load->view('students/index',$data);
            $this->load->view('templates/footer');

            }
        }

        if(!isset($remove)){            // get data
            
            $data['view'] = 3;
            }else{
            $this->load->model("Students_info");
            $data['response'] = $this->Students_info->delete_student($remove);
			$this->Students_info->delete_student($idstudents);
			redirect(site_url('students'));
            }

            	// pridat studenta
            if($this->input->post('pridajStudent') != NULL ){
            $fname = $this->input->post('addfname');
            $lname = $this->input->post('addlname');
            $mail = $this->input->post('addmail');
            // Checking if everything is there
            if ($fname && $lname && $mail) {
                // Loading model
                $this->load->model('Students_info');
                $data = array(
                    'student_fname' => $fname,
                    'student_lname' => $lname,
                    'student_mail' => $mail
                );

                // Calling model
                $id = $this->Students_info->addStudent($data);

                // You can do something else here
            }
}
}

public function dtstudents()
     {

          // Datatables Variables
          $draw = intval($this->input->get("draw"));
          $start = intval($this->input->get("start"));
          $length = intval($this->input->get("length"));


          $stu = $this->Students_info->dtget_students();

          $data = array();

          foreach($stu->result() as $r) {

               $data[] = array(
                    $r->idstudents,
                    $r->student_fname,
                    $r->student_lname,
                    $r->student_mail,
                    $r->href='<a href="'.site_url('students?edit='.$r->idstudents).'" class="btn btn-primary btn-sm" role="button">Upraviť</a>
            		<a href="'.site_url('students?remove='.$r->idstudents).'" class="btn btn-danger btn-sm" role="button">Vymazať</a>'
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