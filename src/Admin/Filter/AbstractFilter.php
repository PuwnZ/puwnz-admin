<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Filter;

abstract class AbstractFilter implements Filter
{
    private string $key;

    public function __construct(string $key) {
        $this->key = $key;
    }

    public function getKey(): string
    {
        return $this->key;
    }

    public function getPostKey(): string
    {
        return sprintf('filters[%s]', $this->key);
    }

    public function getValue()
    {
        if (empty($_POST) || !isset($_POST['filters'][$this->key])) {
            return null;
        }

        return $_POST['filters'][$this->key] ?? null;
    }

}