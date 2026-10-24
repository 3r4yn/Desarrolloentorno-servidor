<?php

$nombre=$_POST["nombre"] ?? '';
$contraseña=$_POST["contraseña"] ?? '';
$color=$_POST["color"] ?? 'No seleccionado';

//sI EL CHECKBOX DE PUBLICIDAD NO ESTA MARCADO,NO EXISTE EN $POST
$publicidad=isset($_POST['publicidad']) ? 'Si publicidad' : 'No publicidad';

//Si en el checkbox hay varios marcados viene un array comprobamos que tenga un valor y que sea tipo array
if(!empty($_POST['idiomas']) &&  is_array($_POST['idiomas'])){
// usamos implode()para unir los valores por comas.    
$idiomas= implode(', ', $_POST['idiomas']);
}else{
    $idiomas='ninguno';
}
//Comprobamos que anio tenga valor y no sea null
$anio= $_POST['anio']??'';

//Los valores que capturamos son los CP del value de cad opcion
if(!empty($_POST['ciudades']) && is_array($_POST['ciudades'])){
    $ciudades= implode(', ', $_POST['ciudades']);
}else{
    $ciudades= 'ninguna';
}
//Igual si existe un valor y no es null..
$comentarios = $_POST['comentarios'] ?? '';

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando formulario</title>
    <style>
        .cabecera {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 10px;
        }
        .contenido {
            margin: 20px;
            font-family: Arial, sans-serif;
            font-size: 1.1em;
            line-height: 1.8;
        }
    </style>
</head>
<body>

    <div class="cabecera">
        <h1>Procesando formulario</h1>
    </div>

    <div class="contenido">
        <p><strong>Nombre:</strong> <?= htmlspecialchars($nombre) ?></p>
        <p><strong>Clave:</strong> <?= htmlspecialchars($contraseña) ?></p>
        <p><strong>Semáforo:</strong> <?= htmlspecialchars($color) ?></p>
        <p><strong>Publicidad:</strong> <?= htmlspecialchars($publicidad) ?></p>
        <p><strong>Idiomas:</strong> <?= htmlspecialchars($idiomas) ?></p>
        <p><strong>Año de fin de estudios:</strong> <?= htmlspecialchars($anio) ?></p>
        <p><strong>Lista de los códigos postales de provincias:</strong> <?= htmlspecialchars($ciudades) ?></p>
        <p><strong>Comentarios:</strong> <?= htmlspecialchars($comentarios) ?></p>
    </div>

</body>
</html>