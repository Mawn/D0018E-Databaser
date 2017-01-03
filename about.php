<?php
  include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>About Us - DreamTeam Luleå</title>
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
	    .featurette-divider {
        margin: 5rem 0;
      }
      .featurette-heading {
        font-weight: 300;
        line-height: 1;
        letter-spacing: -.05rem;
        margin-top: 50px;
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
            <li>
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
			<li class="active">
              <a href="#">About</a>
            </li>
            <li>
              <a href="contact.php">Contact</a>
            </li>
          </ul>
	      <?php if(isset($_SESSION['login_user'])): ?>
        <ul class="nav navbar-nav navbar-right">
		      <li class="dropdown">
			      <a href="#"><?php echo $login_firstname." ". $login_lastname ?> <small><span class="glyphicon glyphicon-cog"></span></small></a>
			      <ul class="dropdown-menu">
			        <li>
			    	    <a href="orders.php">Orders</a>
			        </li>
				      <li>
				        <a href="settings.php">Settings</a>
				      </li>
				      <li>
				        <a href="logout.php">Log Out</a>
				      </li>
			      </ul>
			    </li>
			    <li>
				    <a href="cart.php">Cart &nbsp<span style="font-size:1.15em;" class="glyphicon glyphicon-shopping-cart"></span> <span class="label label-info" style="margin-left: 10px;font-size: 15px"><?php echo $login_numofitems ?></span></span></a>
			    </li>
	      </ul>
          <?php else: ?>
	        <form class="navbar-form navbar-right">
			  <a href="login.php" class="btn btn-default">Sign in</a>
			  <a href="register.php" class="btn btn-primary">Register</a>
		    </form>
		  <?php endif ?>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
	</nav>
    <div class="container">
      <div class="row featurette">
        <div class="col-md-4">
          <img class="featurette-image img-fluid mx-auto" src="images/favicon.png" width="50%" height="50%" style="margin-top: 20%;">
        </div>
        <div class="col-md-8">
          <h2 class="featurette-heading">Oh yeah, it's that good. <br><span class="text-muted" style="font-size: 0.65em;">See for yourself.</span></h2>
          <p class="lead">DreamTeam Luleå is an E-Commerce Website made by Jesper Öhman, Tobias Arvidsson. The website sells electronic devices and computer peripherals. It is built in Bootstrap Framework, PHP, JavaScript (JQuery), MYSQL for database.</p>
        </div>
      </div>
      
      <hr class="featurette-divider">
      
      <div class="row featurette">
        <div class="col-md-8">
          <h2 class="featurette-heading">Luleå Tekniska Universitet <br><span class="text-muted" style="font-size: 0.65em;">Great ideas do indeed grow below zero!</span></h2>
          <p class="lead">This website is made as part of a school project in the course D0018E.</p>
        </div>
        <div class="col-md-4">
          <img class="featurette-image img-fluid" src="https://lh4.googleusercontent.com/-jDIogEt2EAE/AAAAAAAAAAI/AAAAAAAAAA0/rtGmITAXEiA/s0-c-k-no-ns/photo.jpg" width="50%" height="50%" style="margin-top: 20%;">
        </div>
      </div>

      <!-- FOOTER -->
      <footer>
        <p>&copy; 2016 #DreamTeam Inc, by Reppe & Tobias.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>