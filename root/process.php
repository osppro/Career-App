<?php
//getting the database connection... 
require_once('config.php');
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
		$result = $dbh->query("SELECT * FROM users WHERE phone = '$phone' AND password='$password'");
		if ($result->rowCount() == 1) {
			$row = $result->fetch(PDO::FETCH_OBJ);
			//`userid`, `fname`, `lname`, `username`, `phone`, `email_address`, `password`, `u_status`, `education_status`, `role`, `stateoforgin`, `dfb`, `date_registered``
			$_SESSION['userid'] = $row->userid;
			$_SESSION['fname'] = $row->fname;
			$_SESSION['lname'] = $row->lname;
			$_SESSION['username'] = $row->username;
			$_SESSION['email_address'] = $row->email_address;
			$_SESSION['u_status'] = $row->u_status;
			$_SESSION['education_status'] = $row->education_status;
			$_SESSION['role'] = $row->role;
			$_SESSION['stateoforgin'] = $row->stateoforgin;
			$_SESSION['dfb'] = $row->dfb;
			$_SESSION['date_registered'] = $row->date_registered;
			//=========================================================
			if ($result->rowCount() > 0) {
				echo "<script>
				alert('Login is Successful');
				window.location = '" . SITE_URL . "';
				</script>";
			} else {
				echo "<script>
				alert('Login failed, please check your login details again');
				window.location = '" . SITE_URL . "';
				</script>";
			}
		} else {
			echo "<script>
				alert('Wrong number or password');
				window.location = '" . SITE_URL . "';
				</script>";
		}
	}
} elseif (isset($_POST['register'])) {
	trim(extract($_POST));
	if (count($errors) == 0) {
		//insert record to mysql table...
		//`userid`, `username`, `phone`, `password`, `u_status`, `role`, `date_registered`


		//`userid`, `fname`, `lname`, `username`, `phone`, `email_address`, `password`, `u_status`, `education_status`, `role`, `stateoforgin`, `dfb`, `date_registered``
		$check = $dbh->query("SELECT phone FROM users WHERE phone='$phone' ")->fetchColumn();
		if (!$check) {
			// $reset_password = $password; 
			$password = sha1($password);
			$sql = "INSERT INTO users VALUES(NULL, '$fname',','$lname','$username','$phone','$email_address','$password',0,'$education_status','$role','$stateoforgin','$dfb','$today')";
			$result = dbCreate($sql);
			if ($result == 1) {
				echo "<script>
	          	alert('Registration is Successful');
	        	window.location = '" . SITE_URL . "/login.php';
	          	</script>";
			} else {
				echo "<script>
		      alert('User registration failed');
		   	  window.location = '" . SITE_URL . "/register.php';
		      </script>";
			}
		} else {
			echo "<script>
	        alert('Username already registered');
	        window.location = '" . SITE_URL . "/register.php';
	        </script>";
		}
	}
}	 elseif (isset($_POST['counselor_btn'])) {
	extract($_POST);

    // Trim data
    $name = trim($name);
    $nationalID = trim($national_id);
    $qualifications = trim($qualifications);
    $contact = trim($contact);
    $address = trim($address);
    $nationality = trim($nationality);
    $relative = trim($relative);
    $relative_contact = trim($relative_contact);
    $status = trim($status);

	$sql = "INSERT INTO counselor (name, national_id, qualifications, contact, address, nationality, next_of_kin, relative_contact, status) VALUES ('$name', '$nationalID', '$qualifications', '$contact', '$address', '$nationality', '$relative', '$relative_contact', '$status')";

	// Execute SQL query
	$result = dbCreate($sql);

        // Check if insertion was successful
        if ($result) {
            $_SESSION['status'] = '<div class="alert alert-success alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Success!</strong> Counselor Uploaded Successfully.
            </div>';
            header("refresh:2; url=" . SITE_URL . "/counselor");
        } else {
            $_SESSION['status'] = '<div class="alert alert-danger alert-dismissible">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>Failed!</strong> Counselor Upload Failed.
            </div>';
        }
	}

 elseif (isset($_REQUEST['del-couselor'])) {
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
}
