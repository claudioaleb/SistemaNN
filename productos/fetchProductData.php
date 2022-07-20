<?php 	

require_once 'db_connect.php';

$sql = "SELECT id_producto, nombre_producto, cantidad, precio_venta FROM productos";
$result = $connect->query($sql);

$data = $result->fetch_all();

$connect->close();

echo json_encode($data);