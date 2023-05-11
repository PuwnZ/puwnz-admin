<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate\Admin;

class ViewManager
{
    public const ACTION_INIT_VIEW = 'puwnz_init_view';

    public function init(): void
    {
        wp_enqueue_script('tailwind', 'https://cdn.tailwindcss.com', [], '1.0.0');
        wp_enqueue_script('tailwind-puwnz', plugin_dir_url(PUWNZ_FILE) . 'assets/js/tailwind.js', [], '1.0.0', true);

        do_action(static::ACTION_INIT_VIEW, []);
    }
}