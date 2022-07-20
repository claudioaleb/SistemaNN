<?php 	

$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "north_nutrition";


$connect = new mysqli($localhost, $username, $password, $dbname);
$connect->set_charset('utf8_decode');

if($connect->connect_error) {
  die("Connection Failed : " . $connect->connect_error);
} else {

}

?>