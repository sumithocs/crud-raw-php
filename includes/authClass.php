<?php
include 'includes/dbClass.php';

class authClass{
	
	private $db;
	
	public function __construct(){
		$this->db = DbClass::getInstance();		
	}
	
	function login($username,$password){		
		$res = $this->db->getNumRows("select * from tbl_system_user where username = '".$username."' and password = '". $password."'");
		if($res>0){
			return true;
		}else{
			return false;
		}
	}
	
	function register($data){
		
		
	}
	
	function check_user_existence($username){
		
	}
	
	
}