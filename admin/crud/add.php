<?php

	$mysqli = new mysqli('localhost', 'root', '', 'anatomica') or die($mysqli->error);

	if(isset($_POST['AddKorisnika'])){
		$username = $_POST['username'];
		$password = $_POST['password'];
		$type = $_POST['type'];
		$type = $_POST['password'];
		$naziv = $_POST['naziv'];
		$pib = $_POST['pib'];
		$adresa = $_POST['adresa'];
		$mesto = $_POST['mesto'];
		$kontakt = $_POST['kontakt'];


		$mysqli->query("INSERT INTO user(username, password, type, Naziv, PIB, Adresa, Mesto, Kontakt) VALUES ('$username', '$password', '$type', '$naziv', '$pib','$adresa', '$mesto', '$kontakt')") or die($mysqli->error);
		echo "Uspesan unos!";

		header("location : korisnici.php");
	}
	else{
		echo "Greska u unosu!";
	}


		if(isset($_POST['AddProizvod'])){
		$naziv = $_POST['naziv'];
		$cena = $_POST['cena'];
		$velicina = $_POST['velicina'];
		$boja = $_POST['boja'];


		$mysqli->query("INSERT INTO proizvod (Naziv, Cena, Velicina, Boja) VALUES ('$naziv', '$cena', '$velicina', '$boja')") or die($mysqli->error);
		echo "<script> alert('Uspesan unos!')</script";

		header("location : korisnici.php");
	}
	else{
		echo "Greska u unosu!";
	}

?>