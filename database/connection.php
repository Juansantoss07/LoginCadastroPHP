<?php
// Credenciais do banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$database = "LoginCadastroPHP";

// Conectar ao banco de dados
$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
echo "Conexão bem-sucedida!";
?>


