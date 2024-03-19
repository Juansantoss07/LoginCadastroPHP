<?php

use LoginPhp\Controller\Usuario\GetDadosUsuarioNoBanco;
require_once "../controller/Usuario/GetDadosUsuarioNoBanco.php";
session_start();

$dadosUsuario = new GetDadosUsuarioNoBanco();
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
        <h1>VOCÊ ESTÁ LOGADO</h1>
        <h2>Olá, <?php echo  $dadosUsuario->getNome(); ?></h2>
        <h2>Seu e-mail: <?php echo  $dadosUsuario->getEmail(); ?></h2>
        <h2>Seu telefone: <?php echo  $dadosUsuario->getTelefone(); ?></h2>
        <form action="/controller/Usuario/DestroiSessao.php" method="post">
            <button type="submit">Logout</button>
        </form>
    </main>
</body>

</html>