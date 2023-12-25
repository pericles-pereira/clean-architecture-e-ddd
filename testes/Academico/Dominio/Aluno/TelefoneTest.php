<?php

namespace Alura\Arquitetura\Testes\Aplicacao\Dominio\Aluno;

use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Academico\Dominio\Aluno\Telefone;

class TelefoneTest extends TestCase
{
    public function testTelefoneDevePoderSerRepresentadoComoString()
    {
        $telefone = new Telefone('24', '123456789');
        $this->assertSame('(24) 123456789', (string) $telefone);
    }

    public function testDddInvalidoNaoDeveSerAceito()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Telefone('ddd', '12345678');
    }

    public function testNumeroInvalidoNaoDeveSerAceito()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Telefone('11', '123d4567');
    }
}
