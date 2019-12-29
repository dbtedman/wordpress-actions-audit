<?php

namespace WordPressActionsAudit;

use WordPressActionsAudit\Core\Actions\AdminUserActions;
use WordPressActionsAudit\Interfaces\admin\SettingsInterface;
use WordPressActionsAudit\Services\Services;

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
