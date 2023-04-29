<?php
session_start();

$acc_username = "JLCyrus";
$acc_password = "Thisisthepassword1234";
$acc_fullname = "John Lloyd Cyrus Ola";
$acc_address = "Marindue PH";

$url_add = "http://".$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];

if (isset($_REQUEST['login_button']) === true)
{
	if($_REQUEST['In_userName'] !=$acc_username)
	{
		header("location: ".$url_add. "?wrong1");
	}

	else if($_REQUEST['In_userName'] == $acc_username && $_REQUEST['In_userPassword'] != $acc_password)
	{
		header("location: ".$url_add. "?wrong2");
	}
	
	else if($_REQUEST['In_userName'] == $acc_username && $_REQUEST['In_userPassword'] == $acc_password)
	{
		header("location: ".$url_add. "?success");
		$_SESSION['see_username'] = $acc_username;
		$_SESSION['see_password'] = $acc_password;
		$_SESSION['see_fullname'] = $acc_fullname;
		$_SESSION['see_address'] = $acc_address;
	}
	
}

?>


<!doctype html>
<html lang="en">
  <head>
  	<title>MyTumblr Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
	
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 col-lg-5">
					<div class="login-wrap p-4 p-md-5">
						<div class="icon d-flex align-items-center justify-content-center">
							<span class="fa fa-user-o"></span>
						</div>
						<h3 class="text-center mb-4">MyTumblr Login</h3>
						
						<form action="#" class="login-form">
							<?php
								if(isset($_REQUEST['wrong1']) === true)
								{
									echo"<div class ='alert alert-danger' role = 'alert'>
										Username is not on the Database
									</div>";
									
								}
								else if(isset($_REQUEST['wrong2']) === true )
								{
									echo "<div class ='alert alert-warning' role = 'alert'>
										Incorrect Password
									</div>";
									
								}
								else if(isset($_REQUEST['success']) === true )
								{
									echo "<div class ='alert alert-success' role = 'alert'>
										Redirecting...
									</div>";
									header("Refresh: 3; url=account.php");
								}
								else if(isset($_REQUEST['loginfirst']) === true )
								{
									echo "<div class ='alert alert-success' role = 'alert'>
										Please Log In First.
									</div>";
									
								}
								else if(isset($_REQUEST['logout']) === true )
								{
									echo "<div class ='alert alert-info' role = 'alert'>
										Thank You...
									</div>";
									
								}
								else if(isset($_SESSION['logout']) === true )
								{
									echo "<div class ='alert alert-warning' role = 'alert'>
										Your Still Log In.
										Please <a href='account.php'>Click Here</a> to go back
									</div>";
									
								}
							?>
							<div class="form-group">
								
							
								<input type="text" class="form-control rounded-left" placeholder="Username" name="In_userName" required>
							</div>
							<div class="form-group d-flex">
								<input type="password" class="form-control rounded-left" placeholder="Password" name="In_userPassword" required>
							</div>
							
							<div class="form-group d-md-flex">
								<div class="w-50">
									<label class="checkbox-wrap checkbox-primary">Remember Me
									<input type="checkbox" checked>
										<span class="checkmark"></span>
									</label>
								</div>
										<div class="w-50 text-md-right">
											<a href="#">Forgot Password</a>
										</div>
							</div>
							<div class="form-group">
								<button type="submit" class="btn btn-primary rounded submit p-3 px-5" name = "login_button">Get Started</button>
							</div>
							
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>

  <!--<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script> -->

	</body>
</html>

