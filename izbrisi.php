<?php 

    include 'konekcija.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : "";

    $sql1 = "DELETE FROM fotografije WHERE nekretnina_id=$id";
    $rez= mysqli_query($konekcija,$sql1);
    if($rez){
        $sql2 = "DELETE FROM nekretnine WHERE id = $id";
        $rez2 = mysqli_query($konekcija, $sql2);
        var_dump($rez2);
    }



    
    if($rez){
    header("location: index.php?msg=izbrisano");
    }else{
    header("location: index.php?msg=greska");
    }

?>