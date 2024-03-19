<?php
session_start();

if ($_SESSION['logado'] !== true) {
    header('Location: ../index.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>

<body>
    <main>
        <h1>VOCÊ ESTÁ LOGADAO</h1>
        <h2>Olá, <?php echo $_SESSION['nome_usuario']?></h2>
        <form action="/controller/Usuario/DestroiSessao.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </main>
</body>

</html>