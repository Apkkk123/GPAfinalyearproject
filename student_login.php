<?php
include("configASL.php");
session_start();
if(isset($_SESSION['sid']))
{
	header("location:feedback_step_2.php");
}
if(!empty($_POST))
{
	$sid=mysqli_real_escape_string($al,$_POST['sid']);
	$pass=mysqli_real_escape_string($al,sha1($_POST['pass']));
	$sql=mysqli_query($al,"select * from student where sid='$sid' and password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
		$_SESSION['sid']=$_POST['sid'];
		header("location:feedback_step_2.php");
	}
	else
	{
		?>
        <script type="text/javascript">
		alert("Incorrect ID or Password");
		</script>
      <?php
	}
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Student Feedback System</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="topHeader">
	GOVERNMENT POLYTECHNIC AMRAVATI<br />
    <span class="tag">STUDENT FEEDBACK SYSTEM</span>
</div>
<br>
<br>
<br>
<br>

<div id="content" align="center">
<br>
<br>
<span class="SubHead">Student Login</span>
<form method="post" action="" >
<div id="table">
	<div class="tr">
		<div class="td">
        	<label>Student ID : </label>
        </div>
        <div class="td">
			<input type="text" name="sid" size="25" required />
        </div>
    </div>
    <div class="tr">
		<div class="td">
        	<label>Password : </label>
        </div>
        <div class="td">
			<input type="password" name="pass" size="25" required />
        </div>
    </div>


	<div class="tr">
                  <div class="td">
                        <label>Semester: </label>
                      </div>
                      <div class="td">
                    <select name="branch" required>
                      <option value="NA" > - - Semester - -</option>
                      <option value="NA" > 1 </option>
                      <option value="NA" > 2 </option>
                      <option value="NA" > 3 </option>
                      <option value="NA" > 4 </option>
                      <option value="NA" > 5 </option>
                      <option value="NA" > 6 </option>
                      
                        <select>
                      </div>
                      
                
                  </div>
</div>
		
<div class="tdd">
        	<input type="button" onClick="window.location='feedback.php'" value="Login" />
        </div>
    <br>
</div>
</form>
<br>


</body>
</html>