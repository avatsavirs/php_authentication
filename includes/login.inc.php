<?php
	if(isset($_POST['login-submit'])){

		require('./db.inc.php');

		$emailId = $_POST['emailId'];
		$pwd = $_POST['pwd'];

		if(empty($emailId) || empty($pwd)){
			header("Location: ../index.php?err=emptyfields");
			exit();
		}else{
			$query = "SELECT * FROM userbase WHERE emailId=?";
			$stmt = mysqli_stmt_init($conn);
			if(!mysqli_stmt_prepare($stmt, $query)){
				header("Location: ../index.php?err=sqlerr16");
				exit();
			}else{
				mysqli_stmt_bind_param($stmt, "s", $emailId);
				mysqli_stmt_execute($stmt);
				$result = mysqli_stmt_get_result($stmt);
				if($row = mysqli_fetch_assoc($result)){
					$pwdchk = password_verify($pwd, $row['pwd']);
					if($pwdchk == false){
						header("Location: ../index.php?err=incrtpwd25");
						exit();
					}else{
						session_start();
						$_SESSION['emailId'] = $row['emailId'];
						$_SESSION['fname'] = $row['fname'];
						$_SESSION['sname'] = $row['sname'];
						header("Location: ../index.php?login=success");
						exit();
					}
				}else{
					header("Location: ../index.php?err=incrtpwd36");
					exit();
				}
			}
		}
		
	}else{
		header("Location: ../index.php");
		exit();
	}