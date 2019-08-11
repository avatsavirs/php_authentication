<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="./">Home <span class="sr-only">(current)</span></a>
      </li>
		</ul>

      <?php if(!isset($_SESSION['emailId'])): ?>
      <form action="./includes/login.inc.php" method="POST" class="form-inline">
				<input class="form-control mx-1" type="text" name="emailId" placeholder="Username/Email">
				<input class="form-control mx-1" type="password" name="pwd" placeholder="Password">
				<button type = "submit mx-1" class="btn btn-primary" name="login-submit">Login</button>
			</form>
			<a href="signup.php" class="btn btn-primary mx-1">Sign Up</a>
      <?php endif; ?>

      
      <?php if(isset($_SESSION['emailId'])): ?>
			<form action="./includes/logout.inc.php" method="POST" class="form-inline">
				<button type = "submit" class="btn btn-primary" name="logout-submit">Logout</button>
			</form>
      <?php endif; ?>
  </div>
</nav>