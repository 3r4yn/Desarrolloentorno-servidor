<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>
<body>
    <?php
    $medios=["El Pais" => "https://www.elpais.com", "El Mundo" => "https://www.elmundo.es", 
    "ABC" => "https://www.abc.es", "La Vanguardia" => "https://www.vanguardia.com", "MARCA" => "https://www.marca.com"];
    ?>
    <ul>
        <?php foreach($medios as $medio => $url): ?>
            <li><a href="<?php echo $url ?>"><?php echo $medio ?></a></li>
        <?php endforeach; ?>
    </ul>
</body>
</html>