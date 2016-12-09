<?php
  include("session.php");
  
  if(!isset($login_email)){
    header('location: index.php');
  }
  if($login_isAdmin){
    $sql = "SELECT id, email, firstname, lastname, usertype from user";
	$result = mysqli_query($conn, $sql);
	$i = 0;
    while($row = mysqli_fetch_array($result, MYSQL_ASSOC)){
      $id[$i] = $row['id'];
      $email[$i] = $row['email'];
      $firstname[$i] = $row['firstname'];
      $lastname[$i] = $row['lastname'];
	  $usertype[$i] = $row['usertype'];
      $i = $i + 1;
    }
    mysqli_free_result($result);
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
	<script src="settings.js"></script>
	<link rel="icon" type="image/png" href="images/favicon.png" sizes="32x32">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<style>
      .header-text {
	    color: #5a5a5a;
	    font-size: 24px;
		margin-top: 0px;
		margin-left: -15px;
		margin-bottom: 10px;
      }
	  .email-text {
	    color: #5a5a5a;
		padding-left: 2px;
		margin-top: 0px;
		margin-bottom: 3px;
		font-weight: bold;
	  }
	  .field-text {
	    color: #5a5a5a;
		padding-left: 2px;
		margin-bottom: 3px;
		font-weight: bold;
	  }
	  .form-signin .col-md-3{
	    margin-left: 5%;
	    width: 90%;
	  }
	  .submit {
	    margin-top: 5px;
	    margin-bottom: 5px;
	  }
	  h2 {
	    color: #5a5a5a;
	    font-size: 20px;
	    margin-top: 0px;
		margin-bottom: 20px;
	  }
      input[type='number'] {
        -moz-appearance:textfield;
      }	  
      input::-webkit-outer-spin-button, input::-webkit-inner-spin-button {
        -webkit-appearance: none;
      }
	  .form-account {
        margin-bottom: 10px;
	  }
	  hr {
	    margin-top: 5px;
		margin-bottom: 10px;
	  }
	  .pre-scrollable {
	    min-height: 702px;
	    max-height: 702px;
	  }
	  .form-admin {
	    height: 30px;
	    margin-top: -5px;
	    padding-top: 3px; /* For School comp */
		margin-bottom: -5px;
	  }
	  select:-moz-focusring {
	    color: transparent;
	    text-shadow: 0 0 0 #000;
	  }
	  .glyphicon-remove {
	    margin-left: 5px;
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
	  <div class="container">
	    <div class="row">
		  <div class="col-md-4">
		    <h1 class="header-text">Account Settings</h1>
		  </div>
		  <?php if($login_isAdmin): ?>
		  <div class="col-md-4">
		    <h1 class="header-text">Admin Settings</h1>
		  </div>
		  <?php endif ?>
		</div>
		<div class="row">
          <div class="col-md-4">
		    <div class="well well-sm">
		      <form class="form-signin" action="" method="post">
			    <div class="email-text">Email</div>
                <input type="email" class="form-control form-account" name="email" value="<?php echo $login_email ?>" required>
			    <div class="field-text">Password</div>
                <input type="password" class="form-control form-account" name="password" placeholder="* * * * * * * * *" required><!--- hunter2? --->
			    <div class="field-text">First Name</div>
			    <input type="text" class="form-control form-account" name="firstname" value="<?php echo $login_firstname ?>" required>
			    <div class="field-text">Last Name</div>
			    <input type="text" class="form-control form-account" name="lastname" value="<?php echo $login_lastname ?>" required>
			    <div class="field-text">Age</div>
			    <input type="number" class="form-control form-account" name="age" value="<?php echo $login_age ?>" min="1" max="110" required>
			    <div class="field-text">Country</div>
			    <input type="text" class="form-control form-account" name="country" value="<?php echo $login_country ?>" required>
			    <div class="field-text">Zip Code</div>
			    <input type="number" class="form-control form-account" name="zip" value="<?php echo $login_zip ?>" required>
			    <div class="field-text">Phone Number</div>
			    <input type="text" class="form-control form-account" name="phonenumber" value="<?php echo $login_phonenumber ?>" required>
              </form>
		    </div>
		    <div class="well well-sm">
			  <div class="field-text">Current Password</div>
              <input type="password" class="form-control form-account" name="password" placeholder="* * * * * * * * *" required>
              <button class="btn btn-md btn-primary btn-block submit" type="submit" name="submit" value="submitform">Save Account Changes</button>
		    </div>
		  </div>
		  <?php if($login_isAdmin): ?>
		  <div class="col-md-8 col-md-offset-0">
		    <div class="well well-sm pre-scrollable">
		      <form class="form-signin" action="" method="post">
			    <table class="table">
				  <thead>
				    <tr>
					  <th>ID</th>
					  <th>Email</th>
					  <th>First Name</th>
					  <th>Last Name</th>
					  <th>User Type</th>
					  <th>Del</th>
				    </tr>
				  </thead>
				  <tbody>
				    <?php for($j=0; $j<$i; $j++): ?>
				    <tr>
					  <td><?php echo $id[$j] ?></td>
					  <td><?php echo $email[$j] ?></td>
					  <td><?php echo $firstname[$j] ?></td>
					  <td><?php echo $lastname[$j] ?></td>
					  <td>
					    <select class="form-control form-admin" name="admin">
						  <?php if($usertype[$j] == 'Customer'): ?>
						  <option selected="selected">Customer</option>
						  <option>Admin</option>
						  <?php else: ?>
						  <option>Customer</option>
						  <option selected="selected">Admin</option>
						  <?php endif ?>
					    </select>
					  </td>
					  <td><a name="remove" class="removeRow" href=""><span class="glyphicon glyphicon-remove"></span></a></td>
				    </tr>
					<?php endfor ?>
				  </tbody>
                </table>
              </form>
		    </div>
		  </div>
		<?php endif ?>
	    </div>
	  </div>
	
  </body>
</html>