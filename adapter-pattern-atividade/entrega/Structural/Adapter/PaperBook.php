<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

/**
 * Implementação CONCRETA e "nativa" da interface Book (livro físico).
 *
 * Esta classe já nasce compatível com o cliente, sem precisar de nenhum
 * adaptador — serve de referência para comparar com o EBookAdapter mais
 * abaixo, que "finge" ser um Book mesmo por trás usando um Kindle.
 */
class PaperBook implements Book
{
    /** Página atual do livro físico. */
    private int $page;

    /**
     * Abre o livro na primeira página.
     */
    public function open(): void
    {
        $this->page = 1;
    }

    /**
     * Vira para a próxima página.
     */
    public function turnPage(): void
    {
        $this->page++;
    }

    /**
     * @return int Página atual (já é int nativamente, sem precisar adaptar nada).
     */
    public function getPage(): int
    {
        return $this->page;
    }
}
