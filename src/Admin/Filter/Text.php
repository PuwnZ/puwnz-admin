<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Filter;

class Text extends AbstractFilter
{
    private string $title;
    private ?string $placeholder;

    protected string $type = 'text';

    public function __construct(string $key, string $title, ?string $placeholder)
    {
        parent::__construct($key);

        $this->title = $title;
        $this->placeholder = $placeholder;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getPlaceholder(): ?string
    {
        return $this->placeholder;
    }

    public function getTemplate(): string
    {
        return 'puwnz-admin/filter/text';
    }

    public function getType(): string
    {
        return $this->type;
    }
}