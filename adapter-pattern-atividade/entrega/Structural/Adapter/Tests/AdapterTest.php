<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter\Tests;

use DesignPatterns\Structural\Adapter\PaperBook;
use DesignPatterns\Structural\Adapter\EBookAdapter;
use DesignPatterns\Structural\Adapter\Kindle;
use PHPUnit\Framework\TestCase;

/**
 * Testes automatizados que comprovam o funcionamento do padrão Adapter.
 */
class AdapterTest extends TestCase
{
    /**
     * Cenário de controle: um PaperBook (Book "nativo") funcionando normalmente,
     * sem nenhum adapter envolvido.
     */
    public function testCanTurnPageOnBook()
    {
        $book = new PaperBook();
        $book->open();
        $book->turnPage();

        $this->assertSame(2, $book->getPage());
    }

    /**
     * Cenário principal do padrão: um Kindle (EBook, interface incompatível)
     * é envolvido pelo EBookAdapter e passa a se comportar exatamente como
     * um Book comum, do ponto de vista do cliente.
     */
    public function testCanTurnPageOnKindleLikeInANormalBook()
    {
        $kindle = new Kindle();
        $book = new EBookAdapter($kindle);

        $book->open();      // por trás, chama $kindle->unlock()
        $book->turnPage();  // por trás, chama $kindle->pressNext()

        // getPage() do adapter devolve int, mesmo o Kindle devolvendo array
        $this->assertSame(2, $book->getPage());
    }
}
