<?php

namespace WordPressActionsAudit\Interfaces\admin;

use WordPressActionsAudit\Services\Services;

class SettingsInterface
{
    public const TITLE = 'Actions Audit';
    public const PLUGIN_REPOSITORY = 'https://github.com/dbtedman/wordpress-actions-audit';

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

    public function prepare(): string
    {
        $html = '';
        $html .= '<div class="wrap">';
        $html .= '<h1>' . self::TITLE . '</h1>';
        $html .= '<p><em>Plugin currently does not support any configuration options.</em></p>';
        $pluginRepositoryLabel = str_replace(
            'https://',
            '',
            self::PLUGIN_REPOSITORY
        );
        $html .= '<p>Visit <a href="' . self::PLUGIN_REPOSITORY . '">' . $pluginRepositoryLabel . '</a> to learn more about this plugin.</p>';
        $html .= '</div>';

        return $html;
    }

    public function render(): void
    {
        echo $this->prepare();
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
