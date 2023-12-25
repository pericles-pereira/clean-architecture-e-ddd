<?php

namespace Alura\Arquitetura\Testes\Academico\Dominio\Aluno;

use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Email;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;

class AlunoTest extends TestCase
{
    private Aluno $aluno;

    protected function setUp(): void
    {
        $this->aluno = new Aluno(
            $this->createStub(Cpf::class),
            '',
            $this->createStub(Email::class)
        );
    }

    public function testMaisDe2TelefonesDeveLancarExcecao()
    {
        $this->expectException(\DomainException::class);
        
        $this->aluno->adicionarTelefone('11', '12345678')
            ->adicionarTelefone('22', '987654321')
            ->adicionarTelefone('33', '987654561');

        $this->assertCount(2, $this->aluno->telefones());
    }

    public function testAdicionar1TelefoneDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('24', '12345678');

        $this->assertCount(1, $this->aluno->telefones());
    }

    public function testAdicionar2TelefonesDeveFuncionar()
    {
        $this->aluno->adicionarTelefone('24', '12345678')
            ->adicionarTelefone('11', '12787933');

        $this->assertCount(2, $this->aluno->telefones());
    }
}
