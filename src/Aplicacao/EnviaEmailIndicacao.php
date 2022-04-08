<?php


namespace igor\Arquitetura\Aplicacao;


use igor\Arquitetura\Dominio\Aluno\Aluno;

interface  EnviaEmailIndicacao
{
    public function enviaPara(Aluno $alunoIndicado):void;
}