<?php

namespace LoginPhp\Controller\Usuario;

use InvalidArgumentException;

class AutenticarUsuario
{

    public function __construct()
    {
        $this->logar();
    }

    private function logar()
    {
        $email = $_POST['email'];
        $senha = $_POST['senha'];
    
        try {
            require_once '../../database/connection.php';
    
            $sql = "SELECT * FROM usuarios WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
    
            // Verificar se o email foi encontrado no banco de dados
            if ($result->num_rows == 1) {
                // Extrair os dados do usuário
                $usuario = $result->fetch_assoc();
    
                // Verificar se a senha está correta
                if (password_verify($senha, $usuario['senha'])) {
                    // Autenticar o usuário
                    session_start();
                    $_SESSION['logado'] = true;
                    $_SESSION['email'] = $email;
                    header('Location: ../../view/home.php');
                    exit();
                } else {
                    throw new InvalidArgumentException('Email ou senha inválidos');
                }
            } else {
                throw new InvalidArgumentException('Email ou senha inválidos');
            }
        } catch (InvalidArgumentException $e) {
            header('Location: ../../index.php?errorDados=' . urlencode($e->getMessage()));
            exit();
        } finally {
            // Fechar a conexão com o banco de dados
            $stmt->close();
            $conn->close();
        }
    }
}

$autenticar = new AutenticarUsuario();
