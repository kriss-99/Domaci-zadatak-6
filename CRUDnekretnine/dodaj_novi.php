<?php

    include '../konekcija.php';

    isset($_POST['naziv']) ? $naziv = $_POST['naziv'] : "";

    $ins = "INSERT INTO tip_nekretnine (naziv1) VALUES ('$naziv')";

    $rez = mysqli_query($konekcija, $ins);
    
    if($rez){
        header("location: ./index.php?msg=uspjesno_dodato");
    }else
    header("location: ./index.php?msg=greska");
    

    
    
?>



