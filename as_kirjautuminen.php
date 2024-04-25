<?php
    // debugaamiseen ja virheiden tulostukseen
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    // tietokantayhteyden luominen
    require "yhteys.php";
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