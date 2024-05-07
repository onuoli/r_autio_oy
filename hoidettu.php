<?php //Tämä toimii tietokannan kanssa eli saa kirjoitettua toimenpiteen ja aika haetaan date funktiolla
    require "yhteys.php";

    if(isset($_GET['upd_id'])){
        $vikailmoitusID=$_GET['upd_id'];
        $kysely = "SELECT * FROM vikailmoitus WHERE vikailmoitusID= '$vikailmoitusID'";
        $data = $yhteys->query($kysely);
        $rivit = $data->fetch(PDO::FETCH_OBJ);
    }

    if(isset($_POST['laheta'])){
        $toimenpide=$_POST['toimenpide'];
        $nykyinen_aika = date('Y-m-d H:i:s');
        $komento = "UPDATE vikailmoitus SET toimenpide = :toimenpide, valmistumisaika = :valmistumisaika WHERE vikailmoitusID = '$vikailmoitusID'";
        $muuta = $yhteys->prepare($komento);
        $muuta->execute([':toimenpide' => $toimenpide, ':valmistumisaika' => $nykyinen_aika]);
        header("location: tyo_sivu.php");
    }
?>

<form method="POST" action="hoidettu.php?upd_id=<?php echo $vikailmoitusID; ?>" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
        <textarea type="text" class="form-control" style="height: 250px;" name="toimenpide" id="toimenpide" placeholder="Toimenpide"></textarea>
    </div>
    <button name="laheta" type="submit" class="btn btn-primary mx-sm-3 mb-2">Päivitä</button>
</form>