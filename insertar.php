<?php
require "conexion.php";
session_start();
$iduser = $_SESSION['id'];
if(!isset($_SESSION['id'])) {
    header("Location: login.php");
}
$modulo = $_POST['modulo'];

switch ($modulo) {
    case "users":
        $nya = $_POST['nya'];
        $user = $_POST['nombre'];
        $pass = sha1($_POST['pass']);
        $nivel = $_POST['nivel'];
        $mail = $_POST['mail'];
        $sql = "INSERT INTO usuario (nya, nombre, pass, nivel, mail) VALUES ('$nya', '$user', '$pass', '$nivel', '$mail')";
        $query = $mysqli->query($sql);
        if($query) {
            header("Location: users.php");
        }else{
            echo 'Error al grabar';
        }
    break;

    
}

