<?php

namespace Alura\Arquitetura\Dominio\Indicacao;

use igor\Arquitetura\Dominio\Aluno\Aluno;

class Indicacao
{
    protected Aluno $indicante;
    protected Aluno $indicado;
    protected \DateTimeImmutable $data;

    public function __construct(Aluno $indicante, Aluno $indicado)
    {
        $this->indicante = $indicante;
        $this->indicado = $indicado;

        $this->data = new \DateTimeImmutable();
    }
}
