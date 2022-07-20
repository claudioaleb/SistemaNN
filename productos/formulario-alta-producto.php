<?php 

session_start();

require '../admin/config.php';
require '../functions.php';

if (empty($_SESSION['usuario']) && empty($_SESSION['password'])){
    header('Location: '.RUTA.'admin.php');
}

?>
<?php
 
  $mysqli = new mysqli('localhost', 'root', '', 'north_nutrition');
  $mysqli->set_charset('utf8');

?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>SISTEMA</title>

    <link href="../estilos/css/estiloPagina.min.css" rel="stylesheet">

    <link href="../estilos/fuentes/style.css" rel="stylesheet">

    <link href="../estilos/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">

<script>
function multiplicar(){
    m1 = document.getElementById("multiplicando").value;
    m2 = document.getElementById("multiplicador").value;
    r = m1*m2;
    document.getElementById("resultado").value = r;
    }
</script>

</head>

<body id="page-top">

    <!-- PAGINA -->
    <div id="wrapper">

        <!-- NAVBAR -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- TITULO BARRA DE NAVEGACION -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../admin.php">
                <div class="sidebar-brand-icon rotate-n-15">
                </div>
                <div class="sidebar-brand-text"><span>NORTH NUTRITION</span></div>
            </a>

            <!-- DIVISION -->
            <hr class="sidebar-divider">

            <!-- ENCABEZADO -->
            <div class="sidebar-heading">
                PERSONAS
            </div> 
            <!-- MENU PERSONAS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion11"
                    aria-expanded="true" aria-controls="opcion1">
                    <i class="icon-location-restroom"></i>
                    <span>PERSONAS</span>
                </a>
                <div id="opcion11" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../personas/formulario-alta-persona.php">Agregar nuevo</a>
                        <a class="collapse-item" href="">Ver registros</a>
                    </div>
                </div>
            </li>
            <!-- MENU CLIENTES -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion1"
                    aria-expanded="true" aria-controls="opcion1">
                    <i class="icon-location-restroom"></i>
                    <span>CLIENTES</span>
                </a>
                <div id="opcion1" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../clientes/formulario-alta-cliente.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../clientes/mantenimiento-cliente.php">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- MENU EMPLEADOS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion2"
                    aria-expanded="true" aria-controls="opcion2">
                    <i class="icon-location-restroom"></i>
                    <span>EMPLEADOS</span>
                </a>
                <div id="opcion2" class="collapse" aria-labelledby="heading2" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../empleado/formulario-alta-empleado.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../empleado/mantenimiento-empleados.php">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- MENU PROVEEDORES -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion3"
                    aria-expanded="true" aria-controls="opcion3">
                    <i class="icon-truck"></i> 
                    <span>PROVEEDORES</span>
                </a>
                <div id="opcion3" class="collapse" aria-labelledby="heading3"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../proveedor/formulario-alta-proveedor.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../proveedor/mantenimiento-proveedor.php">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- DIVISION -->
            <hr class="sidebar-divider">

            <!-- ENCABEZADO -->
            <div class="sidebar-heading">
                PRODUCTOS
            </div>

            <!-- MENU PRODUCTOS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion4"
                    aria-expanded="true" aria-controls="opcion4">
                    <i class="icon-glass"></i>
                    <span>PRODUCTOS</span>
                </a>
                <div id="opcion4" class="collapse" aria-labelledby="heading4" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="formulario-alta-producto.php">Agregar nuevo</a>
                        <a class="collapse-item" href="mantenimiento-productos.php">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- MENU CATEGORÍAS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion5"
                    aria-expanded="true" aria-controls="opcion5">
                    <i class="icon-list-bullet"></i>
                    <span>CATEGORÍAS</span>
                </a>
                <div id="opcion5" class="collapse" aria-labelledby="heading5"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../categorias/formulario-alta-categoria.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../categorias/mantenimiento-categorias.php">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- MENU STOCK -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion6"
                    aria-expanded="true" aria-controls="opcion6">
                    <i class="icon-list-numbered"></i>
                    <span>STOCK</span>
                </a>
                <div id="opcion6" class="collapse" aria-labelledby="heading6"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../stock/alta-abastecimiento-proveedor.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../stock/abastecimiento-proveedor.php">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- MENU VENTAS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion7"
                    aria-expanded="true" aria-controls="opcion7">
                    <i class="icon-cart"></i>
                    <span>VENTAS</span>
                </a>
                <div id="opcion7" class="collapse" aria-labelledby="heading7"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../ventas/formulario-venta-producto.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../ventas/listado-ventas.php">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- MENU COMPRAS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion8"
                    aria-expanded="true" aria-controls="opcion8">
                    <i class="icon-store-front"></i>
                    <span>COMPRAS</span>
                </a>
                <div id="opcion8" class="collapse" aria-labelledby="heading8"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../compra/formulario-compra-producto.php">Agregar nuevo</a>
                        <a class="collapse-item" href="">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- MENU PAGOS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion9"
                    aria-expanded="true" aria-controls="opcion9">
                    <i class="icon-credit-card"></i>
                    <span>PAGOS</span>
                </a>
                <div id="opcion9" class="collapse" aria-labelledby="heading9"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="../pago/detalle_pago.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../pago/mantenimiento-pagos.php?o=manord">Ver registros</a>
                    </div>
                </div>
            </li>

            <!-- DIVISION -->
            <hr class="sidebar-divider">

            <!-- ENCABEZADO -->
            <div class="sidebar-heading">
                REPORTES
            </div>

            <!-- MENU GRAFICOS -->
            <li class="nav-item">
                <a class="nav-link" href="">
                    <i class="icon-chart-pie"></i>
                    <span>GRÁFICOS</span></a>
            </li>

            <!-- MENU PDF -->
            <li class="nav-item">
                <a class="nav-link" href="../reportes-pdf/impresiones.php">
                    <i class="icon-files-empty"></i>
                    <span>PDF</span></a>
            </li>

            <!-- DIVISION -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- BOTON CONTRAER Y EXPANDIR MENU -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- FIN NAVBAR -->

        <!-- CONTENIDO MADRE PAGINA -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- CONTENIDO HIJO -->
            <div id="content">

                <!-- BARRA MENU DE ARRIBA -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- BARRA USUARIO -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> ¡BIENVENIDO <strong><?php echo $_SESSION['usuario']; ?></strong>!    </span>
                                <img class="img-profile rounded-circle" src="../estilos/imagenes/usuario.png">
                            </a>
                            <!-- MENU USUARIO -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="icon-user mr-2 text-gray-400"></i>
                                    PERFIL
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="icon-exit mr-2 text-gray-400"></i>
                                    SALIR
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- FIN BARRA MENU ARRIBA -->

                <!-- CONTENIDO CUERPO DE LA PAGINA -->
                <div class="container-fluid">

                    <!-- TITULO ENCABEZADO DE LA PAGINA -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h5>FORMULARIO DE REGISTRO DE PRODUCTOS</h5>
                    </div>



<!---------------------------------------------------------- >

    <div class="col-md-12"> <!-- Tamaño de la columna -->

        <div class="card card-info">

            <div class="card-body">

            <?php require_once '../acciones/alta-producto.php';?>

            <!-- Formulario-->
            <form action="" method="POST">

                <!-- Cuerpo de Formulario -->               
                <div class="form-body">

                    <div class="panel panel-default">
                         <div class="panel-heading"> DATOS GENERALES</div>
                    </div><br>

                    <div class="form-group row">
                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>CÓDIGO:</label>
                              <input type="text" class="form-control" name="id_producto" value="<?php echo time(); ?>" readonly>
                        </div>

                        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Fecha de Alta:</label>
                              <input type="text" id="fecha_alta_producto" name="fecha_alta_producto" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly>
                        </div>
                    </div>


                    <hr>

                    
                    <div class="form-group row">
                                                  
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Categoria:</label>
                              <select name="rela_categoria" class="form-control" style="width: 100%">
                                      <option value="">Seleccione</option>
                                            <?php
                    
                                             $query = $mysqli -> query ("SELECT * FROM categorias ORDER BY nombre_categoria");
                      
                                             while ($valores = mysqli_fetch_array($query)) {
                        
                                             echo "<option value='$valores[id_categoria]'>$valores[nombre_categoria]</option>";
                          
                                            }
                                            ?>
                              </select>
                            </div>

                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Proveedor:</label>
                                    <select name="rela_proveedor" class="form-control" style="width: 100%">
                                        <option value="">Seleccione</option>
                                            <?php
                    
                                            $query = $mysqli -> query ("SELECT * FROM proveedores ORDER BY nombre_proveedor, razon_social");
                      
                                            while ($valores = mysqli_fetch_array($query)) {
                        
                                            echo "<option value='$valores[id_proveedor]'>$valores[nombre_proveedor] | $valores[razon_social]</option>";
                          
                                            }
                                            ?>
                                    </select>
                            </div>

                        
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Nombre:</label>
                              <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" placeholder="Nombre del Producto" autocomplete="off">
                            </div>
                 
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Descripcion:</label>
                              <input type="text" class="form-control" id="descripcion_producto" name="descripcion_producto" placeholder="Descripcion del Producto" autocomplete="off">
                            </div>
                    </div>

                    <div class="form-group row">
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Cantidad:</label>
                              <input type="number" class="form-control" id="multiplicando" name="cantidad" autocomplete="off" onChange="multiplicar();">
                            </div>

                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Precio Unitario:</label>
                              <input type="text" class="form-control" id="multiplicador" name="precio_unitario" autocomplete="off"onChange="multiplicar();">
                            </div>
                        
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Total:</label>
                              <input type="number" class="form-control" id="resultado" name="total" autocomplete="off" readonly>
                            </div>

                            <div class="col-sm-3 mb-3 mb-sm-0">
                                 <label>Precio Venta:</label>
                              <input type="number" class="form-control" id="precio_venta" name="precio_venta" autocomplete="off">
                            </div>

                        
                            <div class="col-sm-3 mb-3 mb-sm-0">
                                <label>Estado:</label>
                              <select class="form-control" id="estado_producto" name="estado_producto">
                                <option value="">Seleccionar Estado</option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                              </select>
                            </div>
                    </div>
                    

                <!-- Footer del Formulario-->
                <div class="form-footer">
                    <div class="pull-right">
                    <button type="submit" name="registrar" class="btn btn-sm btn-primary" autocomplete="off"><i class="icon-checkmark-outline"></i> Guardar</button>
                <button type="button" class="btn btn-secondary btn-sm" onclick="location.href='mantenimiento-productos.php'"><span class="icon-reply1"></span> Volver</button>

                   
                    </div>
                </div>
                <!-- Fin Footer del Formulario-->

                </div> <!-- Fin Cuerpo del Formulario--> 

            </form> <!-- Fin Formulario --> 


            </div> <!-- Fin Contenido del panel -->

        </div> <!-- Fin Encabezado con Titulo del panel -->

    </div> <!-- Fin de columna -->

</div> <!--Fin de la fila -->

            <!-- FIN CONTENIDO PAGINA -->

            <!-- FOOTER -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Sistema North Nutrition 2021</span>
                    </div>
                </div>
            </footer>
            <!-- FIN DEL FOOTER -->

        </div>
        <!-- FIN CONTENIDO HIJO -->

    </div>
    <!-- FIN CONTENIDO MADRE -->

    <!-- BOTON DE SCROLL-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- MODAL CERRAR SESIÓN-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title" id="exampleModalLabel">¿Está seguro de realizar esta acción?</h6>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Está a punto de cerrar su sesión</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary btn-sm" href="../close.php">SALIR</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript-->
    <script src="../estilos/jquery/jquery.min.js"></script>
    <script src="../estilos/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../estilos/js/estiloPagina.js"></script>
    <script src="../estilos/sweetalert2/sweetalert2.js"></script>
</body>

</html>




