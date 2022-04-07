<?php


namespace igor\Arquitetura\Dominio\Aluno;


use igor\Arquitetura\Dominio\Cpf;

interface AlunoRepository
{
    public function adicionar(Aluno $aluno): void;

    public function buscarPorCpf(Cpf $cpf): Aluno;

    public function buscarTodos():array;
}