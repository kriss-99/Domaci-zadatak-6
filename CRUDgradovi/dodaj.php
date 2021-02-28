<?php

    include '../konekcija.php';

    isset($_POST['naziv']) ? $naziv = $_POST['naziv'] : "";

    $ins = "INSERT INTO grad (naziv) VALUES ('$naziv')";

    $rez = mysqli_query($konekcija, $ins);

    header("location: ./index.php");

    
    
?>



