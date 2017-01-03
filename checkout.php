<?php
  include("session.php");
  
  if(!isset($login_email)){
    header('location: index.php');
  }
  $sql = "SELECT * FROM cart WHERE userid = '$login_id'";
  $result = mysqli_query($conn, $sql);
  $i = 0;
  while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
    $productid[$i] = $row['productid'];
    $amount[$i] = $row['amount'];
    $i = $i + 1;
  }
  mysqli_free_result($result);
  for($j=0; $j<$i; $j++){
    $sql = "SELECT name, price, stock, imageurl FROM products WHERE id = '$productid[$j]'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQL_ASSOC);
    $productname[$j] = $row['name'];
    $productprice[$j] = $row['price'];
    $productstock[$j] = $row['stock'];
    $productimageurl[$j] = $row['imageurl'];
    mysqli_free_result($result);
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Checkout - DreamTeam Luleå</title>
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
	  body {
	    background-image: url("images/Blue.png");
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
	  	min-height: 72vh;
	  }
	  .input-text {
	    color: #5a5a5a;
		  padding-left: 2px;
		  margin-top: 10px;
		  margin-bottom: 5px;
		  font-weight: bold;
	  }
	  .form-checkout {
	    margin-left: 5%;
	    width: 90%;
	  }
	  .table-fixed tbody {
		  height: 190px;
		  overflow-y: auto;
		  margin-left: 5%;
		  width: 90%;
		}
		.table-fixed thead {
		  margin-left: 5%;
		  width: 90%;
		}
		.table-fixed thead, .table-fixed tbody, .table-fixed tr, .table-fixed td, .table-fixed th {
		  display: block;
		}
		.table-fixed tbody td, .table-fixed thead > tr> th {
		  float: left;
		  border-bottom-width: 0;
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
			    <li class="active">
				    <a href="cart.php">Cart &nbsp<span style="font-size:1.15em;" class="glyphicon glyphicon-shopping-cart"></span> <span class="label label-info" style="margin-left: 10px;font-size: 15px"><?php echo $login_numofitems ?></span></span></a>
			    </li>
	      </ul>
      </div>
        <!-- /.navbar-collapse -->
    </div>
      <!-- /.container -->
  </nav>
	  <div class="container">
	  	<div class="row">
	  		<div class="col-md-8 col-md-offset-2">
	  			<div class="panel panel-default">
					  <div class="panel-heading">Checkout</div>
					  <div class="panel-body">
					    <div class="input-text" style="margin-left: 5%; margin-top: -5px;"><u>Order Information</u>:</div>
						  <table class="table table-fixed">
			          <thead>
			            <tr>
			              <th class="col-md-2">ID #</th><th class="col-md-5">Name</th><th class="col-md-3" style="text-align: center;">Quantity</th><th class="col-md-2">Price</th>
			            </tr>
			          </thead>
			          <tbody>
			          	<?php for($n=0; $n<$i; $n++): ?>
			            <tr>
			              <td class="col-md-2"><?php echo $productid[$n] ?></td><td class="col-md-6"><?php echo $productname[$n] ?></td><td class="col-md-2"><?php echo $amount[$n] ?></td><td class="col-md-2"><?php $total = $total + ($productprice[$n] * $amount[$n]); echo $productprice[$n] * $amount[$n] ?></td>
			            </tr>
									<?php endfor ?>
			          </tbody>
			        </table>
			        <div class="pull-right input-text" style="margin-top: -20px; margin-right: 5%;">Total price of order: <?php echo $total ?></div>
							<form class="form-checkout" action="orders.php" method="post">
								<input type="hidden" class="form-control" value="<?php echo $total ?>" name="totalprice">
								<div class="input-text">Credit Card Number</div>
								<input type="text" class="form-control" value="XXXX-XXXX-XXXX-XXXX" name="creditcard" required readonly><br>
								<div class="input-text">Shipping Name</div>
							  <input type="text" class="form-control" name="shippingname" required><br>
								<div class="input-text">Shipping Address</div>
							  <input type="text" class="form-control" name="shippingaddress" required><br>
							  <div class="row">
							  	<div class="col-md-6">
										<div class="input-text">Country</div>
									  <input type="text" class="form-control" name="country" required>
							  	</div>
							  	<div class="col-md-6">
										<div class="input-text">Zip</div>
									  <input type="text" class="form-control" name="zip" required>
							  	</div>
							  </div>
					  </div>
					  <div class="panel-footer">
					  	<div class="row">
					  		<div class="col-md-6">
					  			<button class="btn btn-md btn-success btn-block" type="submit" name="submit">Create Order</button>
					  		</div>
					    </form>
					  		<a href="cart.php">
					  		<div class="col-md-6">
					  	        <button class="btn btn-md btn-danger btn-block" name="return">Back to Cart</button>
					  		</div>
					  		</a>
					  	</div>
					  </div>
					</div>
	  		</div>
	  	</div>
	  </div>
  </body>
</html>