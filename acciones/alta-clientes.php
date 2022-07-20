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

if (isset($_POST["registrar"])){
mysqli_query ($conexion,"insert into clientes (
            id_cliente,
           estado_cliente,
              fecha_alta,
              rela_persona) 
           values (
            '$_POST[id_cliente]',      
            '$_POST[estado_cliente]',
            '$_POST[fecha_alta]',
            '$_POST[rela_persona]'
            );") or die ("Problemas en el SQL1.");
          
          //Obtención del último id de la tabla entidad//
         /*$sql = "select max(id_persona) as ultimo_id from persona";
          $result = mysqli_query ($conexion,$sql) or die ("problemas en el sql2");
          while ($ultimo_id = mysqli_fetch_array ($result)) 
          $rela_persona=$ultimo_id['ultimo_id'];

        mysqli_query ($conexion,"insert into domicilio (
          calle,
          altura,
          barrio,
          rela_persona
          ) 
          values (
          '$_POST[calle]',
          '$_POST[altura]',
          '$_POST[barrio]',
          '$rela_persona');") or die ("Problemas en el SQL4.");
          
          //Obtención del último id de la tabla entidad//
          $sql2 = "select max(id_domicilio) as ultimo_id from domicilio";
          $result2 = mysqli_query ($conexion,$sql2) or die ("problemas en el sql2");
          while ($ultimo_id2 = mysqli_fetch_array ($result2)) 
          $rela_domicilio=$ultimo_id2['ultimo_id'];
          
          //insertar en contactos//

          mysqli_query ($conexion,"insert into domicilioxpersona (
          rela_domicilio,
          rela_persona
          ) 
          values (
          '$rela_domicilio',
          '$rela_persona');") or die ("Problemas en el SQL3.");
        
          
          //insertar en domicilio//         
          
          

          mysqli_query ($conexion,"insert into contactoxpersona (
          rela_tipo_contacto,
          rela_persona
          ) 
          values (
          '$_POST[rela_tipo_contacto]',
          '$rela_persona');") or die ("Problemas en el SQL5.");*/
        
        
          
          mysqli_close ($conexion);

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