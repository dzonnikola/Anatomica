<?php include('functions.php') ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Foot - Brza isporuka</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/anatomica.css">
    <link href="fontawesome/css/all.css" rel="stylesheet">
</head>

<body>
	<div class="login-card">
		<img src="img/logicon.png" class="profile-img-card" />
		<p class="profile-name-card"></p>
		<form class="form-signin" method="POST" action="login.php">
			<span class="reauth-email"></span>
			<input name="username" type="username" required placeholder="Korisničko ime" autofocus class="form-control" id="inputEmail" />
			</br>
			<input name="password" type="password" required placeholder="Lozinka" class="form-control" id="inputPassword" />
			</br>
			<button class="btn btn-primary btn-block btn-lg btn-signin" name="login_button" type="submit">Prijavi se</button>
		</form>
	</div>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>