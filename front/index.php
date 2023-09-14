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

                <input class="form-control me-2" type="search" name="descricao" placeholder="Descrição" aria-label="Search">
                
                <input class="form-control me-2" type="search" name="grupo" placeholder="Grupo" aria-label="Search">
            
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
            session_start();

            if (!isset($_SESSION['usuario_logado'])) {
                header("Location: ../index.php");
                exit;
            }

            $registrosPorPagina = 30; 
            $paginaAtual = isset($_GET['pagina']) ? $_GET['pagina'] : 1; 

            $titulo = isset($_GET['titulo']) ? $_GET['titulo'] : '';
            $responsavel = isset($_GET['responsavel']) ? $_GET['responsavel'] : '';
            $descricao = isset($_GET['descricao']) ? $_GET['descricao'] : '';
            $grupo = isset($_GET['grupo']) ? $_GET['grupo'] : '';


            $titulo = strtolower($titulo);
            $responsavel = strtolower($responsavel);
            $descricao = strtolower($descricao);

            
            $offset = ($paginaAtual - 1) * $registrosPorPagina;

            $sql = "SELECT * FROM tb_conhecimento WHERE LOWER(titulo) LIKE '%$titulo%' AND LOWER(responsavel) LIKE '%$responsavel%' AND LOWER(descricao) LIKE '%$descricao%'";
            
            if (!empty($grupo)) {
                $sql .= " AND LOWER(grupo) LIKE '%$grupo%'";
            }

            $sql .= "LIMIT $registrosPorPagina OFFSET $offset";
            
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {

                print "<table class='table table-hover mt-5 '>";
                    print "<tr>";
                    print "<th>ID</td>";
                    print "<th>Titulo</td>";
                    print "<th>Responsável</td>";
                    print "<th>Grupo</td>";
                    print "<th>Ações</th>";
                    print"</tr>";
                            
              
                  while ($row = mysqli_fetch_assoc($result)) {

                    print"<tr>";
                    print "<td>".$row['id']."</td>";
                    print "<td>".$row['titulo']."</td>";
                    print "<td><span class='badge text-bg-primary'>".$row['responsavel']."</span></td>";
                    print "<td><span class='badge text-bg-warning'>". $row['grupo']."</span></td>";
                    print "<td><button class='btn btn-success'><a href='visualiza.php?id=".$row['id']."' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Visualizar</a></button></td>";
                    print"<td>";
                    print"</tr>";
                
                  }
                  echo "</table>";

                $totalRegistros = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tb_conhecimento WHERE LOWER(titulo) LIKE '%$titulo%' AND LOWER(responsavel) LIKE '%$responsavel%' AND LOWER(descricao) LIKE '%$descricao%'"));
                $totalPaginas = ceil($totalRegistros / $registrosPorPagina);

                echo "<nav aria-label='Page navigation'>";
                echo "<ul class='pagination text-center'>";
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo "<li class='page-item " . ($paginaAtual == $i ? 'active' : '') . "'><a class='page-link' href='?pagina=$i&titulo=$titulo&responsavel=$responsavel&descricao=$descricao'>$i</a></li>";
                }
                echo "</ul>";
                echo "</nav>";
            } else {
                echo "<h2>Nenhum resultado encontrado</h2>";
            }
        ?>

      </div>
</div>    
</body>
</html>