<?php


namespace igor\Arquitetura;


use Alura\Arquitetura\Telefone;

class Aluno
{
    private string $nome;
    private CPF $cpf;
    private Email $email;

    private array $telefones;

    /**
     * @throws \Exception
     */
    public static function comCpfNomeEEmail(string $cpf, string $nome, string $email): self
    {
        return new Aluno(new Cpf($cpf), $nome, new Email($email));
    }

    public function __construct(Cpf $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
    }

    public function adicionarTelefone(string $ddd, string $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

}