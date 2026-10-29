<?php
ob_start();
//1ºcondicion analizar que el formulario se a enviado
//Evitamos INYECCION DE CODIGO con htmlsecialchars() convirtiendo en texto seguro
if (!empty($_REQUEST)) {
    $nombre=htmlspecialchars($_REQUEST["nombre"], ENT_QUOTES, 'UTF-8');
    $contraseña=htmlspecialchars($_REQUEST["contraseña"],ENT_QUOTES, 'UTF-8');
    $edad=htmlspecialchars($_REQUEST["edad"],ENT_QUOTES,'UTF-8');
    $color = htmlspecialchars($_REQUEST["color"], ENT_QUOTES, 'UTF-8');
    $ciudad = htmlspecialchars($_REQUEST["ciudad"], ENT_QUOTES, 'UTF-8');

    if(mb_strlen($nombre, 'UTF-8')>=8){
        if($contraseña === strrev($nombre)){
    echo "<div class='resultado'>";
    echo "Hola $nombre, tiene $edad años, vive en $ciudad y tu color favorito es $color";
    echo "</div>";
 //Añadi un formulario de opinion
        echo "<form  method='post' class='resultado'>";
        echo "<h3>Introduce tu opinion</h3>";

        echo "<label for='comentario'>Comentario:</label><br>";
        echo "<textarea name='comentario' rows='4' cols='50' maxlength='300'>";
        echo isset($_REQUEST['comentario']) ? htmlspecialchars($_REQUEST['comentario'], ENT_QUOTES, 'UTF-8') : '';
        echo "</textarea><br><br>";

        echo "<input type='submit' name='orden' value='Detalles'>";
        echo "<input type='submit' name='orden' value='Nueva opinion'>";
        echo "<input type='submit' name='orden' value='Terminar'>";


        echo "</form>";

    }else{
             echo "<div class='resultado'>";
            echo "La contraseña no es válida. Debe ser el nombre al revés.";
            echo "</div>";
    }
    } else{
        echo "<div class = 'resultado'>";
        echo "El nombre es demasiado corto, debe tener minimo 8 caracteres";
        echo "</div>";
    }
    }
    //Procesar los botones del formulario de opinión
    if(!empty($_REQUEST["orden"])){
        $orden = $_REQUEST["orden"];
        if($orden === "detalles"){
//EVITAR INYECCION DE CODIGO CONVIRTIENDO EN SOLO TEXTO...
            $comentario = htmlspecialchars($_REQUEST["comentario"], ENT_QUOTES, 'UTF-8' );
            //Numero de caracteres
            $numcaracteres=mb_strlen($comentario,'UTF-8');
// Numero de palabras, el 1 hace que me devuelva un array en vez de solo contarlas..
            $palabras = str_word_count($comentario,1, 'áéíóúñÁÉÍÓÚÑ');
            $numpalabras = count($palabras);
// caracter mas repetido
//al contar convierte las letras en codigo ASCII
            $chars = count_chars($comentario,1);
//ordena de descendente..
            arsort($chars);
//chr convierte ese numero obtenido al contar los caracteres , arraykeyfirst obtiene la primera clave del array chars..
            $caracteresmasrepetido = chr(array_key_first($chars));

//palabra más repetido
            $frecuencia=array_count_values($palabras);
            arsort($frecuencia);
            $palabramasrepetida = array_key_first($frecuencia);

            echo "<div class='resultado'>";
                echo "<h3>Detalles de tu opinión</h3>";
                echo "Número de caracteres: $numcaracteres<br>";
                echo "Número de palabras: $numpalabras<br>";
                echo "Carácter más repetido: $caracteresmasrepetido<br>";
                echo "Palabra más repetida: $palabramasrepetida<br>";
                echo "</div>";
            }
            if($orden === "Nueva opinion"){
                //Vacia el coment
                $_REQUEST["comentario"] = "";
            }
            if($orden === "Terminar"){
            //Volver al formulario incial
            header("Location: prueba1.php");
            exit;
            }
        }
$contenido=ob_get_clean(); //guarda lo que se imprimio , y limpiamos el buffer
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio REQUEST en PHP</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            padding: 20px;
        }

        h1 {
            text-align: center;
        }

        form {
            width: 350px;
            margin: 20px auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input, select {
            width: 100%;
            padding: 8px;
            margin-top: 5px;
            border-radius: 4px;
            border: 1px solid #aaa;
        }

        button {
            margin-top: 15px;
            width: 100%;
            padding: 10px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background: #0056b3;
        }

        .resultado {
            width: 350px;
            margin: 20px auto;
            background: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Formulario con REQUEST</h1>

<form action="prueba1.php" method="post">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" maxlength="30" id="nombre">

    <label for="contraseña">Contraseña</label>
    <input type ="text" name="contraseña" id="contraseña">


    <label for="edad">Edad:</label>
    <input type="number" name="edad" id="edad">

    <label for="color">Color favorito:</label>
    <input type="text" name="color" id="color">

    <label for="ciudad">Ciudad:</label>
    <input type="text" name="ciudad" id="ciudad">

    <button type="submit">Enviar</button>
</form>
<?php
//Aqui muestro lo del buffer
echo $contenido;
?>
</body>
</html>
