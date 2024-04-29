<?php
    require "yhteys.php";
?>


<!--Hätäisesti tehty index.php jotta voidaan testailla eri asioita -Henry-->
<!DOCTYPE html>
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
</head>

<body>

<!--Navbar -Henry-->
<div class="stickynavbar">
        <nav class="navbar navbar-expand-sm brown navbar-dark">
            <div class="container-fluid">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                  <li class="nav-item">
                    <a class="nav-link" href="#">Etusivu</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Tietoa</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Jotain...</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Jotain....</a>
                  </li>    
                  <li class="nav-item">
                    <a class="nav-link" href="#">Joootai...</a>
                  </li>  
                </ul>               
              </div>           
            </div>
            <!--Dropdownmenu jossa toimii tällä hetkellä kuluttajan kirjautumislinkki ja yhtottolomake -Henry-->
            <div class="btn-group">
                <button class="btn btn-lg dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">Kirjaudu</button>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="as_kirjautuminen.php">Kuluttaja</a></li>
                        <li><a class="dropdown-item" href="#">Yritysasiakas</a></li>
                        <li><a class="dropdown-item" href="#">K.huolto R. Autio</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="yhtotto_sivu.php">Ota yhteyttä</a></li>
                    </ul>
            </div>
        </nav>
    </div>
    
<div class="head"><h1>Kiinteistöhuolto R. Autio</h1></div>

<!--Modalilla yhtottolomake ja yksinkertainen buttoni avaukselle (testaukseen) -Henry-->
<button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="yhtotto_sivu.php">Ota yhteyttä</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ota yhteyttä</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
            <form action="yhtotto_sivu.php" method="POST">
              <input type="hidden" name="talleta">
              <div class="form-group">
                <input type="text" class="form-control" name="nimi" placeholder="Nimesi">
              </div> 
              <div class="form-group">
                <input type="text" class="form-control" name="puhelin" placeholder="Puhelin">
              </div> 
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Sähköposti">
              </div>  
              <div class="form-group">
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
<!--yhtottolomakkeen koodi loppuu-->


<!--Muutama juttu vain placeholderiksi jotta helpompi hahmotella -Henry-->
<div class="container-fluid mt-5">
    <div class="row">

        <img class="col-xl-6 col-md-6 col-sm-12" src="" alt="">

        <p class="col-xl-6 col-md-6 col-sm-12">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

        <p class="col-xl-6 col-md-6 col-sm-12">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>

        <img class="col-xl-6 col-md-12 col-sm-12" src="" alt="">

    </div>
</div>

</body>

</html>