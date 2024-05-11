<?php
    // debugaamiseen ja virheiden tulostukseen
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // tietokantayhteyden luominen
    require "yhteys.php";

    // aloitetaan sessio, tämänkin voi varmaan siirtää toiseen tiedostoon
    // myöhemmin -Otso
    session_start();

    // Alla olevat php-koodit voi myöhemmin mahdollisesti siirtää erilliseen
    // php-tiedostoon selkeyttämiseksi, mutta varmistetaan ensin toimivuus
    // -Otso
?>
<?php
    // jos sessio on käynnissä, palautetaan käyttäjä asukassivulle
    if(isset($_SESSION['tunnus'])){
        header("location: as_sivu.php");
        exit;
    }
?>

<?php
    // koodinpätkä joka tarkistaa syötetyn tunnuksen ja salasanan
    if(isset($_POST['submit'])){
        $tunnus = $_POST['tunnus'];
        $salasana = $_POST['salasana'];

        // tietokantahaku asukas-taulusta
        $kirjaudu = $yhteys->query("SELECT * FROM asukas WHERE tunnus = '$tunnus'");
        $kirjaudu->execute();

        $idkysely = $yhteys->query("SELECT asuntoID FROM asukas WHERE tunnus = '$tunnus'");
        $idkysely->execute();

        $data = $kirjaudu->fetch(PDO::FETCH_ASSOC);
        $asuntoID = $idkysely->fetch(PDO::FETCH_ASSOC);

        // tarkistetaan tietokantahaun rivit
        if($kirjaudu->rowCount() > 0){

            // verrataan tietokannan salasanaan, avataan sessio ja siirrytään
            // asukassivulle
            if($salasana == $data['salasana']){
                $_SESSION['asukas'] = true;
                $_SESSION['tunnus'] = $data['tunnus'];
                $_SESSION['asuntoID'] = $asuntoID['asuntoID'];
                header("location: as_sivu.php");
                exit;
            }else{
                echo "Tunnus tai salasana on väärin";
            }
        }else{
            echo "Tunnus tai salasana on väärin";
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link rel="stylesheet" href="css/styles.css">
        <title>Asukkaan kirjautuminen</title>
    </head>
    <body>
        <!-- Kirjautumiseen tarvittavat kentät, ulkonäön voi muokata myöhemmin -Otso -->
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h4>Asukkaan kirjautuminen</h4>
                </div>
                <div class="card-body">
                    <!-- haetaan tiedot kentistä post metodilla -->
                    <form method="POST" action="as_kirjautuminen.php">
                        <div class="form-floating">
                            <input type="text" name="tunnus" class="form-control" placeholder="Syötä tunnus" required>
                            <label for="tunnus">Tunnus</label>
                        </div>
                        <div class="form-floating">
                            <input type="password" name="salasana" class="form-control" placeholder="Syötä salasana" required>
                            <label for="salasana">Salasana</label>
                        </div>
                        <button class="btn btn-primary" type="submit" name="submit">Kirjaudu</button>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>