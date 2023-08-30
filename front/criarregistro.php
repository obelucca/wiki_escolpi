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
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Wiki Escolpi Informática</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
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
                        <input type="text" name="responsavel" class="form-control" required>
            
                </div>
                <div class="mb-3">
                    <label> Descrição do erro </label>
                        <input type="text" name="descricao"
                        class="form-control" required>
            
                </div>
                <div class="mb-3">
                    <label> Imagem do erro
                        <input type="file" name="imagem" class="form-control" required>
                    </label>
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-dark">Enviar</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>