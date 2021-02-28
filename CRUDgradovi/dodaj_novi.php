<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">  
    <title>Dodaj novi grad</title>
</head>
<body style="background-image: url('gradovi.jpg');">

<h4 class="mt-4 ml-4 mb-3">Unesite novi grad: </h4>
    <form action="dodaj.php" method="POST">
        
        <input type="text" name="naziv" class="ml-4 mb-3" placeholder="Unesi naziv grada">

        <button class="btn btn-primary">Unesi</button>

    </form>
    
</body>
</html>