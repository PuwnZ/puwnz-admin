<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Filter;

class DateRange extends Date
{
    public function __construct(string $key, string $title, ?string $placeholder)
    {
        parent::__construct($key, $title, $placeholder);
    }

    public function getTemplate(): string
    {
        return 'puwnz-admin/filter/date-range';
    }

    public function getValue()
    {
        return array_filter(parent::getValue() ?? []);
    }
}