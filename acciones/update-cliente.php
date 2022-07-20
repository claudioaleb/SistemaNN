<?php
$conexion = new mysqli('localhost', 'root', '','north_nutrition');
if (isset($_POST["registrar"])){
mysqli_query($conexion, "update clientes set
estado_cliente='$_POST[estado_cliente]'
where id_cliente = $_POST[id_cliente];",);
mysqli_close($conexion);
echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Modificacion Correcta',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = '../clientes/mantenimiento-cliente.php';
                        })
                  });
              </script>";
              }

?>