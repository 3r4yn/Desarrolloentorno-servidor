<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $logos=["Futbol"=> "../img/futbol2.png", "nfl"=> "../img/nfl.jpg", "nba"=> "../img/nba.png", "beisbol"=> "../img/beisbol2.jpg",
     "ufc" => "../img/ufc.png", "tenis" => "../img/tenis.jpg"];

    ?>
    <table border ="1" cellpadding="2" cellspacing="0">
        <tr><td>Deporte</td><td>Logo</td></tr>
        <?php foreach ($logos as $deporte => $ruta): ?>
        <tr> 
            <td> <?php echo $deporte ?></td>
            <td><img src ="<?php echo $ruta ?>" width="50"></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>