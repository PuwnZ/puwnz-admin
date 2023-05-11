<?php

/** @var \Puwnz\WpAdminTemplate\Admin\Action\View $view */
$view = $args['view'] ?? new \Puwnz\WpAdminTemplate\Admin\Action\View();
$tabs = $view->getTabs();
?>

<div class="puwnz-w-full puwnz-p-2">
    <div
        class="puwnz-mt-4 puwnz-bg-white puwnz-rounded-md puwnz-border puwnz-border-gray-300 puwnz-grid puwnz-grid-cols-12 puwnz-divide-x">
        <?php
        if (count($tabs) > 1) {
            ?>
            <div class="puwnz-col-span-2 puwnz-grid puwnz-divide-y puwnz-bg-gray-100">
                <div>

                <?php
                foreach ($tabs as $key => $tab) {
                    ?>
                    <div class="puwnz-m-2">
                        <div aria-label="puwnz-view-tab" data-key="<?php echo $key; ?>"
                             class="<?php echo($key === 0 ? 'puwnz-bg-white puwnz-font-bold ' : ''); ?>  puwnz-border puwnz-border-gray-300 puwnz-rounded-md puwnz-p-2 hover:puwnz-font-bold puwnz-cursor-pointer">
                            <?php echo $tab->getTitle(); ?>
                        </div>
                    </div>
                    <?php
                }
                ?>
                </div>
            </div>
            <?php
        }
        ?>
        <div class="puwnz-col-span-<?php echo(count($tabs) > 1 ? '10' : '12'); ?> puwnz-p-2">
            <?php
            foreach ($tabs as $key => $tab) {
                ?>
                <div aria-label="puwnz-view-content" data-key="<?php echo $key; ?>"
                     class="<?php echo($key !== 0 ? 'hidden ' : ''); ?>puwnz-p-2 puwnz-cursor-default">
                    <?php echo $tab->getCallable()($view->getItem()); ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    const tabs = document.querySelectorAll('[aria-label="puwnz-view-tab"]');
    const contents = document.querySelectorAll('[aria-label="puwnz-view-content"]');

    tabs.forEach((tab) => {
        tab.addEventListener('click', (event) => {
            const key = event.target.getAttribute('data-key');

            tabs.forEach((t) => t.classList.remove('puwnz-bg-white', 'puwnz-font-bold'));
            contents.forEach((t) => t.classList.add('hidden'));

            event.target.classList.add('puwnz-bg-white', 'puwnz-font-bold');

            document.querySelector(`[aria-label="puwnz-view-content"][data-key="${key}"]`).classList.remove('hidden');
        });
    });
</script>