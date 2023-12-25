<?php

namespace Alura\Arquitetura\Testes\Academico\Aplicacao\Aluno;

use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Infra\Aluno\RepositorioDeAlunoEmMemoria;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento\PublicadorDeEvento;

class MatricularAlunoTest extends TestCase
{
    public function testAlunoDeveSerAdicionadoAoRepositorio()
    {
        $dadosAluno = new MatricularAlunoDto(
            '123.343.243-12',
            'Teste',
            'email@exemple.com',
        );

        $repositorioDeAluno = new RepositorioDeAlunoEmMemoria();
        $useCase = new MatricularAluno($repositorioDeAluno, new PublicadorDeEvento());
        $useCase->executa($dadosAluno);

        $aluno = $repositorioDeAluno->buscarPorCpf(new Cpf('123.343.243-12'));
        $this->assertSame('Teste', (string) $aluno->nome());
        $this->assertSame('email@exemple.com', (string) $aluno->email());
        $this->assertEmpty($aluno->telefones());
    }
}
