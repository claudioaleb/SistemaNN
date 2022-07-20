<?php session_start();

require 'admin/config.php';
require 'functions.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = limpiarDatos($_POST['usuario']);
    $password = limpiarDatos($_POST['password']);
    $rol = $_POST['rol'];

    $errores = '';

    // validar los campos de texto
    if (empty($usuario) || empty($password) || empty($rol)) {
        $errores .= '<p class="error">Por favor rellene todos los campos</p>';
    }else{
        // validacion de que el usuario no exista
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('SELECT * FROM usuarios WHERE usuario = :usuario LIMIT 1');
        $statement->execute([
            ':usuario' => $usuario
        ]);
        $resultado = $statement->fetch();

        if ($resultado != false) {
            $errores .= '<p class="error">Este usuario ya existe</p>';
        }
    }

    if($errores == ''){
        $conexion = conexion($bd_config);
        $statement = $conexion->prepare('INSERT INTO usuarios (id, usuario, password, tipo_usuario, fecha_alta_usuario) VALUES(null, :usuario, :password, :tipo_usuario, curdate() )');
        $statement->execute([
            ':usuario' => $usuario,
            ':password' => $password,
            ':tipo_usuario' => $rol
        ]);

        header('Location: '.RUTA.'login.php');

    }
}

require 'vistas/registro.view.php';

?>
