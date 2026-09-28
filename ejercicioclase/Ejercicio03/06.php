<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    //No detecta el array $paises y ciudades, por eso se incluye el archivo infopaises.php
    /** @var array $paises */
        /** @var array $ciudades */

    include "infopaises.php";
    $maxpais = "";
    $maxpoblacion = 0;

    foreach ($paises as $pais => $info) {
        if($info["Poblacion"]  > $maxpoblacion){
            $maxpoblacion = $info["Poblacion"];
            $maxpais = $pais;
        }
    }
    echo "El pais con mas poblacion es: " . $maxpais . "<br>";
    echo "Ciudades: ";
    //maxpais=francia entonces listara las ciudades de ese pais..
    foreach ($ciudades[$maxpais] as $ciudad){
            echo " $ciudad, ";
    }
    ?>
</body>
</html>