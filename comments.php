<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>
<?php require_once 'include/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin Dashboard</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminstyle.css">
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
				<li><a href="addnewpost.php"><span class="glyphicon glyphicon-list-alt"></span>&nbsp; Add New Post</a></li>
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
		<div>
			<?php
			echo Message();
			echo SuccessMessage();
			?> 
		</div>
		<h1>Un-Approved Comments</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th>No.</th>
                    <th>Commentator</th>
                    <th>Comment</th>
                    <th>Approve By</th>
                    <th>Delete Comment</th>
                    <th>Details</th>
                </tr>
                <?php
                $Query = "SELECT * FROM comment WHERE status = 'OFF'";
                $Execute = mysqli_query($Connection, $Query);
                $SrNo = 0;
                while ($DataRows = mysqli_fetch_array($Execute)) {
                    $CommentId = $DataRows['idcomment'];
                    $UserComment = $DataRows['iduser'];
                    $AdminApply = $DataRows['idadmin'];
                    $PersonComment = $DataRows['comments'];
                    $SrNo++;
                    if (strlen($UserComment) > 10) {$UserComment = substr($UserComment, 0, 10).'...';}
                ?>
                <tr>
                    <td><?= htmlentities($SrNo); ?></td>
                    <td style="color: #5e5eff;"><?php echo htmlentities($UserComment); ?></td>
                    <td><?= htmlentities($PersonComment); ?></td>
                    <td><a href="approvecomments.php?id=<?= $CommentId; ?>"><span class="btn btn-success">Approve</span></a></td>
                    <td><a href="deletecomments.php?id=<?= $CommentId ?>"><span class="btn btn-danger">Delete</span></a></td>
                    <td><a href="fullpost.php?id=<?= $CommentedPostId; ?>" target = "_blank"><span class="btn btn-primary">Live Preview</span></a></td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>
        <h1>Approved Comments</h1>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <tr>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Comment</th>
                    <th>Approve By</th>
                    <th>Revert Approve</th>
                    <th>Delete Comment</th>
                    <th>Details</th>
                </tr>
                <?php
                $Admin = "TruongTuanIT";
                $Query = "SELECT * FROM comment WHERE status = 'ON'";
                $Execute = mysqli_query($Connection, $Query);
                $SrNo = 0;
                while ($DataRows = mysqli_fetch_array($Execute)) {
                    $CommentId = $DataRows['idcomment'];
                    $UserComment = $DataRows['iduser'];
                    $AdminApply = $DataRows['idadmin'];
                    $PersonComment = $DataRows['comments'];;
                    $SrNo++;
                    if (strlen($UserComment) > 10) {$UserComment = substr($UserComment, 0, 10).'...';}
                ?>
                <tr>
                    <td><?php echo htmlentities($SrNo); ?></td>
                    <td style="color: #5e5eff;"><?= htmlentities($UserComment); ?></td>
                    <td><?= htmlentities($PersonComment); ?></td>
                    <td><?= $Admin; ?></td>
                    <td><a href="disapprovecomments.php?id=<?= $CommentId; ?>"><span class="btn btn-warning">Dis-Approve</span></a></td>
                    <td><a href="deletecomments.php?id=<?= $CommentId ?>"><span class="btn btn-danger">Delete</span></a></td>
                    <td><a href="fullpost.php?id=<?= $CommentedPostId; ?>" target = "_blank"><span class="btn btn-primary">Live Preview</span></a></td>
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