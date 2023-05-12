<?php

use Puwnz\WpAdminTemplate\Admin\Action\Table;
use Puwnz\WpAdminTemplate\Admin\Action\TableColumn;

/** @var ?Table $table */
$table = $args['table'] ?? null;

if ($table === null) {
    return;
}

$items = $table->getItems();
/** @var TableColumn[] $columns */
$columns = $table->getColumns();
$actions = $table->getActions();

?>
<div
    class="puwnz-w-full puwnz-mt-4">
    <div
        class="puwnz-bg-white puwnz-p-4 puwnz-border puwnz-rounded-md puwnz-border-gray-300">
        <div
            class="puwnz-grid puwnz-grid-cols-<?php echo $table->getGridCol(); ?> puwnz-gap-2 puwnz-bg-gray-100 puwnz-border puwnz-rounded-md puwnz-p-2 puwnz-border-gray-300 puwnz-font-bold puwnz-justify-items-center">
            <?php
            foreach ($columns as $column) {
                get_template_part('puwnz-admin/column', $column->getKey(), ['column' => $column, 'value' => $column->getTitle()]);
            }
            if ($actions !== []) {
                get_template_part('puwnz-admin/column', 'actions', ['value' => 'Actions']);
            }
            ?>
        </div>
        <?php
        foreach ($items as $item) {
            ?>
            <div class="hover:puwnz-bg-gray-50 puwnz-grid puwnz-grid-cols-<?php echo $table->getGridCol(); ?> puwnz-gap-2 puwnz-mt-4 puwnz-border puwnz-rounded-md puwnz-p-2 puwnz-border-gray-300 puwnz-justify-items-center">
                <?php
                foreach ($columns as $column) {
                    get_template_part('puwnz-admin/column', $column->getKey(), ['column' => $column, 'value' => $item[$column->getKey()]] ?? '');
                }
                if ($actions !== []) {
                    get_template_part('puwnz-admin/column', 'actions', ['actions' => $actions, 'item' => $item]);
                }
                ?>
            </div>
            <?php
        }
        ?>
        <div class="puwnz-w-full puwnz-mt-4">
            <?php get_template_part('puwnz-admin/pagination', null, ['table' => $table]); ?>
        </div>
    </div>
</div>