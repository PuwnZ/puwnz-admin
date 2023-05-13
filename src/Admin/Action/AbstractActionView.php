<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

abstract class AbstractActionView implements ActionViewInterface
{
    private ?string $capability;

    public function __construct(?string $capability = null)
    {
        $this->capability = $capability;
    }

    public function getCapability(): ?string
    {
        return $this->capability;
    }

    public function setCapability(?string $capability): AbstractActionView
    {
        $this->capability = $capability;

        return $this;
    }
}