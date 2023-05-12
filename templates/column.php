<div class="puwnz-grid puwnz-content-center puwnz-break-all puwnz-col-span-<?php echo $args['column']->getGridCol(); ?>">
    <?php

    $value = $args['value'];

    if (is_bool($value)) {
        ?>
        <span
            class="puwnz-py-2 puwnz-px-4 puwnz-rounded-md puwnz-border puwnz-border-gray-300 puwnz-bg-<?php echo($value ? 'green' : 'red'); ?>-600 puwnz-text-white">
                <?php echo $value ? 'Oui' : 'Non'; ?>
            </span>
        <?php
    } else {
        ?>
        <?php
        echo $value;
        ?>
        <?php
    }
    ?>
</div>

