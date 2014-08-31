<?php 
session_start();
if($_SESSION['login_status'])
{
	header("Location: dashboard_page.php");
}
else
{
	header("Location: login_page.php");	
}
die();
?>