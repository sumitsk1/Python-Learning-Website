<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php') ?>
<?php require_once('include/DB.php') ?>

	<?php include("include/basetop.php"); ?>
	<br><br>
	<link rel="stylesheet" href="css/readmore.css">
	<div class="container-fluid main-body" style="">
		<div class="row" style="background:white; height: auto">
			
			<div class="col-xs-12 col-sm-8 col-sm-push-2" style="border-right: 1px solid black;border-left: 1px solid black;">
				<div class="readmore-middle">
					<div class="white-bar"><h2 style="text-align: center;padding: 7px;">Python Tutorial</h2></div>
					<iframe id="ifres"  seamless="seamless" src="https://www.learnpython.org/" frameborder="0" marginwidth="0" marginheight="0" allowfullscreen></iframe>
					<div class="white-bar-bottom"></div>
				</div>
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