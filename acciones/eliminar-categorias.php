<!DOCTYPE html>
<html lang="en">
<head>
   <link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">
</head>
<body>
<!-- Modal para Eliminar Cliente -->
<div class="modal fade eliminarCategoria" tabindex="-1" role="dialog" id="eliminarCategoria" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog"> <!-- Ventana del Modal -->

    <div class="modal-content"> <!-- Contenido del Modal -->

      <!-- Encabezado del Modal-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title"><i class="icon-trash"></i> Eliminar Categoria</h5>
      </div>
      <!-- Fin Encabezado del Modal-->

      <div class="modal-body" align="center"> <!-- Cuerpo del Modal-->

        <p>¿Realmente deseas eliminar definitivamente la Categoria?</p>

        <form action="" method="POST">

            <input type="hidden" name="id_categoria" value="<?php echo $row['id_categoria'];?>">
            <hr>
            <button type="submit" name="eliminar" class="btn btn-sm btn-danger"><i class="icon-trash"></i> Eliminar</button>
            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal"><i class="icon-close-outline"></i> Cancelar</button>

        </form>

      </div> <!-- Fin Cuerpo del Modal-->

    </div> <!-- Fin Contenido del Modal -->

  </div> <!-- Fin Ventana del Modal -->

</div> <!-- Fin Modal para Eliminar Cliente -->
<script src="../estilos/jquery/jquery.min.js"></script>
<script src="../estilos/sweetalert2/sweetalert2.js"></script>
</body>
</html>
<?php
$conexion = new mysqli("localhost","root","","north_nutrition");
if (isset($_POST["eliminar"])){
mysqli_query ($conexion,"delete from categorias where id_categoria = $_REQUEST[id_categoria];");
mysqli_close ($conexion);
echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Eliminacion Correcta',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = '../categorias/mantenimiento-categorias.php';
                        })
                  });
              </script>";
              } 
?>