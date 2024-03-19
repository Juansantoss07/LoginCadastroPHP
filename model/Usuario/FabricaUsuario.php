<?php 

namespace LoginPhp\Model\Usuario;

require_once 'Usuario.php';

class FabricaUsuario{

    public function __construct(string $nome, string $sobrenome, string $telefone, string $aniversario, string $email, string $senha)
    {
        $novoUsuario = new Usuario(
            $nome, 
            $sobrenome,
            $telefone,
            $aniversario,
            $email,
            $senha
        );

        
        session_start();
        $_SESSION['logado'] = true;
        $_SESSION['nome_usuario'] = $nome;
        header('Location: ../../view/home.php');
        exit();
    }
}

$fabricaUsuario = new FabricaUsuario(
    $_POST['nome'],
    $_POST['sobrenome'],
    $_POST['telefone'],
    $_POST['aniversario'],
    $_POST['email'],
    $_POST['senha']
);