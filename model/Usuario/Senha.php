<?php 

namespace LoginPhp\Model\Usuario;

use InvalidArgumentException;

class Senha{

    private string $senha;

    public function __construct(string $senha)
    {
        $senhaProtegida = password_hash($senha, PASSWORD_ARGON2ID);

        if(password_verify($senha, $senhaProtegida) === false){
            throw new InvalidArgumentException('Senha não protegida');
        }

        $this->senha = $senhaProtegida;
        return $this->senha;
    }
}