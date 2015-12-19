<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class career_model extends CI_Model {
var $table='career';

		public function __construct() {
			parent::__construct();
			$this->load->database();
		}
	   function edit($condition=array(),$data_array=array()){
	
		if($condition){
			$this->db->where($condition);
		}
		if($this->db->update($this->table,$data_array)){
				return true;
			}
			else{
				return false;
				}
		}
	
		 function get_all_entries($row,$limit,$condition=array(),$order_by_fieled,$order_by_type="asc")
		{   
			//$this->db->where('blog_status','E');
			if($condition)
			{
			$this->db->where($condition);
			}
			if($order_by_fieled){	
			$this->db->order_by($order_by_fieled,$order_by_type); 	
			}
			$query = $this->db->get($this->table,$limit,$row);
			
			if ($query->num_rows() > 0){
			  return $query->result_array();
			}
			 else {
			  return array();
			}
	
		}
		
		function get_all($condition=array(),$order_by_fieled='',$order_by_type="asc")
		{			
			$this->db->from($this->table);
			if($condition){
				$this->db->where($condition);
			}
			if($order_by_fieled){	
			$this->db->order_by($order_by_fieled,$order_by_type); 	
			}
			$query=$this->db->get();
			if($query->num_rows()>0){
					return $query->result_array();
				}
				else{
					return array();
				}
		}		
		function countrows($condition=array()){
		
			$this->db->from($this->table);
			if($condition){
					$this->db->where($condition);
				}
			$query = $this->db->get();
			$row=$query->num_rows();
			return $row;
		}
		
		function add($data_array=array()){
		
			$this->db->insert($this->table,$data_array);
			return $this->db->insert_id();
		}
			function add_data($data_array=array()){
		
			$this->db->insert('career_enquiry',$data_array);
			return $this->db->insert_id();
		}
		
		
		 function get_entry($condition=array()){
		 
			 $this->db->from($this->table);
			 if($condition)
				{
				$this->db->where($condition);
				}
			  
			  if ($query->num_rows() == 1)
			  {
				return $query->row();
				
			  }
			   else {
				return false; 
			  }
		}
		function delete($condition=array()){
		
			$this->db->where($condition);
			$this->db->delete($this->table);
		}
		function get_all_category($condition=array(),$order_by_fieled='',$order_by_type="asc")
		{			
			$this->db->from('careers_category');
			if($condition){
				$this->db->where($condition);
			}
			if($order_by_fieled){	
			$this->db->order_by($order_by_fieled,$order_by_type); 	
			}
			$query=$this->db->get();
			if($query->num_rows()>0){
					return $query->result_array();
				}
				else{
					return array();
				}
		}
                
                function get_field_data($table,$condition=array(),$field='') {
               
               
               $this->db->select($field);
               $this->db->from($table);
               $this->db->where($condition);
               $query =$this->db->get();
               if($query->num_rows()>0)
                       {
                        $firstname=$query->row();
          
                       $return_value=$firstname->$field;
                       return $return_value;
               }
               
   }
   function human_time($time = false){
       if(!$time){
               $time = time();
       }
       //$human_datetime = unix_to_human($time);
       //$human_datetime = date('d  M  , Y',$time);
       $human_datetime = date('Y-m-d',$time);
       //$human_datetime = date('dS M , Y',$time);
       echo $human_datetime;
}
}
?>
