<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $num=random_int(1,9);
    echo "Numero generado ". $num. "<br>";
//hace que el navegador no ignore los espacios y los trate como un solo espacio.. <pre>
    echo "<pre>";
    $filas=range(1,$num);
    foreach($filas as $fila){
    //bucle para los espacios..
        $numespacios=$num-$fila;
        for($i = 1;$i<=$numespacios;$i++){

//otra forma es colocar echo "&nbsp;";  y se imprimiria el espacio en pero necesita code en vez de pre.
        echo " ";
        
        }
    //bucle pinta asteriscos..
        $numasteriscos=2*$fila-1;
        for($j = 1;$j<=$numasteriscos;$j++){
            echo "*";
        }
        echo "<br>";
    }
        echo "</pre>";
    ?>
</body>
</html>