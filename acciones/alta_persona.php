<HTML>
<HEAD>
<TITLE>ALTA</TITLE>
<script src="../estilos/jquery/jquery.min.js"></script>
<link href="../estilos/sweetalert2/sweetalert2.css" rel="stylesheet">
<script src="../estilos/sweetalert2/sweetalert2.js"></script>
</HEAD>
<BODY>

<?php
					
$conexion = mysqli_connect("localhost","root","")
or die("Problemas en la conexion");
mysqli_select_db($conexion,"north_nutrition")or
die("Problemas en la seleccion de la base de datos");
if (isset($_POST["registrar"])){

					
					mysqli_query ($conexion,"insert into persona (
						id_persona,
						nombre_persona,
						apellido_persona,
						dni_persona,
						fecha_nacimiento,
						sexo_persona,
						nacionalidad_persona,
						rela_provincia,
					    rela_localidad,
					    fecha_alta) 
					 values (
						'$_POST[id_persona]',
						'$_POST[nombre_persona]',
						'$_POST[apellido_persona]',
						'$_POST[dni_persona]',
						'$_POST[fecha_nacimiento]',
						'$_POST[sexo_persona]',
						'$_POST[nacionalidad_persona]',
						'$_POST[rela_provincia]',
						'$_POST[rela_localidad]',
						'$_POST[fecha_alta]'
						);") or die ("Problemas en el SQL1.");
					
					//Obtención del último id de la tabla entidad//
					$sql = "select max(id_persona) as ultimo_id from persona";
					$result = mysqli_query ($conexion,$sql) or die ("problemas en el sql2");
					while ($ultimo_id = mysqli_fetch_array ($result))	
					$rela_persona=$ultimo_id['ultimo_id'];
					
					
					//insertar en contactos//

					mysqli_query ($conexion,"insert into contactoxpersona (
					dato_contacto,
					rela_persona
					) 
					values (
					'$_POST[dato_contacto]',
					'$rela_persona');") or die ("Problemas en el SQL3.");
				
					
					//insertar en domicilio//					
					
					mysqli_query ($conexion,"insert into domicilio (
					calle,
					altura,
					barrio
					) 
					values (
					'$_POST[calle]',
					'$_POST[altura]',
					'$_POST[barrio]');") or die ("Problemas en el SQL4.");
				
					
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