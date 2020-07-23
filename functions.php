<?php 
	session_start();

	// konekcija
	$db = new mysqli('localhost', 'root', '', 'anatomica');

	$username = "";
	$email    = "";
	$errors   = array(); 

	
	if (isset($_POST['login_button'])) {
		login();
	}

	if (isset($_GET['logout'])) {
		session_destroy();
		unset($_SESSION['user']);
		header("location: ../login.php");
	}

	// vrati listu korisnika po ID-u
	function getUserById($id){
		global $db;
		$query = "SELECT * FROM login WHERE id=" . $id;
		$result = mysqli_query($db, $query);

		$user = mysqli_fetch_assoc($result);
		return $user;
	}

	// Uloguj korisnika
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

			$query = "SELECT * FROM login WHERE username='$username' AND password='$password' LIMIT 1";
			$results = mysqli_query($db, $query);

			if ($results) { 
				// provera tipa korisnika
				$logged_in_user = mysqli_fetch_assoc($results);
				if ($logged_in_user['type'] == 'admin') {

					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";
					header('location: welcome.php');		  
				}else{
					$_SESSION['user'] = $logged_in_user;
					$_SESSION['success']  = "You are now logged in";

					header('location: user.php');
				}
			}else {
				array_push($errors, "Pogresno korisnicko ime/sifra");
			}
		}
	}


	function isLoggedIn()
	{
		if (isset($_SESSION['user'])) {
			return true;
		}else{
			return false;
		}
	}

	function isAdmin()
	{
		if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
			return true;
		}else{
			return false;
		}
	}

	// escape string
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