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
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	  .header-text {
	    color: #5a5a5a;
	    font-size: 24px;
		margin-top: 0px;
		margin-bottom: 10px;
      }
	  .username-text {
	    color: #5a5a5a;
		padding-left: 2px;
		margin-top: 10px;
		margin-bottom: 5px;
		font-weight: bold;
	  }
	  .field-text {
	    color: #5a5a5a;
		padding-left: 2px;
		margin-bottom: 0px;
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
	    margin-bottom: 10px;
	  }
	  h2 {
	    color: #5a5a5a;
	    font-size: 20px;
	    margin-top: 0px;
		margin-bottom: 20px;
	  }
    </style>
  </head>
  <body>
    <?php
	  // Create connection
	  $conn = mysqli_connect("utbweb.its.ltu.se", "jeshma-4", "jeshma-4", "jeshma4db");

	  // Check connection
	  if (mysqli_connect_errno())
	  {
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	  }
       if(isset($_POST['submit'])){
	    $username = htmlspecialchars($_POST['username']);
		$password = hash('md5', htmlspecialchars($_POST['password']));
		$email = htmlspecialchars($_POST['email']);
		$age = htmlspecialchars($_POST['age']);
		$country = htmlspecialchars($_POST['country']);
		$zip = htmlspecialchars($_POST['zip']);
		$phonenumber = htmlspecialchars($_POST['phonenumber']);
       $usertype = "Customer";
		
		
		$sql = "INSERT INTO user (username, password, email, age, country, zip, phonenumber, usertype) VALUES ('$username',' $password', '$email', '$age', '$country', '$zip', '$phonenumber', '$usertype')";
	   mysqli_query($conn,$sql);
	  }
	?> 
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
			  <div class="username-text">Username</div>
              <input type="text" class="form-control" name="username" required autofocus><br>
			  <div class="field-text">Password</div>
              <input type="password" class="form-control" name="password" required><br>
			  <div class="field-text">Email</div>
			  <input type="email" class="form-control" name="email" required><br>
			  <div class="field-text">Age</div>
			  <input type="text" class="form-control" name="age" required><br>
			  <div class="field-text">Country</div>
			  <input type="text" class="form-control" name="country" required><br>
			  <div class="field-text">Zip Code</div>
			  <input type="text" class="form-control" name="zip" required><br>
			  <div class="field-text">Phone Number</div>
			  <input type="text" class="form-control" name="phonenumber" required><br>
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
