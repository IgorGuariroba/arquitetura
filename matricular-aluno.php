<?php


use igor\Arquitetura\Dominio\Aluno\Aluno;

require 'vendor/autoload.php';


$cpf = $argv[1];
$nome = $argv[2];
$email = $argv[3];
$ddd = $argv[4];
$numero = $argv[5];



$aluno = Aluno::comCpfEmailNome(
    $cpf,
    $nome,
    $email
);


$aluno->adicionarTelefone($ddd,$numero);