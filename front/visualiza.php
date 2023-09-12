<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualiza Card</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Wiki Escolpi Informática</a>
    </div>
    <div>
        <button class='btn btn-success'><a href='index.php' class='link-light link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover'>Voltar</a></button>
    </div>
    
    </nav>
    
</br>
</br>
</br>
    <div class="container">
       <div class="row">
        <?php
            require ('../config.php');

            session_start();

            if (!isset($_SESSION['usuario_logado'])) {
                header("Location: ../index.php");
                exit;
        }
        
            $id = $_GET['id'];
        
            $sql = "SELECT * FROM tb_conhecimento WHERE id LIKE '%$id%' ";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                        echo "<div class='card'>";
                            echo "<div class='card-body'>";
                                echo "<h2 class='card-title'>" .$row['titulo'] . "</h2>";
                                echo"</br>";
                                echo "<h3 class='card-title'>" . $row["responsavel"] . "</h3>";
                                echo"</br>";
                                echo "<p class='card-text'>" . $row["descricao"] . "</p>";
                                echo"</br>";
                            echo"</div>";
                                echo"</br>";
                                echo "<img src='../Public/imagens/".$row["imagem"]."' alt='Imagem do conhecimento' style='width: 640px; height: 480px;' class='mx-auto d-block'>";
                                echo"</br>";
                                echo "<div style='display: flex; justify-content: space-between; padding-bottom:5px;'>";
                echo "<a href='atualiza.php?id=$row[id]' class='btn btn-success' style='width: 48%;'>Editar Registro</a>";
                echo "<button onclick=\"if(confirm('Tem certeza que quer excluir esse registro?')){location.href='../API/delete.php?id=".$row['id']."';}else{false;}\" class='btn btn-danger' style='width: 48%;'>Excluir</button>";
                echo "</div>";
                        echo "</div>";  
            }
        
        ?>
       </div>
    </div>
    
    <footer style='margin-top:15px; background-color:white; color:white'>FOoter</footer>
</body>
</html>