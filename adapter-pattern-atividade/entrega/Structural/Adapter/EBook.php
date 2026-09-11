<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

/**
 * INTERFACE DO "ADAPTEE" (sistema/subsistema externo, incompatível com o cliente).
 *
 * Representa o contrato de um leitor digital genérico. Note que os nomes dos
 * métodos e o tipo de retorno de getPage() são DIFERENTES da interface Book,
 * o que é exatamente o problema que o Adapter vai resolver.
 */
interface EBook
{
    /**
     * "Destrava"/abre o e-book (equivalente a open() da interface Book,
     * mas com outro nome).
     */
    public function unlock();

    /**
     * Avança para a próxima página (equivalente a turnPage(), mas com outro nome).
     */
    public function pressNext();

    /**
     * Retorna a página atual e o total de páginas, ex.: [10, 100] = página 10 de 100.
     *
     * @return int[] Diferente de Book::getPage(), aqui o retorno é um ARRAY,
     *               não um int puro.
     */
    public function getPage(): array;
}
