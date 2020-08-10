<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php') ?>
<?php require_once('include/DB.php') ?>
<?php echo confirm_login(); ?>
<?php 
global $ConnectionDB;
global $Connection;
	if (isset($_POST["Submit"])) {
		$ImageTitle=mysqli_real_escape_string($Connection,$_POST["ImageTitle"]);
		date_default_timezone_set("Asia/Kolkata");
		$CurrentTime=time();
		$DateTime=strftime("%d-%m-%Y %H:%M:%S",$CurrentTime);

		$Image=$_FILES['ImageI']['name'];
		$Target="uploads/".basename($Image);
		
		if (empty($ImageTitle) || empty($Image)) {
			$_SESSION['ErrorMessage']="Image Title & Picture Can't be Empty";
			Redirect_to("uploadpic.php");
		}elseif (strlen($ImageTitle)<3) {
			$_SESSION['ErrorMessage']="Image Title Can't be less than 4 character";
			Redirect_to("uploadpic.php");
		}else{
			global $ConnectionDB;
			global $Connection;
			$QueryAdmin_panel="INSERT INTO uploadpic(datetime,imagetitle,image) 
			VALUES('$DateTime','$ImageTitle','$Image')";
			$ExecuteAdmin_panel=mysqli_query($Connection,$QueryAdmin_panel);
			move_uploaded_file($_FILES['ImageI']['tmp_name'], $Target);
			if ($ExecuteAdmin_panel) {
				$_SESSION['SuccessMessage']="Pic Uploaded Successfully";
				Redirect_to("uploadpic.php");
			}else{
				$_SESSION['ErrorMessage']="Failed to Upload Pic";
				Redirect_to("uploadpic.php");
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
							global $ConnectionDB;
							global $Connection;
							$QueryTotalPost="SELECT COUNT(*) FROM learnmore_data";
							$ExecuteTotalPost=mysqli_query($Connection,$QueryTotalPost);
							$DataRowsPost=mysqli_fetch_array($ExecuteTotalPost);
							$TotalPost=array_shift($DataRowsPost);
						?>
						<span class="label label-primary pull-right"><?php //echo $TotalEvent; ?></span>
					</a></li>
					<li><a href="addlearnmore.php">&nbsp;&nbsp;ADD Post</a></li>
					<li class="active"><a href="uploadpic.php">&nbsp;&nbsp;Upload Pic</a></li>
					<li><a href="manage_admin_users.php">&nbsp;&nbsp;Manage Admins</a></li>
					<li><a href="Logout.php">&nbsp;&nbsp;LogOut</a></li>
				</ul>

			</div>
			<!-- col-sm-2 side area ending -->
			<div class="col-sm-10 adminmiddle">
				<br>
				<h1>Add New Picture</h1><hr>
				<div><?php echo Message(); echo SuccessMessage();?></div><hr>
				<div>
				<form action="addlearnmore.php" method="post" enctype="multipart/form-data">
						<div class='form-group'>
							<label for='title' ><span class="catName">Image Title:</span></label>
							<input class="form-control" type="text" name="ImageTitle" id='title' placeholder="Image Title">
							<small class="form-text text-muted">Title Can't be less than 4 character</small><span></span>
						</div>
						<div class='form-group'>
							<label for='imageselect' ><span class="catName">Select Image:</span></label>
							<input class="form-control" type="file" name="ImageI" id='imageselect'>
						</div>
						<div class='form-group'>
							<input class="btn btn-success btn-block" type="submit" name="Submit" value="Upload" formaction="">
							<br>
						</div>
				</form>
				</div>
				<br>
				<hr>
				<div class="uploadedPic">
					<?php 
					global $ConnectionDB;
					global $Connection;
					$ViewQuery="SELECT * FROM uploadpic ORDER BY id desc";
					$SrNo=0;
					$ExecuteQuery=mysqli_query($Connection,$ViewQuery);
					while($DataRows=mysqli_fetch_array($ExecuteQuery)){

						$id=$DataRows['id'];
						$Date_Time=$DataRows['datetime'];
						$Title=$DataRows['imagetitle'];
						$Image=$DataRows['image'];
						$SrNo++;
					 ?>
					
						<img class="uploadedPicImg" src="uploads/<?php echo $Image; ?>" alt="">

					<?php } ?>
					<br><br>
					<hr>
				</div>
			</div>
			<!-- col-sm-10 -->
		</div>
		<br><br><br><br><br>
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