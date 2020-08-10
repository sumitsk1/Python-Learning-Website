<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php') ?>
<?php require_once('include/DB.php') ?>

	<?php include("include/basetop.php"); ?>
	<link rel="stylesheet" href="css/readmore.css">
	<br><br>
	<div class="container-fluid main-body" style="">
		<div class="row" style="background:white; height: auto">

			<div class="col-xs-12 col-sm-8 col-sm-push-2" style="border-right: 1px solid black;border-left: 1px solid black;">
				<div class="readmore-middle learnmore-middle">
				<?php
					global $ConnectionDB;
					global $Connection;
					$NotFound="Search Not Found";
					$EventidGet=@$_GET['Id'];
					if (isset($_GET['SearchButton'])) {
						$search=$_GET['Search'];
						$ViewQuery="SELECT * FROM learnmore_data WHERE datetime LIKE '%$search%' OR title LIKE '%$search%' OR postname LIKE '%$search%' OR keyss LIKE '%$search%' ";
						
					}elseif (isset($EventidGet)) {
						$EventidGet=@$_GET['Id'];
						$ViewQuery="SELECT * FROM learnmore_data WHERE id='$EventidGet' ORDER BY id Desc";
						
					}else{
						$EventidGet=@$_GET['key'];
						$ViewQuery="SELECT * FROM learnmore_data WHERE keyss='$EventidGet' ";
					}
					$ExecuteQuery=mysqli_query($Connection,$ViewQuery);
					while($DataRows=mysqli_fetch_array($ExecuteQuery)){

					$Eventid=$DataRows['id'];
					$DateTime=$DataRows['datetime'];
					$Title=$DataRows['title'];
					$Post=$DataRows['postname'];
					$Key=$DataRows['keyss'];
					$NotFound=''
			?>

					<div class="learnmore-heading"><h2><?php echo htmlentities($Title); ?></h2></div><hr>
					<div class="learnmore-main-body">
						<?php echo nl2br($Post); ?>
					</div>
					<div class="datekey">
						<p>Date Time: <?php echo nl2br($DateTime); ?></p>
						<p>Tag: <?php echo nl2br($Key); ?></p>
					</div>

					 <?php } ?>
					 <div class="learnmore-heading"><h2><?php echo htmlentities($NotFound); ?></h2></div>
				</div>
				<hr><br><br>
			</div>

			<div class="col-xs-12 col-sm-2 col-sm-pull-8" style="">
				<div class="readmore-left">
					<p>Category</p><hr>
					<ul class="nav readmore-left-nav">
						<li ><a href="Python_Tutorial.php"><span class="color-me ">Python</span></a></li>
						<li><a href="learnmore.php?key=WEB"><span class="color-me ">Web Development</span></a></li>
						<li><a href="learnmore.php?key=ML"><span class="color-me ">Machine Learning</span></a></li>
						<li><a href="learnmore.php?key=AI"><span class="color-me ">Artificial Intelligence</span></a></li>
						<li><a href="learnmore.php?key=DS"><span class="color-me ">Data Science</span></a></li>
						<li><a href="learnmore.php?key=AUTOMATION"><span class="color-me ">Automation</span></a></li>
						<li><a href="learnmore.php?key=ROBOTICS"><span class="color-me ">Robotics</span></a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-xs-12 col-sm-2" style="">
				<div class="readmore-right">
					<p>Python Libraries</p><hr>
					<ul class="nav readmore-right-nav">
						<li ><a href="learnmore.php?key=TENSORFLOW"><span class="color-me ">Tensorflow</span></a></li>
						<li><a href="learnmore.php?key=DJANGO"><span class="color-me ">Django</span></a></li>
						<li><a href="learnmore.php?key=SPARK"><span class="color-me ">Py Spark</span></a></li>
						<li><a href="learnmore.php?key=SCIKIT"><span class="color-me ">SciKit</span></a></li>
						<li><a href="learnmore.php?key=OPENCV"><span class="color-me ">OpenCV</span></a></li>
						<li><a href="learnmore.php?key=SELENIUM"><span class="color-me ">Selenium</span></a></li>
						<li><a href="learnmore.php?key=NUMPY"><span class="color-me ">NumPy</span></a></li>
						<li><a href="learnmore.php?key=MATPLOTLIB"><span class="color-me ">Matplotlib</span></a></li>
					</ul>
				</div>	
			</div>
		</div>
		<!-- footer start -->
		<?php include("include/basefooter.php"); ?>
		<!-- end of the footer -->
	</div>
<!--end of container  -->	
	<script src="js/file.js"></script>
</body>
</html> 