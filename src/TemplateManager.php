<?php

declare(strict_types=1);

namespace Puwnz\WpAdminTemplate;

final class TemplateManager
{
    public function getTemplatePart(string $slug, string $name, array $templates, array $args): void
    {
        $path = null;

        foreach ($templates as $template) {
            $path = $this->loadTemplatePart($template);

            if ($path !== null) {
                break;
            }
        }

        if ($path !== null) {
            load_template($path, false, $args);
        }
    }

    private function loadTemplatePart(string $slug): ?string
    {
        static $tmp = [];

        if (file_exists(get_template_directory() . DIRECTORY_SEPARATOR . $slug)) {
            return null;
        }

        if (file_exists(get_stylesheet_directory() . DIRECTORY_SEPARATOR . $slug)) {
            return null;
        }

        $template = preg_replace('#^puwnz-admin/#', '', $slug);

        $path = PUWNZ_ADMIN_DIR . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . $template;

        if (empty($tmp[$path])) {
            $plugin_templates = glob($path);
            $tmp[$path] = $plugin_templates;
        }

        if (\count($tmp[$path]) > 0) {
            return $tmp[$path][0];
        }

        return null;
    }
}