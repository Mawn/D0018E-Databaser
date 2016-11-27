<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Contact Us - DreamTeam Luleå</title>
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script
	<script type='text/javascript' src="https://imsky.github.io/holder/holder.js"></script>
	<link href="style.css" rel="stylesheet">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="javascript.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<script>
      function countChar(val) {
        var len = val.value.length;
        if (len >= 251) {
          val.value = val.value.substring(0, 250);
        } else {
          $('#countdown').text(250 - len);
        }
      };
    </script>
	<style>
	  ul {
		list-style-type: none;
		padding: 0;
		margin: 0;
		margin-left: 95px;
		margin-top: -30px;
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
            <li class="active">
              <a href="#">Contact</a>
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
        <!-- /.navbar-collapse -->
      </div>
      <!-- /.container -->
	</nav>
	
	<div class="container">
	<div class="row">
	  <h1>Contact Form</h1>
	  <div class="col-md-12">
		<div class="alert alert-success">
		  <strong><span class="glyphicon glyphicon-ok"></span> Success! Message sent. (If form ok!)</strong>
		</div>	  
		<div class="alert alert-danger">
		  <span class="glyphicon glyphicon-remove"></span><strong> Error! Please check the inputs. (If form error!)</strong>
		</div>
	  </div>
	  <form role="form" action="" method="post" >
		<div class="col-lg-6">
		  <div class="well well-sm">
			<strong><i class="glyphicon glyphicon-asterisk form-control-feedback"></i> Required Field</strong>
		  </div>
		  <div class="form-group">
			<label for="InputName">Your Name</label>
		    <div class="input-group">
			  <input type="text" class="form-control" name="InputName" id="InputName" placeholder="What is your name?" required>
			  <span class="input-group-addon"><small><small><i class="glyphicon glyphicon-asterisk form-control-feedback"></i></small></small></span>
			</div>
		  </div>
			
		  <div class="form-group">
			<label for="InputEmail">Your Email</label>
			<div class="input-group">
			  <input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="How can we reach you?" required>
			  <span class="input-group-addon"><small><small><i class="glyphicon glyphicon-asterisk form-control-feedback"></i></small></small></span>
			</div>
		  </div>
			
		  <div class="form-group">
			<label for="InputSubject">Subject</label>
			<div class="input-group">
			  <input type="text" class="form-control" id="InputSubject" name="InputSubject" placeholder="What is your message about?" required>
			  <span class="input-group-addon"><small><small><i class="glyphicon glyphicon-asterisk form-control-feedback"></i></small></small></span>
			</div>
		  </div>
		  
		  <div class="form-group">
			<form accept-charset="UTF-8" action="" method="POST">
			  <textarea class="form-control" id="InputMessage" name="InputMessage" placeholder="Type in your message" maxlength="250" rows="5" onkeyup="countChar(this)" onclick="countChar(this)"></textarea>
			  <button class="pull-right btn btn-info submitbtn" type="submit">Post New Message</button>
			  <h6 class="pull-right counter" id="countdown"></h6>
			</form>
		  </div>
		</div>
	  </form>
	  <div class="col-lg-5 col-md-push-1">
		<address>
		  <h3>DreamTeam Luleå</h3>
		  <img src="http://www.fish-on.fr/wp-content/uploads/2016/02/Dream-Team.jpg" height="250px" width="400px"/><br>
		  <div class="lead">
			<small><span class="glyphicon glyphicon-map-marker"></span></small>
			<a href="https://www.google.com/maps/@65.5899879,22.2407347,3a,75y,190.18h,83.39t/data=!3m6!1e1!3m4!1sITopPi3vCtzzqQIbouk0oA!2e0!7i13312!8i6656!6m1!1e1" target="_blank">
			  Hertsöskolan 97451, Luleå
			</a><br>
			<small><span class="glyphicon glyphicon-phone"></span></small>
		    Phone: 073-0876346<br>
			<small><span class="glyphicon glyphicon-envelope"></span></small>
            Email: 
            <ul>
              <li>jeshma-4@student.ltu.se (business),</li>
              <li>tobarv-4@student.ltu.se (other).</li>
            </ul>
          </div>
		</address>
	  </div>
	</div>

      <!-- FOOTER -->
      <footer>
        <p>&copy; 2016 #DreamTeam Inc, by Reppe & Tobias. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>