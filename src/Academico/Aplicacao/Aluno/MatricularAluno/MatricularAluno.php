<?php

namespace Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

use Alura\Arquitetura\Academico\Dominio\Aluno\Aluno;
use Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado;
use Alura\Arquitetura\Shared\Dominio\Evento\PublicadorDeEvento;
use Alura\Arquitetura\Academico\Dominio\Aluno\RepositorioDeAluno;
use Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno\MatricularAlunoDto;

class MatricularAluno
{
    public function __construct(
        private RepositorioDeAluno $repositorioDeAluno,
        private PublicadorDeEvento $publicador
    ) {
    }

    public function executa(MatricularAlunoDto $dados): void
    {
        $aluno = Aluno::comCpfNomeEEmail($dados->cpfAluno, $dados->nomeAluno, $dados->emailAluno);
        $this->repositorioDeAluno->adicionar($aluno);

        $evento = new AlunoMatriculado($aluno->cpf());
        $this->publicador->publicar($evento);
    }
}
