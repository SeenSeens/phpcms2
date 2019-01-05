<?php require_once './config/config.php'; ?>

<?php
if (isset($_GET["id"])) {
	$IdFromURL = $_GET["id"];
	$Query = "DELETE FROM admin WHERE idadmin = '$IdFromURL'";
	$Exectute = mysqli_query($Connection, $Query);
	if ($Exectute) {
		$_SESSION["SuccessMessage"] = "Admin Deleted Successfully!!!";
		Redirect_to("admins.php");
	} else {
		$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again!!!";
		Redirect_to("admins.php");
	}
}
?>