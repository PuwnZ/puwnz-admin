<?php

use Puwnz\WpAdminTemplate\Admin\Filter\Filter;

/** @var Filter[] $table */
$filters = $args['filters'] ?? null;

if (empty($filters)) {
    return;
}

?>
<form method="POST" class="puwnz-bg-white puwnz-p-4 puwnz-border puwnz-rounded-md puwnz-border-gray-300 puwnz-mt-4">
    <button id="filterTargetModal" class="puwnz-block puwnz-text-blue-500 hover:puwnz-text-white puwnz-border puwnz-bg-gray-200 puwnz-border-blue-200 hover:puwnz-bg-blue-600 focus:puwnz-ring-4 focus:puwnz-outline-none focus:puwnz-ring-blue-300 puwnz-font-medium puwnz-rounded-lg puwnz-text-sm puwnz-px-5 puwnz-py-2.5 puwnz-text-center" type="button">
        <?php _e('Filters', 'puwnz-admin'); ?>
    </button>
    <div id="filterModal" tabindex="-1" aria-hidden="true" class="puwnz-fixed puwnz-top-0 puwnz-left-0 puwnz-right-0 puwnz-z-50 puwnz-hidden puwnz-w-full puwnz-p-4 puwnz-overflow-x-hidden puwnz-overflow-y-auto puwnz-md:inset-0 puwnz-h-[calc(100%-1rem)] puwnz-max-h-full">
        <div class="puwnz-relative puwnz-w-full puwnz-max-w-2xl puwnz-max-h-full">
            <!-- Modal content -->
            <div class="puwnz-relative puwnz-bg-white puwnz-rounded-lg puwnz-shadow">
                <!-- Modal header -->
                <div class="puwnz-flex puwnz-items-start puwnz-justify-between puwnz-p-4 puwnz-border-b puwnz-rounded-t">
                    <h3 class="puwnz-text-xl puwnz-font-semibold puwnz-text-gray-900">
                        <?php _e('Filters', 'puwnz-admin'); ?>
                    </h3>
                    <button onclick="modal.hide()" type="button" class="puwnz-text-gray-400 puwnz-bg-transparent hover:puwnz-bg-gray-200 hover:puwnz-text-gray-900 puwnz-rounded-lg puwnz-text-sm puwnz-p-1.5 puwnz-ml-auto puwnz-inline-flex puwnz-items-center">
                        <svg aria-hidden="true" class="puwnz-w-5 puwnz-h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="puwnz-sr-only"><?php _e('Close modal', 'puwnz-admin'); ?></span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="puwnz-p-6 puwnz-grid puwnz-gap-4 puwnz-grid-cols-4 puwnz-justify-items-center">
                    <?php foreach ($filters as $filter) {
                        get_template_part($filter->getTemplate(), null, ['filter' => $filter]);
                    } ?>
                </div>
                <!-- Modal footer -->
                <div class="puwnz-flex puwnz-items-center puwnz-p-6 puwnz-space-x-2 puwnz-border-t puwnz-border-gray-200 puwnz-rounded-b">
                    <button type="submit" class="puwnz-block puwnz-text-blue-500 hover:puwnz-text-white puwnz-border puwnz-bg-gray-200 puwnz-border-blue-200 hover:puwnz-bg-blue-600 focus:puwnz-ring-4 focus:puwnz-outline-none focus:puwnz-ring-blue-300 puwnz-font-medium puwnz-rounded-lg puwnz-text-sm puwnz-px-5 puwnz-py-2.5 puwnz-text-center"><?php _e('Apply', 'puwnz-admin'); ?></button>
                    <button onclick="modal.hide()" type="button" class="puwnz-text-gray-500 puwnz-bg-white hover:puwnz-bg-gray-100 focus:puwnz-ring-4 focus:puwnz-outline-none focus:puwnz-ring-blue-300 puwnz-rounded-lg puwnz-border puwnz-border-gray-200 puwnz-text-sm puwnz-font-medium puwnz-px-5 puwnz-py-2.5 hover:puwnz-text-gray-900 focus:puwnz-z-10"><?php _e('Cancel', 'puwnz-admin'); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>