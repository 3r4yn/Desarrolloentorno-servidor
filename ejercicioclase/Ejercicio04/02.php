<!--La mejor manera es colocar el php al principio por que separamos la logica 
de la presentacion porq 1º capturamos datos y 2º rederizamos la vista..
 -->
 <?php
//Creamos una variable para mostar el mensje al usuario..
$resultadotexto="";
//1º verificamos si el archivo fue enviado para evitar errores y fallos de seguridad
if($_SERVER['REQUEST_METHOD'] === 'POST'){
//Evaluamos si existe y no es nulo el valor del input html, si es asi toma el valor de la derecha '' 
    $num1 = $_POST['num1'] ?? '';
    $num2 = $_POST['num2'] ?? '';
    $operacion = $_POST['operacion'] ?? '';
    $formato = $_POST['formato'] ?? '';
//2ºComprobamos que ambos valores sean numero con funcion is_numeric
if(is_numeric($num1) && is_numeric($num2)){
//2 variables una para el resultado de los calculos y otra para hacer de stop por si algo sale mal..
    $res = 0;
    $esValido=true;
//3Realizamos la operacion segun el boton presionado
switch($operacion){
    case '+':
    $res=$num1+$num2;
    break;

    case '-':
    $res=$num1-$num2;
    break;

    case '*';
    $res=$num1*$num2;
    break;

    case '/':
    $res=$num1/$num2;
    break;

    default:
    $esvalido=false;
}
//4 Si la operacion va bien formateamos el numero,entrando con la bandera
if($esValido){
    if($formato === 'binario'){
//con (int) truncamos el $res por que al usar la funcion decbin solo acepta enteros.)
        $resformato=decbin((int)$res);
    }elseif($formato === 'hexadecimal'){
//Con (int) truncamos el $res por que el usar la funcion dechex solo acepta enteros.)
        $resformato=dechex((int)$res);
    }else{
        $resformato=$res;
    }
    $restexto= "El resultado es ". $resformato ."";
    }
    } else{
    $restexto= "Introduce dos numeros validos.";
    }
    }
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini calculadora</title>
    <style>
        .caja-controles{
            display: inline-block;
            padding: 8px;
            border: 1px solid #767676;
            margin-bottom:10px;

        }
    </style>
</head>

<body>
   
  <!--Separamos con div para poner el fondo y el color de las letras.. -->
    <div style="background-color: blue; color: white; padding: 10px; text-align: center;">
    <h1>Mini Calculadora</h1>
    </div><br>
 <!-- Vamos hacer q el formulario se envie asi mismo..-->
    <form action="02.php" method="post">
    
    <label for="num1">Nº1:</label>
    <input type="text" name="num1" id="num1"><br>

    <label for="num2">Nº2:</label>
    <input type="text" name="num2" id="num2"><br><br>

    <fieldset class="caja-controles">
    <button type="submit" name="operacion" value="+">+</button>
    <button type="submit" name="operacion" value="-">-</button>
    <button type="submit" name="operacion" value="*">*</button>
    <button type="submit" name="operacion" value="/">/</button>
    <input type="reset" value="borrar">
    </fieldset><br>

    <fieldset class="caja-controles">
    <input type="radio" name="formato" value="decimal"> decimal
    <input type="radio" name="formato" value="binario"> binario
    <input type="radio" name="formato" value="hexadecimal"> hexadecimal
    </fieldset><br>

    <input type="reset" value="borrar con reset">
    </form>

</body>
</html>