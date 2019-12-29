<?php

namespace WordPressActionsAudit\Interfaces\admin;

use WordPressActionsAudit\Services\Services;

class SettingsInterface
{
    private const TITLE = 'Actions Audit';
    private const PLUGIN_REPOSITORY = 'https://github.com/dbtedman/wordpress-actions-audit';

    /**
     * @var Services
     */
    private $services;

    /**
     * @param Services $services
     */
    public function __construct($services)
    {
        $this->services = $services;
    }

    public function render(): void
    {
        echo '<div class="wrap">';
        echo '<h1>' . self::TITLE . '</h1>';
        echo '<p><em>Plugin currently does not support any configuration options.</em></p>';
        $pluginRepositoryLabel = str_replace(
            'https://',
            '',
            self::PLUGIN_REPOSITORY
        );
        echo '<p>Visit <a href="' . self::PLUGIN_REPOSITORY . '">' . $pluginRepositoryLabel . '</a> to learn more about this plugin.</p>';
        echo '</div>';
    }

    public function attach(): void
    {
        $this->services
            ->wordPressService()
            ->addAction('admin_menu', 1, 0, function () {
                $this->services
                    ->wordPressService()
                    ->addMenuPage(
                        self::TITLE,
                        self::TITLE,
                        'manage_options',
                        'wordpress_actions_audit',
                        function () {
                            $this->render();
                        }
                    );
            });
    }
}
