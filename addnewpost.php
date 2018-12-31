<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if(isset($_POST['submit'])) {
	$Title = mysqli_real_escape_string($Connection, $_POST['Title']);
	$Slug = mysqli_real_escape_string($Connection, $_POST['Slug']);
	$Category = mysqli_real_escape_string($Connection, $_POST['Category']);
	$Content = mysqli_real_escape_string($Connection, $_POST['Content']);
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$currentTime = time();
	$dateTime = strftime("%d-%m-%Y", $currentTime);
	$dateTime;
	$Admin = "TuanIT";
	/* $Admin = $_SESSION["UserName"]; */
	$Image = $_FILES["Image"]["name"];
	/* $Image = $_FILES["Image"];
	echo "<pre>";
	print_r ($Image); */
	$Target = "upload/".basename($_FILES["Image"]["name"]);	
	if(empty($Title)) {
		$_SESSION["ErrorMessage"] = "Title can't be empty";
		Redirect_to("addnewpost.php");
	} elseif (strlen($Title) < 2) {
		$_SESSION["ErrorMessage"] = "Title Should be at-least 2 Characters";
		Redirect_to("addnewpost.php");
	} else {
		global $Connection;
		$Query = "INSERT INTO post (idcategory, idadmin, title, slug, images, content, created) VALUES ('$Category', '$Admin', '$Title', '$Slug', '$Image', '$Content', '$dateTime')";
		$Execute = mysqli_query($Connection, $Query);
		move_uploaded_file($_FILES["Image"]["tmp_name"], $Target); // Chuyen hinh anh sang thu muc
		if ($Execute) {
			$_SESSION["SuccessMessage"] = "Post Added Successfully";
			Redirect_to("addnewpost.php");
		} else {
			$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
			Redirect_to("addnewpost.php");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Categories</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/fontawesome.css">
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
				<li class="active"><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Add New Post</a></li>
				<li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp; Categories</a></li>
				<li><a href="admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Manage Admins</a></li>
				<li><a href="#"><span class="fas fa-users"></span>&nbsp; User</a></li>
				<li>
					<a href="comments.php"><span class="glyphicon glyphicon-comment"></span>&nbsp; Comments
					<?php
					$QueryApproved = "SELECT COUNT(*) FROM comment WHERE status = 'OFF'";
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
				<li><a href="#"><span class="fas fa-compact-disc"></span>&nbsp; Media</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
			</ul>
		</div> <!-- End Side Area -->
		<div class="col-sm-10">
			<h1>Add New Post</h1>
			<?php
				echo Message();
				echo SuccessMessage();
			?> 
			<div>
				<form action="addnewpost.php" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="form-group">
							<label for="title"><span class="FieldInfo">Title:</span></label>
							<input class="form-control" type="text" name="Title" id="title" placeholder="Title">
						</div>
						<div class="form-group">
							<label for="slug"><span class="FieldInfo">Slug:</span></label>
							<input class="form-control" type="text" name="Slug" id="slug" placeholder="Slug">
						</div>
						<div class="form-group">
							<label for="categoryselect"><span class="FieldInfo">Category:</span></label>
							<select class="form-control" name="Category" id="categoryselect" value="Category">
								<?php
								global $Connection;
								$ViewQuery = "SELECT * FROM category";
								$Execute = mysqli_query($Connection, $ViewQuery);
								while ($DataRows = mysqli_fetch_array($Execute)) {
									$Id = $DataRows["id"];
									$CategoryName = $DataRows["namecategory"];
									?>
									<option value="<?= $Id; ?>"><?php echo $CategoryName; ?></option>
									<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
							<input type="file" class="form-control" name="Image" id="imageselect">
						</div>
						<div class="form-group">
							<label for="postarea"><span class="FieldInfo">Content:</span></label>
							<textarea class="form-control" name="Content" id="postarea" col="10" rows="20"></textarea>
						</div>
						<input type="submit" class="btn btn-success btn-block" name="submit" value="Add New Post">
					</fieldset> 
				</form>
			</div>		
		</div> <!-- End Main Area -->
	</div> <!-- End Row -->
</div> <!-- End Container -->

<!-- Footer -->
<footer class="py-5 bg-dark">
	<div class="container">
		<p class="m-0 text-center text-white">Copyright &copy; Your Website 2018</p>
	</div>
	<!-- /.container -->
</footer>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1qa5t0dn0b46dukvifb2b500e7ausw3qelzj0jie038xyejf"></script>
<script src="js/tiny.js"></script>
</body>
</html>