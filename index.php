<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php') ?>
<?php require_once('include/DB.php') ?>

<?php 
global $ConnectionDB;
global $Connection;
	if (isset($_POST["Submit"])) {
		$UserName=mysqli_real_escape_string($Connection,$_POST["UserName"]);
		$Email=mysqli_real_escape_string($Connection,$_POST["Email"]);
		$Password=mysqli_real_escape_string($Connection,$_POST["Password"]);
		
		$Password_Hashed=Password_Encryption($Password);// Encrypted password

		date_default_timezone_set("Asia/Kolkata");
		$CurrentTime=time();
		$DateTime=strftime("%d-%m-%Y %H:%M:%S",$CurrentTime);
		if (empty($UserName)||empty($Password)||empty($Email)) {
			$_SESSION['ErrorMessage']="Field Must be Filled";
			Redirect_to("index.php");
		}elseif (strlen($Password)<4) {
			$_SESSION['ErrorMessage']="Atleast 4 characters for Password";
			Redirect_to("index.php");

		}elseif(checkEmailExists($Email)){
			$_SESSION['ErrorMessage']="Email Already in use";
			Redirect_to("index.php");
		}else{
			global $ConnectionDB;
			global $Connection;
			$QueryAdmin="INSERT INTO formdata(datetime,name,email,password)
			VALUES('$DateTime','$UserName','$Email','$Password_Hashed')";
			$ExecuteAdmin=mysqli_query($Connection,$QueryAdmin);
			if ($ExecuteAdmin) {
				$_SESSION['SuccessMessage']="Thanks You";
				Redirect_to("index.php");
			}else{
				$_SESSION['ErrorMessage']="Some Error Occured";
				Redirect_to("index.php");
			}
		}
	}
 ?>
	
	<?php include("include/basetop.php"); ?>
	<div class="container-fluid main-body" style="">
		<div class="row header-row" style="height: 80vh;">
			<div class="col-xs-12 col-sm-7 col-sm-offset-1 header-left">
				<p>Learn <br>
				<span class="text-change"></span>
				<br>With Python </p>
				<a href="Python_Tutorial.php"><button class="btn btn-default read-more1">Read More</button></a>
				<a href="codenow.php" target="_blank"><button class="btn btn-default read-more1">Code Now</button></a>
			</div>
			<div class="col-xs-12 col-sm-4 visible-lg  text-center header-right">
				<img id="head-logo" src="css/head-logo5.png" alt="">
			</div>
			<img src="css/wave.png" alt="" class="header-row-img">
		</div>	
	<!-- start of main white are -->
		<div class="row " style="background: white;">
			<div class="col-xs-12 col-sm-12">
				<div class="row" style="">
					<div class="heading2">Python Programming</div><hr>
					<div class="col-xs-12 col-sm-5 col-sm-offset-1" style="overflow: hidden;">
						<div class="slide-wrap" style="padding: 0;">
							<div id="slidy-container">
								  <figure id="slidy">
								    <img class="slide" src="slider/1.png" alt="" >
								    <img class="slide" src="slider/2.png" alt="" >
								    <img class="slide" src="slider/3.png" alt="" >
								    <img class="slide" src="slider/4.png" alt="" >
								    <img class="slide" src="slider/5.png" alt="" >
								  </figure>
								</div>
							<script src="js/slide.js"></script>
						</div>
					</div>
					<div class="col-xs-12 col-sm-5" style="">
							<img id="intro-video" src="css/videoposter.png" alt="videoposter">
					</div>
				</div>
				<!-- end of slider row -->
				<div class="row" style="">
					<div class="col-xs-12 col-sm-10 col-sm-offset-1">
						<div class="python-text">
						<p >Python is a programming language that lets you work more quickly and integrate your systems more effectively.</p>
						<p>You can learn to use Python and see almost immediate gains in productivity and lower maintenance costs.</p>
						</div>
						<div style="text-align: center;">
							<a href="Python_Tutorial.php"><button class="btn btn-default read-more1">Print("Read More")</button></a>
						</div>
						<br><br>
					</div>
				</div>
				<!-- end of des row -->
			</div>
		</div>
	
	
		<div class="row" style="background: white">   <!-- Top python libraty start -->
			<div class="col-xs-12 col-sm-12">
				<div class="row" style="">
						<div class="heading2">Top Python Libraries</div><hr>
						<div class="col-xs-12 col-sm-6">
							<div class="row">
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("Tensorflow.png","Tensorflow","TensorFlow can be used for Object Detection on images videos. TensorFlow provides an API that helps you do it TensorFlow can be used for Object Detection on images videos. TensorFlow provides an API that helps you do itTensorFlow can be used for Object Detection on images videos.","TENSORFLOW"); ?>
								<!--</div> -->
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("Django.png","Django","Django is a high-level Python Web framework that encourages rapid development and clean, pragmatic design","DJANGO"); ?>
								<!--</div> -->
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="row">
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("Spark.png","Py Spark","Spark based on computational engine, it takes care of the scheduling distributing and monitoring application.","SPARK"); ?>
								<!--</div> -->
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("Scikit.png","Scikit","Scikit provides a range of supervised and unsupervised learning algorithms via consistent interface in Python. Great!","SCIKIT"); ?>
								<!--</div> -->
							</div>
						</div>
					</div>
					<!-- end of row 1 -->
					<div class="row" style="">
						<div class="col-xs-12 col-sm-6">
							<div class="row">
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("OpenCV.png","OpenCV","OpenCV (Open Source Computer Vision) is a library of programming mainly aimed at real-time computer vision.","OPENCV"); ?>
								<!--</div> -->
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("Selenium.png","Selenium","Selenium WebDriver is a browser automation framework that accepts commands and sends them to a browser..","SELENIUM"); ?>
								<!--</div> -->
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="row">
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("Numpy.png","Numpy","NumPy is array-processing package. It provides a high-performance multidimensional array and tools to opearte on it.","NUMPY"); ?>
								<!--</div> -->
								<!-- <div class="col-xs-6 col-sm-6">-->
								<?php echo IndexBoxHTML("Matplotlib.png","Matplotlib","Matplotlib is a plotting library for the Python programming language and its numerical mathematics extension NumPy.","MATPLOTLIB"); ?>
								<!--</div> -->
							</div>
							<br><br>
						</div>
					</div>
					<!-- end of row2 -->
			</div>
		</div>
		<!-- Top python libraty end -->
		<!-- footer start -->
		<?php include("include/basefooter.php"); ?>
		<!-- end of the footer -->
		<!-- end of main white area -->
	</div>
	<!--end of container  -->
	<script>
	$(document).ready(function() {
	//Preloader
	$(window).on("load", function() {
	preloaderFadeOutTime = 500;
	function hidePreloader() {
	var preloader = $('.spinner-wrapper');
	preloader.fadeOut(preloaderFadeOutTime);
	}
	hidePreloader();
	});
	});
	</script>
</body>
</html> 