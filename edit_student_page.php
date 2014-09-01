<?php 
session_start();
if(isset($_SESSION['login_status']) && !empty($_SESSION['login_status'])){
	$user = $_SESSION['login_user'];
}else{
	header("Location: index.php");
	die();
}

$student_id = $_GET['student_id'];
include 'includes/studentClass.php';
$studentObj = new studentClass;
$student_detail = $studentObj->getStudentByID($student_id);
$student_detail = $student_detail[0];

include 'includes/courseClass.php';
$courseObj = new courseClass;
$course_list = $courseObj->getCourseList();
?>
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Edit Student</title>
  <link rel="stylesheet" href="css/style.css">
  	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/script.js"></script>
	<script type="text/javascript" src="assets/jquery.validate.min.js"></script>
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="dashboard">
    	<div class="page-title"><h1>Edit Student</h1></div>
  		<div class="login-detail"><h1><?php echo "Welcome ". $_SESSION['login_user'];?></h1></div>
  		<div class="page-title"></div>
  		<div class="login-detail"><a href="dashboard_page.php"><h3>Student List</h3></a></div> 
      <form method="post" name="edit_form" id="edit_form" action="student_handler.php" enctype="multipart/form-data">
        <p><input type="text" id="fname" name="fname" value="<?php echo $student_detail['fname'];?>" placeholder="First Name"></p>
        <p><input type="text" id="lname" name="lname" value="<?php echo $student_detail['lname'];?>" placeholder="Last Name"></p>
        <p><input type="file" id="photo" name="photo" value="" placeholder="Photo"></p>
        <p><img src="photos/<?php echo $student_detail['photo'];?>"/><img alt="delete record" src="assets/delete.png" style="margin: 5px;"></p>
        <p>
        	<select id="course" name="course">
        		<?php foreach($course_list as $course){?>        
        		<option <?php if($course['course_id']==$student_detail['course_id']){?>selected="selected"<?php }?> value="<?php echo $course['course_id'];?>"><?php echo $course['coursename'];?></option>
        		<?php }?>
        	</select>
        </p>        
        <p class="submit"><input type="submit" name="commit" value="Edit"><input name="action" type="hidden" value="login"/></p>
        <input type="hidden" name="action" value="edit"><input type="hidden" name="student_id" value="<?php echo $student_detail['student_id'];?>">
      </form>
    </div>

   	
  </section>


</body>
</html>
