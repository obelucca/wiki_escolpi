<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wiki Escolpi</title>
</head>
<body>
    <form action="../API/create.php" method="post">
        <h2>Quem é o responsável:</h2>
        <input type="text" name="responsavel">
        <h2>Qual é o titulo:</h2>
        <input type="text" name="titulo">
        <h2>Qual é o descriçao:</h2>
        <input type="text" name="descricao">
        <h2>Imagem do erro</h2>
        <input type="file" name="imagem">

        <button type="submit">Enviar</button>
    </form>
</body>
</html>