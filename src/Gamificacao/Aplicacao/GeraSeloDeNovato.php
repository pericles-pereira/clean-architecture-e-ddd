<?php 

namespace Alura\Arquitetura\Gamificacao\Aplicacao;

use Alura\Arquitetura\Shared\Dominio\Evento\Evento;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\Selo;
use Alura\Arquitetura\Shared\Dominio\Evento\OuvinteDeEvento;
use Alura\Arquitetura\Gamificacao\Dominio\Selo\RepositorioDeSelo;

class GeraSeloDeNovato extends OuvinteDeEvento
{
    public function __construct(private RepositorioDeSelo $repositorioDeSelo)
    {
    }

    public function sabeProcessar(Evento $evento): bool
    {
        return get_class($evento) === 'Alura\Arquitetura\Academico\Dominio\Aluno\AlunoMatriculado';
    }

    public function reageAo(Evento $evento): void
    {
        $array = $evento->jsonSerialize();
        $cpf = $array['cpfAluno'];

        $selo = new Selo($cpf, 'Novato');
        $this->repositorioDeSelo->adiciona($selo);
    }
}