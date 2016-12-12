<?php
  include("session.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>DreamTeam Luleå - The Best E-Commerce Store</title>
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
	  .carousel {
        margin-top: 20px;
	    margin-bottom: 60px;
	  }
	  .carousel-inner > .item > img, .carousel-inner > .item > a > img {
		width: 100%;
	    height: 100%;
	  }
	  .carouseltext {
		margin-bottom: 150px;
	  }
	  .btn-theme {
	    margin-left: 15px;
		margin-bottom: -5px;
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
          <a class="navbar-brand" href="#">#Dreamteam</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <li class="active">
			  <a href="#">Home</a>
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

    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel" data-slide-to="0" class="active"></li>
        <li data-target="#carousel" data-slide-to="1"></li>
		<li data-target="#carousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
	    <div class="item active">
	      <img class="first-slide" src="images/Spectrum.png" alt="Login/Register" width="100%"></img>
		  <div class="container">
		    <div class="carousel-caption">
			  <div class="col-md-12">
			    <?php if(isset($_SESSION['login_user'])): ?>
			    <h2 class="carouseltext">Welcome to DreamTeam Luleå, <?php echo $login_firstname ?>!</h2>
				  <p>View your orders or change your account settings here!</p>
				  <div>
            <a class="btn btn-primary btn-min-block btn-theme" href="settings.php">Settings</a>
				    <a class="btn btn-default btn-min-block btn-theme" href="orders.php">Orders</a>
				  </div>
				  <?php else: ?>
			    <h2 class="carouseltext">Welcome to DreamTeam Luleå!</h2>
				  <p>Login or register an account for free!</p>
				  <div>
            <a class="btn btn-primary btn-min-block btn-theme" href="login.php">Login</a>
				    <a class="btn btn-default btn-min-block btn-theme" href="register.php">Register</a>
				  </div>
				  <?php endif ?>
			  </div>
			</div>
		  </div>
	    </div>
        <div class="item">
		  <a href="products.php">
            <img class="second-slide" src="images/BlackFriday.png" alt="Black Friday" width="100%"></img>
		  </a>
        </div>
		<div class="item">
          <img class="third-slide" src="images/Niklasbur.gif" alt="NIKLAS BUR"></img>
        </div>
      </div>
      <a class="left carousel-control" href="#carousel" role="button" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#carousel" role="button" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>
	<!-- /.carousel -->
	<div class="row">
      <div class="col-lg-6">
        <h4>Subheading</h4>
        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>
          
		<h4>Subheading</h4>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

        <h4>Subheading</h4>
        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
      </div>
      <div class="col-lg-6">
        <h4>Subheading</h4>
        <p>Donec id elit non mi porta gravida at eget metus. Maecenas faucibus mollis interdum.</p>

        <h4>Subheading</h4>
        <p>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Cras mattis consectetur purus sit amet fermentum.</p>

        <h4>Subheading</h4>
        <p>Maecenas sed diam eget risus varius blandit sit amet non magna.</p>
      </div>
    </div>

      <!-- FOOTER -->
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2016 #DreamTeam Inc, by Reppe & Tobias.</p>
      </footer>

    </div> 
	<!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>