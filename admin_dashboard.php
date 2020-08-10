<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php'); ?>
<?php require_once('include/DB.php'); ?>
<?php echo confirm_login(); ?>

<?php include("include/admintop.php"); ?>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-2 adminside">
				<h2 style="color: white; margin-top: 10px;">Admin Panel</h2><hr>
				<ul id="sidemenu" class="nav nav-pills nav-stacked">
					<li class="active"><a href="admin_dashboard.php">&nbsp;&nbsp;Dashboard
						<?php 
							global $ConnectionDB;
							global $Connection;
							$QueryTotalPost="SELECT COUNT(*) FROM learnmore_data";
							$ExecuteTotalPost=mysqli_query($Connection,$QueryTotalPost);
							$DataRowsPost=mysqli_fetch_array($ExecuteTotalPost);
							$TotalPost=array_shift($DataRowsPost);
						?>
						<span class="label label-primary pull-right"><?php echo $TotalPost; ?></span>
					</a></li>
					<li ><a href="addlearnmore.php">&nbsp;&nbsp;ADD Post</a></li>
					<li><a href="uploadpic.php">&nbsp;&nbsp;Upload Pic</a></li>
					<li ><a href="manage_admin_users.php">&nbsp;&nbsp;Manage Admins</a></li>
					<li><a href="Logout.php">&nbsp;&nbsp;LogOut</a></li>
				</ul>

			</div>
			<!-- col-sm-2 side area ending -->
			<div class="col-sm-10 adminmiddle">
				<br>
				<h1>Admin Dashboard / Manage LearnMore Data</h1><hr>
				<div><?php echo Message(); echo SuccessMessage();?></div><hr>
				
		<div class="table-responsive">
		<table class="table table-striped table-hover">
			<h2>Events Details</h2><hr>
				<thead>
					<tr>
						<th >No.</th>
						<th>Date & Time</th>
						<th>Post Title</th>
						<th>Post Detail</th>
						<th>Post Key</th>
						<th>Edit</th>
						<th>Delete</th>
						<th>Details</th>
					</tr>
				</thead>
				<tbody>
				<?php 
				global $ConnectionDB;
				global $Connection;
				$ViewQuery="SELECT * FROM learnmore_data ORDER BY id desc";
				$SrNo=0;
				$ExecuteQuery=mysqli_query($Connection,$ViewQuery);
				while($DataRows=mysqli_fetch_array($ExecuteQuery)){

					$id=$DataRows['id'];
					$Date_Time=$DataRows['datetime'];
					$Title=$DataRows['title'];
					$Post=$DataRows['postname'];
					$Post_Key=$DataRows['keyss'];
					$SrNo++;
				 ?>
					<tr>
						<td><?php echo $SrNo; ?></td>
						<td><?php
							 if (strlen($Date_Time)>15) { $Date_Time=substr($Date_Time, 0,15)."...";}  
							 echo $Date_Time; ?></td>
						<td style="" class="titleofname"><?php echo $Title; ?></td>
						<td><?php 
							if (strlen($Post)>100) { $Post=substr($Post, 50,100)."...";}  
							echo $Post; ?></td>
						<td><?php echo $Post_Key; ?></td>
						<td><a href="Editaddlearnmore.php?Edit=<?php echo $id; ?>"><button class="btn btn-info">Edit</button></a></td>
						<td><a href="Delete.php?DeletePost=<?php echo $id; ?>"><button class="btn btn-danger">Delete</button></a></td>
						
						<td><a target="_blank" href="learnmore.php?Id=<?php echo $id; ?>" ><button class="btn btn-primary">Live Preview</button></a></td>
						
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