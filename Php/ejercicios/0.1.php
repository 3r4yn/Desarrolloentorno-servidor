<php>
//pasar por valor y por referencia 
function sumar (int $valor, int $valor2):int{
       $resu = $valor1+$valor2;
 return $resu;
    }
    function sumar2 (int $valor, int $valor2, int $resu):int & $resu{
       $resu = $valor1+$valor2;
    }

</php>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    
    $num1=random_int(1,10);
    $num2=random_int(1,10);
    $resusuma= 0;
    sumar2($n1,$n2,$resusuma);

    echo "1º Número : ". $num1."<br>";
    echo "2º Número :  ".$num2."<br>"."<br>";
    echo $num1. ' + ' . $num2. "= ".($num1+$num2)."<br>";
    echo $num1. ' - ' . $num2. "= ".($num1-$num2)."<br>"; 
    echo $num1. ' * ' . $num2. "= ".($num1*$num2)."<br>";
    echo $num1. ' / ' . $num2. "= ".($num1/$num2)."<br>";
    echo $num1. ' % ' . $num2. "= ".($num1%$num2)."<br>";
    echo $num1. ' ** '. $num2. "= ".($num1**$num2)."<br>";
    /*
    5+3  = 7
    5-2  = 3
    5*2  = 10
    5/ 2 = 2.5
    5%2  = 1
    5**2 = 25
    */
    ?>
</body>
</html>