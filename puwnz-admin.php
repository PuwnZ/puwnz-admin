<?php
/*
Plugin Name: Puwnz Admin
Description: Administrator template
Author: Puwnz
Text Domain: puwnz-admin
Domain Path: /languages
Version: 1.0.0
*/

declare(strict_types=1);

use Puwnz\WpAdminTemplate\Admin\ViewManager;
use Puwnz\WpAdminTemplate\TemplateManager;

define('PUWNZ_FILE', __FILE__);
define('PUWNZ_ADMIN_DIR', realpath(dirname(__FILE__)));

add_filter(
    'get_template_part',
    [new TemplateManager(), 'getTemplatePart'],
    1,
    ['accepted_args' => 3]
);

add_action(
    'admin_menu',
    static function ()
    {
        $manager = new ViewManager();

        $manager->init();
    }
);