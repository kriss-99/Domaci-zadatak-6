<?php
include 'konekcija.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Forma za dodavanje nove nekretnine</title>
</head>

<body style="background-image: url('slika.jpg'); color: white;">

<h3 class="mt-3 ml-3 mb-5">Unesite specifikacije za novu nekretninu: </h3>

<div class="container ml-2">
    
    <form action="upisivanje_nove.php" method = "POST" enctype="multipart/form-data">

   

        <div class="row mb-2">
            <div class="col-2 ">
            Grad:
            </div>
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
        </div>  


        <div class="row mb-2">
            <div class="col-2">
            Tip oglasa:
            </div>
            <div class="col-2">
            <select class="form-control" name="tip_og" >
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
        </div>   


        <div class="row mb-2">
            <div class="col-2">
            Tip nekretnine:
            </div>
            <div class="col-2">
            <select class="form-control" name="tip_ne" >
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
        </div>  

        <div class="row mb-2">
            <div class="col-2">
            Površina:
            </div>
            <div class="col-2">
            <input type="text" name="povrsina" class="form-control" placeholder="Unesite povrsinu">     
            </div>
        </div>  
        
        
        <div class="row mb-2">
            <div class="col-2">
            Cijena:
            </div>
            <div class="col-2">
            <input type="text" name="cijena" class="form-control" placeholder="Unesite cijenu u €">     
            </div>
        </div>  
        
        <div class="row mb-2">
            <div class="col-2">
            Godina izgradnje:
            </div>
            <div class="col-2">
            <input type="text" name="god_izgr" class="form-control">     
            </div>
        </div>  

        <div class="row mb-2">
            <div class="col-2">
            Unesite kratak opis:
            </div>
            <div class="col-2">
                    <textarea name="opis" class="form-control" cols="5" rows="3">
                    
                    </textarea>
            </div>
        </div>  
        
        <div class="row">
            <div class="col-2">
            Uploadujte fotografije:
            </div>
            <div class="col-2">
            <input type="file" required name = "photo[]" multiple>     
            </div>
        </div>  


        <div class="row">
            <div class="col">
                    <input type="submit" name="unesi" value="Dodajte" class="btn btn-primary btn-md mt-3">
            </div>
        </div>





    </form>
    
</div>
</body>
</html>