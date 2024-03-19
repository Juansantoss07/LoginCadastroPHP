<?php
// Credenciais do banco de dados
$host = "ceu9lmqblp8t3q.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com";
$port = "5432";
$database = "d57sibo83s99hv";
$user = "uaaom582fhp077";
$password = "p5fa730e03ef7237f20cff8dccc9211fc058cddfb7af533a3b7cd20aaa70a3fa2";

// Conectar ao banco de dados
$conn = pg_connect("host=$host port=$port dbname=$database user=$user password=$password");

// Verificar conexão
if (!$conn) {
    die("Erro na conexão: " . pg_last_error());
}
error_log('Conexão com o banco realizada com sucesso!');
?>
