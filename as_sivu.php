<?php
    // testausta varten viesti session testaamiseen
    session_start();
    echo "Hei " . $_SESSION['tunnus'];

    // näille sivuille tulee vielä lisää tarkistuksia virheiden estämiseksi,
    // mutta tällä hetkellä sessio toimii ja näyttää tunnuksen oikein
?>
<br>
<a href="uloskirjautuminen.php" class="btn btn-danger">Kirjaudu ulos</button>