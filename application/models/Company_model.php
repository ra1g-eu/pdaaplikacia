<?php
	class Company_model extends CI_Model{

        public function dtget_company(){
        $this->db->select('idcompany, company_name, company_address, company_field, CONCAT(company_responsible_person.crp_fname," ", company_responsible_person.crp_lname) AS cele_meno');
        $this->db->from('company');
        $this->db->join('company_responsible_person', 'company_responsible_person.idcrp=company.company_responsible_person_idcrp');
        $this->db->order_by('idcompany', 'asc');
        return $this->db->get();
        }

		public function __construct(){
			$this->load->database();
		}
public function get_company($idcompany = FALSE){
			if($idcompany === FALSE){
				$query = $this->db->get('company');
				return $query->result_array();
			}
			$query = $this->db->get_where('company', array('idcompany' => $idcompany));
			return $query->row_array();
		}

		public function delete_company($idcompany){
			$query = $this->db->delete('company', array('idcompany' => $idcompany));
		}

function getCompanyList(){
      $this->db->select('idcompany, company_name, company_address, company_field, CONCAT(company_responsible_person.crp_fname," ", company_responsible_person.crp_lname) AS cele_meno');
        $this->db->from('company');
        $this->db->join('company_responsible_person', 'company_responsible_person.idcrp=company.company_responsible_person_idcrp');
        $this->db->order_by('idcompany', 'asc');
        $q = $this->db->get();
        $result = $q->result_array();
        return $result;
    }

    // Get user by id
    function getCompanyById($id){
        $this->db->select('idcompany, company_name, company_address, company_field, CONCAT(company_responsible_person.crp_fname," ", company_responsible_person.crp_lname) AS cele_meno');
        $this->db->from('company');
        $this->db->where('idcompany', $id);
        $this->db->join('company_responsible_person', 'company_responsible_person.idcrp=company.company_responsible_person_idcrp');
        $this->db->order_by('idcompany', 'asc');
        $q = $this->db->get();

        $result = $q->result_array();
        return $result;
    }

    function naplnCompanyCRP(){
    			$this->db->order_by('idcrp')
			->select('idcrp, CONCAT(crp_fname," ", crp_lname) AS cele_meno')
			->from('company_responsible_person');
			$this->db->insert_id();
		$query = $this->db->get();
		$result = $query->result_array();
        return $result;
    }

    // Update record by id
    function updateCompany($postData,$id){

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
            
            $this->db->where('idcompany',$id);
            $this->db->update('company',$value);
        }
    }

    public function addCompany($data){
    $this->db->insert('company',$data);
    redirect(site_url('company'));
    }

	}