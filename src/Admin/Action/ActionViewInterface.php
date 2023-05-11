<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

interface ActionViewInterface extends ActionInterface
{
    public function support(string $action): bool;
}