<?php
	if(isset($_POST['signup-submit'])){

		require('./db.inc.php');
		
		$fname = $_POST['fname'];
		$sname = $_POST['sname'];
		$emailId = $_POST['emailId'];
		$contact = $_POST['contact'];
		$pwd = $_POST['pwd'];
		$pwdcnf = $_POST['pwdcnf'];

		if(empty($fname) || empty($sname) || empty($emailId) || empty($contact) || empty($pwd) || empty($pwdcnf)){
			header("Location: ../signup.php?error=emptyfields&fname=".$fname."&sname=".$sname."&emailId=".$emailId."&contact=".$contact);
			exit();
		}elseif (!filter_var($emailId, FILTER_VALIDATE_EMAIL)) {
			header("Location: ../signup.php?error=invalidEmail&fname=".$fname."&sname=".$sname."&contact=".$contact);
			exit();
		}elseif (!preg_match("/^[0-9]{10}+$/", $contact)) {
			header("Location: ../signup.php?error=invalidContact&fname=".$fname."&sname=".$sname."&emailId=".$emailId);
			exit();
		}elseif(strlen($pwd) <= '8'){
			header("Location: ../signup.php?error=weakpwd&fname=".$fname."&sname=".$sname."&emailId=".$emailId);
			exit();
		}elseif(!preg_match("#[0-9]+#",$pwd)){
			header("Location: ../signup.php?error=weakpwd&fname=".$fname."&sname=".$sname."&emailId=".$emailId);
			exit();
		}elseif(!preg_match("#[A-Z]+#",$pwd)){
			header("Location: ../signup.php?error=weakpwd&fname=".$fname."&sname=".$sname."&emailId=".$emailId);
			exit();
		}elseif(!preg_match("#[a-z]+#",$pwd)) {
			header("Location: ../signup.php?error=weakpwd&fname=".$fname."&sname=".$sname."&emailId=".$emailId);
			exit();
		}elseif($pwd !== $pwdcnf){
			header("Location: ../signup.php?error=checkPassword&fname=".$fname."&sname=".$sname."&emailId=".$emailId."&contact=".$contact);
			exit();
		}else{
			$query = "SELECT emailId FROM userbase WHERE emailId=?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $query)){
				header("Location: ../signup.php?error=sqlerror29");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "s", $emailId);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: ../signup.php?error=emailAlreadyRegistered&fname=".$fname."&sname=".$sname."&contact=".$contact);
					exit();
				}else{
					$query = "INSERT INTO userbase(fname, sname, emailId, pwd, contact) VALUES(?,?,?, ?, ?)";
					$stmt = mysqli_stmt_init($conn);
					if(!mysqli_stmt_prepare($stmt, $query)){
						header("Location: ../signup.php?error=sqlerror43");
						exit();
					}else{
						$hpwd = password_hash($pwd, PASSWORD_DEFAULT);
						mysqli_stmt_bind_param($stmt, "sssss", $fname, $sname, $emailId, $hpwd, $contact);
						mysqli_stmt_execute($stmt);
						header("Location: ../signup.php?signup=success");
					}
				}
			}
		}
		mysqli_stmt_close($stmt);
		mysqli_close($conn);
	}else{
		header("Location: ../signup.php");
		exit();
	}