<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barras colores</title>
    <meta http-equiv="refresh" content="5">
    <style>
        body {
            margin: 40px;
        }
        table {
            margin-bottom: 15px;
            border-collapse: collapse;
        }
        td {
            padding:10px;
            color:white;
            font-weight: bold;
            height: 25px;
        }
        .rojo {
            background-color: red;
        }
        .verde {
            background-color: green;
        }
        .azul {
            background-color: blue;
        }
    </style>
</head>
<body>

    <?php
    $rojo=random_int(100,500);
    $verde=random_int(100,500);
    $azul=random_int(100,500);
    ?>

//barra roja
    <table width="<?php echo $rojo; ?>">
        <tr>
            <td class="rojo">Rojo(<?php echo $rojo; ?>)</td>
        </tr>
    </table>
    <table width="<?php echo $verde; ?>">
        <tr>
            <td class="verde">Verde(<?php echo $verde; ?>)</td>
        </tr>
    </table>
    <table width="<?php echo $azul; ?>">
        <tr>
            <td class="azul">Azul(<?php echo $azul; ?>)</td>
        </tr>
    </table>

</body>
</html>