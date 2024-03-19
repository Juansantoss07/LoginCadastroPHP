<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="view\src\css\style.css">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="container-login">
            <form action="controller/Usuario/AutenticarUsuario.php" method="post">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="" required>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="" required>
                <?php
                if (isset($_GET['errorDados'])) {
                    echo "<p for='senha' style='color: red; font-size:13px;'> " . htmlspecialchars($_GET['errorDados']) . "</p>";
                } 
                ?>
                <input type="submit" value="Entrar">
            </form>
            <div class="links">
                <a href="#">Esqueci minha senha</a>
                <a href="view/cadastro.php">Cadastre-se</a>
            </div>
        </div>
    </main>
</body>

</html>