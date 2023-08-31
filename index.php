<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN WIKI ESCOLPI</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" class="d-none">
  <symbol id="check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </symbol>
  <symbol id="info-fill" viewBox="0 0 16 16">
    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
  </symbol>
  <symbol id="exclamation-triangle-fill" viewBox="0 0 16 16">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </symbol>
</svg>

<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require('./API/login/config_db_login.php');

        $user = isset($_POST['usuario']) ? $_POST['usuario'] : '';
        $senha = isset($_POST['senha']) ? $_POST['senha'] : '';

        $sql = "SELECT usuario, senha FROM login WHERE usuario = '$user' AND senha = '$senha'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            header("Location: front/index.php");
        } else {
            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                  <strong>Você não pode acessar</strong>!</strong> Senha ou usuário incorretos
                  <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                  </div>";
        }
    }
    ?>
        <div class="container mt-5">
            <div class="row justify-content-center align-items-cente">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Login - Wiki Escolpi Informática</h5>
                            <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
                                <div class="form-group mt-5">
                                    <label for="username">Usuário</label>
                                    <input type="text" class="form-control" id="username" name="usuario" placeholder="Insira seu usuário">
                                </div>
                                <div class="form-group mt-3">
                                    <label for="password">Senha</label>
                                    <input type="password" class="form-control" id="password" name="senha" placeholder="Insira sua senha">
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success btn-lg mt-5 ">Logar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>

