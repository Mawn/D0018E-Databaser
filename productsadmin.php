<?php
  include("session.php");
  
  if(!$login_isAdmin){
  	header('location: index.php');
  }
  if(isset($_POST['submit'])){
  	$productname = $_POST['productname'];
  	$productprice = $_POST['productprice'];
  	$productcategory = $_POST['productcategory'];
  	if($productcategory == "Mice"){
  		$productcategory = 1;
  	} else if($productcategory == "Keyboards"){
  		$productcategory = 2;
  	} else if($productcategory == "Monitors"){
  		$productcategory = 3;
  	} else if($productcategory == "Mousepads"){
  		$productcategory = 4;
  	} else {
  		$productcategory = 5;
  	}
  	$productstock = $_POST['productstock'];
  	$productimageurl = $_POST['productimageurl'];
  	$productdescription = "Placeholder";
  	$sql = "INSERT INTO products (name, price, categoryid, stock, description, imageurl) VALUES ('$productname', '$productprice', '$productcategory', '$productstock', '$productdescription', '$productimageurl')";
  	mysqli_query($conn, $sql);
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
  $sql = "SELECT * FROM productcategory";
  $result = mysqli_query($conn,$sql);
  $k = 0;
  while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
    $catid[$k] = $row['id'];
    $catname[$k] = $row['name'];
    $caturl[$k] = $row['url'];
    $k = $k + 1;
  }
  mysqli_free_result($result);
?> 
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Products - DreamTeam Luleå</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type='text/javascript' src="https://imsky.github.io/holder/holder.js"></script>
	<link href="style.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
	<script src="products.js"></script>
	<link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
	  body {
	  	background-image: url("images/Blue.png");
	  }
	  /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 340px} /* 340 default */
    
    /* Set gray background color and 100% height */
	  .container{
		  padding-left: 23px;
	  }
    .sidenav {
	    margin-top: 20px;
      background-color: #f5f5f5;
      height: 100%;
	    border-color: #ffffff;
	    border: 1px solid #e3e3e3;
	    border-radius: 3px;
	    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
			box-shadow: inset 0 1px 1px rgba(0, 0, 0, .05);
    }
	  .panel-heading {
	    height: 60px;
		  border-bottom: 1px solid #E1E8EE;
		  padding: 20px 30px;
		  color: #5E6977;
		  font-size: 18px;
		  font-weight: 400;
	  }
	  .panel-body{
	  	min-height: 55vh; /* use 72 after description is done */
	  }
	  .input-text {
	    color: #5a5a5a;
		  padding-left: 2px;
		  margin-top: 0px;
		  margin-bottom: 5px;
		  font-weight: bold;
	  }
	  .form-add {
	    margin-left: 5%;
	    width: 90%;
	  }
	  .table-fixed tbody {
		  height: 400px;
		  overflow-y: auto;
		  margin-left: 0%;
		  width: 100%;
		}
		.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
		  display: block;
		}
		.table-fixed tbody td, .table-fixed thead > tr> th {
		  border-bottom-width: 0;
		}
    input[type='number'] {
      -moz-appearance:textfield;
    }	  
    input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
      -webkit-appearance: none;
    }
	  .glyphicon-remove {
	    margin-left: 15px;
	    font-size: 1.5em;
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
			<li class="dropdown active">
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
      </div>
	</nav>
	  <div class="userid" style="display:none"><?php echo $login_id ?></div>
    <div class="container">
      <div class="container-fluid">
        <div class="row content" style="height: 500px;">
          <div class="col-sm-3 sidenav hidden-xs">
            <h2>Products</h2>
            <ul class="nav nav-pills nav-stacked">
              <li class="active"><a href="#">All Products</a></li>
						  <?php for($n=0;$n<$k;$n++): ?>
							<li><a href="products/<?= $caturl[$n] ?>"><?= $catname[$n] ?></a></li>
				      <?php endfor ?>
            </ul><br>
            <h2>Admin Panel</h2>
            <ul class="nav nav-pills nav-stacked">
            	<li><a href="products.php">Product View</a></li>
            	<li class="active"><a href="#">Admin View</a></li>
            </ul>
          </div>
          <br>
		  <div class="col-sm-9">
			  <div class="col-md-6">
			  	<div class="panel panel-default">
			  		<div class="panel-heading">Add a Product</div>
			  		<div class="panel-body">
			  			<form class="form-add" action="" method="post">
				      <div class="input-text">Product Name</div>
							<input type="text" class="form-control" name="productname" required><br>
							<div class="input-text">Price</div>
							<input type="number" class="form-control" name="productprice" required><br>
							<div class="input-text">Product Category</div>
							<select class="form-control" name="productcategory">
								<?php for($n=0;$n<$k;$n++): ?>
								<option><?= $catname[$n] ?></option>
								<?php endfor ?>
							</select><br>
							<div class="input-text">Stock</div>
							<input type="number" class="form-control" name="productstock" required><br>
							<!---<div class="input-text">Description</div>
							<input type="text" class="form-control" value="Placeholder" name="productdescription" required readonly><br>-->
							<div class="input-text">Image URL</div>
							<input type="text" class="form-control" name="productimageurl" required><br>
							<button class="btn btn-md btn-success btn-block" type="submit" name="submit">Add Product</button>
							</form>
				  	</div>
			  	</div>
			  </div>
			  <div class="col-md-6">
			  	<div class="panel panel-default">
			  		<div class="panel-heading">Remove a Product</div>
				  	<div class="panel-body">
				  		<table class="table table-fixed">
			          <thead>
			            <tr>
			              <th class="col-md-2">ID #</th><th class="col-md-4">Name</th><th class="col-md-3">Price</th><th class="col-md-2">Remove</th>
			            </tr>
			          </thead>
			          <tbody>
			          	<?php for($n=0; $n<$i; $n++): ?>
			            <tr>
			              <td class="col-md-2 productid"><?php echo $prodid[$n] ?></td><td class="col-md-4"><?php echo $prodname[$n] ?></td><td class="col-md-3"><?php echo $prodprice[$n] ?></td>
							    	<td class="col-md-2" style="vertical-align: middle"><a name="remove" class="removeRow" href=""><span class="glyphicon glyphicon-remove"></span></a></td>
									<?php endfor ?>
			          </tbody>
			        </table>
				  	</div>
			  	</div>
			  </div>
		  </div>
	    </div>
	  </div>
    </div> <!-- /container -->
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>