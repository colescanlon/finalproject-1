	
	 <!-- Register -->
<html>
	  <section id="register" class="home-section bg-white">
	  	<div class="container">
			  <div class="row">
				  <div class="col-md-offset-2 col-md-8">
					<div class="section-heading">
					 <h1>Register</h1>
					</div>
				  </div>
			  </div>

	  		<div class="row">
	  			<div class="col-md-offset-1 col-md-10">

				<form class="form-horizontal" action="register.php" method="post">
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					  <input autofocus class="form-control" name="username" placeholder="Username" type="text"/>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					  <input class="form-control" name="password" placeholder="Password" type="password"/>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					  <input class="form-control" name="confirmation" placeholder="Confirm Your Password" type="password"/>
					</div>
				  </div>
				  <div class="form-group">
					<div class="col-md-offset-2 col-md-8">
					 <button type="submit" class="btn btn-theme btn-lg btn-block">Register</button>
					</div>
                    <div class="col-md-offset-2 col-md-8">
                     Or <a href="login.php">log in!</a>
                    </div>
				  </div>
				</form>

	  			</div>
	  		</div>
</html>
