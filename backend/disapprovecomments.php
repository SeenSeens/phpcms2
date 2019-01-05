<?php require_once './config/config.php'; ?>

<?php
if (isset($_GET["id"])) {
	$IdFromURL = $_GET["id"];
	$Query = "UPDATE comment SET status = 'OFF' WHERE idcomment = '$IdFromURL'";
	$Exectute = mysqli_query($Connection, $Query);
	if ($Exectute) {
		$_SESSION["SuccessMessage"] = "Comment Dis-Approved Successfully!!!";
		Redirect_to("comments.php");
	} else {
		$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again!!!";
		Redirect_to("comments.php");
	}
}
?>