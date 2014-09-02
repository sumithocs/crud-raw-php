<?php
session_start();
include_once 'includes/authClass.php';
$auth = new authClass;

$action = $_REQUEST['action'];

if($action == 'login')
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);	
	$login = $auth->login($username,$password);	
	
	if($login)
	{
		$_SESSION['login_status'] = true;
		$_SESSION['login_user'] = $username ;
		header("Location: dashboard_page.php");
		die();
	}
	
}
elseif($action == 'logout')
{
	unset($_SESSION['login_status']);
	unset($_SESSION['login_user']) ;
	header("Location: index.php");
	die();
}
else{	
	header("Location: index.php");
	die();
}
