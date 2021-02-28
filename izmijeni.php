<?php 
    include 'konekcija.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Greska");

    $sql = "SELECT * FROM nekretnine WHERE id = $id";
    $rez = mysqli_query($konekcija, $sql);
   
    $nekretnina = mysqli_fetch_assoc($rez);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Izmijeni nekretninu</title>
</head>
<body>

    <form action="izmjena2.php" method="POST" enctype = "multipart/form-data">

        <h4 class="mt-3 ml-3 mb-3">Izmijeni specifikacije nekretnine: </h4>

        <input type="hidden" name="id" value="<?=$id?>">

        <div class="row">
        <div class="col-2 text-center" style="padding: 15px">
         <b>Povrsina:</b>
        </div>
        <div class="col-2">
        <input type="text" name="povrsina" style="width: 100px;" class="form-control ml-3 mt-3 mb-2"value="<?=$nekretnina['povrsina']?>m2">
        </div>
        </div>

        <div class="row">
        <div class="col-2 text-center" style="padding: 15px">
        <b>Cijena:</b>
        </div>
        <div class="col-2">
        <input type="text" name="cijena" class="form-control ml-3 mt-3 mb-2" style="width: 100px;" value="<?=$nekretnina['cijena']?>€">
        </div>
        </div>

        <div class="row">
        <div class="col-2 text-center" style="padding: 15px">
       <b>Godina izgradnje:</b>
        </div>
        <div class="col-2">
        <input type="text" name="godina_izgradnje" style="width: 100px;" class="form-control ml-3 mt-3 mb-2" value="<?=$nekretnina['godina_izgradnje']?>">
        </div>
        </div>

        
        <div class="row">
        <div class="col-2 text-center" style="padding: 15px">
       <b>Opis:</b>
        </div>
        <div class="col-2 text-center">
        <textarea name="opis" class="form-control ml-3 mb-2" cols="5" rows="3"><?=$nekretnina['opis']?></textarea>
    
    
        </div>
        </div>
         

            
        <div class="row">
        <div class="col-2 text-center" style="padding: 15px">
        <b>Status:</b>
        </div>
        <div class="col-2">
        <input type="text" name="status" style="width: 100px;" class="form-control mt-3 ml-3 mb-2" value="<?=$nekretnina['status']?>">       
        </div>
        </div>
         
        <div class="row">
        <div class="col-2 text-center" style="padding: 15px">
        <b>Datum prodaje:</b>
        </div>
        <div class="col-2">
        <input type="date" name="datum_prodaje" style="width: 180px;" class="form-control ml-3 mt-3 mb-2" value="<?=$nekretnina['datum_prodaje']?>">        </div>
        </div>

         
        <div class="row">
        <div class="col-2 text-center" style="padding: 15px">
        <b>Fotografija:</b>
        </div>
        <div class="col-2">
        <input type="file" class="form-control ml-3" style="width: 250px;" name="photo[]" multiple > 
        </div>
       
        <div>
        
        <button class="btn btn-success ml-5">Sačuvaj izmjene</button>
        
        </div>

    
     

    </form>
    
</body>
</html>