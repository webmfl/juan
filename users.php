<?php

require "conexion.php";
require "datosgen.php";
session_start();


$sql = "SELECT * FROM usuario WHERE estado=0";
$resultado = $mysqli->query($sql); 

$nombre = $_SESSION['nombre'];
$nivel = $_SESSION['nivel'];

?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="INEP Cursos Digitales">
    <link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <title>Manejo de usuarios</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!--FontAwesome-->
    <link rel="stylesheet" href="css/fontaw/css/font-awesome.min.css">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center">
                   <div class="sidebar-brand-text mx-3"><?php echo $cliente; ?></div> <!--nombre del cliente -->
            </a>

            
            
            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="inicio.php">
                    <i class="fa fa-sitemap"></i>
                    <span>Dashboard</span></a>
            </li>

           <!-- Divider -->
           <hr class="sidebar-divider">

            <!--Elementos del menu -->
            <?php
            foreach ($menu as $key => $val) {

                if (substr($key, 0, -1)=="simpl") {
                    if ($nivel=="administrador" || $nivel=="operador" && $val[3]=="visible") {
                        
                        echo'
                        <li class="nav-item">
                                <a class="nav-link" href="'; echo $val[0]; echo'">
                                <i class="'; echo $val[1]; echo '" aria-hidden="true"></i>
                                    <span>'; echo $val[2]; echo '</span></a>
                        </li>
                        ';
                    }
                }elseif (substr($key, 0, -1)=="multi") {
                    echo '
                    <li class="nav-item">
                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                        aria-expanded="true" aria-controls="collapsePages">
                        <i class="'.$val[1].'" aria-hidden="true"></i>
                        <span>'.$val[0].'</span>
                    </a>
                    <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                        <div class="bg-white py-2 collapse-inner rounded">';

                }elseif (substr($key, 0, -1)=="final") {
                    echo '</div>';
                    echo '</div>';
                    echo '</li>';
                            
                }else{
                    
                    if ($val[0]=="titulo") {
                        echo '<h6 class="collapse-header">'.$key.'</h6>';
                    } elseif ($nivel=="administrador" || $nivel=="operador" && $val[1]=="visible")  {
                        echo '<a class="collapse-item" href="'.$val[0].'">'.$key.'</a>';
                    }

                }
            }
            ?>
<!-- Divider -->
<hr class="sidebar-divider d-none d-md-block">

<!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div>



</ul>
<!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <form class="form-inline">
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>
                    </form>

                    <!-- Topbar Search 
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>-->

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item dropdown no-arrow align-baseline">
                                
                        <img src="<?php echo $logo; ?>" style="width: 30%;">
                                                            
                            </li>
                    </ul>
                    <ul class="navbar-nav ml-auto">

                       <!-- Nav Item - User Information -->
                       <li class="nav-item dropdown no-arrow align-baseline">
                                
                                <span class="nav-link dropdown-toggle text-gray-600 small"><?php echo $diassemana[date('w')]." ".date('d')." de ".$meses[date('n')-1]. " del ".date('Y') ; ?></span>
                                
                            
                            </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre; ?></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information-->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <!--<a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> -->
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="logout.php" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading 
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank"
                            href="https://datatables.net">official DataTables documentation</a>.</p>
                    -->
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manejo de usuarios</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <form action="insertar.php" method="POST"> <!-- aca esta el formulario -->
                                        <h6 class="m-2 font-weight-bold text-primary">Nuevo</h6>
                                        <input type="text" class="form-control mb-3" name="nya" placeholder="Nombre completo" required />
                                        <input type="text" class="form-control mb-3" name="nombre" placeholder="Usuario" required />
                                        <input type="password" class="form-control mb-3" name="pass" placeholder="Password" required />
                                        <input type="mail" class="form-control mb-3" name="mail" placeholder="Mail" required />
                                        <select class="form-control mb-3" id="dataNiveles" name="nivel" required>
                                            <option value="administrador">Administrador</option>
                                            <option value="operador">Operador</option>
                                        </select>
                                        <input type="hidden" name="modulo" value="users" />
                                        <button class="btn btn-primary">Grabar</button>
                                    </form>
                                </div>              
                                <div class="col-md-8">
                                    <div class="table-responsive">
                                        <table class="table table-striped" id="mydataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Usuario</th>
                                                    <th>Mail</th>
                                                    <th>Nivel</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            
                                            <tbody>
                                                <?php while($row = $resultado->fetch_assoc()) { ?>
                                                    
                                                <tr>
                                                    
                                                    <td><?php echo $row['id']; ?></td>
                                                    <td><?php echo $row['nombre']; ?></td>
                                                    <td><?php echo $row['mail']; ?></td>
                                                    <td><?php echo $row['nivel']; ?></td>
                                                    <td>
                                                            <a href="#" data-toggle="tooltip" title="Editar" onClick="MyWindow=window.open('editar.php?id=<?php echo $row['id']; ?>&modulo=users','MyWindow','width=650,height=700,top=100,left=300,resizable=0'); return false;" class="btn btn-info"><span class="material-icons">mode_edit</span></a>
                                                            <a data-toggle="tooltip" title="Eliminar" href="eliminar.php?id=<?php echo $row['id']; ?>&modulo=users" class="btn btn-danger"><span class="material-icons">clear</span></a>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                <div class="copyright text-center my-auto">
                        <span>Desarrollado por <a href="https://ribbontech.com.ar"><code>< ribbontech ></code></a></span>
                        
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>


    
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Confirma el cierre?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Presione SALIR para confirmar</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout.php">Salir</a>
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

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <!-- Datatables -->
    <link rel="stylesheet" href="dt/datatables.min.css">
    <script src="dt/datatables.min.js"></script>

    <!-- Buttons -->
    <link rel="stylesheet" href="dt/buttons/css/buttons.dataTables.min.css">
    <script src="dt/buttons/js/dataTables.buttons.min.js"></script>
    <script src="dt/buttons/js/buttons.html5.min.js"></script>
    <script src="dt/pdfmake/pdfmake.min.js"></script>
    <script src="dt/pdfmake/vfs_fonts.js"></script>
    <script src="dt/buttons/js/buttons.flash.min.js"></script>
    <script src="dt/buttons/js/buttons.print.min.js"></script>
    <script src="dt/buttons/js/jszip.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            

            var table = $('#mydatatable').DataTable({
                
                dom: 'Bfrtip',
                buttons: [
                    'excel', 'pdf', 'print'
                ],
                language: {
                    "url": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json"
                },
                order: [
                    [0, "asc"]
                ],
            }),
        });
     
    </script>

</body>

</html>