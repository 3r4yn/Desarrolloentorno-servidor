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
     include("infopaises.php");
     $lista=[];

     foreach($paises as $nombre => $info){
        $lista[] = [
        "nombre" => $nombre,
        "capital" => $info["Capital"],
        "poblacion" => $info["Poblacion"]
        ];
     }
//usort funcion que ordena array indexado, reindexa indices de forma ascendente 
     usort($lista, function($a, $b){
//Compara el $a y $b comparando si es menor,igual o mayor que el otro pais..
        return $a ["poblacion"] <=> $b["poblacion"];
     } );
//El ultimo pais de la lista lo pasamos a $max que sera el mas poblado por que esta ordenado de menor a mayor
     $max = $lista[count($lista)-1];
     echo "El pais con mas poblacion es: " . $max["nombre"]. "<br>";
     echo  "Capital: " .$max["capital"]. "<br>";
     echo "Poblacion: ".$max["poblacion"]. "<br>";

     echo "Ciudades: <br>";
     foreach($ciudades [$max["nombre"]] as $ciudad){
     echo "- $ciudad<br>";
     }
    ?>
</body>
</html>