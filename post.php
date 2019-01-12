<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if(isset($_POST['comment'])) {
	$Comment = mysqli_real_escape_string($Connection, $_POST['Comment']);
    $Admin = "TuanIT";
    // Kiểm tra xem người dùng nhập gì chưa
	if(empty($Comment)) {
        $_SESSION["ErrorMessage"] = "All fields are required";
        exit;
    }
    // Giới hạn 500 ký tự
    if (strlen($Comment) > 500) {
        $_SESSION["ErrorMessage"] = "Only 500  characters are allowed in comment";
        exit;
	}
    $PostIDFromURL = $_GET['slug'];
    $GetUserComment = $_SESSION['iduser'];
    // Check perent
    $IdPerent = -1;
    $Query = "INSERT INTO comment (idperent, iduser, idpost, idadmin, comments, status) VALUES ('$IdPerent', '$GetUserComment', '$PostIDFromURLs', '$Admin', '$Comment', 'OFF')";
    $Execute = mysqli_query($Connection, $Query);
    if ($Execute) {
        Redirect_to("post.php?id={$PostIDFromURL}");
    } else {
        Redirect_to("post.php?id={$PostIDFromURL}");
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
        <title>Bài viết</title>
        <link rel="shortcut icon" href="./favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=vietnamese">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=vietnamese">
        <link rel="stylesheet" href="./css/clean-blog.min.css">
    </head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Giới thiệu</a>
                </li>
                <?php
                if(empty($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Đăng nhập</a>
                    </li>
                <?php
                }
                ?>
                <?php
                if(!empty($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">&nbsp; <?= $_SESSION['username']; ?> </a>
                    </li>
                <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Header -->
<?php
$PostIDFromURL = $_GET["slug"];
$ViewQuery = "SELECT * FROM post WHERE slug = '$PostIDFromURL'";
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
<header class="masthead" style="background-image: url('./upload/<?= $Image; ?>');">
    <div class="overlay"></div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-8 col-md-10 mx-auto">
                    <div class="site-heading">
                        <h1><?= htmlentities($Title); ?></h1>
                        <span class="subheading">Posted by<?= htmlentities($Admin); ?> <?= htmlentities($DateTime); ?></span>
                    </div>
                </div>
            </div>                           
        </div>
</header>
<?php
}
?>

<!-- Post Content -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-10 col-md-10 mx-auto">
            <?php
            $PostIDFromURL = $_GET["slug"];
            $ViewQuery = "SELECT * FROM post WHERE slug = '$PostIDFromURL'";
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
            <p><?= ($Content); ?></p>
            <?php
            }
            ?>
        </div>
    </div>
</div>
<hr>
<a href="#comment" class="badge badge-light" style="margin-left: 17%;"><i class="far fa-comment">&nbsp;Comments</i></a>
<div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">  
        <!-- Single Comment -->
        <?php
        $PostIdFromComments = $_GET['slug'];
        $ExtractingCommentQuery = "SELECT * FROM comment, user, post WHERE slug = '$PostIdFromComments' AND status = 'ON' AND comment.iduser = user.iduser";
        $Execute = mysqli_query($Connection, $ExtractingCommentQuery);
        while ($DataRows = mysqli_fetch_array($Execute)) {
            $IdComment = $DataRows['idcomment'];
            $CommentName = $DataRows['username'];
            $Comments = $DataRows['comments'];
        ?> <br>
        <div class="media mb-4">
            <img class="d-flex mr-3 rounded-circle" src="./images/comment.png" alt="" width="45px;" height="45px;">
            <div class="media-body">
                <h5 class="mt-0"><?= $CommentName ?></h5>
                <span><?= nl2br($Comments); ?></span>
            </div>
        </div>
        <?php
        }
        ?>
        <hr>
       <!-- Comments Form -->
        <div class="card-body">
            <form action="post.php?id=<?= $PostId; ?>" method="post" enctype="multipart/form-data" id="cmt">
                <div class="form-group">
                    <input type="hidden" name="comment_id" id="commentId" placeholder="Name" />
                    <textarea disabled class="form-control" rows="2" placeholder="Write something here" id="commentarea" name="Comment"></textarea>
                </div>
                <button disabled type="submit" name="comment" id="comment" class="btn btn-primary">Comments</button>
            </form>
        </div>
    </div>
</div>

<!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/tuanseenit">
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/clean-blog.min.js"></script>
</body>
</html>