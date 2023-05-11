<td>
    <?php
    if (!empty($args['value'])) {
        echo $args['value'];
    } else if (!empty($item = $args['item']) && !empty($actions = $args['actions'])) {
        $currentUrl = set_url_scheme('http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
        $currentUrl = remove_query_arg(wp_removable_query_args(), $currentUrl);
        foreach ($actions as $action) {
            switch ($action) {
                case \Puwnz\WpAdminTemplate\Admin\AdminView::VIEW:
                    ?>
                    <a href="<?php echo esc_url(add_query_arg(['action' => $action, 'item' => $item['id']], $currentUrl)); ?>" class="dashicons-before dashicons-visibility"></a>
                    <?php
                    break;
                case \Puwnz\WpAdminTemplate\Admin\AdminView::EDIT:
                    ?>
                    <a href="<?php echo esc_url(add_query_arg(['action' => $action, 'item' => $item['id']], $currentUrl)); ?>" class="dashicons-before dashicons-edit"></a>
                    <?php
                    break;
                case \Puwnz\WpAdminTemplate\Admin\AdminView::DELETE:
                    ?>
                    <a href="<?php echo esc_url(add_query_arg(['action' => $action, 'item' => $item['id']], $currentUrl)); ?>" class="dashicons-before dashicons-trash attention"></a>
                    <?php
                    break;
                default:
                    ?>
                    <a href="<?php echo esc_url(add_query_arg(['action' => $action, 'item' => $item['id']], $currentUrl)); ?>" class="button button-secondary"><?php echo $action; ?></a>
                    <?php
                    break;
            }
        }
    }
    ?>
</td>

