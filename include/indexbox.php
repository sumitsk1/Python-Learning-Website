<?php require_once('DB.php') ?>
<?php require_once('sessions.php') ?>

<?php 
function indexbox($img,$heading,$text){
	return <<< HTML 
			<div class="box-wrap">
				<div class="box-img-wrap">
						<img src="../css/boxlogo/{$img}" alt="Matplotlib-icon">
				</div>
				<div class="box-title-wrap">
					<h3>{$heading}</h3>
				</div>
				<div class="box-detail-wrap">
					<p style="">{$text}</p>
				</div>
				<div class="box-button-wrap" style="text-align: center;">
					<a href="learnmore.php?key=MATPLOTLIB"><button class="btn btn-primary read-more1 box-btn">print("Read More")</button></a>
				</div>
			</div>
	HTML;


}

?>