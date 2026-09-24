<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, th, td{
            padding: 5px 10px;
            border: 1px solid black;
            border-collapse: collapse;
        }
        th,td{
            padding: 6px 10px;
            border: 1px solid black;
            text-align: left;
        }
        th{
            background-color: gray;
            color: #0059ffe0;
        }
    </style>
</head>
<body>
    <?php
    $num=random_int(1,10);
    $num2=random_int(1,10);
    echo "1ºNumero: ".$num."<br>";
    echo "2ºNumero: ".$num2."<br>"."<br>";
    $suma=$num+$num2;
    $resta = $num - $num2;
    $multiplicacion = $num * $num2;
    $division = $num / $num2;
    $modulo = $num % $num2;
    $potencia = pow($num, $num2);
    ?>
    <table>
        <tr>
            <th>Operaciones</th>
            <th>Resultado</th>
        </tr>
        <tr>
            <td><?php echo $num. ' + ' . $num2 ?></td>
            <td><?php echo $suma?></td>
        </tr>
        <tr>
            <td><?php echo $num. ' - '. $num2 ?></td>
            <td><?php echo $resta?></td>
        </tr>
        <tr>
            <td><?php echo $num. ' * '. $num2 ?></td>
            <td><?php echo $multiplicacion?></td>
        </tr>
        <tr>
            <td><?php echo $num. ' / '. $num2 ?></td>
            <td><?php echo $division?></td>
            
        </tr>
        <tr>
            <td><?php echo $num. ' % '. $num2 ?></td>
            <td><?php echo $modulo?></td>
        </tr>
          <tr>
            <td><?php echo $num. '<sup>'. $num2 ?></td>
            <td><?php echo $modulo?></td>
        </tr>
        

    </table>
    </body>
    </html>