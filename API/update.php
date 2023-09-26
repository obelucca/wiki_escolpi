<?php
require "../Model/basecon.php";
require ("../config.php");

$id = $_POST['id'];

if (!is_numeric($id)) {
    die("ID inválido.");
}
        
$sql = "SELECT * FROM tb_conhecimento WHERE id = $id ";

$result = mysqli_query($conn, $sql);
if (!$result) {
    die("Erro na consulta: " . mysqli_error($conn));
}

$row = mysqli_fetch_assoc($result);

$fResponsavel =  $_POST['responsavel'];
$fTitulo = $_POST['titulo'];
$fDescricao = nl2br($_POST['descricao']);
 
if(isset($_POST['grupo'])){
    $fGrupo = $_POST['grupo'];
} else {
    $fGrupo = $row['grupo'];
}

// Definir o nome do arquivo com um identificador único
if (isset($_FILES['imagem']) && $_FILES['imagem']['error'] === UPLOAD_ERR_OK) {
    $fImagem = uniqid() . "-" . $_FILES['imagem']['name'];
    $pasta = "../Public/imagens/";
    move_uploaded_file($_FILES['imagem']['tmp_name'], $pasta . $fImagem);
} else {
    // Lida com o caso em que o upload de imagem falha
    $fImagem = $row['imagem'];
}

$basecon =  new BaseCon($fResponsavel, $fTitulo, $fDescricao, $fImagem, $fGrupo);

$sql = "UPDATE tb_conhecimento SET responsavel = ?, titulo = ?, descricao = ?, imagem = ?, grupo = ? WHERE id = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "sssssi", $basecon->getResponsavel(), $basecon->getTitulo(), $basecon->getDescricao(),$basecon->getImagem(), $basecon->getGrupo(), $id);
$result = mysqli_stmt_execute($stmt);

if ($result) {
    header("Location: ../front/index.php");
} else {
    echo "Erro ao atualizar dado: " . mysqli_error($conn);
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>





