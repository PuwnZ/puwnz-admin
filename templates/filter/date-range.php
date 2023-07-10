<?php

use Puwnz\WpAdminTemplate\Admin\Filter\Text;

/** @var Text $filter */
$filter = $args['filter'] ?? null;

if (empty($filter)) {
    return;
}

?>
<div class="puwnz-col-start-0 puwnz-col-span-4 puwnz-w-full">
    <label class="puwnz-block puwnz-text-gray-700 puwnz-text-sm puwnz-font-bold puwnz-mb-2"
           for="<?php echo $filter->getPostKey(); ?>">
        <?php echo $filter->getTitle(); ?>
    </label>
    <div class="puwnz-grid puwnz-grid-cols-12 puwnz-gap-4">
        <div class="puwnz-col-span-5">

            <input class="!puwnz-shadow !puwnz-h-11 !puwnz-appearance-none !puwnz-border !puwnz-rounded !puwnz-w-full !puwnz-py-2 !puwnz-px-3 !puwnz-text-gray-700 !puwnz-leading-tight focus:!puwnz-outline-none focus:!puwnz-shadow-outline"
                   name="<?php echo $filter->getPostKey(); ?>[after]" data-range="<?php echo $filter->getPostKey(); ?>"
                   data-type="after"
                   value="<?php echo $filter->getValue()['after']; ?>" type="<?php echo $filter->getType(); ?>"
                   max="<?php echo $filter->getValue()['before']; ?>"
                   placeholder="<?php echo $filter->getPlaceholder(); ?>">
        </div>
        <div class="puwnz-grid puwnz-col-span-2 puwnz-place-content-center puwnz-text-center">
            <span>au</span>
        </div>
        <div class="puwnz-col-span-5">
            <input class="!puwnz-shadow !puwnz-h-11 !puwnz-appearance-none !puwnz-border !puwnz-rounded !puwnz-w-full !puwnz-py-2 !puwnz-px-3 !puwnz-text-gray-700 !puwnz-leading-tight focus:!puwnz-outline-none focus:!puwnz-shadow-outline"
                   name="<?php echo $filter->getPostKey(); ?>[before]" data-range="<?php echo $filter->getPostKey(); ?>"
                   data-type="before"
                   value="<?php echo $filter->getValue()['before']; ?>" type="<?php echo $filter->getType(); ?>"
                   min="<?php echo $filter->getValue()['after']; ?>"
                   placeholder="<?php echo $filter->getPlaceholder(); ?>">
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('input[data-range="<?php echo $filter->getPostKey(); ?>"]').forEach((input) => {
        input.addEventListener('input', (e) => {
            const element = e.target;
            const targetType = element.getAttribute('data-type') === 'before' ? 'after': 'before';

            const targetElement = document.querySelector(`input[data-range="<?php echo $filter->getPostKey(); ?>"][data-type=${targetType}]`);

            if (element.value) {
                const date = new Date(element.value);
                date.setDate(date.getDate() + (targetType === 'before' ? 1 : -1));
                targetElement.setAttribute(targetType === 'before' ? 'min' : 'max', `${date.getFullYear()}-${(date.getMonth() + 1).toString().padStart(2, 0)}-${date.getDate().toString().padStart(2, 0)}`);
                targetElement.setAttribute('required', 'required');
                element.setAttribute('required', 'required');
            } else {
                element.removeAttribute('required');
                targetElement.removeAttribute('required');
                targetElement.removeAttribute(targetType === 'before' ? 'min' : 'max');
            }
        });
    });
</script>