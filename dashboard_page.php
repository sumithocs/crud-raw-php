<?php
session_start();
if(isset($_SESSION['login_status']) && !empty($_SESSION['login_status'])){
	$user = $_SESSION['login_user'];
}else{
	header("Location: index.php");
	die();
}

include_once 'includes/studentClass.php';
$student = new studentClass;
$student_list = $student->getStudentList();
//var_dump($student_list);
?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>Dashboard</title>
  <link rel="stylesheet" href="css/style.css">
  <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
  <section class="container">
    <div class="dashboard">
    <div class="page-title"><h1>Dashboard</h1></div>
  		<div class="login-detail"><h1><?php echo "Welcome ". $_SESSION['login_user'];?></h1></div>
  		<div class="page-title"><h3>Student List</h3></div>
  		<div class="login-detail"><a href="add_student_page.php"><h3>Add New</h3></a></div> 
  		<div><p style="color: red;"><?php if(isset($_SESSION['msg'])){echo $_SESSION['msg'];unset($_SESSION['msg']);}?></p></div>
    	  
  			<div class="wrap">
  				<div class="column-header">Photo</div>
  				<div class="column-header">Name</div>
  				<div class="column-header">Course</div>
  				<div class="column-header">Opertions</div>
  			
  				
  				<?php 
  					foreach($student_list as $index=>$student)
					{
						$style = "odd";
						if(($index+1)%2 == 0){$style = "even";}						
  				?>		
  				
  					<div class="column-<?php echo $style;?>"><img alt="student photo" src="photos/<?php echo $student['photo'];?>" width="100"></div>
  					<div class="column-<?php echo $style;?>"><?php echo $student['fname'];?> <?php echo $student['lname'];?></div>
  					<div class="column-<?php echo $style;?>"><?php echo $student['coursename'];?></div>
  					<div class="column-<?php echo $style;?>">
  					<a href="edit_student_page.php?student_id=<?php echo $student['student_id'];?>"><img alt="edit record" src="assets/edit.png" style="margin: 5px;"></a>
  					<a href="student_handler.php?action=delete&student_id=<?php echo $student['student_id'];?>"><img alt="delete record" src="assets/delete.png" style="margin: 5px;"></a>
  					<img alt="view record" src="assets/view.png" style="margin: 5px;">
  					</div>
  				
  				<?php }?>
  			</div>
  		
  		     
    </div>

   	
  </section>


</body>
</html>