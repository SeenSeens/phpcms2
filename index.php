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
        <title>Trang chủ</title>
        <link rel="shortcut icon" href="./favicon.ico">
        <!-- Bootstrap core CSS -->
        <link rel="stylesheet" href="css/bootstrap4.min.css">
        <link rel="stylesheet" href="css/fontawesome.css">
        <link rel="stylesheet" href="css/lora.css">
        <link rel="stylesheet" href="css/opensans.css">
        <!-- Custom styles for this template -->
        <link rel="stylesheet" href="css/clean-blog.min.css">
        <!-- <base href="../" /> -->
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
<header class="masthead" style="background-image: url('images/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
                    <h1></h1>
                    <span class="subheading"></span>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Main Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            <?php
            /* TÌM TỔNG SỐ RECORDS */
            $ViewQuery = "SELECT COUNT(*) AS total FROM post";
            $Execute = mysqli_query($Connection, $ViewQuery);
            $row = mysqli_fetch_array($Execute);
            $total_records = $row['total'];
            /* TÌM LIMIT VÀ CURRENT_PAGE */
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 5;
            /* TÍNH TOÁN TOTAL_PAGE VÀ START
            tổng số trang */
            $total_page = ceil($total_records / $limit);
            /* Giới hạn current_page trong khoảng 1 đến total_page */
            if ($current_page > $total_page){
                $current_page = $total_page;
            }
            else if ($current_page < 1){
                $current_page = 1;
            }
            /* Tìm Start */
            $start = ($current_page - 1) * $limit;
            $QueryPage = "SELECT * FROM post ORDER BY created DESC LIMIT $start, $limit";
            $ExecutePage = mysqli_query($Connection, $QueryPage);
            while ($DataRows = mysqli_fetch_array($ExecutePage)) {
                $PostId = $DataRows["idpost"];
				$Category = $DataRows["idcategory"];
				$Admin = $DataRows["idadmin"];
				$Title = $DataRows["title"];
				$Slug = $DataRows["slug"];
				$Image = $DataRows["images"];
				$Content = $DataRows["content"];
				$DateTime = $DataRows["created"];		
            ?>
            <div class="post-preview">
                <a href="post.php?id=<?= $PostId; ?>">
                <img class="card-img-top img-responsive img-rounded" src="upload/<?= $Image; ?>" alt="">
                    <h2 class="post-title"><?= htmlentities($Title); ?></h2>
                    <h3 class="post-subtitle"></h3>
                </a>
                <p class="post-meta">Posted by
                    <a href="#"><?= htmlentities($Admin); ?></a>
                    <?= htmlentities($DateTime); ?></p>
            </div>
            <hr>
            <?php
            }
            ?>
            <!-- Pager -->
            <div class="pagination clearfix">
            <?php
            /* nếu current_page > 1 và total_page > 1 mới hiển thị nút prev */
            if ($current_page > 1 && $total_page > 1){ ?>
                <a class="page-link" href="index.php?page=<?= $current_page-1; ?>">&larr; Older</a>
            <?php
            }
            for ($i = 1; $i <= $total_page; $i++){
                if ($i == $current_page) { ?>
                    <!-- echo '<span>'.$i.'</span> | '; -->

                <?php
                }
                else{
                ?>
                    <!-- echo '<a href="index.php?page='.$i.'">'.$i.'</a> | '; -->
                <?php
                }
            }
            // nếu current_page < $total_page và total_page > 1 mới hiển thị nút Next
            if ($current_page < $total_page && $total_page > 1){ ?>
                <!-- echo '<a href="index.php?page='.($current_page+1).'">Next</a> | '; -->
                <a class="page-link" href="index.php?page=<?= $current_page+1; ?>">Newer &rarr;</a>
            <?php
            }
            ?>
            </div>
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
<!-- Custom scripts for this template -->
<script src="js/clean-blog.min.js"></script>
</body>
</html>