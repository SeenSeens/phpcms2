<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/cookie.php'; ?>

<?php
function Redirect_to($New_Location) {
	header("Location:".$New_Location);
	exit();
}

function Login_Attempt($Username, $Password) {
	$Connection;
	$Query = "SELECT nameadmin, password FROM admin WHERE nameadmin='$Username' AND password='$Password'";
	$Execute = mysqli_query($Connection, $Query);
	if($admin = mysqli_fetch_assoc($Execute)) {
		return $admin;
	} else {
		return null;
	}
}

/* function Login() {
	if (isset($_SESSION["User_Id"])) {
		return true;
	}
}

function Confirm_Login() {
	if (!Login()) {
		$_SESSION["ErrorMessage"] = "Login Required!";
		Redirect_to("login.php");
	}
} */


?>