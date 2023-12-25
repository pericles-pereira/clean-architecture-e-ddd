<?php 

namespace Alura\Arquitetura\Testes\Academico\Dominio;

use PHPUnit\Framework\TestCase;
use Alura\Arquitetura\Academico\Dominio\Email;

class EmailTest extends TestCase 
{
    public function testEmailNoFormatoInvalidoNaoDevePoderExistir()
    {
        $this->expectException(\InvalidArgumentException::class);
        new Email('email inválido');
    }

    public function testEmailDevePoderSerRepresentadoComoString()
    {
        $email = new Email('endereco@example.com');
        $this->assertSame('endereco@example.com', (string) $email);
    }
}
