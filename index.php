<?php global $Connection;
require_once 'include/db.php'; ?>
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
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&amp;subset=vietnamese">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i&amp;subset=vietnamese" rel="stylesheet">
        <link rel="stylesheet" href="./css/clean-blog.min.css">
        <!-- <base href="../" /> -->
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
                    <a class="nav-link active" href="index.php">Trang chủ</a>
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
<header class="masthead" style="background-image: url('images/home-bg.jpg')">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="site-heading">
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
                <a href="post.php?slug=<?= $Slug; ?>">
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

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="./js/bootstrap.bundle.min.js"></script>
<script src="./js/clean-blog.min.js"></script>
</body>
</html>