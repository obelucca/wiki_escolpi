<?php

require ("../config.php");

$id = 2;

$sql = "DELETE FROM tb_conhecimento WHERE id = $id;"; 
$result = mysqli_query($conn, $sql);

if ($result) {
    echo "Registro deletado com sucesso!";
  } else {
    echo "Erro ao deletar registro: " . mysqli_error($conn);
  }

