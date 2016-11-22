<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Front-End Test</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script
	<script type='text/javascript' src="https://imsky.github.io/holder/holder.js"></script>
	<link href="style.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 340px}
    
    /* Set gray background color and 100% height */
    .sidenav {
	  margin-top: 20px;
      background-color: #f5f5f5;
      height: 100%;
	  border-color: ¤ffffff;
	  border: 1px solid #e3e3e3;
	  border-radius: 3px;
	  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
			  box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }
	.carousel {
	  height: 340px;
	  margin-bottom: 60px;
	}
	.carousel .item {
	  height: 340px;
	  background-color: #777;
	}
	.carousel-inner > .item > img {
	  position: absolute;
	  top: 0;
	  left: 0;
	  min-width: 40%;
	  height: 340px;
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
	  
	  $sql = "SELECT * FROM products";
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
    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation">
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
            <li>
		      <a href="index.html">Home</a>
			</li>
			<li class="dropdown active">
			  <a href="#">Products <small><span class="glyphicon glyphicon-menu-down"></span></small></a>
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
              <a href="about.html">About</a>
            </li>
            <li>
              <a href="contact.html">Contact</a>
            </li>
          </ul>
	      <form class="navbar-form navbar-right">
			<div class="form-group">
			  <input type="text" placeholder="Email" class="form-control">
			</div>
			<div class="form-group">
			  <input type="password" placeholder="Password" class="form-control">
			</div>
			<button type="submit" class="btn btn-info">Sign in</button>
	      </form>
        </div>
      </div>
	</nav>
	
    <div class="container">
      <div class="container-fluid">
        <div class="row content">
          <div class="col-sm-3 sidenav hidden-xs">
            <h2>Products</h2>
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#">All Products</a></li>
              <li><a href="mice.php">Mice</a></li>
              <li><a href="keyboards.php">Keyboards</a></li>
              <li><a href="monitors.php">Monitors</a></li>
			  <li><a href="mousepads.php">Mouse Pads</a></li>
			  <li><a href="headsets.php">Headsets</a></li>
            </ul><br>
          </div>
          <br>
		  <div class="col-sm-9">
			<div class="col-sm-12">
			  <div id="carousel" class="carousel slide" data-ride="carousel">
				<!-- Indicators -->
				<ol class="carousel-indicators">
				  <li data-target="#carousel" data-slide-to="0" class="active"></li>
				  <li data-target="#carousel" data-slide-to="1"></li>
				  <li data-target="#carousel" data-slide-to="2"></li>
				</ol>
			    <div class="carousel-inner" role="listbox">
				  <div class="item active">
				    <a href="products.html">
				      <img class="first-slide" src="http://lorempixel.com/500/300/animals" alt="First slide" width="100%"></img>
				    </a>
				  </div>
				  <div class="item">
				    <a href="products.html">
				      <img class="second-slide" src="http://lorempixel.com/500/300/abstract" alt="Second slide" width="100%"></img>
				    </a>
				  </div>
				  <div class="item">
				    <a href="products.html">
				      <img class="third-slide" src="http://lorempixel.com/500/300/nature" alt="Third slide" width="100%"></img>
				    </a>
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
			  </div><!-- /.carousel -->
			</div>
			<?php for($j=0;$j<$i;$j++): ?>
			  <div class="col-sm-4">
			    <div class="well well-sm">
				  <img class="img-thumbnail" src="<?= $prodimageurl[$j] ?>" height="240" width="240">
				  <p><strong><?= $prodname[$j] ?></strong></p>
				  <p><?= $prodprice[$j] ?></p>
				  <button class="btn btn-block btn-primary">Add to Cart</button>
			    </div>
			  </div>
			<?php endfor ?>
		  </div>
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