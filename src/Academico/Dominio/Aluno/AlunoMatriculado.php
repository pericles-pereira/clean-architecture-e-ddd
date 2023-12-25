<?php

namespace Alura\Arquitetura\Academico\Dominio\Aluno;

use Alura\Arquitetura\Shared\Dominio\Cpf;
use Alura\Arquitetura\Shared\Dominio\Evento\Evento;

class AlunoMatriculado implements Evento
{
    private \DateTimeImmutable $momento;

    public function __construct(private Cpf $cpfAluno)
    {
        $this->momento = new \DateTimeImmutable();
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpfAluno;
    }

    public function momento(): \DateTimeImmutable
    {
        return $this->momento;
    }

    public function jsonSerialize(): array
    {
        return get_object_vars($this);
    }
}
