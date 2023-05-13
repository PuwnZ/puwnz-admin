<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin;

class ViewTab
{
    private string $title;
    private ?\Closure $callable;
    private ?string $capability;

    /**
     * @param string $title
     * @param callable|null $callable
     */
    public function __construct(string $title, ?callable $callable, ?string $capability)
    {
        $this->title = $title;
        $this->callable = $callable;
        $this->capability = $capability;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getCallable(): ?callable
    {
        return $this->callable ?? static function () {};
    }

    public function getCapability(): ?string
    {
        return $this->capability;
    }

    public function setCapability(string $capability): ViewTab
    {
        $this->capability = $capability;
        return $this;
    }
}