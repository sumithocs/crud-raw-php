<?php
class dbClass{
	private static $instance;

	function __construct(){
		//connect to db
		$this->con = mysql_connect("localhost","root","");
		$this->db = mysql_select_db("db_student",$this->con);
	}

	function getInstance(){
		if(!self::$instance){
			self::$instance = new DbClass();
			return self::$instance;
		}
	}

	function runQuery($query){
		$result = mysql_query($query) or die(mysql_error());
		return $result;
	}
	
	function runQuerySelect($query){
		$result = mysql_query($query) or die(mysql_error());
		$result_list = array();
		while($row = mysql_fetch_array($result)) {
			$result_list[] = $row;
		}
		return $result_list;
	}
	
	
	function getNumRows($query){
		$result = mysql_query($query) or die(mysql_error());
		return mysql_num_rows($result);
	}
	
	function getRecords($table,$columns="",$condition=""){
		$query = "SELECT ";
		if($columns == ""){
			$query .= "*";
		}
		else
		{
			$query .= implode(",",$columns);
		}
		
		$query .= "FROM ".$table;
		if($condition == ""){
			$query .= $condition;
		}
		//can extended to limit and offset
			
		$result = mysql_query($query) or die(mysql_error());		
		$result_list = array();
		while($row = mysql_fetch_array($result)) {
			$result_list[] = $row;
		}		
		return $result_list;
	}
	
	function addRecords($table,$data){
		
		$columns = implode(",",array_keys($data));
		$values = implode("','",array_values($data));
		$values = "'".$values."'";
		//INSERT INTO Customers (CustomerName, ContactName, Address, City, PostalCode, Country) VALUES ('Cardinal','Tom B. Erichsen','Skagen 21','Stavanger','4006','Norway');
		$query = "INSERT INTO ".$table;
		$query .= " (".$columns.")";
		$query .= " VALUES ";
		$query .= "(".$values.")";
		//echo $query;die;
		mysql_query($query) or die(mysql_error());
		return mysql_insert_id();
		
	}
}

?>
