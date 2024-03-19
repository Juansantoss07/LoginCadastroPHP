<?php

namespace LoginPhp\Model\Usuario;

use InvalidArgumentException;

require_once "Telefone.php";
require_once "Email.php";
require_once "Senha.php";

class Usuario
{

    private string $nome;
    private string $sobrenome;
    private Telefone $telefone;
    private string $aniversario;
    private Email $email;
    private Senha $senha;

    public function __construct(string $nome, string $sobrenome, string $telefone, string $aniversario, string $email, string $senha)
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->telefone = new Telefone($telefone);
        $this->aniversario = $aniversario;
        $this->email = new Email($email);
        $this->senha = new Senha($senha);

        $this->salvarNoBanco();
    }

    private function salvarNoBanco()
    {
        require_once '../../database/connection.php';
    
        // Verificar se o email já existe no banco de dados
        $sql_verificar_email = "SELECT * FROM usuarios WHERE email = ?";
        $stmt_verificar_email = $conn->prepare($sql_verificar_email);
        $stmt_verificar_email->bind_param("s", $this->getEmail());
        $stmt_verificar_email->execute();
        $result_verificar_email = $stmt_verificar_email->get_result();
    
        try{
            if ($result_verificar_email->num_rows > 0) {
                // Email já existe no banco de dados, lançar uma exceção
                throw new InvalidArgumentException('Esse email já existe no nosso banco de dados');
            }
        
            // Preparar a consulta SQL para inserir o novo usuário
            $sql_inserir_usuario = "INSERT INTO usuarios (nome, sobrenome, telefone, email, senha) VALUES (?, ?, ?, ?, ?)";
            $stmt_inserir_usuario = $conn->prepare($sql_inserir_usuario);
        
            // Verificar se a preparação da consulta foi bem-sucedida
            if ($stmt_inserir_usuario) {
                // Vincular os parâmetros e executar a consulta
                $stmt_inserir_usuario->bind_param("sssss", $this->getNome(), $this->getSobrenome(), $this->getTelefone(), $this->getEmail(), $this->getSenha());
                if ($stmt_inserir_usuario->execute()) {
                    echo "Usuário cadastrado com sucesso!";
                } else {
                    echo "Erro ao cadastrar usuário: " . $stmt_inserir_usuario->error;
                }
                // Fechar a declaração preparada
                $stmt_inserir_usuario->close();
            } else {
                echo "Erro na preparação da consulta: " . $conn->error;
            }
        
            // Fechar a conexão com o banco de dados
            $conn->close();
        } catch(InvalidArgumentException $e){
            header('Location: ../../view/cadastro.php?errorEmail=' . urlencode($e->getMessage()));
            exit();
        }

    }
    

    private function getNome():string
    {
        return $this->nome;
    }

    private function getSobrenome():string
    {
        return $this->sobrenome;
    }

    private function getTelefone():string
    {
        return $this->telefone;
    }

    private function getEmail():string
    {
        return $this->email;
    }

    private function getSenha():string
    {
        return $this->senha;
    }
}
