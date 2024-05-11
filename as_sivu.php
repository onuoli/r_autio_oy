
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

<!--Navbar-->
<div class="stickynavbar">
    <nav class="navbar navbar-expand-sm brown navbar-dark">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <!-- modaalin avaaminen -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" href="yhtotto_sivu.php">Vikailmoitus</button>
            <!-- uloskirjautuminen -->
            <a href="uloskirjautuminen.php" class="btn btn-danger">Kirjaudu ulos</a>
        </div>
    </nav>
</div>


    
<!-- modal-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Vikailmoitus</h1>
      </div>
      <div class="modal-body">
            <form action="vikailmoitus_lomak.php" method="POST">
              <input type="hidden" name="talleta">
              <div class="form-group">
              <input type="text" class="form-control" name="asuntoID" value="<?php if(isset($asuntoID)) echo $_SESSION['asuntoID'];?>" placeholder="<?php echo $_SESSION['asuntoID'];?>">
              </div> <br>
              <div class="form-group">
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

        <p class="col-xl-6 col-md-6 col-sm-12">Tervetuloa (asukas)(Asunto)</p>

    </div>
</div>

</body>

</html>