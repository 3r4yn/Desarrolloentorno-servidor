<?php

$sexo =$_POST['sexo'] ?? '';
$edad = $_POST['edad'] ?? '';
$nombre =$_POST['nombre'] ?? '';
$apellidos = $_POST['apellidos'] ?? '';
$saludo="";
if($sexo === 'Hombre') {
    $saludo = "Bienvenido";
} else {
    $saludo = "Bienvenida";
}
if($edad === 'Mayor de 55'){
    if($sexo === "Hombre"){
        $saludo .= " Don " . $nombre. " ". $apellidos;
}else{
    $saludo .= " Doña ". $nombre. " ".$apellidos;
}
}else{
    $saludo .= " ".$nombre . " ". $apellidos;
}
//Aseguramos que siempre sea un array
$hobbies=$_POST['hobbies'] ?? [];
$cantidad=count($hobbies);

if($cantidad===0){
    $saludo .= " no tiene hobby.";
}elseif($cantidad==1){
    $saludo .= " tiene un solo hobby: ". $hobbies[0]. ".";
}else{
//OJO array_pop deja el array inservible para futuros usos...
    $ultimo=array_pop($hobbies);//Sacamos el ultimo hobby
    $listahobbies=implode(", ", $hobbies)." y ". $ultimo;
    $saludo .= " tiene varios hobbys: ". $listahobbies;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>05</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .cabecera {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 15px;
            font-size: 1.2em;
            font-weight: bold;
            letter-spacing: 1px;
        }
        .container {
            width: 400px;
            margin: 30px auto;
            background: white;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .seccion {
            margin-bottom: 15px;
        }
        label {
            display: inline-block;
            margin-bottom: 5px;
            color: #333;
        }
        input[type="text"], select {
            width: 100%;
            padding: 6px;
            box-sizing: border-box;
            border: 1px solid #999;
            border-radius: 3px;
            margin-bottom: 10px;
        }
        .grupo-radio, .grupo-checkbox {
            margin-top: 5px;
            margin-bottom: 10px;
        }
        .grupo-checkbox label {
            display: block;
            margin-bottom: 4px;
            font-weight: normal;
        }
        input[type="submit"] {
            background-color: #e1e1e1;
            border: 1px solid #adadad;
            padding: 6px 15px;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }
        input[type="submit"]:hover {
            background-color: #d4d4d4;
        }
    </style>
</head>
<body>
    <div class="cabecera">
        DATOS PERSONALES
    </div>

    <div class="container">

        <form action="05.php" method="post">
            
            <div class="seccion">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
            </div>

            <div class="seccion">
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos">
            </div>

            <div class="seccion">
                <label for="edad">Edad:</label>
                <select id="edad" name="edad">
                    <option value="Menor de 18">Menor de 18</option>
                    <option value="18 a 35">18 a 35 años</option>
                    <option value="36 a 55">36 a 55 años</option>
                    <option value="Mayor de 55" selected>Mayor de 55</option>
                </select>
            </div>

            <div class="seccion">
                <label>Sexo:</label>
                <div class="grupo-radio">
                    <label><input type="radio" name="sexo" value="Hombre"> Hombre</label>
                    <label><input type="radio" name="sexo" value="Mujer" checked> Mujer</label>
                </div>
            </div>

            <div class="seccion">
                <label>Hobbies:</label>
                <div class="grupo-checkbox">
                    <label><input type="checkbox" name="hobbies[]" value="lectura"> lectura</label>
                    <label><input type="checkbox" name="hobbies[]" value="ver la tele"> ver la tele</label>
                    <label><input type="checkbox" name="hobbies[]" value="hacer deporte"> hacer deporte</label>
                    <label><input type="checkbox" name="hobbies[]" value="Salir de marcha"> Salir de marcha</label>
                </div>
            </div>

            <div class="seccion">
                <input type="submit" value="Enviar">
            </div>

        </form>
    </div>
    <?php if(!empty($saludo)):?> 
    <div style="margin: 19px; padding: 10px; background: #e7f3fe ; border: 1px solid #b3d7ff; ">
<!-- Para evitar ataques xss convertiremos a texto plano y nunca como código ejecutable.   -->
    <p><?= htmlspecialchars($saludo) ?></p>
    </div>
    <?php endif; ?>
</body>
</html>