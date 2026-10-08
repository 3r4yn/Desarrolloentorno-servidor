<?php
//1º Voy a capturar los datos del formulario
$usuario = $_POST['nombre'] ?? "";
$clave = $_POST['clave']?? "";
//Creare un array para guardar los valores
$usuarios=[
    'admin' => '1234',
    'brayan'=> 'alumno',
    'alumno'=> 'alumno'
];
/* Hay dos formas de comprobar si el usuario y la clave son correctos, una es con isset y otra con array_key_exists
//1ºisset comprueba si existe la clave del array asociativo y qe no sea null..
if(isset($usuarios[$usuario]) && $usuarios[$usuario] === $clave){
    echo "<h1> Hola $usuario </h1>";    
}else{
    echo "<p style='color:red;'>Usuario o contraseña incorrecto</p>";
    echo "<a href='01.html'>Reintentar</a>";
}*/
//2ºArraykey da la lista de claves del array asociativo y comprueba si el valor del formulario esta presente.
if (array_key_exists($usuario, $usuarios) && $usuarios[$usuario] === $clave){
    echo "Hola $usuario";
}else{
    echo "<p style='color:red;'>Usuario o contraseña incorrecto</p>";
    echo "<a href='01.html'>Reintentar</a>";

}
?>