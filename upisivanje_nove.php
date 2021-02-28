<?php

    include 'konekcija.php';

    isset($_POST['grad']) ? $grad=$_POST['grad'] : "";
    isset($_POST['tip_og']) ? $oglas=$_POST['tip_og'] : "";
    isset($_POST['tip_ne']) ? $tip=$_POST['tip_ne'] : "";
    isset($_POST['povrsina']) ? $povrsina=$_POST['povrsina'] : "";
    isset($_POST['cijena']) ? $cijena=$_POST['cijena'] : "";
    isset($_POST['god_izgr']) ? $god=$_POST['god_izgr'] : "";
    isset($_POST['opis']) ? $opis=$_POST['opis'] : "";

    
    
    $upit= "INSERT INTO nekretnine ( grad_id, tip_oglasa_id, tip_nekretnine_id, povrsina, cijena, godina_izgradnje, opis) VALUES ($grad, $oglas, $tip, '$povrsina', '$cijena', '$god', '$opis') "; 
 
    $rez = mysqli_query($konekcija, $upit);

    var_dump($rez);

     $id = mysqli_insert_id($konekcija);

     if(isset($_FILES['photo'])) {
     $slika = $_FILES['photo'];
     $brSlika = count($slika['name']);
    
     for ($i = 0; $i < $brSlika; $i++) {

        $ext = explode(".", $slika['name'][$i]);

        $ext = $ext[count($ext) - 1];
    
        $dest = "./slike/" .uniqid(). "." . $ext;
    
         copy($slika['tmp_name'][$i], $dest);
    
         $upit2 = "INSERT INTO fotografije (naziv, nekretnina_id) VALUES ('$dest', $id)";

      

           $res = mysqli_query($konekcija, $upit2);
         }
    }

    if($rez){

         header("location: ./index.php?msg=dodato");
            }else{
         header("location: ./index.php?msg=greska");
   }

 ?>