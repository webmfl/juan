<?php
require "conexion.php"; //CONECTA A LA BASE DE DATOS

session_start(); 
if ($_POST) { // SI LA PAGINA SE RECARGO CON UN POST DE UN FORMULARIO....
    
    $usuario=$_POST['usuario']; //carga en la variable $usuario el valor que se escribio en el login
    $password=$_POST['password']; // carga el password en la variable
    global $backup;

    $sql="SELECT * FROM usuario WHERE nombre='$usuario'"; //en la variable $sql se carga la consulta donde busca un usuario que tenga el nombre cargado en la pagina de login
    
    $resultado = $mysqli->query ($sql); //ejecuta la consulta
    $num = $resultado->num_rows; //guarda en $num la cantidad de registros encontrados
    
    if ($num>0) { //si $mun es mayor a 0 significa que el usuario existe en la base
        $row = $resultado->fetch_assoc(); //este metodo carga en la variable $row el registro encontrado
        $password_bd = $row['pass']; //carga el contenido de la columna pass a la variable $password_bd
        $pass_c = sha1($password); // como el password se guarda encriptado en la base de datos, aca se encripta el password cargado en la pagina de ogin y se lo asigna a la variable $pass_c
               
        if ($password_bd == $pass_c){  //si coincide el pass de la base con el que escribio la persona puede entrar

            $_SESSION['id'] = $row['id']; // se guardan tres variables de sesion
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['nivel'] = $row['nivel'];

            header("Location: inicio.php"); // se redirige al la web de bienvenida. el login fue exitoso

        } else {
            
            header("Location: noauth.php"); // se redirige al la web de error. el login tuvo errores
        }
    }


}
?> <!-- aca comienza la web de login -->
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="INEP Cursos Digitales">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <title>Ingreso al sistema de gestión</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container-sm">

        <!-- Outer Row -->
        <div class="row justify-content-center">
        
            <div class="col col-sm-6">
            

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                                    <div class="text-center">
                                    
                                    <h2 class="p-2 bg-info text-light">Ingreso al sistema</h2>
                                                 
                                    </div>
                    
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                        
                            
                            <div class="col md-auto">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido!</h1>
                                    </div>
                                    <!-- Aca se hace un formulario con ACTION a si mismo, es decir para que se ejecute el codigo PHP que esta al principio de esta pagina-->
                                    <form method="POST" action="<?php echo $_SERVER ['PHP_SELF']; ?>" class="user">
                                        <div class="form-group">
                                            <input type="usuario" class="form-control form-control-user"
                                                id="exampleInputEmail" name="usuario" aria-describedby="emailHelp"
                                                placeholder="Usuario">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="exampleInputPassword" name="password" placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Ingrese
                                        </button>
                                        <hr>
                                        
                                    </form>
                                    
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.html">Olvidé mi contraseña</a>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>