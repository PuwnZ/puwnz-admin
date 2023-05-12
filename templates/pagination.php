<?php

use Puwnz\WpAdminTemplate\Admin\Action\Table;

/** @var Table $table */
$table = $args['table'] ?? new Table();

$total_items = $table->getItemsLength() ?? 0;
$pageNumber = $table->getCurrentPage();

$currentUrl = set_url_scheme('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
$currentUrl = remove_query_arg(wp_removable_query_args(), $currentUrl);
$maxPage = ceil($total_items / $table->getItemsPerPage());

?>
<div class="puwnz-leading-8">
    <span class="puwnz-mr-2">
        <?php echo sprintf(
        /* translators: %s: Number of items. */
            _n('%s item', '%s items', $total_items),
            number_format_i18n($total_items)
        ); ?>
    </span>
    <span class="pagination-links">
        <?php if ($pageNumber <= 2) {
            echo '<a class="tablenav-pages-navspan button disabled" aria-hidden="true">&laquo;</a>';
        } else {
            echo sprintf(
                "<a class='tablenav-pages-navspan first-page button' href='%s'><span class='screen-reader-text'>%s</span><span aria-hidden='true'>%s</span></a>",
                esc_url(remove_query_arg('paged', $currentUrl)),
                __('First page'),
                '&laquo;'
            );
        }
        echo '&nbsp;';
        if ($pageNumber === 1) {
            echo '<a class="tablenav-pages-navspan button disabled" aria-hidden="true">&lsaquo;</a>';
        } else {
            echo sprintf(
                "<a class='prev-page button' href='%s'><span class='screen-reader-text'>%s</span><span aria-hidden='true'>%s</span></a>",
                esc_url(add_query_arg('paged', $pageNumber - 1, $currentUrl)),
                __('Previous page'),
                '&lsaquo;'
            );
        }
        ?>
        <span id="table-paging" class="paging-input">
            <span class="tablenav-paging-text puwnz-mx-2">
                <?php echo sprintf(
                    _x('%1$s of %2$s', 'paging'),
                    $pageNumber,
                    '<span class="total-pages">' . $maxPage . '</span>'
                ); ?>
            </span>
        </span>
        <?php
        if (($maxPage - $pageNumber) > 0) {
            echo sprintf(
                "<a class='next-page button' href='%s'><span class='screen-reader-text'>%s</span><span aria-hidden='true'>%s</span></a>",
                esc_url(add_query_arg('paged', $pageNumber + 1, $currentUrl)),
                __('Next page'),
                '&rsaquo;'
            );
        } else {
            echo '<a class="tablenav-pages-navspan button disabled" aria-hidden="true">&rsaquo;</a>';
        }
        echo '&nbsp;';
        if (($maxPage - $pageNumber) > 1) {
            echo sprintf(
                "<a class='last-page button' href='%s'><span class='screen-reader-text'>%s</span><span aria-hidden='true'>%s</span></a>",
                esc_url(add_query_arg('paged', $maxPage, $currentUrl)),
                __('Last page'),
                '&raquo;'
            );
        } else {
            echo '<a class="tablenav-pages-navspan button disabled" aria-hidden="true">&raquo;</a>';
         } ?>
    </span>
</div>
