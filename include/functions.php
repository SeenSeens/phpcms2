<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>

<?php
function Redirect_to($New_Location) {
	header("Location:".$New_Location);
	exit();
}

function Login_Attempt($Username, $Password) {
	// $Connection;
	$Query = "SELECT * FROM registration WHERE username='$Username' AND password='$Password'";
	$Execute = mysqli_query($Connection, $Query);
	if($admin = mysqli_fetch_assoc($Execute)) {
		return $admin;
	} else {
		return null;
	}
}
?>