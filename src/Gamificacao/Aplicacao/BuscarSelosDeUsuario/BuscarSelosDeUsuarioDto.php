<?php 

namespace Alura\Arquitetura\Gamificacao\Aplicacao\BuscarSelosDeUsuario;

class BuscarSelosDeUsuarioDto
{
    public function __construct(public string $cpfAluno)
    {
    }
}