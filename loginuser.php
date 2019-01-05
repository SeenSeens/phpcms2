<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if (isset($_POST['login'])) {
    $Email = mysqli_real_escape_string($Connection, $_POST['Email']);
    $Password = mysqli_real_escape_string($Connection, $_POST['Password']);
    // mã hóa pasword
    $Password = md5($Password);
    $Query = "SELECT * FROM user WHERE email='$Email' AND password='$Password'";
    $Execute = mysqli_query($Connection, $Query);
    if (mysqli_num_rows($Execute) == 0) {
        Redirect_to("loginuser.php");
        exit;
    }
    //Lấy mật khẩu trong database ra
    $Row = mysqli_fetch_array($Execute);
    //So sánh 2 mật khẩu có trùng khớp hay không
    if ($Password != $Row['password']) {
        Redirect_to("loginuser.php");
        exit;
    }
    $_SESSION['iduser'] = $Row['iduser'];
    $_SESSION['username'] = $Row['username'];
    $_SESSION['email'] = $Row['email']; 
    Redirect_to("index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="css/fontawesome.css">
    <style>
        body {font-family: Arial, Helvetica, sans-serif;}
        form {border: 3px solid #f1f1f1;}
        input[type=email], input[type=password] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
        }
        button:hover {
        opacity: 0.8;
        }
        .cancelbtn {
            width: auto;
            padding: 10px 18px;
            background-color: #f44336;
        }
        .imgcontainer {
            text-align: center;
            margin: 24px 0 12px 0;
        }
        img.avatar {
            width: 15%;
            border-radius: 50%;
        }
        .container {
            padding: 16px;
        }
        span.psw {
            float: right;
            padding-top: 16px;
        }
        /* Change styles for span and cancel button on extra small screens */
        @media screen and (max-width: 300px) {
            span.psw {
                display: block;
                float: none;
            }
            .cancelbtn {
                width: 100%;
            }
        }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <form action="loginuser.php" method="post">
            <div class="imgcontainer">
                <img src="images/img_avatar2.png" alt="Avatar" class="avatar">
            </div>
            <div class="container">
                <label for="email"><b>Email</b></label>
                <input type="email" placeholder="Enter Email" name="Email" required>

                <label for="password"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="Password" required>

                <button type="submit" name="login">Login</button>
                <label>
                    <input type="checkbox" checked="checked" name="remember"> Remember me
                </label>
            </div>

            <div class="container" style="background-color:#f1f1f1">
                <button type="button" class="cancelbtn">Cancel</button>
                <span class="psw">Forgot <a href="#">password?</a></span>
                <span style="margin-left: 30%;">Bạn chưa có tài khoản vui lòng nhấn <a href="register.php">Đăng ký</a> </span>  
            </div>
        </form>
    </div> <!-- End Row -->
</div> <!-- End Container -->

<script src="js/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>