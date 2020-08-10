<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="expires" content="Mon, 26 Jul 1997 05:00:00 GMT"/> <meta http-equiv="pragma" content="no-cache" />
	<title>Welcome To Learn With Python</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Mali&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/pstyle.css">
				
</head>
<body>	
	<div class="spinner-wrapper">
		<div class="spinner">
			<div class="rect1"></div>
		    <div class="rect2"></div>
		    <div class="rect3"></div>
		    <div class="rect4"></div>
		    <div class="rect5"></div>
		</div>
	</div>
		<!-- <div class="pointer"></div> -->
		<div class="headParticles" id=particles-js></div>
	    <script src="js/particles.js"></script>
	    <script src="js/app.js"></script>
	<!-- <video autoplay muted loop id="headVideo">
				  <source src="css/back2.mp4" type="video/mp4">
				  Your browser does not support HTML5 video.
		</video> -->
	<nav class="navbar navbar-inverse" role="navigation">

		<div class="nav-container container-fluid">
			<div class="row" style="">
				<div class="col-xs-12 col-sm-4">
					<div class="navbar-header">
						<button style="background-color: transparent;" type="button" class="navbar-toggle header-btn" callapsed data-toggle='collapse' data-target='#collapse'>
							<span class="sr-only">Toggle Navigation</span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a href="index.php" class="navbar-brand">
							<img style="" src="css/python-logo.png" alt="python-logo">
						</a>
					</div>
				</div>
				<div class="col-sm-4 visible-lg">
					<div class="bottom-icon" style="margin-top: 20px;">
						<ul class="">
							<li><a href="#"><img src="css/social/facebook.png" alt="facebook-icon"></a></li>
							<li><a href="#"><img src="css/social/google-plus.png" alt="google-plux-icon"></a></li>
							<li><a href="#"><img src="css/social/instagram.png" alt="instagram-icon"></a></li>
							<li><a href="#"><img src="css/social/twitter.png" alt="twitter-icon"></a></li>
							<li><a href="#"><img src="css/social/youtube.png" alt="youtube-icon"></a></li>
						</ul>
					</div>
				</div>
				<div class="col-xs-12 col-sm-4">
					<form name="SearchForm" action="learnmore.php" class="navbar-form navbar-right" onsubmit="return SearchFieldCheck()">
						<div class='form-group'>
							<input class="form-control" type="text" name="Search" placeholder="Search">
						</div>
						<div class='form-group'>
							<button class="btn btn-default" style="" name="SearchButton"><i class="fa fa-search" aria-hidden="true"></i>
							
						</div>
					</form>
				</div>
			</div>
			<div class="collapse navbar-collapse" id='collapse'>
				<ul class="nav navbar-nav">
					<li ><a href="index.php"><span class="color-me">Home</span></a></li>
					<li><a href="Python_Tutorial.php"><span class="color-me ">Learn Python</span></a></li>
						<li class="dropdown">
					        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="color-me">Learn With Python</span> <b class="caret"></b></a>
					        <ul class="dropdown-menu" style="background:#00000061; box-shadow: 0 0 5px black;">
								<li><a href="learnmore.php?key=WEB"><span class="color-me ">Web Development</span></a></li>
								<li><a href="learnmore.php?key=ML"><span class="color-me ">Machine Learning</span></a></li>
								<li><a href="learnmore.php?key=AI"><span class="color-me ">Artificial Intelligence</span></a></li>
								<li><a href="learnmore.php?key=DS"><span class="color-me ">Data Science</span></a></li>
								<li><a href="learnmore.php?key=AUTOMATION"><span class="color-me ">Automation</span></a></li>
								<li><a href="learnmore.php?key=ROBOTICS"><span class="color-me ">Robotics</span></a></li>
					        </ul>
					    </li>
					<li ><a href="about.php"><span class="color-me">About</span></a></li>
					
				</ul>
			<!-- Search Form -->
			</div>

		</div>
	</nav>