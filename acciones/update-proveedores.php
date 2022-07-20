<?php
$conexion = new mysqli('localhost', 'root', '','north_nutrition');
if (isset($_POST["registrar"])){
mysqli_query($conexion, "update proveedores set
nombre_proveedor='$_POST[nombre_proveedor]',
razon_social='$_POST[razon_social]',
direccion_proveedor='$_POST[direccion_proveedor]',
barrio_proveedor='$_POST[barrio_proveedor]',
email_proveedor='$_POST[email_proveedor]',
telefono_fijo_proveedor='$_POST[telefono_fijo_proveedor]',
telefono_celular_proveedor='$_POST[telefono_celular_proveedor]'

where id_proveedor= $_POST[id_proveedor];",) or die ("Problemas en el sql.");
mysqli_close($conexion);
echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Modificacion Correcta',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = '../proveedor/mantenimiento-proveedor.php';
                        })
                  });
              </script>";
              }
?>