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
        $EditFromURL = $_GET['edit'];
		$Query = "UPDATE post SET idcategory = '$Category', idadmin = '$Admin', title = '$Title', slug = '$Slug', images = '$Image', content = '$Content', created = '$dateTime' WHERE idpost = '$EditFromURL'";
		$Execute = mysqli_query($Connection, $Query);
		move_uploaded_file($_FILES["Image"]["tmp_name"], $Target); // Chuyen hinh anh sang thu muc
		if ($Execute) {
			$_SESSION["SuccessMessage"] = "Post Update Successfully";
			Redirect_to("dashboard.php");
		} else {
			$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
			Redirect_to("dashboard.php");
		}
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit Post</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
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
	<a class="navbar-brand" href="blog.php">
	   <img style="margin-top: -12px;" src="">
	</a>
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
				<li><a href="#"><span class="fas fa-compact-disc"></span>&nbsp; Media</a></li>
				<li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span>&nbsp; Logout</a></li>
			</ul>
		</div> <!-- End Side Area -->
		<div class="col-sm-10">
			<h1>Update Post</h1>
			<?php
				echo Message();
				echo SuccessMessage();
			?> 
			<div>
				<?php
				$SearchQueryParameter = $_GET["edit"];
				$Query = "SELECT * FROM post, category WHERE idpost = '$SearchQueryParameter' AND post.idcategory = category.id";
				$ExecuteQuery = mysqli_query($Connection, $Query);
				while ($DataRows = mysqli_fetch_array($ExecuteQuery)) {
					$TitleUpdate = $DataRows["title"];
					$SlugUpdate = $DataRows["slug"];
					$CategoryUpdate = $DataRows["namecategory"];
					$ImageUpdate = $DataRows["images"];
					$ContentUpdate = $DataRows["content"];
				}
				?>
				<form action="editpost.php?edit=<?= $SearchQueryParameter; ?>" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="form-group">
							<label for="title"><span class="FieldInfo">Title:</span></label>
							<input value="<?= $TitleUpdate; ?>" class="form-control" type="text" name="Title" id="title" placeholder="Title">
						</div>
						<div class="form-group">
							<label for="slug"><span class="FieldInfo">Slug:</span></label>
							<input value="<?= $SlugUpdate; ?>" class="form-control" type="text" name="Slug" id="slug" placeholder="Slug">
						</div>
						<div class="form-group">
							<span class="FieldInfo">Existing Category:</span>
							<?= $CategoryUpdate; ?> <br>
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
									<option value="<?= $Id; ?>"><?= $CategoryName; ?></option>
								<?php
								}
								?>
							</select>
						</div>
						<div class="form-group">
							<span class="FieldInfo">Existing Image:</span>
							<img src="upload/<?= $ImageUpdate; ?>" width="120px;" height="50px;"> <br>
							<label for="imageselect"><span class="FieldInfo">Select Image:</span></label>
							<input type="file" class="form-control" name="Image" id="imageselect">
						</div>
						<div class="form-group">
							<label for="postarea"><span class="FieldInfo">Content:</span></label>
							<textarea class="form-control" name="Content" id="postarea" col="10" rows="20">
								<?= $ContentUpdate; ?>
							</textarea>
						</div>
						<input type="submit" class="btn btn-success btn-block" name="submit" value="Update Post">
					</fieldset> 
				</form>
			</div>		
		</div> <!-- End Main Area -->
	</div> <!-- End Row -->
</div> <!-- End Container -->

<div class="footer">
	<p style="color: #838383; text-align: center;">&copy; &nbsp;2018</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=1qa5t0dn0b46dukvifb2b500e7ausw3qelzj0jie038xyejf"></script>
<script src="js/tiny.js"></script>
</body>
</html>