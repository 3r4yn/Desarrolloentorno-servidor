<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $medios = ["MARCA" => "https://www.marca.com", "El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es",
    "ABC" => "https://www.abc.es", "La Vanguardia" => "https://www.vanguardia.com"];
    
    $clavealeatoria = array_rand($medios);
    $medio = $clavealeatoria;
    $urlaleatoria = $medios[$clavealeatoria];
    ?>
    <p>El medio recomendado es : <a href="<?php echo $urlaleatoria ?>"><?php echo $medio ?></a></p>
</body>
</html>