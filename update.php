<?php

require "conexion.php";
session_start();


if(!isset($_SESSION['id'])) {

    header("Location: login.php");

}

$modulo = $_POST['modulo'];


switch ($modulo) {
    case "productos":

        $cod_est=$_POST['cod'];
        $descripcion=$_POST['descripcion'];
        $precio_c=$_POST['precio_compra'];
        $gan=$_POST['ganancia']; 
        $precio_m=$_POST['precio_mayorista']; 
        $precio_v=$_POST['precio_venta']; 
        $stock=$_POST['stock'];
       
        $sql = "UPDATE productos SET descripcion='$descripcion', precio_compra='$precio_c', ganancia='$gan', precio_mayorista='$precio_m', precio_venta='$precio_v', stock='$stock' WHERE cod='$cod_est'";

        $query = $mysqli->query($sql);
        
        if($query) {

            header("Location: tablas.php");
            
            
        }else{
        
            echo 'Error al grabar';
        }
        
        break;
    case "clientes":
        $cod_cliente=$_POST['cod'];
        $nombre=$_POST['nombre'];
        $direccion=$_POST['direccion']; 
        $telefono=$_POST['telefono'];
        $mail=$_POST['mail'];
        $cuit=$_POST['cuit'];

        $sql = "UPDATE clientes SET nombre='$nombre', direccion='$direccion', telefono='$telefono', mail='$mail', cuit='$cuit' WHERE cod='$cod_cliente'";

        $query = $mysqli->query($sql);

        if($query) {

            header("Location: clientes.php");
            
        }else{
        
            echo 'Error al grabar';
        }
        break;
    case "conceptos":
        $cod_concepto=$_POST['cod'];
        $nombre=$_POST['nombre'];
        $detalle=$_POST['detalle']; 
        
        $sql = "UPDATE conceptos SET nombre='$nombre', detalle='$detalle' WHERE cod='$cod_concepto'";

        $query = $mysqli->query($sql);

        if($query) {

            header("Location: congas.php");
            
        }else{
        
            echo 'Error al grabar';
        }
        break;
    case "users":
        $cod_user=$_POST['id'];
        $nombre=$_POST['nombre'];
        if ($_POST['pass']!='') {
            $pass_c=sha1($_POST['pass']); 
        }
        $mail=$_POST['mail'];
        $niv=$_POST['nivel'];

        if ($_POST['pass']!='') {
            $sql = "UPDATE usuario SET nombre='$nombre', pass='$pass_c', mail='$mail', nivel='$niv' WHERE id='$cod_user'";
        } else {
            $sql = "UPDATE usuario SET nombre='$nombre', mail='$mail', nivel='$niv' WHERE id='$cod_user'";
        }
        
       
        $query = $mysqli->query($sql);
      
        if($query) {

            header("Location: users.php");
            
            
        }else{
        
            echo 'Error al grabar';
        }
       
    break;
}

