<?php 

session_start();

require '../admin/config.php';
require '../functions.php';

if (empty($_SESSION['usuario']) && empty($_SESSION['password'])){
    header('Location: '.RUTA.'admin.php');
}

?>


<!DOCTYPE html>
<html lang="en">
  <head><link href="../../estilos/imagenes/gim2.png" rel="shortcut icon" type="image/png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
     <title>ABASTECIMIENTO PRODUCTOS</title>
     
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
                        <a class="collapse-item" href="../clientes/mantenimiento-clientes.php">Ver registros</a>
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
                        <a class="collapse-item" href="../productos/formulario-alta-productos.php">Agregar nuevo</a>
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
                        <a class="collapse-item" href="../categorias/formulario-alta-categorias.php">Agregar nuevo</a>
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
                        <a class="collapse-item" href="alta-abastecimiento-proveedor.php">Agregar nuevo</a>
                        <a class="collapse-item" href="abastecimiento-proveedor.php">Ver registros</a>
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
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">¡BIENVENIDO <strong><?php echo $_SESSION['usuario']; ?></strong>!</span>
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
                        <h5>HISTORIAL</h5>
                    </div>
<!--    
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_afiliado"><span class="icon-users"></span><span>SOCIOS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_afiliado" class="collapse">
          
          <li><a href="../gimnasio-personas/formulario-persona.php"><span class="icon-user-plus"></span><span>Nueva Persona</span></a></li>

          <li><a href="../gimnasio-miembros/formulario-miembro.php"><span class="icon-user-plus"></span><span>Añadir Socio</span></a></li>

          <li><a href="../gimnasio-personas/listado-personas/index_listado_persona.php"><span class="icon-eye"></span><span>Ver Personas</span></a></li>

          <li><a href="../gimnasio-miembros/listado-socios/index_listado_socio.php"><span class="icon-eye"></span><span>Ver Socios</span></a></li>

     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_profesional"><span class="icon-users"></span><span>EMPLEADOS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_profesional" class="collapse">
          
          <li><a href="../gimnasio-empleados/formulario-empleado.php"><span class="icon-user-plus"></span><span>Nuevo Empleado</span></a></li>

          <li><a href="../gimnasio-empleados/listado-empleados/index_listado_empleado.php"><span class="icon-eye"></span><span>Ver Empleados</span></a></li>
          
     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_plan"><span class="icon-activity"></span><span>SERVICIOS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_plan" class="collapse">
          
          <li><a href="../gimnasio-servicios/gimnasio-clases/formulario-clase.php"><span class="icon-plus-square"></span><span>Nueva Clase</span></a></li>

          <li><a href="../gimnasio-servicios/gimnasio-rutinas/formulario-rutina.php"><span class="icon-plus-square"></span><span>Nueva Rutina</span></a></li>

          <li><a href="../gimnasio-servicios/gimnasio-clases/listado-clases/index_listado_clases.php"><span class="icon-eye"></span><span>Ver Clases</span></a></li>

          <li><a href="../gimnasio-servicios/gimnasio-rutinas/listado-rutinas/index_listado_rutinas.php"><span class="icon-eye"></span><span>Ver Rutinas</span></a></li>
          
     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_inscripcion"><span class="icon-clipboard"></span><span>INSCRIPCIONES</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_inscripcion" class="collapse">
          
          <li><a href="../gimnasio-inscripciones/inscripcion-clase/formulario-inscripcion-clase.php"><span class="icon-plus-square"></span><span>Inscribir a Clase</span></a></li>

          <li><a href="../gimnasio-inscripciones/inscripcion-clase/listado-inscripciones/index_listado_inscripciones.php"><span class="icon-eye"></span><span>Ver Inscripciones</span></a></li>
          
     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_asistencia"><span class="icon-list"></span><span>ASISTENCIAS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_asistencia" class="collapse">
          
          <li><a href="../gimnasio-asistencias/asistencia-clases/asistencia-clase.php"><span class="icon-check-square"></span><span>Asistencia Clase</span></a></li>
          
          <li><a href="../gimnasio-asistencias/asistencia-clases/listado-asistencias/index_listado_asistencias.php"><span class="icon-eye"></span><span>Ver Asistencias</span></a></li>

     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_consulta"><span class="icon-eye"></span><span>CONSULTAS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_consulta" class="collapse">
          
          <li><a href="../gimnasio-consultas/consulta-socio.php"><span class="icon-eye"></span><span>Consultar Servicio</span></a></li>
          <li><a href="../gimnasio-consultas/consulta-producto.php"><span class="icon-eye"></span><span>Consultar Producto</span></a></li>
          
     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_proveedor"><span class="icon-briefcase"></span><span>PROVEEDORES</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_proveedor" class="collapse">
          
          <li><a href="../gimnasio-proveedores/formulario-proveedor.php"><span class="icon-plus-square"></span><span>Nuevo Proveedor</span></a></li>

          <li><a href="../gimnasio-proveedores/listado-proveedores/index_listado_proveedor.php"><span class="icon-eye"></span><span>Ver Proveedores</span></a></li>
          
     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_categoria"><span class="icon-list"></span><span>CATEGORÍAS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_categoria" class="collapse">
          
          <li><a href="../gimnasio-categorias/formulario-categoria-producto.php"><span class="icon-plus-square"></span><span>Nueva Categoría</span></a></li>

          <li><a href="../gimnasio-categorias/listado-categorias/index_listado_categorias.php"><span class="icon-eye"></span><span>Ver Categorías</span></a></li>
          
     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_producto"><span class="icon-shopping-bag"></span><span>PRODUCTOS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_producto" class="collapse">
          
          <li><a href="../gimnasio-productos/formulario-producto.php"><span class="icon-plus-square"></span><span>Nuevo Producto</span></a></li>

          <li><a href="../gimnasio-productos/listado-productos/index_listado_productos.php"><span class="icon-eye"></span><span>Ver Productos</span></a></li>

          <li><a href="../gimnasio-productos/formulario-compra-producto.php"><span class="icon-shopping-cart"></span><span>Nueva Venta</span></a></li>

          <li><a href="../gimnasio-pagos/mantenimiento-pagos.php?o=manord"><span class="icon-credit"></span><span>Gestionar Pago</span></a></li>

          <li><a href="../gimnasio-pagos/detalle_pago.php"><span class="icon-file-text"></span><span>Historial de Pagos</span></a></li>
          
     </ul>
</li>

<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_stock"><span class="icon-package"></span><span>STOCK PRODUCTOS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_stock" class="collapse">
          
          <li><a href="../textil-stock/abastecimiento_stock.php"><span class="icon-plus-square"></span><span>Añadir Stock</span></a></li>

          <li><a href="../textil-stock/historial_stock.php"><span class="icon-eye"></span><span>Ver Historial</span></a></li>
          
     </ul>
</li>

<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_impresion"><span class="icon-printer"></span><span>IMPRESIONES</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_impresion" class="collapse">
          
          <li><a href="../gimnasio-impresiones/impresiones.php"><span class="icon-printer"></span><span>Realizar Impresión</span></a></li>
          
     </ul>
</li>
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_graficas"><span class="icon-pie-chart"></span><span>GRÁFICOS</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_graficas" class="collapse">

          <li><a href="../gimnasio-graficos/graficos.php"><span class="icon-pie-chart"></span><span>Gráfico Pastel</span></a></li>

     </ul>
</li>          
-->				
</ul>
</div>
<!-- Fin de Menu vertical con opciones -->           
		   
<!-- Fin Barra de Navegacion -->
</nav>


  <?php include("modal_dato_producto.php");?>

	 
<div id="page-wrapper">
<div class="container-fluid">

<br/>
<!-- FIN de Encabezado -->
		
	  <div class="row">

	  	<div class="col-lg-12">

                    <div class="panel panel-default">
                     <div class="bar">
                     <br>&nbsp;&nbsp;&nbsp;&nbsp;
                     <div class="col-md-2">
                     <a href="abastecimiento_stock.php" type="button" class="btn btn-default btn-sm"><span class="icon-reply"></span>VOLVER A STOCK</a>
                     </div>

                     <div class="col-md-3">
                              <div class="input-group">
                                  <div class="input-group-addon"><i class="icon-search"></i></div>
                                      <input type="text" class="form-control" style="padding:10px;" name="filter" value="" id="filter" placeholder="Buscar Producto" autocomplete="off">
                              </div>                    
                     </div>


                     </div><br>
		
		<div class="panel-body">
		<div id="loader" class="text-center"> <img src="loader.gif"></div>
		<div class="datos_ajax_delete"></div><!-- Datos ajax Final -->
		<div class="outer_div"></div><!-- Datos ajax Final -->
		</div>
	  </div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../../estilos/js/jquery.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="../../estilos/js/bootstrap.min.js"></script>
	<script src="js/funcion_historial_stock.js"></script>
  <script src="js/buscar_productos.js"></script>
	<script>
		$(document).ready(function(){
			load(1);
		});
	</script>

</div>
<!-- Fin Contenedor -->
</div>

</div>

</div>
<!-- FIN Wrapper -->







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
    <script src="buscar_productos.js"></script>

<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="../estilos/js/jquery.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="../estilos/js/bootstrap.min.js"></script>
    <script src="js/funciones_stock.js"></script>
  <script src="js/buscar_productos.js"></script>
    <script>
        $(document).ready(function(){
            load(1);
        });
    </script>








</body>
</html>
