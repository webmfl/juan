<?php

$mysqli = new mysqli("localhost","root", "", "juan"); // conecta con la base de datos SERVIDOR / USUARIO / PASS / NOMBRE DE LA BASE

$diassemana = array("Domingo","Lunes","Martes","Miercoles","Jueves","Viernes","Sábado");
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");

global $diassemana;
global $meses;

date_default_timezone_set('America/Argentina/Buenos_Aires');

?>