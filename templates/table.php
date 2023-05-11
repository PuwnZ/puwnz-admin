<?php

use Puwnz\WpAdminTemplate\Admin\Action\Table;

/** @var ?Table $table */
$table = $args['table'] ?? null;

if ($table === null) {
    return;
}

$items = $table->getItems();
$columns = $table->getColumns();
$actions = $table->getActions();

?>
<div class="wrap">
    <div class="tablenav top">
        <?php get_template_part('puwnz-admin/pagination', null, ['table' => $table]); ?>
    </div>
    <table class="wp-list-table widefat fixed striped table-view-list">
        <thead>
        <tr>
            <?php
            foreach ($columns as $key => $column) {
                get_template_part('puwnz-admin/column', $key, ['value' => $column]);
            }
            if ($actions !== []) {
                get_template_part('puwnz-admin/column', 'actions', ['value' => 'Actions']);
            }
            ?>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($items as $item) {
            ?>
            <tr>
                <?php
                foreach (array_keys($columns) as $key) {
                    get_template_part('puwnz-admin/column', $key, ['value' => $item[$key]] ?? '');
                }
                if ($actions !== []) {
                    get_template_part('puwnz-admin/column', 'actions', ['actions' => $actions, 'item' => $item]);
                }
                ?>
            </tr>
            <?php
        }
        ?>
        </tbody>
        <tfoot>
        <tr>
            <?php
            foreach ($columns as $key => $column) {
                get_template_part('puwnz-admin/column', $key, ['value' => $column]);
            }
            if ($actions !== []) {
                get_template_part('puwnz-admin/column', 'actions', ['value' => 'Actions']);
            }
            ?>
        </tr>
        </tfoot>
    </table>
    <div class="tablenav bottom">
        <?php get_template_part('puwnz-admin/pagination', null, ['table' => $table]); ?>
    </div>
</div>