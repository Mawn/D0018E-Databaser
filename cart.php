<?php
  include("session.php");
  
  if(!isset($login_email)){
    header('location: index.php');
  }
  /*$sql = "INSERT INTO cart (userid, productid, amount) VALUES (1,1,4)";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO cart (userid, productid, amount) VALUES (1,3,3)";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO cart (userid, productid, amount) VALUES (1,6,1)";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO cart (userid, productid, amount) VALUES (1,10,5)";
  mysqli_query($conn, $sql);
  $sql = "INSERT INTO cart (userid, productid, amount) VALUES (1,15,2)";
  mysqli_query($conn, $sql);*/
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
  if(isset($_POST['submit'])){
  	//Make order with cart/items? CALCULATE STOCK??
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Your Cart - DreamTeam Luleå</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script type='text/javascript' src="https://imsky.github.io/holder/holder.js"></script>
	<link href="style.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
	<script src="cart.js"></script>
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
	  .glyphicon-remove {
	    margin-left: 5px;
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
				    <a href="#">Cart &nbsp<span style="font-size:1.15em;" class="glyphicon glyphicon-shopping-cart"></span> <span class="label label-info" style="margin-left: 10px;font-size: 15px"><?php echo $login_numofitems ?></span></span></a>
			    </li>
	      </ul>
      </div>
        <!-- /.navbar-collapse -->
    </div>
      <!-- /.container -->
  </nav>
    <div class="userid" style="display:none"><?php echo $login_id ?></div>
	  <div class="container">
	  	<div class="row">
	  		<div class="col-md-8 col-md-offset-2">
	  			<div class="panel panel-default">
					  <div class="panel-heading">Your Shopping Cart</div>
					  <div class="panel-body pre-scrollable">
					    <table class="table">
							  <thead>
							    <tr>
								  <th style="text-align: center;">Image</th>
								  <th>Name</th>
								  <th>Quantity</th>
								  <th>Price</th>
								  <th>Del</th>
							    </tr>
							  </thead>
							  <tbody>
							  <?php for($n=0; $n<$i; $n++): ?>
							    <tr>
							    	<td style="max-width: 100px;">
							    		<center><img src="<?php echo $productimageurl[$n] ?>" height="96px" width="150px"></img></center>
							    	</td>
							    	<td style="max-width: 90px; word-wrap: break-word; vertical-align: middle;" class="productname"><?php echo $productname[$n] ?></td>
							    	<td>
							    		<div class="row">
							    			<div class="col-md-6">
							    				<p class="amount" style="padding-left: 10px;margin-top: 40px;"><?php echo $amount[$n] ?></p>
							    			</div>
							    	    <div class="productid" style="display:none"><?php echo $productid[$n] ?></div>
							    	    <div class="productprice" style="display:none"><?php echo $productprice[$n] ?></div>
							    			<div class="col-md-6">
							    				<button class="btn btn-sm btn-default quantity plus" style="margin-left: -40px; margin-top: 15px; margin-bottom: 10px; display:block;"><span class="glyphicon glyphicon-plus"></span></button>
							    	      <button class="btn btn-sm btn-default quantity minus" style="margin-left: -40px; display:block;"><span class="glyphicon glyphicon-minus"></span></button>
							    			</div>
							    		</div>
							    	</td>
							    	
							    	<td class="totalprice" style="padding-left: 10px;vertical-align: middle"><?php echo ($productprice[$n] * $amount[$n]) ?> SEK</td>
							      <td style="vertical-align: middle"><a name="remove" class="removeRow" href=""><span class="glyphicon glyphicon-remove"></span></a></td>
								  </tr>
								<?php endfor ?>
							  </tbody>
			        </table>
					  </div>
					  <div class="panel-footer">
					  	<div class="row">
					  		<div class="col-md-6">
					  			<button class="btn btn-md btn-success btn-block" type="submit" name="submit">Checkout</button>
					  		</div>
					  		<div class="col-md-6">
					  	        <button class="btn btn-md btn-danger btn-block clear" name="clear">Clear Cart</button>
					  		</div>
					  	</div>
					  </div>
					</div>
	  		</div>
	  	</div>
	  </div>
  </body>
</html>