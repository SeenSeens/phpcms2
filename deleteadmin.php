<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>
<?php require_once 'include/db.php'; ?>

<?php
if (isset($_GET["id"])) {
	$IdFromURL = $_GET["id"];
	$Query = "DELETE FROM registration WHERE id = '$IdFromURL'";
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