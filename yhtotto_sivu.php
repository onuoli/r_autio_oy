
<!--Yhteydenoton koodit, lomake itsessään modalilla index.php puolella -Henry-->
<?php
    require "connect.php";

    if(isset($_POST['syota'])){
        $nimi=$_POST['nimi'];
        $puhelin=$_POST['puhelin'];
        $email=$_POST['email'];
        $syy=$_POST['syy'];

        $komento="INSERT INTO yhteydenotto(nimi, puhelin, email, syy) VALUES(:nimi, :puhelin, :email, :syy)";
        $lisaa = $yhteys->prepare($komento);
        $lisaa->bindvalue(':nimi', $nimi, PDO::PARAM_STR);
        $lisaa->bindvalue(':puhelin', $puhelin, PDO::PARAM_STR);
        $lisaa->bindvalue(':email', $email, PDO::PARAM_STR);
        $lisaa->bindvalue(':syy', $syy, PDO::PARAM_STR);
        $lisaa->execute();
    }
    header("location:index.php");
?>
