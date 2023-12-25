<?php 

namespace Alura\Arquitetura\Academico\Aplicacao\Aluno\MatricularAluno;

class MatricularAlunoDto
{
    public function __construct(
    public string $cpfAluno,
    public string $nomeAluno,
    public string $emailAluno,
    )
    {
    }
}
