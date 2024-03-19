<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="src\css\style.css">
    <title>Login</title>
</head>

<body>
    <main>
        <div class="container-login">
            <form action="../model/Usuario/FabricaUsuario.php" method="post">
                <label for="nome">Nome:</label>
                <input type="text" name="nome" id="" required>
                <label for="sobrenome">Sobrenome:</label>
                <input type="text" name="sobrenome" id="" required>
                <label for="telefone">Telefone:</label>
                <input type="text" name="telefone" id="" required>
                <?php
                if (isset($_GET['errorTelefone'])) {
                    echo "<p style='color: red; font-size:13px;'> " . htmlspecialchars($_GET['errorTelefone']) . "</p>";
                }
                ?>
                <label for="aniversario">Data de nascimento:</label>
                <input type="date" name="aniversario" id="">
                <label for="email">E-mail:</label>
                <input type="email" name="email" id="" required>
                <?php
                if (isset($_GET['errorEmail'])) {
                    echo "<p style='color: red; font-size:13px;'> " . htmlspecialchars($_GET['errorEmail']) . "</p>";
                }
                ?>
                <label for="senha">Senha:</label>
                <input type="password" name="senha" id="" required>

                <input type="submit" value="Cadastrar">
            </form>
            <div class="links">
                <a href="../index.php">Já tenho conta</a>
            </div>
        </div>
    </main>
</body>

</html>