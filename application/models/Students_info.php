<?php
	class Students_info extends CI_Model{
		public function __construct(){
			$this->load->database();
		}

		public function dtget_students(){
			return $this->db->get('students');			
		}

		public function get_students($idstudents = FALSE){
			if($idstudents === FALSE){
				$query = $this->db->get('students');
				return $query->result_array();
			}
			$query = $this->db->get_where('students', array('idstudents' => $idstudents));
			return $query->row_array();
		}

		public function delete_student($idstudents){
			$query = $this->db->delete('students', array('idstudents' => $idstudents));
		}

function getUsersList(){
        $this->db->select('*');
        $this->db->order_by('idstudents', 'asc');
        $q = $this->db->get('students');
        $result = $q->result_array();
        return $result;
    }


    // Get user by id
    function getUserById($id){
        $this->db->select('*');
        $this->db->where('idstudents', $id);
        $q = $this->db->get('students');
        $result = $q->result_array();
        return $result;
    }

    // Update record by id
    function updateUser($postData,$id){

        $name = $this->input->post('txt_fname');
        $lname = $this->input->post('txt_lname');
        $email = $this->input->post('txt_mail');
        if($name && $email && $lname ){

            // Update
            $value=array(
            'student_fname'=>$name,
            'student_lname'=>$lname,
            'student_mail'=>$email);
            
            $this->db->where('idstudents',$id);
            $this->db->update('students',$value);
        }
    }

    public function addStudent($data){
    $this->db->insert('students',$data);
    redirect(site_url('students'));
    }

	}