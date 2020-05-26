<?php
	class Studprax_model extends CI_Model{

        public function dtget_studprax(){
      $this->db->select('idstudentska_prax, company.company_name AS NazovFirmy, prax_nazov.nazov_prace AS nazovprace, time_started, time_ended, CONCAT(students.student_fname," ", students.student_lname) AS cele_meno');
        $this->db->from('studentska_prax');
        $this->db->join('prax_nazov', 'prax_nazov.idprax_nazov=studentska_prax.prax_nazov_idprax_nazov');
        $this->db->join('students', 'students.idstudents=studentska_prax.students_idstudents');
        $this->db->join('company', 'company.idcompany=studentska_prax.company_idcompany');
        $this->db->order_by('idstudentska_prax', 'asc');
        return $this->db->get();
        }

		public function __construct(){
			$this->load->database();
		}
public function get_Studprax($idstudentska_prax = FALSE){
			if($idstudentska_prax === FALSE){
				$query = $this->db->get('studentska_prax');
				return $query->result_array();
			}
			$query = $this->db->get_where('studentska_prax', array('idstudentska_prax' => $idstudentska_prax));
			return $query->row_array();
		}

		public function delete_company($idstudentska_prax){
			$query = $this->db->delete('studentska_prax', array('idstudentska_prax' => $idstudentska_prax));
		}

function getStudpraxList(){
      $this->db->select('idstudentska_prax, company.company_name, prax_nazov.nazov_prace AS nazovprace, time_started, time_ended, CONCAT(students.student_fname," ", students.student_lname) AS cele_meno');
        $this->db->from('studentska_prax');
        $this->db->join('prax_nazov', 'prax_nazov.idprax_nazov=studentska_prax.prax_nazov_idprax_nazov');
        $this->db->join('students', 'students.idstudents=studentska_prax.students_idstudents');
        $this->db->join('company', 'company.idcompany=studentska_prax.company_idcompany');
        $this->db->order_by('idstudentska_prax', 'asc');
        $q = $this->db->get();
        $result = $q->result_array();
        return $result;
    }

    // Get user by id
    function getStudpraxById($id){
      $this->db->select('idstudentska_prax, company.company_name, prax_nazov.nazov_prace AS nazovprace, time_started, time_ended, CONCAT(students.student_fname," ", students.student_lname) AS cele_meno');
        $this->db->from('studentska_prax');
        $this->db->where('idstudentska_prax', $id);
        $this->db->join('prax_nazov', 'prax_nazov.idprax_nazov=studentska_prax.prax_nazov_idprax_nazov');
        $this->db->join('students', 'students.idstudents=studentska_prax.students_idstudents');
        $this->db->join('company', 'company.idcompany=studentska_prax.company_idcompany');
        $this->db->order_by('idstudentska_prax', 'asc');
        $q = $this->db->get();

        $result = $q->result_array();
        return $result;
    }

    function naplnStudpraxStudentName(){
    			$this->db->order_by('idstudents')
			->select('idstudents, CONCAT(student_fname," ", student_lname) AS cele_meno')
			->from('students');
			$this->db->insert_id();
		$query = $this->db->get();
		$result = $query->result_array();
        return $result;
    }
        function naplnStudpraxCompanyName(){
                $this->db->order_by('idcompany')
            ->select('idcompany, company_name')
            ->from('company');
            $this->db->insert_id();
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }
        function naplnStudpraxNazovPrace(){
                $this->db->order_by('idprax_nazov')
            ->select('idprax_nazov, nazov_prace')
            ->from('prax_nazov');
            $this->db->insert_id();
        $query = $this->db->get();
        $result = $query->result_array();
        return $result;
    }

    // Update record by id
    function updateStudprax($postData,$id){

        $Cname = $this->input->post('txt_companyN');
        $Caddress = $this->input->post('txt_companyA');
        $Cfield = $this->input->post('txt_companyF');
        $crp_meno = $this->input->post('txt_meno');
        if($Cname && $Caddress && $Cfield && $crp_fname && $crp_meno){

            // Update
            $value=array(
            'company_name'=>$Cname,
            'company_address'=>$Caddress,
            'company_field'=>$Cfield,
            'cele_meno'=>$crp_meno);
            
            $this->db->where('idstudentska_prax',$id);
            $this->db->update('studentska_prax',$value);
        }
    }

    public function addStudprax($data){
    $this->db->insert('studentska_prax',$data);
    redirect(site_url('studprax'));
    }

	}