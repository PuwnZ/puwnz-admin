<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

use Puwnz\WpAdminTemplate\Admin\AdminView;

abstract class AbstractActionView implements ActionViewInterface
{
    private ?string $capability;

    private ?AdminView $adminView;

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

    public function getAdminView(): ?AdminView
    {
        return $this->adminView;
    }

    public function setAdminView(?AdminView $adminView): AbstractActionView
    {
        $this->adminView = $adminView;

        return $this;
    }
}