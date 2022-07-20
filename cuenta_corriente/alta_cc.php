<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
<script src="../estilos/jquery/jquery.min.js"></script>
<link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">
<script src="../estilos/sweetalert2/sweetalert2.js"></script>
</HEAD>
<BODY>
<?php
$conexion = new mysqli('localhost', 'root', '','north_nutrition');
mysqli_query($conexion,"insert into cuenta_corriente (rela_cliente, fecha_alta, fecha_pago, saldo)
values('$_REQUEST[rela_cliente]','$_REQUEST[fecha_alta]','$_REQUEST[fecha_pago]','$_REQUEST[saldo]');");
mysqli_close($conexion);
echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Registro Correcto',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = 'cuenta_corriente.php';
                        })
                  });
              </script>";
?>
</BODY>
</HTML>