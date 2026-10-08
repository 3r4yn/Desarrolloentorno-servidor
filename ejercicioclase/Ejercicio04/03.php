<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>03</title>
</head>
<body>
    <div style ="background-color: blue; color: white; padding: 10px; text-align: center;">
        <h1>Valores recibidos</h1>
    </div>

    <h2>Salida con print r<h2>
    <?php
    echo "<pre>";
    print_r($_REQUEST);
    echo "</pre>"
    ?>
    <h2>Salida con var dump</h2>
    <?php 
    echo "<pre>";
    var_dump($_REQUEST);
    echo "</pre>";
    ?>

</body>
</html>
