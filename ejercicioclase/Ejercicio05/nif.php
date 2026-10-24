<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cálculo de NIF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 50px;
        }
        .container {
            background: white;
            padding: 25px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            max-width: 400px;
            margin: auto;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #28a745;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #218838;
        }
        .resultado {
            margin-top: 20px;
            padding: 10px;
            background-color: #e2f0d9;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
            color: #155724;
            text-align: center;
            font-weight: bold;
        }
        .error {
            margin-top: 20px;
            padding: 10px;
            background-color: #f8d7da;
            border: 1px solid #f5c6cb;
            border-radius: 4px;
            color: #721c24;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Calculadora de NIF</h2>

<!-- L formulario se invoca a si mismo por el mtodo POST -->
    <form action="" method="POST">
        <label for="dni">Número de DNI:</label>
        <!-- esto s la validacion del cliente y pattern permite solo dígitos del 0 al 9 y puede ser uno o mas digitos -->
        <input type="text" id="dni" name="dni" pattern="[0-9]+" title="Introduce únicamente dígitos numéricos" required>
        
        <input type="submit" value="Calcular Letra">
    </form>

    <?php
    //Comprobamos que a enviado correctamente por post
        if($_SERVER["REQUEST_METHOD"] == "POST"){
        echo "El formulario se a enviado ". "<br>";
        $dni=$_POST["dni"];
//Comprobar que hay solo digitos n el servidor
       if(ctype_digit($dni)) {
        $letras=['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        $posicion = calcularrestodni($dni);
        $letrafinal = $letras[$posicion];
        echo "El dni es: ". $dni .$letrafinal;
       } else {
       echo "El dni debe contener solo numeros.";
       }
    }
    function calcularrestodni($dninum ){
        $resto=(int) $dninum % 23;
        return $resto;
        }
   ?>
</div>

</body>
</html>