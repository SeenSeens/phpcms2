<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if(isset($_POST['submit'])) {
	$Name = mysqli_real_escape_string($Connection, $_POST['Name']);
	$Email = mysqli_real_escape_string($Connection, $_POST['Email']);
	$Comment = mysqli_real_escape_string($Connection, $_POST['Comment']);
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$currentTime = time();
	$dateTime = strftime("%d-%m-%Y", $currentTime);
	$dateTime;
	$PostId = $_GET['id'];
	if(empty($Name) || empty($Email) || empty($Comment)) {
		$_SESSION["ErrorMessage"] = "All fields are required";
	} elseif (strlen($Comment) > 500) {
		$_SESSION["ErrorMessage"] = "Only 500  characters are allowed in comment";
	} else {
		global $Connection;
		$PostIDFromURL = $_GET['id'];
		$Query = "INSERT INTO comments (datetime, name, email, comment, status, admin_panel_id) VALUES ('$dateTime', '$Name', '$Email', '$Comment', 'OFF', '$PostIDFromURL')";
		$Execute = mysqli_query($Connection, $Query);
		if ($Execute) {
			$_SESSION["SuccessMessage"] = "Comment Submitted Successfully";
			Redirect_to("fullpost.php?id={$PostId}");
		} else {
			$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
			Redirect_to("fullpost.php?id={$PostId}");
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Full Blog Post</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="css/publicstyle.css">
	<style type="text/css">
		.FieldInfo {
			color: rgb(251, 174, 44);
			font-family: Bitter, Georgia, "Times New Roman", Times, serif;
			font-size: 1.2em;
		}
		.CommentBlock {
			background-color: #F6F7F9;
		}
		.Comment-Info {
			color: #365899;
			font-family: sans-serif;
			font-size: 1.1em;
			font-weight: bold;
			padding-top: 10px;
		}
		.Comment {
			margin-top: -2px;
			padding-bottom: 10px;
			font-size: 1.1em;
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
			<li class="active"><a href="blog.php">Blog</a></li>
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

<div class="container">
	<div class="blog-header">
		<h1>The Complete Responsive CMS Blog</h1>
			<p class="lead">The complete blog using PHP by TruongTuanIT</p>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<?php
					echo Message();
					echo SuccessMessage();
				?> 
				<?php
				global $Connection;
				if(isset($_GET["SearchButton"])) {
					$Search = $_GET["Search"];
					$ViewQuery = "SELECT * FROM admin_panel WHERE title LIKE '%$Search%' OR category LIKE '%$Search%'";
				} else {
                    $PostIDFromURL = $_GET["id"];
					$ViewQuery = "SELECT * FROM admin_panel WHERE id = '$PostIDFromURL'";
				}
				$Execute = mysqli_query($Connection, $ViewQuery);
				while ($DataRows = mysqli_fetch_array($Execute)) {
					$PostId = $DataRows["id"];
					$DateTime = $DataRows["datetime"];
					$Title = $DataRows["title"];
					$Category = $DataRows["category"];
					$Admin = $DataRows["author"];
					$Image = $DataRows["images"];
					$Post = $DataRows["post"];			
				?>
				<div class="thumbnail blogpost">
					<img class="img-responsive img-rounded" src="upload/<?= $Image; ?>" >
					<div class="caption">
						<h1 id="heading"> <?= htmlentities($Title); ?></h1>
						<p class="description">Category: <?= htmlentities($Category); ?></p>
						Published on <?= htmlentities($DateTime); ?>
						<p class="post">
							<?php
								nl2br($Post);
							?>
						</p>
					</div>
				</div>
				<?php
				}
				?>
				
				<span class="FieldInfo">Comments</span>
				<?php
				global $Connection;
				$PostIdFromComments = $_GET['id'];
				$ExtractingCommentQuery = "SELECT * FROM comments WHERE admin_panel_id = '$PostIdFromComments' AND status = 'ON'";
				$Execute = mysqli_query($Connection, $ExtractingCommentQuery);
				while ($DataRows = mysqli_fetch_array($Execute)) {
				    $CommentDate = $DataRows['datetime'];
				    $CommentName = $DataRows['name'];
				    $Comments = $DataRows['comment'];
				?>
				<div class="CommentBlock">
					<img style="margin-left: 10px; margin-top: 10px;" class="pull-left" src="images/comment.png" alt="" width="50px" height="50px">
					<p style="margin-left: 90px" class="Comment-Info"><?= $CommentName ?></p>
					<p style="margin-left: 90px" class="description"><?= $CommentDate; ?></p>
					<p style="margin-left: 90px" class="Comment"><?= nl2br($Comments); ?></p>
				</div>
				<?php
				}
				?>
				<span class="FieldInfo">Share your thoughts about this post</span>
				<div>
					<form action="fullpost.php?id=<?= $PostId; ?>" method="post" enctype="multipart/form-data">
						<fieldset>
							<div class="form-group">
								<label for="name"><span class="FieldInfo">Name:</span></label>
								<input class="form-control" type="text" name="Name" id="name" placeholder="Name">
							</div>
							<div class="form-group">
								<label for="email"><span class="FieldInfo">Email:</span></label>
								<input class="form-control" type="email" name="Email" id="email" placeholder="Email">
							</div>
							<div class="form-group">
								<label for="commentarea"><span class="FieldInfo">Comment:</span></label>
								<textarea class="form-control" name="Comment" id="commentarea"></textarea>
							</div>
							<input type="submit" class="btn btn-primary" name="submit" value="Comments">
						</fieldset> 
					</form>
				</div>
			</div> <!-- End Main Blog -->
			<div class="col-sm-offset-1 col-sm-3">
			<h2>test</h2>
            <p>Vào một buổi sáng nọ trong mùa Noel, khung cảnh tuyết trắng phủ mọi nơi cùng với không khí yên ắng của đất trời đã cho Morh cảm hứng sáng tác. Ngay hôm ấy, Joseph Morh đã viết một bài thơ ngắn mang tên “Stille Nacht! Heilige Nacht!” (tên tiếng Anh là “Silent Night! Holy Night!”; ở Việt Nam thường được dịch là “Đêm Thánh vô cùng”) – sau này trở thành lời của bài hát “Silent Night” bản tiếng Đức.</p>
			</div> <!-- End Sidebar right -->
		</div> <!-- End Row -->
	</div>
</div> <!-- End container -->

<div class="footer">
	<p style="color: #838383; text-align: center;">&copy; &nbsp;2018</p>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>