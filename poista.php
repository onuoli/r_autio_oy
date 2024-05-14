<?php
    require "yhteys.php";

    if (isset($_POST['poista']) && is_array($_POST['poista'])) {
        $poistettavat = $_POST['poista'];
        foreach ($poistettavat as $vikailmoitusID) {
            $vikailmoitusID = intval($vikailmoitusID);
            $kysely = "DELETE FROM vikailmoitus WHERE vikailmoitusID = :vikailmoitusID";
            $poista = $yhteys->prepare($kysely);
            $poista->bindvalue(':vikailmoitusID', $vikailmoitusID, PDO::PARAM_INT);
            $poista->execute();
        }
        header("Location: tyo_sivu.php");
        exit;
    }
?>