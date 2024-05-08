<?php
include 'config.php';
$errors = array();
foreach ($errors as $error) {
	echo $errors;
}
//working with login form submision

if (isset($_POST['loginbtn'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
		$phone = $_POST['phone'];
		$password = sha1($password);
		$result = $dbh->query("SELECT * FROM users WHERE phone = '$phone' AND password='$password' AND role != 'student' ");
		$result1 = $dbh->query("SELECT * FROM users WHERE phone = '$phone' AND password = '$password' AND role = 'student' ");
		if ($result->rowCount() == 1) {
			$row = $result->fetch(PDO::FETCH_OBJ);
			//`userid`, `fullname`, `phone`, `email`, `password`, `u_status`, `education_status`, `role`, `date_registered`
			$_SESSION['userid'] = $row->userid;
			$_SESSION['fullname'] = $row->fullname;
			$_SESSION['email'] = $row->email;
			$_SESSION['u_status'] = $row->u_status;
			$_SESSION['education_status'] = $row->education_status;
			$_SESSION['role'] = $row->role;
			$_SESSION['date_registered'] = $row->date_registered;
			//=========================================================
			if ($result->rowCount() > 0) {
				$_SESSION['status'] = '<div id="note1" class="alert alert-success text-center">Login Successful</div>';
				$_SESSION['loader'] = '<center><div id="note1" class="spinner-border text-center text-success"></div></center>';
				header("refresh:2; url=".SITE_URL);
			}else {
				$_SESSION['status'] = '<div id="note1" class="alert alert-danger text-center">Login failed, please check your login details again</div>';
			}
		}elseif ($result1->rowCount() > 0) {
			$_SESSION['status'] = '<div class="alert alert-success text-center">Welcome our dear student, Kindly use the KSS-Career Guidance App!. </div>';
		}else {
			$_SESSION['status'] = '<div id="note1" class="alert alert-danger text-center">Wrong number or password</div>';
		}
	}
} elseif (isset($_POST['register'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
		//`userid`, `fullname`, `phone`, `email`, `password`, `u_status`, `education_status`, `role`, `date_registered`
		$check = $dbh->query("SELECT phone FROM users WHERE phone='$phone' ")->fetchColumn();
		if (!$check) {
			// $reset_password = $password; 
			$password = sha1($password);
			$sql = "INSERT INTO users VALUES(NULL, '$fullname','$phone','$email','$password',0,'Pending','student','$today')";
			$result = dbCreate($sql);
			if ($result == 1) {
				$_SESSION['status'] = '<div class="alert alert-success text-center">Registration is Successful</duv>';
				header("refresh:2; url=".SITE_URL.'/login');
			} else {
				echo "<script>
		      alert('User registration failed');
		   	  window.location = '" . SITE_URL . "/register';
		      </script>";
			}
		} else {
			echo "<script>
	        alert('Username already registered');
	        window.location = '" . SITE_URL . "/register';
	        </script>";
		}
	}
}	elseif (isset($_POST['counselor_btn'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
		//insert record to mysql table from career form...
		//`id`, `name`, `national_id`, `qualifications`, `contact`, `address`, `nationality`, `next_of_kin`, `relative_contact`, `status`
		$check = $dbh->query("SELECT contact FROM counselor WHERE contact='$contact' ")->fetchColumn();
		if (!$check) {
			// $password = sha1($password);
			$sql = "INSERT INTO counselor VALUES(NULL,'$name','$national_id','$qualifications','$contact','$address','$nationality','$next_of_kin','$relative_contact','$status')";
			$result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
	          	alert('counselor is Successful');
	        	window.location = '" . SITE_URL . "/counselor';
	          	</script>";
			} else {
				echo "<script>
		      alert('counselor registration failed');
		   	  window.location = '" . SITE_URL . "/counselor';
		      </script>";
			}
		} else {
			echo "<script>
	        alert('counselor already registered');
	        window.location = '" . SITE_URL . "/counselor';
	        </script>";
		}
	}
}elseif (isset($_REQUEST['del-couselor'])) {
	dbDelete('counselor', 'counselor_id', $_REQUEST['del-couselor']);
	redirect_page('?counselor');
} elseif (isset($_POST['career_btn'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
		//insert record to mysql table from career form...
		//`career_id`, `cname`, `croles`, `cdescription`, `eligibility`
		$check = $dbh->query("SELECT car_name FROM career WHERE car_name='$car_name' ")->fetchColumn();
		if (!$check) {
			// $password = sha1($password);
			$sql = "INSERT INTO career VALUES(NULL,'$car_name','$car_desc','$eligability','$jobs','$opportunities','$recuiters')";
			$result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
	          	alert('Career is Successful');
	        	window.location = '" . SITE_URL . "/career';
	          	</script>";
			} else {
				echo "<script>
		      alert('Career registration failed');
		   	  window.location = '" . SITE_URL . "/career';
		      </script>";
			}
		} else {
			echo "<script>
	        alert('Career already registered');
	        window.location = '" . SITE_URL . "/career.php';
	        </script>";
		}
	}
} elseif (isset($_REQUEST['del-career'])) {
	dbDelete('career', 'career_id', $_REQUEST['del-career']);
	redirect_page('?career');
} elseif (isset($_POST['update_career_btn'])) {
	trim(extract($_POST));
	$sql = $dbh->query("UPDATE career SET car_name = '$car_name', car_desc = '$car_desc', eligability= '$eligability', 
	jobs= '$jobs', opportunities= '$opportunities',recuiters= '$recuiters' WHERE career_id = '$career_id' ");
	if ($sql) {
		$_SESSION['status'] = '<div id="note1" class="alert alert-warning text-center single-item__time single-item__time--live">Career updated Successfully!</div>';
	}
}
elseif (isset($_POST['subject_btn'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
		//insert record to mysql table from career form...
		//`career_id`, `cname`, `croles`, `cdescription`, `eligibility`
		$check = $dbh->query("SELECT subject FROM subject WHERE subject='$subject' ")->fetchColumn();
		if (!$check) {
			// $password = sha1($password);
			$sql = "INSERT INTO subject VALUES(NULL,'$subject','$status')";
			$result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
	          	alert('Career is Successful');
	        	window.location = '" . SITE_URL . "/subject';
	          	</script>";
			} else {
				echo "<script>
		      alert('Career registration failed');
		   	  window.location = '" . SITE_URL . "/subject';
		      </script>";
			}
		} else {
			echo "<script>
	        alert('Career already registered');
	        window.location = '" . SITE_URL . "/suject';
	        </script>";
		}
	}
} elseif (isset($_REQUEST['del-subject'])) {
	dbDelete('subject', 'id', $_REQUEST['del-subject']);
	redirect_page('?subject');
}elseif (isset($_POST['fogot_password_btn'])) {
    trim(extract($_POST));
    if (count($errors) == 0) {
        $result = $dbh->query("SELECT * FROM users WHERE phone = '$phone' " );
        if ($result->rowCount() == 1) {
            $token = rand(11111,99999);
            $dbh->query("UPDATE users SET token = '$token' WHERE phone = '$phone' ");
            $rx = dbRow("SELECT * FROM users WHERE phone = '$phone' ");
        	$message = "KSS-Career Guidance App: Hi ".$rx->surname.', your verification token is: '. $token;
        	@json_decode(send_sms_yoola_api($phone, $message), true);

            $_SESSION['phone'] = $phone;
            $_SESSION['status'] = '<div class="alert alert-success text-center">Verification token is sent to your phone successfully, Please enter the OTP send to you via phone to complete Login process</div>';
            $_SESSION['loader'] = '<center><div id="note1" class="spinner-border text-center text-success"></div></center>';
            header("refresh:2; url=".SITE_URL.'/token');
        }else{
            $_SESSION['status'] = '<div id="note1" class="card card-body alert alert-warning text-center">
            Invalid account request, please check your Token and try again.</div>';
        }
    }
}elseif (isset($_POST['resent_token_btn'])) {
	trim(extract($_POST));
    if (count($errors) == 0) {
        $result = $dbh->query("SELECT * FROM users WHERE phone = '$phone' " );
        if ($result->rowCount() == 1) {
            $token = rand(11111,99999);
            $dbh->query("UPDATE users SET token = '$token' WHERE phone = '$phone' ");
            $rx = dbRow("SELECT * FROM users WHERE phone = '$phone' ");
        	$message = "KSS-Career Guidance App: Hi ".$rx->surname.', your verification token is: '. $token;
        	@json_decode(send_sms_yoola_api($phone, $message), true);

            $_SESSION['phone'] = $phone;
            $_SESSION['status'] = '<div class="alert alert-success text-center">Verification token is sent to your phone successfully, Please enter the OTP send to you via phone to complete Login process</div>';
            $_SESSION['loader'] = '<center><div id="note1" class="spinner-border text-center text-success"></div></center>';
            header("refresh:2; url=".SITE_URL.'/token');
        }else{
            $_SESSION['status'] = '<div id="note1" class="card card-body alert alert-warning text-center">
            Invalid account request, please check your Token and try again.</div>';
        }
    }
}elseif (isset($_POST['verify_btn'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
		$result = $dbh->query("SELECT * FROM users WHERE token = '$otp' " );
		if ($result->rowCount() == 1) {
		$row = $result->fetch(PDO::FETCH_OBJ);
		//`userid`, `token`, `surname`, `othername`, `gender`, `phone`, `email`, `password`, `country_id`, `branch_id`, `address`, `nin_number`, `date_registered`, `account_status`
		$_SESSION['userid'] = $row->userid;
		$_SESSION['fullname'] = $row->fullname;
		$_SESSION['email'] = $row->email;
		$_SESSION['u_status'] = $row->u_status;
		$_SESSION['education_status'] = $row->education_status;
		$_SESSION['role'] = $row->role;
		$_SESSION['date_registered'] = $row->date_registered;
		if ($result->rowCount() > 0) {
				$_SESSION['loader'] = '<center><div class="spinner-border text-center text-success"></div></center>';
				$_SESSION['status'] = '<div class="card card-body alert alert-success text-center">
				<strong>Login Successful, Redirecting...</strong></div>';
				header("refresh:2; url=".SITE_URL);
			}else{
				$_SESSION['status'] = '<div class="card card-body alert alert-warning text-center">
				Login failed, please check your login details again</div>';
			}

	}else{
		$_SESSION['status'] = '<div class="card card-body alert alert-danger text-center">
				<strong>Wrong Token inserted</strong></div>';

		echo "<script>
			alert('Wrong Token inserted');
			window.location = '".SITE_URL."/token';
			</script>";
	}
	}

}
