<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

final class TableColumn
{
    private string $key;
    private string $title;
    private int $gridCol;
    private ?\Closure $retrieveValue;

    public function __construct(string $key, string $title, callable $retrieveValue, int $gridCol = 1)
    {
        $this->key = $key;
        $this->title = $title;
        $this->gridCol = $gridCol;
        $this->retrieveValue = $retrieveValue;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getGridCol(): int
    {
        return $this->gridCol;
    }

    public function retrieveValue(): callable
    {
        return $this->retrieveValue;
    }
}