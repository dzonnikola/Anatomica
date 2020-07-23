<?php
// inicijalizujemo cas
session_start();
 
// da li je korisnik loginovan ako ne vrati ga nazad
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../index.php");
    exit;
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

<body>
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

        <div class="container">
            <div class="row justify-content-md-center">
                <div class="col-md-10">
                    <div class="contents text-center">
                    <?php  if (isset($_SESSION['username'])) : ?> 
                    <h2> 
                        Dobrodosli <span style="color:blue;";> <?php echo $_SESSION['username']; ?></span> 
                    </h2> 
                    <?php endif ?> <br>
                        <h2 id="welcome-text">Poštovani saradnici, molimo Vas da pažljivo pročitate uslove korišćenja pre upotrebe ANATOMICA Brza isporuka internet sajta.</h2> <br>
                        <p style="font-size: 21px;" id="welcome-paragraph" class="text-center"><strong>Anatomica Brza isporuka je namenjen pravnim licima kako bi brzo i jednostavno poručili najprodavanije artikle iz ponude Anatomica obuće. Sajtu možete pristupiti putem vašeg telefona, tableta, laptopa, kompjutera.</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section class="section text-center pt-3">
        <div id="usluge">
            <h1>
                <strong>NAŠI USLOVI</strong>
            </h1>
            <div class="bordert m-auto mw-5 "></div>
            <p class="m-auto mw-30 pt-3">Ovo su uslovi prodaje robe putem portala brze isporuke firme Anatomica.rs</p>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-4 col-xs-12  ">
                    <div class="obrada m-auto">
                        <h3>Brza isporuka</h3>
                        <div class="bordert m-auto mw-30"></div><br><br>
                        <p class="m-auto mw-75" style="text-align: justify; ">Porudžbina će Vam biti isporučena u roku od 2-4 radnih dana od datuma potvrde porudžbine. Za porudžbine čija je vrednost preko 1500 RSD, dostava je besplatna.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-xs-12  ">
                    <div class="obrada m-auto">
                        <h3>Plaćanje</h3>
                        <div class="bordert m-auto mw-30"></div><br><br>
                        <p class="m-auto mw-75" style="text-align: justify; ">Plaćanje se vrši od porudžbine do porudžbine. Nećete biti u mogućnosti da napravite novu porudžbinu dok ne izmirite predhodna dugovanja.
                        </p>
                    </div>
                </div>

                <div class="col-lg-4 col-sm-4 col-xs-12 ">
                    <div class="obrada m-auto">
                        <h3>Količina</h3>
                        <div class="bordert m-auto mw-30"></div><br><br>
                        <p class="m-auto mw-75" style="text-align: justify; ">Na sajtu GRUBIN Brza isporuka možete poručiti do 10 pari obuće po porudžbenici.
                        </p>
                    </div>
                </div>
            </div>
        </div>
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
                            <form id="contactForm" action="form-process.php" method="POST">
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