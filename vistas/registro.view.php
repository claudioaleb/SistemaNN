<!DOCTYPE html>
<html lang="en">
<head>
  <title>REGISTRO DE USUARIO</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
 <title>SISTEMA</title>
  <link href="estilos/css/estiloPagina.min.css" rel="stylesheet">

    <link href="estilos/fuentes/style.css" rel="stylesheet">

    <link href="estilos/fontawesome-free/css/all.min.css" rel="stylesheet">

    <link href="estilos/sweetalert2/sweetalert2.css" rel="stylesheet">

</head>
<body style="background-color:#077065;">
<div class="container-fluid" align="center">

            <div class="col-md-4 col-md-offset-4">
<div class="panel" style="background-color: #077065;">
            <h3 class="panel-heading"><img src="estilos/imagenes/north.png" style="border-radius: 10px" width=300 height=300></h3>
                <div class="panel-body">

    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">

     <!-- Cuerpo de Formulario -->               
    <div class="form-body">

    <div class="row">
      <div class="form-group col-md-6">
           <h6 style="color:white;">NOMBRE DE USUARIO</h6>
               <div class="input-group">
                    <div class="input-group-addon"><i class="icon-user" style="color:white;"></i></div>
                         <input type="text" name="usuario" placeholder="Usuario" class="form-control">
               </div>
      </div>

      <div class="form-group col-md-6">
           <h6 style="color:white;">CONTRASEÑA</h6>
               <div class="input-group">
                    <div class="input-group-addon"><i class="icon-lock" style="color:white;"></i></div>
                         <input type="password" name="password" placeholder="Contraseña" class="form-control">
               </div>
      </div>

      <div class="form-group col-md-6">
            <h6 style="color:white;">PRIVILEGIO</h6>
               <div class="input-group">
                 <div class="input-group-addon" style="color:white;"><i class="icon-creative-commons-attribution"></i></div>
                      <select class="form-control" name="rol">
                              <option value="">Seleccione</option>
                              <option value="administrador">Administrador</option>
                              <option value="vendedor">Vendedor</option>
                      </select>
               </div>
      </div>

      </div>

      <?php if (!empty($errores)): ?>
        <ul>
          <?php echo $errores; ?>
        </ul>
      <?php endif; ?>
 
              <div class="panel-footer" style="border-radius:5px; background-color:#077065;">
                     <button type="submit" name="submit" class="btn btn-sm btn-success"><i class="icon-log-in"></i> REGISTRAR</button>
                </div>
          </div>
      </div>

    </form>

    </div>

  </div>
<br>
    <a href="<?php echo RUTA.'login.php' ?>" class="login-link" style="color:white;">¿Ya tienes cuenta?</a>


<!-- FOOTER -->
            <footer class="sticky-footer" style="background-color:#077065;">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto" style="">
                        <span style="color:white;">Copyright &copy; Sistema North Nutrition 2021</span>
                    </div>
                </div>
            </footer>
            <!-- FIN DEL FOOTER -->
  </div>
<!-- Bootstrap JavaScript-->
    <script src="estilos/jquery/jquery.min.js"></script>
    <script src="estilos/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="estilos/js/estiloPagina.js"></script>
   <script src="estilos/sweetalert2/sweetalert2.js"></script>
</body>
</html>
