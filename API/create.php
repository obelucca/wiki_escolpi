<?php

require "../Model/basecon.php";
require ("../config.php");

$fResponsavel = $_POST['responsavel'];
$fTitulo = $_POST['titulo'];
$fDescricao = $_POST['descricao'];
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $fImagem = uniqid() . "-" . $_FILES['imagem']['name'];
    $pasta = "imagens/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $fImagem);
} else {
    // Lida com o caso em que o upload de imagem falha
    $fImagem = $_POST['imagem'];
}

$basecon =  new BaseCon($fResponsavel, $fTitulo, $fDescricao, $fImagem);

$sql = "INSERT INTO tb_conhecimento (responsavel, titulo, descricao, imagem) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ssss", $basecon->getResponsavel(), $basecon->getTitulo(), $basecon->getDescricao(), $fImagem);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    header("Location: ../front/index.php");
} else {
    echo "Erro ao inserir dado:" . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);