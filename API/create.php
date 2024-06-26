<?php

require "../Model/basecon.php";
require ("../config.php");

$fResponsavel = $_POST['responsavel'];
$fTitulo = $_POST['titulo'];
$fDescricao = nl2br($_POST['descricao']);
$fGrupo = $_POST['grupo'];
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $fImagem = uniqid() . "-" . $_FILES['imagem']['name'];
    $pasta = "../Public/imagens/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $fImagem);
} else {
    // Lida com o caso em que o upload de imagem falha
    $fImagem = $_POST['imagem'];
}

$basecon =  new BaseCon($fResponsavel, $fTitulo, $fDescricao, $fImagem, $fGrupo);

$sql = "INSERT INTO tb_conhecimento (responsavel, titulo, descricao, imagem, grupo) VALUES (?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssss", $basecon->getResponsavel(), $basecon->getTitulo(), $basecon->getDescricao(), $fImagem, $basecon->getGrupo());
$result = mysqli_stmt_execute($stmt);

if ($result) {
    header("Location: ../front/index.php");
} else {
    echo "Erro ao inserir dado:" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);