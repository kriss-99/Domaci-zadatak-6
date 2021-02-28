<?php 
    include '../konekcija.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : exit("Greska.");

    $sql = "SELECT * FROM grad WHERE id = $id";

    $res = mysqli_query($konekcija, $sql);

    $grad = mysqli_fetch_assoc($res);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Izmijeni grad</title>
</head>
<body style="background-image: url('gradovi.jpg');">

    <div class="mt-3 ml-4">
    <h4>Izmijeni grad: </h4>
    <form action="izmjena.php" method="POST">

        <input type="hidden" name="id" value="<?=$id?>">
        <input type="text" name="naziv" placeholder="Unesite naziv grada" value="<?=$grad['naziv']?>">

        <button class="btn btn-danger ">Izmijeni</button>
    </form>
    </div>
    
</body>
</html>