<?php

    include 'konekcija.php';

    isset($_POST['id']) && is_numeric($_POST['id']) ? $id = $_POST['id'] : "";
    isset($_POST['povrsina']) ? $povrsina = $_POST['povrsina'] : "";
    isset($_POST['cijena']) ? $cijena = $_POST['cijena'] : "";
    isset($_POST['godina_izgradnje']) ? $godina_izgradnje = $_POST['godina_izgradnje'] : "";
    isset($_POST['opis']) ? $opis = $_POST['opis'] : "";
    isset($_POST['status']) ? $status = $_POST['status'] : "";
    isset($_POST['datum_prodaje']) ? $datum_prodaje = $_POST['datum_prodaje'] : "";

    $izm = "UPDATE nekretnine SET povrsina = '$povrsina', cijena = '$cijena', godina_izgradnje = '$godina_izgradnje', opis = '$opis', status = '$status', datum_prodaje = '$datum_prodaje' WHERE id = $id ";

    $rez = mysqli_query($konekcija, $izm);

    if(isset($_FILES['photo'])){

        $slika = $_FILES['photo'];
        $brSlika = count($slika['name']);
    
        for ($i = 0; $i < $brSlika; $i++) {

             $ext = explode(".", $slika['name'][$i]);

             $ext = $ext[count($ext) - 1];
    
             $dest = "./slike/" .uniqid(). "." . $ext;
    
             copy($slika['tmp_name'][$i], $dest);
    
             $upit2 = "UPDATE fotografije SET naziv='$dest' WHERE nekretnina_id = $id";

  
           $res = mysqli_query($konekcija, $upit2);
         }
    }
       
     if($rez){

     header("location: index.php");
    
    }
?>

