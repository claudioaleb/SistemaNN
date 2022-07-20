<?php session_start();

require 'admin/config.php';
require 'functions.php';

$errores = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $usuario = $_POST['usuario'];
  $password = $_POST['password'];
  
  $conexion = conexion($bd_config);
  $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password');
  $statement->execute([
    ':usuario' => $usuario,
    ':password' => $password
  ]);
  $resultado = $statement->fetch();

  if ($resultado !== false) {
    $_SESSION['usuario'] = $usuario;
    header('Location: '.RUTA.'validar_usuario.php');
  } else {
    $errores .= '<p class="error" style="color:white;">Tu usuario y/o contraseña son incorrectos</p>';
  }

}
require 'vistas/login.view.php';

 ?>
