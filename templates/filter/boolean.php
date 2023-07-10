<?php

use Puwnz\WpAdminTemplate\Admin\Filter\Text;

/** @var Text $filter */
$filter = $args['filter'] ?? null;

if (empty($filter)) {
    return;
}

?>
<div class="puwnz-col-span-2 puwnz-w-full">
    <label class="puwnz-block puwnz-text-gray-700 puwnz-text-sm puwnz-font-bold puwnz-mb-2" for="<?php echo $filter->getPostKey(); ?>">
        <?php echo $filter->getTitle(); ?>
    </label>
    <select class="!puwnz-shadow !puwnz-h-11 !puwnz-appearance-none !puwnz-border !puwnz-rounded !puwnz-w-full !puwnz-py-2 !puwnz-px-3 !puwnz-text-gray-700 !puwnz-leading-tight focus:!puwnz-outline-none focus:!puwnz-shadow-outline" name="<?php echo $filter->getPostKey(); ?>" id="<?php echo $filter->getPostKey(); ?>">
        <option>--</option>
        <option value="1" <?php echo ($filter->getValue() ? 'selected' : null); ?>><?php _e('Yes'); ?></option>
        <option value="0" <?php echo ($filter->getValue() === false ? 'selected' : null); ?>><?php _e('No'); ?></option>
    </select>
</div>