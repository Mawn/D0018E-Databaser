<?php
  include("session.php");
  
  if(!isset($login_email)){
    mysql_close($connection);
    header('location: index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Account Settings - DreamTeam Luleå</title>
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
	      <ul class="nav navbar-nav navbar-right">
		    <li class="dropdown">
			  <a href="#"><?php echo $login_firstname." ". $login_lastname ?> <small><span class="glyphicon glyphicon-cog"></span></small></a>
			  <ul class="dropdown-menu">
				<li>
				  <a href="#">Settings</a>
				</li>
				<li>
				  <a href="logout.php">Log Out</a>
				</li>
			  </ul>
			</li>
	      </ul>
        </div>
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
      </nav>
      <?php if($login_isAdmin): ?>
        ADMIN AKBAR! hammas is a cunt
      <?php else: ?>
        looks like ur a pleb FEELSBAD
      <?php endif ?>
	
  </body>
</html>