<?php


namespace igor\Arquitetura\Dominio\Aluno\MatricularAluno;


use igor\Arquitetura\Dominio\Aluno\Aluno;
use igor\Arquitetura\Dominio\Aluno\AlunoRepository;

class MatricularAluno
{
    private AlunoRepository $repositorioDeAluno;

    public function __construct(AlunoRepository $repositorioDeAluno)
    {

        $this->repositorioDeAluno = $repositorioDeAluno;
    }

    public function executa(MatricularAlunoDto $dadoAluno):void
    {
        $aluno = Aluno::comCpfEmailNome($dadoAluno->cpfAluno,
            $dadoAluno->nomeAluno, $dadoAluno->emailAluno);

        $this->repositorioDeAluno->adicionar($aluno);

    }
}