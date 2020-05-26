<?php
class Chart_model extends CI_Model{
 
  //get data from database
  function get_data(){
  	    $this->db->select('COUNT(students_idstudents) AS PocetStudentov, company.company_name AS NazovFirmy');
        $this->db->from('studentska_prax');
        $this->db->where('time_ended IS NULL');
        $this->db->join('company', 'company.idcompany=studentska_prax.company_idcompany');
        $this->db->group_by('NazovFirmy');
      $result1 = $this->db->get();
      return $result1;
  }
  function get_StudentPocetNaPraci(){
  	  	$this->db->select('COUNT(students_idstudents) AS PocetStudentov2, prax_nazov.nazov_prace AS Praca');
        $this->db->from('studentska_prax');
        $this->db->where('time_ended IS NULL');
        $this->db->join('prax_nazov', 'prax_nazov.idprax_nazov=studentska_prax.prax_nazov_idprax_nazov');
        $this->db->group_by('Praca');
      $result2 = $this->db->get();
      return $result2;
  }
  
 
}