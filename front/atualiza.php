<?php

    require('../config.php');

    
        session_start();

        if (!isset($_SESSION['usuario_logado'])) {
            header("Location: ../index.php");
            exit;
        }


    $id = $_GET['id'];
        
    $sql = "SELECT * FROM tb_conhecimento WHERE id = $id ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    
    ?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Editar Registro</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Wiki Escolpi Informática</a>
            <div>
                <button class='btn btn-success'><a href="visualiza.php?id=<?php echo $id ?>" class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Voltar</a></button>
            </div>
        </div>
    </nav>
    
    <div class="container">
    <div class="row">
        <h1>Editar Registro</h1>
        <form action="../API/update.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label> Título do erro </label>
                <input type="text" name="titulo" class="form-control" value="<?php echo $row['titulo'] ?>" required>
            </div>
            <div class="mb-3">
                <label> Responsável </label>
                <input type="text" name="responsavel" class="form-control" value="<?php echo $row['responsavel'] ?>" required>
            </div>
            <div class="mb-3">
                    <label> Descrição do erro </label>
                    <class="input-group" name="descricao">
                    <textarea class="form-control" aria-label="With textarea" name='descricao' value="<?php echo $row['descricao'] ?>" > <?php echo $row['descricao'] ?> </textarea>

                </div>
                
            <div class="mb-3">
                <label> Imagem do erro </label>
    
                <input type="file" name="imagem" class="form-control" value="<?php echo $row['imagem'] ?>">
            </div>
            <div class="mb-3">
                <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <input type="submit" value="Atualizar" class="btn btn-success">
                <button class='btn btn-danger'><a href="visualiza.php?id=<?php echo $id ?>" class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Cancelar</a></button>
            </div>
        </form>
    </div>
</div>


</body>
</html>