<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php') ?>
<?php require_once('include/DB.php') ?>
<?php 
global $ConnectionDB;
global $Connection;
	if (isset($_POST["Submit"])) {
		$UserName=mysqli_real_escape_string($Connection,$_POST["UserName"]);
		$Password=mysqli_real_escape_string($Connection,$_POST["Password"]);
	
		if (empty($UserName)||empty($Password)) {
			$_SESSION['ErrorMessage']="All Field Must be Filled";
		}else{
			$Account_Found=Login_Attempt($UserName,$Password);
			$_SESSION["User_ID"]=$Account_Found['id'];
			$_SESSION["UserName"]=$Account_Found['username'];
			if ($Account_Found) {
				$_SESSION['SuccessMessage']="Login Successful , Welcome {$_SESSION["UserName"]}";
				Redirect_to("admin_dashboard.php");
			}else{
				$_SESSION['ErrorMessage']="Invalid Email And Password";
			}

		}
	}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta charset="UTF-8">
	<link rel='icon' href='favicon.ico' type='image/x-icon'/ >
	<title>Admin Login</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	<link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/adminstyle.css">
	<style>
		
	</style>
</head>
<body>
	<div style="height: 10px; background-color: #27aae1;"></div>
	<div style="height: 10px; background-color: #27aae1;"></div>
	<div class="container-fluid">
		<div class="row">
			<br><br><br>
			<div class="col-sm-offset-4 col-sm-4 loginpage">
				<br>
				<div><?php echo Message(); echo SuccessMessage();?></div>
				<h1>Admin Login !</h1><hr>
				<form action="Login.php" method="post">
						<div class='form-group'>
							<label for='username' ><span class="catName">User Name:</span></label>
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-user text-primary"></span>
								</span>
								<input class="form-control" type="text" name="UserName" id='username' placeholder="User Name"><span></span>
							</div>
						</div>
						<div class='form-group'>
							<label for='password' ><span class="catName">Password:</span></label>
							<div class="input-group">
								<span class="input-group-addon">
									<span class="glyphicon glyphicon-lock text-primary"></span>
								</span>
								<input class="form-control" type="password" name="Password" id='password' placeholder="Password"><span>
							</div>
							</span>
						</div>
						<div class='form-group'>
							<input class="btn btn-primary" type="submit" name="Submit" value="Login" formaction="">
							<br>
						</div>
				</form>
				<br>
				
			</div>
			<!-- col-sm-10 -->
		</div>
		<!-- row ending -->
	</div>
	<!-- container-fluid ending -->
	<br><br><br><br><br>
	<div id="footer">
		<ul class="nav">
				<li><a href="index.php" target="_blank"><span class="">Home Index Page</span></a></li>
			</ul>
			<hr>
		<a href="https://www.mycode.tk/" target="_blank">Blog Web</a><br><br>
		<p >Copyright &copy; 2019-2020 All rights reserved.</p>
	</div>
	<div style="height: 10px; background-color: #27aae1;"></div>

</body>
</html>