<?php

namespace Alura\Arquitetura\Shared\Dominio\Evento;

class PublicadorDeEvento
{
    private array $ouvintes = [];

    public function adicionarOuvinte(OuvinteDeEvento $ouvinte): self
    {
        $this->ouvintes[] = $ouvinte;

        return $this;
    }

    public function publicar(Evento $evento): void
    {
        foreach ($this->ouvintes as $ouvinte) {
            $ouvinte->processa($evento);
        }
    }
}
