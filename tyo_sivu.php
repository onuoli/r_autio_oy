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
<br>
<a href="uloskirjautuminen.php" class="btn btn-danger">Kirjaudu ulos</button>