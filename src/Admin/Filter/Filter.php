<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Filter;

interface Filter
{
    public function getTemplate() : string;

    public function getPostKey(): string;

    public function getValue();
}