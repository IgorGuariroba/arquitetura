<?php


use igor\Arquitetura\CPF;
use PHPUnit\Framework\TestCase;

class CpfTest extends TestCase
{
    public function testCpfInvalido()
    {
        $this->expectException(\InvalidArgumentException::class);
        new CPF('1223424456');
    }

    public function testCpfValido()
    {
        $cpf = new CPF('730.768.550-77');
        $this->assertSame('730.768.550-77',(string)$cpf);
    }

}