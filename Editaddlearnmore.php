<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php') ?>
<?php require_once('include/DB.php') ?>
<?php echo confirm_login(); ?>
<?php 
global $ConnectionDB;
global $Connection;
$Edit_id=$_GET['Edit'];

	if (isset($_POST["Submit"])) {
		$Title=mysqli_real_escape_string($Connection,$_POST["Title"]);
		$Post=mysqli_real_escape_string($Connection,$_POST["Posts"]);
		$Key=mysqli_real_escape_string($Connection,$_POST["Key_val"]);

		date_default_timezone_set("Asia/Kolkata");
		$CurrentTime=time();
		$DateTime=strftime("%d-%m-%Y %H:%M:%S",$CurrentTime);
		if (empty($Title) || empty($Post)|| empty($Post)) {
			$_SESSION['ErrorMessage']="Title , Key_val & Post Details Can't be Empty";
			Redirect_to("admin_dashboard.php");
		}elseif (strlen($Title)<3) {
			$_SESSION['ErrorMessage']="Title Can't be less than 4 character";
			Redirect_to("admin_dashboard.php");
		}elseif (strlen($Post)<19) {
			$_SESSION['ErrorMessage']="Post Detail Can't be less than 20 character";
			Redirect_to("admin_dashboard.php");
		}else{
			global $ConnectionDB;
			global $Connection;

			$Query_update="UPDATE learnmore_data SET datetime='$DateTime',title='$Title',postname='$Post',keyss='$Key' WHERE id='$Edit_id'";
			$ExecuteAdmin_panel=mysqli_query($Connection,$Query_update);
			move_uploaded_file($_FILES['ImageI']['tmp_name'], $Target);
			if ($ExecuteAdmin_panel) {
				$_SESSION['SuccessMessage']="Post Updated Successfully";
				Redirect_to("admin_dashboard.php");
			}else{
				$_SESSION['ErrorMessage']="Failed to Update Post";
				Redirect_to("admin_dashboard.php");
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
					<li><a href="uploadpic.php">&nbsp;&nbsp;Upload Pic</a></li>
					<li><a href="manage_admin_users.php">&nbsp;&nbsp;Manage Admins</a></li>
					<li><a href="Logout.php">&nbsp;&nbsp;LogOut</a></li>
				</ul>

			</div>
			<!-- col-sm-2 side area ending -->
			<div class="col-sm-10 adminmiddle">
				<br>
				<h1>Edit Post</h1><hr>
				<?php 
					global $ConnectionDB;
					global $Connection;

					$Edit_id=$_GET['Edit'];
					$EditQuery="SELECT * FROM learnmore_data WHERE id='$Edit_id'";
					$Run_Query=mysqli_query($Connection,$EditQuery);
					$ExecuteQuery=mysqli_fetch_array($Run_Query);
						$Edit_id=$ExecuteQuery['id'];
						$Edit_Date_Time=$ExecuteQuery['datetime'];
						$Edit_Title=$ExecuteQuery['title'];
						$Edit_post=$ExecuteQuery['postname'];
						$Edit_key=$ExecuteQuery['keyss'];

				?>
				<div><?php echo Message(); echo SuccessMessage();?></div><hr>
				<div>
				<form action="addlearnmore.php" method="post" enctype="multipart/form-data">
						<div class='form-group'>
							<label for='title' ><span class="catName">Title:</span></label>
							<input class="form-control" type="text" name="Title" id='title' value='<?php echo $Edit_Title; ?>' placeholder="Title">
							<small class="form-text text-muted">Title Can't be less than 4 character</small><span></span>
						</div>
						<div class='form-group'>
							<label for='Key' ><span class="catName">Key:</span></label>
							<input class="form-control" type="text" name="Key_val" id='Key' value='<?php echo $Edit_key; ?>' placeholder="Key Type">
							<small class="form-text text-muted">Key Can't be less than 2 character</small><span></span>
						</div>
						<div class='form-group'>
							<label for='' ><span class="catName">Post Detail:</span></label><br>
							<small class="form-text text-muted">Post Detail Can't be less than 20 character</small>
							
							<textarea rows="20" class="form-control"  name="Posts" id='fieldname'  placeholder="Post"><?php echo $Edit_post; ?></textarea>
							<script>
								CKEDITOR.replace( 'fieldname' );
							</script>
						</div>
						<div class='form-group'>
							<input class="btn btn-success btn-block" type="submit" name="Submit" value="Update Post" formaction="">
							<br>
						</div>
				</form>
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