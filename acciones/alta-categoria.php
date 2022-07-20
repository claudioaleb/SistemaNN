<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
<script src="../estilos/jquery/jquery.min.js"></script>
<link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">
<script src="../estilos/sweetalert2/sweetalert2.js"></script>
</HEAD>
<BODY>
<?php
$conexion = new mysqli("localhost","root","","north_nutrition");

if (isset($_POST["registrar"])){
mysqli_query($conexion,"insert into categorias (id_categoria, nombre_categoria)
values('$_REQUEST[id_categoria]','$_REQUEST[nombre_categoria]');")
or die("problemas en el select".mysqli_error());
mysqli_close($conexion);
echo "<script>  
                  jQuery(function(){
                      Swal.fire({
                          icon: 'success',
                          title: '¡Muy bien!',
                            text: 'Registro Correcto',
                            showConfirmButton: true
                        }).then((result) => {
                            window.location.href = '';
                        })
                  });
              </script>";
    }
?>
</BODY>
</HTML>