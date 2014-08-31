<?php
session_start();
include_once 'includes/authClass.php';
$auth = new authClass;

$action = $_POST['action'];

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
elseif($action == 'register')
{
	
}
