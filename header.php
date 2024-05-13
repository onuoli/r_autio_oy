<?php
    require "yhteys.php";
?>

<html>

<head>
    <title>Khuolto R. Autio</title>
    <link rel="icon" href="">
    <meta charset="UTF-8">
    <meta name="description" content="Kiinteistöhuolto R. Autio">
    <meta name="author" content="Otso Roi, Tuukka, Henry">
    <meta name="keywords" content="Kiinteistöhuolto">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/styles.css">	
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/scripts.js"></script>
    <script src="js/anime.min.js"></script>
</head>

<body>
<button onclick="topFunction()" id="topbtn" title="Go to top">Ylös</button>
<div id="phone" class="dropdown">
  <img src="img/phone.png" alt="" height="40">
  <div class="dropdown-content left-aligned rounded">
    <a class="linkki" href="tel:+358401234567">+358401234567 Toimisto</a>
    <a class="linkki" href="tel:+358100234567">+358100234567 Päivystys</a>
    <a class="linkki" href="mailto:info@rautiooy.com">info@rautiooy.com Sähköposti</a>
  </div>
</div> 


<!--Navbar -Henry-->
<div class="stickynavbar">
<nav class="navbar navbar-expand-lg navbar-dark bg-customnav">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php"><img src="img/r_autio_oy.png" alt="Logo" height="50"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDarkDropdown" aria-controls="navbarNavDarkDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
        <ul class="navbar-nav">
        <li class="nav-item dropdown">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Etusivu</a>
            </li>
            <li class="nav-item">
                <a id="link1" class="nav-link" href="info.php">Tietoa meistä</a>
            </li>
            <li class="nav-item">
                <a id="link2" class="nav-link" href="palvelut.php">Palvelumme</a>
            </li> 
            <li class="nav-item">
                <a id="link3" class="nav-link" href="yhttiedot.php">Yhteystiedot</a>
            </li>  
            <li class="nav-item">
                <a id="link4" class="nav-link" href="referenssit.php">Referenssit</a>
            </li>   
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal3" href="yhtotto_sivu.php">Lähetä viesti</a>
            </li>  
            <!--Dropdownmenu jossa toimii tällä hetkellä kuluttajan kirjautumislinkki ja yhtottolomake -Henry-->
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Kirjaudu</button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="as_kirjautuminen.php">Asiakas</a></li>
                    <li><a class="dropdown-item" href="tyo_kirjautuminen.php">K.huolto R. Autio</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal3" href="yhtotto_sivu.php">Ota yhteyttä</a></li>
                </ul>
        </li>
        </ul>
        </div>
  </div>
</nav>
</div>

<!--Modalilla yhtottolomake-Henry-->
<div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ota yhteyttä</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="yhtotto_sivu.php" method="POST">
              <input type="hidden" name="talleta">
              <div class="form-group mb-2">
                <input type="text" class="form-control" name="nimi" placeholder="Nimesi">
              </div> 
              <div class="form-group mb-2">
                <input type="text" class="form-control" name="puhelin" placeholder="Puhelin">
              </div> 
              <div class="form-group mb-2">
                <input type="text" class="form-control" name="email" placeholder="Sähköposti">
              </div>  
              <div class="form-group mb-2">
                <textarea type="text" class="form-control" name="syy" placeholder="Viestisi"></textarea>
              </div>  
              <br>
              <button name="syota" type="submit" class="btn btn-primary">Lähetä</button>             
            </form>
      </div>
      <div class="modal-footer">
        <a href="index.php" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
</div>
<!--yhtottolomakkeen koodi loppuu-Henry-->