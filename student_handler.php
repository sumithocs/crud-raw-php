<?php
session_start();
include_once 'includes/studentClass.php';
$studentObj = new studentClass;

$action = $_REQUEST['action'];

if($action == 'add')
{
	
	$data = array();	
	$data['fname'] = $_POST['fname'];
	$data['lname'] = $_POST['lname'];
		
	if (empty($_FILES['photo']['name']) || $_FILES["photo"]["error"] > 0) {
		$data['photo'] = "no_image.jpg";
	}
	else
	{
		move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/".$_FILES["photo"]["name"]);
		$data['photo'] = $_FILES["photo"]["name"];
	}
	
	$data['course_id'] =  $_POST['course'];	
	
	//INSERT INTO tbl_student VALUES (value1,value2,value3,...);
	if($studentObj->add_student($data))
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
	$student_id = $_POST['student_id'];
	$data = array();
	$data['fname'] = $_POST['fname'];
	$data['lname'] = $_POST['lname'];
	if(!empty($_FILES['photo']['name'])){//if a new file selected	
		if ($_FILES["photo"]["error"] > 0) {
			$data['photo'] = "no_image.jpg";
		}
		else
		{
			move_uploaded_file($_FILES["photo"]["tmp_name"],"photos/".$_FILES["photo"]["name"]);
			$data['photo'] = $_FILES["photo"]["name"];
		}
	}
	
	$data['course_id'] =  $_POST['course'];
	
	if($studentObj->editStudent($data,$student_id))
	{
		$_SESSION['msg'] = "Edited Successfully";
	}
	else
	{
		$_SESSION['msg'] = "Editing Failed!!";
	}
	
	header("Location: dashboard_page.php");
	die();
}
elseif($action == 'delete')
{
	$student_id = $_REQUEST['student_id'];	
	
	if($studentObj->deleteStudent($student_id))
	{
		$_SESSION['msg'] = "Deleted Successfully";
	}
	else
	{
		$_SESSION['msg'] = "Deleting Failed!!";
	}

	header("Location: dashboard_page.php");
	die();
}
