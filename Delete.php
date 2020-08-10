<?php require_once('include/functions.php') ?>
<?php require_once('include/sessions.php') ?>
<?php require_once('include/DB.php') ?>
<?php 
global $ConnectionDB;
global $Connection;
if ($delete_id=$_GET['DeleteDept']) {
	$delete_id=$_GET['DeleteDept'];
	$delete_query="DELETE FROM dept WHERE id='$delete_id'";
	$run_query=mysqli_query($Connection,$delete_query);
	if ($run_query) {
		$_SESSION['SuccessMessage']="Dept Deleted Successfully";
		Redirect_to("Dept.php");
}	else{
		$_SESSION['ErrorMessage']="Failed to Delete Category";
		Redirect_to("Dept.php");
}

}elseif ($delete_id=$_GET['DeletePost']) {
	$delete_id=$_GET['DeletePost'];
	$delete_query="DELETE FROM learnmore_data WHERE id='$delete_id'";
	$run_query=mysqli_query($Connection,$delete_query);
	if ($run_query) {
		$_SESSION['SuccessMessage']="Post Deleted Successfully";
		Redirect_to("admin_dashboard.php");
	}else{
		$_SESSION['ErrorMessage']="Failed to Delete Post";
		Redirect_to("admin_dashboard.php");
	}
}elseif ($delete_id=$_GET['DeleteAdmin']) {
			$delete_id=$_GET['DeleteAdmin'];

		if ($delete_id=='2') {
				$_SESSION['ErrorMessage']="Super Admin Can't Be Deleted";
			Redirect_to('manage_admin_users.php');
		}else{

			$delete_query="DELETE FROM adminuser WHERE id='$delete_id'";
				$run_query=mysqli_query($Connection,$delete_query);
				if ($run_query) {
					$_SESSION['SuccessMessage']="Admin Deleted Successfully";
					Redirect_to("manage_admin_users.php");
				}else{
					$_SESSION['ErrorMessage']="Failed to Delete Admin";
					Redirect_to("manage_admin_users.php");
				}
			}
}elseif ($delete_id=$_GET['DeleteUser']) {
		$delete_id=$_GET['DeleteUser'];

		$delete_query="DELETE FROM formdata WHERE id='$delete_id'";
		$run_query=mysqli_query($Connection,$delete_query);
		if ($run_query) {
			$_SESSION['SuccessMessage']="form user Deleted Successfully";
			Redirect_to("manage_admin_users.php");
		}else{
			$_SESSION['ErrorMessage']="Failed to Delete form user";
			Redirect_to("manage_admin_users.php");
		}
}





 ?>