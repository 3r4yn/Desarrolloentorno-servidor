<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php 
    $cronoinicio=microtime(true);    
    $seisconsecutivo=0;
    $totalnumeros=0;
    while($seisconsecutivo<3){
        $num=random_int(1,10);
        $totalnumeros=++;
        if($num==6){
            $seisconsecutivo++;
        }   else{
            $seisconsecutivo=0;
        }
    }
    $cronofin=microtime(true);
    $tiempototalms=($cronofin-$cronoinicio)*1000;
    echo "Han salido tres 6 seguidos tras generar ". $totalnumeros. " numeros en ".round($tiempototalms,3). " milisegundos";
    ?>
</body>
</html>