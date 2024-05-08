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

<?php
    require "yhteys.php";

    if(isset($_GET['upd_id'])){
        $vikailmoitusID=$_GET['upd_id'];
        $kysely = "SELECT * FROM vikailmoitus WHERE vikailmoitusID= '$vikailmoitusID'";
        $data = $yhteys->query($kysely);
        $rivit = $data->fetch(PDO::FETCH_OBJ);
    }

    if(isset($_GET['upd_id'])){
      $vikailmoitusID = $_GET['upd_id'];
      $kysely = "SELECT kuvaus FROM vikailmoitus WHERE vikailmoitusID = '$vikailmoitusID'";
      $data = $yhteys->query($kysely);
      $rivit = $data->fetch(PDO::FETCH_OBJ);
      $kuvaus = '';
      if ($rivit && isset($rivit->kuvaus)) {
          $kuvaus = $rivit->kuvaus;
      }
  }    

    if(isset($_POST['laheta'])){
        $tyontekija=$_POST['tyontekijaID'];        
        $komento = "UPDATE vikailmoitus SET tyontekijaID = :tyontekijaID WHERE vikailmoitusID = '$vikailmoitusID'";
        $muuta = $yhteys->prepare($komento);
        $muuta->execute([':tyontekijaID' => $tyontekija]);
        header("location: tyo_sivu.php");
    }
?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Työntekijän lisääminen vikailmoitukselle</h1>
      </div>
      <div class="modal-body">
      <div class="form-group mx-sm-3 mb-2">
            <label for=""><?php echo $kuvaus; ?></label>
      </div>
      <form method="POST" action="valitse.php?upd_id=<?php echo $vikailmoitusID; ?>" class="form-inline">
                <label for="tyontekija">Valitse työntekijä:</label>
                    <select name="tyontekijaID" id="tyontekija">
                        
                        <?php include('kysely.php');
                            $json_data = file_get_contents("tyontekijat.json");
                            $tyontekijat = json_decode($json_data, true);
                            if (count($tyontekijat) != 0) {
                                foreach ($tyontekijat as $key) {
                                    foreach ($key as $tyontekija) {
                                        $nimi = $tyontekija['Sukunimi'] . ' ' . $tyontekija['Etunimi'];
                                        echo '<option value="' . $tyontekija['TyontekijaID'] . '">' . $nimi . '</option>';
                                    }
                                }
                            }?>
                            
                </select><br>
        <button name="laheta" type="submit" class="btn btn-primary mx-sm-3 mb-2" onclick="return confirm('Oletko varma?')">Päivitä</button>
        </form>
      </div>
      <div class="modal-footer">
        <a href="tyo_sivu.php" class="btn btn-secondary">Close</a>
      </div>
    </div>
  </div>
</div>