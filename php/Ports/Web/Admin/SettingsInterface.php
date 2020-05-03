<?php
declare(strict_types=1);

namespace WordPressActionsAudit\Ports\Web\Admin;

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
        // TODO: Review https://code.tutsplus.com/tutorials/creating-custom-admin-pages-in-wordpress-2--cms-26926
        // TODO: Review https://code.tutsplus.com/tutorials/creating-custom-admin-pages-in-wordpress-3--cms-27017
        // TODO: Move wp functions into service.

        $pluginRepositoryLabel = str_replace(
            'https://',
            '',
            self::PLUGIN_REPOSITORY
        );

        return '
            <div class="wrap">
                <h1>' . self::TITLE . '</h1>

                <p>Visit <a href="' . self::PLUGIN_REPOSITORY . '">' . $pluginRepositoryLabel . '</a> to learn more about this plugin.</p>

                <form method="post" action="' . esc_html(admin_url('admin-post.php')) . '">
                    <table class="form-table" role="presentation">
                        <tbody>
                            <tr>
                                <th scope="row"><label>Log Destination</label></th>
                                <td>
                                    <select disabled>
                                        <option>PHP Error Log</option>
                                    </select>
                                    <p class="description">Currently not configurable.</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    ' . get_submit_button() . '
                    ' . wp_nonce_field('wordpress_actions_audit_save', 'wordpress_actions_audit', true, false) . '
                </form>
            </div>
        ';
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
