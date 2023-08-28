<?php
require "../Model/basecon.php";
require ("../config.php");

$fResponsavel = $_POST['responsavel'];
$fTitulo = $_POST['titulo'];
$fDescricao = $_POST['descricao'];
$fImagem = $_POST['imagem'];

$basecon =  new BaseCon($fResponsavel, $fTitulo, $fDescricao, $fImagem);


$sql = "UPDATE INTO tb_conhecimento (responsavel, titulo, descricao, imagem) VALUES ('" . mysqli_real_escape_string($conn, $basecon->getResponsavel()) . "', '" . mysqli_real_escape_string($conn, $basecon->getTitulo()) . "', '" . mysqli_real_escape_string($conn, $basecon->getDescricao()) . "', '" . mysqli_real_escape_string($conn, $basecon->getImagem()) . "');"; 

$result = mysqli_query($conn, $sql);

if($result){
    echo "Dados inseridos com sucesso!";
} else {
    echo "Erro ao inserir dado:" . mysqli_error($conn);
}

mysqli_close($conn);