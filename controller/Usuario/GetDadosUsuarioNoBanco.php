<?php

namespace LoginPhp\Controller\Usuario;

use InvalidArgumentException;

class GetDadosUsuarioNoBanco {

    private string $nomeUsuario;
    private string $emailUsuario;
    private string $telefoneUsuario;

    private $conn;

    public function __construct() {
        require_once __DIR__ . '/../../database/connection.php';
        $this->conn = $conn;
    }

    public function getNome(): string {
        $this->nomeUsuario = $this->buscarDadoNoBanco("nome");
        return $this->nomeUsuario;
    }

    public function getEmail(): string {
        $this->emailUsuario = $this->buscarDadoNoBanco("email");
        return $this->emailUsuario;
    }

    public function getTelefone(): string {
        $this->telefoneUsuario = $this->buscarDadoNoBanco("telefone");
        return $this->telefoneUsuario;
    }

    private function buscarDadoNoBanco(string $campo): string {
        try {
            if(session_status() === false){
                throw new InvalidArgumentException('Sessão false');
            }

            if(isset($_SESSION['logado']) && $_SESSION['logado'] === true){
                $email = $_SESSION['email'];

                $sql = "SELECT $campo FROM usuarios WHERE email = ?";
                $stmt = $this->conn->prepare($sql);
                $stmt->bind_param("s", $email);
                $stmt->execute();
                $result = $stmt->get_result();
                if ($result->num_rows == 1) {
                    $usuario = $result->fetch_assoc();
                    return $usuario[$campo];
                }
            } else {
                throw new InvalidArgumentException('Usuário não está logado');
            }
        } catch (InvalidArgumentException $e) {
            // Trate a exceção conforme necessário
            echo 'Erro: ' . $e->getMessage();
        }
        return ""; // Retorna uma string vazia se não houver um usuário logado ou se o campo não for encontrado
    } 
}
