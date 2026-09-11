<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

/**
 * Esta é a classe ADAPTADA (Adaptee concreto).
 *
 * Em um cenário real, esta classe poderia vir de uma biblioteca de terceiros
 * (um SDK de um fabricante de e-reader, por exemplo) — ou seja, código que
 * NÃO podemos alterar. Note que ela usa uma nomenclatura própria, diferente
 * da interface Book que o cliente espera.
 */
class Kindle implements EBook
{
    /** Página atual do e-book. */
    private int $page = 1;

    /** Total de páginas do e-book (fixo, apenas para o exemplo). */
    private int $totalPages = 100;

    /**
     * Avança uma página (nome de método diferente de turnPage()).
     */
    public function pressNext()
    {
        $this->page++;
    }

    /**
     * "Destrava" o e-book. Nesta simulação não faz nada, mas representa
     * a etapa de abertura/autenticação de um leitor digital real.
     */
    public function unlock()
    {
    }

    /**
     * Retorna a página atual e o total de páginas, ex.: [10, 100] = página 10 de 100.
     *
     * @return int[] Note que o retorno é um array, e não um int como em Book::getPage().
     */
    public function getPage(): array
    {
        return [$this->page, $this->totalPages];
    }
}
