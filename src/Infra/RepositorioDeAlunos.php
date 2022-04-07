<?php


use igor\Arquitetura\Dominio\Aluno\Aluno;
use igor\Arquitetura\Dominio\Aluno\AlunoNaoEncotrado;
use igor\Arquitetura\Dominio\Aluno\AlunoRepository;
use igor\Arquitetura\Dominio\Aluno\Telefone;
use igor\Arquitetura\Dominio\Cpf;

class RepositorioDeAlunos implements AlunoRepository
{

    /** @var \PDO */
    private PDO $conexao;

    public function __construct(PDO $conexao)
    {
        $this->conexao = $conexao;
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $sql = '
        SELECT al.cpf, al.nome, al.email, al.ddd, al.numero as numero_telefone
        FROM alunos al
        LEFT JOIN telefones tef ON tef.cpf_aluno = al.cpf
        WHERE al.cpf = :cpf;';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf',(string)$cpf);
        $stmt->execute();

        $dadosAluno = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        if(empty($dadosAluno)){
            throw new AlunoNaoEncotrado($cpf);
        }
        
        return $this->mapearAluno($dadosAluno);
    }

    public function buscarTodos(): array
    {
        $sql = '
        SELECT al.cpf, al.nome, al.email, al.ddd, al.numero as numero_telefone
        FROM alunos al
        LEFT JOIN telefones tef ON tef.cpf_aluno = al.cpf';
        $stmt = $this->conexao->query($sql);
        $listaDadosAlunos = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        $alunos = [];

        foreach ($listaDadosAlunos as $dadosAluno){
            if(!array_key_exists($dadosAluno['cpf'], $alunos)){
                $alunos[$dadosAluno['cpf']] = $this->mapearAluno($dadosAluno);
            }
        }

        return array_values($alunos);
    }

    public function adicionar(Aluno $aluno): void
    {
        $sql = 'INSERT INTO alunos VALUES (:cpf,:nome,:email);';
        $stmt = $this->conexao->prepare($sql);
        $stmt->bindValue('cpf',$aluno->cpf());
        $stmt->bindValue('nome',$aluno->nome());
        $stmt->bindValue('email',$aluno->email());
        $stmt->execute();

        $sql = 'INSERT INTO telefones VALUES (:ddd,:numero,:cpf_aluno)';
        $this->conexao->prepare($sql);
        $stmt->bindValue('cpf_aluno',$aluno->cpf());

        /** @var Telefone $telefone */
        foreach ($aluno->telefones() as $telefone){
            $stmt = $this->conexao->prepare($sql);
            $stmt->bindValue('ddd',$telefone->ddd());
            $stmt->bindValue('numero',$telefone->numero());
            $stmt->execute();
        }

    }

    private function mapearAluno(array $dadosAluno): Aluno
    {
        $primeiraLinha = $dadosAluno[0];
        $aluno = Aluno::comCpfEmailNome(
            $primeiraLinha['cpf'],
            $primeiraLinha['email'],
            $primeiraLinha['nome']
        );


        $telefones = array_filter(
            $dadosAluno,fn ($linha) => $linha['ddd'] !== null && $linha['numero_telefone'] !== null
        );
        foreach ($telefones as $linha){
            $aluno->adicionarTelefone($linha['ddd'], $linha['numero_telefone']);
        }

        return $aluno;
    }

}