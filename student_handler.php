<?php
session_start();
include_once 'includes/studentClass.php';
$student = new studentClass;

$action = $_POST['action'];

if($action == 'add')
{
	
	$data = array();	
	$data['fname'] = $_POST['fname'];
	$data['lname'] = $_POST['lname'];
		
	if (empty($_FILES['photo']['name']) && $_FILES["photo"]["error"] > 0) {
		$data['photo'] = "";
	}
	else
	{
		move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/".$_FILES["photo"]["name"]);
		$data['photo'] = $_FILES["photo"]["name"];
	}
	
	$data['course_id'] =  $_POST['course'];	
	
	//INSERT INTO tbl_student VALUES (value1,value2,value3,...);
	if($student->add_student($data))
	{
		$_SESSION['msg'] = "Added Successfully";
	}
	else
	{
		$_SESSION['msg'] = "Adding Failed!!";
	}
	
	header("Location: dashboard_page.php");
	die();	
}
elseif($action == 'edit')
{
	
}
