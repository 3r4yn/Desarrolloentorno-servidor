<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuarios</title>
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
            max-width: 450px;
            margin: auto;
        }
        h2 {
            color: #333;
            text-align: center;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
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
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Registro de Usuarios</h2>

    <form action="" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required>

        <label for="email">Correo electrónico:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>

        <label for="password_confirm">Repetir Contraseña:</label>
        <input type="password" id="password_confirm" name="password_Wconfirm" required>

        <input type="submit" value="Registrarse">
    </form>

    <?php

        if($_SERVER['REQUEST_METHOD'] == "POST"){
        $nombre=$_POST["nombre"];
        $email=$_POST["email"];
        $password=$_POST["password"];
        $passwordconfirm=$_POST["password_confirm"];
        if(empty($nombre)||empty($email) || empty($password)||empty($passwordconfirm)){
            echo "ERROR campo vacio.";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            echo "ERROR formato de correo incorrecto";
        }elseif($password !== $passwordconfirm){
            echo "Las contraseñas no coinciden";
        }elseif(strlen($password) <8){
            echo "La contraseña no cumple con la longitud de 8 caracteres";
        }elseif(!preg_match('/[A-Z]/', $password)){
            echo "ERROR falta alguna mayuscula o minuscula";
        }elseif(!preg_match('/[a-z]/', $password) ){
            echo "ERROR falta alguna mayuscula o minuscula";
        }
        elseif(!preg_match('/[0-9]', $password)){
            echo 'ERROR no cumple con los digitos';
        }elseif(!preg_match('/[^a-zA-Z0-9]/', $password)){
        echo 'ERROR No cumple con el caracter especial';
        }else{
            echo "Usuario registrado";
        }
        }
    ?>

</div>

</body>
</html>