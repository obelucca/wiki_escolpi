<?php

require ("../config.php");

$id = $_GET['id'];

$sql = "DELETE FROM tb_conhecimento WHERE id = $id;"; 
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: ../front/index.php");
  } else {
    echo "Erro ao deletar registro: " . mysqli_error($conn);
  };

