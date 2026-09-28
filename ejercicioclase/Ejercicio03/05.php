<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    /*Otra forma seria 
    $bolas = range(1,49);
    $claves = array_rand($bolas,6);
    $numeros = [];
    foreach($claves as $clave){
        $numeros [] = $bolas[$clave];
    }
    Omitiriamos el bucle for y pasariamos directo a la tabla */
    $numeros = [];
    for($i=0; $i<6;$i++){
    $numeros [] = random_int(1,49); 
    }
    ?>
    <table border ="1" cellpadding="2" cellspacing="0">
        <tr>
        <?php foreach($numeros as $indice => $numero):?>
            <?php if ($indice == count($numeros) -1): ?>
                <td>Complementario: <?php echo $numero; ?></td>
            <?php else: ?>
                <td> <?php echo $numero; ?></td>
            <?php endif; ?>
        <?php endforeach; ?>
        </tr>
    </table>

</body>
</html>