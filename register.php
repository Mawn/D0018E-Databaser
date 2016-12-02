<?php
  include("connect.php");
  session_start();
  
  if(isset($_SESSION['login_user'])){
    header("location: index.php");
  }
  
  if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = hash('md5', htmlspecialchars($_POST['password']));
    $firstname = htmlspecialchars($_POST['firstname']);
	$lastname = htmlspecialchars($_POST['lastname']);
    $age = htmlspecialchars($_POST['age']);
    $country = htmlspecialchars($_POST['country']);
    $zip = htmlspecialchars($_POST['zip']);
    $phonenumber = htmlspecialchars($_POST['phonenumber']);
    $usertype = "Customer";

	$sql = "SELECT * FROM user WHERE email = '$email'";
	$result = mysqli_query($conn, $sql);
    count = mysqli_num_rows($result);
	mysqli_free_result($result);
    if($count == 1) {
      $error = "Email already belongs to another account.";
    }else {
      $sql = "INSERT INTO user (email, password, firstname, lastname, age, country, zip, phonenumber, usertype) VALUES ('$email',' $password', '$firstname', '$lastname', '$country', '$zip', '$phonenumber', '$usertype')";
      mysqli_query($conn,$sql);
    }
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Register - DreamTeam Luleå</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script
	<script type='text/javascript' src="https://imsky.github.io/holder/holder.js"></script>
	<link href="style.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
	<link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	  .header-text {
	    color: #5a5a5a;
	    font-size: 24px;
		margin-top: 0px;
		margin-bottom: 10px;
      }
	  .email-text {
	    color: #5a5a5a;
		padding-left: 2px;
		margin-top: 10px;
		margin-bottom: 3px;
		font-weight: bold;
	  }
	  .field-text {
	    color: #5a5a5a;
		padding-left: 2px;
		margin-bottom: 3px;
		font-weight: bold;
	  }
	  .signin-text {
	    color: #5a5a5a;
		padding-left: 35px;
		font-weight: bold;
	  }
	  footer {
        position: absolute;
        bottom: 0;
		left: 38.5%;
      }
	  .form-signin {
	    margin-left: 5%;
	    width: 90%;
	  }
	  .submit {
	    margin-top: 5px;
	    margin-bottom: 5px;
	  }
	  h2 {
	    color: #5a5a5a;
	    font-size: 20px;
	    margin-top: 0px;
		margin-bottom: 20px;
	  }
      input[type='number'] {
        -moz-appearance:textfield;
      }	  
      input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
        -webkit-appearance: none;
      }
	  .form-control {
        margin-bottom: 10px;
	  }
    </style>
  </head>
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-static-top" role="navigation">
      <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.php">#Dreamteam</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active">
			  <a href="index.php">Home</a>
			</li>
		    <li class="dropdown">
			  <a href="products.php">Products <small><span class="glyphicon glyphicon-menu-down"></span></small></a>
			  <ul class="dropdown-menu">
				<li>
				  <a href="products/mice.php">Mice</a>
				</li>
				<li>
				  <a href="products/keyboards.php">Keyboards</a>
				</li>
				<li>
				  <a href="products/monitors.php">Monitors</a>
				</li>
				<li>
				  <a href="products/mousepads.php">Mouse Pads</a>
				</li>
				<li>
				  <a href="products/headsets.php">Headsets</a>
				</li>
			  </ul>
			</li>
			<li>
              <a href="about.php">About</a>
            </li>
            <li>
              <a href="contact.php">Contact</a>
            </li>
          </ul>
	      <form class="navbar-form navbar-right">
			<a href="login.php" class="btn btn-default">Sign in</a>
			<a href="#" class="btn btn-primary">Register</a>
		  </form>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
	</nav>
    <div class="container">
	<div class="row">
        <div class="col-md-4 col-md-offset-4">
		  <h1 class="header-text"><center>Join the DreamTeam</center></h1>
		  <div class="well well-sm">
		    <h2><center>Create your account</center></h2>
		    <form class="form-signin" action="" method="post">
			  <div class="email-text">Email</div>
              <input type="email" class="form-control" name="email" required autofocus>
			  <div class="field-text">Password</div>
              <input type="password" class="form-control" name="password" required>
			  <div class="field-text">First Name</div>
			  <input type="text" class="form-control" name="firstname" required>
			  <div class="field-text">Last Name</div>
			  <input type="text" class="form-control" name="lastname" required>
			  <div class="field-text">Age</div>
			  <input type="number" class="form-control" name="age" required min="1" max="110">
			  <div class="field-text">Country</div>
			  <input type="text" class="form-control" name="country" required>
			  <div class="field-text">Zip Code</div>
			  <input type="number" class="form-control" name="zip" required>
			  <div class="field-text">Phone Number</div>
			  <input type="text" class="form-control" name="phonenumber" required>
              <button class="btn btn-md btn-primary btn-block submit" type="submit" name="submit" value="submitform">Create an account</button>
            </form>
		  </div>
		  <div class="well well-md">
		    <div class="signin-text">Already have an account? <a href="login.php">Sign in!</a></div>
		  </div>
		</div>
	  </div>

      <!-- FOOTER -->
      <footer>
        <p>&copy; 2016 #DreamTeam Inc, by Reppe & Tobias. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>
    
	<!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
