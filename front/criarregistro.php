<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Novo registro</title>
</head>
<body>
    <?php
        session_start();

        if (!isset($_SESSION['usuario_logado'])) {
            header("Location: ../index.php");
            exit;
        }
    ?>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Wiki Escolpi Informática</a>
            <div>
                <button class='btn btn-success'><a href='index.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Voltar</a></button>
            </div>
        </div>
    </nav>
    <div class="container">
        <div class="row">
            <h1>Listar novo erro</h1>
            <form action="../API/create.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                    <label> Título do erro </label>
                        <input type="text" name="titulo" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label> Responsável </label>
                        <input type="text" name="responsavel" class="form-control" value="<?php echo $_SESSION['usuario'];?>" required>
            
                </div>
                <div class="mb-3">
                    <label> Descrição do erro </label>
                    <class="input-group" name="descricao">
                    <textarea class="form-control" aria-label="With textarea" name='descricao'></textarea>

                </div>
                <div class="mb-3">
                    <label> Imagem do erro
                        <input type="file" name="imagem" class="form-control" required>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-dark">Enviar</button>
                    <button class='btn btn-danger'><a href='index.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Cancelar</a></button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>