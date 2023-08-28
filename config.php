<?php

$server = "localhost"; 
$user = "root"; 
$password = ""; 
$database = "escolpi_basecon"; 
$conn = mysqli_connect($server, $user, $password, $database); 
if (!$conn) { 
  die("Erro ao conectar: " . mysqli_connect_error()); 
}
