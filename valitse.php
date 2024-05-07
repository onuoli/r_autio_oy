<?php    

require('yhteys.php');

if (isset($_GET['tyontekijaID'])) {
    $tyontekijaID = $_GET['tyontekijaID'];
    $kyselyA = "SELECT * FROM tyontekija WHERE tyontekijaID = :tyontekijaID";
    $stmt1 = $yhteys->prepare($kyselyA);
    $stmt1->execute([':tyontekijaID' => $tyontekijaID]);
    $rivitA = $stmt1->fetch(PDO::FETCH_OBJ);
    }

if (isset($_GET['vikailmoitusID'])) {
    $vikailmoitusID = $_GET['vikailmoitusID'];
    $kyselyB = "SELECT * FROM vikailmoitus WHERE vikailmoitusID = :vikailmoitusID";
    $stmt2 = $yhteys->prepare($kyselyB);
    $stmt2->execute([':vikailmoitusID' => $vikailmoitusID]);
    $rivitB = $stmt2->fetch(PDO::FETCH_OBJ);
    }

    if(isset($_POST['valitse'])){
        $tyontekijaID = $_POST['tyontekijaID'];
        $kyselyC = "UPDATE vikailmoitus SET tyontekijaID = :tyontekijaID WHERE vikailmoitusID = :vikailmoitusID";
        $muuta = $yhteys->prepare($kyselyC);
        $muuta->execute([':tyontekijaID' => $tyontekijaID]);
        header("Location: tyo_sivu.php");
        exit();
    }else {
        echo "työntekijä on " . $tyontekijaID . " ja vikailmoitus on " . $vikailmoitusID;
    }
?>