<!DOCTYPE html>
<html lang="en">
<head>

    <link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">

</head>
<body>


<!-- Modal para Eliminar Cliente -->
<div class="modal fade agregarCliente" tabindex="-1" role="dialog" id="agregarCliente" data-backdrop="static" data-keyboard="false">

  <div class="modal-dialog"> <!-- Ventana del Modal -->

    <div class="modal-content"> <!-- Contenido del Modal -->

      <!-- Encabezado del Modal-->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h5 class="modal-title"><i class="icon-add-solid"></i> Agregar Cliente</h5>
      </div>
      <!-- Fin Encabezado del Modal-->

      <div class="modal-body" align="center"> <!-- Cuerpo del Modal-->

        <p>¿Realmente deseas agregar el Cliente?</p>

        <form action="" method="POST">

            <input  type="hidden" name="id_cliente" value="<?php echo $row['id_cliente'];?>">
            <input  type="hidden" name="estado_cliente" value="Activo" readonly="Activo">
            <hr>
            <button type="submit" name="agregar" class="btn btn-success btn-sm"><i class="icon-add-solid"></i> Agregar</button>
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
$conexion = new mysqli('localhost','root','','north_nutrition');
if (isset($_POST["agregar"])){

mysqli_query($conexion, "update clientes set
estado_cliente='$_POST[estado_cliente]'
where id_cliente=$_POST[id_cliente];",);
mysqli_close($conexion);
    
echo "<script>  
            jQuery(function(){
                Swal.fire({
                  icon: 'success',
                  title: '¡Muy bien!',
                  text: 'Alta Correcta',
                  showConfirmButton: true
                  }).then((result) => {
                    window.location.href = '';
                  })
            });
      </script>";
}
?>
