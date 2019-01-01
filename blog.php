<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/fontawesome.css">
	<link rel="stylesheet" href="css/lora.css">
    <link rel="stylesheet" href="css/opensans.css">
	<link rel="stylesheet" href="css/publicstyle.css">
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

<div class="container"> <!-- Container -->
    <div class="blog-header">
        <h1>The complete responsive CMS blog</h1>
        <p class="lead">The comlete blog using php by tuanit</p>
		<?= $_SESSION['username']; ?>
    </div>
    <div class="row"> <!-- Row -->
        <div class="col-sm-8"> <!-- Main Blog -->
            <?php
			/* Query when Search Button is Active */
			if (isset($_GET['SearchButton'])) {
				$Search = $_GET['Search'];				
				$ViewQuery = "SELECT * FROM post WHERE title LIKE '%$Search%'";
			}
			/* Query when Search Button is Active  blog.php?page=1 */ 
			elseif(isset($_GET["page"])) {
				$Page = $_GET["page"];
				if($Page == 0 || $Page < 1) {
					$ShowPostFrom = 0;
				} else {
					$ShowPostFrom = ($Page*5)-5;
				}
				$ViewQuery = "SELECT * FROM post LIMIT $ShowPostFrom, 5";
			} 
			/* The default query for blog.php page */ 
			else {
				$ViewQuery = "SELECT * FROM post LIMIT 0, 3";
			}
			$Execute = mysqli_query($Connection, $ViewQuery);
			while($DataRows = mysqli_fetch_array($Execute)) {
				$PostId = $DataRows["idpost"];
				$Category = $DataRows["idcategory"];
				$Admin = $DataRows["idadmin"];
				$Title = $DataRows["title"];
				$Slug = $DataRows["slug"];
				$Image = $DataRows["images"];
				$Content = $DataRows["content"];
				$DateTime = $DataRows["created"];
			?>
			<div class="blogpost thumbnail">
				<img src="upload/<?= $Image; ?>" alt="" class="img-responsive img-rounded">
				<div class="caption">
					<h1 id="heading"><?= htmlentities($Title); ?></h1>
					<p class="description">
						Category: &nbsp;<?= htmlentities($Category); ?> Publish on <?= htmlentities($DateTime); ?>
					</p>
					<p class="post">
						<?php
						if(strlen($Content) > 150) { $Content = substr($Content, 0, 150).'...'; }
						echo $Content;
						?>
					</p>
				</div>
				<a href="fullpost.php?id=<?= $PostId; ?>">
					<span class="btn btn-info">Read More &rsaquo;&rsaquo; </span>
				</a>
			</div>
			<?php
			}
			?>

			<nav>
				<ul class="pagination pull-left pagination-lg">
				<!-- Creating backward button -->
				<?php
				if (isset($Page)) {
					if ($Page > 1) { ?>
						<li><a href="blog.php?page=<?= $Page-1; ?>">&laquo;</a></li>
					<?php
					}
				}
				?>

				<?php
				$QueryPagination = "SELECT COUNT(*) FROM post";
				$ExecutePagination = mysqli_query($Connection, $QueryPagination);
				$RowPagination = mysqli_fetch_array($ExecutePagination);
				$TotalPosts = array_shift($RowPagination);
				$PostPagination = $TotalPosts / 5;
				$PostPagination = ceil($PostPagination);
				for ($i = 1; $i <= $PostPagination; $i++){
					if (isset($Page)) {
						if ($i == $Page) { ?>
							<li class="active"><a href="blog.php?page=<?= $i; ?>"><?= $i; ?></a></li> <?php
						} else { ?>
							<li><a href="blog.php?page=<?= $i; ?>"><?= $i; ?></a></li>
						<?php
						}
					}
				}
				?>

				<!-- Creating forkward button -->
				<?php
				if (isset($Page)) {
					if ($Page+1 <= $PostPagination) { ?>
						<li><a href="blog.php?page=<?= $Page+1; ?>">&raquo;</a></li>
					<?php
					}
				}
				?>
				</ul>
			</nav>
        </div> <!-- End Main Blog -->

        <div class="col-sm-offset-1 col-sm-3"> <!-- Sidebar Right -->
            <h2>test</h2>
            <p>Vào một buổi sáng nọ trong mùa Noel, khung cảnh tuyết trắng phủ mọi nơi cùng với không khí yên ắng của đất trời đã cho Morh cảm hứng sáng tác. Ngay hôm ấy, Joseph Morh đã viết một bài thơ ngắn mang tên “Stille Nacht! Heilige Nacht!” (tên tiếng Anh là “Silent Night! Holy Night!”; ở Việt Nam thường được dịch là “Đêm Thánh vô cùng”) – sau này trở thành lời của bài hát “Silent Night” bản tiếng Đức.</p>
        </div> <!-- End Sidebar Right -->
    </div> <!-- End Row -->
</div> <!-- End Container -->




<div class="footer">
	<p style="color: #838383; text-align: center;">&copy; &nbsp;2018</p>
</div>

<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>