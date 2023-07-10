<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin\Action;

use Puwnz\WpAdminTemplate\Admin\Filter\Filter;

final class Table extends AbstractActionView
{
    public const FILTER_COLUMNS = 'puwnz-admin_table_columns';
    public const FILTER_FILTERS = 'puwnz-admin_table_filters';
    public const FILTER_ACTIONS = 'puwnz-admin_table_actions';
    private array $actions = [];
    private string $pageKey = 'paged';
    private string $itemsPerPageKey = 'itemsPerPAge';

    private array $columns = [];

    private ?\Closure $items = null;
    private ?\Closure $retrieveTotalItems;
    private int $gridCol;
    /**
     * @var Filter[]
     */
    private array $filters = [];

    public function __construct(int $gridCol = 12, ?string $capability = null)
    {
        $this->gridCol = $gridCol;

        parent::__construct($capability);
    }

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
        do_action(self::FILTER_COLUMNS, $this->columns, $this);

        do_action(sprintf('%s-%s', self::FILTER_COLUMNS, $this->getAdminView()->getSlug()), $this);

        return $this->columns;
    }

    public function addColumn(TableColumn ...$columns): Table
    {
        foreach ($columns as $column) {
            $this->columns[$column->getKey()] = $column;
        }

        return $this;
    }

    public function getItems(): array
    {
        $items = $this->items;

        $filters = $this->getFiltersValues();

        return $items($this->getCurrentPage(), $this->getItemsPerPage(), $filters);
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

    public function retrieveTotalItems(callable $itemsLength): Table
    {
        $this->retrieveTotalItems = $itemsLength;

        return $this;
    }

    public function getRetrieveTotalItems(): int
    {
        $retrieveTotalItems = $this->retrieveTotalItems;

        return $retrieveTotalItems($this->getFiltersValues());
    }

    public function getActions(): array
    {
        do_action(self::FILTER_ACTIONS, $this);

        do_action(sprintf('%s-%s', self::FILTER_ACTIONS, $this->getAdminView()->getSlug()), $this);

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
        return $action === $this->getActionKey();
    }

    public function getGridCol(): int
    {
        return $this->gridCol;
    }

    public function getActionKey(): string
    {
        return 'list';
    }

    /**
     * @return Filter[]
     */
    public function getFilters(): array
    {
        do_action(self::FILTER_FILTERS, $this);

        do_action(sprintf('%s-%s', self::FILTER_FILTERS, $this->getAdminView()->getSlug()), $this);

        return $this->filters;
    }

    public function addFilter(Filter ...$filters): Table
    {
        foreach ($filters as $filter) {
            $this->filters[$filter->getPostKey()] = $filter;
        }

        return $this;
    }

    private function getFiltersValues(): array
    {
        $filters = [];

        foreach ($this->getFilters() as $filter) {
            $filters[$filter->getKey()] = $filter->getValue();
        }

        return $filters;
    }
}