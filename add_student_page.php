<?php session_start();?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Add Student</title>
  <link rel="stylesheet" href="css/style.css">
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/script.js"></script>
	<script type="text/javascript" src="assets/jquery.validate.min.js"></script>
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="dashboard">
    	<div class="page-title"><h1>Add Student</h1></div>
  		<div class="login-detail"><h1><?php echo "Welcome ". $_SESSION['login_user'];?></h1></div>
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

   	<div class="login-help">
      	<!-- <p>Forgot your password? <a href="index.html">Forgot Password</a></p> -->
       	<p>Not Registered? <a href="registration.php">Register</a></p>
    </div>
  </section>


</body>
</html>
