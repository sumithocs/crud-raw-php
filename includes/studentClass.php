<?php
include_once 'includes/dbClass.php';

class studentClass{
	
	private $db;
	
	public function __construct(){
		//$this->db = DbClass::getInstance();	
		$this->db = new dbClass;
	}
	
	function add_student($data){		
		$insert_id = $this->db->addRecords('tbl_student',$data);
		if($insert_id>0){
			return true;
		}else{
			return false;
		}
	}
	
	function getStudentList(){		
		//$records = $this->db->getRecords('tbl_student');
		$records = $this->db->runQuerySelect('SELECT * FROM tbl_student as s LEFT JOIN tbl_course as c ON s.course_id=c.course_id');
		return $records;
	}
	
	function getStudentByID($student_id){
		$records = $this->db->getRecords('tbl_student','','student_id = '.$student_id);
		return $records;
	}
	
	function edit_student($data,$student_id){		
		$insert_id = $this->db->updateRecords('tbl_student',$data,'student_id = '.$student_id);
		if($insert_id>0){
			return true;
		}else{
			return false;
		}
	}
	
}