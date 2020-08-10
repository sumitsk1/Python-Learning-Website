<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php'); ?>
<?php require_once('include/DB.php'); ?>
<?php echo confirm_login(); ?>
<?php 
$user="";
echo confirm_login_others($user);

?>
<?php include("include/basetopadmin.php"); ?>
	<div class="container-fluid">
		<div class="row">
		<?php include("include/adminside.php"); ?>
			
			<!-- col-sm-2 side area ending -->
			<div class="col-xs-12 col-sm-10 adminmiddle">
		<div><?php echo Message(); echo SuccessMessage();?></div><hr>
			 <script>
		    function printPage() {
		      window.print();
		    }
		    </script>
		<form name="SearchForm" action="signups.php" class="navbar-form" onsubmit="return SearchFieldCheck()">
				<div class='form-group'>
					<input class="form-control" type="text" name="Search" placeholder="Search Entries">
				</div>	
			</form>
				<hr>
				<div class="table-responsive">
					<table class="table table-striped table-hover">
						<thead>
							<tr>
								<th>S.NO.</th>
								<th>Name</th>
								<th>Father&apos;s Name</th>
								<th>DOB</th>
								<th>Email</th>
								<th>Phone</th>
								<th>Student Dept</th>
								<th>Roll No.</th>
								<th>College</th>
								<th>City</th>
								<th>Team Name</th>
								<th>Verified</th> 
							</tr>
						</thead>
						<tbody>
						<?php 
						global $ConnectionDB;
						global $Connection;

						if (isset($_GET['Search'])) {
							$search=$_GET['Search'];
							$ViewQuery="SELECT * FROM entries WHERE name LIKE '%$search%' OR fname LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%' OR roll LIKE '%$search%' OR college LIKE '%$search%' OR tname LIKE '%$search%' ORDER BY name ASC";

						}elseif (isset($_GET['Page'])) {
							$Page=$_GET['Page'];
							
							if ($Page==0||$Page<1) {
								$ShowPostFrom=0;
							}else{
								$ShowPostFrom=($Page*25)-25;
							}
							$ViewQuery="SELECT * FROM entries WHERE verified='yes' ORDER BY name ASC LIMIT $ShowPostFrom,25";


						}else{
							$ViewQuery="SELECT * FROM entries WHERE verified='yes' ORDER BY name ASC LIMIT 0,25";
						}

						$SrNo=0;
						$ExecuteQuery=mysqli_query($Connection,$ViewQuery);
						while($DataRows=mysqli_fetch_array($ExecuteQuery)){

							$id=$DataRows['id'];
							$Name=$DataRows['name'];
							$FName=$DataRows['fname'];
							$Dob=$DataRows['dob'];
							$Email=$DataRows['email'];
							$Phone=$DataRows['phone'];
							$Dept=$DataRows['dept'];
							$Roll=$DataRows['roll'];
							$College=$DataRows['college'];
							$city=$DataRows['city'];
							$tname=$DataRows['tname'];
							$verified=$DataRows['verified'];
							$SrNo++;
						 ?>
							<tr>
								<td><?php echo $SrNo; ?></td>
								<td style="" class="titleofname"><?php echo $Name; ?></td>
								<td><?php echo $FName; ?></td>
								<td><?php echo $Dob; ?></td>
								<td><?php echo $Email; ?></td>
								<td><?php echo $Phone; ?></td>
								<td><?php echo $Dept; ?></td>
								<td><?php echo $Roll; ?></td>
								<td><?php echo $College; ?></td>
								<td><?php echo $city; ?></td>
								<td><?php echo $tname; ?></td>
								<td><?php echo $verified; ?></td>
								
								
							</tr>
						<?php } ?>
							
						</tbody>
					</table>
					<?php 
						if (!mysqli_num_rows($ExecuteQuery)>0) {
							echo "<h2 style='text-align: center; color:gray;font-weight:bold;'>No Entries Found</h2>";
						}
					 ?>
				</div>

				<!-- pagination start -->
				<nav class="text-center">
							<ul class="pagination">
					<?php 
							if (@$_GET['Page']>1) {	?>
								<li class=><a href="signups.php?Page=<?php echo @$_GET['Page']-1; ?>">Back</a></li>

					<?php	}

					 ?>
				 	<?php 
								global $ConnectionDB;
								global $Connection;
								$Total_enteries = mysqli_query($Connection,"SELECT * FROM entries WHERE verified='yes'");
								$Total_enteries_count = mysqli_num_rows($Total_enteries);
								$NoPage=$Total_enteries_count/25;
								$NoPage=ceil($NoPage);
								for($i=1;$i<=$NoPage;$i++){
									if ($i==@$_GET['Page']) {	?>
										
								<li class="active"><a href="signups.php?Page=<?php echo $i; ?>"><?php echo $i; ?></a></li>

							<?php	}else{	?>
								
								<li><a href="signups.php?Page=<?php echo $i; ?>"> <?php echo $i; ?></a></li>

						<?php
							}

						} ?>
							<?php 
								if (isset($_GET['Page'])) { 

									 if ($_GET['Page']+1<=$NoPage) { ?>

								<li class=><a href="signups.php?Page=<?php echo @$_GET['Page']+1; ?>">Next</a></li>
						<?php	
								}
								}
							?>
							</ul>

					</nav>
					<br>
				<!-- pagination end -->

			</div>
			<!-- col-sm-10 -->
		</div>
		
		<!-- row ending -->
	</div>
	<!-- container-fluid ending -->
<?php include("include/basefooteradmin.php"); ?>
	<div style="height: 10px; background-color: #27aae1;"></div>
</body>
</html>