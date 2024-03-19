<?php 

namespace LoginPhp\Model\Usuario;

class Email{

    private string $endereco;

    public function __construct(string $endereco)
    {
        $this->endereco =  $endereco;
        return $this->endereco;
    }

    public function __toString()
    {
        return $this->endereco;
    }
}