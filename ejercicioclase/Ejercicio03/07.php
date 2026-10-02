<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /** @var array $paises */
        /** @var array $ciudades */
    require "infopaises.php";
    $lista=[];
//Para utilizar el arrayrand debemos indexar el array original paises..
    foreach ($paises as $nombre => $info){
    $lista [] = [
    "nombre" => $nombre,
    "capital" => $info["Capital"],
    "poblacion" => $info["Poblacion"]
    ];
    }
//array_rand escoge dos indices aleatorios
    $indice = array_rand($lista, 2);

    $pais1 = $lista[$indice[0]];
    $pais2 = $lista[$indice[1]];

    echo "Pais: ".$pais1["nombre"] . "<br>";
    echo "Capital: ".$pais1["capital"] . "<br>";
    echo "Poblacion ".$pais1["poblacion"]. "<br>";

    foreach ($ciudades[$pais1["nombre"]] as $ciudad){
    echo "- $ciudad<br>";
    }
    
    $mapa = "https://www.google.es/maps/place/" . urldecode($pais1["nombre"]);
    echo "<a href='$mapa' target='_blank'>Ver en Google Maps</a><br>";

    echo "Pais: ". $pais2["nombre"]. "<br>";
    echo "Poblacion: ". $pais2["poblacion"]. "<br>";
    echo "Capital: ". $pais2["capital"]. "<br>";
    
    foreach ($ciudades[$pais2["nombre"]] as $ciudad){
    echo "- $ciudad <br>";
    }

    $mapa2 = "https://www.google.es/maps/place/" . urldecode($pais2["nombre"]);
    echo "<a href='$mapa2' target='_blank'>Ver en Google Maps</a><br>";
    ?>
</body>
</html>