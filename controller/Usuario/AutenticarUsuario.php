<?php 

namespace LoginPhp\Controller\Usuario;

use InvalidArgumentException;

class AutenticarUsuario{

    public function __construct()
    {
        $this->logar();        
    }

    private function logar(){
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        try{
            if($email !== 'juansantosscunha@gmail.com' || $senha !== '1qaz'){
                throw new InvalidArgumentException('Email ou senha inválidos');
            }

            session_start();
            $_SESSION['logado'] = true;
            header('Location: ../../view/home.php');
        } catch(InvalidArgumentException $e){
            header('Location: ../../index.php?errorDados=' . urlencode($e->getMessage()));
            exit();
        }
    }
}

$autenticar = new AutenticarUsuario();