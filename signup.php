<?php require "./includes/header.php"?>
<?php require "./includes/navbar.php"?>
<?php
	$fname = '';
	$sname = '';
	$emailId = '';
	$contact = '';
	if(isset($_GET['error'])){
		// var_dump($_GET);
		$fname = isset($_GET['fname']) ?  $_GET['fname'] : '' ;
		$sname = isset($_GET['sname']) ? $_GET['sname']: '';
		$emailId = isset($_GET['emailId']) ? $_GET['emailId'] : '';
		$contact = isset($_GET['contact']) ? $_GET['contact'] : '';
	}
?>
	<h1>Sign Up</h1>
	<?php 
		if(isset($_GET['error'])){
			if($_GET['error'] == 'emptyfields'){
				echo '<div class="alert alert-danger" role="alert">Fill in all fields</div>';
			}
			else if($_GET['error'] == 'invalidEmail'){
				echo '<div class="alert alert-danger" role="alert">Enter a valid email</div>';
			}
			else if($_GET['error'] == 'invalidContact'){
				echo '<div class="alert alert-danger" role="alert">Enter a valid contact number</div>';
			}
			else if($_GET['error'] == 'checkPassword'){
				echo '<div class="alert alert-danger" role="alert">Passwords do not match</div>';
			}
			else if($_GET['error'] == 'emailAlreadyRegistered'){
				echo '<div class="alert alert-danger" role="alert">Email already registered</div>';
			}
			else if($_GET['error'] == 'weakpwd'){
				echo '<div class="alert alert-danger" role="alert">Password must be atlease 8 characters<br>Password must contain at least 1 uppercase letter<br>Password must contain atleast 1 lower case letter<br>Password must contain at least 1 number</div>';
			}
		}elseif( isset($_GET['signup']) && $_GET['signup'] == 'success'){
			echo '<div class="alert alert-success" role="alert">Registration Successful</div>';
		}
	?>
    <div class="container">
			<form action="./includes/signup.inc.php" method = "POST">
				<div class="form-row">
					<div class="form-group col-md-6">
						<label>First Name</label>
						<input type="text" class="form-control"placeholder="First Name" name="fname" value = "<?php echo $fname; ?>">
					</div>
					<div class="form-group col-md-6">
						<label>Second Name</label>
						<input type="text" class="form-control" placeholder="Second Name" name="sname" value = "<?php echo $sname; ?>">
					</div>
				</div>			
				<div class="form-group">
					<label>Email</label>
					<input type="email" class="form-control" placeholder="Email" name="emailId" value = "<?php echo $emailId; ?>">
				</div>
				<div class="form-group">
					<label>Password</label>
					<input type="password" class="form-control" placeholder="Password" name="pwd">
				</div>			
				<div class="form-group">
					<label>Confirm Password</label>
					<input type="password" class="form-control" placeholder="Confirm Password" name="pwdcnf">
				</div>			
				<div class="form-group">
					<label>Contact Number</label>
					<input type="number" class="form-control" placeholder="Contact Number" name="contact" value = "<?php echo $contact; ?>">
				</div>			
				<button type="submit" class="btn btn-primary" name="signup-submit">Sign Up</button>
			</form>
		</div>
<?php require "./includes/footer.php"?>