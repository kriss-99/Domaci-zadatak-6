<?php
    include 'konekcija.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocetna stranica agencije</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
</head>
<body>

<a href="dodaj_novu.php" class="mt-3 ml-2 mr-2" style="color:white; font-weight: bold; font-size: 18px">Dodaj novu nekretninu</a>

<a href="./CRUDgradovi/index.php" class="ml-2 mr-2" style="color:white; font-weight: bold; font-size: 18px">Gradovi</a>
<a href="./CRUDnekretnine/index.php" class="ml-2 mr-2" style="color:white; font-weight: bold; font-size: 18px">Tipovi nekretnina</a>

    <h2 class="mt-3 mb-5 text-center">Agencija za nekretnine</h2>

    <div class="container">
    
    <form action="pretrazi.php" method="POST">
    
        <div class="row">
        <b>Grad:</b>
            <div class="col-2">
                
                <select class="form-control" name="grad" >
                    <?php
                    $sql = "SELECT * FROM grad ";
                    $rezultat = mysqli_query($konekcija, $sql);
                    
                    while($row = mysqli_fetch_assoc($rezultat)){
                        $id = $row['id'];
                        $naziv = $row['naziv'];

                        echo "<option value = \"$id\">$naziv</option>";
                    }
                    ?>
            </select>
            </div>
            <b>Tip oglasa:</b>
            <div class="col-2">
            
                <select class="form-control" name="tip_og" id="tipoglasa">
                    <?php
                        $sql = "SELECT * FROM tip_oglasa ";
                        $rezultat = mysqli_query($konekcija, $sql);
                        
                        while($row = mysqli_fetch_assoc($rezultat)){
                            $id = $row['id'];
                            $naziv = $row['ime'];

                            echo "<option value = \"$id\">$naziv</option>";
                        }
                        ?>
                
                </select>
        </div>
        <b>Tip nekretnine:</b>
        <div class="col-2">
            
                <select class="form-control" name="tip_ne" id="tipnekretnine">
                <?php
                    $sql = "SELECT * FROM tip_nekretnine ";
                    $rezultat = mysqli_query($konekcija, $sql);
                    
                    while($row = mysqli_fetch_assoc($rezultat)){
                        $id = $row['id'];
                        $naziv = $row['naziv1'];

                        echo "<option value = \"$id\">$naziv</option>";
                    }
                    ?>
                
                </select>

            </div>
            <b>Površina:</b>
            <div class="col-2">
         
            <input type="text" name="povrsina" class="form-control" placeholder="Veća od...">
            </div>
    
        </div>
                    

        <div class="row mt-3">
        
        <b>Cijena min:</b>
            <div class="col-2">
          
                <input type="text" name="cijenaod" class="form-control" placeholder="Od:">
                
            </div>

            <b>Cijena max:</b>
            <div class="col-2">
      
                <input type="text" name="cijenado" class="form-control" placeholder="Do:     €"> 
                
            </div>

            <div class="col-2">
                    
                    <input type="submit" name="pretrazi" value="Pretraga" class="btn btn-success btn-md">
             </div>


        </div>
    
    </form>
    </div>
   
    <div class="mt-5 ml-3" style="width: 800px;">
    <h4 >Prikaz svih nekretnina</h4>
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

                $sql= "SELECT n.id, g.naziv, tn.naziv1 FROM nekretnine n, grad g, tip_nekretnine tn WHERE n.grad_id=g.id AND tn.id=n.tip_nekretnine_id ORDER BY id ASC";
                $rez= mysqli_query($konekcija, $sql);
                echo "<tr>";
                while($red= mysqli_fetch_assoc($rez)){ 

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