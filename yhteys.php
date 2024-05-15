<?php
    // muodostetaan yhteys tietokantaan
    try {
        $palvelin= "localhost";
        $tietokanta = "r_autio_oy";
        $tunnus = "testiuser";
        $salasana = "salasana12";
        
        $yhteys = new PDO("mysql:host=$palvelin;dbname=$tietokanta;charset=utf8", "$tunnus", "$salasana");
        $yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // print "<p>Tietokantayhteyden avaaminen onnistui.</p>"; 
    } catch(PDOException $e) {
        print "<p>Tietokantayhteyden avaaminen epäonnistui.</p>" . $e -> getMessage();
    }
?>