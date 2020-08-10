<?php require_once('include/functions.php') ?>
<?php require_once('include/DB.php') ?>
<?php require_once('include/sessions.php') ?>
<?php echo confirm_login(); ?>
<?php 
global $ConnectionDB;
global $Connection;
	if (isset($_POST["Submit"])) {
		$UserName=mysqli_real_escape_string($Connection,$_POST["UserName"]);
		$Password=mysqli_real_escape_string($Connection,$_POST["Password"]);
		$ConfirmPassword=mysqli_real_escape_string($Connection,$_POST["ConfirmPassword"]);

		$Password_Hashed=Password_Encryption($Password);// Encrypted password

		date_default_timezone_set("Asia/Kolkata");
		$CurrentTime=time();
		$DateTime=strftime("%d-%m-%Y %H:%M:%S",$CurrentTime);
		if (empty($UserName)||empty($Password)||empty($ConfirmPassword)) {
			$_SESSION['ErrorMessage']="Field Must be Filled";
			Redirect_to("manage_admin_users.php");
		}elseif (strlen($Password)<4) {
			$_SESSION['ErrorMessage']="Atleast 4 characters for Password";
			Redirect_to("manage_admin_users.php");

		}elseif ($Password!==$ConfirmPassword) {
			$_SESSION['ErrorMessage']="Password Does Not Matched";
			Redirect_to("manage_admin_users.php");
		}elseif(checkUserExists($UserName)){
			$_SESSION['ErrorMessage']="UserName Already in use";
			Redirect_to("manage_admin_users.php");
		}else{
			global $ConnectionDB;
			global $Connection;
			$QueryAdmin="INSERT INTO adminuser(datetime,username,password)
			VALUES('$DateTime','$UserName','$Password_Hashed')";
			$ExecuteAdmin=mysqli_query($Connection,$QueryAdmin);
			if ($ExecuteAdmin) {
				$_SESSION['SuccessMessage']="New Admin Added Successfully";
				Redirect_to("manage_admin_users.php");
			}else{
				$_SESSION['ErrorMessage']="Failed to Add New Admin";
				Redirect_to("manage_admin_users.php");
			}
			

		}
	}
 ?>
	<?php include("include/admintop.php"); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 adminside">
				<h2 style="color: white; margin-top: 10px;">Admin Panel</h2><hr>
				<ul id="sidemenu" class="nav nav-pills nav-stacked">
					<li ><a href="admin_dashboard.php">&nbsp;&nbsp;Dashboard
						<?php 
							// global $ConnectionDB;
							// global $Connection;
							// $QueryTotalEvent="SELECT COUNT(*) FROM admin_panel";
							// $ExecuteTotalEvent=mysqli_query($Connection,$QueryTotalEvent);
							// $DataRowsEvent=mysqli_fetch_array($ExecuteTotalEvent);
							// $TotalEvent=array_shift($DataRowsEvent);
						?>
						<span class="label label-primary pull-right"><?php //echo $TotalEvent; ?></span>
					</a></li>
					<li ><a href="addlearnmore.php">&nbsp;&nbsp;ADD Post</a></li>
					<li><a href="uploadpic.php">&nbsp;&nbsp;Upload Pic</a></li>
					<li class="active"><a href="manage_admin_users.php">&nbsp;&nbsp;Manage Admins</a></li>
					<li><a href="Logout.php">&nbsp;&nbsp;LogOut</a></li>
				</ul>

			</div>
			<!-- col-sm-2 side area ending -->
			<div class="col-sm-10 adminmiddle">
				<br>
				<h1>Manage Admin Access and Form Data</h1><hr>
				<div><?php echo Message(); echo SuccessMessage();?></div><hr>
				<form action="manage_admin_users.php" method="post">
						<div class='form-group'>
							<label for='username' ><span class="catName">User Name:</span></label>
							<input class="form-control" type="text" name="UserName" id='username' placeholder="User Name"><span></span>
						</div>
						<div class='form-group'>
							<label for='password' ><span class="catName">Password:</span></label>
							<input class="form-control" type="password" name="Password" id='password' placeholder="Password">
							<small class="form-text text-muted">Atleast 4 Character For password</small><span></span>
						</div>
						<div class='form-group'>
							<label for='confirmpassword' ><span class="catName">Confirm Password:</span></label>
							<input class="form-control" type="password" name="ConfirmPassword" id='confirmpassword' placeholder="Enter Password Again"><span></span>
						</div>
						<div class='form-group'>
							<input class="btn btn-success btn-block" type="submit" name="Submit" value="Add New Admin" formaction="">
							<br>
						</div>
				</form>
<div class="table-responsive">
	<table class="table table-striped table-hover">
		<h2>Admin User</h2><hr>
			<thead>
				<tr>
					<th >S No.</th>
					<th>Date & Time</th>
					<th>Admin Name</th>
					<th>Delete</th>
					<!-- <th>Update</th> -->
					
				</tr>
			</thead>
			<tbody>
			<?php 
			global $ConnectionDB;
			global $Connection;
			$ViewQueryAdmin="SELECT * FROM adminuser ORDER BY id Desc";
			$SrNo=0;
			$ExecuteQueryAdmin=mysqli_query($Connection,$ViewQueryAdmin);
			while($DataRows=mysqli_fetch_array($ExecuteQueryAdmin)){

				$AdminId=$DataRows['id'];
				$Date_Time_Admin=$DataRows['datetime'];
				$UserNameAdmin=$DataRows['username'];
				$SrNo++;
			 ?>
				<tr>
					<td><?php echo $SrNo; ?></td>
					<td><?php echo $Date_Time_Admin; ?></td>
					<td><?php echo $UserNameAdmin; ?></td>
					<td><a href="Delete.php?DeleteAdmin=<?php echo $AdminId; ?>"><button class="btn btn-danger">Delete</button></a></td>
					
				</tr>
			<?php } ?>
				
			</tbody>
			
		</table>
	</div>
	<div class="table-responsive">
	<table class="table table-striped table-hover">
		<h2>Form SignUp User</h2><hr>
			<thead>
				<tr>
					<th >S No.</th>
					<th>Date & Time</th>
					<th>User Name</th>
					<th>Email</th>
					<th>Delete</th>
					<!-- <th>Update</th> -->
					
				</tr>
			</thead>
			<tbody>
			<?php 
			global $ConnectionDB;
			global $Connection;
			$ViewQueryAdmin="SELECT * FROM formdata ORDER BY datetime Desc";
			$SrNo=0;
			$ExecuteQueryAdmin=mysqli_query($Connection,$ViewQueryAdmin);
			while($DataRows=mysqli_fetch_array($ExecuteQueryAdmin)){

				$UserId=$DataRows['id'];
				$Date_Time_Admin=$DataRows['datetime'];
				$UserNameAdmin=$DataRows['name'];
				$Email=$DataRows['email'];
				$SrNo++;
			 ?>
				<tr>
					<td><?php echo $SrNo; ?></td>
					<td><?php echo $Date_Time_Admin; ?></td>
					<td><?php echo $UserNameAdmin; ?></td>
					<td><?php echo $Email; ?></td>
					<td><a href="Delete.php?DeleteUser=<?php echo $UserId; ?>"><button class="btn btn-danger">Delete</button></a></td>
					
				</tr>
			<?php } ?>
				
			</tbody>
			
		</table>
	</div>
				
			</div>
			<!-- col-sm-10 -->
		</div>
		<!-- row ending -->
	</div>
	<!-- container-fluid ending -->
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