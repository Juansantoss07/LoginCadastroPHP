<?php 

namespace LoginPhp\Model\Usuario;

require_once "Telefone.php";
require_once "Email.php";
require_once "Senha.php";

class Usuario{

    private string $nome;
    private string $sobrenome;
    private Telefone $telefone;
    private string $aniversario;
    private Email $email;
    private Senha $senha;

    public function __construct(string $nome, string $sobrenome, string $telefone, string $aniversario, string $email, string $senha )
    {
        $this->nome = $nome;
        $this->sobrenome = $sobrenome;
        $this->telefone = new Telefone($telefone);
        $this->aniversario = $aniversario;
        $this->email = new Email($email);
        $this->senha = new Senha($senha);
    }
}