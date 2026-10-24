<?php
//bool indica que una funcion debe devolver un valor boleano
function usuarioOk($usuario, $contraseña) :bool {
//Con mb_strlen,cuenta caracteres reales y con utf-8 indica como contar las letras ñóÜ..etc
   $usuarioValido=(mb_strlen($usuario, 'UTF-8')>=8);
//Con strrev invertimos el texto y comprobamos que la contraseña cumpla..
   $passwordValida= ($contraseña === strrev($usuario));
  
    return $usuarioValido && $passwordValida;
    }

function contarcaracteres($texto) : int {
   return mb_strlen($texto, 'UTF-8');
}

function contarpalabras($texto) : int {
//str_word_count funcion cuenta palabras, $texto contiene las palabras
//1 es un modo el cual mete una por una las palabras en un array y entre comillas letras a considerar..
   $palabras = str_word_count($texto, 1, 'àèìòùáéíóúñÁÉÍÓÚÑüÜ' );
   return count($palabras);
}
function letramasrepetida ($texto) : String{
   // Pasamos el texto a minus y quitamos espacios y sltos d linea.
   $textolimpio = mb_strtolower(preg_replace('/\s+/', '', $texto), 'UTF-8');
   if($textolimpio ==='') return '-';

   $frecuencias=[];
   $longitud=mb_strlen($textolimpio, 'UTF-8');

   for($i = 0; $i < $longitud; $i++){
      $char = mb_substr($textolimpio, $i,1, 'UTF-8');
      if(isset($frecuencias[$char])){
         $frecuencias[$char]++;
      }else{
         $frecuencias[$char] = 1;
      }
   }

//Ordno las frecuencia de mayor a menor..
   arsort($frecuencias);
   $letraganadora = array_key_first($frecuencias);
   $veces = $frecuencias[$letraganadora];

   return "$letraganadora (aparece $veces veces)";
}

function palabramasrepetida ($texto) : String{
   //extraigo palabras minusculas teniendo en cuneta tilde y eñs.
   $palabras = str_word_count(mb_strtolower($texto, 'UTF-8'),1,'àèìòùáéíóúñÁÉÍÓÚÑüÜ');
   if(empty($palabras)) return '-';
// cuenta las veces que s repite cada plabra en el array
   $frecuencias = array_count_values($palabras);
//ordenamos d mayor a menor frecuencia
   arsort($frecuencias);

   $palabraganadora = array_key_first($frecuencias);
   $veces = $frecuencias[$palabraganadora];

   return "$palabraganadora aparece $veces veces";

   }
   ?>