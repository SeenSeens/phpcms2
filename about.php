<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Giới thiệu</title>
    <link rel="shortcut icon" href="./favicon.ico">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=vietnamese">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=vietnamese" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="./css/clean-blog.min.css">
</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light fixed-top">
    <div class="container">
    <a class="navbar-brand" href="index.php"></a>
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
                <a class="nav-link active" href="about.php">Giới thiệu</a>
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
                    <a class="nav-link" href="logoutuser.php">&nbsp; <?= $_SESSION['username']; ?> </a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
    </div>
</nav>

<!-- Page Header -->
<header class="masthead" style="background-image: url('images/cover.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="page-heading">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="images/avatar.jpg" alt="" srcset="" class="rounded-circle img-fluid">
                        </div>
                        <div class="col-md-8">
                            <h3>Liên hệ với tôi</h3>
                            <nav class="navbar navbar-expand-sm navbar-light">
                                <ul class="navbar-nav" style="margin-left: 25%;">
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://www.linkedin.com/in/tuanseenit">
                                            <img src="images/LinkedIn.png" alt="" srcset="" class="rounded-circle" width="56px" height="56px">
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://www.facebook.com/tuan.seen.it"><img src="images/fb.png" alt="" srcset="" class="rounded-circle" width="56px" height="56px"></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://github.com/SeenSeens"><img src="images/github.png" alt="" srcset="" class="rounded-circle" width="56px" height="56px"></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="https://www.instagram.com/09xx09x"><img src="images/intagram.png" alt="" srcset="" class="rounded-circle" width="56px" height="56px"></a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
        <p>Tôi chỉ là một người đam mê máy tính và thế giới web, tôi hâm mộ Google, Facebook cũng như mọi website mang lại lợi ích và kết nối mọi người.</p>
    </div>
    </div>
</div>

<hr>

    <!-- Footer -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <ul class="list-inline text-center">
                    <li class="list-inline-item">
                        <a href="https://www.linkedin.com/in/tuanseenit/">
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
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/clean-blog.min.js"></script>
</body>
</html>