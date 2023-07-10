<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Filter;

class Date extends Text
{
    public function __construct(string $key, string $title, ?string $placeholder)
    {
        parent::__construct($key, $title, $placeholder);

        $this->type = 'date';
    }
}