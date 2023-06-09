<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

use Puwnz\WpAdminTemplate\Admin\ViewTab;

final class View extends AbstractActionView
{
    private string $template = 'puwnz-admin/view';
    /** @var ViewTab[] */
    private array $tabs = [];
    private ?\Closure $loaderItem = null;

    public function display(array $data = []): void
    {
        get_template_part(
            $this->template,
            null,
            ['view' => $this, 'data' => $data]
        );
    }

    public function setTemplate(string $template): View
    {
        $this->template = $template;

        return $this;
    }

    public function addTab(string $title, ?callable $callable = null, ?string $capability = null): View
    {
        $this->tabs[] = new ViewTab($title, $callable, $capability);

        return $this;
    }

    public function getTabs(): array
    {
        $tabs = [];

        foreach ($this->tabs as $tab) {
            if ($tab->getCapability() === null) {
                $tab->setCapability($this->getCapability());
            }

            if (current_user_can($tab->getCapability())) {
                $tabs[] = $tab;
            }
        }

        return $tabs;
    }

    public function getItem(): array
    {
        return $this->getLoaderItem()($_GET['item'] ?? -1);
    }

    public function setLoaderItem(?\Closure $loaderItem): View
    {
        $this->loaderItem = $loaderItem;

        return $this;
    }

    public function getLoaderItem(): ?\Closure
    {
        return $this->loaderItem ?? static function () {};
    }

    public function support(string $action): bool
    {
        return $action === $this->getActionKey() && !empty($_GET['item'] ?? null);
    }

    public function getActionKey(): string {
        return 'view';
    }
}