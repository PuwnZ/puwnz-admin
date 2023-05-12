<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

final class TableColumn
{
    private string $key;
    private string $title;
    private int $gridCol;

    public function __construct(string $key, string $title, int $gridCol = 2)
    {
        $this->key = $key;
        $this->title = $title;
        $this->gridCol = $gridCol;
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
}