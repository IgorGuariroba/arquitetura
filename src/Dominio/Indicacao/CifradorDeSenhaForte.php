<?php


namespace igor\Arquitetura\Dominio\Indicacao;


use igor\Arquitetura\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaForte implements CifradorDeSenha
{

    public function cifrar(string $senha): string
    {
        return password_hash($senha, algo: PASSWORD_ARGON2ID);
    }

    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool
    {
        return password_verify($senhaEmTexto, $senhaCifrada);
    }
}