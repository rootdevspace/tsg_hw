<?php
declare(strict_types=1);

use Info\BookInfo;

class Book extends ShopProduct
{
    private const BOOK = 'Книга';

    /** @var int */
    private $pagesCount;

    /**
     * @param string $title
     * @param string $producer
     * @param int    $price
     * @param int    $pagesCount
     */
    public function __construct(string $title, string $producer, int $price, int $pagesCount)
    {
        parent::__construct($title, $producer, $price);
        $this->pagesCount = $pagesCount;
        $this->info = new BookInfo($this);
    }

    /**
     * @return int
     */
    public function getPagesCount(): int
    {
        return $this->pagesCount;
    }

    /**
     * @inheritDoc
     */
    public function getProductType(): string
    {
        return self::BOOK;
    }
}
