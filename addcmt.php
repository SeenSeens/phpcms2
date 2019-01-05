<?php
if(isset($_POST['comment'])) {
	$Comment = mysqli_real_escape_string($Connection, $_POST['Comment']);
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$currentTime = time();
	$dateTime = strftime("%d-%m-%Y", $currentTime);
    $dateTime;
    $Admin = "TuanIT";
	$PostId = $_GET['idpost'];
	if(empty($Comment)) {
		$_SESSION["ErrorMessage"] = "All fields are required";
	} elseif (strlen($Comment) > 500) {
		$_SESSION["ErrorMessage"] = "Only 500  characters are allowed in comment";
	} else {
        $PostIDFromURL = $_GET['id'];
        $GetUserComment = $_SESSION['iduser'];
		$Query = "INSERT INTO comment (iduser, idadmin, comments, status, idpost) VALUES ('$GetUserComment', '$Admin', '$Comment', 'ON', '$PostIDFromURL')";
		$Execute = mysqli_query($Connection, $Query);
		if ($Execute) {
            Redirect_to("post.php?id={$PostIDFromURL}");
		} else {
            Redirect_to("post.php?id={$PostIDFromURL}");
		}   
	}
}
?>