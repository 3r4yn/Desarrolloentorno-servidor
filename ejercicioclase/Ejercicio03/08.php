<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <table border="1" cellpadding="2" cellspacing="0">
        <tr>
        <th>País</th>
        <th>Capital</th>
        <th>Poblacion</th>
        <th>Ciudades</th>
        </tr>
        <tr>
            <?php 
            /** @var array $paises */
            /** @var array $ciudades */
            include ("infopaises.php");
            foreach($paises as $pais => $info){
            echo "<tr>";
            echo "<td> $pais</td>";
            echo "<td> {$info["Capital"]}</td>";
            echo "<td> {$info["Poblacion"]}</td>";
//php no puede imprimir un array en texto. implode() Convertir un array → en un texto separado por comas.
            $listaciudades=implode(", ", $ciudades[$pais]);
            echo "<td> $listaciudades</td>";
            echo"</tr>";
            }
            ?>
            
        </tr>
        
    </table>
</body>
</html>