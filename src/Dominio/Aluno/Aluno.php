<?php


namespace igor\Arquitetura\Dominio\Aluno;


use igor\Arquitetura\Dominio\Cpf;
use igor\Arquitetura\Dominio\Email;

class Aluno
{
    private string $nome;
    private Cpf $cpf;
    private Email $email;
    private array $telefones;


    /**
     * @throws \Exception
     */
    public static function comCpfEmailNome(string $numeroCpf, string $email, string $nome): self
    {
        return new Aluno(new CPF($numeroCpf), $nome, new Email($email));
    }

    public function __construct(Cpf $cpf, string $nome, Email $email)
    {
        $this->cpf = $cpf;
        $this->nome = $nome;
        $this->email = $email;
        $this->nome = $nome;
    }

    public function adicionarTelefone(string $ddd, string $numero)
    {
        $this->telefones[] = new Telefone($ddd, $numero);
        return $this;
    }

    public function cpf(): string
    {
        return $this->cpf();
    }

    public function nome(): string
    {
        return $this->nome;
    }

    public function email(): string
    {
        return $this->email;
    }

    /** @return  Telefone[] */
    public function telefones():array
    {
        return $this->telefones;
    }
}