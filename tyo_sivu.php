<?php
    // testausta varten viesti session testaamiseen
    session_start();
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // tarkistus, että sessio onko sessio käynissä ja merkattu työntekijälle
    if(isset($_SESSION['tyontekija']) && isset($_SESSION['tunnus'])){
        echo "Hei " . $_SESSION['tunnus'];
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

<?php
    require "yhteys.php";

    // tietokantakysely uusille vikailmoituksille
    $kysely1 = "SELECT vikailmoitus.vikailmoitusID AS vikailmoitusID, taloyhtio.osoite AS osoite, asunto.asunnon_numero AS asnumero, taloyhtio.postinumero AS postinumero, taloyhtio.kaupunki AS kaupunki, vikailmoitus.kuvaus AS kuvaus, vikailmoitus.luontiaika AS luontiaika FROM vikailmoitus INNER JOIN asunto on vikailmoitus.asuntoID = asunto.asuntoID INNER JOIN taloyhtio ON taloyhtio.taloyhtioID = asunto.taloyhtioID WHERE vikailmoitus.tyontekijaID IS NULL";
    $data1 = $yhteys->query($kysely1);

    // tietokantakysely vikailmoituksille, joihin on merkitty työntekijä
    $kysely2 = "SELECT vikailmoitus.vikailmoitusID AS vikailmoitusID, taloyhtio.osoite AS osoite, asunto.asunnon_numero AS asnumero, taloyhtio.postinumero AS postinumero, taloyhtio.kaupunki AS kaupunki, vikailmoitus.kuvaus AS kuvaus, vikailmoitus.luontiaika AS luontiaika, tyontekija.etunimi AS etunimi, tyontekija.sukunimi AS sukunimi FROM vikailmoitus INNER JOIN asunto on vikailmoitus.asuntoID = asunto.asuntoID INNER JOIN taloyhtio ON taloyhtio.taloyhtioID = asunto.taloyhtioID INNER JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID WHERE vikailmoitus.tyontekijaID IS NOT NULL AND vikailmoitus.valmistumisaika IS NULL";
    $data2 = $yhteys->query($kysely2);

    // tietokantakysely hoidetuille vikailmoituksille
    $kysely3 = "SELECT vikailmoitus.vikailmoitusID AS vikailmoitusID, taloyhtio.osoite AS osoite, asunto.asunnon_numero AS asnumero, taloyhtio.postinumero AS postinumero, taloyhtio.kaupunki AS kaupunki, vikailmoitus.kuvaus AS kuvaus, vikailmoitus.luontiaika AS luontiaika, tyontekija.etunimi AS etunimi, tyontekija.sukunimi AS sukunimi, vikailmoitus.toimenpide AS toimenpide, vikailmoitus.valmistumisaika AS valmistumisaika FROM vikailmoitus INNER JOIN asunto on vikailmoitus.asuntoID = asunto.asuntoID INNER JOIN taloyhtio ON taloyhtio.taloyhtioID = asunto.taloyhtioID INNER JOIN tyontekija ON vikailmoitus.tyontekijaID = tyontekija.tyontekijaID WHERE vikailmoitus.valmistumisaika IS NOT NULL";
    $data3 = $yhteys->query($kysely3);

    // vanhat tietokantakyselyt
    /*
    $kysely1 = "SELECT * FROM vikailmoitus WHERE tyontekijaID IS NULL";
    $data1 = $yhteys->query($kysely1);

    $kysely2 = "SELECT * FROM vikailmoitus WHERE tyontekijaID IS NOT NULL AND valmistumisaika IS NULL";
    $data2 = $yhteys->query($kysely2);

    $kysely3 = "SELECT * FROM vikailmoitus WHERE valmistumisaika IS NOT NULL";
    $data3 = $yhteys->query($kysely3);
    */
?>

<br>
<a href="uloskirjautuminen.php" class="btn btn-danger">Kirjaudu ulos</a>
<!DOCTYPE html>
<html lang ="">
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
        <div class="container">
            <h1>Hoitamattomat vikailmoitukset</h1>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>vikailmoitusID</th>
                        <th>osoite</th>
                        <th>kuvaus</th>
                        <th>luontiaika</th>
                        <th>aseta työntekijä</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rivit1 = $data1->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?php echo $rivit1->vikailmoitusID; ?></td>
                        <td><?php echo $rivit1->osoite . ' ' . $rivit1->asnumero . ' ' . $rivit1->postinumero . ' ' . $rivit1->kaupunki; ?></td>
                        <td><?php echo $rivit1->kuvaus; ?></td>
                        <td><?php echo $rivit1->luontiaika; ?></td>
                        <!-- Tästä napista voisi aueta modal, josta voi merkitä työntekijän -->
                        <td><a class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#exampleModal" href="">Lisää työntekijä</a></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            </div>
            <h1>Työn alla</h1>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>vikailmoitusID</th>
                        <th>osoite</th>
                        <th>kuvaus</th>
                        <th>luontiaika</th>
                        <th>työntekijä</th>
                        <th>merkitse hoidetuksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rivit2 = $data2->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?php echo $rivit2->vikailmoitusID; ?></td>
                        <td><?php echo $rivit2->osoite . ' ' . $rivit2->asnumero . ' ' . $rivit2->postinumero . ' ' . $rivit2->kaupunki; ?></td>
                        <td><?php echo $rivit2->kuvaus; ?></td>
                        <td><?php echo $rivit2->luontiaika; ?></td>
                        <td><?php echo $rivit2->etunimi . ' ' . $rivit2->sukunimi; ?></td>
                        <!-- Tästä napista voisi aueta modal, johon voisi kirjoittaa tehdyt toimenpiteet, ja merkitä työ tehdyksi timestampilla automaattisesti-->
                        <!-- Siirtää toiselle sivulle ja avaa modalin automaattisesti -Henry-->
                        <td><a class="btn btn-warning" href="hoidettu.php?upd_id=<?php echo $rivit2->vikailmoitusID; ?>">Merkitse hoidetuksi</a></td></tr>
                        <?php endwhile; ?>
                </tbody>
            </table>
            </div>
            <h1>Hoidetut vikailmoitukset</h1>
            <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>vikailmoitusID</th>
                        <th>osoite</th>
                        <th>kuvaus</th>
                        <th>luontiaika</th>
                        <th>työntekijä</th>
                        <th>toimenpide</th>
                        <th>valmistumisaika</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rivit3 = $data3->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?php echo $rivit3->vikailmoitusID; ?></td>
                        <td><?php echo $rivit3->osoite . ' ' . $rivit3->asnumero . ' ' . $rivit3->postinumero . ' ' . $rivit3->kaupunki; ?></td>
                        <td><?php echo $rivit3->kuvaus; ?></td>
                        <td><?php echo $rivit3->luontiaika; ?></td>
                        <td><?php echo $rivit3->etunimi . ' ' . $rivit3->sukunimi; ?></td>
                        <td><?php echo $rivit3->toimenpide; ?></td>
                        <td><?php echo $rivit3->valmistumisaika; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            </div>
        </div>

<!-- Modali työntekijän valitsemiselle joka ei vielä toimi -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header"><h1 class="modal-title fs-5" id="exampleModalLabel">Työntekijän lisääminen vikailmoitukselle</h1></div>
        <div class="modal-body">
            <form action="valitse.php" method="get">
            <input type="hidden" name="vikailmoitusID" id="vikailmoitusID">
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
                <button name="valitse" type="submit" class="btn btn-primary">Valitse</button>
            </form>
        </div>
      <div class="modal-footer"><a href="tyo_sivu.php" class="btn btn-secondary">Close</a></div>
    </div>
  </div>
</div>
    </body> 
</html>