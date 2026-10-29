<?php
session_start();
//Incluire el archivo de los precios de las frutas
require_once 'precios.php';
// Manejo de la sesión con dos valores
// 'cliente' => nombre del cliente
// 'pedidos' => array asociativo fruta => cantidad


// 2º Nuevo cliente: anoto en la sesión su nombre y creo su tabla de pedidos vacía
if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] =  $_GET['cliente']; //añadimos el cliente
    $_SESSION['pedidos'] = [];
}

// 1º No hay definido un cliente todavía en la session 
if (!isset($_SESSION['cliente'])) {
    include"bienvenida.php"; //añadimos la pagina principal para que el usuario se registre
    die();
}


// 3º Proceso las acciones 
if (isset($_POST["accion"])) {

switch ($_POST["accion"]) {
     case " Anotar ":
        $fruta = $_POST["fruta"];
        $cantidad = $_POST["cantidad"];
        // Actualizo la tabla de pedidos en la sesión
        if(isset($_SESSION["pedidos"][$fruta])){
            $_SESSION["pedidos"][$fruta] += $cantidad;
        }else{
            $_SESSION["pedidos"][$fruta] = $cantidad;
        }
        break;
    case " Anular ":
        $fruta = $_POST["fruta"];
        // Vacío la tabla de pedidos en la sesión
        unset($_SESSION["pedidos"][$fruta]);
        break;
    case " Terminar ":
// Destruyo la sesión y vuelvo a la página de bienvenida
        $compraRealizada = htmlTablaPedidos();
        include_once "despedida.php";
        session_destroy ();
        exit();
        break;

}
}

$compraRealizada = htmlTablaPedidos();
require_once 'compra.php';


// Función axiliar que genera una tabla HTML a partir  la tabla de pedidos
// Almacenada en la sesión
function htmlTablaPedidos(): string {
    global $precios; // Con esto consultaremos los precios de las frutas.
    $total = 0; // Con esta variable acumularemos el precio total final de la compra.

    $msg = "<table>";
    foreach ($_SESSION["pedidos"] as $fruta => $cantidad) {
        // Por si acaso la fruta no estuviera en el array de precios utilizamos ?? 0, y esto evita que falle y usa un valor de 0.
        $subtotal = $cantidad * ($precios[$fruta] ?? 0); 
        $total += $subtotal; 
        $msg .= "<tr><td>$fruta</td><td>$cantidad</td><td>{$subtotal}€</td></tr>";
    }
    $msg .= "</table>";
    $msg .= "<p><strong>Total: $total €</strong></p>";
    
    return $msg;
}