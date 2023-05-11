<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin;

class ViewTab
{
    private string $title;
    private ?\Closure $callable;

    /**
     * @param string $title
     * @param callable|null $callable
     */
    public function __construct(string $title, ?callable $callable)
    {
        $this->title = $title;
        $this->callable = $callable;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCallable(): ?callable
    {
        return $this->callable ?? static function() {};
    }
}