
<?php

    include 'konekcija.php';
    
   
    if(isset($_POST['grad'])){

        $grad = $_POST['grad'];
        $upit1 = " grad_id = $grad"; 
    } else{

        $upit1 = " 1=1";
    }

    if(isset($_POST['tip_og'])){

        $oglas = $_POST['tip_og'];
        $upit2 = " tip_oglasa_id = $oglas"; 
    } else{

        $upit1 = " 1=1";
    }
   
    if(isset($_POST['tip_ne'])){

        $tip = $_POST['tip_ne'];
        $upit3 = " tip_nekretnine_id = $tip"; 
    } else{

        $upit3 = " 1=1";
    }

    if(isset($_POST['povrsina']) && $_POST['povrsina'] != ""){

        $povrsina = $_POST['povrsina'];
        $upit4 = " povrsina > $povrsina"; 
    } else{
        $upit4=" 1=1";
    }

     if(isset($_POST['cijenaod']) && isset($_POST['cijenado']) == ""){

       $cijena1 = $_POST['cijenaod'];
       $upit5 = " cijena >= $cijena1";

      }elseif(isset($_POST['cijenado']) && isset($_POST['cijenaod']) == ""){

     $cijena2 = $_POST['cijenado'];
     $upit5 = " cijena <= $cijena2";
     }

     elseif(isset($_POST['cijenaod']) && isset($_POST['cijenado']) && $_POST['cijenaod'] != "" && $_POST['cijenado'] != ""){

        $cijena1 = $_POST['cijenaod'];
        $cijena2 = $_POST['cijenado'];
        $upit5 = " cijena >= $cijena1 AND cijena <= $cijena2";
    } else{
        $upit5 = " 1=1";
    }

    $sql = "SELECT n.id, g.naziv, tn.naziv1 FROM nekretnine n, grad g, tip_nekretnine tn WHERE n.grad_id=g.id AND tn.id=n.tip_nekretnine_id AND $upit1 AND $upit2 AND $upit3 AND $upit4 AND $upit5 ORDER BY n.id ASC";

   // echo "$sql";
   
    $rezultat= mysqli_query($konekcija, $sql);

    // if($rezultat){
    //     echo "uspjesno";

    // } else {
    //     echo "neuspjesno";
    // }
   


   //echo "$sql";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Pretraga po kriterijumima nekretnine</title>
</head>
<body>
<div class="mt-4 ml-3" style="width: 800px;">

    <h4>Rezultat Vaše pretrage</h4>
    <table class="table table-primary">
        <thead>
           <tr>
            <th>ID</th> 
            <th>Grad</th>
            <th>Tip nekretnine</th>
            <th>Detalji</th>
            <th>Izmijeni</th>
            <th>Izbriši</th>
           </tr>
      
        </thead>
        <tbody>
            
            <?php

                echo "<tr>";
                while($red= mysqli_fetch_assoc($rezultat)){ 

                    $id= $red['id'];
                    $grad = $red['naziv'];
                    $nekretnina = $red['naziv1'];
                    $detalji = "<a href=\"detalji.php?id=$id\">Detalji</a>";
                    $izmijeni = "<a href=\"izmijeni.php?id=$id\">Izmijeni</a>";
                    $izbrisi = "<a href=\"izbrisi.php?id=$id\">Izbrisi</a>";

                    echo "<td>$id</td>";
                    echo "<td>$grad</td>";
                    echo "<td>$nekretnina</td>";
                    echo "<td>$detalji</td>";
                    echo "<td>$izmijeni</td>";
                    echo "<td>$izbrisi</td>";
                    echo "</tr>";
                }
               
            ?>

        </tbody>
    </table>
    </div>
   
  
</body>
</html> 
</body>
</html>
