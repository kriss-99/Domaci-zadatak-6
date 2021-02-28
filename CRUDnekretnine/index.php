<?php 
    include '../konekcija.php';

    $where = [];
    $where[] = " 1=1 ";
    if( isset($_GET['naziv']) && $_GET['naziv'] != "" ){
        $naziv = strtolower($_GET['naziv']);
        $where[] = " lower(naziv) LIKE '%$naziv%' ";
    }
    
    $upit = implode("AND", $where );

    $sql = "SELECT * FROM tip_nekretnine WHERE $upit";
    $rez = mysqli_query($konekcija, $sql);
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Nekretnine CRUD</title>
</head>
<body style="background-image: url('slikaa.jpg')">

<a href="novi_tip.php">Dodajte novi tip nekretnine</a>
    
    <form action="./index.php" method="GET">

        <h4 class="mt-4 ml-4 mb-3">Pretraga</h4>
        
        <input type="text" class="form-control ml-4" style="width:200px;" name="naziv" placeholder="Unesi naziv">

        <input type="submit" class="btn btn-success mt-2 ml-4" value="Pretrazi" name="pretrazi">


    </form>


    <table style="width: 500px;" class="table table-info mt-5 ml-4">
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
                    $link1 = "<a href=\"obrisitipnek.php?id=$id_temp\">izbriši</a>";
                    $link2 = "<a href=\"izmijenitipnek.php?id=$id_temp\">izmijeni</a>";

                    echo "<tr>";
                        echo "<td>".$id_temp."</td>";
                        echo "<td>".$red['naziv1']."</td>";
                        echo "<td>".$link1."</td>";
                        echo "<td>".$link2."</td>";
                    echo "</tr>";
                }

            ?>
        </tbody>
    </table>
   
   
</body>
</html>