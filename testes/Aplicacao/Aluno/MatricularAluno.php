<?php


namespace igor\Arquitetura\Testes\Aplicacao\Aluno;


use igor\Arquitetura\Dominio\Aluno\MatricularAluno\MatricularAlunoDto;
use igor\Arquitetura\Dominio\Cpf;
use igor\Arquitetura\Infra\RepositorioDeAlunoEmMemoria;
use PHPUnit\Framework\TestCase;

class MatricularAluno extends  TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDto(
            '123.456.789-10',
            'Teste',
            'email@example.com'
        );
        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAluno($repositorioDeAluno);

        $useCase->executa($dadosAluno);

        $aluno = $repositorioDeAluno->buscarPorCpf(new Cpf('123.456.789-10'));
        $this->assertSame('Teste',(string) $aluno->nome());
        $this->assertSame('email@example.com',(string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }

}