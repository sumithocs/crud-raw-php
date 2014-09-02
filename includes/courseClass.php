<?php
include_once 'includes/dbClass.php';

class courseClass{
	
	private $db;
	
	public function __construct(){
		//$this->db = DbClass::getInstance();	
		$this->db = new dbClass;	
	}
	
	function getCourseList(){		
		$records = $this->db->getRecords('tbl_course');
		return $records;
	}
	
	function getCourseByID($course_id){
		$records = $this->db->getRecords('tbl_course','','course_id = '.$course_id);
		//print_r($records);
		return $records;
	}
	
	
}