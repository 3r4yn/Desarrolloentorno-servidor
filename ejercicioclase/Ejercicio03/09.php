<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejericio08</title>
    <style>
        /* Estilos generales de la tabla */
        table {
            border-collapse: collapse; /* Elimina la separación doble entre bordes */
            font-family: Arial, sans-serif;
            font-size: 13px;
            border: 1px solid #9bb2c9; 
            background-color: #ebf3fa;  /* Fondo azul claro de la columna derecha */
        }

        /* Bordes de todas las celdas */
        td {
            border: 1px solid #b8ca3a;
            border: 1px solid #b0c4de;
            padding: 3px 8px;
        }

        /* Primera columna meses */
        td:first-child {
            background-color: #e1e7ed;
            color: #708090;
            width: 80px;
        }

        /* hace que ls imágenes de la barra queden alineadas con el texto */
        td img {
            vertical-align: middle;
        }
    </style>
</head>
<body>
    <?php
    /* 1º juntar los dos arrays con la funcion array_combine otra forma seria con un bucle for */
    $temperaturas=[6,10,12,14,16,20,25,30,18,15,14,8];
    $meses=["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
     "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $mestemperatura= array_combine($meses,$temperaturas);
    //2º paso
    ?>
    <table >
    <?php
    foreach ($mestemperatura as $mes => $temp){
    //str_repeat es para repetir texto,caracteres,cualquier tipo de dato que puede repetirse, $temp actua como el numero de veces que se repite..
        $barra = str_repeat('<img src="../img/ver2.png" height="15">', $temp);
        echo "<tr>";
        echo "<td>$mes</td>";
        echo "<td>$barra $temp ºC</td>";
        echo "</tr>";
    }
    ?>
    </table>
</body>
</html>