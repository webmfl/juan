<?php

require "conexion.php";
session_start();


if(!isset($_SESSION['nombre'])) {

    header("Location: login.php");

}

$modulo = $_GET['modulo'];


switch ($modulo) {
    case "productos":
        $cod_est=$_GET['cod'];


        $sql = "SELECT * FROM productos WHERE cod='$cod_est'";
        $query = $mysqli->query($sql);
        $num = $query->num_rows;

        if ($num>0) {
            $row = $query->fetch_assoc();
            
        }
        echo '<div>--</div>';
        echo '
        <!DOCTYPE html>
        <html lang="es">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="INEP Cursos Digitales">
            <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
            <title>Modificar Producto</title>

            <!-- Custom fonts for this template-->
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

        </head>

        <body class="bg-gradient-primary">

        <div class="col-md-4">
            <form action="update.php" method="POST">
                <input type="hidden" name="cod" value='; echo $row["cod"]; echo' />
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Descripción -> </label>
                    <input type="text" class="form-control " name="descripcion" value="'; echo $row["descripcion"]; echo'" />
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Precio de compra -> </label>
                    <input type="text" class="form-control" name="precio_compra" id="precioc" value='; echo $row["precio_compra"]; echo' onblur="calc()" />
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Ganancia % -> </label>
                    <input type="text" class="form-control" name="ganancia" id ="porcentaje" value='; echo $row["ganancia"]; echo' onblur="calc()"/>
                </div>
                
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Precio Mayorista -> </label>
                    <input type="text" class="form-control" name="precio_mayorista" value='; echo $row["precio_mayorista"]; echo' />
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Precio de venta -> </label>
                    <input type="text" class="form-control" name="precio_venta" id="preciov" value='; echo $row["precio_venta"]; echo' />
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Stock -> </label>
                    <input type="text" class="form-control" name="stock" value='; echo $row["stock"]; echo ' />
                </div>

                <input type="hidden" name="modulo" value="productos" />
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" onClick="location.href='; echo "'tablas.php'"; echo'" class="btn btn-success">Cancelar</button>
            </form>
        </div>   

        </body>
        <script>
            function calc() {
                pc = document.getElementById("precioc").value;
                porc = document.getElementById("porcentaje").value;
                margen = (pc * porc) / 100;
                final = Math.abs(pc) + Math.abs(margen);
                
                document.getElementById("preciov").value = final;
            }
        </script>';
        break;
        
        
    case "clientes":
        $cod_curso=$_GET['cod'];


        $sql = "SELECT * FROM clientes WHERE cod='$cod_curso'";
        $query = $mysqli->query($sql);
        $num = $query->num_rows;

        if ($num>0) {
            $row = $query->fetch_assoc();
            
        }

        echo '<div>--</div>';
        echo '
        <!DOCTYPE html>
        <html lang="es">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="INEP Cursos Digitales">

            <title>Modificar Cliente</title>

            <!-- Custom fonts for this template-->
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

        </head>

        <body class="bg-gradient-primary">

        <div class="col-md-5">
            <form action="update.php" method="POST">
                <input type="hidden" name="cod" value='; echo $row["cod"]; echo' />
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Nombre -> </label>
                    <input type="text" class="form-control" name="nombre" value="'; echo $row["nombre"]; echo'" />
                </div>
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Dirección -> </label>
                    <input type="text" class="form-control" name="direccion" value="'; echo $row["direccion"]; echo'" />
                </div>
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Teléfono -> </label>
                    <input type="text" class="form-control" name="telefono" value="'; echo $row["telefono"]; echo'" />
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">CUIT -> </label>
                    <input type="text" class="form-control" name="cuit" value="'; echo $row["cuit"]; echo'" />
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Mail -> </label>
                    <input type="text" class="form-control" name="mail" value="'; echo $row["mail"]; echo'" />
                </div>

                <input type="hidden" name="modulo" value="clientes" />
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" onClick="location.href='; echo "'clientes.php'"; echo'" class="btn btn-success">Cancelar</button>
            </form>
        </div>   

        </body>';
        break;

    case "conceptos":
        $cod_conceptos=$_GET['cod'];


        $sql = "SELECT * FROM conceptos WHERE cod='$cod_conceptos'";
        $query = $mysqli->query($sql);
        $num = $query->num_rows;

        if ($num>0) {
            $row = $query->fetch_assoc();
            
        }

        echo '<div>--</div>';
        echo '
        <!DOCTYPE html>
        <html lang="es">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="INEP Cursos Digitales">

            <title>Modificar Concepto</title>

            <!-- Custom fonts for this template-->
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

        </head>

        <body class="bg-gradient-primary">

        <div class="col-md-5">
            <form action="update.php" method="POST">
                <input type="hidden" name="cod" value='; echo $row["cod"]; echo' />
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Nombre -> </label>
                    <input type="text" class="form-control" name="nombre" value="'; echo $row["nombre"]; echo'" />
                </div>
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Detalle -> </label>
                    <input type="text" class="form-control" name="detalle" value="'; echo $row["detalle"]; echo'" />
                </div>
                
                <input type="hidden" name="modulo" value="conceptos" />
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" onClick="location.href='; echo "'congas.php'"; echo'" class="btn btn-success">Cancelar</button>
            </form>
        </div>   

        </body>';
        break;
    
    case 'users':
        $cod_user=$_GET['id'];


        $sql = "SELECT * FROM usuario WHERE id='$cod_user'";
        $query = $mysqli->query($sql);
        $num = $query->num_rows;

        if ($num>0) {
            $row = $query->fetch_assoc();
            
        }
        echo '<div>--</div>';
        echo '
        <!DOCTYPE html>
        <html lang="es">

        <head>

            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
            <meta name="description" content="">
            <meta name="author" content="INEP Cursos Digitales">
            <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
            <title>Modificar Usuario</title>

            <!-- Custom fonts for this template-->
            <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
            <link
                href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
                rel="stylesheet">

            <!-- Custom styles for this template-->
            <link href="css/sb-admin-2.min.css" rel="stylesheet">

        </head>

        <body class="bg-gradient-primary">

        <div class="col-md-5">
            <form action="update.php" method="POST">
                <input type="hidden" name="id" value='; echo $row["id"]; echo' />
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Nombre -> </label>
                    <input type="text" class="form-control" name="nombre" value="'; echo $row["nombre"]; echo'" required/>
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Password -> </label>
                    <input type="text" class="form-control" name="pass" placeholder="Reingrese un password si quiere modificarlo" />
                </div>

                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Nombre -> </label>
                    <input type="text" class="form-control" name="mail" value='; echo $row["mail"]; echo ' />
                </div>
                
                <div class="form-group form-inline" mb-3>
                    <label class="text-white w-50">Nivel -> </label>
                '; 
                
                if ($row["nivel"]=="administrador") { echo'
                    <select class="form-control" id="dataNiveles" name="nivel" required>
                        <option value="administrador" selected>Administrador</option>
                        <option value="recepcionista">Recepcionista</option>
                        <option value="operador">Operador</option>
                    </select>
                </div>';
                } elseif ($row["nivel"]=="operador") { echo '
                    <select class="form-control" id="dataNiveles" name="nivel" required>
                        <option value="administrador">Administrador</option>
                        <option value="recepcionista">Recepcionista</option>
                        <option value="operador" selected>Operador</option>
                    </select>
                </div>';
                } elseif ($row["nivel"]=="recepcionista") { echo '
                    <select class="form-control" id="dataNiveles" name="nivel" required>
                        <option value="administrador">Administrador</option>
                        <option value="recepcionista" selected>Recepcionista</option>
                        <option value="operador" selected>Operador</option>
                    </select>
                </div>';
                }
                
                echo '
                
                <input type="hidden" name="modulo" value="users" />
                <button type="submit" class="btn btn-success">Actualizar</button>
                <button type="button" onClick="location.href='; echo "'users.php'"; echo'" class="btn btn-success">Cancelar</button>
            </form>
        </div>   

        </body>';
    break;

        
}