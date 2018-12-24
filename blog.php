<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
	<link href='https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
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

<div class="container">
	<div class="blog-header">
		<h1>The Complete Responsive CMS Blog</h1>
			<p class="lead">The complete blog using PHP by TruongTuanIT</p>
		</div>
		<div class="row">
			<div class="col-sm-8">
				<?php
				global $Connection;
				if(isset($_GET["SearchButton"])) {
					$Search = $_GET["Search"];
					$ViewQuery = "SELECT * FROM admin_panel WHERE title LIKE '%$Search%' OR category LIKE '%$Search%'";
				} else {
					$ViewQuery = "SELECT * FROM admin_panel";
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
							if(strlen($Post)>150) { $Post=substr($Post, 0, 150).'...'; }	
								echo $Post;
							?>
						</p>
					</div>
					<a href="fullpost.php?id=<?= $PostId; ?>"><span class="btn btn-info">
						Read More &rsaquo;&rsaquo;
					</span></a>
				</div>
				<?php
				}
				?>
			</div> <!-- End Main Blog -->
			<div class="col-sm-offset-1 col-sm-3"></div> <!-- End Sidebar right -->
		</div> <!-- End Row -->
	</div>
</div> <!-- End container -->

 <!-- Footer -->
 <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-10 mx-auto">
            <ul class="list-inline text-center">
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-twitter fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
              <li class="list-inline-item">
                <a href="#">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            </ul>
            <p class="copyright text-muted">Copyright &copy; Your Website 2018</p>
          </div>
        </div>
      </div>
    </footer>>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>