<?php

namespace WordPressActionsAudit;

use WordPressActionsAudit\Core\Actions\AdminUserActions;
use WordPressActionsAudit\Interfaces\admin\SettingsInterface;
use WordPressActionsAudit\Services\Services;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class WordPressActionsAudit
{
    /**
     * @var AdminUserActions
     */
    private $adminUserActions;

    /**
     * @var SettingsInterface
     */
    private $settingsInterface;

    /**
     * @param Services $services
     */
    public function __construct(Services $services)
    {
        $this->adminUserActions = new AdminUserActions($services);
        $this->settingsInterface = new SettingsInterface($services);
    }

    public function load(): void
    {
        $this->adminUserActions->watchActions();
        $this->settingsInterface->attach();
    }
}
