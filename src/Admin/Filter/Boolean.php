<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Filter;

class Boolean extends AbstractFilter
{
    private string $title;

    public function __construct(string $key, string $title)
    {
        parent::__construct($key);

        $this->title = $title;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getTemplate(): string
    {
        return 'puwnz-admin/filter/boolean';
    }

    public function getValue()
    {
        $value = parent::getValue();

        if ($value === null) {
            return null;
        }

        return filter_var($value, FILTER_VALIDATE_BOOLEAN, FILTER_NULL_ON_FAILURE);
    }
}