<?php require_once 'include/db.php'; ?>
<?php require_once 'include/sessions.php'; ?>
<?php require_once 'include/functions.php'; ?>

<?php
if (isset($_POST['submit'])) {
    $Username = mysqli_real_escape_string($Connection, $_POST['Username']);
    $Email = mysqli_real_escape_string($Connection, $_POST['Email']);
    $Password = mysqli_real_escape_string($Connection, $_POST['Password']);
    $ConfirmPassword = mysqli_real_escape_string($Connection, $_POST['ConfirmPassword']);
    if (empty($Username) || empty($Email) || empty($Password)) {
        $_SESSION["ErrorMessage"] = 'All Fields must be filled out';
		Redirect_to("register.php");
		die();
    }
    if (strlen($Password) < 4 ) {
		$_SESSION["ErrorMessage"] = "Atleast 4 Characters For Password are required";
		Redirect_to("register.php");
		die();
	}	
	if ($Password !== $ConfirmPassword) {
		$_SESSION["ErrorMessage"] = "Password / ConfirmPassword does not match";
		Redirect_to("register.php");
		die();
	}
    $Query = "INSERT INTO user (username, email, password) VALUES ('$Username', '$Email', '$Password')";
	$Execute = mysqli_query($Connection, $Query);
	if ($Execute) {
		$_SESSION["SuccessMessage"] = "User Added Successfully";
		Redirect_to("loginuser.php");
	} else {
		$_SESSION["ErrorMessage"] = "User faild to add";
		Redirect_to("register.php");
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-4 col-sm-4">
            <form action="register.php" method="post">
                <fieldset>
                    <div class="form-group">
                        <label for="username">
                            <span class="FieldInfo">Username:</span>
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-user text-primary"></span>
                            </span>
                            <input class="form-control" type="text" name="Username" id="username" placeholder="Username">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">
                            <span class="FieldInfo">Email:</span>
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-envelope text-primary"></span>
                            </span>
                            <input class="form-control" type="email" name="Email" id="email" placeholder="Email">
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
                    <div class="form-group">
                        <label for="confirmpassword">
                            <span class="FieldInfo">Confirm Password:</span>
                        </label>
                        <div class="input-group input-group-lg">
                            <span class="input-group-addon">
                                <span class="glyphicon glyphicon-lock text-primary"></span>
                            </span>
                            <input class="form-control" type="password" name="ConfirmPassword" id="confirmpassword" placeholder="Confirm Password">
                        </div>								
                    </div> 
                    <input class="btn btn-info btn-block" type="submit" name="submit" value="Registration">
                </fieldset>
            </form>
        </div>   
    </div> <!-- End Row -->
</div> <!-- End Container -->




<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</body>
</html>