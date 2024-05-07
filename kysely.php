<?php // työntekijöiden json-tiedostoon lukeminen
    include('yhteys.php');

    $listaus="SELECT tyontekijaID, sukunimi, etunimi, rooli FROM tyontekija ORDER BY sukunimi, etunimi, rooli";
    $data = $yhteys->query($listaus);

    $JSON = '{"tyontekijat":[';
    $laskuri = 0;
    $riveja = $data->rowCount();

    while($rivi = $data->fetch(PDO::FETCH_ASSOC)){
        $laskuri++;
        $JSON.='{"TyontekijaID":"'.$rivi['tyontekijaID'].'","Etunimi":"'.$rivi['etunimi'].'","Sukunimi":"'.$rivi['sukunimi'].'","Rooli":"'.$rivi['rooli'].'"}';            
        if($laskuri<$riveja) $JSON.=",";
    
    }

    $JSON.="]}";

    $handler = fopen("tyontekijat.json" , "w");
    fwrite($handler, $JSON);
    fclose($handler);
    ?>