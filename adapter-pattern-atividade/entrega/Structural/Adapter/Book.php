<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

/**
 * INTERFACE "TARGET" DO PADRÃO ADAPTER.
 *
 * É o contrato que o código CLIENTE conhece e usa. Qualquer classe que
 * implemente "Book" pode ser usada pelo cliente sem que ele precise saber
 * qual é a implementação concreta por trás (PaperBook, EBookAdapter, etc).
 */
interface Book
{
    /**
     * Avança para a próxima página do livro.
     */
    public function turnPage();

    /**
     * Abre o livro (prepara a leitura desde a primeira página).
     */
    public function open();

    /**
     * @return int Retorna somente a página atual, como um número inteiro.
     */
    public function getPage(): int;
}
