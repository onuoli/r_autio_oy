<?php
    require "yhteys.php";

    // tietokantakysely yhteydenotoille
    $kyselyt = "SELECT * FROM yhteydenotto";
    $datat = $yhteys->query($kyselyt);

?>

<br>
<br>
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <a href="uloskirjautuminen.php" class="btn btn-danger">Kirjaudu ulos</a>
            <a href="tyo_sivu.php" class="btn btn-warning">Takaisin</a>
        </div>

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
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="js/scripts.js"></script>
        <link rel="stylesheet" href="css/styles.css">	
    </head>
    <body>
        <div class="container">
            <h1>Yhteydenotot</h1>
            <div class="table-responsive">   
            <table class="table">
                <thead>
                    <tr>
                        <th>Nimi</th>
                        <th>Puhelin</th>
                        <th>Email</th>
                        <th>Syy</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($rivit = $datat->fetch(PDO::FETCH_OBJ)): ?>
                    <tr>
                        <td><?php echo $rivit->nimi; ?></td>
                        <td><?php echo $rivit->puhelin; ?></td>
                        <td><?php echo $rivit->email; ?></td>
                        <td><?php echo $rivit->syy; ?></td>                        
                    </tr>
                    <?php endwhile; ?> 
                </tbody>
            </table>
            </div>
        </div>
    </body> 
</html>