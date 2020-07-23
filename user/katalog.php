<?php
// inicijalizujemo cas
session_start();

// da li je korisnik loginovan ako ne vrati ga nazad
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
}

$connect = mysqli_connect("localhost", "root", "", "anatomica");

if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		array_push($_SESSION['shopping_cart'], $item_array);
		}
		else
		{
		echo '<script>alert("Proizvod je vec dodat!")</script>';
		}
	}
	else
	{
		$item_array = array(
		'item_id'		=>	$_GET["id"],
		'item_name'		=>	$_POST["hidden_name"],
		'item_price'		=>	$_POST["hidden_price"],
		'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}
 
if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
		if($values["item_id"] == $_GET["id"])
		{
		unset($_SESSION["shopping_cart"][$keys]);
		echo '<script>alert("Ukolonjeno iz korpe!")</script>';
		echo '<script>window.location="katalog.php"</script>';
		}
		}
	}
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Foot - Brza isporuka</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
</head>
    <header id="home">
        <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
            <div class="container">
                <div class="navbar-header">
                    <a href="welcome.php" class="navbar-brand"><img class="img-fulid" src="../img/front-icon.png" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
              <i class="lnr lnr-menu"></i>
            </button>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
						<li role="presentation" class="nav-item"><a class="nav-link" href="katalog.php">Katalog</a></li>
						<li role="presentation" class="nav-item"><a class="nav-link" href="welcome.php">Uslovi</a></li>
						<li role="presentation" class="nav-item"><a class="nav-link" href="logout.php">Odjavi se</a></li>
                    </ul>
                </div>
            </div>

            <ul class="mobile-menu">
					<li role="presentation" class="nav-item"><a class="nav-link" href="katalog.php">Katalog</a></li>
					<li role="presentation" class="nav-item"><a class="nav-link" href="welcome.php">Uslovi</a></li>
					<li role="presentation" class="nav-item"><a class="nav-link" href="logout.php">Odjavi se</a></li>
            </ul>
        </nav>
    </header>
<body>
	<section class="section" id="katalog" style="padding-top: 150px;">
		<div class="container">
			<h1 align="center">Katalog ponuda</h1>
			<div class="bordert m-auto mw-5 "></div><br><br>
			<div class="row">
				<?php
					$query = "SELECT * FROM proizvod ORDER BY id ASC";
					$result = mysqli_query($connect, $query);
					if(mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_array($result))
						{
					?>
				<div class="col-md-3">
					<form method="POST" action="katalog.php?action=add&id=<?php echo $row["id"]; ?>">
						<div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">
							<img src="../productimage/<?php echo $row["Slika"]; ?>" class="img-responsive" /><br />

							<h5 class="text-info"><?php echo $row["Naziv"]; ?></h5>

							<h5 class="text-danger">Cena: <?php echo $row["Cena"]; ?> RSD</h5>

							<h5 class="text-danger">Velicina: <?php echo $row["Velicina"]; ?></h5>

							<input type="text" name="quantity" value="1" class="form-control" style="color: black;" />

							<input type="hidden" name="hidden_name" value="<?php echo $row["Naziv"]; ?>" />

							<input type="hidden" name="hidden_price" value="<?php echo $row["Cena"]; ?>" />

							<input type="submit" name="add_to_cart" style="margin-top:5px; background-color: #0671ba; border-radius: 10px;" class="btn btn-info" value="Dodaj u korpu" />
						</div>
						<br>
					</form>
				</div>
				<?php
						}
					}
				?>
			</div>

				<div style="clear:both"></div>
				<br />
				<h3>Detalji porudzbine</h3>
				<div class="table-responsive">
					<table class="table table-bordered">
						<tr>
							<th width="40%">Naziv proizvoda</th>
							<th width="10%">Kolicina</th>
							<th width="20%">Jedinicna cena</th>
							<th width="15%">Ukupno</th>
							<th width="5%">Izmeni</th>
						</tr>
						<?php
						if(!empty($_SESSION["shopping_cart"]))
						{
							$total = 0;
							foreach($_SESSION["shopping_cart"] as $keys => $values)
							{
						?>
						<tr>
							<td><?php echo $values["item_name"]; ?></td>
							<td><?php echo $values["item_quantity"]; ?></td>
							<td><?php echo $values["item_price"]; ?> RSD</td>
							<td><?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?>RSD</td>
							<td><a href="katalog.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Ukloni</span></a></td>
						</tr>
						<?php
								$total = $total + ($values["item_quantity"] * $values["item_price"]);
							}
						?>
						<tr>
							<td colspan="3" align="right">Total</td>
							<td align="right"><?php echo number_format($total, 2); ?> RSD</td>
							<td><a href="" class="text-info">Posalji narudzbinu</td>
						</tr>
						<?php
						}
						?>							
					</table>
				</div>
			</div>
		</div>
		<br />
	</section>
			

	<section id="contact" class="section">
        <div class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="contact-us">
                            <h3>Kontaktirajte nas</h3>
                            <div class="contact-address">
                            	<p><strong>ANATOMICA EXPORT-IMPORT D.O.O.</strong></p>
                                <p><strong>Adresa maloprodaje:</strong></p>
                                <p><i class="fas fa-map-pin"></i> Krunska 2, 11000 Beograd, Srbija</p>
                                <p class="phone"><i class="fas fa-phone-alt"></i> Telefon: <span>(+381 54 300 0273)</span></p>
                                <p class="email"><i class="fas fa-envelope"></i> E-mail: <span>(brzaisporuka@anatomica.rs)</span></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="contact-block">
                            <form id="contactForm" action="" method="POST">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Vaše ime" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="Vaš e-mail" id="email" class="form-control" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" placeholder="Vaša poruka" rows="8" required></textarea>
                                        </div>
                                        <div class="submit-button text-center">
                                            <button class="btn btn-common" id="submit" type="submit">Pošalji poruku</button>
                                            <div id="msgSubmit" class="h3 text-center hidden"></div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- FOOTER - COPYRIGHT -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <ul class="footer-links">
						<li role="presentation" class="nav-item"><a class="nav-link" href="katalog.php">Katalog</a></li>
						<li role="presentation" class="nav-item"><a class="nav-link" href="welcome.php">Uslovi</a></li>
						<li role="presentation" class="nav-item"><a class="nav-link" href="logout.php">Odjava</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="copyright">
                        <p>Sva prava zadržana &copy; 2020 | <a rel="nofollow" class="page-scroll" href="welcome.php">Anatomica.rs</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>