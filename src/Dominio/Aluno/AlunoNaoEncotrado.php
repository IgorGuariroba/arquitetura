<?php
namespace igor\Arquitetura\Dominio\Aluno;

use igor\Arquitetura\Dominio\Cpf;

class AlunoNaoEncotrado extends \DomainException
{

    /**
     * AlunoNaoEncotrado constructor.
     * @param \igor\Arquitetura\Dominio\Cpf $cpf
     */
    public function __construct(Cpf $cpf)
    {
        parent::__construct("Aluno com CPF $cpf não encontrado");
    }
}