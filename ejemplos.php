<?php

$fecha_actual = strtotime(date("Y-m-d"));
$fecha_entrada = strtotime("2019-08-08");
	
if($fecha_actual > $fecha_entrada){
	echo "La fecha actual es mayor a la comparada.";
}else{
    echo "La fecha comparada es igual o menor";
}

