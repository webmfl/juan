<?php

require "conexion.php";
session_start();


if(!isset($_SESSION['id'])) {

    header("Location: login.php");

}
$modulo = $_GET['modulo'];

switch ($modulo) {
    case "productos":
        $cod_est=$_GET['cod'];

        $activo=0;

        $sql = "DELETE FROM productos WHERE cod='$cod_est'";
        $query = $mysqli->query($sql);

        if($query) {

            header("Location: tablas.php");

        }else{
        
            echo 'Error al grabar';
        }
        break;
    case "clientes":
        $cod_cliente=$_GET['cod'];

        $sql = "DELETE FROM clientes WHERE cod='$cod_cliente'";
        $query = $mysqli->query($sql);

        if($query) {

            header("Location: clientes.php");

        }else{
        
            echo 'Error al grabar';
        }
        break;
    case "conceptos":
        $cod_concepto=$_GET['cod'];

        $sql = "UPDATE conceptos SET estado=1 WHERE cod='$cod_concepto'";
        $query = $mysqli->query($sql);

        if($query) {

            header("Location: congas.php");

        }else{
        
            echo 'Error al grabar';
        }
        break;
    case "manejoconceptos":
        $cod_concepto=$_GET['id'];

        $sql = "UPDATE movimientos SET estado=1 WHERE id='$cod_concepto'";
        $query = $mysqli->query($sql);

        if($query) {

            header("Location: mangas.php");

        }else{
        
            echo 'Error al grabar';
        }
        break;
    case "ventas":
            $cod_mov=$_GET['cod'];
            $cod_prod=$_GET['codp'];
            $cantif=$_GET['cantf'];

            //$total=$total-$tot;

            $sql = "DELETE FROM movaux WHERE id='$cod_mov'";
            $query = $mysqli->query($sql);
    
            if($query) {
    
                $sql2 = "SELECT * FROM productos WHERE cod=$cod_prod";
                $resultado2 = $mysqli->query($sql2); 

                while ($row2 = $resultado2->fetch_assoc()) {
                        
                        $stockanterior = $row2['stock'];

                }
                
                $nuevo_stock=$stockanterior+$cantif;
                
                $sql3 = "UPDATE productos SET stock=$nuevo_stock WHERE cod=$cod_prod";
                $query3 = $mysqli->query($sql3);

                            
                if($query3) {
        
                    header("Location: ventas.php");
        
                }else{
                
                    echo 'Error al actualizar el stock';
                }
    
            }else{
            
                echo 'Error al borrar el movimiento';
            }

            
            break;
        case 'users':

            $cod_user=$_GET['id'];

            //$sql = "DELETE FROM usuario WHERE id='$cod_user'";
            $sql = "UPDATE usuario SET estado=1 WHERE id='$cod_user'";
            $query = $mysqli->query($sql);

            if($query) {

                header("Location: users.php");

            }else{
            
                echo 'Error al grabar';
            }

        break;
        case 'remitos':

            $cod_rem=$_GET['remito'];

            $sql = "UPDATE movimientos SET estado=1 WHERE remito=$cod_rem ";

            $query = $mysqli->query($sql);
        
            if($query) {

                header("Location: anula.php");
                     
            }else{
       
                echo 'Error al grabar';
            }


        break;
        case "presus":
            $cod_mov=$_GET['cod'];
            $cod_prod=$_GET['codp'];
            $cantif=$_GET['cantf'];

            //$total=$total-$tot;

            $sql = "DELETE FROM presusaux WHERE id='$cod_mov'";
            $query = $mysqli->query($sql);
    
            if($query) {
    
                    header("Location: presus.php");
        
    
            }else{
            
                echo 'Error al borrar el movimiento';
            }

            
            break;
}

