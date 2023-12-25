<?php

namespace Alura\Arquitetura\Academico\Infra\Aluno;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoNaoEncontrado;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;

class RepositorioDeAlunoEmMemoria implements RepositorioDeAluno
{
    private array $alunos = [];

    public function adicionar(Aluno $aluno): void
    {
        $this->alunos[] = $aluno;
    }

    public function buscarPorCpf(Cpf $cpf): Aluno
    {
        $alunosFiltrados = array_filter($this->alunos, fn (Aluno $aluno) => $aluno->cpf() == (string) $cpf);

        if (count($alunosFiltrados) === 0) {
            throw new AlunoNaoEncontrado($cpf);
        }

        if (count($alunosFiltrados) > 1) {
            throw new \Exception();
        }

        return $alunosFiltrados[0];
    }

    public function buscarTodos(): array
    {
        return $this->alunos;
    }
}
