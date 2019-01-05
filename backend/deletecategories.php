<?php require_once './config/config.php'; ?>

<?php
if (isset($_GET["id"])) {
	$IdFromURL = $_GET["id"];
	$Query = "DELETE FROM category WHERE id = '$IdFromURL'";
	$Exectute = mysqli_query($Connection, $Query);
	if ($Exectute) {
		$_SESSION["SuccessMessage"] = "Category Deleted Successfully!!!";
		Redirect_to("categories.php");
	} else {
		$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again!!!";
		Redirect_to("categories.php");
	}
}
?>