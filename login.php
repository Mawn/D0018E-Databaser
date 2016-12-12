<?php
  include("connect.php");
  session_start();
  
  if(isset($_SESSION['login_user'])){
    header("location: index.php");
  }
  
  if(isset($_POST['submit'])){
    $email = htmlspecialchars($_POST['email']);
    $password = hash('md5', htmlspecialchars($_POST['password']));
	
    $sql = "SELECT id FROM user WHERE email = '$email' and password = '$password'";
    $result = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($result);
    $id = $row['id'];
    $count = mysqli_num_rows($result);
    mysqli_free_result($result);
    if($count == 1) {
      $_SESSION['login_user'] = $id;
      header("location: index.php");
    } else {
      $error = "Your Login Name or Password is invalid";
    }
  }
  
  /*mysqli_close($conn); */
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Sign in - DreamTeam Luleå</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
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
		  margin-bottom: 20px;
    }
	  .username-text {
	    color: #5a5a5a;
		  padding-left: 2px;
		  margin-top: 10px;
		  margin-bottom: 5px;
		  font-weight: bold;
	  }
	  .password-text {
	    color: #5a5a5a;
		  padding-left: 2px;
		  margin-bottom: 5px;
		  font-weight: bold;
	  }
	  .signup-text {
	    color: #5a5a5a;
		  padding-left: 15px;
		  font-weight: bold;
	  }
	  footer {
      position: absolute;
      bottom: 0;
		  left: 42%;
    }
	  .form-signin {
	    margin-left: 5%;
	    width: 90%;
	  }
	  .submit {
	    margin-top: 5px;
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
			<a href="#" class="btn btn-default">Sign in</a>
			<a href="register.php" class="btn btn-primary">Register</a>
		  </form>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
	</nav>
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-md-offset-4">
		  <h1 class="header-text"><center>Sign in to DreamTeam</center></h1>
		  <div class="well well-sm">
		    <form class="form-signin" action="" method="post">
			  <div class="username-text">Email address</div>
              <input type="email" class="form-control" name="email" required autofocus><br>
			  <div class="password-text">Password</div>
              <input type="password" class="form-control" name="password" required><br>
              <button class="btn btn-md btn-primary btn-block submit" type="submit" name="submit" value="submit">Sign in</button>
            </form>
		  </div>
		  <div class="well well-md">
		    <div class="signup-text">Dont have an account? <a href="register.php">Sign up for free!</a></div>
		  </div>
		</div>
	  </div>

      <!-- FOOTER -->
      <footer>
        <p>&copy; 2016 #DreamTeam Inc, by Reppe & Tobias.</p>
      </footer>

    </div> 
	<!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>