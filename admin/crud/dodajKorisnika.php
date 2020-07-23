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
    <link rel="stylesheet" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/sidebar.css">
<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="list-group list-group-flush">
        <a href="../welcome.php" class="list-group-item list-group-item-action bg-light">Dashboard</a>
        <a href="../korisnici.php" class="list-group-item list-group-item-action bg-light">Korisnici</a>
        <a href="../proizvodi.php" class="list-group-item list-group-item-action bg-light">Proizvodi</a>
        <a href="../order.php" class="list-group-item list-group-item-action bg-light">Narudzbenice</a>
      </div>
    </div>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
        <a href="welcome.php" class="navbar-brand"><img class="img-fulid" src="../../img/footicon2.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="logout.php">Odjava <span class="sr-only">(current)</span></a>
            </li>
          </ul>
        </div>
      </nav>

    <section id="nalog">
      <form name='nalog' id="forma" action='add.php' method='post'>
        <div class="container">
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="naziv">Username</label>
              <input type="text" class="form-control" name="username" id="username" placeholder="Username" value=''>
            </div>
            
            <div class="form-group col-md-6">
              <label for="PIB">Password</label>
              <input type="text" class="form-control" name="password" id="password" placeholder="Password" value=''>
          </div>

            <div class="form-group col-md-6">
              <label for="naziv">Naziv</label>
              <input type="text" class="form-control" name="naziv" id="naziv" placeholder="Naziv" value=''>
            </div>
            
            <div class="form-group col-md-6">
              <label for="PIB">PIB</label>
              <input type="text" class="form-control" name="pib" id="PIB" placeholder="PIB" value=''>
            </div>
          </div>

          <div class="form-row">
           <div class="form-group col-md-6">
              <label for="adresa">Adresa</label>
              <input type="text" class="form-control" name="adresa" id="adresa" placeholder="Adresa" value=''>
            </div>
            <div class="form-group col-md-6">
              <label for="mesto">Mesto</label>
              <input type="text" class="form-control" name="mesto" id="mesto" placeholder="Mesto" value=''>
            </div>
          </div>
         
           <div class="form-row">
            <div class="form-group col-md-6">
              <label for="kontakt">Kontakt</label>
              <input type="text" class="form-control" name="kontakt" id="kontakt" placeholder="Kontakt" value=''>
            </div>
            <div class="form-group col-md-6">
              <label for="Type">Type</label>
              <input type="text" class="form-control" name="type" id="email" placeholder="Type USER" value=''>
            </div>
          </div>
          </div>
           <center><button type="submit" id="submitEdit" name="AddKorisnika" class="btn btn-primary btn-block">Unesi</button></center>
        </div>
    </form>  

    </section>
</div>
</body>
</html>