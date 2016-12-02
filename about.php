<?php
  include("connect.php");
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>About Us - DreamTeam Luleå</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script
	<script type='text/javascript' src="https://imsky.github.io/holder/holder.js"></script>
	<link href="style.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
	<link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	      <form class="navbar-form navbar-right">
			<a href="login.php" class="btn btn-default">Sign in</a>
			<a href="register.php" class="btn btn-primary">Register</a>
		  </form>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
	</nav>
    <div class="container">
      <div class="row marketing">
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
        <p>&copy; 2016 #DreamTeam Inc, by Reppe & Tobias. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>