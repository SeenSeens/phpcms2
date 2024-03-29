<?php require_once './config/config.php'; ?>
<?php /* Confirm_Login(); */ ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Dashboard</title>
	<link rel="shortcut icon" href="../favicon.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/adminstyle.css">
	<base href="./" />
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
			<li class="active"><a href="../index.php" target="_blank">Blog</a></li>
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
				<li class="active"><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span>&nbsp; DashBoard</a></li>
				<li ><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Add New Post</a></li>
				<li><a href="categories.php"><span class="glyphicon glyphicon-tags"></span>&nbsp; Categories</a></li>
				<li><a href="admins.php"><span class="glyphicon glyphicon-user"></span>&nbsp; Manage Admins</a></li>
				<li><a href="user.php"><span class="fas fa-users"></span>&nbsp; User</a></li>
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
			<div>
				<?php
				echo Message();
				echo SuccessMessage();
				?> 
			</div>
			<h1>Admin Dashboard</h1>
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tr>
						<th>No</th>
						<th>Title</th>
						<th>Slug</th>
						<th>Category</th>
						<th>Author</th>
						<th>Images</th>
						<th>Comments</th>
						<th>Created</th>
						<th>Action</th>
						<th>Details</th>
					</tr>
					<?php
					$ViewQuery = "SELECT * FROM post, category WHERE post.idcategory = category.id";
					$Execute = mysqli_query($Connection, $ViewQuery);
					$SrNo = 0;
					while($DataRows = mysqli_fetch_array($Execute)) {
						$Id = $DataRows["idpost"];
						$Category = $DataRows["namecategory"];
						$Admin = $DataRows["idadmin"];
						$Title = $DataRows["title"];
						$Slug = $DataRows["slug"];
						$Image = $DataRows["images"];
						$Content = $DataRows["content"];
						$DateTime = $DataRows["created"];
						$SrNo++;
					?>
					<tr>
						<td><?= $SrNo; ?></td>
						<td style="color: #535FE4;">
							<?php 
							if (strlen($Title) > 20) { $Title = substr($Title, 0, 20).'...'; }
							echo $Title; 
							?>
						</td>
						<td>
						<?php 
							if (strlen($Slug) > 20) { $Slug = substr($Slug, 0, 20).'...'; }
							echo $Slug; 
							?>
						</td>
						<td><?= $Category; ?></td>
						<td><?= $Admin; ?></td>
						<td><img src="../images/<?= $Image; ?>"  width="120px;" height="50px;"></td>
						<td>
							<?php
							$QueryApproved = "SELECT COUNT(*) FROM comment WHERE idpost = '$Id' AND status = 'ON'";
							$ExecuteApproved = mysqli_query($Connection, $QueryApproved);
							$RowApproved = mysqli_fetch_array($ExecuteApproved);
							$TotalApproved = array_shift($RowApproved);
							if ($TotalApproved > 0) { ?>
								<span class="label label-success pull-right"><?= $TotalApproved; ?></span>
							<?php
							}
							?>
							
							<?php
							$QueryUnApproved = "SELECT COUNT(*) FROM comment WHERE idpost = '$Id' AND status = 'OFF'";
							$ExecuteUnApproved  = mysqli_query($Connection, $QueryUnApproved);
							$RowUnApproved  = mysqli_fetch_array($ExecuteUnApproved );
							$TotalUnApproved  = array_shift($RowUnApproved);
							if ($TotalUnApproved > 0) { ?>
								<span class="label label-danger pull-left"><?= $TotalUnApproved; ?></span>
							<?php
							}
							?>			
						</td>
						<td><?= $DateTime; ?></td>
						<td>
							<a href="editpost.php?edit=<?= $Id; ?>"><span class="btn btn-warning">Edit</span></a>
							<a href="deletepost.php?delete=<?= $Id; ?>"><span class="btn btn-danger">Delete</span></a>
						</td>
						<td>
							<a href="../post.php?slug=<?= $Slug; ?>" target="_blank"><span class="btn btn-primary">Live Preview</span></a>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>
</html>