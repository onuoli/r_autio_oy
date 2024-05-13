<?php
    // testausta varten viesti session testaamiseen
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // tarkistus, että sessio onko sessio käynissä ja merkattu työntekijälle
    if(isset($_SESSION['asukas']) && isset($_SESSION['tunnus'])){
      echo "Hei " . $_SESSION['tunnus'] . " ID: " .  $_SESSION['asuntoID'];
  
    // ohjataan asukas sessio asukassivulle
    }elseif(isset($_SESSION['asukas'])){
        header("location: as_sivu.php");
        exit;
    // ohjataan kirjautumattomat takaisin etusivulle
    }else{
        header("location: index.php");
    }

    // näille sivuille tulee vielä lisää tarkistuksia virheiden estämiseksi,
    // mutta tällä hetkellä sessio toimii ja näyttää tunnuksen oikein
?>


<!-- testaamista varten otin poiskäytöstä Tuukka-->
<?php
    // testausta varten viesti session testaamiseen
//    session_start();

    // tarkistus, että sessio onko sessio käynissä ja merkattu asukkaalle
 //   if(isset($_SESSION['asukas']) && isset($_SESSION['tunnus'])){
    //    echo "Hei " . $_SESSION['tunnus'];
    // ohjataan tyontekija sessio asukassivulle
  //  }elseif(isset($_SESSION['tyontekija'])){
    //    header("location: tyo_sivu.php");
      //  exit;
    // ohjataan kirjautumattomat takaisin etusivulle
   // }else{
   //     header("location: index.php");
   // }

    // näille sivuille tulee vielä lisää tarkistuksia virheiden estämiseksi,
    // mutta tällä hetkellä sessio toimii ja näyttää tunnuksen oikein
?>
<br>

<?php
    require "yhteys.php";
    $asuntoID = $_SESSION['asuntoID'];
    $kysely = "SELECT etunimi, sukunimi FROM asukas WHERE asuntoID = :asuntoID";

    $stmt = $yhteys->prepare($kysely);
    $stmt->execute([':asuntoID' => $asuntoID]);

    $rivit = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($rivit) {
        $etunimi = $rivit['etunimi'];
        $sukunimi = $rivit['sukunimi'];}
?>



<!DOCTYPE html>
<html>

<head>
    <title>Khuolto R. Asukas</title>
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
<div class="head-container bg-custombtn">
    <h1 id="mainheader">KIINTEISTÖHUOLTO R. AUTIO <img src="img/r_autio_oy.png" alt="" height="40"></h1>
</div>
<!--Navbar-->
<div class="stickynavbar">
    <nav class="navbar navbar-expand-sm bg-customnav">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- modaalin avaaminen -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal4" href="yhtotto_sivu.php">Vikailmoitus</button>
            <!-- uloskirjautuminen -->
            <a href="uloskirjautuminen.php" class="btn btn-danger">Kirjaudu ulos</a>
        </div>
    </nav>
</div>


    
<!-- modal-->
<div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Vikailmoitus</h1>
      </div>
      <div class="modal-body">
      <form action="vikailmoitus_lomak.php" method="POST">
              <input type="hidden" name="talleta">
              <div class="form-group">
              <label for="asuntoID">Asuntonumerosi:</label>
              <input type="text" class="form-control" name="asuntoID" value="<?php echo $_SESSION['asuntoID']; ?>" placeholder="Asuntosi" readonly>
              </div> <br>
              <div class="form-group">
              <label for="vika">Vika/Puute:</label>
                <textarea type="text" class="form-control" style="height: 250px;" name="kuvaus" placeholder="Vika/puute"></textarea>
              </div>  
              <br>
              <button name="ilmoit" type="submit" class="btn btn-primary">Lähetä</button>             
            </form>
      </div>
      <div class="modal-footer">
        <a href="as_sivu.php" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
</div>
<!-- modal loppu-->


<div class="container-fluid">
  <br>
    <div class="row">

        <p class="col-xl-6 col-md-6 col-sm-12">Tervetuloa <?php echo "$etunimi $sukunimi";?></p>

    </div>
</div>
<?php include "footer.php"?>
</body>

</html>