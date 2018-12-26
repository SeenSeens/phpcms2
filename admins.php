<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if(isset($_POST['submit'])) {
    $UserName = mysqli_real_escape_string($Connection, $_POST['UserName']);
    $Password = mysqli_real_escape_string($Connection, $_POST['Password']);
    $ConfirmPassword = mysqli_real_escape_string($Connection, $_POST['ConfirmPassword']);
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$currentTime = time();
	$dateTime = strftime("%d-%m-%Y", $currentTime);
	$dateTime;
	$Admin = "TuanIT";
	if(empty($UserName) || empty($Password) || empty($ConfirmPassword)) {
		$_SESSION["ErrorMessage"] = 'All Fields must be filled out';
		Redirect_to("admins.php");
	} elseif (strlen($Password) < 4 ) {
		$_SESSION["ErrorMessage"] = "Atleast 4 Characters For Password are required";
		Redirect_to("admins.php");
    } elseif ($Password !== $ConfirmPassword) {
		$_SESSION["ErrorMessage"] = "Password / ConfirmPassword does not match";
		Redirect_to("admins.php");
	} else {
		global $Connection;
		$Query = "INSERT INTO registration (datetime, username, password, addedby) VALUES ('$dateTime', '$UserName', '$Password', '$Admin')";
		$Execute = mysqli_query($Connection, $Query);
		if ($Execute) {
			$_SESSION["SuccessMessage"] = "Admin Added Successfully";
			Redirect_to("admins.php");
		} else {
			$_SESSION["ErrorMessage"] = "Admin faild to add";
			Redirect_to("admins.php");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Categories</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/adminstyle.css">
	<style type="text/css">
		.FieldInfo {
			color: rgb(251, 174, 44);
			font-family: Bitter, Georgia, "Times New Roman", Times, serif;
			font-size: 1.2em;
		}
	</style>
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
	<div class="container">
		<div class="navbar-header">
		<button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
			data-target="#collapse">
			<span class="sr-only">Toggle Navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="blog.php"><img style="margin-top: -12px;" src=""></a>
	</div>
	<div class="collapse navbar-collapse" id="collapse">
		<ul class="nav navbar-nav">
			<li><a href="#">Home</a></li>
			<li class="active"><a href="blog.php" target="_blank">Blog</a></li>
			<li><a href="#">About Us</a></li>
			<li><a href="#">Services</a></li>
			<li><a href="#">Contact Us</a></li>
			<li><a href="#">Feature</a></li>
		</ul>
		<form action="blog.php" class="navbar-form navbar-right">
		<div class="form-group">
		<input type="text" class="form-control" placeholder="Search" name="Search" >
		</div>
	         <button class="btn btn-default" name="SearchButton">Search</button>		
		</form>
		</div>		
	</div>
</nav>

<div class="container-fluid">
	<div class="row">
		<div class="col-sm-2">
			<h1>TuanIT</h1>
			<ul id="Side_Menu" class="nav nav-pills nav-stacked">
				<li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span>&nbsp; DashBoard</a></li>
				<li><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Add New Post</a></li>
				<li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp; Categories</a></li>
				<li class="active"><a href="admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Manage Admins</a></li>
				<li>
					<a href="comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp; Comments
					<?php
					$QueryApproved = "SELECT COUNT(*) FROM comments WHERE status = 'OFF'";
					$ExecuteApproved  = mysqli_query($Connection, $QueryApproved);
					$RowApproved  = mysqli_fetch_array($ExecuteApproved );
					$TotalApproved  = array_shift($RowApproved);
					if ($TotalApproved > 0) { ?>
						<span class="label label-warning pull-right"><?= $TotalApproved; ?></span>
					<?php
					}
					?>
					</a>
				</li>
				<li><a href="#"><span class="glyphicon glyphicon-equalizer"></span>&nbsp; Live Blog</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
			</ul>
		</div> <!-- End Side Area -->
		<div class="col-sm-10">
			<h1>Manage Admin Access</h1>
			<?php
				echo Message();
				echo SuccessMessage();
			?> 
			<div>
				<form action="admins.php" method="post">
					<fieldset>
						<div class="form-group">
							<label for="username"><span class="FieldInfo">UserName:</span></label>
							<input class="form-control" type="text" name="UserName" id="username" placeholder="UserName">
						</div>
						<div class="form-group">
							<label for="password"><span class="FieldInfo">Password:</span></label>
							<input class="form-control" type="password" name="Password" id="password" placeholder="Password">
						</div>
						<div class="form-group">
							<label for="confirmpassword"><span class="FieldInfo">Confirm Password:</span></label>
							<input class="form-control" type="password" name="ConfirmPassword" id="confirmpassword" placeholder="Retype Password">
						</div>
						<input type="submit" class="btn btn-success btn-block" name="submit" value="Add New Admin">
					</fieldset> 
				</form>
			</div>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>Sr No.</th>
						<th>Date & Time</th>
						<th>Admin Name</th>	
						<th>Added By</th>
						<th>Action</th>
					</tr>
					<?php
					global $Connection;
					$ViewQuery = "SELECT * FROM registration ORDER BY datetime DESC";
					$Execute = mysqli_query($Connection, $ViewQuery);
					$SrNo = 0;
					while ($DataRows = mysqli_fetch_array($Execute)) {
						$Id = $DataRows["id"];
						$DateTime = $DataRows["datetime"];
						$UserName = $DataRows["username"];
						$Admin = $DataRows["addedby"];
						$SrNo++;
						?>
						<tr>
							<td><?= $SrNo; ?></td>
							<td><?= $DateTime; ?></td>
							<td><?= $UserName; ?></td>
							<td><?= $Admin; ?></td>
							<td>
								<a href="deleteadmin.php?id=<?= $Id; ?>">
									<span class="btn btn-danger">Delete</span>
								</a>
							</td>
						</tr>
					<?php
					}
					?>
				</table>
			</div>
		</div> <!-- End Main Area -->
	</div> <!-- End Row -->
</div> <!-- End Container -->

<div class="footer">
	<p style="color: #838383; text-align: center;">&copy; &nbsp;2018</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>