<!--Vikailmoitusten lähettäminen Tuukka-->
<?php
    require "yhteys.php";

    if(isset($_POST['ilmoit'])){
        $asuntoID=$_POST['asuntoID'];
        $kuvaus=$_POST['kuvaus'];

        $komento="INSERT INTO vikailmoitus(asuntoID, kuvaus) VALUES(:asuntoID, :kuvaus)";
        $lisaa = $yhteys->prepare($komento);
        $lisaa->bindvalue(':asuntoID', $asuntoID, PDO::PARAM_STR);
        $lisaa->bindvalue(':kuvaus', $kuvaus, PDO::PARAM_STR);
        $lisaa->execute();
    }
    header("location:as_sivu.php");
?>
