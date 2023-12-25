<?php

namespace Alura\Arquitetura\Gamificacao\Dominio\Selo;

use Alura\Arquitetura\Shared\Dominio\Cpf;

class Selo
{
    public function __construct(
        private Cpf $cpfAluno,
        private string $nome,
    ) {
    }

    public function cpfAluno(): Cpf
    {
        return $this->cpfAluno;
    }

    public function __toString(): string
    {
        return $this->nome;
    }
}
