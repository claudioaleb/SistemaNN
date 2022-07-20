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
                        <a class="collapse-item" href="../productos/formulario-alta-producto.php">Agregar nuevo</a>
                        <a class="collapse-item" href="../productos/mantenimiento-productos.php">Ver registros</a>
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
                        <a class="collapse-item" href="../pago/pagos.php">Agregar nuevo</a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">¡BIENVENIDO <strong><?php echo $_SESSION['usuario']; ?></strong>!    </span>
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
                        <h5>REGISTRAR COMPRA</h5>
                    </div>



<!---------------------------------------------------------- >
    <div class="col-md-12">

        <div class="card card-info">

            <div class="card-body">

<!-- Comienzo de Formulario -->
<form method="post" role="form" id="register-form-venta" autocomplete="off" action="compra_producto.php">
    

<!-- Comienzo de Cuerpo de Formulario -->               
<div class="form-body">

<div class="form-group row">
    <div class="col-sm-3 mb-3 mb-sm-0">
        <label>ID COMPRA</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="icon-folder"></i></div>
                <input type="text" name="id_compra" class="form-control" value="<?php echo time(); ?>" readonly>
            </div>                    
    </div>

   <div class="col-sm-3 mb-3 mb-sm-0">
        <label>FECHA DE COMPRA</label>
            <div class="input-group">
                <div class="input-group-addon"><i class="icon-calendar"></i></div>
                <input type="text" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly>
            </div>                   
   </div>
</div>

<hr>

<div class="row">                       
    <table id="tabla">
        <tr>
            <td>
                <div style="margin:10px;">
                <label>PRODUCTO</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-location-shopping"></i></div>
                        <select class="form-control" name="nombre_producto[]">
                            <option value="">Seleccione Producto</option>
                             <?php
                                
                                    $query = $mysqli -> query ("SELECT * FROM productos WHERE estado_producto='Activo';");
                                  
                                    while ($valores = mysqli_fetch_array($query)) {
                                    
                                    echo "<option value='$valores[id_producto]'>$valores[nombre_producto]</option>";
                                      
                                    }
                                    ?>
                        </select>
                    </div>
                </div>
            </td>
            <td>
                <div style="margin:10px;">
                <label>PROVEEDOR</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-user"></i></div>
                        <select name="rela_proveedor[]" class="form-control">
                            <option value="">Seleccione Proveedor</option>
                                 <?php
                    
                   $query = $mysqli -> query ("SELECT * FROM proveedores");
                      
                   while ($valores = mysqli_fetch_array($query)) {
                        
                   echo "<option value='$valores[id_proveedor]'>$valores[razon_social] | $valores[nombre_proveedor]</option>";
                          
                   }
                   ?>
                        </select>
                    </div>
                </div>
            </td>
            <td>
                <div style="margin:10px;">
                <label>Precio Unitario</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-currency-dollar"></i></div>
                        <input type="text" name="precio_unitario[]" id="multiplicando" onChange="multiplicar();" class="form-control" style="width: 70px">
                    </div>
                </div>
            </td>

            <td>
                <div style="margin:10px;">
                <label>Cantidad</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-list"></i></div>
                        <input type="number" name="cantidad[]" id="multiplicador" onChange="multiplicar();" class="form-control" min="1" style="width:70px">
                    </div>
                </div>
            </td>

            <td>
                <div style="margin:10px;">
                <label>Precio Total</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-currency-dollar"></i></div>
                        <input type="text" name="total[]" id="resultado" class="form-control" readonly style="width:70px">
                </div>
            </td>

            <td>
                <div style="margin:10px;">
                <label>Precio Venta</label>
                    <div class="input-group">
                    <div class="input-group-addon"><i class="icon-currency-dollar"></i></div>
                        <input type="text" name="precio_venta[]" class="form-control" style="width:70px">
                </div>
            </td>

            <td class="eliminar">
                <div style="margin:10px;">
                <h6 class="text-muted">Borrar</h6>
                    <button type="button" class="btn btn-default " type="button" /><i class="icon-trash"></i></button>
                </div>
            </td>
          </tr>
    </table>  
</div>

<hr>

<div class="row">
        <div class="form-footer">
            <div class="pull-right">
                <button type="submit" name="insertar" class="btn btn-success  btn-sm">
                    <i class="icon-check-square"></i> REGISTRAR
                </button>
                <button type="button" id="adicional" class="btn btn-info btn-sm"><i class="icon-plus-square"></i> Agregar Producto </button>

                <button type="reset" class="btn btn-default" onclick="resetOrderForm()"><i class="icon-repeat"></i> Reiniciar</button>    

                    <!-- Cuadro de texto confirmacion de alta de persona -->
                    <div id="resultado-venta"></div>
                    <!-- FIN Cuadro de texto confirmacion de alta de persona -->
            </div>
        </div>
</div>
</div>

</form>
<!-- FIN de Formulario -->


</div>
<!-- Fin Contenedor -->


</div>
<!-- FIN Contenido Interno de Cuerpo (page-wrapper) -->


</div>
</div>
<!-- FIN Wrapper -->
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
<script>
function multiplicar(){
    m1 = document.getElementById("multiplicando").value;
    m2 = document.getElementById("multiplicador").value;
    r = m1*m2;
    document.getElementById("resultado").value = r;
    }
</script>
</body>

</html>