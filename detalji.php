<?php
include 'konekcija.php';
isset($_GET['id']) ? $id=$_GET['id'] : exit("Greska.");
$upit= "SELECT n.id, g.naziv, og.ime, tn.naziv1, n.povrsina, n.cijena, n.godina_izgradnje, n.opis, n.status, n.datum_prodaje from nekretnine n, grad g, tip_oglasa og, tip_nekretnine tn where n.id=$id and n.grad_id=g.id and n.tip_oglasa_id=og.id and n.tip_nekretnine_id=tn.id";
$rez= mysqli_query($konekcija, $upit);
$red=mysqli_fetch_assoc($rez);

$res = mysqli_query($konekcija, "SELECT naziv FROM fotografije WHERE nekretnina_id = $id");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Detalji o nekretnini</title>
</head>
<body style="background-image: url('detalji.jpg'); ">

    <h2 class="ml-3 mt-2 mb-3">Detalji: </h2>
    <table class="table table-secondary ml-3 mt-2 mb-3" style="width: 700px">
    <tr>
        <td>ID:</td>
        <td><?=$red['id']?></td>
    </tr>
    <tr>
        <td>Grad:</td>
        <td><?=$red['naziv']?></td>
    </tr>
    <tr>
        <td>Oglas:</td>
        <td><?=$red['ime']?></td>
    </tr>
    <tr>
        <td>Površina:</td>
        <td><?=$red['povrsina']?> m2</td>
    </tr>
    <tr>
        <td>Cijena:</td>
        <td><?=$red['cijena']?>€</td>
    </tr>
    <tr>
        <td>Godina izgradnje:</td>
        <td><?=$red['godina_izgradnje']?></td>
    </tr>
    <tr>
        <td>Opis</td>
        <td><?=$red['opis']?></td>
    </tr>
    <tr>
        <td>Status</td>
        <td><?=$red['status']?></td>
    </tr>
    <?php
    if($red['status']=="prodato"){
       echo "<tr>";
       echo "<td>Datum prodaje</td>";
       echo "<td>" .$red['datum_prodaje'] ."</td>";
       echo "<tr>";
    }
    ?>
    <tr>
        <td>Fotografije</td>
        <td>
        <?php

$i = 0;
while ($slika = mysqli_fetch_assoc($res)) {
    $path = $slika['naziv'];
    $act = "";
    if ($i == 0)
        $act = "active";
    echo "<div class='$act'>";
    echo "  <img src='$path' width='400px' height='300px'>";
    echo "</div>";
    $i += 1;
}
?>
        </td>
    </tr>
    

    </table>

</body>
</html>