<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Adapter;

/**
 * ADAPTER (classe adaptadora).
 *
 * Esta é a peça central do padrão. Ela resolve o conflito entre o que o
 * cliente espera (interface Book) e o que o EBook/Kindle realmente oferece
 * (interface EBook), SEM alterar nenhuma das duas.
 *
 * Duas decisões de design importantes:
 *  1) Implementa Book -> o cliente continua chamando open()/turnPage()/getPage()
 *     normalmente, sem saber que por trás existe um Kindle.
 *  2) Usa COMPOSIÇÃO (guarda um EBook como atributo), em vez de herança.
 *     Isso permite adaptar QUALQUER implementação de EBook, não só o Kindle,
 *     e mantém baixo acoplamento entre as duas hierarquias de classes.
 */
class EBookAdapter implements Book
{
    /**
     * Injeção de dependência via construtor: o adapter recebe de fora
     * qualquer objeto que implemente EBook (ex.: um Kindle).
     *
     * @param EBook $eBook Instância do sistema externo a ser adaptado.
     */
    public function __construct(protected EBook $eBook)
    {
    }

    /**
     * Traduz a chamada open() (esperada pelo cliente) para o método
     * real do adaptado: unlock().
     */
    public function open()
    {
        $this->eBook->unlock();
    }

    /**
     * Traduz a chamada turnPage() (esperada pelo cliente) para o método
     * real do adaptado: pressNext().
     */
    public function turnPage()
    {
        $this->eBook->pressNext();
    }

    /**
     * Aqui além de traduzir o NOME do método, também adaptamos o TIPO de
     * retorno: EBook::getPage() devolve um array [paginaAtual, totalPaginas],
     * mas Book::getPage() precisa devolver apenas um int (a página atual).
     *
     * Por isso pegamos a posição [0] do array retornado pelo adaptado.
     */
    public function getPage(): int
    {
        return $this->eBook->getPage()[0];
    }
}
