<?php

session_start();

	// konekcija
	$db = new mysqli('localhost', 'root', '', 'anatomica') or die(mysqli_error);

	$username = "";
	$email    = "";
	$errors   = array(); 

	
	if (isset($_POST['login_button'])) {
		login();
	}


	function login(){
		global $db, $username, $errors;

		// grap form values
		$username = e($_POST['username']);
		$password = e($_POST['password']);

		// make sure form is filled properly
		if (empty($username)) {
			array_push($errors, "Korisnicko ime je obavezno");
		}
		if (empty($password)) {
			array_push($errors, "Sifra je obavezna");
		}

		
		if (count($errors) == 0) {
			$password = $password;

			$query = "SELECT * FROM user WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if (mysqli_num_rows($results) == 1) { 
				// provera tipa korisnika
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['type'] == 'admin') { //ako je admin
					
				    session_start();
				    $_SESSION['loggedin'] = true;
				    $_SESSION['username'] = $username;
					header('location: admin/welcome.php');		  
				}else{//else ako je kupac
				    session_start();
				    $_SESSION['loggedin'] = true;
				    $_SESSION['username'] = $username;

					header('location: user/welcome.php');
				}
			}else {
				array_push($errors, "Pogresno korisnicko ime/sifra");
				display_error();
			}
		}
	}

		function e($val){
		global $db;
		return mysqli_real_escape_string($db, trim($val));
	}

	function display_error() {
		global $errors;

		if (count($errors) > 0){
			echo '<div class="error">';
				foreach ($errors as $error){
					echo $error .'<br>';
				}
			echo '</div>';
		}
	}

?>