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
    echo "Numero generado: ". $num. "<br>";
   for($i=1;$i<=$num;$i++){
//Para alternar entre una fila y otra usamos par o impar.
    if($i%2==0){
        $color="blue";
    }else{
        $color="red";
    }
    echo "<span style='color: $color ;'>";

    for($j=1;$j<=$i;$j++){
        echo $i;
    } 
   echo "</span><br>";
   }
    /* echo "Numero generado: ". "$num". "<br>";
    $filas=range(1,$num);
    foreach($filas as $fila){
    
    if ($fila % 2 == 0){
        $color = "blue";
    }else{
        $color= "red";
    }
    echo "<span style='color: ". $color . ";'>";
    for ($j=1; $j <= $fila; $j++){
        echo $fila;
    }
        echo "</span><br>";
    }    
    */
    ?>
</body>
</html>
