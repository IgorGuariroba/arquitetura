<?php


namespace igor\Arquitetura\Dominio\Indicacao;


use igor\Arquitetura\Dominio\Aluno\CifradorDeSenha;

class CifradorDeSenhaMd5 implements CifradorDeSenha
{

    public function cifrar(string $senha): string
{
    return md5($senha);
}

    public function verificar(string $senhaEmTexto, string $senhaCifrada): bool
    {
        return md5($senhaEmTexto) === $senhaCifrada;
    }
}

