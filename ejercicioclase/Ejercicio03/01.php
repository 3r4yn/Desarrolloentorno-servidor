<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>20 numeros y estadísticas</title>
</head>
<body>
    <h1>20 numeros aleatorios</h1>
    <?php
    //1ºFUNCIONES
     function obtenermaximo1(array $arr): int {
        return max($arr);
    }
     function obtenerminimo(array $arr): int{
    return min($arr);
     }
     function masrepetido(array $arr):int{
    $frecuencias=array_count_values($arr);
    arsort($frecuencias);
    return array_key_first($frecuencias);
     }
    
    //2º Array 
    $numeros=[];
    //Se guardan los 20 numeros en el array
    for($i=0;$i<20;$i++){
    $numeros[$i]=random_int(1,10);
    }

    $max=obtenermaximo1($numeros);
    $min=obtenerminimo($numeros);
    $masrepe=masrepetido($numeros);
     ?>
    //3º TABLA
     <table border="1" cellpadding="2" cellspacing="0">
             <tr> 
            <?php foreach($numeros as $numero => $valor): ?>
            <td> <?php echo $valor ?> </td>
            <?php endforeach; ?>
            </tr>
     </table>
    <p>El numero maximo es: <?php echo $max ?></p>
    <p>El numero minimo es: <?php echo $min ?></p>
    <p>El numero mas repetido es: <?php echo $masrepe ?></p>

    
</body>
</html>