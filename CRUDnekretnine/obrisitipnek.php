
<?php 
    include '../konekcija.php';

    isset($_GET['id']) && is_numeric($_GET['id']) ? $id = $_GET['id'] : "";

    $sql = "DELETE FROM tip_nekretnine WHERE id = $id";

    $res = mysqli_query($konekcija, $sql);

   
        header("location: ./index.php");
   
?>