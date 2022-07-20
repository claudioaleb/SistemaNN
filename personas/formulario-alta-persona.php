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
            <!-- MENU PERSONAS -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#opcion11"
                    aria-expanded="true" aria-controls="opcion1">
                    <i class="icon-location-restroom"></i>
                    <span>PERSONAS</span>
                </a>
                <div id="opcion11" class="collapse" aria-labelledby="heading1" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="formulario-alta-persona.php">Agregar nuevo</a>
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
                        <h1 class="h3 mb-0 text-gray-800">ALTA DE PERSONAS</h1>
                    </div>

<!--
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
<li><a href="javascript:;" data-toggle="collapse" data-target="#seleccionar_opcion_stock"><span class="icon-package"></span><span>STOCK</span><i class="fa fa-fw fa-caret-down"></i></a>
     <ul id="seleccionar_opcion_stock" class="collapse">
          
          <li><a href="../gimnasio-stock/abastecimiento_stock.php"><span class="icon-plus-square"></span><span>Añadir Stock</span></a></li>

          <li><a href="../gimnasio-stock/historial_stock.php"><span class="icon-eye"></span><span>Ver Historial</span></a></li>
          
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
<!-- FIN Barra de Navegacion -->



<!-- Comienzo de Formulario -->
<div class="col-md-12"> <!-- Tamaño de la columna -->

        <div class="card card-info">

            <div class="card-body">

        <?php require_once '../acciones/alta_persona.php';?>


<!-- Formulario-->
            <form action="" method="POST">


                <!-- Cuerpo de Formulario -->               
                <div class="form-body">

        <div class="form-group row">
            <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>ID PERSONA</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-folder"></i></div>
               <input type="text" name="id_persona" id="id_persona" class="form-control" value="<?php echo time(); ?>" style="height:36px;" readonly>
           </div>  
           <span class="help-block" id="error"></span>                    
       </div>

                    
       <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>FECHA DE ALTA</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-calendar"></i></div>
               <input type="text" id="fecha_alta" name="fecha_alta" class="form-control" value="<?php echo date('d-m-Y'); ?>" readonly>
           </div>
           <span class="help-block" id="error"></span>
       </div> 
   </div>


   <div class="form-group row">
       <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>NOMBRE</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-user"></i></div>
               <input type="text" id="nombre_persona" name="nombre_persona" class="form-control" placeholder="Ingrese Nombre/s" style="height:36px;" onkeypress="return soloLetras(event);">
           </div>  
           <span class="help-block" id="error"></span>                    
       </div>
                            
       <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>APELLIDO</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-user"></i></div>
               <input type="text" id="apellido_persona" name="apellido_persona" class="form-control" placeholder="Ingrese Apellido/s" style="height:36px;" onkeypress="return soloLetras(event);">
           </div>  
           <span class="help-block" id="error"></span>                    
       </div>
   

       <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>Nº DE DOCUMENTO</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-credit-card"></i></div>
               <input type="number" id="dni_persona" name="dni_persona" class="form-control" placeholder="Ingrese D.N.I">
           </div>  
           <span class="help-block" id="error"></span>                    
       </div>
                          
       <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>FECHA DE NACIMIENTO</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-calendar"></i></div>
               <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="form-control">
           </div>  
           <span class="help-block" id="error"></span>                    
       </div>
   </div>


   <div class="form-group row">                       
       <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>GÉNERO</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-man-woman"></i></div>
               <select name="sexo_persona" id="sexo_persona" class="form-control" style="height:36px;">
                   <option value="">Seleccione Género</option>
                   <option value="Masculino">Masculino</option>
                   <option value="Femenino">Femenino</option>
               </select>
           </div>
               <span class="help-block" id="error"></span>
       </div>  

       <div class="col-sm-3 mb-3 mb-sm-0">
        <h6>NACIONALIDAD</h6>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-globe"></i></div>
               <input type="text" id="nacionalidad_persona" name="nacionalidad_persona" class="form-control" placeholder="Ingrese Nacionalidad" style="height:36px;" onkeypress="return soloLetras(event);">
           </div>
           <span class="help-block" id="error"></span>
       </div>   
   
   <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Provincia</label>
                              <div class="input-group-addon"><i class="icon-location"></i></div>
                            <select class="form-control text-center" name="rela_provincia">
                                <option value="">Seleccione Provincia</option>
                                <?php
                    
                                             $query = $mysqli -> query ("SELECT * FROM provincias ORDER BY nombre_provincia");
                      
                                             while ($valores = mysqli_fetch_array($query)) {
                        
                                             echo "<option value='$valores[id_provincia]'>$valores[nombre_provincia]</option>";
                          
                                            }
                                            ?>
                            </select>
                        </div>

       <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>Localidad</label>
                              <div class="input-group-addon"><i class="icon-location"></i></div>
                            <select class="form-control text-center" name="rela_localidad">
                                <option value="">Seleccione Localidad</option>
                                 <?php
                    
                                             $query = $mysqli -> query ("SELECT * FROM localidades ORDER BY nombre_localidad");
                      
                                             while ($valores = mysqli_fetch_array($query)) {
                        
                                             echo "<option value='$valores[id_localidad]'>$valores[nombre_localidad]</option>";
                          
                                            }
                                            ?>
                            </select>
                        </div>

    <div class="form-group row">
       <div class="col-sm-3 mb-3 mb-sm-0">
        <label>Calle</label>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-location"></i></div>
               <input type="text" name="calle" id="calle" class="form-control" placeholder="Ingrese Calle">
           </div>  
           <span class="help-block" id="error"></span>                    
       </div>
                    
       <div class="col-sm-3 mb-3 mb-sm-0">
        <label>ALTURA (Nº)</label>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-location"></i></div>
               <input type="text" id="altura" name="altura" class="form-control" placeholder="Ingrese Altura (Nº)">
           </div>
           <span class="help-block" id="error"></span>
       </div> 

       <div class="col-sm-3 mb-3 mb-sm-0">
        <label>BARRIO</label>
           <div class="input-group">
               <div class="input-group-addon"><i class="icon-location"></i></div>
               <input type="text" id="barrio" name="barrio" class="form-control" placeholder="Ingrese Barrio" style="height:36px;">
           </div>  
           <span class="help-block" id="error"></span>                    
       </div>

       <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>TIPO DE CONTACTO</label>
                            <div class="input-group" style="margin-right: 25px;">
                            <div class="input-group-addon"><i class="icon-phone"></i></div>
                            <select name="rela_tipo_contacto" class="form-control">
                                  <option value="">Seleccione Contacto
                                  <?php
                    
                                  $query = $mysqli -> query ("SELECT * FROM tipo_contacto");
                      
                                  while ($valores = mysqli_fetch_array($query)) {
                        
                                  echo "<option value='$valores[id_tipo_contacto]'>$valores[descripcion_tipo_contacto]</option>";
                          
                                  }
                                  ?>
                                  </option>
                            </select>
                            </div>
        </div>
        <div class="col-sm-3 mb-3 mb-sm-0">
                            <label>DATO DE CONTACTO</label>
                            <div class="input-group" style="margin-right: 25px;">
                            <div class="input-group-addon"><i class="icon-edit"></i></div>
                            <input required name="dato_contacto" id="dato_contacto" class="form-control" placeholder="Ingrese Dato"/>
                            </div>
      </div>
    </div>     
</div>





<br/><br/><div class="row">

       <div class="form-group col-lg-4">
               <button type="submit" name="registrar" style="width:130px;"  class="btn btn-success btn-sm">
               <i class="icon-check-square"></i> REGISTRAR
               </button>
               <button id="adicional" name="adicional" type="button" class="btn btn-info btn-sm"><i class="icon-plus-square"></i> Agregar Contacto </button>
               

               <!-- Cuadro de texto confirmacion de alta de persona -->
               <div id="result"></div>
               <!-- FIN Cuadro de texto confirmacion de alta de persona -->
       </div>
   </div>
</div>
<!-- FIN Contenido de la Pestaña Contacto -->





</form>
<!-- FIN de Formulario -->





</div>
<!-- Fin Contenedor -->





</div>
<!-- FIN Contenido Interno de Cuerpo (page-wrapper) -->





</div>
<!-- FIN wrapper -->








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


<!-- jQuery -->
   <script src="estilos/js/jquery.js"></script>

<!-- Bootstrap JavaScript -->
   <script src="estilos/js/bootstrap.min.js"></script>

    
<!-- Validación formulario -->
   <script src="../estilos/js/jquery-1.11.2.min.js"></script>
   <script src="../estilos/js/jquery.validate.min.js"></script>
   <script src="../estilos/js/register.js"></script>
 <!-- Bootstrap JavaScript-->
    <script src="../estilos/jquery/jquery.min.js"></script>
    <script src="../estilos/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../estilos/js/estiloPagina.js"></script>
   <script src="../estilos/sweetalert2/sweetalert2.js"></script>
   <script type="text/javascript">
function soloLetras(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyzÁÉÍÓÚABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
    especiales = [8, 37, 39, 46, 6];

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]) {
          tecla_especial = true;
          break;
        }
    }

    if(letras.indexOf(tecla) == -1 && !tecla_especial){
        return false;
     }
}
</script>

</body>
</html>