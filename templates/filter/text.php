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
    <input class="!puwnz-shadow !puwnz-h-11 !puwnz-appearance-none !puwnz-border !puwnz-rounded !puwnz-w-full !puwnz-py-2 !puwnz-px-3 !puwnz-text-gray-700 !puwnz-leading-tight focus:!puwnz-outline-none focus:!puwnz-shadow-outline" name="<?php echo $filter->getPostKey(); ?>" id="<?php echo $filter->getPostKey(); ?>" value="<?php echo $filter->getValue(); ?>" type="<?php echo $filter->getType(); ?>" placeholder="<?php echo $filter->getPlaceholder(); ?>">
</div>