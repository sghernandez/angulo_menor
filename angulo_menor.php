<?php

$horas = ['01:45', '10:30', '02:25', '00:00', '12:30', '12:05', '12:12', '12:27'];

foreach($horas as $h){
    angulo_menor($h); // llamamos a la función pasandole lo que tiene el arreglo $horas
}


/* Calcula en ángulo menor de una hora

   hora correcta: 02:22 
   hora incorrecta 2:22 
   
   las horas y minutos siempre con 2 cifras separadas por los (:) dos puntos
*/
function angulo_menor($hora_str='')
{
   $string_valido = TRUE;
   $hora_array = explode(':', $hora_str);
   $mensaje = "El formato ingresado es incorrecto. <br> Ejemplos válidos: 12:30 <br> 01:05 <br> 02:09"; 

   if(count($hora_array) !== 2)
   { 
      print($mensaje);
      return;
   }

   $hora = $hora_array[0]; // debe llevar siempre 2 cifras ej: 01, 00, 03 etc.
   $minutos = $hora_array[1]; // debe llevar siempre 2 cifras ej: 01, 00, 03 etc.

   for($i = 0; $i < 61; $i++)
   { 
       $numero_string = $i < 10 ? ('0'. $i) : $i;

       $elMinutero[$i] = $numero_string; 
       if($i < 13){
        $elHorario = $elMinutero;
       }
   }

   $string_valido = in_array($hora, $elHorario);
   $string_valido = in_array($minutos, $elMinutero);
   
   if(! $string_valido){
    print($mensaje);
    return;
  }   

   // se convieten a entero
   $hora = intval($hora); 
   $minutos = intval($minutos);
   
   $grados_hora = $hora * 30;
   $grados_minuto = $minutos * 6;
   
   $angulo = abs($grados_hora - $grados_minuto);
   $angulo_menor = $angulo > 180 ? (360 - $angulo) : $angulo;  

   print("'$hora_str' = $angulo_menor"). "<br>";
 
}

