<?php


namespace igor\Arquitetura\Infra;


use igor\Arquitetura\Dominio\Aluno\Aluno;
use igor\Arquitetura\Dominio\Aluno\AlunoRepository;
use igor\Arquitetura\Dominio\Cpf;

class RepositorioDeAlunoEmMemoria implements AlunoRepository
{

    public function adicionar(Aluno $aluno): void
    {
        // TODO: Implement adicionar() method.
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        // TODO: Implement buscarPorCpf() method.
    }

    public function buscarTodos(): array
    {
        // TODO: Implement buscarTodos() method.
    }
}