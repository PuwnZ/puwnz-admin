<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

final class Table implements ActionViewInterface
{
    private array $actions = [];
    private string $pageKey = 'paged';
    private string $itemsPerPageKey = 'itemsPerPAge';

    private array $columns = [];

    private ?\Closure $items = null;
    private int $itemsLength;

    public function display(): void
    {
        get_template_part(
            'puwnz-admin/table',
            null,
            ['table' => $this]
        );
    }

    public function getColumns(): array
    {
        return $this->columns;
    }

    public function addColumn(string $key, string $title): Table
    {
        $this->columns[$key] = $title;

        return $this;
    }

    public function getItems(): array
    {
        $items = $this->items;

        return $items($this->getCurrentPage(), $this->getItemsPerPage());
    }

    public function setItems(callable $items): Table
    {
        $this->items = $items;

        return $this;
    }

    public function getPageKey(): string
    {
        return $this->pageKey;
    }

    private function getItemsPerPageKey(): string
    {
        return $this->itemsPerPageKey;
    }

    public function setPageKey(string $pageKey): Table
    {
        $this->pageKey = $pageKey;

        return $this;
    }

    public function getCurrentPage(): int
    {
        $pageKey = $this->getPageKey();

        $pageNumber = !empty($_REQUEST[$pageKey]) ? absint($_REQUEST[$pageKey]) : 0;

        return max(1, $pageNumber);
    }

    public function getItemsPerPage(): int
    {
        $pageKey = $this->getItemsPerPageKey();

        return !empty($_REQUEST[$pageKey]) ? absint($_REQUEST[$pageKey]) : 20;
    }

    public function setItemsLength(int $itemsLength): Table
    {
        $this->itemsLength = $itemsLength;

        return $this;
    }

    public function getItemsLength(): int
    {
        return $this->itemsLength;
    }

    public function getActions(): array
    {
        return $this->actions;
    }

    public function setActions(array $actions): Table
    {
        $this->actions = $actions;

        return $this;
    }

    public function addAction(string $action): Table
    {
        if (!in_array($action, $this->actions)) {
            $this->actions[] = $action;
        }

        return $this;
    }

    public function support(string $action): bool
    {
        return $action === 'list';
    }
}