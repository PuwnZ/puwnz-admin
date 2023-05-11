<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin;

use Puwnz\WpAdminTemplate\Admin\Action\ActionInterface;
use Puwnz\WpAdminTemplate\Admin\Action\ActionViewInterface;

final class AdminView implements ActionInterface
{
    public const VIEW = 'view';
    public const EDIT = 'edit';
    public const DELETE = 'delete';
    private string $title;
    private string $slug;
    private string $role;
    /** @var ActionViewInterface[] */
    private array $actions = [];

    public function __construct(string $title, string $slug, string $role = 'administrator')
    {
        $this->title = $title;
        $this->slug = $slug;
        $this->role = $role;
    }

    public function display(): void
    {
        $actionKey = $_GET['action'] ?? 'list';

        foreach ($this->actions as $action) {
            if ($action->support($actionKey)) {
                $action->display();

                return;
            }
        }
    }

    public function init(): void
    {
        add_menu_page(
            $this->title,
            $this->title,
            $this->role,
            $this->slug,
            function (): void
            {
                $this->display();
            },
        );
    }

    public function addAction(ActionViewInterface $action): AdminView
    {
        $this->actions[] = $action;

        return $this;
    }
}