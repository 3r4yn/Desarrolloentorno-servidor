<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Multiplicar</title>
    <style>
        body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        background-color: #e0e0e0;
        margin: 0;
        }
        .contenedor{
            background-color: white;
            border: 2px solid#ccc;
            width:320px;
            box-shadow:0px 4px 8px rgba(0,0,0,0.1);
        }
        .contenedor .cabecera{
           background-color: blue;
            color: white;
            text-align: center;
            padding: 20px 10px;
            font-weight: bold;
            font-size:20px;
            letter-spacing: 1px;
        }
        .contenidotabla{
            padding: 20px;
        }
        table {
        width:100%;
        border-collapse: collapse; /* une los bordes de las celdas.*/
        table-layout: fixed;
        }
        th,td{
            border: 1px solid#333;
            padding:8px 12px;
        }
        table tr td:nth-child(1),
        table tr th:nth-child(1) {
            width: 75%;
        }
        /* Forzamos que la segunda columna sea estrecha y cuadrada */
        table tr td:nth-child(2),
        table tr th:nth-child(2) {
            width: 25%;
            text-align: center;
        }
        th{
            text-align: left;
        }
        td:nth-child(2){
            text-align: right; /* los numeros a la derecha*/
        }
        </style>
</head>
<body>
    <div class="contenedor">
    <div class="cabecera">
        TABLA DE <br>MULTIPLICAR
    </div>
    <div class="contenidotabla">
    <?php
    $num=random_int(1,10);
    ?>
    <table>
        <tr>
            <th>Tabla del <?php echo $num; ?></th>
            <th></th>
        </tr>
        <?php
    for($i=1;$i<=10;$i++){
        $res=$num*$i;
        echo "<tr>";
        echo "<td>$num x $i=</td>";
        echo "<td>$res</td>";
        echo "</tr>";
    }
        ?>
    </table>
    </div>
    </div>
</body>
</html>