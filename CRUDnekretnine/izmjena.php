<?php

    include '../konekcija.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : "";
    isset($_POST['naziv']) ? $naziv = $_POST['naziv'] : "";


    $izm= "UPDATE tip_nekretnine SET naziv1 = '$naziv' WHERE id = $id;";

    $rez = mysqli_query($konekcija, $izm);

   header("location: ./index.php");
    
?>


