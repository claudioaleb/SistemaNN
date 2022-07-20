<?php 	

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "north_nutrition";

// conexion a la base de datos
$connect = new mysqli($localhost, $username, $password, $dbname);

if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {

}

?>