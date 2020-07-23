<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Health Foot - Brza isporuka</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/nalog.css">
</head>

<body>
<header>
    <nav class="navbar navbar-light navbar-expand-lg fixed-top bg-white clean-navbar">
        <div class="container">
            <div class="navbar-header">
                <a href="welcome.php" class="navbar-brand"><img class="img-fulid" src="img/footicon2.png" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
          <i class="lnr lnr-menu"></i></button>
            </div>

            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li role="presentation" class="nav-item"><a class="nav-link" href="katalog.php">Katalog</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="welcome.php">Uslovi</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="nalog.php">Nalog</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="korpa.php">Korpa</a></li>
                    <li role="presentation" class="nav-item"><a class="nav-link" href="logout.php">Odjavi se</a></li>
                </ul>
            </div>
        </div>
        <ul class="mobile-menu">
                <li role="presentation" class="nav-item"><a class="nav-link" href="katalog.php">Katalog</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="home.php">Uslovi</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="nalog.php">Nalog</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="korpa.php">Korpa</a></li>
                <li role="presentation" class="nav-item"><a class="nav-link" href="logout.php">Odjavi se</a></li>
        </ul>
    </nav>
</header>

<section id="nalog">
    <center><h2>Nalog</h2></center><br>
  <form name='nalog' id="formaEdit" action='edit.php' method='post'>
    <div class="container">
      <div class="form-row">
          <div class="form-group col-md-6">
          <label for="naziv">Naziv</label>
          <input type="text" class="form-control" id="naziv" placeholder="Naziv" value=''>
        </div>
        
        <div class="form-group col-md-6">
          <label for="PIB">PIB</label>
          <input type="text" class="form-control" id="PIB" placeholder="PIB" value=''>
        </div>
      </div>

      <div class="form-row">
       <div class="form-group col-md-6">
          <label for="adresa">Adresa</label>
          <input type="text" class="form-control" id="adresa" placeholder="Adresa" value=''>
        </div>
        <div class="form-group col-md-6">
          <label for="mesto">Mesto</label>
          <input type="text" class="form-control" id="mesto" placeholder="Mesto" value=''>
        </div>
      </div>
     
       <div class="form-row">
        <div class="form-group col-md-6">
          <label for="kontakt">Kontakt</label>
          <input type="text" class="form-control" id="kontakt" placeholder="Kontakt" value=''>
        </div>
        <div class="form-group col-md-6">
          <label for="email">email</label>
          <input type="text" class="form-control" id="email" placeholder="Email" value=''>
        </div>
      </div>
      
        <div class="form-row">
        <div class="form-group col-md-6">
          <label for="ogranak">Ogranak</label>
          <input type="text" class="form-control" id="ogranak" placeholder="Ogranak" value=''>
        </div>
        <div class="form-group col-md-6">
          <label for="adresaOgranka">Adresa ogranka</label>
          <input type="text" class="form-control" id="adresaOgranka" placeholder="Adresa ogranka" value=''>
        </div>
      </div>

        <center><button type="submit" id="submitEdit" class="btn btn-primary btn-block">Potvrdi izmene</button></center>
    </div>
</form>  

</section>


    <section id="contact" class="section">
        <div class="contact-form">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-sm-6 col-xs-12">
                        <div class="contact-us">
                            <h3>Kontaktirajte nas</h3>
                            <div class="contact-address">
                                <p><strong>GRUBIN EXPORT-IMPORT D.O.O.</strong></p>
                                <p><strong>Adresa maloprodaje:</strong></p>
                                <p><i class="fas fa-map-pin"></i> Tajovskog 4, 22300 Stara Pazova, Srbija</p>
                                <p class="phone"><i class="fas fa-phone-alt"></i> Telefon: <span>(+381 22 310 273)</span></p>
                                <p class="email"><i class="fas fa-envelope"></i> E-mail: <span>(brzaisporuka@grubin.rs)</span></p>
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
                        <li role="presentation" class="nav-item"><a class="nav-link" href="home.php">Uslovi</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="nalog.php">Nalog</a></li>
                        <li role="presentation" class="nav-item"><a class="nav-link" href="korpa.php">Korpa</a></li>
                    </ul>
                </div>
                <div class="col-lg-6 col-sm-6 col-xs-12">
                    <div class="copyright">
                        <p>Sva prava zadržana &copy; 2020 | <a rel="nofollow" class="page-scroll" href="#home">Anatomica.rs</a></p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>