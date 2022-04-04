<?php

namespace Alura\Arquitetura;

use igor\Arquitetura\Aluno;

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
