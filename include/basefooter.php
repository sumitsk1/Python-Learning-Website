		<div class="row footer-cont" style="background-image: linear-gradient(to right top, #051937, #00263e, #003034, #003720, #2d3b0d);">

			<div class="col-xs-12 col-sm-12" style="margin-top: 30px;">
				<div class="row">
					<div class="col-xs-12 col-sm-4">
						<div class="footer-form footerbox">
							<div><?php echo Message(); echo SuccessMessage();?></div>
							<div class="footer-form-head">
								<h4>SignUp for Post Alert</h4>
							</div>
							<br>
							<form name="SignUp" action="index.php" method="post" onsubmit="return SignUpFieldCheck()">
								<div class='form-group'>
									<!-- <label for="name">Name: </label> -->
									<input class="form-control" id="name" type="text" name="UserName" placeholder="Enter Name">
								</div>
								<div class="form-group">
									<!-- <label for="email">Email: </label> -->
									<input class="form-control" id="email" type="email" name="Email" placeholder="Enter Email">
								</div>
								<div class="form-group">
									<!-- <label for="pass">Password: </label> -->
									<input class="form-control" id="pass" type="password" name="Password" placeholder="Enter Password">
								</div>
								<div class='form-group'>
									<input step="background-color:#FFAD33;" type="submit" class="btn btn-primary btn-block footer-form-sub" value="Submit" name="Submit">
								</div>
							</form>
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="footer-middle footerbox">
							<div class="footer-middle-head">
								<h4>Some Other UseFull Links</h4>
							</div>
							<div class="footer-middle-item">
								<ol class="" style="text-align: center;">
									<li><a target="_blank" href="https://www.tutorialspoint.com/python/index.htm">https://www.tutorialspoint.com/python/index.htm</a></li><br>
									<li><a target="_blank" href="https://www.javatpoint.com/python-tutorial">https://www.javatpoint.com/python-tutorial</a></li><br>
									<li><a target="_blank" href="https://www.learnpython.org/">https://www.learnpython.org/</a></li><br>
									<li><a target="_blank" href="http://www.pythontutor.com/visualize.html#mode=edit">http://www.pythontutor.com/visualize.html#mode=edit</a></li><br>
									<li><a target="_blank" href="https://www.python.org/downloads/">https://www.python.org/downloads/</a></li><br>
								</ol>
							</div>
								
						</div>
					</div>
					<div class="col-xs-12 col-sm-4">
						<div class="footer-right footerbox">
							<div class="footer-right-img">
								<img src="image/about.png" alt="Numpy-icon">
							</div>
							<div class="footer-right-title">
								<h3>About Us</h3>
							</div>
							<div class="footer-right-detail">
								<p>Hi, We are group of Engineering students from India. We have created this Website for those who want to learn Python Programming and for those who know Python Proramming and Want to learn Advance Python Libraries. Have a nice stay here! Thank you</p>
							</div>
						</div>
					</div>
				</div>
				<hr style="opacity: .3">
				<div class="row">
					<div class="col-xs-6 col-sm-4">
						<div class="copy-write">
							<p> Copyright &copy; 2019-20, All Right Reserved </p>
						</div>
						
					</div>
					<div class="col-xs-6 col-sm-4">
						<div class="bottom-icon">
							<ul class="">
								<li><a href="#"><img src="css/social/facebook.png" alt="facebook-icon"></a></li>
								<li><a href="#"><img src="css/social/google-plus.png" alt="google-plux-icon"></a></li>
								<li><a href="#"><img src="css/social/instagram.png" alt="instagram-icon"></a></li>
								<li><a href="#"><img src="css/social/twitter.png" alt="twitter-icon"></a></li>
								<li><a href="#"><img src="css/social/youtube.png" alt="youtube-icon"></a></li>
							</ul>
						</div>
					</div>
					<div class="col-xs-6 col-sm-4 visible-lg">
						
					</div>
				</div>
			</div>

		</div>

	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/file.js"></script>
	<script>
	    AOS.init({
	    	easing: 'ease-out-back',
					duration: 1000
	    });
	</script>