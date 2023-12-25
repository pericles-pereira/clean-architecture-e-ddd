<?php 

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosDeUsuario;

use Alura\Arquitetura\Dominio\Cpf;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;

class BuscarSelosDeUsuario
{
    public function __construct(private RepositorioDeSelo $repositorioDeSelo)
    {
    }

    public function execute(BuscarSelosDeUsuarioDto $dados)
    {
        $cpfAluno = new Cpf($dados->cpfAluno);

        return $this->repositorioDeSelo->selosDeAlunoComCpf($cpfAluno);
    }
}
