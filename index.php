<?php
    require "yhteys.php";
?>

<!--Hätäisesti tehty index.php jotta voidaan testailla eri asioita -Henry-->
<!DOCTYPE html>

<?php include "header.php"?>

<div class="bg-mainbg">

<!--Otsikon containeri -Henry-->
<div class="head-container bg-custombtn">
    <h1 id="mainheader">Kiinteistöhuolto R. Autio</h1>
</div>


<!--Etusivun laatikot joista avautuu haluttuja lisäominaisuuksia -Henry-->
<div class="container">
  <div class="container-fluid mt-5">
      <div class="row">
          <div id="divit" class="responsive">
              <div class="gallery">
                  <!--funktio joka siirtää sivun alkuun -Henry-->
                  <img onclick="navigateTo('info.php')" id="kuva2" class="kuvat" src="img/kuva2.png" alt="">
                <div class="desc">Tietoa meistä</div>
              </div>
            </div>
                        
            <div id="divit" class="responsive">
              <div class="gallery">
                  <img onclick="navigateTo('palvelut.php')" id="kuva3" class="kuvat" src="img/kuva3.jpg" alt="">
                <div class="desc">Palvelumme</div>
              </div>
            </div>            
            
            <div id="divit" class="responsive">
              <div class="gallery">
                  <img onclick="navigateTo('yhttiedot.php')" id="kuva4" class="kuvat" src="img/kuva4.jpg" alt="">
                <div class="desc">Yhteystiedot</div>
              </div>
            </div>        
            
            <div id="divit" class="responsive">
              <div class="gallery">
                  <img onclick="navigateTo('referenssit.php')" id="kuva5" class="kuvat" src="img/kuva5.jpg" alt="">
                <div class="desc">Referenssit</div>                
              </div>
            </div>

            <div class="clearfix"></div>
    </div>
  </div>
</div>

</div>

<?php include "footer.php"?>