<?php 

namespace LoginPhp\Controller\Usuario;

use InvalidArgumentException;

class DestroiSessao{

    public function __construct()
    {
        $this->deslogar();
    }

    private function deslogar()
    {
        session_start();
        $_SESSION['logado'] = array();    
        session_destroy();
        header('Location: ../../index.php');
    }
}

$destroiSessao = new DestroiSessao();