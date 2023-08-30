<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <title>Wiki Escolpi</title>
</head>
<body>

        <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Wiki Escolpi Informática</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02"> 
            <form class="d-flex" role="search" method="get" action="<?=$_SERVER['PHP_SELF']?>">

                <input class="form-control me-2" type="search" name="titulo" placeholder="Titulo" aria-label="Search">
            
                <input class="form-control me-2" type="search" name="responsavel" placeholder="Responsável" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
        <div>
        <button class='btn btn-success'><a href='criarregistro.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Criar Card</a></button>
        </div>
    </div>
    </nav>
<div class="container">
      <div class="row">
              
              <?php
                  require("../config.php");
              
                  $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
                  $responsavel = isset($_GET['responsavel']) ? $_GET['responsavel'] : '';

                  $titulo = strtolower($titulo); 
                  $responsavel = strtolower($responsavel);
              
                  $sql =  "SELECT * FROM tb_conhecimento WHERE LOWER(titulo) LIKE '%$titulo%' AND LOWER(responsavel) LIKE '%$responsavel%'";
                  $result = mysqli_query($conn, $sql);
              
                  
                  if (mysqli_num_rows($result) > 0) {
                echo "<div>";
                echo "<h2>Resultados da busca</h2>";
                echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th>#</th>";
                echo "<th>Título</th>";
                echo "<th>Responsável</th>";
                echo "<th>Ações</th>";
                echo "</tr>";
                echo "</div>";
              
                  while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['id']."</td>";
                echo "<td>".$row['titulo']."</td>";
                echo "<td>".$row['responsavel']."</td>";
                echo "<td><button class='btn btn-success'><a href='visualiza.php?id=$row[id]' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Visualizar</a></button><td>";
                echo "</tr>";
                  }
                  echo "</table>";
                  } else {
                  echo "<h2>Nenhum resultado encontrado</h2>";
                  }  
              ?>
      </div>
</div>
    
</body>
</html>