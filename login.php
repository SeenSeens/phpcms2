<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if(isset($_POST['submit'])) {
    $Username = mysqli_real_escape_string($Connection, $_POST['Username']);
    $Password = mysqli_real_escape_string($Connection, $_POST['Password']);
	if(empty($Username) || empty($Password)) {
		$_SESSION["ErrorMessage"] = 'All Fields must be filled out';
        Redirect_to("login.php");
        die();
	} 
    $Found_Account = Login_Attempt($Username, $Password);
    var_dump($Found_Account); die();
    // $_SESSION["User_Id"] = $Found_Account["idadmin"];
    // $_SESSION["Username"] = $Found_Account["nameadmin"];
    if($Found_Account) {
        $_SESSION["SuccessMessage"] = "Welcome {$_SESSION["Username"]}";
        Redirect_to("dashboard.php");
    } else {
        $_SESSION["ErrorMessage"] = "Invalid Username / Password";
        Redirect_to("login.php");
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Categories</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminstyle.css">
	<style type="text/css">
		.FieldInfo {
			color: rgb(251, 174, 44);
			font-family: Bitter, Georgia, "Times New Roman", Times, serif;
			font-size: 1.2em;
		}
	</style>
</head>
<body>	
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <br><br><br><br>
            <h1 style="text-align: center;">Welcome back!</h1>
            <?php
                echo Message();
                echo SuccessMessage();
            ?>
            <div>
                <form action="login.php" method="post">
                    <fieldset>
                        <div class="form-group">
                            <label for="username">
                                <span class="FieldInfo">UserName:</span>
                            </label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user text-primary"></span>
                                </span>
                                <input class="form-control" type="text" name="Username" id="username" placeholder="Username">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">
                                <span class="FieldInfo">Password:</span>
                            </label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock text-primary"></span>
                                </span>
                                <input class="form-control" type="password" name="Password" id="password" placeholder="Password">
                            </div>								
                        </div>
                        <input class="btn btn-info btn-block" type="submit" name="submit" value="Login">
                    </fieldset>
                </form>
            </div>
        </div>
    </div> <!-- End Row -->
</div> <!-- End Container -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>