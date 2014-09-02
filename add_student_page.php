<?php 
session_start();
if(isset($_SESSION['login_status']) && !empty($_SESSION['login_status'])){
	$user = $_SESSION['login_user'];
}else{
	header("Location: index.php");
	die();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Add Student</title>
  <link rel="stylesheet" href="css/style.css">
  	<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->
  	<script type="text/javascript" src="assets/jquery191.min.js"></script>	
	<script type="text/javascript" src="assets/script.js"></script>
	<script type="text/javascript" src="assets/jquery.validate.min.js"></script>
</head>
<body>
  <section class="container">
    <div class="dashboard">
    	<div class="page-title"><h1>Add Student</h1></div>
  		<div class="login-detail"><h1><?php echo "Welcome ". $_SESSION['login_user'];?> | <a href="auth_handler.php?action=logout">logout</a></h1></div>
  		<div class="page-title"></div>
  		<div class="login-detail"><a href="dashboard_page.php"><h3>Student List</h3></a></div> 
      <form method="post" name="add_form" id="add_form" action="student_handler.php" enctype="multipart/form-data">
        <p><input type="text" id="fname" name="fname" value="" placeholder="First Name"></p>
        <p><input type="text" id="lname" name="lname" value="" placeholder="Last Name"></p>
        <p><input type="file" id="photo" name="photo" value="" placeholder="Photo"></p>
        <p><select id="course" name="course"><option value="1">PHP-Mysql</option><option value="2">Html5 - CSS</option></select></p>
        
        <p class="submit"><input type="submit" name="commit" value="Add"><input name="action" type="hidden" value="login"/></p>
        <input type="hidden" name="action" value="add">
      </form>
    </div>
   
  </section>


</body>
</html>
