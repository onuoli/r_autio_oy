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
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/anime.min.js"></script>
</head>

<body>
<!--Navbar -Henry-->
<div class="stickynavbar">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
                <a id="link1" class="nav-link" href="#">Tietoa meistä</a>
            </li>
            <li class="nav-item">
                <a id="link2" class="nav-link" href="#">Palvelumme</a>
            </li> 
            <li class="nav-item">
                <a id="link3" class="nav-link" href="#">Yhteystiedot</a>
            </li>  
            <li class="nav-item">
                <a id="link4" class="nav-link" href="#">Referenssit</a>
            </li>   
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="modal" data-bs-target="#exampleModal" href="yhtotto_sivu.php">Lähetä viesti</a>
            </li>  
            <!--Dropdownmenu jossa toimii tällä hetkellä kuluttajan kirjautumislinkki ja yhtottolomake -Henry-->
            <button class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Kirjaudu</button>
                <ul class="dropdown-menu dropdown-menu-dark">
                    <li><a class="dropdown-item" href="as_kirjautuminen.php">Kuluttaja</a></li>
                    <li><a class="dropdown-item" href="#">Yritysasiakas</a></li>
                    <li><a class="dropdown-item" href="#">K.huolto R. Autio</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal" href="yhtotto_sivu.php">Ota yhteyttä</a></li>
                </ul>
        </li>
        </ul>
        </div>
  </div>
</nav>
</div>

<!--Otsikon containeri -Henry-->
<div class="head-container bg-light">
    <h1 id="mainheader">Kiinteistöhuolto R. Autio</h1>
    <h2 id="headref">R. Autio OY on ylpeä siitä, että olemme voineet palvella monia tyytyväisiä asiakkaita vuosien varrella. 
      Alla on joitakin näytteitä referensseistämme:</h2>
</div>


<!--Modalilla yhtottolomake-Henry-->
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
<!--yhtottolomakkeen koodi loppuu-Henry-->

<!--Etusivun laatikot joista avautuu haluttuja lisäominaisuuksia -Henry-->
<div class="container">
  <div class="container-fluid mt-5">
      <div class="row">
          <div id="divit" class="responsive">
              <div class="gallery">
                  <!--funktio joka siirtää sivun alkuun -Henry-->
                  <img onclick="topFunction()" id="kuva2" class="kuvat" src="img/kuva2.png" alt="">
                <div class="desc">Tietoa meistä</div>
              </div>
            </div>
                        
            <div id="divit" class="responsive">
              <div class="gallery">
                  <img onclick="topFunction()" id="kuva3" class="kuvat" src="img/kuva3.jpg" alt="">
                <div class="desc">Palvelumme</div>
              </div>
            </div>            
            
            <div id="divit" class="responsive">
              <div class="gallery">
                  <img onclick="topFunction()" id="kuva4" class="kuvat" src="img/kuva4.jpg" alt="">
                <div class="desc">Yhteystiedot</div>
              </div>
            </div>        
            
            <div id="divit" class="responsive">
              <div class="gallery">
                  <img onclick="topFunction()" id="kuva5" class="kuvat" src="img/kuva5.jpg" alt="">
                <div class="desc">Referenssit</div>                
              </div>
            </div>

<div class="clearfix"></div>
    </div>
  </div>
</div>




<!--Muutama juttu vain placeholderiksi jotta helpompi hahmotella -Henry-->
<div id="rautio" class="container">
  <div class="container-fluid mt-5">
    <div class="row">

        <p class="col-xl-6 col-md-12 col-sm-12"><strong>Tervetuloa R. Autio Kiinteistöhuoltoon</strong> - luotettavaan ja ammattitaitoiseen kiinteistöhuollon 
          palveluntuottajaan. R. Autio Kiinteistöhuolto on perheyritys, jolla on yli 20 vuoden kokemus alalta.</br></br>
          Tarjoamme monipuolisia palveluita, jotka kattavat niin taloyhtiöiden ja kiinteistöjen ylläpidon 
          kuin erilaiset korjaus- ja huoltotehtävät. Huolehdimme rakennusten ulkoalueista, siivouksesta, lumitöistä, jätehuollosta ja paljon 
          muusta, varmistaen kiinteistöjen turvallisuuden ja viihtyvyyden ympäri vuoden.</p>
          <img class="col-xl-6 col-md-6 col-sm-12 logo" src="img/r_autio_oy.png" alt="">
    </div>
  </div>
</div>

<div id="services" class="container">
  <div class="container-fluid mt-5">
    <div class="row">
        <img class="col-xl-6 col-md-6 col-sm-12 imgs" src="" alt="">
        <p class="col-xl-6 col-md-12 col-sm-12">Olemme omistautunut tarjoamaan asiakkaillemme laadukkaita ja kattavia kiinteistöhuollon 
          ratkaisuja koko Suomen alueella.</br></br>Tarjoamme monipuolisia palveluita, jotka kattavat niin taloyhtiöiden ja kiinteistöjen ylläpidon 
          kuin erilaiset korjaus- ja huoltotehtävät. Huolehdimme rakennusten ulkoalueista, siivouksesta, lumitöistä, jätehuollosta ja paljon 
          muusta, varmistaen kiinteistöjen turvallisuuden ja viihtyvyyden ympäri vuoden.</p>
          <p class="col-xl-6 col-md-6 col-sm-12">Asiakaslähtöisyys ja laatu ovat toimintamme keskiössä. Pyrimme luomaan pitkäaikaisia 
            kumppanuuksia asiakkaidemme kanssa tarjoamalla joustavia ja räätälöityjä ratkaisuja heidän tarpeisiinsa.</br></br>Olemme ylpeitä 
            ammattitaitoisesta henkilökunnastamme ja nykyaikaisista työmenetelmistämme, jotka mahdollistavat tehokkaan ja luotettavan 
            palvelun jokaisessa kohteessa.</p>
        <img class="col-xl-6 col-md-6 col-sm-12 imgs" src="" alt="">
    </div>
  </div>
</div>

<div id="contact" class="container">
  <div class="container-fluid mt-5">
    <div class="row">
        <img class="col-xl-6 col-md-6 col-sm-12 imgs" src="" alt="">
        <p class="col-xl-6 col-md-6 col-sm-12">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
          occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        <p class="col-xl-6 col-md-6 col-sm-12">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut 
          labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo 
          consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint 
          occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</p>
        <img class="col-xl-6 col-md-6 col-sm-12 imgs" src="" alt="">
    </div>
  </div>
</div>

<div id="refer" class="container">
    <div class="container-fluid mt-5">
        <div class="row">
            <img class="col-xl-6 col-md-6 col-sm-12 imgs" src="" alt="">

            <p class="col-xl-6 col-md-6 col-sm-12"><strong>Asunto-osakeyhtiö Aurinkotuuli:</strong> "R. Autio Kiinteistöhuolto on ollut luotettava 
            kumppanimme jo useamman vuoden ajan. Heidän ammattitaitoinen tiiminsä on aina hoitanut kiinteistömme huollon erinomaisesti, 
            olipa kyse lumitöistä, piha-alueiden kunnossapidosta tai yleisestä siivouksesta."</p>
            <p class="col-xl-6 col-md-6 col-sm-12"><strong>Toimistokiinteistö Oy Keskuksenkatu</strong> "Olemme olleet erittäin tyytyväisiä R. Autio 
              Kiinteistöhuollon palveluihin. Heidän nopea reagointikykynsä ja ammattitaitoinen henkilökuntansa ovat tehneet yhteistyöstä sujuvaa 
              ja miellyttävää. Voimme lämpimästi suositella heitä."</p>
            <img class="col-xl-6 col-md-6 col-sm-12 imgs" src="" alt="">
            <p class="col-xl-6 col-md-6 col-sm-12"><strong>Rivitaloyhtiö Tammikuja</strong> "R. Autio Kiinteistöhuolto on ollut meille korvaamaton kumppani. He 
              ovat aina hoitaneet tehtävänsä ripeästi ja huolellisesti. Erityisesti arvostamme heidän joustavuuttaan ja kykyään vastata nopeasti 
              muuttuviin tarpeisiimme."</p>
            <img class="col-xl-6 col-md-6 col-sm-12 imgs" src="" alt="">
        </div>
    </div>
  </div>


<button id="back" class="btn btn-primary">Takaisin</button>


<!--Footerin koodit -Henry-->
<footer class="footer mt-auto py-3 bg-light">
    <div class="container">
        <span class="text-muted">Kiinteistöhuolto R. Autio</span><br>
        <span class="text-muted">Osoite: Esimerkkikatu 123, 90000 Tornio</span><br>
        <span class="text-muted">Puhelin: 040 123 4567</span><br>
        <span class="text-muted">Sähköposti: info@khuoltorautio.fi</span><br>
        <div>
            <a href="https://facebook.com/khuoltorautio" target="_blank" class="me-2"><i class="bi bi-facebook"></i></a>
            <a href="https://twitter.com/khuoltorautio" target="_blank" class="me-2"><i class="bi bi-twitter"></i></a>
            <a href="https://instagram.com/khuoltorautio" target="_blank"><i class="bi bi-instagram"></i></a>
        </div>
    </div>
</footer>

<script src="js/anime.js"></script>
</body>

</html>
