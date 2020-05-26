<?php
	class Crp_model extends CI_Model{


        public function dtget_crp(){
            return $this->db->get('company_responsible_person');          
        }    

		public function __construct(){
			$this->load->database();
		}

		public function get_crp($idcrp = FALSE){
			if($idcrp === FALSE){
				$query = $this->db->get('company_responsible_person');
				return $query->result_array();
			}
			$query = $this->db->get_where('company_responsible_person', array('idcrp' => $idcrp));
			return $query->row_array();
		}

		public function delete_crp($idcrp){
			$query = $this->db->delete('company_responsible_person', array('idcrp' => $idcrp));
		}

function getCrpList(){
        $this->db->select('*');
        $this->db->order_by('idcrp', 'asc');
        $q = $this->db->get('company_responsible_person');
        $result = $q->result_array();
        return $result;
    }

    // Get user by id
    function getCrpById($id){
        $this->db->select('*');
        $this->db->where('idcrp', $id);
        $q = $this->db->get('company_responsible_person');
        $result = $q->result_array();
        return $result;
    }

    // Update record by id
    function updateCrp($postData,$id){

        $name = $this->input->post('txt_fname');
        $lname = $this->input->post('txt_lname');
        $phonen = $this->input->post('txt_phonen');
        $email = $this->input->post('txt_mail');
        if($name && $email && $lname && $phonen){

            // Update
            $value=array(
            'crp_fname'=>$name,
            'crp_lname'=>$lname,
            'crp_phonenum'=>$phonen,
            'crp_mail'=>$email);
            
            $this->db->where('idcrp',$id);
            $this->db->update('company_responsible_person',$value);
        }
    }

    public function addCrp($data){
    $this->db->insert('company_responsible_person',$data);
    redirect(site_url('crp'));
    }

	}