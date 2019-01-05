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
    <link rel="stylesheet" href="css/bootstrap4.min.css">
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/lora.css">
    <link rel="stylesheet" href="css/opensans.css">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="css/clean-blog.min.css">

  </head>

  <body>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
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
                    <a class="nav-link" href="tb.php">Bài viết</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="about.php">Giới thiệu</a>
                </li>
                <?php
                if(empty($_SESSION['username'])) { ?>
                    <li class="nav-item">
                        <a class="nav-link" href="tb.php">Đăng nhập</a>
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
<script src="js/jquery-3.3.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap4.min.js"></script>
<script src="js/clean-blog.min.js"></script>

  </body>

</html>