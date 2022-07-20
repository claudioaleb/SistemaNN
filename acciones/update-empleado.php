<?php
$conexion = new mysqli('localhost', 'root', '','north_nutrition');
if (isset($_POST["registrar"])){
mysqli_query($conexion,"update empleados set
cargo_empleado='$_POST[cargo_empleado]',
estado_empleado='$_POST[estado_empleado]'
where id_empleado = $_POST[id_empleado];");
mysqli_close($conexion);
echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Modificacion Correcta',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = '../empleado/mantenimiento-empleados.php';
                        })
                  });
              </script>";
              }
?>