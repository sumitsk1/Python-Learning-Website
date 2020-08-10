<?php  
function Redirect_to($New_Location){
	header("Location:".$New_Location);
	exit();
}	?>
<?php require_once('DB.php') ?>
<?php require_once('sessions.php') ?>
<?php
function Login_Attempt($UserName,$Password){
	global $ConnectionDB;
	global $Connection;

	$QueryLogin="SELECT * FROM adminuser 
	WHERE username='$UserName'";
	$ExecuteLogin=mysqli_query($Connection,$QueryLogin);


	if($admin=mysqli_fetch_assoc($ExecuteLogin)){
		if(Password_check($Password,$admin['password'])){
			return $admin;
		}
		
	}else{
		return null;
	}
}

function login(){
	if (isset($_SESSION["User_ID"])) {
		return true;
	}
}
function confirm_login(){
	if (!login()) {
		$_SESSION['ErrorMessage']="Login Required";
		Redirect_to("Login.php");
	}
}

function checkUserExists($UserName){
	global $ConnectionDB;
	global $Connection;
	$Query="SELECT * FROM adminuser WHERE username='$UserName' ";
	$Execute = mysqli_query($Connection,$Query);
	if (mysqli_num_rows($Execute)>0){
		return true;
	}
	else{
		return false;
	}

}
function checkEmailExists($Email){
	global $ConnectionDB;
	global $Connection;
	$Query="SELECT * FROM formdata WHERE email='$Email' ";
	$Execute = mysqli_query($Connection,$Query);
	if (mysqli_num_rows($Execute)>0){
		return true;
	}
	else{
		return false;
	}

}
// PAssword encryption 

function Generate_Salt($Length){

		$Unicode_Random_String=md5(uniqid(mt_rand(),true));
		$Base64_String= base64_encode($Unicode_Random_String);

		$Modified_Base64_String=str_replace('+', '.', $Base64_String);

		$Salt=substr($Modified_Base64_String, 0, $Length);

		return $Salt;
	}


function Password_Encryption($Password){
		$BlowFish_Hash="$2y$12$";
		$Salt_length=22;
		$Salt=Generate_Salt($Salt_length);
		$BlowFish_Salt=$BlowFish_Hash.$Salt;
		$HashValue=crypt($Password,$BlowFish_Salt);

		return $HashValue;
		
}

function Password_check($Password, $Existing_Hash){

		$Hash= crypt($Password,$Existing_Hash);
		if ($Hash===$Existing_Hash) {
			return true;
		}
		else{
			return false;
		}
}

function IndexBoxHTML($replImg,$replTitle,$replDes,$replKey){
  	$template = '
		<div class="col-xs-6 col-sm-6">
			<div class="box-wrap">
				<div class="box-img-wrap">
					<img src="css/boxlogo/$Img" alt="Tensorflow-icon">
				</div>
				<div class="box-title-wrap">
					<h3>$Title</h3>
				</div>
				<div class="box-detail-wrap">
					<p>$Des</p>
				</div>
				<div class="box-button-wrap" style="text-align: center;">
					<a href="learnmore.php?key=$Key"><button class="btn btn-primary read-more1 box-btn">print("Read More")</button></a>
				</div>
			</div>
		</div>
   ';
 	return strtr($template, array( '$Img' => $replImg,'$Title' => $replTitle,'$Des' => $replDes,'$Key' => $replKey));
	}


?>


