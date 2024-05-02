<?php
    // testausta varten viesti session testaamiseen
    session_start();

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
    // tietokantahaku vikailmoituksille
    require "yhteys.php";
    $kysely = "SELECT * FROM vikailmoitus";
    $data = $yhteys->query($kysely);

    // tietokantahaku työtehtäville
    $kysely2 = "SELECT * FROM tyotehtava";
    $data2 = $yhteys->query($kysely2);

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
            <h1>Vikailmoitukset</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>vikailmoitusID</th>
                        <th>asuntoID</th>
                        <th>kuvaus</th>
                        <th>luontipaiva</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rivit = $data->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?php echo $rivit->vikailmoitusID; ?></td>
                        <td><?php echo $rivit->asuntoID; ?></td>
                        <td><?php echo $rivit->kuvaus; ?></td>
                        <td><?php echo $rivit->luontipaiva; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
            <h1>Työtehtävät</h1>
            <table class="table">
                <thead>
                    <tr>
                        <th>tyotehtavaID</th>
                        <th>vikailmoitusID</th>
                        <th>tyontekijaID</th>
                        <th>kuvaus</th>
                        <th>status</th>
                        <th>korjaustoimenpide</th>
                        <th>valmistumisaika</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rivit2 = $data2->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?php echo $rivit2->tyotehtavaID; ?></td>
                        <td><?php echo $rivit2->vikailmoitusID ?></td>
                        <td><?php echo $rivit2->tyontekijaID; ?></td>
                        <td><?php echo $rivit2->kuvaus; ?></td>
                        <td><?php echo $rivit2->status; ?></td>
                        <td><?php echo $rivit2->korjaustoimenpide; ?></td>
                        <td><?php echo $rivit2->valmistumisaika; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </body>
</html>