<?php

require ("../config.php");

$sql = "SELECT * FROM tb_conhecimento";
$result = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($result)) {
    echo $row["responsavel"] . ", " . $row["titulo"] . ", " . $row["descricao"] . ", " . $row["imagem"] . "\n";
  }
  ?>
  