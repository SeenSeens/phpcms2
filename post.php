<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if(isset($_POST['comment'])) {
	$Comment = mysqli_real_escape_string($Connection, $_POST['Comment']);
	date_default_timezone_set("Asia/Ho_Chi_Minh");
	$currentTime = time();
	$dateTime = strftime("%d-%m-%Y", $currentTime);
    $dateTime;
    $Admin = "TuanIT";
	$User = "TuanITSSS";
	$PostId = $_GET['idpost'];
	if(empty($Comment)) {
		$_SESSION["ErrorMessage"] = "All fields are required";
	} elseif (strlen($Comment) > 500) {
		$_SESSION["ErrorMessage"] = "Only 500  characters are allowed in comment";
	} else {
		$PostIDFromURL = $_GET['id'];
		$Query = "INSERT INTO comment (iduser, idadmin, comments, status, idpost) VALUES ('$User', '$Admin', '$Comment', 'OFF', '$PostIDFromURL')";
		$Execute = mysqli_query($Connection, $Query);
		if ($Execute) {
			$_SESSION["SuccessMessage"] = "Comment Submitted Successfully";
            /* Redirect_to("fullpost.php?id={$PostId}"); */
            Redirect_to("post.php?id={$PostId}");
		} else {
			$_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
            /* Redirect_to("fullpost.php?id={$PostId}"); */
            Redirect_to("post.php?id={$PostId}");
		}
	}
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">
        <title>Truong Tuan IT</title>
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <!-- Custom fonts for this template -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=vietnamese" rel="stylesheet">
        <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' type='text/css'>
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="css/clean-blog.min.css">
    </head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">TruongTuanIT</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="about.html">About</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="post.html">Sample Post</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="contact.html">Contact</a>
            </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<?php
$PostIDFromURL = $_GET["id"];
$ViewQuery = "SELECT * FROM post WHERE idpost = '$PostIDFromURL'";
$Execute = mysqli_query($Connection, $ViewQuery);
while ($DataRows = mysqli_fetch_array($Execute)) {
    $PostId = $DataRows["idpost"];
    $Category = $DataRows["idcategory"];
    $Admin = $DataRows["idadmin"];
    $Title = $DataRows["title"];
    $Slug = $DataRows["slug"];
    $Image = $DataRows["images"];
    $Content = $DataRows["content"];
    $DateTime = $DataRows["created"];
?>
<header class="masthead" style="background-image: url('upload/<?= $Image; ?>');">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="post-heading">
                    <h1><?= htmlentities($Title); ?></h1>
                    <h2 class="subheading"></h2>
                    <span class="meta">Posted by
                    <a href="#"><?= htmlentities($Admin); ?></a>
                    <?= htmlentities($DateTime); ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<?php
}
?>

<!-- Post Content -->
<article>
    <div class="container">
        <div class="row">
            <div class="col-lg-11 col-md-10 mx-auto">
                <?php
                $PostIDFromURL = $_GET["id"];
                $ViewQuery = "SELECT * FROM post WHERE idpost = '$PostIDFromURL'";
                $Execute = mysqli_query($Connection, $ViewQuery);
                while ($DataRows = mysqli_fetch_array($Execute)) {
					$PostId = $DataRows["idpost"];
                    $Category = $DataRows["idcategory"];
                    $Admin = $DataRows["idadmin"];
                    $Title = $DataRows["title"];
                    $Slug = $DataRows["slug"];
                    $Image = $DataRows["images"];
                    $Content = $DataRows["content"];
                    $DateTime = $DataRows["created"];			
                ?>
                <p><?= $Content; ?></p>
                <?php
                }
                ?>
            </div>
        </div>
    </div>
</article>
<hr>

<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <!-- Comments Form -->
        <div class="card my-4">
            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form action="post.php?id=<?= $PostId; ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="commentarea"><span class="FieldInfo">Comment:</span></label>
                        <textarea class="form-control" rows="3" placeholder="Write something here" id="commentarea" name="Comment"></textarea>
                    </div>
                    <button type="submit" name="comment" class="btn btn-primary">Comments</button>
                </form>
            </div>
        </div>
        <!-- Single Comment -->
        <?php
        $PostIdFromComments = $_GET['id'];
        $ExtractingCommentQuery = "SELECT * FROM comment WHERE idpost = '$PostIdFromComments'";
        $Execute = mysqli_query($Connection, $ExtractingCommentQuery);
        while ($DataRows = mysqli_fetch_array($Execute)) {
            $CommentName = $DataRows['iduser'];
            $Comments = $DataRows['comments'];
        ?>
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="images/comment.png" alt="">
            <div class="media-body">
                <h5 class="mt-0"><?= $CommentName ?></h5>
                <span><?= nl2br($Comments); ?></span>
            </div>
        </div>
        <?php
        }
        ?>
        <!-- Comment with nested comments -->
        <!-- <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
            <div class="media-body">
                <h5 class="mt-0">Commenter Name</h5>
                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                <div class="media mt-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
                <div class="media mt-4">
                    <img class="d-flex mr-3 rounded-circle" src="http://placehold.it/50x50" alt="">
                    <div class="media-body">
                        <h5 class="mt-0">Commenter Name</h5>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/tuanseenit/"">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-linkedin fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://www.facebook.com/tuan.seen.it">
                            <span class="fa-stack fa-lg">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x fa-inverse"></i>
                            </span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a href="https://github.com/SeenSeens">
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
</footer>

<!-- Bootstrap core JavaScript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>
</body>
</html>