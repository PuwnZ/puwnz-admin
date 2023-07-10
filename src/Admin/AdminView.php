<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin;

use Puwnz\WpAdminTemplate\Admin\Action\AbstractActionView;
use Puwnz\WpAdminTemplate\Admin\Action\ActionInterface;

final class AdminView implements ActionInterface
{
    public const VIEW = 'view';
    public const EDIT = 'edit';
    public const DELETE = 'delete';
    private string $title;
    private string $slug;
    private string $capability;
    /** @var AbstractActionView[] */
    private array $actions = [];
    private ?string $icon;

    public function __construct(string $title, string $slug, ?string $icon = null, string $capability = 'administrator')
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->capability = $capability;
        $this->icon = $icon;
    }

    public function display(): void
    {
        if (!count($this->actions)) {
            throw new \Exception('AdminView need actions');
        }


        foreach ($this->actions as $action) {
            if (!current_user_can($action->getCapability())) {
                continue;
            }

            $actionKey ??= $_GET['action'] ?? $action->getActionKey();

            if ($action->support($actionKey)) {
                $action->display();

                return;
            }
        }

        throw new \Exception('No actions found for your url');
    }

    public function init(): void
    {
        add_menu_page(
            $this->title,
            $this->title,
            $this->capability,
            $this->slug,
            function (): void
            {
                $this->display();
            },
            $this->icon
        );
    }

    public function addAction(AbstractActionView $action): AdminView
    {
        if ($action->getCapability() === null) {
            $action->setCapability($this->capability);
        }

        $action->setAdminView($this);

        $this->actions[] = $action;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }
}