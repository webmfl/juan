<?php

// empresa
$cliente = "Farmacia Demo";
$logo = "img/images.jpeg";
$menu = array();
// menús. 
// para crear un menu simple se usa "simpl#" y en el array va enlace, icono y nombre
// para crear un menu multiple colapsado se usa "multi#" y despues va el titulo del grupo y los componentes 
// con sus enlaces como segundo parametro 
$menu = array (     "multi1" => array ("Herramientas", "fa fa-cog"),
                    
                    "Aplicaciones" => array ("titulo", "visible"),
                    "Registro de aplicaciones" => array ("ventas.php", "visible"),
                    "Reimpresiones" => array ("manejoapp.php", "visible"),
                    //"Presupuestos" => array ("presus.php", "visible"),
                    "Anulación de aplicación" => array ("anula.php", "hidden"),
                    //"Ajuste de clientes" => array ("ajustecliente.php", "hidden"),
                                        
                    //"Stock" => array ("titulo", "visible"),
                    //"Ingreso/Egreso de Stock" => array ("compras.php", "visible"),
                                        
                    //"Informes" => array ("titulo", "visible"),
                    //"Ganancias" => array ("listadogan.php", "hidden"),
                    //"Ventas por operador" => array ("listadouser.php", "hidden"),
                    //"Estado de cuenta" => array ("informes.php",  "hidden"),
                                        
                    "final1" => "si",
                    
                    "simpl1" => array("clientes.php", "fa fa-users", "Pacientes", "visible"),

                    "simpl2" => array("vacunas.php", "fa fa-eyedropper", "Vacunas", "visible"),

                    "simpl3" => array("users.php", "fa fa-user-plus", "Usuarios", "hidden"),
                   
                    "simpl4" => array("backup.php", "fa fa-file", "Backup Base de Datos", "hidden"),

                    
                    
                );


?>