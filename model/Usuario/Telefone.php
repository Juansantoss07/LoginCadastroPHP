<?php 

namespace LoginPhp\Model\Usuario;

use InvalidArgumentException;

class Telefone{

    private string $numero;

    public function __construct(string $numero)
    {
        $regex = "/\(\d{2}\)\d{5}\-\d{4}/";

        try{
            if(preg_match($regex, $numero) === false){
                throw new InvalidArgumentException('Telefone inválido');
             }

             $this->numero = $numero;

             return $this->numero;
        } catch(InvalidArgumentException $e){
            header('Location: ../../view/cadastro.php?errorTelefone=' . urlencode($e->getMessage()));
            exit();
        }
    }
}