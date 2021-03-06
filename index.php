<?php
  include("session.php");
  
  $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 0, 4";
  $result = mysqli_query($conn,$sql);
  $i = 0;
  while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
    $prodid[$i] = $row['id'];
    $prodname[$i] = $row['name'];
    $prodprice[$i] = $row['price'];
    $prodcategoryid[$i] = $row['categoryid'];
    $prodstock[$i] = $row['stock'];
    $proddescription[$i] = $row['description'];
    $prodimageurl[$i] = $row['imageurl'];
    $i = $i + 1;
  }
  mysqli_free_result($result);
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
      margin-top: -5px;
	    margin-bottom: 50px;
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
	  footer {
	  	margin-top: -50px;
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
		<div class="col-md-12">
			<button class="btn btn-md btn-info btn-block" style="margin-top: -45px;">Newest additions to our catalogue.</button>
		</div>
    <?php for($j=0;$j<$i;$j++): ?>
			  <div class="col-sm-3">
			    <div class="well well-sm">
				  <a href="products.php"><img class="img-thumbnail" src="<?= $prodimageurl[$j] ?>" height="240" width="240"></a>
				  <p><strong><?= $prodname[$j] ?></strong></p>
				  <p><?= $prodprice[$j] ?> SEK</p>
			    </div>
			  </div>
			<?php endfor ?>
  </div>

      <!-- FOOTER -->
      <footer>
        <p>&copy; 2016 #DreamTeam Inc, by Reppe & Tobias. &middot; Image rights belong to <a href="https://maxgaming.com">Maxgaming</a>.</p>
      </footer>

    </div> 
	<!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>