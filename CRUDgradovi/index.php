<?php

include '../konekcija.php';

$where = [];
$where[] = "1=1 ";


if(isset($_GET['naziv']) && $_GET['naziv'] != "" ){
    $naziv = strtolower($_GET['naziv']);
    $where[] = " lower(naziv) LIKE '%$naziv%' ";
}

$upit = implode("AND", $where );

$sql = "SELECT * FROM grad WHERE $upit";
$rez = mysqli_query($konekcija, $sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet"  href="../style.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
<title>Gradovi</title>
</head>

<body style="background-image: url('gradovi.jpg');">

<a href="dodaj_novi.php">Dodajte novi grad</a>

<form action="./index.php" method="GET">
    
    <h4 class="mt-4 ml-4 mb-3">Pretraga: </h4>

            
            <input type="text" class="form-control ml-4 mb-2" style="width:200px;" name="naziv" placeholder="Unesite naziv grada">

            <input type="submit" class="btn btn-success mt-2 ml-4" value="Pretrazi" name="pretrazi">
</form>


<table style="width: 600px;" class="table table-info mt-5 ml-4">
    <thead>
        <tr>
            <th>ID</th>
            <th>Naziv</th>
            <th>Izbriši</th>
            <th>Izmijeni</th>
        </tr>
    </thead>
    <tbody>
        <?php
            while($red = mysqli_fetch_assoc($rez)){
                $id_temp = $red['id'];
                $link1 = "<a href=\"obrisi_grad.php?id=$id_temp\">izbrisi</a>";
                $link2 = "<a href=\"izmijeni_grad.php?id=$id_temp\">izmijeni</a>";
                echo "<tr>";
                    echo "<td>".$id_temp."</td>";
                    echo "<td>".$red['naziv']."</td>";
                    echo "<td>".$link1."</td>";
                    echo "<td>".$link2."</td>";
                echo "</tr>";
            }

        ?>
    </tbody>
</table>


</body>
</html>


